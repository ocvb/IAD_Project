<?php
include_once "../db.php";

$array = array('Name', 'Course', 'Email', 'Phone', 'Password');
$dbarray = array('name', 'course', 'email', 'hp_no', 'password');
$inputtype = array('text', 'text', 'email', 'number', 'password');
$inputplaceholder = array('Name', 'Course', 'Email', 'Phone', "Password");

if (isset($_POST['insert'])) {
   $name = mysqli_escape_string($db, $_POST['name']);
   $course = mysqli_escape_string($db, $_POST['course']);
   $email = mysqli_escape_string($db, $_POST['email']);
   $phone = mysqli_escape_string($db, $_POST['hp_no']);
   $password = mysqli_escape_string($db, $_POST['password']);

   $sql = "INSERT INTO `members` (`name`, `course`, `email`, `hp_no`, `password`) VALUES ('$name', '$course', '$email', $phone, md5($password))";
   mysqli_query($db, $sql);
   echo mysqli_error($db);

   $i = 0;
   if (mysqli_error($db)) {
      $i = 0;
   } else {
      $i = 1;
   }

   function timeout($set, $here)
   {
      $i = 0;
      while ($i < $set) {
         sleep(1);
         $i++;
      }
      header("Location: ./$here");
   }
}

function td($i) {
   return "<td>$i</td>";
}
function th($i) {
   return "<th scope='row'>$i</th>";
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

   <div class="container-bg">

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
               <table class="text-white" cellpadding="3" cellspacing="3">
                  <?php
                  $i = 0;
                  while (count($dbarray) > $i) {
                     echo "<tr>" . td("<label id='$dbarray[$i]'>$array[$i]: </label> <input type='$inputtype[$i]' name='$dbarray[$i]' id='$dbarray[$i]' placeholder='$inputplaceholder[$i]' autofocus='autofocus'>") . "</tr>";
                     $i++;
                  }
                  echo "<tr>" . td('<input type="submit" name="insert" value="Insert">') . "</tr>";
   
                  $e = 0;
                  while ($e <= 1) {
                     if (isset($_POST['insert'])) {
                        echo "<tr>" . td($row[$dbarray[0]]) . td($row[$dbarray[1]]) . td($row[$dbarray[2]]) . td($row[$dbarray[3]]) . "</tr>";
                        
                        echo mysqli_error($db);
                     }
                     $e++;
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
      </div>
   </div>
   <!-- Javascript -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <script src="../js/script.js"></script>
</body>