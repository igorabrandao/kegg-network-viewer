<?php

	class ModuloLoginModel extends MainModel
	{
		/**
		 * Fixed user attributes
		*/
		private $standardUSER 	= "interativa";
		private $standardPASSWD	= "K5uGP8m";

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
		 * Verify login
		 *
		 * Set the properties $logged_in and $login_error. Also set an array with user and password		 
		*/
		public function check_userlogin() 
		{
			/*
			 * Verify if exists a session with userdata key
			 * The parameter most be an array instead an HTTP POST
			*/
			if ( isset( $_SESSION['userdata'] )
				 && ! empty( $_SESSION['userdata'] )
				 && is_array( $_SESSION['userdata'] ) 
				 && ! isset( $_POST['userdata'] )
				)
			{
				// Set user data
				$userdata = $_SESSION['userdata'];

				// Make sure that ins't a HTTP POST
				$userdata['post'] = false;
			}

			/*
			 * Verify if exists a HTTP POST with userdata key
			 * The parameter must be an HTTP POST
			*/
			if ( isset( $_POST['userdata'] ) && !empty( $_POST['userdata'] ) )
			{
				// Set user data
				$userdata = $_POST;

				// Make sure that ins't a HTTP POST
				$userdata['post'] = true;
			}

			// Check if it's necessary analise some user information
			if ( !isset( $userdata ) || !is_array( $userdata ) )
			{
				// Kill user session
				$this->logout();
				return;
			}

			// Set a variable with a post value
			if ( $userdata['post'] === true ) 
				$post = true;
			else
				$post = false;

			// Remove a chave post do array userdata
			unset( $userdata['post'] );

			// Check if it's necessary analise some user information
			if ( empty( $userdata ) )
			{
				$this->logged_in = false;
				$this->login_error = null;

				// Kill user session
				$this->logout();
				return;
			}

			// Extract variables from user data
			$user = $userdata["username"];
			$user_password = $userdata["password"];

			// Check if exists an user and password
			if ( !isset( $user ) || !isset( $user_password ) )
			{
				$this->logged_in = false;
				$this->login_error = null;

				// Unset any existent user session
				$this->logout();
				return;
			}

			// ===================================================================================================================
			/* 
			 * Instead of using a table in databse, I'll be using a fixed user access
			*/

			// Compare the username
			if ( strcmp($user, $this->standardUSER) == 0 )
			{
				// Compare the password
				if ( strcmp($user_password, $this->standardPASSWD) == 0 )
				{
					// Set the property logged_in as logged
					$this->logged_in = true;

					// Destroy the cookie
					if ( !isset($_COOKIE[SESSION_COOKIE]) )
					{
						// **** CREATE COOKIE ****
						create_cookie( rand(), SESSION_COOKIE);
					}

					// If it's a login, go to the dashboard
					if ( $post && defined( 'HOME_URI' ) )
					{
						// Set the URL in a variable
						$this->goto_page(HOME_URI . '/modulo_admin/home_admin');
					}

					return;
				}
				else
				{
					// User isn't logged
					$this->logged_in = false;

					// Password doesn't match
					$this->login_error = 'A senha informada está incorreta.';

					// Remove all
					$this->logout();
					return;
				}
			}
			else
			{
				// User isn't logged
				$this->logged_in = false;

				// Password doesn't match
				$this->login_error = 'O usuário informado está incorreto.';

				// Remove all
				$this->logout();
				return;
			}

			// ===================================================================================================================

		}

		/**
		 * Logout
		 *
		 * Unset everything about user.
		 *
		 * @param bool $redirect If true, redirect to login page
		 * @final
		*/
		public function logout( $redirect = false )
		{
			// Remove all data from $_SESSION['userdata']
			$_SESSION['userdata'] = array();

			// Only to make sure (it isn't really needed)
			unset( $_SESSION['userdata'] );

			// Unset the global session cookie
			$GLOBALS['ACTIVE_COOKIE'] = "";

			// Destroy the cookie if exists
			if ( isset($_COOKIE[SESSION_COOKIE]) )
			{
				// Auxiliar variables
				$arr_data_cookie = array();
				$arr_data_cookie["DATA_FECHA"] = date("d-m-Y H:i:s");
			}

			// Destroy the cookie
			destroy_cookie(SESSION_COOKIE);

			// Regenerates the session ID
			session_regenerate_id();

			if ( $redirect === true )
			{
				// Send the user to the login page
				$this->goto_login();
			}
		}

		/**
		 * Go to login page
		*/
		protected function goto_login()
		{
			// Check if HOME URI is setted
			if ( defined( 'HOME_URI' ) )
			{
				// Set login URL
				$login_uri  = HOME_URI . '/modulo_admin/';

				// Set the current page
				$_SESSION['goto_url'] = urlencode( $_SERVER['REQUEST_URI'] );

				// Redirection
				echo '<meta http-equiv="Refresh" content="0; url=' . $login_uri . '">';
				echo '<script type="text/javascript">window.location.href = "' . $login_uri . '";</script>';
				// header('location: ' . $login_uri);
			}

			return;
		}

		/**
		 * Redirect to any page
		 *
		 * @final
		*/
		final protected function goto_page( $page_uri = null )
		{
			if ( isset( $_GET['url'] ) && ! empty( $_GET['url'] ) && ! $page_uri )
			{
				// Set URL
				$page_uri  = urldecode( $_GET['url'] );
			}

			if ( $page_uri )
			{ 
				// Redirect
				echo '<meta http-equiv="Refresh" content="0; url=' . $page_uri . '">';
				echo '<script type="text/javascript">window.location.href = "' . $page_uri . '";</script>';
				//header('location: ' . $page_uri);
				return;
			}
		}
	}

?>