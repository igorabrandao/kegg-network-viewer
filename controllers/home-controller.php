<?php
	/**
	 * Home - Index Controller
	 *
	 * @package IgorMVC
	 * @since 0.1
	*/
	class HomeController extends MainController
	{
		/**
		 * Load the page "http://www.example.com/home-view.php"
		*/
		public function index( )
		{
			// Page title
			$this->title = 'Página Inicial';

			// Function parameter
			$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

			// Load models
			$modelo = $this->load_model('modulo_admin/modulo_login-model');
			$modelo_posts = $this->load_model('modulo_admin/post-model');
			$modelo_categorias = $this->load_model('modulo_admin/categoria-model');

			/** Load files from view **/

			// Load the template definitions
			require ABSPATH . '/views/_includes/template_config.php';

			// Load the template head section
			require ABSPATH . '/views/_includes/template_start.php';

			// Load the page initial definitions
			require ABSPATH . '/views/_includes/page_head.php';

			// Load the page itself
			require ABSPATH . '/views/home/home-view.php';

			// Load the page footer
			require ABSPATH . '/views/_includes/template_end.php';
		} // index page

	} // class HomeController

?>