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
		public function get_pathways_count( $has_network_ = 1 )
		{
			// Select the necessary data from DB
			$sql = "SELECT COUNT(P.`code`)
			FROM 
				`pathway_data` as P";

			// Check the network filter
			if ( isset($has_network_) && strcmp($has_network_, "") != 0 )
			{
				$sql .= " WHERE P.`has_network` = " . $has_network_;
			}

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
		public function get_pathways_list( $has_network_ = 1, $limit_ = -1, $order_by_field_ = "", $order_by_type_ = "" )
		{
			// Select the necessary data from DB
			$sql = "SELECT P.`*`
			FROM 
				`pathway_data` as P";

			// Check the category filter
			if ( isset($has_network_) && strcmp($has_network_, "") != 0 )
			{
				$sql .= " WHERE P.`has_network` = " . $has_network_;
			}

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
		} // get_pathways_list

		/**
		 * Get the pathways with most AP list
		 *
		 * @since 0.4
		 * @access public
		*/
		public function get_most_ap( $has_network_ = 1, $limit_ = -1, $order_by_type_ = "" )
		{
			// Select the necessary data from DB
			$sql = "SELECT P.`*`, (P.`ap_number` + P.`hap_number`) AS `TOTAL_AP`
			FROM 
				`pathway_data` as P";

			// Check the category filter
			if ( isset($has_network_) && strcmp($has_network_, "") != 0 )
			{
				$sql .= " WHERE P.`has_network` = " . $has_network_;
			}

			$order_by_field_ = "TOTAL_AP";

			// Check order by parameter
			if ( isset($order_by_field_) && strcmp($order_by_type_, "") != 0 )
			{
				$order_by_type = "DESC";

				if ( isset($order_by_field_) && strcmp($order_by_type_, "") != 0 )
				{
					$order_by_type = $order_by_type_;
				}

				$sql .= " ORDER BY `" . $order_by_field_ . "` " . $order_by_type;
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
		} // get_most_ap

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

		/**
		 * Function to check if a given pathway has an associated HTML network file
		 *
		 * @since 0.1
		 * @access public
		*/
		public function pathway_has_network()
		{
			// Select all pathways code from DB
			$sql = "SELECT P.`code`
			FROM 
				`pathway_data` as P";

			// Execute the query
			$query = $this->db->query($sql);

			// Check if query worked
			if ( $query ) {
				// Store the pathways code list
				$pathwayList = $query->fetchAll();

				foreach ($pathwayList as $item) {
					// Initialize the network filename
					$network_filename = '';

					// Run through the HTML netowrk directory to check if the pathway has the associated file
					foreach (glob(NETWORK_ABSPATH . "*" . $item["code"] . ".*") as $filename) {  
						$network_filename = basename($filename);
					}

					// Check if a network file was found and update the pathway status
					if ( isset($network_filename) && strcmp($network_filename, "") != 0 )
					{
						// Prepare the array to update the information
						$arr_data['has_network'] = 1;

						// Update the data in DB
						$this->db->update( 'pathway_data', 'code', $item["code"], $arr_data);
					}
				}

				return true;
			} else {
				return false;
			}

		} // pathway_has_network

		/**
		 * Get the data to pathway size chart
		 *
		 * @since 0.5
		 * @access public
		*/
		public function get_chart_pathway_size()
		{
			// Select the necessary data from DB
			$sql = "SELECT P.`code`, P.`nodes`, P.`edges`
			FROM 
				`pathway_data` as P
			WHERE
				P.`has_network` = 1
			ORDER BY P.`nodes` ASC";

			// Check the category filter
			if ( isset($has_network_) && strcmp($has_network_, "") != 0 )
			{
				$sql .= " WHERE P.`has_network` = " . $has_network_;
			}

			// Execute the query
			$query = $this->db->query($sql);

			// Check if query worked
			if ( $query )
				return $query->fetchAll();
			else
				return 0;
		} // get_most_ap
	}

?>