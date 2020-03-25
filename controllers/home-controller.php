<?php
	/**
	 * Home Controller
	 *
	 * @package IgorMVC
	 * @since 0.1
	*/
	class HomeController extends MainController
	{
		/**
		 * Load the page "http://www.example.com/example-view.php"
		*/
		public function index()
		{
			// Page title
			$this->title = 'Network Viewer';

			// Function parameter
			$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

			// Load models
			$settings_model = $this->load_model('settings-model');
			$pathway_model = $this->load_model('pathway-model');

			/** Load files from view **/

			// Load the template definitions
			require ABSPATH . '/views/_includes/template_config.php';

			// Load the template head section
			require ABSPATH . '/views/_includes/template_start.php';

			// Load the page initial definitions
			require ABSPATH . '/views/_includes/page_head.php';

			// Load the page itself
			require ABSPATH . '/views/home/home-view.php';

			// Load the modal page
			require ABSPATH . '/views/modal/modal_protein.php';

			// Load the page footer
			require ABSPATH . '/views/_includes/template_end.php';

		} // index page

	} // class HomeController
?>