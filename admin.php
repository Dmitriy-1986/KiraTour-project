<?php
session_start();

require('./db.php');
require('./component/head/head.php');

if(isset($_GET['do'])){
	if($_GET['do'] == 'logout'){ 
		unset($_SESSION['admin']);
		session_destroy();
	}
}

if(!$_SESSION['admin']){
	header("Location: auth.php");
	exit;
}

/**
 * Редактирование названия компании в шапке сайта 
*/ 
$select_company_name = "SELECT `company` FROM `company_name` ORDER BY id LIMIT 1";

if($result_company_name = mysqli_query($conn, $select_company_name)) {
    foreach($result_company_name as $company){
        $data_company_name = $company['company'];

        echo "<div class='container mb-5'>
                    <h1 class='text-dark mt-3 p-2'> Панель Администратора </h1>
                    <nav style=\"--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);\" aria-label=\"breadcrumb\">
                        <ol class='breadcrumb'>
                            <li class='breadcrumb-item'><a href='index.php'>Главная</a></li>
                            <li class='breadcrumb-item active' aria-current='page'>Админ.панель | <a href='admin.php?do=logout'>Выйти</a></li>
                        </ol>
                    </nav>
                   
                    <hr>
                    <h4>Название компании:</h4>
                    
                    <form method='POST'>
                            <div class='row'>
                                <p class='col-12'>
                                    <input type='text' name='update_company_name' value='$data_company_name' class='form-control'>
                                </p>
                                <p  class='col-3'>
                                    <input type='submit' value='Отправить' class='btn  btn-success'>
                                </p>
                            </div>
                    </form>";
    }
} else {
    echo "Ошибка: " . mysqli_error($conn);
};

