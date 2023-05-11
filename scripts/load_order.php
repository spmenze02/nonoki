<?php
require_once('scripts/DBConn.php');

$order_id = $_POST['id'];

$sql = "SELECT * FROM tblaorder WHERE id ='".$order_id."' ;";
$results = $db->query($sql);
$rows = $results->fetchAll(PDO::FETCH_ASSOC);    

$sql = "SELECT * FROM tblbooks;";
$results = $db->query($sql);
$booksRow = $results->fetchAll(PDO::FETCH_ASSOC);    

$book_ids = explode('-', $rows[0]['books_ids'], -1);

try {

echo'<div class="card-header py-3">
        <h5 class="mb-0">Cart - '. count($book_ids).' items</h5>
    </div>
    <div class="card-body">';
if ($booksRow) {


    foreach ($booksRow as $booksRow) {
    
        if (in_array($booksRow["isbn"],$book_ids, TRUE)) {
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
    <h3><strong>'.$booksRow["title"].'</strong></h3>
    <p><b>ISBN</b>: '.$booksRow["isbn"].' <br/><b>released</b> :</i>'.$booksRow["year"].'</p>
    <p><b>Author</b>: '.$booksRow["author"].'</p>
                
    <!-- Data -->
  </div>';
  echo '<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
  <!-- Price -->
  <p class="text-start text-md-center">
    <strong>R'.$booksRow["price"].'</strong>
  </p>
  <button type="button" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
      title="Remove item">
      <i class="bi bi-trash" ></i>
    </button>
  <!-- Price -->
</div>
</div>';
        }   
    }
    echo '</div>';

    //$total += (int)$booksRow['price'];
}
} catch (\Throwable $th) {
    echo ' <div class="row">
    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
      <!-- Image -->
      <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
      <i class="bi bi-book-fill"></i>
        <a href="#!">
          <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
        </a>
      </div>
      <!-- Image -->
    </div>';    

    echo '<div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
    <!-- Data -->
    <h3><strong>'.$booksRow["title"].'</strong></h3>
    <p><b>ISBN</b>: '.$booksRow["isbn"].' <br/><b>released</b> :</i>'.$booksRow["year"].'</p>
    <p><b>Author</b>: '.$booksRow["author"].'</p>
                
    <!-- Data -->
  </div>';
  echo '<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
  <!-- Price -->
  <p class="text-start text-md-center">
    <strong>R'.$booksRow["price"].'</strong>
  </p>
  <button type="button" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
      title="Remove item">
      <i class="bi bi-trash"></i>
    </button>
  <!-- Price -->
</div>
</div>';
echo '</div>';
}
?>