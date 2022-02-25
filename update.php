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

<div class="container-fluid dynamic-table justify-content-center">
   <nav>
      <ul class="nav list-unstyled bg-transparent">
         <li class="nav-item account-item"><a id='viewphp' class="nav-link" href="#">View</a></li>
         <li class="nav-item account-item"><a id="updatephp" class="nav-link" href="#">Update</a></li>
         <li class="nav-item account-item"><a id="deletephp" class="nav-link" href="#">Delete</a></li>
      </ul>
      <hr class="text-white" width="20%">
   </nav>

   <div class="container data text-white update" style="display:none">
      <!--echo "<tr>".td($row['regid']). td($row['name']). td($row['course'])."</tr>";-->
      <form name="updateform" method="POST" action="C:\MAMP\htdocs\iadProject\adminpages\process.php">
         <table>
            <tr>
               <td>Please enter member ID: <input type="number" name="id"></td>
               <td><input type="submit" class="btn btn-dark" name="getid" value="Submit"></td>
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
</div>