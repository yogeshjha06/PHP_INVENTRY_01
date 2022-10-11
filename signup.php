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

<ul>

  <li><a class="active" href="http://localhost/nimo/signup.php">SignUp</a></li>
  <li><a href="http://localhost/nimo/login.php">LogIn</a></li>

</ul>


<form action="http://localhost/nimo/signup.php" method="post">
<div class="container">
  <table class="center">
 
        <tr>

        <td><label for="name">Name</label></td>
        <td><input type="text" placeholder="Enter Name" name="name" required ></td>
        </tr>

        <tr>
        <td><label for="email">Email Id</label></td>
        <td><input type="text" placeholder="Email Id" name="email" required ></td>
        </tr>


        <tr>
        <td><label for="number">Number</label></td>
        <td><input type="text" placeholder="Phone number" name="number" required ></td>
        </tr>

        <tr>
        <td><label for="sex">Gender</label></td>
        <td>
        
        <select name="sex" id="sex">
          <option value="Female">male</option>
          <option value="Male">female</option>
          <option value="Other">other</option>
        </select>

        </td>
        </tr>

        <tr>
        <td><label for="pwd">Password</label></td>
        <td><input type="password" placeholder="Password" name="pwd" required ></td>
        </tr>

        <tr>
        <td colspan="2"><button type="submit" name="submit">Sign Up</button></td>
        </tr>

  </table>
</div>


</form>

<?php

$server="localhost";
$username="root";
$password="";
$dbname="nimo";

$con=mysqli_connect($server,$username,$password,$dbname);

if(isset($_POST['submit']))
{
  if(!empty($_POST['email']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $sex=$_POST['sex'];
    $pwd=$_POST['pwd'];


    $query="INSERT INTO `signup`(`name`, `email`, `number`, `sex`, `pwd`) VALUES ('$name','$email','$number','$sex','$pwd')";
    $run=mysqli_query($con,$query);
      
    if($run)
        echo" <script>                
                    alert('Sign Up Success!');
              </script>";
    else
        echo"
              <script>
                    alert('error: Sign Up, please try again!');
              </script>
        ";

  }
  else
    echo"<script>
                  alert('Error 101: Invalid Entry!');
         </script>";
}


?>


</body>
</html>