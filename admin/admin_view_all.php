<?php
include_once "../db.php";

$dbarray = array('regid', 'name', 'course', 'email', 'hp_no', 'reg_date', 'administrator');

$email = $_COOKIE['user'];
$query = "SELECT `regid`, `name`, `course`, `email`, `hp_no`, `reg_date`, `administrator` FROM members";
$result = mysqli_query($db, $query);

function td($i)
{
   return "<td>$i</td>";
}
function th($i)
{
   return "<th scope='row'>$i</th>";
}
?>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" type="text/css">
   <link rel="stylesheet" href="../css/style.css" type="text/css">
   <link rel="stylesheet" href="../css/account.css" type="text/css">
   <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
   <title>Admin</title>
</head>

<body>
   <div id="preloader"></div>
   <!--TODO: Header, Nav, Article, Aside-->
   <nav>
      <ul class="nav d-flex justify-content-center align-items-center fixed-top navaddpage">
         <li class="nav-item"><a class="nav-link" href="../index.html">Home</a></li>
         <li class="nav-item"><a class="nav-link" href="../course.php">Course</a></li>
         <li class="nav-item"><a class="nav-link" href="../account.php"><i class="fa-solid fa-user"></i></a></li>
      </ul>
   </nav>

   <div class="container-bg">
      <div class="container dynamic-table justify-content-center">
         <nav>
            <ul class="nav list-unstyled bg-transparent">
               <li class="nav-item account-item"><a id='viewphp' class="nav-link" href="admin_view_all.php">View</a></li>
               <li class="nav-item account-item"><a id='insert' class="nav-link" href="admin_add.php">Add</a></li>
               <li class="nav-item account-item"><a id="updatephp" class="nav-link" href="admin_update.php">Update</a></li>
               <li class="nav-item account-item"><a id="deletephp" class="nav-link" href="admin_delete.php">Delete</a></li>
            </ul>
            <hr class="text-white" width="320px" style="height: 3px;">
         </nav>
         <div class="container d-flex data text-white view">
            <!--echo "<tr>".td($row['regid']). td($row['name']). td($row['course'])."</tr>";-->
            <table class="table text-center text-white">
               <tr>
                  <th scope="row">ID</th>
                  <td scope="col">Name</td>
                  <td scope="col">Course</td>
                  <td scope="col">Email</td>
                  <td scope="col">Phone</td>
                  <td scope="col">Date</td>
                  <td scope="col">Administrator</td>
               </tr>
               <?php

               while ($row = mysqli_fetch_array($result)) {
                  //echo "<tr>" . td($row[$dbarray[$i]]) . "</tr>";
                  echo "<tr>" . th($row[$dbarray[0]]) . td($row[$dbarray[1]]) . td($row[$dbarray[2]]) . td($row[$dbarray[3]]) . td($row[$dbarray[4]]) . td($row[$dbarray[5]]) . td($row[$dbarray[6]]) . "</tr>";
               }
               ?>
            </table>
         </div>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <script src="../js/script.js"></script>
</body>