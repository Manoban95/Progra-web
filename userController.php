<?php

	include_once "config.php";
	include_once "connectionController.php";

	Class UserController
	{
		function get()
		{
			$con = connect();
			if(!$con->connect_error){

				$query = "select * from users";
				$prepared_query = $con->prepare($query);
				$prepared_query->execute();

				$result = $prepared_query->get_result();
				$users = $result->fetch_all(MYSQLI_ASSOC);

				if ($users) {
					return $users;
					
				}

			}
		}
	}

?>
