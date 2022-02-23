<?php

if(file_exists("log.txt")){
    $imported_content = file_get_contents("log.txt");
    foreach ($imported_content as $line) {
        echo "$line";//array
        echo "<br/>";
        echo"-------------------------------------------------------------";
        echo "<br/>";


    }
    //$imported_content_2 = file_get_contents("log.txt"); //string
    //$imported_contents_3 = file_get_contents("https://google.com.eg");
    //var_dump($imported_content);
    //$words = implode(" ",$imported_content);
    //echo "$words";


}




