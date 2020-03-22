<?php

	class SettingsModel extends MainModel
	{
		/**
		 * Class constructor
		 *
		 * @since 0.2
		 * @access public
		*/
		public function __construct()
		{
			// TODO
		}

		/**
		 * Function to parse the changeLog file
		 *
		 * @since 0.2
		 * @access public
		*/
		public function parseChangelog()
		{
			// Set the versioning array
			$info = array();

			// Set the Changelog file path
			$filename    = file_get_contents(HOME_URI . '/CHANGELOG.md');
			$versions        = explode("##", $filename);
			array_shift($versions);
			$idx = 0;

			// Get the version informations
			foreach($versions as $row => $item)
			{
				// Check if the data refers to the version and date or description
				if($row % 2 == 0) {
					// Separate version and date
					$temp = delete_all_between('(', ')', $item);
					$temp = explode('-', $temp, 2);

					// Version
					$info[$idx]['version'] = $temp[0];

					// Date
					$info[$idx]['date'] = $temp[1];
				} 
				else {
					// Clean-up the description
					$temp = trim(str_replace('# Commits', '', $item));
					$temp = preg_split('/(- |])/', $temp);

					// Initialize the description
					$info[$idx]['description'] = '';

					for ($i = 1; $i < sizeof($temp); $i+=2) {
						// Link to commit
						$link = str_replace('(', '', $temp[($i + 1)]);
						$link = str_replace(')', '', $link);

						// Description
						$info[$idx]['description'] .= "<a href=" . $link . " target='_blank'>- " . $temp[$i] . "]</a></br>";
					}

					// Add the index
					$idx += 1;
				}
			}

			// Check if there is some version
			if ( isset($info[0]) && strcmp($info[0]['description'], "") != 0 )
			{
				return $info;
			} else {
				return 'No activity available yet.';
			}

		} // parseChangelog
	}

?>