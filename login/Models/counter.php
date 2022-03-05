<?php

class counter
{
    public static $count=0;

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }
    private $fp=array();


    static function counts(){
        $countVal =0;
        $fp = fopen("mydata.txt","a+");//read the data from the file
        //var_dump($fp);
        $fr=file_exists("mydata.txt");
        $counterVal = fread($fp, filesize("mydata.txt"));
        $words=explode(PHP_EOL, $counterVal);//from string to array
       // var_dump($words);//===============================
        if (isset($_POST["username"])) {
            if (!in_array($_POST["username"], $words)) {
                // $countVal++;
                fwrite($fp, $_POST["username"]. PHP_EOL);

            }
        }
           // header("Location:index.php");
            //$second = 10;
            //header("Refresh:$second");
            $nocounts= count($words);
            //$novisitors=$nocounts-1;

        echo "You are visitor number  to this site $nocounts";//======================================


        //$counterVal = fread($fp, filesize("mydata.txt"));
        fclose($fp);



        /* if(filesize("mydata.txt")){
             $fr=fread($fp,filesize("mydata.txt"));
             fclose($fp);
             $words=explode(PHP_EOL, $fr);//from string to array
             $words2=array_pop($words);
             var_dump($words);
         }*/
        /*if (isset($_SESSION["name"])){
            foreach ($words as $user){
                if ($_SESSION["name"]==$user){

                }else{
                    //$this->count=$count++;
                    //$this->count=$count++;

                }
            }
            if (!in_array($_SESSION["name"], $words)){
                //$this->setCount($count++);


                //self::$count++;

            }
            echo"<br";

            echo "heloo";
            echo "<br>";
            echo self::$count;

        }*/
        /* if (isset($_SESSION["userid"])&&is_numeric($_SESSION["userid"])){
             return true;
         }else{
             return false;
         }*/


    }
}


