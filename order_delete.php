<?php
require('./db.php');

// Удаление заказа
if(isset($_POST["id"])) {

    $delete_order_id = mysqli_real_escape_string($conn, $_POST["id"]);
    $delete_order_sql = "DELETE FROM `company_orders` WHERE `company_orders`.`id` = '$delete_order_id'";

    if(mysqli_query($conn, $delete_order_sql)){
        header("Location: admin.php");
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
};
