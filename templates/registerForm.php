<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
        <div class="container">
            <a id="logo" class="navbar-brand" href="#">Kaîko-bu! 漫画</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li> -->

                    <?php if (!isset($_SESSION['user'])) { ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/login" role="button" type="submit">LOGIN</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register" role="button" type="submit">SIGN UP</a>
                        </li>

                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout" role="button" type="submit">LOGOUT</a>
                        </li>
                    <?php  } ?>
                    <!-- <li class="nav-item">
                        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Sign up</button>
                    </li> -->

                </ul>
                <ul class="ml-auto">
                    <form method="get" class="form-inline my-lg-0">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </ul>

    </nav>
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    Registration
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form class="form-signin" method="POST" action="/register">
                            <?php
                            if (isset($errorMsg)) {
                                echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
                            }
                            ?>

                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" class="form-control" name="username" placeholder="Nickname (4 characters)" required="" autofocus="" />
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" class="form-control" name="password" placeholder="Password (8 characters)" required="" />
                            </div>
                            <label class="form-control-label">RETYPE PASSWORD</label>
                            <input type="password" class="form-control" name="passwordRetype" placeholder="Password" required="" />
                            <div class=" col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
</body>

</html>