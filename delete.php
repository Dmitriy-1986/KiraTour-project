<?php
require('./db.php');

// Удаление карточки маршрута
if(isset($_POST["id"])) {

    $delete_card_id = mysqli_real_escape_string($conn, $_POST["id"]);
    $delete_card_sql = "DELETE FROM `company_directions` WHERE `company_directions`.`id` = '$delete_card_id'";

    if(mysqli_query($conn, $delete_card_sql)){
        header("Location: admin.php");
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
};

