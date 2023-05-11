<?PHP
    session_start();
    if ($_SESSION["username"] == null) {
        header("Location: index.php");
    }
    $_SESSION["cart"] = 0;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="js/sweet_alert.js"></script>
    <script src="js/update_cart.js"></script>
</head>
<body>
<header>
        <!-- NavBar     -->
        <nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
            &nbsp;&nbsp;
            <a class="navbar-brand" href="#"> <i class="bi bi-book"></i>&nbsp;Textbook Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="dashboard_admin_staff.php" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Books
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">View Book</a>    
                            <a class="dropdown-item" href="add_book.php">Add a Book</a>                            
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item a">
                        <a class="nav-link" href="manage_students.php">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_students.php">Manage Users</a>
                    </li>
                    <a href="add_book.php" class="btn btn-primary" type="submit">Add a Book</a>
                </ul>
            </div>
            <span class="navbar-text">
                <form>
                    <i class="bi bi-person-circle"></i>
                    
                    <?php echo $_SESSION["firstname"]?>
                    <?php echo $_SESSION["lastname"]?>                    
                    
                    &nbsp;
                    <button onclick="logout()" type="button" class="btn btn-outline-success my-2 my-sm-0">Logout</button>
                    &nbsp;
                    &nbsp;
                </form>
            </span>
        </nav>
        <!-- End of NavBar -->
    </header>


    <section >
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
        <?php
                  
                    require_once('scripts/admin_edit_book.php');
                ?>
        </div>                
      </div>      
    </div>
  </div>
</section>
</body>
</html>