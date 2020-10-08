<?php

	include_once "config.php";
	include_once "connectionController.php";

	if(isset($_POST) && isset($_POST['action'])){
		$UserController = new UserController();

		switch ($_POST['action']) {
			case 'store':
				
				var_dump($_POST);
				var_dump("store");
				$name = strip_tags($_POST['name']);
				$email = strip_tags($_POST['email']);
				$pass = strip_tags($_POST['password']);

				$UserController->store($name,$email,$pass);

				break;

			case 'update':
				
				var_dump($_POST);
				var_dump("update");
				$name = strip_tags($_POST['name']);
				$email = strip_tags($_POST['email']);
				$pass = strip_tags($_POST['password']);
				$id = strip_tags($_POST['id']);

				$UserController->update($name, $email, $pass, $id);

				break;
		}
	}



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
				}else { return Array(); }

			}else { return Array(); }
		}

		public function store($name, $email, $password)
		{
			$con = connect();
			if(!$con->connect_error){

				if($name!="" && $email!="" && $password!=""){
					$query = "insert into users (name,email,password) values (?,?,?)";
					$prepared_query = $con->prepare($query);
					$prepared_query->bind_param('sss',$name, $email, $password);
					if ($prepared_query->execute()){

						$_SESSION['status'] = "success";
						$_SESSION['message'] = "El registro se ha guardado correctamente";
						header('Location: ' . $_SERVER['HTTP_REFERER']);
					}
				}else{

					$_SESSION['status'] = "error";
					$_SESSION['message'] = "El registro no se ha guardado";

					header('Location: ' . $_SERVER['HTTP_REFERER']);
				}

			}else{

				$_SESSION['status'] = "error";
				$_SESSION['message'] = "no se cual es este";
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
		}


		public function update($name, $email, $password, $id)
		{
			$con = connect();
			if(!$con->connect_error){

				if($name!="" && $email!="" && $password!="" && $id !=""){
					
					$query = "update users set name = ?, email = ?, password = ? where id = ?";

					$prepared_query = $con->prepare($query);
					$prepared_query->bind_param('sssi',$name, $email, $password, $id);

					if ($prepared_query->execute()){

						$_SESSION['status'] = "success";
						$_SESSION['message'] = "El registro se ha actualizado correctamente";

						header('Location: ' . $_SERVER['HTTP_REFERER']);
					}
				}else{

					$_SESSION['status'] = "error";
					$_SESSION['message'] = "El registro no se ha actualizado";

					header('Location: ' . $_SERVER['HTTP_REFERER']);
				}

			}else{

				$_SESSION['status'] = "error";
				$_SESSION['message'] = "no se cual es este";
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
		}
	}

?>
