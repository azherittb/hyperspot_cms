<?php
	$fcm_api_access_key = 'AAAABWtamP0:APA91bHqPDRKzoSFCThyboNMHuZmb3BhWeG7wXak5_--ez3pb-WDj9WpMBK2B6phWgYzxd2eQsf_QovqVapomjG6WIkhgUA1zLPhXG_otup6LGqeqL02563cnIyJNbYCmZuxO7Q63Gj4';
	$fcm_send_url = 'https://fcm.googleapis.com/fcm/send';
    
    $dbhost = 'localhost';
    $dbname = 'hspush';
    $dbuser = 'root';
    $dbpass = 'root';

    $conn = mysql_connect($dbhost, $dbuser, $dbpass);    

    if(!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($dbname);
?>