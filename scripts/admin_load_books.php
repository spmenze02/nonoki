<?php
require_once('scripts/DBConn.php');

$sql = "SELECT * FROM tblbooks;";
$results = $db->query($sql);
$cart = [];
$cart= explode('-',$_COOKIE['cookie1']);
$total = 0;
try {
$rows = $results->fetchAll(PDO::FETCH_ASSOC);


echo'<div class="card-header py-3">
        <h5 class="mb-0">'. count($rows).' Books in the Database</h5>
    </div>
   
    <div class="card-body">';
if ($rows) {
    foreach ($rows as $rows) {
    
        
            echo ' <div class="row">
    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
      <!-- Image -->
      <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
      <svg xmlns="http://www.w3.org/2000/svg" width="90%" height="90%" 
      fill="bg-primary" class="bi bi-book-fill" viewBox="0 0 16 16">
      <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
      <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/>
    
</svg>
        <a href="#!">
          <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
        </a>
      </div>
      <!-- Image -->
    </div>';    

    echo '<div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
    <!-- Data -->
    <h3><strong>'.$rows["title"].'</strong></h3>
    <p><b>ISBN</b>: '.$rows["isbn"].' <br/><b>released</b> :</i>'.$rows["year"].'</p>
    <p><b>Author</b>: '.$rows["author"].'</p>
                
    <!-- Data -->
  </div>';
  echo '<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
  <!-- Price -->
  <p class="text-start text-md-center">
    <strong>R'.$rows["price"].'</strong>
  </p>
  <form action="edit_book_admin.php" method="post">
    <div class="form-group mb-3" hidden>
        <label class="label" for="isbn">Password</label>
        <input value="'.$rows['isbn'].'" name="isbn" id="isbn" class="form-control text-center"
        placeholder="isbn" required>
      </div>
      <button type="submit" name="edit_book" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
      title="Edit item">
      <i class="bi bi-pencil-square"></i>
      </button>
      </form>
      <form action="scripts/delete_book.php" method="post">
        <div class="form-group mb-3" hidden>
        <label class="label" for="isbn">Password</label>
        <input value="'.$rows['isbn'].'" name="isbn" id="isbn" class="form-control text-center"
        placeholder="isbn" required>
      </div>      
      <button type="submit" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
      title="Remove item">
      <i class="bi bi-trash" ></i>
      </button>
  </form>
  <!-- Price -->
</div>
</div>';
          
    }
    echo '</div>';

    $total += (int)$rows['price'];
}
} catch (\Throwable $th) {
   
}
?>