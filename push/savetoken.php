<?php
	
	header('Access-Control-Allow-Origin: *');
	include 'settings.php';

	if(!empty($_GET))
	{
		$userid = $_GET["userid"];
		$devid = $_GET["devid"];
		$token = $_GET["token"];

		//write your php code to save the registration id to the table.
		
		$message="Unable to register for push notification";

		$sql = "SELECT * from `push_registration` where `dev_id` = '".$devid."'";

		$result = mysql_query($sql,$conn) or die('Errant query:  '.$sql);
		
		if(mysql_num_rows($result)) {
				$sql = "UPDATE `push_registration` set `user_id`='".$userid."',`token`='".$token."'	WHERE `dev_id`='".$devid."'";
				
				//echo "Query:".$sql;

				if(mysql_query($sql))
				{
					$message="Successfully updated registration";
				}
		}else{
				$sql = "INSERT INTO  `push_registration` (`slno`, `user_id` ,`dev_id`,`token`) 
				VALUES (0,$userid,'".$devid."','".$token."')";

				//echo "Query:".$sql;
				 
				if(mysql_query($sql))
				{
					$message="Successfully registered";
				}
		}

		$response["message"] = $message;

		die(json_encode($response));

		mysql_close($conn);

	}else {
		echo "{\"message\":\"Unable to save the push registration: No token provided\"}";
	}
?>