<?php

	class PostModel extends MainModel
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
		 * Get the POSTS count
		 *
		 * @since 0.1
		 * @access public
		*/
		public function get_posts_count()
		{
			// Select the necessary data from DB
			$sql = "SELECT COUNT(`ID_POST`) FROM `posts` WHERE `DATA_FECHA` IS NULL";

			// Execute the query
			$query = $this->db->query($sql);

			// Check if query worked
			if ( $query )
				return $query->fetchColumn(0);
			else
				return 0;
		} // get_posts_count

		/**
		 * Get the POSTS list
		 *
		 * @since 0.1
		 * @access public
		*/
		public function get_posts_list( $id_category_ = null )
		{
			// Select the necessary data from DB
			$sql = "SELECT P.`ID_POST`, P.`ID_CATEGORIA`, C.`NOME` AS CATEGORIA, P.`ID_POST`, P.`TITULO`, P.`SUBTITULO`, 
				P.`TEXTO`, P.`TIMESTAMP`, P.`FOTO`, P.`DATA_FECHA`
			FROM 
				`posts` as P
			INNER JOIN 
				`categorias` as C ON C.`ID_CATEGORIA` = P.`ID_CATEGORIA`
			WHERE 
				P.`DATA_FECHA` IS NULL ";

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
		} // get_posts_list

		/**
		 * Get the POST information
		 *
		 * @since 0.1
		 * @access public
		 * @id_post_ 	=> post ID
		*/
		public function get_posts_info( $id_post_ )
		{
			// Select the necessary data from DB
			$sql = "SELECT `ID_POST`, `ID_CATEGORIA`, `ID_POST`, `TITULO`, `SUBTITULO`, 
				`TEXTO`, `TIMESTAMP`, `FOTO`
			FROM 
				`posts` 
			WHERE 
				`ID_POST` = " . $id_post_ . " AND
				`DATA_FECHA` IS NULL";

			// Execute the query
			$query = $this->db->query($sql);

			// Check if query worked
			if ( $query )
				return $query->fetchAll();
			else
				return 0;
		} // get_posts_info

		/**
		 * Function to insert the attachies
		 *
		 * @since 0.1
		 * @access public
		*/
		public function insert_attach( $id_POST_ = null )
		{
			// Check if there are files to be uploaded
			if ( ! empty($_FILES['file_anexo']['name']) )
			{
				// Auxiliary variables
				$arr_data = array();

				if ( !is_null($id_POST_) )
				{
					$post_ID = $id_POST_;
				}
				else
				{
					$post_ID = $_POST['ID_POST'];
				}

				// Define the company ID
				$arr_data["ID_POST"] = $post_ID;

				// Define contract's path
				$contract_root = ABSPATH . '/resources/posts/' . $post_ID;
				$contract_path = $contract_root;

				// Check if contract folder exist, if not create it!
				if ( ! file_exists($contract_root) )
				{
					mkdir($contract_root, 0777, true);
				}

				if ( ! file_exists($contract_path) )
				{
					mkdir($contract_path, 0777, true);
				}

				// Upload files if exist
				foreach ( $_FILES['file_anexo']['name'] as $key => $name ) 
				{
					if ( $_FILES['file_anexo']['error'][$key] == 4 )
					{
						continue; // Skip file if any error found
					}

					if ( $_FILES['file_anexo']['error'][$key] == 0 )
					{
						if ( $_FILES['file_anexo']['size'][$key] > MAX_FILE_SIZE )
						{
							$message[] = "$name é muito grande!.";
							continue; // Skip large files
						}
						else
						{ 
							// No error found! Move uploaded files 
							if( move_uploaded_file($_FILES["file_anexo"]["tmp_name"][$key], $contract_path . "/" . $_FILES['file_anexo']['name'][$key]) )
							{
								// Insert contract's attachment's
								$arr_data['FOTO'] = $contract_path . "/" . $_FILES['file_anexo']['name'][$key];
								$query = $this->db->update( 'posts', 'ID_POST', $post_ID, $arr_data );
							}
						}
					}
				}
			}
		}

		/**
		 * Insert/Edit posts
		 *
		 * @since 0.1
		 * @access public
		*/
		public function insert_edit_post( $action_ )
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
			if ( isset($_POST["ID_POST"]) && $_POST["ID_POST"] != 0 )
			{
				$post_id = $_POST["ID_POST"];
			}
			else
			{
				$post_id = 0;
			}

			/**
			 * Check if it's an update
			*/
			if ( isset($action_) && strcmp($action_, "edit") == 0 )
			{
				// Edit the registers
				if ( isset($post_id) && $post_id != 0 )
				{
					$query = $this->db->update( 'posts', 'ID_POST', $post_id, $_POST );

					// Check the query
					if ( $query )
					{
						// Insert the attachs
						$this->insert_attach();

						// Redirect
						?><script>alert("Post atualizado com sucesso!"); window.location.href = "<?php echo HOME_URI ?>/modulo_admin/gerenciar_posts";</script> <?php

						return;
					}
				}
			}
			else
			{
				// Apply the timestamp
				$arr_data = $_POST;
				$arr_data["TIMESTAMP"] = date("d-m-Y H:i:s");

				// Insert data in database
				$query = $this->db->insert( 'posts', $arr_data );

				// Check the query
				if ( $query )
				{
					// Insert the attachs
					$this->insert_attach( $this->db->last_id );

					// Redirect
					?><script>alert("Post cadastrado com sucesso!"); window.location.href = "<?php echo HOME_URI ?>/modulo_admin/gerenciar_posts";</script> <?php

					return;
				}
			}
		} // insert_edit_post

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
			if ( strcmp($item_type_, "post") == 0 )
			{
				// Check the parameter validity
				if ( isset($item_ID_) && $item_ID_ != "" && $item_ID_ != 0 )
				{
					// Disable the post itself
					$query = $this->db->update( 'posts', "ID_POST", $item_ID_, $arr_data );

					// Return a message
					?><script>
						//alert("Categoria excluída com sucesso!"); 
						window.location.href = "<?php echo HOME_URI;?>/modulo_admin/gerenciar_posts";
					</script> <?php
				}
			}

			echo "///";

		} // delete_item
	}

?>