<?php
	namespace webArcade;
	use \webArcade\DataAccessService;

	class UserService {
		private $dataAccessService;

		function __construct() {
			require_once("DataAccessService.php");
			$this->dataAccessService = new DataAccessService();
		}
	
		public function processLogin($username, $password) {
			$passwordHash = md5($password);
			$dbConnection = $this->dataAccessService->getConnection();

			$query = "SELECT * FROM users WHERE user_name = ? AND password = ?";
			$dbAction = $dbConnection->prepare($query);
			$dbAction->bind_param("ss", $username, $passwordHash);
			
			$actionResult = $this->dataAccessService->getActionResult($dbAction);

			if(!empty($actionResult)) {
				$_SESSION["userId"] = $actionResult[0]["id"];
				return true;
			}

		}

		function getUserByID($userID){
			$dbConnection = $this->dataAccessService->getConnection();
			$sql = "SELECT display_name FROM users WHERE id = $userID";
			$dbAction = $dbConnection->prepare($sql);
			$result = $this->dataAccessService->getActionResult($dbAction);
			return $result;
		}
	}
?>