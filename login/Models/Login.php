
<?php

class Login
{
//to check if this user is logged in or no? through the session(user id ) if there is a userid and numeric this means that this user logged in and can access the pages that needs a loged in user
    static function check_Login(){
        if (isset($_SESSION["userid"])&&is_numeric($_SESSION["userid"])){
            return true;
        }elseif(isset($_COOKIE["remember_me"])&& $_COOKIE["remember_me"]==correct_token){
            $_SESSION["userid"] =5;
            return true;
        }else{
            return false;
        }

    }
    static function Authenticate ($entered_username,$entered_password , $remember_me)
    {
        /////**********************************
        if (isset($_POST["username"])) {
            $words = file("mydata.txt");
           foreach ($words as $line){
               //echo"<br>$line<br>";
           }
          // echo " kkkkkk $words[1]";
           // echo "$entered_username";
            if (in_array($entered_username, $words)) {
                    // echo "jjjjjj";
                if ($remember_me) {
                    self::remember();
                }
                return true;
            } else {
                return false;
            }


        }
    }

        //******************************************
        //it is supposed to read here the data from the database
        /*if($entered_username==correct_username && sha1($entered_password)==correct_password ){
            if($remember_me){self::remember();}
            return true;
        }
        else{
            return false;
        }

    }*/
    static function remember(){
        setcookie("remember_me","fhgtfgku0876rewedfgholkiu8765r4ewqwsdfghj",2147483647);

    }
}