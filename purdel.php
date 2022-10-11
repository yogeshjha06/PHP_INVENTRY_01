<?php


      $id=$_GET["id"];
      $url=$_SERVER['HTTP_REFERER'];

      
      $server="localhost";
      $username="root";
      $password="";
      $dbname="nimo";

      $con=mysqli_connect($server,$username,$password,$dbname);

      $sql="DELETE FROM pur WHERE id=$id";
      $result=$con->query($sql);

      if($result)
      {
        header("location: $url");
      }
      else
      {
        die("QUery Error: ".$con->error);
      }

      
      exit;

?>