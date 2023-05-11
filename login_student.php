<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <!-- NavBar     -->
        <nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
            <i class="bi bi-book"></i>
            <a class="navbar-brand" href="#">Textbook Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Dropdown link
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End of NavBar -->
    </header>




    <div class="container">
        <div class="row align-items-center vh-100">
            <div class="col-6 mx-auto">
                <div class="card text-center" style="width: 30rem;">
                    <div class="card-header ">
                        <h3 class="mb-4">Sign In</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="w-100">

                            </div>

                        </div>

                        <form action="scripts/user_login_student.php" method="post" class="signin-form">
                            <div class="form-group mb-3">
                                <label class="label" for="student_number">Student Number</label>
                                <input name="student_number" id="student_number" type="text"
                                    class="form-control text-center" placeholder="Student Number" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="username">Username</label>
                                <input name="username" id="username" type="text" class="form-control text-center"
                                    placeholder="Username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input name="password" id="password" type="password" class="form-control text-center"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                    In</button>
                            </div>
                        </form>

                        <p class="text-center">Not a member?<br /> <a data-toggle="tab" href="registration.php">Sign
                                Up</a>
                        </p>
                    </div>
                    <div class="card-footer text-body-secondary">
                        Students Sign-in Page
                    </div>
                </div>
            </div>
        </div>
    </div>







</body>
<script src="js/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
<script src="js/main.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
    integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
    data-cf-beacon='{"rayId":"7c008a771d473eab","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.4.0","si":100}'
    crossorigin="anonymous"></script>

</html>