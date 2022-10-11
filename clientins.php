<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
<body>
<head>
  <title>Nimo</title>



  <style>
              body {
            font-size: 18px;
          }

          ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #8A2BE2;
            position: -webkit-sticky; /* Safari */
            position: sticky;
            top: 0;
          }

          li {
            float: left;
          }

          li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
          }

          li a:hover {
            background-color: #BA55D2;
          }
            .active {
          background-color: #BA55D3;
        }

        input[type=text], input[type=password], select {
          width: 30;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
        }

        button {
          background-color: #8A2BE2;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
        }

        button:hover {
          background-color: #BA55D3;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
        }

        .cancelbtn {
          width: auto;
          padding: 10px 18px;
          background-color: #f44336;
        }


        img.avatar {
          width: 40%;
          border-radius: 50%;
        }

        .container {
          padding: 16px;
        }

        span.psw {
          float: right;
          padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
          span.psw {
            display: block;
            float: none;
          }
          .cancelbtn {
            width: 100%;
          }
        }
        table.center {
          margin-left: auto; 
          margin-right: auto;
        }
  </style>
</head>


<?php
      $id=$_GET["id"];      
      $email=$_GET['email'];


      $server="localhost";
      $username="root";
      $password="";
      $dbname="nimo";


  


      $con=mysqli_connect($server,$username,$password,$dbname);


      $sql = "SELECT id FROM signup WHERE email = '$email'";
      $result=$con->query($sql);
      $row=mysqli_fetch_array($result); 

      $url="http://localhost/nimo/client.php?id=$row[id]&email=$email";
?>


<ul>

  <li><a class="active" href=""> Update Client</a></li>
  <li><a href="http://localhost/nimo/login.php"> Logoff </a></li>

</ul>

<form action="" method="post">
<div class="container">
  <table class="center">
 


        <tr>
        <td><label for="client">Client</label></td>
        <td><input type="text" placeholder="Enter New Client" name="client" ></td>
        </tr>

        <tr>
        
        <td><button type="submit" name="back">Back</button></td>
        <td><button type="submit" name="submit">Update</button></td>
        </tr>

  </table>
</div>


</form>

<?php

      $client=$_POST['client'];  

      if(isset($_POST['submit']))
      {           
            $sql="UPDATE `client` SET `client`='$client' WHERE id=$id";
            $result=$con->query($sql);

            if($result)
            {
                header("location: $url");
            }                        
     }
     if(isset($_POST['back']))
      {  
        header("location: $url");                      
      }
?>


</body>
</html>