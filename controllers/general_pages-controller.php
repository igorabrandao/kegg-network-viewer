<?php
	/**
	 * Home Controller
	 *
	 * @package IgorMVC
	 * @since 0.2
	*/
	class GeneralPagesController extends MainController
	{
		/**
		 * Load the page "http://www.example.com/general_pages/about-view.php"
		*/
		public function about()
		{
			// Page title
			$this->title = 'About Network Viewer';

			// Function parameter
			$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

			// Load models
			$settings_model = $this->load_model('settings-model');

			/** Load files from view **/

			// Load the template definitions
			require ABSPATH . '/views/_includes/template_config.php';

			// Load the template head section
			require ABSPATH . '/views/_includes/template_start.php';

			// Load the page initial definitions
			require ABSPATH . '/views/_includes/page_head.php';

			// Load the page itself
			require ABSPATH . '/views/general_pages/about-view.php';

			// Load the page footer
			require ABSPATH . '/views/_includes/template_end.php';

		} // help page

		/**
		 * Load the page "http://www.example.com/general_pages/about-view.php"
		*/
		public function tutorial()
		{
			// Page title
			$this->title = 'Getting started with KPV';

			// Function parameter
			$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

			// Load models
			$settings_model = $this->load_model('settings-model');

			/** Load files from view **/

			// Load the template definitions
			require ABSPATH . '/views/_includes/template_config.php';

			// Load the template head section
			require ABSPATH . '/views/_includes/template_start.php';

			// Load the page initial definitions
			require ABSPATH . '/views/_includes/page_head.php';

			// Load the page itself
			require ABSPATH . '/views/general_pages/getting_started-view.php';

			// Load the page footer
			require ABSPATH . '/views/_includes/template_end.php';

		} // tutorial page

		/**
		 * Load the page "http://www.example.com/general_pages/about-view.php"
		*/
		public function help()
		{
			// Page title
			$this->title = 'Help us!';

			// Function parameter
			$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

			// Load models
			$settings_model = $this->load_model('settings-model');

			/** Load files from view **/

			// Load the template definitions
			require ABSPATH . '/views/_includes/template_config.php';

			// Load the template head section
			require ABSPATH . '/views/_includes/template_start.php';

			// Load the page initial definitions
			require ABSPATH . '/views/_includes/page_head.php';

			// Load the page itself
			require ABSPATH . '/views/general_pages/help-view.php';

			// Load the page footer
			require ABSPATH . '/views/_includes/template_end.php';

		} // help page

	} // class HomeController
?>