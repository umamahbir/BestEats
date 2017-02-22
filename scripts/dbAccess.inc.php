<?php
//db access using PDO
function getDBAccess() {
    try {
        $db_ = new PDO('mysql: host=localhost; dbname=best_eats_db', 'bestEat_admin', 'password');
        return $db_;
    }
    catch (PDOException $e) {}
}
?>