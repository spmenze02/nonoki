<?php
require_once('scripts/DBConn.php');

$sql = "SELECT * FROM tblbooks;";
$results = $db->query($sql);

try {
$rows = $results->fetchAll(PDO::FETCH_ASSOC);
echo'<div class="row">';
if ($rows) {
    foreach ($rows as $rows) {
    
            echo'<div class="card mb-2 mt-2 ml-2 mr-2" style="width: 18rem;">
            <div class="card-header">
            <h3>'.$rows["title"] .'</h3>
            <h6 class="card-subtitle mb-2 text-muted">'.$rows["edition"].'</h6>
            </div>
            <div class="card-body">                                        
                <h6 class="card-subtitle mb-2 text-muted">ISBN: '.$rows["isbn"].'</h6>
                <p class="card-text">By '.$rows["author"].'<br/><i class="bi bi-dot"></i>'.$rows["year"].' </p>                                    
            </div>
            <div class="card-footer text-muted">
            <i class="bi bi-cash-coin"></i> R '.$rows["price"].'
            </div>
            <button onclick="priceText(\''.$rows["isbn"].'\')" class="btn  btn-primary btn-lg" id="'.$rows["isbn"].'">
            <i class="bi bi-basket"></i> <i class="bi bi-dot"></i> Add to Cart
            </button>
            </div>                            
    ';      
    
    }
    echo '</div>';
}
} catch (\Throwable $th) {
echo $th;
}
?>