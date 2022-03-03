<?php
include_once "db.php";
include_once "admin_check.php";
echo "<script>var storage = sessionStorage.getItem('user');</script>";
$storage = '<script>document.write(storage);</script>';

function update_product($id)
{
    global $db;
    $productid = $id;
    $sql = "SELECT price FROM course WHERE course_id = $productid";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    return $row['price'];
}
function product_name($id)
{
    global $db;
    $productid = $id;
    $sql = "SELECT course_name FROM course WHERE course_id = $productid";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    return $row['course_name'];
}

function product_seat($id)
{
    global $db;
    $sql = "SELECT seats FROM course WHERE course_id = $id";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    return $row['seats'];
}

function course_duration($id)
{
    global $db;
    $sql = "SELECT course_duration FROM course WHERE course_id = $id";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    return $row['course_duration'];
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link rel="stylesheet" href="./css/course.css" type="text/css">
    <script type="module">
        import {
            getCookie
        } from "./js/cookies.js";

        $(document).ready(function() {
            function checkadmin() {
                if (getCookie("user") == '') {
                    $.post("cookies.php");
                    window.location.reload();
                }
                $.post("admin_check.php");
            }
            checkadmin();

        });
    </script>
</head>

<body>
    <div id="preloader"></div>
    <!--TODO: Header, Nav, Article, Aside-->
    <nav>
        <ul class="nav d-flex justify-content-center fixed-top navaddpage">
            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
            <li class="nav-item"><a class="nav-link nav-current" href="course.php">Course</a></li>
            <li class="nav-item"><a class="nav-link" href="account.php"><i class="fa-solid fa-user"></i></a></li>
        </ul>
    </nav>
    <div class="container-bg">
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">We have the best courses!</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Offered by Innovate Training</p>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-3 gx-lg-4 row-cols-1 row-cols-md-2 row-cols-xl-2 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" style="width:300px; height:300px; margin-left:auto; margin-right:auto;" src="images/photoshop.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo product_name(1); ?></h5>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    Course Duration: <?php echo course_duration(1); ?> Days
                                    <br>
                                    Available Seats: <?php echo product_seat(1); ?>
                                    <br>
                                    $<?php echo update_product(1); ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="course_desc.php">Learn More</a>
                                    <a class="btn btn-outline-dark mt-auto" href="register.php">Get course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" style="width:300px; height:300px; margin-left:auto; margin-right:auto;" src="images/html5.png" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo product_name(2); ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    Course Duration: <?php echo course_duration(2); ?> Days
                                    <br>
                                    Available Seats: <?php echo product_seat(2); ?>
                                    <br>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">$420.00</span>
                                    $<?php echo update_product(2); ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="course_desc.php">Learn More</a>
                                    <a class="btn btn-outline-dark mt-auto" href="register.php">Get course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" style="width:300px; height:300px; margin-left:auto; margin-right:auto;" src="images/indesign.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo product_name(3); ?></h5>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    Course Duration: <?php echo course_duration(3); ?> Days
                                    <br>
                                    Available Seats: <?php echo product_seat(3); ?>
                                    <br>
                                    <span class="text-muted text-decoration-line-through">$340.00</span>
                                    $<?php echo update_product(3); ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="course_desc.php">Learn More</a>
                                    <a class="btn btn-outline-dark mt-auto" href="register.php">Get course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" style="width:295px; height:295px; margin-left:auto; margin-right:auto; border-radius: 50px; margin-top: 12px" src="images/swift-og.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo product_name(4); ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill">★</div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    Course Duration: <?php echo course_duration(4); ?> Days
                                    <br>
                                    Available Seats: <?php echo product_seat(4); ?>
                                    <br>
                                    <!-- Product price-->
                                    $<?php echo update_product(4); ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="course_desc.php">Learn More</a>
                                    <a class="btn btn-outline-dark mt-auto" href="register.php">Get course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Footer-->
    <footer class="footer">
        <div class="container">
            <p class="text-center text-white">Copyright &copy; Innovate Training 2022. All rights Reserved.</p>
        </div>
    </footer>

    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>