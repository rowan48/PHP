
<?php
$admin="admin";
$msg = array();
$password = $email= $message="";
$success = false;
function get_default($myfield){
    if (isset($_POST[$myfield])){
        echo $_POST[$myfield];
    }
    else {
        echo "";
    }

}


if (isset($_POST["submit"])) {
    foreach ($_POST as $field){
        if (empty($field)){
            $msg[]="all fields are required";
        }

    }
    $password =$_POST["password"];
    $email=$_POST["email"];
    if ($password!="admin "|| $email!="admin@gmail.com"){
        $msg[]="enter a correct information</br>";


    }
    if ($password =="admin" && $email=="admin@gmail.com"){
        header("Location: page-to-go-after-login.php");


    }
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg[]="enter an email</br>";
}
    if (empty($msg)){
        //echo "$name";
        $mydate=date("F j Y g:i a");
        $mytxt= "User IP - ".$_SERVER['REMOTE_ADDR'];
        $fp = fopen("log.txt","a+");
        $txt="Email: $email </br>password: $password</br> IP: $mytxt </br> the date is :$mydate";
        fwrite($fp,$txt.PHP_EOL);
        // $txtip=""User IP - ".$_SERVER['REMOTE_ADDR']";
        fclose($fp);
        //die("Thanks for contacting us <br>Name: $name <br>Email: $email <br>text: $message");
    }

}


?>




<html lang="en">
<head>
    <title> contact form </title>
</head>

<body>
<h3> <?php
    session_start();
    if (!isset($_SESSION["is_visited"])){
        echo "first visit,Hello!";
        $_SESSION["is_visited"]=true;
    }
    else {
        $_SESSION["counter"]=isset($_SESSION["counter"])?$_SESSION["counter"]+1:2;
        echo "you visited this site".$_SESSION["counter"]."times";
    }
    print_r($_SESSION);
    ?> </h3>
<h4><?php foreach ($msg as $line){
        echo "**$line";
        $msg[]="";
    } ?></h4>
<div id="after_submit">

</div>
<form id="contact_form" action="login.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <label class="required" for="email">Your email:</label><br />
        <input id="email" class="input" name="email" type="text" value="<?php get_default("email");?>" size="30" /><br />
    </div>

    <div class="row">
        <label class="required" for="name">Your password:</label><br />
        <input id="password" class="input" name="password" type="password" value="<?php get_default("password");?>" size="30" /><br />

    </div>


    <input id="submit" name="submit" type="submit" value="login" />
    <!--<input id="clear" name="clear" type="reset" value="clear form" />-->



</form>
</body>

</html>

