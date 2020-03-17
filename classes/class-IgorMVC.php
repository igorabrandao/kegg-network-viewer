<?php
	/**
	 * IgorMVC - Manage Models, Controllers and Views
	 *
	 * @package IgorMVC
	 * @since 0.1
	 */
	class IgorMVC
	{
		/**
		 * $controlador
		 *
		 * Will receive the controller value (From URL).
		 * example.com/controlador/
		 *
		 * @access private
		*/
		private $controlador;

		/**
		 * $acao
		 *
		  * Will receive the action value (From URL too).
		 * example.com/controlador/acao
		 *
		 * @access private
		*/
		private $acao;

		/**
		 * $parametros
		 *
		 * Will receive an array with parameters (From URL too):
		 * example.com/controlador/acao/param1/param2/param50
		 *
		 * @access private
		*/
		private $parametros;

		/**
		 * $not_found
		 *
		 * Path to not found page
		 *
		 * @access private
		*/
		private $not_found = '/includes/404.php';

		/**
		 * Class's constructor
		 *
		 * Get values from controller, action and parameter. Set controller and action (method).
		*/
		public function __construct () 
		{
			// Get the controller values, action and parameter from URL and set class properties.
			$this->get_url_data();

			/**
			 * Check if controller exists.
			 * If not add the standard controller (controllers/home-controller.php) and call index() method.
			*/
			if ( ! $this->controlador )
			{
				// Add the standard controller
				require_once ABSPATH . '/controllers/home-controller.php';

				/**
				 * Generate controller object "home-controller.php"
				 * This controller should have a class called HomeController
				*/
				$this->controlador = new HomeController();

				// Call index() method
				$this->controlador->index();
				return;			
			} // ! $this->controlador

			// If controller doesn't exist, nothing happens
			if ( ! file_exists( ABSPATH . '/controllers/' . $this->controlador . '.php' ) ) 
			{
				// Page not found
				require_once ABSPATH . $this->not_found;
				return;
			} // file_exists

			// Include controller file
			require_once ABSPATH . '/controllers/' . $this->controlador . '.php';

			/**
			 * Remove invalid characters from controller name to generate class name.
			 * e.g: If file name is "news-controller.php", the class should be named NewsController.
			*/
			$this->controlador = preg_replace( '/[^a-zA-Z]/i', '', $this->controlador );

			// If controller's class doesn't exist, nothing happens
			if ( ! class_exists( $this->controlador ) ) 
			{
				// Page not found
				require_once ABSPATH . $this->not_found;
				return;
			} // class_exists

			// Generate controller class's object and send the parameters
			$this->controlador = new $this->controlador( $this->parametros );

			// Remove invalid characters fromethod name.
			$this->acao = preg_replace( '/[^a-zA-Z]/i', '', $this->acao );

			// If the method exists, run it and send the parameters
			if ( method_exists( $this->controlador, $this->acao ) )
			{
				$this->controlador->{$this->acao}( $this->parametros );
				return;
			} // method_exists

			// Without action, calls index method
			if ( ! $this->acao && method_exists( $this->controlador, 'index' ) ) 
			{
				$this->controlador->index( $this->parametros );		
				return;
			} // ! $this->acao 

			// Page not found
			require_once ABSPATH . $this->not_found;
			return;
		} // __construct

		/**
		 * Get parameter from $_GET['path']
		 *
		 * Get parameter from $_GET['path'] and set properties
		 * $this->controlador, $this->acao e $this->parametros
		 *
		 * The URL should have this pattern:
		 * http://www.example.com/controller/action/parameter1/parameter2/etc...
		*/
		public function get_url_data () 
		{
			// Verify if path parameter was sent
			if ( isset( $_GET['path'] ) ) 
			{
				// Catch $_GET['path']
				$path = $_GET['path'];

				// Data cleaning
				$path = rtrim($path, '/');
				$path = filter_var($path, FILTER_SANITIZE_URL);

				// Generate parameter array
				$path = explode('/', $path);

				// Set properties
				$this->controlador  = chk_array( $path, 0 );
				$this->controlador .= '-controller';
				$this->acao         = chk_array( $path, 1 );

				// Set parameters
				if ( chk_array( $path, 2 ) ) 
				{
					unset( $path[0] );
					unset( $path[1] );

					// Parameters always come after action
					$this->parametros = array_values( $path );
				}

				// DEBUG
				//
				// echo $this->controlador . '<br>';
				// echo $this->acao        . '<br>';
				// echo '<pre>';
				// print_r( $this->parametros );
				// echo '</pre>';
			}
		
		} // get_url_data
		
	} // class IgorMVC
?>