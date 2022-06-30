<?php
	namespace webArcade;
	use \webArcade\DataAccessService;

	class OutputService {
		private $dataAccessService;

		function __construct() {
			require_once("DataAccessService.php");
			$this->dataAccessService = new DataAccessService();
		}

        public function createLeaderboard($entries, $class){
            $html = "<table class='$class'>";
			$html .= "<th>Username</th> <th>Highscore</th>";
            foreach($entries as $entry){
				$html .= "<tr>";
				foreach($entry as $key=>$value){
					$html .= "<td>" . $value . "</td>";
				}
            }
			$html .= "</tr>";
			return $html;
        }
    }