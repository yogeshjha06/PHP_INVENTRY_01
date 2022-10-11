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
  border: 1px solid #DD9BFE;
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
<li><a href='http://localhost/nimo/pur.php?id=$row[id]&email=$email'>Purchase</a></li>
<li><a href='http://localhost/nimo/sale.php?id=$row[id]&email=$email'>Sale</a></li>
<li><a class='active'>Report</a></li>
<li><a href='http://localhost/nimo/msg.php?id=$row[id]&email=$email'>Chatt</a></li>
<li class='topics'><a href='http://localhost/nimo/login.php'>Log Off</a></li>
";

?>





<table id="customers">

<tr>
    <th>S.No</th>
    <th>Brand</th>
    <th>Item</th>
    <th>Sale</th>
    <th>Purchase</th>
    <th>Stock</th>
    <th>Client</th>
    <th>Date</th>
    <th>Time</th>    
  </tr>


<?php
      $sql="SELECT s.brand, s.item, s.amount, p.pamount, p.cid, p.date, p.time FROM sale s INNER JOIN pur p ON s.uid=p.uid AND s.uid=$id";
      $result=$con->query($sql);
      $no=1;
      while($row=$result->fetch_assoc())
      {
        $a=($row['amount'])-($row['pmount']);
        echo"
        <tr>
          <td>".$no."</td>
          <td>".$row["brand"]."</td>
          <td>".$row["item"]."</td>  
          <td>".$row["amount"]."</td>
          <td>".$row["pamount"]."</td>
          <td>".$a."</td>
          <td>".$row["cid"]."</td>
          <td>".$row["date"]."</td>
          <td>".$row["time"]."</td>
        </tr>
        ";
        $no++;
      }
?>
</table>


</body>
</html>