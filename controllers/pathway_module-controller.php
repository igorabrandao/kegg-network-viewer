<?php
	/**
	 * Pathway Module Controller
	 *
	 * @package IgorMVC
	 * @since 0.1
	*/
	class PathwayModuleController extends MainController
	{
		/**
		 * Load the page "http://www.example.com/pathway_module/list"
		*/
		public function list()
		{
			// Page title
			$this->title = 'Pathways list';

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
			require ABSPATH . '/views/pathway_module/pathway_list-view.php';

			// Load the page footer
			require ABSPATH . '/views/_includes/template_end.php';

		} // list

		/**
		 * Load the page "http://www.example.com/pathway_module/viewer"
		*/
		public function viewer()
		{
			// Page title
			$this->title = 'Pathways viewer';

			// Function parameter
			$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

			// Load models
			$settings_model = $this->load_model('settings-model');
			$pathway_model = $this->load_model('pathway-model');
			$organism_model = $this->load_model('organism-model');

			/** Load files from view **/

			// Load the template definitions
			require ABSPATH . '/views/_includes/template_config.php';

			// Load the template head section
			require ABSPATH . '/views/_includes/template_start.php';

			// Load the page initial definitions
			require ABSPATH . '/views/_includes/page_head.php';

			// Load the page itself
			require ABSPATH . '/views/pathway_module/pathway_viewer-view.php';

			// Load the modal page
			require ABSPATH . '/views/modal/modal_network.php';
			require ABSPATH . '/views/modal/modal_protein.php';
			require ABSPATH . '/views/modal/modal_kegg_network.php';

			// Load the page footer
			require ABSPATH . '/views/_includes/template_end.php';

		} // viewer

	} // class HomeController

?>