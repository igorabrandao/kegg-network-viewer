<?php

	class OrganismModel extends MainModel
	{
		/**
		 * Class constructor
		 *
		 * Set the database, controller, parameter and user data.
		 *
		 * @since 0.1
		 * @access public
		 * @param => object $db PDO Conexion object
		 * @param => object $controller Controller object
		*/
		public function __construct( $db = false, $controller = null )
		{
			// Set DB (PDO)
			$this->db = $db;

			// Set the controller
			$this->controller = $controller;

			// Set the main parameters
			$this->parametros = $this->controller->parametros;
		}

		/**
		 * Get the organisms count
		 *
		 * @since 0.1
		 * @access public
		*/
		public function get_organisms_count()
		{
			// Select the necessary data from DB
			$sql = "SELECT COUNT(O.`organism`)
			FROM 
				`organism` as O";

			// Execute the query
			$query = $this->db->query($sql);

			// Check if query worked
			if ( $query )
				return $query->fetchColumn(0);
			else
				return 0;
		} // get_organisms_count

		/**
		 * Get the organisms list
		 *
		 * @since 0.1
		 * @access public
		*/
		public function get_organisms_list( $limit_ = -1, $order_by_field_ = "", $order_by_type_ = "" )
		{
			// Select the necessary data from DB
			$sql = "SELECT O.`id`, O.`t.number`, O.`organism`, O.`specie`, O.`phylogeny`
			FROM 
				`organism` as O";

			// Check order by parameter
			if ( isset($order_by_field_) && strcmp($order_by_type_, "") != 0 )
			{
				$order_by_type = "ASC";

				if ( isset($order_by_field_) && strcmp($order_by_type_, "") != 0 )
				{
					$order_by_type = $order_by_type_;
				}

				$sql .= " ORDER BY P.`" . $order_by_field_ . "` " . $order_by_type;
			}

			// Check the limit
			if ( isset($limit_) && $limit_ > 0 )
			{
				$sql .= " LIMIT " . $limit_;
			}

			// Execute the query
			$query = $this->db->query($sql);

			// Check if query worked
			if ( $query )
				return $query->fetchAll();
			else
				return 0;
		} // get_organisms_list
	}

?>