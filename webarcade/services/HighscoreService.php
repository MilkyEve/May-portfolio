<?php
	namespace webArcade;
	use \webArcade\DataAccessService;

	class HighscoreService {
		private $dataAccessService;

		function __construct() {
			require_once("DataAccessService.php");
			$this->dataAccessService = new DataAccessService();
		}

        public function getHighscoreByGameId($game, $limit){
			$dbConnection = $this->dataAccessService->getConnection();
            $sql = "SELECT player_id, highscore FROM highscores LIMIT $limit";
			$dbAction = $dbConnection->prepare($sql);
			$result = $this->dataAccessService->getActionResult($dbAction);
			return $result;
        }

    }
