<?php
require_once('DBConn.php');
$sql = "SELECT * FROM tblbooks WHERE isbn = '" . $_POST['isbn'] . "';";
$results = $db->query($sql);
$rows = $results->fetchAll(PDO::FETCH_ASSOC);
if ($rows) {
    foreach ($rows as $rows) {
        echo '<form action="scripts/update_book.php" method="post">
    <div class="form-group">
        <label for="title">Book Title</label>
        <input value="' . $rows['title'] . '" type="text" " class="form-control" id="title" name="title"
             placeholder="Enter book Title">                            
    </div>
    <div class="form-group">
        <label for="isbn">ISBN Number</label>
        <input type="text" value="' . $rows['isbn'] . ' " class="form-control" id="isbn" name="isbn"
             placeholder="Enter book ISBN Number" required>                            
    </div>

    <div class="form-group">
        <label for="edition">Book Edition or Subtitle</label>
        <input type="text" value="' . $rows['edition'] . ' " class="form-control" id="edition" name="edition"
             placeholder="Enter Book Edition or Subtitle" required>                            
    </div>
    
    <div class="form-group">
        <label for="author">Book author</label>
        <input type="text" value="' . $rows['author'] . ' " class="form-control" id="author" name="author"
             placeholder="Enter author(s)" required>                            
    </div>

    <div class="form-group">
        <label for="year">When was it released</label>
        <input type="text" value="' . $rows['year'] . ' " class="form-control" id="year" name="year"
             placeholder="When was the book released" required>                            
    </div>
    <div class="form-group">
        <label for="quantity">How many books are you selling</label>
        <input type="text" value="' . $rows['quantity'] . ' " class="form-control" id="quantity" name="quantity"
             placeholder="How many books are you selling" required  >                            
    </div>

    <div class="form-group">
        <label for="quantity">How much are selling the book for</label>
        <input type="text" value="' . trim($rows['price']) . ' " class="form-control" id="price" name="price"
             placeholder="How many books are you selling" required  >                            
    </div>

    <div class="form-group" >
        <label for="reg_date">Date Added</label>
        <input type="text" value="' . trim($rows['reg_date']) . ' " class="form-control" id="reg_date" name="reg_date" readonly
             placeholder="How many books are you selling" required  >                            
    </div>

    <div class="form-group" hidden>
        <label for="username">Date Added</label>
        <input type="text" value="' . trim($rows['username']) . ' " class="form-control" id="username" name="username" readonly
             placeholder="How many books are you selling" required  >                            
    </div>
    <button type="submit" name="add_book" class="btn btn-primary">Save</button>
</form>';
    }
}
?>