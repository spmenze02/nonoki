<?php
    require_once('scripts/DBConn.php');

    $sql = "SELECT * FROM tbluser;";
    $results = $db->query($sql);
    $rows = $results->fetchAll(PDO::FETCH_ASSOC);
    if ($rows) {
        foreach ($rows as $rows) {
            echo'
            <div class="card text-center" style="width: 18rem;">                    
                <div class="row ">            
                    <div class="">
                        <div class="thumb card-img-top">
                            <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt>
                        </div>
                        <div class="candidate-list-details card-body">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5 class="mb-0"><a href="#">'.$rows['firstname'].' '.$rows['lastname'].'</a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="bi bi-person-badge-fill"></i>'.$rows['student_number'].'</li>
                                        <li><i class="bi bi-envelope-at"></i>'.$rows['username'].'</li>
                                    </ul>
                                </div>
                            </div>';
            if ($rows['enabled'] === 'false') {
                echo '     <form action="scripts/enable_user.php" method="POST">
                                    <div class="form-group mb-3" hidden>
                                    <label class="label" for="username">Password</label>
                                    <input value="'.$rows['username'].'" name="username" id="username" class="form-control text-center"
                                    placeholder="enabled" required>
                                </div>
                                <button class="btn btn-primary" type="submit">Enable</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>';
            }else {
                echo '     <form action="scripts/disable_user.php" method="POST">
                                <div class="form-group mb-3" hidden>
                                    <label class="label" for="username">Password</label>
                                    <input value="'.$rows['username'].'" name="username" id="username" class="form-control text-center"
                                    placeholder="enabled" required>
                                </div>
                                <button class="btn btn-danger" type="submit">Disable</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>';
            }
                    

        }
    }
?>