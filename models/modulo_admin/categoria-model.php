<?php

	class CategoriaModel extends MainModel
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
		 * Get the categories count
		 *
		 * @since 0.1
		 * @access public
		*/
		public function get_categories_count()
		{
			// Select the necessary data from DB
			$sql = "SELECT COUNT(`ID_CATEGORIA`) FROM `categorias` WHERE `DATA_FECHA` IS NULL";

			// Execute the query
			$query = $this->db->query($sql);

			// Check if query worked
			if ( $query )
				return $query->fetchColumn(0);
			else
				return 0;
		} // get_categories_count

		/**
		 * Get the categories list
		 *
		 * @since 0.1
		 * @access public
		*/
		public function get_categories_list()
		{
			// Select the necessary data from DB
			$sql = "SELECT `ID_CATEGORIA`, `NOME`, `DATA_FECHA`
			FROM 
				`categorias` 
			WHERE 
				`DATA_FECHA` IS NULL";

			// Execute the query
			$query = $this->db->query($sql);

			// Check if query worked
			if ( $query )
				return $query->fetchAll();
			else
				return 0;
		} // get_categories_list

		/**
		 * Get the categories information
		 *
		 * @since 0.1
		 * @access public
		 * @id_category_ 	=> post ID
		*/
		public function get_category_info( $id_category_ )
		{
			// Select the necessary data from DB
			$sql = "SELECT `ID_CATEGORIA`, `NOME`
			FROM 
				`categorias`
			WHERE 
				`ID_CATEGORIA` = " . $id_category_ . " AND
				`DATA_FECHA` IS NULL";

			// Execute the query
			$query = $this->db->query($sql);

			// Check if query worked
			if ( $query )
				return $query->fetchAll();
			else
				return 0;
		} // get_category_info

		/**
		 * Insert/Edit categories
		 *
		 * @since 0.1
		 * @access public
		*/
		public function insert_edit_category( $action_ )
		{
			/**
			 * Check if information was sent from web form.
			*/
			if ( 'POST' != $_SERVER['REQUEST_METHOD'] )
			{
				return;
			}

			/**
			 * Check if the carrier ID appears in query string
			*/
			if ( isset($_POST["ID_CATEGORIA"]) && $_POST["ID_CATEGORIA"] != 0 )
			{
				$category_id = $_POST["ID_CATEGORIA"];
			}
			else
			{
				$category_id = 0;
			}

			/**
			 * Check if it's an update
			*/
			if ( isset($action_) && strcmp($action_, "edit") == 0 )
			{
				// Edit the registers
				if ( isset($category_id) && $category_id != 0 )
				{
					$query = $this->db->update( 'categorias', 'ID_CATEGORIA', $category_id, $_POST );

					// Check the query
					if ( $query )
					{
						// Redirect
						?><script>alert("Categoria atualizada com sucesso!"); window.location.href = "<?php echo HOME_URI ?>/modulo_admin/gerenciar_categorias";</script> <?php

						return;
					}
				}
			}
			else
			{
				// Insert data in database
				$query = $this->db->insert( 'categorias', $_POST );

				// Check the query
				if ( $query )
				{
					// Redirect
					?><script>alert("Categoria cadastrada com sucesso!"); window.location.href = "<?php echo HOME_URI ?>/modulo_admin/gerenciar_categorias";</script> <?php

					return;
				}
			}
		} // insert_edit_category

		/**
		 * Delete an specific item
		 * 
		 * @since 0.1
		 * @access public
		*/
		public function delete_item( $item_type_, $item_ID_ )
		{
			// Auxiliar variables
			$arr_data = array();
			$arr_data["DATA_FECHA"] = date("d-m-Y H:i:s");

			// Check the item type
			if ( strcmp($item_type_, "categorie") == 0 )
			{
				// Check the parameter validity
				if ( isset($item_ID_) && $item_ID_ != "" && $item_ID_ != 0 )
				{
					// Disable the categorie itself
					$query = $this->db->update( 'categorias', "ID_CATEGORIA", $item_ID_, $arr_data );

					// Disable the related posts
					$query2 = $this->db->update( 'posts', "ID_CATEGORIA", $item_ID_, $arr_data );

					// Return a message
					?><script>
						//alert("Categoria excluída com sucesso!"); 
						window.location.href = "<?php echo HOME_URI;?>/modulo_admin/gerenciar_categorias";
					</script> <?php
				}
			}

			echo "///";

		} // delete_item
	}

?>