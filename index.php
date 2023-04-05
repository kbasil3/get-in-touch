<?php

$error= "";

$successMessage="";

if($_POST){
    if(!$_POST["email"]){
        $error .="An email address is required<br>";
    }
    if(!$_POST["content"]){
        $error .="Content is required<br>";

    }
    if(!$_POST["subject"]){
        $error .="A subject is required<br>";
    }
    if($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false){
        $error .="The email address is invalid <br>";
    }

    if($error != ""){
        $error = '<div class="alert alert-danger" role="alert"><p><There were errors in your form</p>' .$error . '</div>';
    }
    else{
        $emailTo="basilkm321@gmail.com";
        $subject=$_POST['subject'];
        $content=$_POST['content'];
        $headers="From: " .$_POST['email'];

        if(mail($emailTo,$subject,$content,$headers)){
            $successMessage= '<div class="alert alert-success" role="alert"> Your message was sent ' . 
            'we\'ll get back to you ASAP</div>';
        }
        else{
            $error = '<div class="alert alert-danger" role="alert"> Your message couldn\'t be sent try again </div>';

        }
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fitness">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="container-fluids">
    

<div class="container-md py-4">




<div class="container">
            <h1>Get in touch!</h1>
            <div id="error"><?php echo $error.$successMessage; ?></div>

            <form method="post">
                <fieldset class="form-group">
                    <label for="email">Email address </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    <small class="text-muted">We'll never share your e-mail with anyone else.</small>
                </fieldset>

                <fieldset class="form-group">
                    <label for="subject">Subject </label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </fieldset>

                <fieldset class="form-group">
                    <label for="content">What would you like to ask us?</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                </fieldset>

                <button type="submit" id="submit" class=" btn btn-primary">Submit</button>
            </form><!-- end of the form -->
        </div><!-- end of container div -->


<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

<script type="text/javascript">
    $("form").submit(function(e){
        let error="";
        if($("email").val()==""){
            error += "the email field is required <br>"
        }
        if($("subject").val()==""){
            error +="the subject field is required <br>"
        }
        if($("content").val()==""){
            error +="the content field is required <br>"
        }

        if(error !=""){
            $("#error").html('<div class="alert alert-danger"' +'role="alert"><p><strong>There were errors in your form </strong></p>' + error + '</div>');

            return false;
        }

        else{
            return true;
        }
    })
    </script>

    </body>
</html>