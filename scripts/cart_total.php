<?php
require_once('scripts/DBConn.php');

$sql = "SELECT * FROM tblbooks;";
$results = $db->query($sql);
$cart = [];
$cart= explode('-',$_COOKIE['cookie1']);
$total = 0;
try {
$rows = $results->fetchAll(PDO::FETCH_ASSOC);

if ($rows) {
    foreach ($rows as $rows) {
    
        if (in_array($rows["isbn"],$cart, TRUE)) {
            $total += (int)$rows['price'];
        }   
    }
    echo '<ul class="list-group list-group-flush">                  
    <li
      class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
      <div>
        <strong>Total amount</strong>
        <strong>
          <p class="mb-0">(including VAT)</p>
        </strong>
      </div>
      <span><strong>R'.$total.'</strong></span>
    </li>
  </ul>';

    
}
} catch (\Throwable $th) {
    echo '<ul class="list-group list-group-flush">                  
    <li
      class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
      <div>
        <strong>Total amount</strong>
        <strong>
          <p class="mb-0">(including VAT)</p>
        </strong>
      </div>
      <span><strong>R0.00</strong></span>
    </li>
  </ul>';

}
?>