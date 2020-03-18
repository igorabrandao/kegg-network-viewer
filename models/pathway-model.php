<?php

	class PathwayModel extends MainModel
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
		 * Get the PATHWAYS count
		 *
		 * @since 0.1
		 * @access public
		*/
		public function get_pathways_count()
		{
			// Select the necessary data from DB
			$sql = "SELECT COUNT(`ID`) FROM `pathway_data` WHERE `DATA_FECHA` IS NULL";

			// Execute the query
			$query = $this->db->query($sql);

			// Check if query worked
			if ( $query )
				return $query->fetchColumn(0);
			else
				return 0;
		} // get_pathways_count

		/**
		 * Get the pathways list
		 *
		 * @since 0.1
		 * @access public
		*/
		public function get_pathways_list( $id_category_ = null )
		{
			// Select the necessary data from DB
			$sql = "SELECT P.`*`
			FROM 
				`pathway_data` as P";

			// Check the category filter
			if ( isset($id_category_) && strcmp($id_category_, "") != 0 )
			{
				$sql .= "AND P.`ID_CATEGORIA` = " . $id_category_;
			}

			// Execute the query
			$query = $this->db->query($sql);

			// Check if query worked
			if ( $query )
				return $query->fetchAll();
			else
				return 0;
		} // get_pathways_list

		/**
		 * Get the PATHWAY information
		 *
		 * @since 0.1
		 * @access public
		 * @id_code_ 	=> pathway code
		*/
		public function get_pathway_info( $pathway_code_ )
		{
			// Select the necessary data from DB
			$sql = "SELECT `*`
			FROM 
				`pathway_data` 
			WHERE 
				`CODE` = " . $pathway_code_;

			// Execute the query
			$query = $this->db->query($sql);

			// Check if query worked
			if ( $query )
				return $query->fetchAll();
			else
				return 0;
		} // get_pathway_info
	}

?>