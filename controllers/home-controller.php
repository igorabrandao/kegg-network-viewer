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

		/**
		 * Load the page "http://www.example.com/pathway_list-view.php"
		*/
		public function pathwayList()
		{
			// Page title
			$this->title = 'Pathways list';

			// Function parameter
			$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

			// Load models
			$pathway_model = $this->load_model('pathway-model');

			/** Load files from view **/

			// Load the template definitions
			require ABSPATH . '/views/_includes/template_config.php';

			// Load the template head section
			require ABSPATH . '/views/_includes/template_start.php';

			// Load the page initial definitions
			require ABSPATH . '/views/_includes/page_head.php';

			// Load the page itself
			require ABSPATH . '/views/pathway_module/pathway_list-view.php';

			// Load the page footer
			require ABSPATH . '/views/pathway_module/page_footer.php';
			require ABSPATH . '/views/pathway_module/template_scripts.php';
			require ABSPATH . '/views/_includes/template_end.php';

		} // pathwayList

	} // class HomeController

?>