if (isset($_POST["update_company_name"])) {
    $element_update_company_name = mysqli_real_escape_string($conn, $_POST["update_company_name"]);

    $update_company_name = "UPDATE `company_name` SET `company` = '$element_update_company_name'";

    if($result = mysqli_query($conn, $update_company_name)){
        header("Location: admin.php");  
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
} 

/**
 * Редактирование 1 контакта компании в шапке сайта
*/
echo "<h4>Телефоны:</h4>";
     
$select_company_phone = "SELECT `id`, `phone` FROM `company_phone` WHERE `company_phone`.`id` = 1";

if($result_company_phone = mysqli_query($conn, $select_company_phone)) {

   echo "<form method='POST'>
            <div class='row'>";

    foreach($result_company_phone as $phone1){
        $data_company_phone = $phone1['phone'];
            echo "<p class='col-12'>
                    <input type='text' name='update_company_phone' value='$data_company_phone' class='form-control'>
                </p>

                <p  class='col-3'>
                    <input type='submit' value='Отправить' class='btn  btn-success'>
                </p>";
    };
    echo "    </div>
           </form>";
} else {
    echo "Ошибка: " . mysqli_error($conn);
};

if (isset($_POST["update_company_phone"])) {
    $element_update_company_phone = mysqli_real_escape_string($conn, $_POST["update_company_phone"]);

    $update_company_phone = "UPDATE `company_phone` SET `phone` = '$element_update_company_phone' WHERE `company_phone`.`id` = 1";

    if($result = mysqli_query($conn, $update_company_phone)){
        header("Location: admin.php");  
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
};

/**
 * Редактирование 2 контакта компании в шапке сайта
*/ 
$select_company_phone2 = "SELECT `id`, `phone` FROM `company_phone` WHERE `company_phone`.`id` = 2";

if($result_company_phone2 = mysqli_query($conn, $select_company_phone2)) {

   echo "<form method='POST'>
            <div class='row'>";

    foreach($result_company_phone2 as $phone2){
        $data_company_phone2 = $phone2['phone'];
            echo "<p class='col-12'>
                    <input type='text' name='update_company_phone2' value='$data_company_phone2' class='form-control'>
                </p>

                <p  class='col-3'>
                    <input type='submit' value='Отправить' class='btn  btn-success'>
                </p>";
    };
    echo "    </div>
           </form>";
} else {
    echo "Ошибка: " . mysqli_error($conn);
};

if (isset($_POST["update_company_phone2"])) {
    $element_update_company_phone2 = mysqli_real_escape_string($conn, $_POST["update_company_phone2"]);

    $update_company_phone2 = "UPDATE `company_phone` SET `phone` = '$element_update_company_phone2' WHERE `company_phone`.`id` = 2";

    if($result = mysqli_query($conn, $update_company_phone2)){
        header("Location: admin.php");  
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
};


/**
* Социальные сети
*/
// Чаты
// Viber
$select_viber_chat = "SELECT `viber`  FROM `social_media_chat`";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    if($result_viber_chat = mysqli_query($conn, $select_viber_chat)) {

        foreach($result_viber_chat as $viber_chat){

            $data_viber_chat = $viber_chat['viber'];
            echo "<br><h4>Список чатов социальных сетей:</h4>
                    <h5>Viber</h5>
                    <form method='POST'>
                            <div class='row'>
                                <p class='col-12'>
                                    <input type='text' id='viber' name='chat_viber' value='$data_viber_chat' class='form-control'>
                                </p>
                                <p  class='col-3'>
                                    <input type='submit' value='Отправить' class='btn  btn-success'>
                                </p>
                            </div>
                    </form>";
        }
        mysqli_free_result($result_viber_chat);
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    };
} elseif (isset($_POST["chat_viber"])) {
    $element_chat_viber = mysqli_real_escape_string($conn, $_POST["chat_viber"]);

    $update_chat = "UPDATE `social_media_chat`  SET `viber` = '$element_chat_viber' WHERE `social_media_chat`.`id` = 1";
 
    if($result = mysqli_query($conn, $update_chat)){
        header("Location: admin.php");  
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}

// Telegram
$select_telegram_chat = "SELECT `telegram`  FROM `social_media_chat`";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    if($result_telegram_chat = mysqli_query($conn, $select_telegram_chat)) {

        foreach($result_telegram_chat as $telegram_chat){

            $data_telegram_chat = $telegram_chat['telegram'];
            echo "<h5>Telegram</h5>
                    <form method='POST'>
                            <div class='row'>
                                <p class='col-12'>
                                    <input type='text' id='viber' name='chat_telegram' value='$data_telegram_chat' class='form-control'>
                                </p>
                                <p  class='col-3'>
                                    <input type='submit' value='Отправить' class='btn  btn-success'>
                                </p>
                            </div>
                    </form>";
        }
        mysqli_free_result($result_telegram_chat);
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    };
} elseif (isset($_POST["chat_telegram"])) {
    $element_chat_telegram = mysqli_real_escape_string($conn, $_POST["chat_telegram"]);

    $update_chat = "UPDATE `social_media_chat`  SET `telegram` = '$element_chat_telegram' WHERE `social_media_chat`.`id` = 1";
 
    if($result = mysqli_query($conn, $update_chat)){
        header("Location: admin.php");  
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}

// WhatsApp
$select_whatsapp_chat = "SELECT `whatsapp`  FROM `social_media_chat`";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    if($result_whatsapp_chat = mysqli_query($conn, $select_whatsapp_chat)) {

        foreach($result_whatsapp_chat as $whatsapp_chat){

            $data_whatsapp_chat = $whatsapp_chat['whatsapp'];

            echo "<h5>WhatsApp</h5>
                    <form method='POST'>
                            <div class='row'>
                                <p class='col-12'>
                                    <input type='text' id='viber' name='chat_whatsapp' value='$data_whatsapp_chat' class='form-control'>
                                </p>
                                <p  class='col-3'>
                                    <input type='submit' value='Отправить' class='btn  btn-success'>
                                </p>
                            </div>
                    </form>";
        }
        mysqli_free_result($result_whatsapp_chat);
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    };
} elseif (isset($_POST["chat_whatsapp"])) {
    $element_chat_whatsapp = mysqli_real_escape_string($conn, $_POST["chat_whatsapp"]);

    $update_chat = "UPDATE `social_media_chat`  SET `whatsapp` = '$element_chat_whatsapp' WHERE `social_media_chat`.`id` = 1";
 
    if($result = mysqli_query($conn, $update_chat)){
        header("Location: admin.php");  
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}

// Phone
$select_phone = "SELECT `phone`  FROM `social_media_chat`";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    if($result_phone = mysqli_query($conn, $select_phone)) {

        foreach($result_phone as $phone){

            $data_phone = $phone['phone'];

            echo "<h5>Phone</h5>
                    <form method='POST'>
                            <div class='row'>
                                <p class='col-12'>
                                    <input type='text' id='viber' name='phone' value='$data_phone' class='form-control'>
                                </p>
                                <p  class='col-3'>
                                    <input type='submit' value='Отправить' class='btn  btn-success'>
                                </p>
                            </div>
                    </form><hr>";
        }
        mysqli_free_result($result_phone);
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    };
} elseif (isset($_POST["phone"])) {
    $element_phone = mysqli_real_escape_string($conn, $_POST["phone"]);

    $update_phone = "UPDATE `social_media_chat`  SET `phone` = '$element_phone' WHERE `social_media_chat`.`id` = 1";
 
    if($result = mysqli_query($conn, $update_phone)){
        header("Location: admin.php");  
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}

// Группы
// Viber
$select_viber_group = "SELECT `viber`  FROM `social_media_group`";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    if($result_viber_group = mysqli_query($conn, $select_viber_group)) {

        foreach($result_viber_group as $viber_group){

            $data_viber_group = $viber_group['viber'];

            echo "<h4>Список групп социальных сетей:</h4>
                  <h5>Группа в Viber</h5>
                    <form method='POST'>
                            <div class='row'>
                                <p class='col-12'>
                                    <input type='text' id='viber' name='viber_group' value='$data_viber_group' class='form-control'>
                                </p>
                                <p  class='col-3'>
                                    <input type='submit' value='Отправить' class='btn  btn-success'>
                                </p>
                            </div>
                    </form>";
        }
        mysqli_free_result($result_viber_group);
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    };
} elseif (isset($_POST["viber_group"])) {
    $element_viber_group = mysqli_real_escape_string($conn, $_POST["viber_group"]);

    $update_viber_group = "UPDATE `social_media_group`  SET `viber` = '$element_viber_group' WHERE `social_media_group`.`id` = 1";
 
    if($result_viber = mysqli_query($conn, $update_viber_group)){
        header("Location: admin.php");  
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}

// Telegram
$select_telegram_groups = "SELECT `telegram` FROM `social_media_group`";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    if($result_telegram_group = mysqli_query($conn, $select_telegram_groups)) {

        foreach($result_telegram_group as $telegrams) {

            $data_telegram_group = $telegrams['telegram'];

            echo "<h5>Группа в Telegram</h5>
                  <form method='POST'>
                        <div class='row'>
                            <p class='col-12'>
                                <input type='text' name='telegram' value='$data_telegram_group' class='form-control'>
                            </p>
                            <p  class='col-3'>
                                <input type='submit' value='Отправить' class='btn  btn-success'>
                            </p>
                        </div>
                  </form>";
        }
        mysqli_free_result($result_telegram_group);
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    };

} elseif (isset($_POST["telegram"])) {

    $element_telegram_group = mysqli_real_escape_string($conn, $_POST["telegram"]);

    $update_telegram_group = "UPDATE `social_media_group` SET `telegram` = '$element_telegram_group' WHERE `social_media_group`.`id` = 1";
 
    if($result = mysqli_query($conn, $update_telegram_group)) {
        header("Location: admin.php");  
    } else{
        echo "Ошибка при обновлении: " . mysqli_error($conn);
    }
};

// Facebook
$select_facebook_group = "SELECT `facebook` FROM `social_media_group`";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    if($result_facebook_group = mysqli_query($conn, $select_facebook_group)) {

        foreach($result_facebook_group as $facebook) {

            $data_facebook_group = $facebook['facebook'];

            echo "<h5>Группа в Facebook</h5>
                  <form method='POST'>
                        <div class='row'>
                            <p class='col-12'>
                                <input type='text' name='facebook' value='$data_facebook_group' class='form-control'>
                            </p>
                            <p  class='col-3'>
                                <input type='submit' value='Отправить' class='btn  btn-success'>
                            </p>
                        </div>
                  </form>";
        }
        mysqli_free_result($result_facebook_group);
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    };

} elseif (isset($_POST["facebook"])) {

    $element_facebook_group = mysqli_real_escape_string($conn, $_POST["facebook"]);

    $update_facebook_group = "UPDATE `social_media_group` SET `facebook` = '$element_facebook_group' WHERE `social_media_group`.`id` = 1";
 
    if($result_facebook = mysqli_query($conn, $update_facebook_group)) {
        header("Location: admin.php");  
    } else{
        echo "Ошибка при обновлении: " . mysqli_error($conn);
    }
};

// Instagram
$select_instagram_group = "SELECT `instagram` FROM `social_media_group`";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    if($result_instagram_group = mysqli_query($conn, $select_instagram_group)) {

        foreach($result_instagram_group as $instagram) {

            $data_instagram_group = $instagram['instagram'];

            echo "<h5>Группа в Instagram</h5>
                  <form method='POST'>
                        <div class='row'>
                            <p class='col-12'>
                                <input type='text' name='instagram' value='$data_instagram_group' class='form-control'>
                            </p>
                            <p  class='col-3'>
                                <input type='submit' value='Отправить' class='btn  btn-success'>
                            </p>
                        </div>
                  </form>";
        }
        mysqli_free_result($result_instagram_group);
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    };

} elseif (isset($_POST["instagram"])) {

    $element_instagram_group = mysqli_real_escape_string($conn, $_POST["instagram"]);

    $update_instagram_group = "UPDATE `social_media_group` SET `instagram` = '$element_instagram_group' WHERE `social_media_group`.`id` = 1";
 
    if($result_instagram = mysqli_query($conn, $update_instagram_group)) {
        header("Location: admin.php");  
    } else{
        echo "Ошибка при обновлении: " . mysqli_error($conn);
    }
};

