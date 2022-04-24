<?php

   $hostName='localhost';
   $userName='root';
   $userPass='';
   $dbName='se-project';

   // $hostName='fdb34.awardspace.net';
   // $userName='4045722_evaluationproject';
   // $userPass='sc]D(aWd8eW3^O#C';
   // $dbName='4045722_evaluationproject';

   $db=mysqli_connect($hostName,$userName,$userPass,$dbName);

   // $db = mysqli_connect('localhost', 'root', '', 'user_data') or die("could not connect to the database");

   /*if(!$con){
   	echo "connection failed";
   }
   else
   	echo "connection succes";*/

?>