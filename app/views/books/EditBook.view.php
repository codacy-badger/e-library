<?php
$cat = App::get('databaseCat')->listCategories();
$book = App::get('databaseBook')->selectBook($_GET['bid']);
$book->execute();
$book = $book->fetch(PDO::FETCH_ASSOC);?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Book</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="app/public/Resources/Login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/css/util.css">
    <link rel="stylesheet" type="text/css" href="app/public/Resources/Login/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--===============================================================================================-->
</head>
<nav class="navbar navbar-expand-lg navbar-light" style="background: #58B747">
    <a class="navbar-brand" href="#">
        <img src="https://www.boxfordlibrary.org/wordpress/wp-content/uploads/2014/03/elibrary-logo.png" alt="" style="max-width: 80px; max-height:100px;">
    </a>



   
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    </ul>
    <div class="form-inline my-2 my-lg-0">
    </div>
   
</nav>

<body>

    <div class="limiter">
        <div class="container">
            <div class="wrap-login100" style="padding-top: 80px;">
                <div class="login100-pic js-tilt" data-tilt style="padding-top: 50px;">
                    <img src="app/public/Resources/Login/images/books.png" alt="IMG" style="max-width: 200px; height:auto;">
                </div>

                <form method="post" class="login100-form" enctype="multipart/form-data" style="float: right;">
                   
                    <div class="wrap-input100">
                        <input class="input100" type="text" name="name" value="<?php echo $book['name']; ?>" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100">
                        <input class="input100" type="text" name="author" value="<?php echo $book['author']; ?>" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="text" name="edition" value="<?php echo $book['edition']; ?>" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100">
                        <div class="input100" style="padding-top: 15px;"> <span style="color: #999999; cursor:default;">Book Categories</span>
                            <span class="symbol-input100"">
                                <i class=" fa fa-file" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <?php $i = 1;
                    foreach ($cat as $row) : ?>
                        <label for=" <?php $row['id'] ?>">
                            <input type="checkbox" class="mr-1" value="<?php echo ($row['id']); ?>" name="<?php echo $i ?>">
                            <?php
                            echo ($row['name']);
                            $i++;
                            ?>
                        </label>
                    <?php
                    endforeach;
                    ?>
                    <div class="wrap-input100">
                        <input class="input100 my" type="file" name="image" value="<?php echo $book['image']; ?>" style="padding-top: 10px;" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-file" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="bookAdded" value="submit">
                            Update Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="app/public/Resources/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="app/public/Resources/Login/vendor/bootstrap/js/popper.js"></script>
    <script src="app/public/Resources/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="app/public/Resources/Login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="app/public/Resources/Login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
<footer class="page-footer fixed-bottom" style="background: #58B747; ">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:

    </div>
    <!-- Copyright -->

</footer>

</html>