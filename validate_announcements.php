<?php
/*=============================================================*/
#### How to Validate Form with PHP - Server Side Validation ####
#### Author	: 	Joshua Chua					####
#### site	: 	http://tssappclub.com/announcements							####
#### email	:	wimwin.chua@gmail.com				####
/*=============================================================*/

$error = ""; // Initialize error as blank

if (isset($_POST['submitForm'])) { // check if the form is submitted

    #### removing extra white spaces & escaping harmful characters ####
	$user 			= 'nigsnfmy_tssuser'; 
    $password = $_POST['password']; 
	$announcement_date 		= $_POST['date'];
	$announcement_html		= $_POST['announcementText'];
    $ip = "";
	
	#### start validating input data ####
	#####################################

     if(empty($_POST['password'])) {
        $error = "Please enter the correct password";
        } 

	# Validate Date
		// if its not alpha numeric, throw error
		 if (isset($_POST['date']) && !empty($_POST['date']) && $_POST['date'] != null) {
             $announcement_date = $_POST['date'];
         } else {
             $error = "Invalid date provided.";
         }


	# Validate announcement text 
		///* if its empty, set error variable
		if (empty($_POST['announcementText'])) { 
			$error = "Please enter announcements in the textbox provided";
		} 
    
        if($error == "") {
            $readyToPost = "ok"; 
        }
    
    #Get IP address of user 
    
     if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }

	#### end validating input data ####
	#####################################
}


