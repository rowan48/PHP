<?php
//require_once 'config.php';
$msg = array();
$name = $email= $message="";
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
    $name =$_POST["name"];
    $email=$_POST["email"];
    $message=$_POST["message"];
    if (strlen($name)< 10){
        $msg[]="enter a name which is greater than or equal 10 character<br>";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg[]= "Invalid email format<br>";
    }
    if (strlen($message)>255){
        //echo "strlen($name)";
        $msg[]="enter a text which is smaller than or equal 255 character<br>";
    }
    if (empty($msg)){
        //echo "$name";
        $mydate=date("F j Y g:i a");
        $mytxt= "User IP - ".$_SERVER['REMOTE_ADDR'];
        $fp = fopen("log.txt","a+");
        $txt="Name: $name </br>Email: $email </br>text: $message </br> IP: $mytxt </br> the date is :$mydate";
        fwrite($fp,$txt.PHP_EOL);
        // $txtip=""User IP - ".$_SERVER['REMOTE_ADDR']";
        fclose($fp);
        die("Thanks for contacting us <br>Name: $name <br>Email: $email <br>text: $message");
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
    $_session["counter"]=isset($_session["counter"])?$_session["counter"]+1:2;
    echo "you visited this site".$_session["counter"]."times";
}
    print_r($_SESSION);
    ?> </h3>
        <h4><?php foreach ($msg as $line){
            echo "**$line";
            $msg[]="";
            } ?></h4>
        <div id="after_submit">
            
        </div>
        <form id="contact_form" action="lab2-part1.php" method="POST" enctype="multipart/form-data">

            <div class="row">
                <label class="required" for="name">Your name:</label><br />
                <input id="name" class="input" name="name" type="text" value="<?php get_default("name");?>" size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="email">Your email:</label><br />
                <input id="email" class="input" name="email" type="text" value="<?php get_default("email");?>" size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="message">Your message:</label><br />
                <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />

            </div>

            <input id="submit" name="submit" type="submit" value="Send email" />
            <input id="clear" name="clear" type="reset" value="clear form" />



        </form>
    </body>

</html>
