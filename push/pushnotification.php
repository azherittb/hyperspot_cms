<?php

	header('Access-Control-Allow-Origin: *');
	include 'settings.php';
	
	// API access key from Google API's Console
	define( 'API_ACCESS_KEY', $fcm_api_access_key);

	$userid = $_GET["userid"];
	$devid = $_GET["devid"];
	$bregion = $_GET["bregion"];

	if ($_GET['topic'] == 'beacon'){ //Topic is beacon
			$sql = "SELECT * FROM `push_registration` WHERE `dev_id` = '".$devid."'";
			 $result = mysql_query($sql,$conn) or die('Errant query:  '.$sql);
			 //echo "\nQuery:".$sql;

			 while($row = mysql_fetch_assoc($result)){
			 	//echo("Registration id:".$row['token']);
				 $registrationIds = array($row['token']);
		 	 }

		 	//echo "regids:".$registrationIds;
			
			if(mysql_num_rows($result)) {
				$sql = "SELECT * FROM `push_offers`	WHERE `region`='".$bregion."'";

				$result = mysql_query($sql,$conn) or die('Errant query:  '.$sql);
				
				//echo "\nQuery:".$sql;

				 while($row = mysql_fetch_assoc($result)){
				 	 $offerid = $row['slno'];
					 $message = $row['message'];
					 $title = $row['title'];
					 $subtitle = $row['subtitle'];
			 	 }
				
				if(mysql_num_rows($result)) {
					// prep the bundle
					$msg = array
					(
						'message'=> $message,
						'title'=> $title,
						'subtitle'=> $subtitle,
						'tickerText'=> 'Ticker..',
						'vibrate'=>1,
						'sound'=>1,
						'largeIcon'=>'large_icon',
						'smallIcon'=>'small_icon'
					);

					$fields = array
					(
						'registration_ids'=>$registrationIds,
						'data'=>$msg
					);

					$headers = array
					(
						'Authorization: key=' . API_ACCESS_KEY,
						'Content-Type: application/json'
					);

					$ch = curl_init();
					curl_setopt( $ch,CURLOPT_URL, $fcm_send_url );
					curl_setopt( $ch,CURLOPT_POST, true );
					curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
					curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
					curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
					curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
					$result = curl_exec($ch );
					curl_close( $ch );

					//echo "\nFCM Response:".json_encode($result);

					//Save to push log

					$sql = "INSERT INTO  `push_log` (`slno`, `user_id` ,`dev_id`,`offer_id`, `status`) 
					VALUES (0,$userid,'".$devid."','".$offerid."','sent')";

					//echo "\nQuery:".$sql;
					 
					if(mysql_query($sql))
					{
						echo "{\"message\":\"Successfully sent\"}";
					}

				}else{
					echo "{\"message\":\"No notifications are available\"}";
				}
			}else{
				echo "{\"message\":\"User is not registered for Push notification\"}";
			}

		}else{			//General topic, push message to all push registered users

			//Get message based on topic such as 'general' or 'com.progeo.hyperspot' or any other topic.
			//This message will go to all the push registered users

			$sql = "SELECT * FROM `push_offers`	WHERE `region`='".$topic."'";

			$result = mysql_query($sql,$conn) or die('Errant query:  '.$sql);
			
			//echo "\nQuery:".$sql;

			 while($row = mysql_fetch_assoc($result)){
			 	 $offerid = $row['slno'];
				 $message = $row['message'];
				 $title = $row['title'];
				 $subtitle = $row['subtitle'];
		 	 }
			
			if(mysql_num_rows($result)) {
				// prep the bundle
				$msg = array
				(
					'message'=> $message,
					'title'=> $title,
					'subtitle'=> $subtitle,
					'tickerText'=> 'Ticker..',
					'vibrate'=>1,
					'sound'=>1,
					'largeIcon'=>'large_icon',
					'smallIcon'=>'small_icon'
				);

				$fields = array
				(
					'registration_ids'=>$registrationIds,
					'data'=>$msg
				);

				$headers = array
				(
					'Authorization: key=' . API_ACCESS_KEY,
					'Content-Type: application/json'
				);

				$ch = curl_init();
				curl_setopt( $ch,CURLOPT_URL, $fcm_send_url );
				curl_setopt( $ch,CURLOPT_POST, true );
				curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
				curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
				$result = curl_exec($ch );
				curl_close( $ch );

				//echo "\nFCM Response:".json_encode($result);

				//Save to push log

				$sql = "INSERT INTO  `push_log` (`slno`, `user_id` ,`dev_id`,`offer_id`, `status`) 
				VALUES (0,$userid,'".$devid."','".$offerid."','sent')";

				//echo "\nQuery:".$sql;
				 
				if(mysql_query($sql))
				{
					echo "{\"message\":\"Successfully sent\"}";
				}

			}else{
				echo "{\"message\":\"No notifications are available\"}";
			}
		}


	/*

	//POST: https://fcm.googleapis.com/fcm/send
	//HEADER: Content-Type: application/json
	//HEADER: Authorization: key=AIzaSy*******************
	{
	  "notification":{
	    "title":"Notification title",
	    "body":"Notification body",
	    "sound":"default",
	    "click_action":"FCM_PLUGIN_ACTIVITY",
	    "icon":"fcm_push_icon"
	  },
	  "data":{
	    "param1":"value1",
	    "param2":"value2"
	  },
	    "to":"/topics/topicExample",
	    "priority":"high",
	    "restricted_package_name":""
	}
	//sound: optional field if you want sound with the notification
	//click_action: must be present with the specified value for Android
	//icon: white icon resource name for Android >5.0
	//data: put any "param":"value" and retreive them in the JavaScript notification callback
	//to: device token or /topic/topicExample
	//priority: must be set to "high" for delivering notifications on closed iOS apps
	//restricted_package_name: optional field if you want to send only to a restricted app package (i.e: com.myapp.test)

	*/


?>

