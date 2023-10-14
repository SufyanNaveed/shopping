<?php include '../config.php'; ?>

<?php

    $db = new Database();
    $db->select('products','qty',null,'product_id IN ('.$_POST['id'].')',null,null);
    $result = $db->getResult();
    if($result[0]['qty'] > $_POST['qty']){
        echo '1';
    }else{
        echo '0';
    }

?>