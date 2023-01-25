<?php
require('./db.php');
require('./component/head/head.php');


echo "<div class='container'>
        <div class='row'>
            <div class='col'>";
            
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {

    $element_card_id = mysqli_real_escape_string($conn, $_GET["id"]);

    $sql_direction = "SELECT `id`, `img_direction`, `from_where`, `where_destination` FROM `company_directions` WHERE `company_directions`.`id` = '$element_card_id'";

    if($result_direction = mysqli_query($conn, $sql_direction)) {

        if(mysqli_num_rows($result_direction) > 0) {

            foreach($result_direction as $card_direct) {
              
                $data_img_direction = $card_direct['img_direction'];
                $data_from_where = $card_direct['from_where'];
                $data_where_destination = $card_direct['where_destination'];

                echo "<h2 class='text-primary mt-3'>Редактирование карточки</h2>";

                echo "<form method='post' class='form-border' enctype='multipart/form-data'>
                        <h4 class='text-secondary'>" . $data_from_where . " - " . $data_where_destination . "</h4><hr>
                        <img src='$data_img_direction' class='card-img-top m-1' style='width: 18rem;' alt='noImg'>

                        <input type='hidden' name='id' value='$element_card_id' />

                        <p>Выберите картинку:
                            <input type='file' class='form-control' name='file_img_card'>
                        </p>

                        <div class='mb-3'>
                            <label for='inputWhere' class='form-label'>Откуда:</label>
                            <input type='text' value='$data_from_where' name='update_input_where' class='form-control' id='inputWhere' placeholder='Откуда'>
                        </div>
                        
                        <div class='mb-3'>
                            <label for='inputDestination' class='form-label'>Куда:</label>
                            <input type='text' value='$data_where_destination' name='update_input_destination' class='form-control' id='inputDestination' placeholder='Куда'>
                        </div>

                        <input type='submit'  class='btn btn-success'  value='Сохранить'>
                </form>";
            }
        } else {
            echo "<div>Данные не найдены!</div>";
        }
        mysqli_free_result($result_direction);
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }

} elseif (isset($_POST["id"]) && isset($_FILES['file_img_card']) && isset($_POST["update_input_where"]) && isset($_POST["update_input_destination"])) {
      
    $element_card_id = mysqli_real_escape_string($conn, $_POST["id"]);

    $element_img_name = basename($_FILES['file_img_card']['name']);
    $element_img_path = 'assets/img/' . $element_img_name;
      
    $element_update_input_where = mysqli_real_escape_string($conn, $_POST["update_input_where"]);
    $element_update_input_destination = mysqli_real_escape_string($conn, $_POST["update_input_destination"]);

    if (!move_uploaded_file($_FILES['file_img_card']['tmp_name'], $element_img_path)) {
        echo 'Файл не смог загрузиться!';
    }

    if($_FILES['file_img_card']['error'] == 0) {
       $sql_direction_card = "UPDATE `company_directions` SET  `img_direction` = '$element_img_path', `from_where` = '$element_update_input_where', `where_destination` = '$element_update_input_destination'
                 WHERE `company_directions`.`id` = '$element_card_id'"; 
    }
    
    if($_FILES['file_img_card']['error'] == 4) {
        $sql_direction_card = "UPDATE `company_directions` SET  `img_direction` = `img_direction`,  `from_where` = '$element_update_input_where', `where_destination` = '$element_update_input_destination'
        WHERE `company_directions`.`id` = '$element_card_id'";
    }

    if($result_sql_direction = mysqli_query($conn, $sql_direction_card)){
        header("Location: admin.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
else{
    echo "Некорректные данные";
};

echo "</div></div></div>";