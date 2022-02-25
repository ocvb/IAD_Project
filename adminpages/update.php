<?php
include_once "../db.php";

$array = array('ID', 'Name', 'Course', 'Email', 'Phone');
$dbarray = array('regid', 'name', 'course', 'email', 'hp_no');
$dbarray = array('regid', 'name', 'course', 'email', 'hp_no');

$email = $_COOKIE['user'];
//$query = "SELECT `regid`, `name`, `course`, `email`, `hp_no`, `reg_date` FROM members WHERE email = '$email'";
$query = "SELECT `regid`, `name`, `course`, `email`, `hp_no`, `reg_date` FROM members";
$result = mysqli_query($db, $query);


function td($i)
{
   return "<td>$i</td>";
}
?>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" type="text/css">
   <link rel="stylesheet" href="../css/style.css" type="text/css">
   <link rel="stylesheet" href="../css/account.css" type="text/css">
   <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
</head>

<body>
   <div id="preloader"></div>
   <!--TODO: Header, Nav, Article, Aside-->
   <nav>
      <ul class="nav d-flex justify-content-center align-items-center  fixed-top navaddpage">
         <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
         <li class="nav-item"><a class="nav-link" href="course.php">Course</a></li>
         <li class="nav-item"><a class="nav-link" href="account.php"><i class="fa-solid fa-user"></i></a></li>
      </ul>
   </nav>
   <div class="container-fluid dynamic-table justify-content-center">
      <nav>
         <ul class="nav list-unstyled bg-transparent">
            <li class="nav-item account-item"><a id='viewphp' class="nav-link" href="admin.php">View</a></li>
            <li class="nav-item account-item"><a id="updatephp" class="nav-link" href="#">Update</a></li>
            <li class="nav-item account-item"><a id="deletephp" class="nav-link" href="delete.php">Delete</a></li>
         </ul>
         <hr class="text-white" width="20%">
      </nav>

      <div class="container data text-white update">
         <!--echo "<tr>".td($row['regid']). td($row['name']). td($row['course'])."</tr>";-->
         <form name="updateform" method="POST">
            <table>
               <tr>
                  <td class="text-white">Please enter member ID: <input type="number" name="id"></td>
                  <td><input type="submit" class="btn" name="getid" value="Submit"></td>
               </tr>
            </table>
            <table class="table text-white" cellpadding="3" cellspacing="3">
               <tr>
                  <td scope="col">ID</td>
                  <td scope="col">Name</td>
                  <td scope="col">Course</td>
                  <td scope="col">Email</td>
                  <td scope="col">Phone</td>
               </tr>
               <?php
               if (isset($_POST['getid'])) {
                  $i = 0;
                  while (count($dbarray) > $i) {
                     //echo "<tr>" . td($row[$dbarray[$i]]) . "</tr>";
                     echo "<tr>" . td("$array[$i]: <input type='text' name='$dbarray[$i]'>") . "</tr>";
                     $i++;
                  }
               }
               ?>
               <tr>
                  <td><input type="submit" name="update" value="Update"></td>
                  <td>
                     <p class="message"></p>
                  </td>
               </tr>
            </table>
         </form>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script src="../js/script.js"></script>


</body>