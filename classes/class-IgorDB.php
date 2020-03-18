<?php

	/**
	 * IgorDB - Class to manage all of database operations
	 *
	 * @package IgorMVC
	 * @since 0.1
	*/
	class IgorDB
	{
		/** DB properties */
		public $host      = 'localhost', 		//!< Database's Host
			   $db_name   = 'test', 			//!< Database's Name
			   $password  = 'test',      		//!< Database's User password
			   $user      = 'root',      		//!< Database's Username
			   $charset   = 'utf8',      		//!< Database's Charset
			   $pdo       = null,        		//!< Database's connection
			   $error     = null,        		//!< Error's handler
			   $debug     = false,       		//!< Debug's mode
			   $last_id   = null;        		//!< Last ID inserted

		/**
		 * Class constructor
		 *
		 * @since 0.1
		 * @access public
		 * @param string $host     
		 * @param string $db_name
		 * @param string $password
		 * @param string $user
		 * @param string $charset
		 * @param string $debug
		*/
		public function __construct(
			$host     = null,
			$db_name  = null,
			$password = null,
			$user     = null,
			$charset  = null,
			$debug    = null
		) {

			/**
			 * Set the DB properties
			 *
			*/
			$this->host     = defined( 'HOSTNAME'    ) ? HOSTNAME    : $this->host;
			$this->db_name  = defined( 'DB_NAME'     ) ? DB_NAME     : $this->db_name;
			$this->password = defined( 'DB_PASSWORD' ) ? DB_PASSWORD : $this->password;
			$this->user     = defined( 'DB_USER'     ) ? DB_USER     : $this->user;
			$this->charset  = defined( 'DB_CHARSET'  ) ? DB_CHARSET  : $this->charset;
			$this->debug    = defined( 'DEBUG'       ) ? DEBUG       : $this->debug;

			//! Call the connection method
			$this->connect();

		} //! __construct

		/**
		 * Create a PDO connection
		 *
		 * @since 0.1
		 * @final
		 * @access protected
		 */
		final protected function connect() 
		{
			/* Specify the PDO connection properties */
			$pdo_details  = "mysql:host={$this->host};";
			$pdo_details .= "dbname={$this->db_name};";
			$pdo_details .= "charset={$this->charset};";

			//! Try to connect with DB
			try
			{
				//! Generate a new PDO instance
				$this->pdo = new PDO($pdo_details, $this->user, $this->password);

				//! Check the connection should be debugged
				if ( $this->debug === true )
				{
					//! Set the PDO ERROR MODE
					$this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
				}

				//! Unset the unnecessary properties
				unset( $this->host     );
				unset( $this->db_name  );
				unset( $this->password );
				unset( $this->user     );
				unset( $this->charset  );
			
			}
			//! Error handler
			catch ( PDOException $e )
			{
				//! Check the connection should be debugged
				if ( $this->debug === true )
				{
					//! Mostra a mensagem de erro
					echo "Error: " . $e->getMessage();
				}

				//! Kills the script
				die();
			} //! catch
		} //! connect

		/**
		 * OPERATION: Query PDO
		 *
		 * @since 0.1
		 * @access public
		 * @return object|bool Return the query or false
		 */
		public function query( $stmt, $data_array = null )
		{
			// Make sure that the operation will wait the necessary time
			ini_set('MAX_EXECUTION_TIME', -1);

			//! Prepare the statement
			$query = $this->pdo->prepare( $stmt );

			//! Execute the query via statement
			$check_exec = $query->execute( $data_array );

			//! Check if the query worked
			if ( $check_exec )
			{
				//! Return the query
				return $query;
			}
			else
			{
				//! Set the error
				$error       = $query->errorInfo();
				$this->error = $error[2];

				//! Return false
				return false;
			}
		}

		/**
		 * OPERATION: Insert PDO
		 *
		 * Insert the values in DB table and return the last ID inserted
		 *
		 * @since 0.1
		 * @access public
		 * @param $table => DB table name
		 * @param array  => A array of keys and values to be inserted
		 *
		 * @return object|bool Returns the query or false
		*/
		public function insert( $table )
		{
			//! Set a limit to processing time
			ini_set('MAX_EXECUTION_TIME', -1);

			//! Set the columns array
			$cols = array();

			//! Set the model initial value
			$place_holders = '(';

			//! Set the values array
			$values = array();

			//! A variable to make sure that each column was setted once
			$j = 1;

			//! Get the arguments sent
			$data = func_get_args();

			//! It's mandatory sent at least one array with values and keys
			if ( !isset( $data[1] ) || !is_array( $data[1] ) )
			{
				return;
			}

			//! Run through the keys/values array
			for ( $i = 1; $i < count( $data ); $i++ )
			{
				//! Parse the keys as columns and the valus as values to the DB table
				foreach ( $data[$i] as $col => $val ) 
				{
					//! In the first loop, set the columns
					if ( $i === 1 )
					{
						$cols[] = "`$col`";
					}

					//! Set the divisors
					if ( $j <> $i )
					{
						//! Configura os divisores
						$place_holders .= '), (';
					}

					//! Set the PDO's placeholders
					$place_holders .= '?, ';

					//! Set the values itself
					$values[] = $val;
					$j = $i;
				}

				//! Remove unnecessary character from placeholders
				$place_holders = substr( $place_holders, 0, strlen( $place_holders ) - 2 );
			}

			//! Separe the columns by comma
			$cols = implode(', ', $cols);

			//! Create the statement to send to the PDO
			$stmt = "INSERT INTO `$table` ( $cols ) VALUES $place_holders) ";

			//! Try to insert values in database
			$insert = $this->query( $stmt, $values );

			//! Check if the operation was executted properly
			if ( $insert )
			{
				//! Check if the PDO last ID exists
				if ( method_exists( $this->pdo, 'lastInsertId' ) 
					&& $this->pdo->lastInsertId() 
				) {
					//! Set the last ID
					$this->last_id = $this->pdo->lastInsertId();
				}

				//! Return the query
				return $insert;
			}

			//! The end :)
			return;
		} //! insert

		/**
		 * OPERATION: Update PDO
		 *
		 * Update a table row basead on a field
		 *
		 * @since 0.1
		 * @access protected
		 * @param string $table Nome da tabela
		 * @param string $where_field 		=> WHERE $where_field = $where_field_value
		 * @param string $where_field_value => WHERE $where_field = $where_field_value
		 * @param array $values 			=> An array with new values
		 * @return object|bool Return the query or false
		*/
		public function update( $table, $where_field, $where_field_value, $values ) 
		{
			//! Set a limit to processing time
			ini_set('MAX_EXECUTION_TIME', -1);

			//! It's mandatory inform all the parameters
			if ( empty($table) || empty($where_field) || empty($where_field_value)  )
			{
				return;
			}

			//! Initialize the statement
			$stmt = " UPDATE `$table` SET ";

			//! Set the value arrays
			$set = array();

			//! Set the WHERE field = value statement
			$where = " WHERE `$where_field` = ? ";

			//! It's mandatory send an array with values
			if ( ! is_array( $values ) )
			{
				return;
			}

			//! Set the columns to be updated
			foreach ( $values as $column => $value )
			{
				$set[] = " `$column` = ?";
			}

			//! Separe the columns by comma
			$set = implode(', ', $set);

			//! Concatenate the statement
			$stmt .= $set . $where;

			//! Set the field's value that'll searched
			$values[] = $where_field_value;

			//! Make sure that just numbers in array key
			$values = array_values($values);

			//! Execute the update operation
			$update = $this->query( $stmt, $values );

			//! Check if the operation was executted
			if ( $update )
			{
				//! Retorna a consulta
				return $update;
			}

			//! The end :)
			return;
		} //! update

		/**
		 * Delete
		 *
		 * OPERATION: Delete PDO
		 *
		 * @since 0.1
		 * @access protected
		 * @param string $table Nome da tabela
		 * @param string $where_field 		=> WHERE $where_field = $where_field_value
		 * @param string $where_field_value => WHERE $where_field = $where_field_value
		 * @return object|bool Return the query or false
		*/
		public function delete( $table, $where_field, $where_field_value )
		{
			//! Set a limit to processing time
			ini_set('MAX_EXECUTION_TIME', -1);

			//! It's mandatory inform all the parameters
			if ( empty($table) || empty($where_field) || empty($where_field_value)  )
			{
				return;
			}

			//! Initialize the statement
			$stmt = " DELETE FROM `$table` ";

			//! Set the field's value that'll searched
			$where = " WHERE `$where_field` = ? ";

			//! Concatenate the statement
			$stmt .= $where;

			//! Set the where value
			$values = array( $where_field_value );

			//! Execute the delete operation
			$delete = $this->query( $stmt, $values );

			//! Check if the operation was executted
			if ( $delete )
			{
				//! Retorna a consulta
				return $delete;
			}
			
			//! The end :)
			return;
		} //! delete

	} //! Class IgorDB
?>