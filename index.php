<?php

    $error = "";

    $successMsg = "";

    if($_POST){

    if(!$_POST["email"]){
        
        $error .= "An email address is required.<br>";
        
    }

    if(!$_POST["subject"]){
        
        $error .= "The subject field is required.<br>";
        
    }

    if(!$_POST["content"]){
        
        $error .= "The content field is required.<br>";
        
    }

    if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
        
    $error .= "The email address is invalid.<br>";
    }

    if($error != ""){
        
        $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' .$error . '</div>';
        
    } else {
        
        $emailTo = "";
        
        $subject = $_POST["subject"];
        
        $content = $_POST["content"];
        
        $headers = "From: " .$_POST["email"];
        
        if(mail($emailTo, $subject, $content, $headers)){
            
            $successMsg = '<div class="alert alert-success" role="alert">Your message was sent. We will get back to you ASAP!</div>';
            
        } else {
            
            $error =  '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent - Please try again later!</strong></p></div>';
            
        }
        
    }
       
        
    }


?>

<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Form Submission</title>
      
      <style type = "text/css">
      
          #wrapper {
              
              width: 1000px;
              margin: 0 auto;
              
          }
          
      </style>
      
  </head>
    
  <body>
      
<div id = "wrapper">
      
    <h1>Get in touch!</h1>

    <div id = "error"><? echo $error.$successMsg; ?></div>
      
    <form method="post">
        
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name = "email" placeholder="Enter email">
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input class="form-control" name = "subject" id="subject" placeholder="Enter the subject here">
      </div>

        <div class="form-group">
            <label for="content">Enter your Message</label>
            <textarea class="form-control" name = "content" id="content" rows="3"></textarea>
      </div>

      <button type="submit" class="btn btn-primary" id = "submit">Submit</button>
        
    </form>
          
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
          
      
      <script type="text/javascript">
      
      
        $("form").submit(function (e) {
            
            var errorMsg = "";
            
            if($("#email").val() == ""){
                
                errorMsg += "The email field is required. <br>";
                
            }
            
            if($("#subject").val() == ""){
                
                errorMsg += "The subject field is required. <br>";
                
            }
            
            if($("#content").val() == ""){
                
                errorMsg += "The content field is required.";
                
            }
            
            if(errorMsg != ""){
                
            $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + errorMsg + '</div>');
                
                return false;
                
            } else {
                
                return true;
                
            }
            
        });
      
      </script>
          
  </body>
</html>