/**
 * Замена картинки в headere сайта
*/
echo "<br><h4>Главная картинка</h4>";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    $select_company_img =  "SELECT `image` FROM `company_header_img`";

    if($result_img = mysqli_query($conn, $select_company_img)) {

        if(mysqli_num_rows($result_img) > 0) {
            echo "<form enctype='multipart/form-data' method='POST' class='form-border'>
                        <p class='col-12'>
                            <input class='form-control' type='file' name='file'>
                        </p>
                        <p class='col-12'>
                            <input type='submit' value='Отправить' class='btn  btn-success'>
                        </p>   
                </form><br>"; 
        } else {
            echo "<div>Данные не найдены!</div>";
        }
        mysqli_free_result($result_img);      
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
} elseif (isset($_FILES['file'])) {
    $element_file_name = basename($_FILES['file']['name']);
    $element_file_path = 'assets/img/' . $element_file_name;

    if (!move_uploaded_file($_FILES['file']['tmp_name'],  $element_file_path)) {
        echo 'Файл не смог загрузиться!';
    }

    if($_FILES['file']['error'] == 0) {
        $sql = "UPDATE `company_header_img` SET `image` = '$element_file_path'"; 
    }

    if($_FILES['file']['error'] == 4) {
        $sql = "UPDATE `company_header_img` SET `image` = `image`";  
    }

    if($result_img = mysqli_query($conn, $sql)){
        header("Location: admin.php");
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
} else {
    echo "<div>Данные не найдены!</div>";
}

/**
 * Править описание компании
*/
echo "<h4>Описание компании</h4>";

$select_description = "SELECT `title`, `description`, `blockquote` FROM `company_description`";

if($_SERVER["REQUEST_METHOD"] === "GET") {
    if($result_company_description = mysqli_query($conn, $select_description)) {

        foreach($result_company_description as $desc){

            $data_company_title = $desc['title'];
            $data_company_desc = $desc['description'];
            $data_company_blockquote = $desc['blockquote'];

            echo "<form method='POST'> 
                    <div class='row'>
                        <div class='col-12'>
                            <label for='title' class='form-label'>Заголовок описания, тэги: <i> h1, h2, h3, h4, h5, h6 </i></label>
                            <input type='text' id='title' class='form-control' name='title_desc' value='$data_company_title'> <br>
                        </div>
                        
                        <div class='col-12'>
                            <label for='desc' class='form-label'>Текст описания, тэги: <i> p, br, ins, b, i, small, mark </i></label>
                            <textarea id='desc' rows='9' class='form-control' rows='3' name='company_desc'>" . $data_company_desc . "</textarea> <br>
                        </div>
                    
                        <div class='col-12'>
                            <label for='blockquote' class='form-label'>Текст цитаты:, тэги: <i> p, br, ins, b, i, small, mark </i></label>
                            <textarea id='blockquote' rows='9' class='form-control' rows='3' name='blockq_desc'>" . $data_company_blockquote . "</textarea> <br>
                        </div>
                        <div class='col-12'>
                            <input type='submit' class='btn  btn-success' value='Отправить'>
                        </div>
                    </div>
                </form><br>";
        }
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    };
} elseif ( isset($_POST["title_desc"]) && isset($_POST["company_desc"]) && isset($_POST["blockq_desc"]) ) {
    $element_update_title_desc = mysqli_real_escape_string($conn, $_POST["title_desc"]);
    $element_update_description = mysqli_real_escape_string($conn, $_POST["company_desc"]);
    $element_update_blockquote = mysqli_real_escape_string($conn, $_POST["blockq_desc"]);

    $update_description = "UPDATE `company_description` SET `title` = '$element_update_title_desc', `description` = '$element_update_description', `blockquote` = '$element_update_blockquote' WHERE `company_description`.`id` = 1";

    if ($result = mysqli_query($conn, $update_description)){
        header("Location: admin.php");  
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
}

/**
 * Популярные маршруты, добавление, удаление, редактирование
*/
echo "<h4>Карточки</h4>";

echo "<h5>Заголовок блока карточек</h5>";

/**
 * Редактирование заголовка карточки
*/ 
$select_card_title = "SELECT `id`, `card_title` FROM `company_card_title`";

if($result_card_title = mysqli_query($conn, $select_card_title)) {
    foreach($result_card_title as $card_title){

        $data_card_title_id = $card_title['id'];
        $data_card_title = $card_title['card_title'];

        echo "<form method='POST'>
                <div class='row'>
                    <p class='col-12'>
                        <label for='title_card' class='form-label'>Заголовок карточек, тэги: <i> h1, h2, h3, h4, h5, h6 </i></label>
                        <input type='text' id='title_card' name='update_card_title' value='$data_card_title' class='form-control'>
                    </p>
                    <p  class='col-3'>
                        <input type='submit' value='Отправить' class='btn  btn-success'>
                    </p>
                </div>
              </form>";
    }
} else {
    echo "Ошибка: " . mysqli_error($conn);
};

if (isset($_POST["update_card_title"])) {
    $update_card_title = mysqli_real_escape_string($conn, $_POST["update_card_title"]);

    $company_card_title = "UPDATE `company_card_title` SET `card_title` = '$update_card_title'";

    if($result_card_title = mysqli_query($conn, $company_card_title)) {
        header("Location: admin.php");  
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
} 

echo "<h5>Добавить карточку</h5>";

// Добавление карточки маршрута
if ($_SERVER["REQUEST_METHOD"] === "GET") {

    echo "<form method='POST' enctype='multipart/form-data' class='form-border'>
            <div class='col-12 mb-3'>
                <label for='img_card' class='form-label'>Картинка карточки:</label>
                <input id='img_card' class='form-control' type='file' name='file_img' required>
            </div>

            <div class='mb-3'>
                <label for='inputWhere' class='form-label'>Откуда:</label>
                <input type='text' name='input_where' class='form-control' id='inputWhere' placeholder='Откуда' required>
            </div>
            
            <div class='mb-3'>
                <label for='inputDestination' class='form-label'>Куда:</label>
                <input type='text' name='input_destination' class='form-control' id='inputDestination' placeholder='Куда' required>
            </div>
            
            <div class='mb-3'>
                <input type='submit' class='btn btn-primary' value='Добавить'>
            </div>
        </form>";

} elseif (isset($_POST["input_where"]) && isset($_POST["input_destination"]) && isset($_FILES['file_img'])) {

    $insert_input_where = mysqli_real_escape_string($conn, $_POST["input_where"]);
    $insert_input_destination = mysqli_real_escape_string($conn, $_POST["input_destination"]);

    $insert_file_direction_name = basename($_FILES['file_img']['name']);
    $insert_file_direction_path = 'assets/img/' . $insert_file_direction_name;

    if (!move_uploaded_file($_FILES['file_img']['tmp_name'],  $insert_file_direction_path)) {
        echo 'Файл не смог загрузиться!';
    }

    $sql_direction_card = "INSERT INTO `company_directions` (`img_direction`, `from_where`, `where_destination`) VALUES 
        ('$insert_file_direction_path', '$insert_input_where', '$insert_input_destination')";

    if(mysqli_query($conn, $sql_direction_card)) {
        header("Location: admin.php");  
    } else {
        echo "Ошибка при редактировании: " . mysqli_error($conn);
    }
};

// Получение карточек маршрутов
$select_directions = "SELECT `id`, `img_direction`, `from_where`, `where_destination` FROM `company_directions` ORDER BY `id` DESC";

if($_SERVER["REQUEST_METHOD"] === "GET") {

    if($result_directions = mysqli_query($conn, $select_directions)) {

        echo "<div class='container'>
                <div class='row'>";
        echo "<div class='col-12 mt-3 mb-3'>
                <h5> Список карточек <button type='button' id='btn-hidden-cards' class='btn btn-secondary w-10'>Спрятать карточки</button> </h5>
              </div>";

        foreach ($result_directions as $desc) {
            
            $data_directions_id = $desc['id'];
            $data_directions_img = $desc['img_direction'];
            $data_from_where = $desc['from_where'];
            $data_where_destination = $desc['where_destination'];

           echo "<div class='col'>
                    <div class='row d-flex justify-content-evenly'>
                        <div class='card pt-2 pb-2 m-3' style='width: 18rem;'>

                            <img src='$data_directions_img' class='card-img-top' alt='NoImg'>

                            <div class='card-body d-flex flex-column justify-content-between'>
                                <h5 class='card-title text-center p-2'>
                                " . $data_from_where . " - " . $data_where_destination . "
                                </h5>

                                <div class='m-1'>
                                    <a href='update-card.php?id=" . $data_directions_id . "' class='btn btn-success w-100'>Исправить</a>
                                </div>

                                <div >
                                    <form action='delete.php' method='POST' class='m-1'>
                                        <input type='hidden' name='id' value='" . $data_directions_id . "' />
                                        <input type='submit' value='Удалить' class='btn btn-danger w-100'>
                                    </form>
                                </div>
                                
                            </div>      
                        </div>
                    </div>
                </div>";                  
        }

        echo "</div></div>";

        mysqli_free_result($result_directions);
        
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    };

};

// Список заказов
echo "<h5> Список заказов </h5>";
$select_order = "SELECT `id`, `order_from_where`, `order_where_destination`, `order_phone`, `order_date`, `order_cargo`, `order_passengers`, `order_time` FROM `company_orders` ORDER BY `id` DESC";

if($_SERVER["REQUEST_METHOD"] === "GET") {

    if($result_order = mysqli_query($conn, $select_order)) {
        echo "<div class='container-table'>";

            echo "<table class='table  text-center'>
                    <thead  class='table-active'>
                        <tr>
                            <th class='col-1' scope='col'>#</th>
                            <th class='col' scope='col'>Откуда</th>
                            <th class='col' scope='col'>Куда</th>
                            <th class='col' scope='col'>Телефон</th>
                            <th class='col' scope='col'>Дата поездки</th>
                            <th class='col' scope='col'>Груз/передача</th>
                            <th class='col' scope='col'>Пасажири</th>
                            <th class='col' scope='col'>Дата заказа </th>
                            <th class='col-1' scope='col'>Удалить</th>
                        </tr>
                    </thead>";  
                    
            $rowNumber = 1; 

            foreach($result_order as $order) { 
                $order_id = $order['id'];
                $order_from_where = $order['order_from_where'];
                $order_where_destination = $order['order_where_destination'];
                $order_phone = $order['order_phone'];
                $order_date = $order['order_date'];
                $order_order_cargo = $order['order_cargo'];
                $order_order_passengers = $order['order_passengers'];
                $order_time = $order['order_time']; 

                echo "<tr>
                        <td class='col-1'>
                            <div class='num'>
                            " . $rowNumber . "
                            </div>
                        </td>
                        <td class='col'>
                            " . nl2br(htmlspecialchars($order_from_where))  . "
                        </td>
                        <td class='col'>
                            " . nl2br(htmlspecialchars($order_where_destination)) . "
                        </td>
                        <td  class='col'>
                            " . $order_phone . "
                        </td>
                        <td  class='col'>
                            " .  $order_date . "
                        </td>
                        <td  class='col'>
                            " .  $order_order_cargo . "
                        </td>
                        <td  class='col'>
                            " .  $order_order_passengers . "
                        </td>
                        <td  class='col'>
                            " . $order_time . "
                        </td>
                        <td class='col-1'>
                        <form action='order_delete.php' method='POST' class='m-1'>
                            <input type='hidden' name='id' value='" . $order_id . "' />
                            <input type='submit' value='Удалить' class='btn btn-danger w-100'>
                        </form>
                            
                        </td>
                    </tr>"; 

                $rowNumber++;  
            
            };

        echo " </table>";
        
        if($rowNumber == 1) {
            echo "<style>
                    .table {
                        display: none;
                    }
                 </style>";
            echo "<div class='alert alert-danger' role='alert'>
                    В списке нет заказов...
                  </div>";
        }

        echo "</div>";

        mysqli_free_result($result_order);
        
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    };

}; 

mysqli_close($conn);
?>

</div>
<hr>
<span id="full_year" class="p-2"></span>
<span>
    <?php
        echo $_SERVER['SERVER_NAME'];
    ?>
</span>
<script>
    const date = new Date().getFullYear();
    document.querySelector('#full_year').innerHTML = date;
</script>
<script src="./assets/js/script-admin.js"></script>
