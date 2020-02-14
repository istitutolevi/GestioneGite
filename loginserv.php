<?php
include('connessione.php');
session_start();
		$error='';
	if(isset($_POST['submit']))
	{
		// echo $_POST['class_name'];
		// echo $_POST['password'];
		if($_POST['class_name'] == '' || $_POST['password'] == '')
		{
			$error = "Inserire i dati!";
		}
		else
		{


			$stmt = $db->prepare("SELECT class_name, tipo FROM users WHERE `class_name` = :className AND `password` = :password");
			// echo md5($_POST['password']);
			// echo $_POST['class_name'];
			$class_name=$_POST['class_name'];
			$password = md5($_POST['password']);
			$stmt->execute(
				[
					'className'    =>     $class_name,
					'password'     =>     $password
				]
		   );
			
			
			$result = $stmt->fetchAll();
			// echo json_encode($result);
			//echo count($result);
			// var_dump($result[0]["class_name"]);
		if (count($result) == 1){
   
		   if($result[0]["tipo"]=='1'){

				$_SESSION['n_classe'] = $result[0]['class_name'];
				header("Location: admin_home.php");

		   }
		   else if ($result[0]["tipo"]=='0'){
				$_SESSION['n_classe'] = $result[0]['class_name'];
				 header("Location: class_home.php");
		   }
		
		}
		else{

			$error="Password Incorretta!";
		}}

		$db = null;
	}

?>