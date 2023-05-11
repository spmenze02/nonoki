<?php
    require_once('scripts/DBConn.php');

try {

    $sql = "SELECT * FROM tblaorder;";
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
                <td>';
            
                    echo $studentsRow[0]['firstname'].' '.$studentsRow[0]['lastname'].'</td>
                <td>
                    '.$rows['reg_date'].'
                </td>
                <td>
                    R '.$total.'
                </td>
                <td>
                    <form action="admin_view_order.php" method="POST">
                        <div class="form-group mb-3" hidden>
                            <label class="label" for="id">Password</label>
                            <input value="'.$rows['id'].'" name="id" id="id" class="form-control text-center"
                                placeholder="enabled" required>
                        </div>
                        <button class="btn btn-danger" type="submit">View Order</button>
                    </form>
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