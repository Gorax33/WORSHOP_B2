<?php

    try{
        $user = "root";
        $pass = "";
        $db = new PDO('mysql:host=localhost;
                        dbname=wssn2;
                        charset=utf8;
                        port=3306;',
                        $user,
                        $pass);
    }catch(Exception $e){
        die("Erreur : ".$e->getMessage());
    }