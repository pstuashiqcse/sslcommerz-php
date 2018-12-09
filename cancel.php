<?php
if ($_POST['tran_id']) {
    $tran_id = trim($_POST['tran_id']);
    echo "Cancelled: ".$tran_id;
} else {
    echo "Error";
}

?>