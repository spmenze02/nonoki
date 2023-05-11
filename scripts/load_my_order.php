<?php
    require_once('scripts/DBConn.php');

try {

    $sql = "SELECT * FROM tblaorder WHERE username = '".$_SESSION['username']."';";
    $results = $db->query($sql);
    $ordersRows = $results->fetchAll(PDO::FETCH_ASSOC);

    if ($ordersRows) {
        foreach ($ordersRows as $rows) {
        $total = 0;
        $sql = "SELECT * FROM tbluser WHERE username = '".$rows['username']."';";
        $results = $db->query($sql);
        $studentsRow = $results->fetchAll(PDO::FETCH_ASSOC);
        $books_ordered = explode('-',$rows['books_ids'],-1);
        
        foreach ($books_ordered as $book) {
            $sql = "SELECT * FROM tblbooks WHERE isbn = '".$book."';";
            $results = $db->query($sql);
            $booksRow = $results->fetchAll(PDO::FETCH_ASSOC);
            $total = $total + (float)$booksRow[0]['price'];
        }
        echo'                
            <tr class="rounded bg-white">
                <td>'.$rows['id'].'</td>
                
                <td>
                    '.$rows['reg_date'].'
                </td>
                <td>
                    R '.$total.'
                </td>                
            </tr>
                
        ';      
        
        }
        echo '</div>';
    }
} catch (\Throwable $th) {
    echo $th;
}
    
?>