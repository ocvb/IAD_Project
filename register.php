<?php
include_once "db.php";

//$sql = "INSERT INTO `members`(`name`, `phone`, `email`, `address`) VALUES ('john', 2132132, 'awefwune@gmail.com', 'address')"; mysqli_query($db, $sql);
$coursename = array();
$courseid = array();
function courseArray()
{
   global $db, $coursename;
   $query = "SELECT course_name FROM course";
   $result = mysqli_query($db, $query);

   while ($row = mysqli_fetch_array($result)) {
      $coursename[] = $row['course_name'];
   }
}
courseArray();

function course_id()
{
   global $db, $courseid;
   $query = "SELECT course_id FROM course";
   $result = mysqli_query($db, $query);

   while ($row = mysqli_fetch_array($result)) {
      $courseid[] = $row['course_id'];
   }
}
course_id();

function course_seats($id)
{
   global $db;
   $sql = "SELECT seats FROM course WHERE course_id = $id";
   $result = mysqli_query($db, $sql);
   $row = mysqli_fetch_array($result);
   return $row['seats'];
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

if (isset($_POST['submit'])) {
   $date = date('Y-m-d H:i:s');

   $name = mysqli_escape_string($db, $_POST['name']);
   $course = mysqli_escape_string($db, $_POST['course']);
   $email = mysqli_escape_string($db, $_POST['email']);
   $phone = mysqli_escape_string($db, $_POST['phone']);
   $password = mysqli_escape_string($db, md5($_POST['password']));
   //echo $name . $course . $phone . $email . $password;

   $sql = "INSERT INTO `members` (`name`, `course`, `email`, `hp_no`, `reg_date`, `password`) VALUES ('$name' , $course , '$email' , $phone , '$date' , '$password')";
   if (mysqli_query($db, $sql)) {
      if (course_seats($course) != 0) {
         $checkSeats = course_seats($course) - 1;
         $query = "UPDATE course SET seats = $checkSeats WHERE course_id = $course";
         mysqli_query($db, $query);
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="css/style.css" type="text/css">
   <link rel="stylesheet" href="css/register.css" type="text/css">
   <title>Register</title>
</head>

<body>
   <div id="preloader"></div>

   <nav>
      <ul class="nav d-flex justify-content-center fixed-top navaddpage">
         <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
         <li class="nav-item"><a class="nav-link" href="course.php">Course</a></li>
         <li class="nav-item"><a class="nav-link nav-current" href="register.php">Register</a></li>
         <li class="nav-item"><a class="nav-link" href="account.php"><i class="fa-solid fa-user"></i></a></li>
      </ul>
   </nav>

   <div class="container-bg">
      <div class="container main-container justify-content-center">
         <div class="row form-container g-4">
            <h3 class="h3 text-center">Register Panel</h3>
            <?php
            if (isset($_POST["submit"])) {
               if (mysqli_error($db)) {
                  echo "<span id='invalid-db' class='text-center' style='display:show; font-size: 13px; color: rgb(100, 0, 0);'><i class='fa-solid fa-circle-info'></i> Outdated Database</span>";
               }
               if (course_seats($course) == 0) {
                  echo "<span id='seats-full' class='text-center' style='display:show; font-size: 13px; color: rgb(100, 0, 0);'><i class='fa-solid fa-circle-info'></i> All Seats are taken!</span>";
               }
            }
            ?>
            <form method="POST" class="col">
               <div class="top-form form-group">
                  <label for="">Name:</label>
                  <input type="text" name="name" id="name" placeholder="Name" class="form-control" required>
                  <span id="nameerror" style='display:none; color: rgb(214, 0, 0); font-size: 13px;'><i class="fa-solid fa-circle-info"></i> No numbers in Name!</span>
               </div>
               <div class="form-group selectdiv">
                  <label for="course">Course:</label><br>
                  <select class="form-control" name="course" id="course">
                     <?php
                     $i = 0;
                     foreach ($coursename as $course) {
                        echo "<option value='$courseid[$i]'>$course</option>";
                        $i++;
                     }
                     ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="">Email:</label>
                  <input type="email" name="email" id="email" placeholder="Email" required class="form-control">
               </div>
               <div class="form-group">
                  <label for="">Phone Number:</label>
                  <input type="number" name="phone" placeholder="Phone No." required oninput="if (this.value.length > 8) {this.value = this.value.slice(0, 8);}" class="form-control">
                  <span id="emailerror" style='display:show; font-size: 13px;'><i class="fa-solid fa-circle-info"></i> Phone number 8 Digits</span>
               </div>
               <div class="form-group">
                  <label for="">Password:</label>
                  <input type="password" name="password" placeholder="Password" required class="form-control">
               </div>
               <div class="form-group loginstatus">
                  <?php
                  if (isset($_POST["submit"])) {
                     if (mysqli_error($db)) {
                        echo "<p style='color: red;'>Something when wrong. try again!</p>";
                     } else {
                        echo "<p style='color: green;'>You have registered successfully</p>";
                        timeout(5, "login.php");
                     }
                  }
                  ?>
               </div>
               <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary">Register</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- javscript -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <script src="js/script.js"></script>
   <script>
      $(document).on("input", "#name", function() {
         var letters = /^[a-zA-Z\s]+$/;
         if (this.value.match(letters)) {
            $("#nameerror").hide();
         } else {
            this.value = '';
            $("#nameerror").show();
         }
      });
   </script>
</body>

</html>