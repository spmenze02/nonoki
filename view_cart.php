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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
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
                  
                    require_once('scripts/load_cart.php');
                ?>
        </div>                
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Summary</h5>
          </div>
          <div class="card-body">
          <?php
                    require_once('scripts/cart_total.php');
                ?>
          <form action="scripts/checkout.php" method="post">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
              Go to checkout
            </button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>