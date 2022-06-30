<?php
	namespace webArcade;

	class DataAccessService {
		const HOST = 'localhost';
		const USERNAME = 'root';
		const PASSWORD = '';
		const DATABASENAME = 'web-arcade';

		public function getConnection() {
			$conn = new \mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASENAME);

			if (mysqli_connect_errno()) {
				trigger_error("Problem with connecting to database.");
			}

			$conn->set_charset("utf8");
			return $conn;
		}

		public function getActionResult($dbAction){
			$dbAction->execute();
			$result = $dbAction->get_result();

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$resultset[] = $row;
				}
			}

			if (!empty($resultset)) {
				return $resultset;
			}
		}
	}
?>