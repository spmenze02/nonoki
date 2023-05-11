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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
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
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard_students.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="my_orders.php">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_book.php">Sell a book</a>
                    </li>
                </ul>
            </div>
            <span class="navbar-text">
                <form>
                    <i class="bi bi-person-circle"></i>

                    <?php echo $_SESSION["firstname"]?>
                    <?php echo $_SESSION["lastname"]?>
                    &nbsp;
                    <a href="javascript:saveCart()">
                        <i class="bi bi-cart-fill iconClass"></i>
                        <span id="cartNumber" class="badge badge-light">
                            <?php echo $_SESSION["cart"]?>
                        </span>
                    </a>
                    &nbsp;
                    <button onclick="logout()" type="button"
                        class="btn btn-outline-success my-2 my-sm-0">Logout</button>
                    &nbsp;
                    &nbsp;
                </form>
            </span>
        </nav>
        <!-- End of NavBar -->
    </header>

    <div class="container mt-5">


        <table class="table table-borderless main table-striped">
            <thead>
                <tr class="head bg-danger table-sm text-white">
                    <th scope="col">Order Number</th>                    
                    <th scope="col">Order Date</th>
                    <th scope="col">Amount</th>                    
                </tr>
            </thead>
            <tbody>
                <?PHP
            require_once('scripts/load_my_order.php');
        ?>
            </tbody>
        </table>
    </div>
</body>
<script src="js/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
<script src="js/main.js"></script>
<script src="js/sweet_alert.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
    integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
    data-cf-beacon='{"rayId":"7c008a771d473eab","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.4.0","si":100}'
    crossorigin="anonymous"></script>

</html>