<?php        
    require_once('scripts/createTable.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
    <div class="container-fluid">
        <div>
            <form action="scripts/register_user_script.php" method="post">
                <div class="container">
                    <div class="row">
                        <div>
                            <h1>Registration</h1>

                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input class="form-control form-control-lg" type="text" name="firstname" id="firstname"
                                    required>
                            </div>

                            <label for="lastname">Last Name</label>
                            <input class="form-control" type="text" name="lastname" id="lastname" required>

                            <label for="student_number">Student Number</label>
                            <input class="form-control" type="text" name="student_number" id="student_number" required>

                            <label for="username">Username</label>
                            <input class="form-control" type="email" name="username" id="username" required>

                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                required>
                            <div id="message">
                                <h3>Password must contain the following:</h3>
                                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                <p id="number" class="invalid">A <b>number</b></p>
                                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                            </div>
                            <label for="confirm_password">Confirm Password</label>
                            <input class="form-control" type="password" name="confirm_password" id="confirm_password"
                                required>
                            <p id="donotmatch" class="invalid">Passwords Do not Match</p>
                            <input class="btn btn-primary" type="submit" name="create" value="Register">


                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
<script src="js/password.js"></script>

</html>