<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
<body>
<head>
  <title>Nimo</title>





  <script>
    function preventBack()
    {
      window.history.forward()
    };
    setTimeout("preventBack()",0);
    window.onunload=function()
    {
      null;
    }
  </script>








  <style>
              body {
            font-size: 18px;
          }

          
table.center {
  margin-left: auto; 
  margin-right: auto;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #BA55D2;
  color: white;
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
          text-decoration: none;
        }

        button:hover {
          background-color: #BA55D3;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
          text-decoration: none;
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

        .topics{
            float: left;
        }
  </style>
</head>

<?php

        $id=$_GET['id'];
        $email=$_GET['email'];
              
        $server="localhost";
        $username="root";
        $password="";
        $dbname="nimo";

        $con=mysqli_connect($server,$username,$password,$dbname);

                //signup table
                $sql = "SELECT id FROM signup WHERE email = '$email'";
                $result=$con->query($sql);
                $row=mysqli_fetch_array($result); 

?>

<ul>
<?php

echo"
<li><a href='http://localhost/nimo/home.php?id=$email'>Brand</a></li>
<li><a href='http://localhost/nimo/item.php?id=$row[id]&email=$email'>Item</a></li>
<li><a href='http://localhost/nimo/client.php?id=$row[id]&email=$email'>Client</a></li>
<li><a class='active'>Purchase</a></li>
<li><a href='http://localhost/nimo/sale.php?id=$row[id]&email=$email'>Sale</a></li>
<li><a href='http://localhost/nimo/repo.php?id=$row[id]&email=$email'>Report</a></li>
<li><a href='http://localhost/nimo/msg.php?id=$row[id]&email=$email'>Chatt</a></li>
<li class='topics'><a href='http://localhost/nimo/login.php'>Log Off</a></li>
";



//brand dropdown menu connection


$sql= "SELECT * FROM `brand` WHERE uid=$id";
$result1=mysqli_query($con,$sql);

?>




</ul>

<form method="post">
<div class="container">
  <table class="center">

      <tr>
        <td><label for="b">Brand Name</label></td>
        <td>
            <select name="b" id="b">
                <?php while ($row1=mysqli_fetch_array($result1)):; ?>
                <option value="<?php echo$row1[1];?>"><?php echo$row1[1];?></option>
                <?php endwhile;?>
            </select>
        </td>
        </tr>

        <?php

            //item table list

            $sql1= "SELECT * FROM `item` WHERE uid=$id";
            $result2=mysqli_query($con,$sql1);
        
        ?>

        <tr>
        <td><label for="item">Item Name</label></td>
        <td>

            <select name="item" id="item">                
                <?php while ($row2=mysqli_fetch_array($result2)):; ?>
                <option value="<?php echo$row2[2];?>"><?php echo$row2[2];?></option>
                <?php endwhile;?>
            </select>

        </td>
        </tr>


        <tr>
        <td><label for="amount">Amount</label></td>
        <td><input type="text" placeholder="Amount of Item" name="amount" ></td>
        </tr>

        <?php

            //client table list
            $sql3= "SELECT * FROM `client` WHERE uid=$id";
            $result3=mysqli_query($con,$sql3);

        ?>
        <tr>
        <td><label for="client">Client</label></td>
        <td>

            <select name="client" id="client">
                <?php while ($row3=mysqli_fetch_array($result3)):; ?>
                <option value="<?php echo$row3[1];?>"><?php echo$row3[1];?></option>
                <?php endwhile;?>
            </select>

        </td>
        </tr>

        <tr>
        <td colspan="2"><button type="submit" name="submit">Purchase</button></td>
        </tr>

  </table>
</div>

<?php
date_default_timezone_set('Asia/Kolkata');
$date = date("d/m/y");
$time = date("h:i:s");
$item=$_POST['item'];
$amount=$_POST['amount'];
$client=$_POST['client'];
$brand=$_POST['b'];
?>


<?php
      
      //item table

if(isset($_POST['submit']))
        
        {
            

                $query="INSERT INTO `pur`(`brand`, `item`, `pamount`, `uid`, `cid`, `date`, `time`) VALUES ('$brand','$item','$amount','$id','$client','$date','$time')";
                $run=mysqli_query($con,$query);
              
                      if($run)
                      {

                      }
                      else
                          echo"<script>                
                                  alert('Error: 101!');
                              </script>";
          }     
      



?>


<table id="customers">

<tr>
    <th>S.No</th>
    <th>Brand</th>
    <th>Item</th>
    <th>Purchase</th>
    <th>Client</th>
    <th>Date</th>
    <th>Time</th>
    <th colspan="2">CURD</th>
  </tr>


<?php
      $sql="SELECT * FROM pur WHERE uid = '$id'";
      $result=$con->query($sql);
      $no=1;
      while($row=$result->fetch_assoc())
      {
        echo"
        <tr>
          <td>".$no."</td>
          <td>".$row["brand"]."</td>
          <td>".$row["item"]."</td>
          <td>".$row["pamount"]."</td>
          <td>".$row["cid"]."</td>
          <td>".$row["date"]."</td>
          <td>".$row["time"]."</td>
          <td> <button><a href='http://localhost/nimo/purdel.php?id=$row[id]'>Delete</a></button></td>       
          <td> <button><a href='http://localhost/nimo/purins.php?id=$row[id]&email=$email'>Edit</a></button></td>  
        </tr>
        ";
        $no++;
      }
      
?>
</table>


</body>
</html>