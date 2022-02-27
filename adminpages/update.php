<?php
include_once "../db.php";

$array = array('ID', 'Name', 'Course', 'Email', 'Phone', 'Date', 'Admin');
$dbarray = array('regid', 'name', 'course', 'email', 'hp_no', 'reg_date');
$inputname = array('number', 'text', 'text', 'email', 'number', 'text');
$inputplaceholder = array('ID', 'Name', 'Course', 'Email', 'Phone', '2022-01-01 01:01:01');

$id = $_POST['id'];
if ($id != '') {
   if (isset($_POST['getid'])) {
      $query = "SELECT `regid`, `name`, `course`, `email`, `hp_no`, `reg_date` FROM members WHERE regid = $id";
      $result = mysqli_query($db, $query);
      $row = mysqli_fetch_array($result);
   }
}

if (isset($_POST['updatebtn'])) {
   $id = $_POST['id'];
   $name = $_POST['name'];
   $course = $_POST['course'];
   $email = $_POST['email'];
   $phone = $_POST['hp_no'];
   $date = $_POST['date'];
   $query = "UPDATE `members` SET `regid`=$id,`name`='$name',`course`='$course',`email`='$email',`hp_no`=$phone,`reg_date`='$date' WHERE regid = $id";
   mysqli_query($db , $query);
}

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
         <li class="nav-item"><a class="nav-link" href="../index.html">Home</a></li>
         <li class="nav-item"><a class="nav-link" href="../course.php">Course</a></li>
         <li class="nav-item"><a class="nav-link" href="../account.php"><i class="fa-solid fa-user"></i></a></li>
      </ul>
   </nav>
   <div class="container dynamic-table justify-content-center">
      <nav>
         <ul class="nav list-unstyled bg-transparent">
         <li class="nav-item account-item"><a id='viewphp' class="nav-link" href="admin.php">View</a></li>
            <li class="nav-item account-item"><a id='insert' class="nav-link" href="insert.php">Insert</a></li>
            <li class="nav-item account-item"><a id="updatephp" class="nav-link" href="update.php">Update</a></li>
            <li class="nav-item account-item"><a id="deletephp" class="nav-link" href="delete.php">Delete</a></li>
         </ul>
         <hr class="text-white" width="320px">
      </nav>

      <div class="container data text-white update">
         <!--echo "<tr>".td($row['regid']). td($row['name']). td($row['course'])."</tr>";-->
         <form name="updateform" method="POST">
            <table>
               <tr>
                  <td class="text-white">Please enter member ID: <input type="number" name="id" value="<?php echo $id; ?>"></td>
                  <td><input type="submit" name="getid" value="Submit"></td>
               </tr>
            </table>
            <table class="text-white" cellpadding="3" cellspacing="3">
               <?php
               if ($id != '') {
                  if (isset($_POST['getid'])) {
                     $i = 0;
                     while (count($dbarray) > $i) {
                        echo "<tr>" . td("$array[$i]: <input type='$inputname[$i]' name='$dbarray[$i]' placeholder='$inputplaceholder[$i]' value='{$row[$dbarray[$i]]}'>") . "</tr>";
                        $i++;
                     }
                     echo "<tr>" . td('<input type="submit" name="updatebtn" value="Update">') . "</tr>";
                  }
               }
               ?>
               <tr>
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