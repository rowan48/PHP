<?php
session_start();
require_once ("vendor/autoload.php");
use Illuminate\Database\Capsule\Manager as Capsule;//class manager that is used to establish the connection for the database
$Capsule = new Capsule();
$Capsule->addConnection([
    "driver"=>_driver_,
        "host"=>_host_,
        "database"=>_database_,
        "username"=>_username_,
        "password"=>_password_
    ]);
$Capsule->setAsGlobal();
$Capsule->bootEloquent();
//$glasses=$Capsule::table("items")->get();
//var_dump($glasses);
require_once ("views/intro.php");
//**make a grid for db**//
$index = (isset($_GET["index"]) && is_numeric($_GET["index"]) && $_GET["index"] > 0) ? (int) $_GET["index"] : 0;
$all_requrds= Capsule::table("items")->skip($index)->take(_Pager_size_)->get();
$count=Capsule::table("items")->max("id");
$next_index = (($index +_Pager_size_)<=$count)?$index +_Pager_size_:0;
//$next_index = $index +_Pager_size_;
$next_link = "http://localhost/login/index.php?index=$next_index";
$previous_index = (($index - _Pager_size_)>=0)?$index - _Pager_size_:0;
$previous_link = "http://localhost/login/index.php?index=$previous_index";


require_once ("views/items.php");//=>this page to view the whole items


//**to view specific items from the table use table.php
require_once ("views/table.php");
echo"<br>";
echo"<br>";
echo"<br>";
echo "=========================================";
echo $count;
echo"<br>";
echo"<br>";
echo "===========================================";

//*********************************************************

$username="";
$password="";
$remember_me=false;

if (isset($_POST["submit"])) {
    $username=$_POST["username"];
    $password=$_POST["password"];
    if (isset($_POST["checkbox"])){
        $_POST["remember_me"]=true;

    }
    $_SESSION["name"]=$username;
    counter::counts();
    $my_user = new user($username, $password);//will be send to  the db
    var_dump($my_user);
    if(Login::Authenticate($_POST["username"],$_POST["password"],$_POST["remember_me"]))
    { $_SESSION["userid"]=5;
   $page="user";}
    else {
        echo "not found";
        $page="login";
    }

}


/*
if (isset($_POST["username"])){
    counter::counts();
    $my_user = new user("$username", "$password");//
    var_dump($my_user);

    /*if(Login::Authenticate($_POST["username"],$_POST["password"])){
        $_SESSION["userid"]=5;//it is supposed to sent this data to the database and retrieve the id from the db id then add it to the session userid;
        header("Location: index.php?page=user");
    }else{
        echo"error data";
    }*/
//}

else {
    if (!Login::check_Login()) {
        //if the user is not logged in redirect him to the login page
        //for future use we will use the header part to redirect the user for login page
        //for now we will use the require_once as we will reload this page;
        //require_once ("views/login.php");
        $page = "login";
       // counter::counts();

    } else {
        //if the user is logged in
       // $my_user = new user("$username", "$password");//
        //it is supposed to take the data of the user from the entered usernam & password
        echo "<br>";
        echo"my_user";
        echo"<br>";
        ///var_dump($my_user);
        $page = "user";
        echo "<center>================WELCOME====================</center>";

    }

}
$pages = array("login", "user");
//$page = (isset($_GET["page"]) && in_array($_GET["page"], $pages)) ? $_GET["page"] : "login";
require_once("views/$page.php");


