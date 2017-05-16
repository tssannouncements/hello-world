<?php 
	include('validate_announcements.php');
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" /><link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" /></head>

<body>
    
    <h1 id = "title"> TSS Announcements Entry </h1>    
    <br> 
    <?= $error?>

    
    <form action="/tss/announcements/announcements.php" onsubmit = "setAnnouncementText();" method = "POST">
    Enter password: <input id = "password" type = "password" name = "password">  
    <br> 
    <br> 
    
    Enter date: <input id = "date" type="date" name="date">
        
    <h3 id = "prompt"> Enter today's announcements below: </h3>    
    <div id="announcementTextbox"></div>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>

    <br> 
    <br>
    <input type = "hidden" id = "announcementText" name = "announcementText"/>
    <input type = "submit" value="Submit" id = "submitForm" name = "submitForm">
</form> 
 
</body>
   
    
<script> 
    /*window.onload = function() {
        
        do {
            var userPassword = prompt("Please enter the password: ");
            if(userPassword == "tss") {
                confirm("Welcome."); 
            } else {
                alert("Incorrect Password."); 
            }
        } while(userPassword!= "tss");

    }*/
</script>

<script> 
    function setAnnouncementText() {
        $('#announcementText').val($('div#announcementTextbox').froalaEditor('html.get'));
    }
</script>

<script> 
$(function() {
    $('div#announcementTextbox').froalaEditor({
      toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', '|', 'specialCharacters', 'color', 'emoticons', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '-', 'quote', 'insertHR', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', '|', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html', 'applyFormat', 'removeFormat', 'fullscreen', 'print', 'help'],
      pluginsEnabled: null
    })
  });
</script>
    
    <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

        if($readyToPost == "ok") {

            $link = mysqli_connect("localhost", $user , "tssannouncements2017", "nigsnfmy_tssappclub");

            // Check connection
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            // Attempt insert query execution

            $sql = "INSERT INTO announcements (user, announcement_date, announcement_html, last_modified_date, ip_address ) VALUES ('$user', '$announcement_date', '$announcement_html', CURRENT_TIMESTAMP(), '$ip') ON DUPLICATE KEY UPDATE announcement_date = '$announcement_date', announcement_html = '$announcement_html'";
            
            
            
            if(mysqli_query($link, $sql)){
                echo "Records inserted successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }

            // Close connection
            mysqli_close($link);
            $readyToPost = "";
        }

    ?>
    
   
    
    
    
    
    
    
    
    
    
    
    
    

</html>