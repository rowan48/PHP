<?php
//get like select all
$glasses=Illuminate\Database\Capsule\Manager::table("items")->get();
//********var_dump($glasses);
$glass = Illuminate\Database\Capsule\Manager::table("items")->first();

//var_dump($glass);
//***objects and arrays cannot get into strings****//
//echo "<h5>".$glass->product_name."</h5>";
//echo "<h5>" . $glasses->product_name . "<h5>";

//****looping on the whole record as key and value******//

foreach ($glass as $key=>$value){
    echo "<h5>".$key."->".$value."</h5>";
}
//*****to search on specific record with id(primary-key)**//
$searched_glasses =Illuminate\Database\Capsule\Manager::table('items')->find(91);
foreach ($searched_glasses as $key=>$value){
    echo "<h5>".$key."->".$value."</h5>";
}

//***onsearching for something with something rather than pk**//
//**where (column),(operator),(value searching for)
$searched_glassesinusa =Illuminate\Database\Capsule\Manager::table('items')->where("CouNtry","=","USA")->get();
foreach ($searched_glassesinusa as $usa){
    echo"<br>==================================================<br>";
    foreach ($usa as $key=>$value) {
        echo "<h5>" . $key . "->" . $value . "</h5>";
    }
}
//**to get the count of the records **//
$count_usa =Illuminate\Database\Capsule\Manager::table('items')->where("CouNtry","=","USA")->count();
echo"no of glasses in usa are $count_usa";

//************************************************************************************************************************
//**how to make a grid**//







