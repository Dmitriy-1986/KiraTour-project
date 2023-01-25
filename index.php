<?php
require('./db.php');
require('./component/head/head.php');
error_reporting(E_ALL);

$kiatour_phone_number = "SELECT `phone` FROM `company_phone`"; // Выбирает телефонные номера 
$company_phone_number = mysqli_query($conn, $kiatour_phone_number);
$kiatour_company_phone_number = mysqli_fetch_all($company_phone_number, MYSQLI_ASSOC);

$kiatour_img = "SELECT `image` FROM `company_header_img`"; // Выбирает главную картинку
$company_img = mysqli_query($conn, $kiatour_img);
$kiatour_company_img = mysqli_fetch_all($company_img, MYSQLI_ASSOC);

$kiatour_description = "SELECT `title`, `description`, `blockquote` FROM `company_description`"; // Выбирает описание компании
$company_description = mysqli_query($conn, $kiatour_description);
$kiatour_company_description = mysqli_fetch_all($company_description, MYSQLI_ASSOC);

$kiatour_card_title = "SELECT `card_title` FROM `company_card_title`"; // Выбирает заголовок карточки
$company_card_title = mysqli_query($conn, $kiatour_card_title);
$kiatour_card_title = mysqli_fetch_all($company_card_title, MYSQLI_ASSOC);

$kiatour_direction_card = "SELECT `id`, `img_direction`, `from_where`, `where_destination` FROM `company_directions`  ORDER BY `id` DESC"; // Выбирает карточки напралений
$company_direction_card = mysqli_query($conn, $kiatour_direction_card);
$kiatour_card = mysqli_fetch_all($company_direction_card, MYSQLI_ASSOC);

$kiatour_social_media_chat = "SELECT `id`, `viber`, `telegram`, `whatsapp`, `phone` FROM `social_media_chat`"; // Выбирает список чатов социальных сетей
$company_social_media_chat = mysqli_query($conn, $kiatour_social_media_chat);
$kiatour_chat = mysqli_fetch_all($company_social_media_chat, MYSQLI_ASSOC);

$kiatour_social_media_group = "SELECT `id`, `viber`, `telegram`, `facebook`, `instagram` FROM `social_media_group`"; // Выбирает список групп социальных сетей
$company_social_media_group = mysqli_query($conn, $kiatour_social_media_group);
$kiatour_group = mysqli_fetch_all($company_social_media_group, MYSQLI_ASSOC);


if(isset($_POST['enter'])) {
    if (isset($_POST["order_from_where"]) && 
    isset($_POST["order_where_destination"]) &&  
    isset($_POST["order_phone"]) &&
    isset($_POST["order_date"]) &&
    empty($_POST['order_cargo']) &&
    isset($_POST["order_passengers"]) ) {
    $insert_order_from_where = mysqli_real_escape_string($conn, $_POST["order_from_where"]);
    $insert_order_where_destination = mysqli_real_escape_string($conn, $_POST["order_where_destination"]);
    $insert_order_phone = mysqli_real_escape_string($conn, $_POST["order_phone"]);
    $insert_order_date = mysqli_real_escape_string($conn, $_POST["order_date"]);
    $insert_order_passengers = mysqli_real_escape_string($conn, $_POST["order_passengers"]);

    $sql_order_form = "INSERT INTO `company_orders` (`id`, `order_from_where`, `order_where_destination`, `order_phone`, `order_date`, `order_cargo`, `order_passengers`, `order_time`) VALUES 
        (NULL, '$insert_order_from_where', '$insert_order_where_destination', '$insert_order_phone', '$insert_order_date', 'Невыбрано', '$insert_order_passengers', current_timestamp())";
    
    $to = 'kiratour777@gmail.com, 7357mma@gmail.com';
    $from = 'www.ukrainegermany.com';
    $subject = 'Уведомление о заказе на сайте!';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "Кому: $to" . "\r\n";
  
    $message = "<html>
                <head>
                  <title>Оформлен заказ на сайте: $from. </title>
                </head>
                <body>
                  <table style='border-collapse:collapse; margin: auto;'>
                    <!-- HEADER -->
                    <tr>
                      <th colspan='2'>
                         <img src='https://www.ukrainegermany.com/assets/img/KiraTour.png' height='150px'>
                      </th>
                    </tr>
                    
                    <tr>
                        <th colspan='2'>
                            <h2 style='text-align: center;'>KiraTour</h2>
                        </th>
                    </tr>
                    
                    <tr>
                      <th colspan='2'>
                        <h3 style='text-align: center;'>Оформлен заказ на сайте: $from</h3>
                      </th>
                    </tr>
                    
                    <!-- MAIN -->
                    <tr style='border: 1px solid grey;'>
                      <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                        Номер телефона клиента
                      </th>
                      <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                        $insert_order_phone
                      </td>
                    
                    </tr>
                    
                    <tr>
                        <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            Откуда
                        </th>
                        <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            $insert_order_from_where
                        </td>
                    </tr>
                    
                    <tr>
                        <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            Куда
                        </th>
                        <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            $insert_order_where_destination
                        </td>
                    </tr>
                    
                    <tr>
                        <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            Дата поездки
                        </th>
                        <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            $insert_order_date
                        </td>
                    </tr>
                    
                    <tr>
                        <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            груз/передача
                        </th>
                        <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            Невыбрано
                        </td>
                    </tr>
                    
                    <tr>
                        <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            пассажиры
                        </th>
                        <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            $insert_order_passengers
                        </td>
                    </tr>
                    
                </table>
            </body>
            </html>";
			
    mail($to, $subject, $message, $headers);

    if(mysqli_query($conn, $sql_order_form)) {
        header("Location: order-send.php"); 
        exit; 
    } else {
        echo "Ошибка при добавлении данных: " . mysqli_error($conn);
    }
    } elseif (isset($_POST["order_from_where"]) && 
        isset($_POST["order_where_destination"]) &&  
        isset($_POST["order_phone"]) &&
        isset($_POST["order_date"]) &&
        isset($_POST['order_cargo']) &&
        empty($_POST["order_passengers"])) {
        $insert_order_from_where = mysqli_real_escape_string($conn, $_POST["order_from_where"]);
        $insert_order_where_destination = mysqli_real_escape_string($conn, $_POST["order_where_destination"]);
        $insert_order_phone = mysqli_real_escape_string($conn, $_POST["order_phone"]);
        $insert_order_date = mysqli_real_escape_string($conn, $_POST["order_date"]);
        $insert_order_cargo = mysqli_real_escape_string($conn, $_POST["order_cargo"]);

        $sql_order_form = "INSERT INTO `company_orders` (`id`, `order_from_where`, `order_where_destination`, `order_phone`, `order_date`, `order_cargo`, `order_passengers`, `order_time`) VALUES 
            (NULL, '$insert_order_from_where', '$insert_order_where_destination', '$insert_order_phone', '$insert_order_date', '$insert_order_cargo', 'Невыбрано', current_timestamp())";

        $to = 'kiratour777@gmail.com, 7357mma@gmail.com';
        $from = 'www.ukrainegermany.com';
        $subject = 'Уведомление о заказе на сайте!';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "Кому: $to" . "\r\n";
      
        $message = "<html>
                    <head>
                      <title>Оформлен заказ на сайте: $from. </title>
                    </head>
                    <body>
                      <table style='border-collapse:collapse; margin: auto;'>
                        <!-- HEADER -->
                        <tr>
                          <th colspan='2'>
                             <img src='https://www.ukrainegermany.com/assets/img/KiraTour.png' height='150px'>
                          </th>
                        </tr>
                        
                        <tr>
                            <th colspan='2'>
                                <h2 style='text-align: center;'>KiraTour</h2>
                            </th>
                        </tr>
                        
                        <tr>
                          <th colspan='2'>
                            <h3 style='text-align: center;'>Оформлен заказ на сайте: $from</h3>
                          </th>
                        </tr>
                        
                        <!-- MAIN -->
                        <tr style='border: 1px solid grey;'>
                          <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            Номер телефона клиента
                          </th>
                          <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            $insert_order_phone
                          </td>
                        
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Откуда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_order_from_where
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Куда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_order_where_destination
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Дата поездки
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_order_date
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                груз/передача
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_order_cargo
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                пассажиры
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Невыбрано
                            </td>
                        </tr>
                        
                    </table>
                </body>
                </html>";
    			
        mail($to, $subject, $message, $headers);
    
        if(mysqli_query($conn, $sql_order_form)) {
        
            header("Location: order-send.php"); 
            exit; 
        } else {
            echo "Ошибка при добавлении данных: " . mysqli_error($conn);
        }
    } elseif (isset($_POST["order_from_where"]) && 
        isset($_POST["order_where_destination"]) &&  
        isset($_POST["order_phone"]) &&
        isset($_POST["order_date"]) &&
        empty($_POST['order_cargo']) &&
        empty($_POST["order_passengers"])) {
        $insert_order_from_where = mysqli_real_escape_string($conn, $_POST["order_from_where"]);
        $insert_order_where_destination = mysqli_real_escape_string($conn, $_POST["order_where_destination"]);
        $insert_order_phone = mysqli_real_escape_string($conn, $_POST["order_phone"]);
        $insert_order_date = mysqli_real_escape_string($conn, $_POST["order_date"]);

        $sql_order_form = "INSERT INTO `company_orders` (`id`, `order_from_where`, `order_where_destination`, `order_phone`, `order_date`, `order_cargo`, `order_passengers`, `order_time`) VALUES 
            (NULL, '$insert_order_from_where', '$insert_order_where_destination', '$insert_order_phone', '$insert_order_date', 'Невыбрано', 'Невыбрано', current_timestamp())";
            
        $to = 'kiratour777@gmail.com, 7357mma@gmail.com';
        $from = 'www.ukrainegermany.com';
        $subject = 'Уведомление о заказе на сайте!';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "Кому: $to" . "\r\n";
      
        $message = "<html>
                    <head>
                      <title>Оформлен заказ на сайте: $from. </title>
                    </head>
                    <body>
                      <table style='border-collapse:collapse; margin: auto;'>
                        <!-- HEADER -->
                        <tr>
                          <th colspan='2'>
                             <img src='https://www.ukrainegermany.com/assets/img/KiraTour.png' height='150px'>
                          </th>
                        </tr>
                        
                        <tr>
                            <th colspan='2'>
                                <h2 style='text-align: center;'>KiraTour</h2>
                            </th>
                        </tr>
                        
                        <tr>
                          <th colspan='2'>
                            <h3 style='text-align: center;'>Оформлен заказ на сайте: $from</h3>
                          </th>
                        </tr>
                        
                        <!-- MAIN -->
                        <tr style='border: 1px solid grey;'>
                          <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            Номер телефона клиента
                          </th>
                          <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            $insert_order_from_where
                          </td>
                        
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Откуда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_order_phone
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Куда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_order_where_destination
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Дата поездки
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_order_date
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                груз/передача
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Невыбрано
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                пассажиры
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Невыбрано
                            </td>
                        </tr>
                        
                    </table>
                </body>
                </html>";
    			
        mail($to, $subject, $message, $headers);
        
        if(mysqli_query($conn, $sql_order_form)) {
        
            header("Location: order-send.php"); 
            exit; 
        } else {
            echo "Ошибка при добавлении данных: " . mysqli_error($conn);
        }
    } elseif (isset($_POST["order_from_where"]) && 
        isset($_POST["order_where_destination"]) &&  
        isset($_POST["order_phone"]) &&
        isset($_POST["order_date"]) &&
        isset($_POST["order_cargo"]) &&
        isset($_POST["order_passengers"])) {

        $insert_order_from_where = mysqli_real_escape_string($conn, $_POST["order_from_where"]);
        $insert_order_where_destination = mysqli_real_escape_string($conn, $_POST["order_where_destination"]);
        $insert_order_phone = mysqli_real_escape_string($conn, $_POST["order_phone"]);
        $insert_order_date = mysqli_real_escape_string($conn, $_POST["order_date"]);
        $insert_order_cargo = mysqli_real_escape_string($conn, $_POST["order_cargo"]);
        $insert_order_passengers = mysqli_real_escape_string($conn, $_POST["order_passengers"]);

        $sql_order_form = "INSERT INTO `company_orders` (`id`, `order_from_where`, `order_where_destination`, `order_phone`, `order_date`, `order_cargo`, `order_passengers`, `order_time`) VALUES 
            (NULL, '$insert_order_from_where', '$insert_order_where_destination', '$insert_order_phone', '$insert_order_date', '$insert_order_cargo', '$insert_order_passengers', current_timestamp())";

        $to = 'kiratour777@gmail.com, 7357mma@gmail.com';
        $from = 'www.ukrainegermany.com';
        $subject = 'Уведомление о заказе на сайте!';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "Кому: $to" . "\r\n";
      
        $message = "<html>
                    <head>
                      <title>Оформлен заказ на сайте: $from. </title>
                    </head>
                    <body>
                      <table style='border-collapse:collapse; margin: auto;'>
                        <!-- HEADER -->
                        <tr>
                          <th colspan='2'>
                             <img src='https://www.ukrainegermany.com/assets/img/KiraTour.png' height='150px'>
                          </th>
                        </tr>
                        
                        <tr>
                            <th colspan='2'>
                                <h2 style='text-align: center;'>KiraTour</h2>
                            </th>
                        </tr>
                        
                        <tr>
                          <th colspan='2'>
                            <h3 style='text-align: center;'>Оформлен заказ на сайте: $from</h3>
                          </th>
                        </tr>
                        
                        <!-- MAIN -->
                        <tr style='border: 1px solid grey;'>
                          <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            Номер телефона клиента
                          </th>
                          <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            $insert_order_phone
                          </td>
                        
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Откуда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_order_from_where
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Куда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_order_where_destination
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Дата поездки
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_order_date
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                груз/передача
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_order_cargo
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                пассажиры
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_order_passengers
                            </td>
                        </tr>
                        
                    </table>
                </body>
                </html>";
                    
        mail($to, $subject, $message, $headers);
        
        if(mysqli_query($conn, $sql_order_form)) {
        
            header("Location: order-send.php"); 
            exit; 
        } else {
            echo "Ошибка при добавлении данных: " . mysqli_error($conn);
        }
    }  
}

/* Modal window order */
if(isset($_POST['modal_order_enter'])) {

    if (isset($_POST["modal_order_from_where"]) && 
          isset($_POST["modal_order_where_destination"]) &&  
          isset($_POST["modal_order_phone"]) &&
          isset($_POST["modal_order_date"]) &&
          isset($_POST["modal_order_cargo"]) &&
          empty($_POST["modal_order_passengers"])) {

        $insert_modal_order_from_where = mysqli_real_escape_string($conn, $_POST["modal_order_from_where"]);
        $insert_modal_order_where_destination = mysqli_real_escape_string($conn, $_POST["modal_order_where_destination"]);
        $insert_modal_order_phone = mysqli_real_escape_string($conn,  $_POST["modal_order_phone"]);
        $insert_modal_order_date = mysqli_real_escape_string($conn, $_POST["modal_order_date"]);
        $insert_modal_order_cargo = mysqli_real_escape_string($conn, $_POST["modal_order_cargo"]);

        $sql_modal_order_form = "INSERT INTO `company_orders` (`id`, `order_from_where`, `order_where_destination`, `order_phone`, `order_date`, `order_cargo`, `order_passengers`, `order_time`) VALUES 
            (NULL, '$insert_modal_order_from_where', '$insert_modal_order_where_destination', '$insert_modal_order_phone', '$insert_modal_order_date', '$insert_modal_order_cargo', 'Невыбрано', current_timestamp())";

        $to = 'kiratour777@gmail.com, 7357mma@gmail.com';
        $from = 'www.ukrainegermany.com';
        $subject = 'Уведомление о заказе на сайте!';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "Кому: $to" . "\r\n";
      
        $message = "<html>
                    <head>
                      <title>Оформлен заказ на сайте: $from. </title>
                    </head>
                    <body>
                      <table style='border-collapse:collapse; margin: auto;'>
                        <!-- HEADER -->
                        <tr>
                          <th colspan='2'>
                             <img src='https://www.ukrainegermany.com/assets/img/KiraTour.png' height='150px'>
                          </th>
                        </tr>
                        
                        <tr>
                            <th colspan='2'>
                                <h2 style='text-align: center;'>KiraTour</h2>
                            </th>
                        </tr>
                        
                        <tr>
                          <th colspan='2'>
                            <h3 style='text-align: center;'>Оформлен заказ на сайте: $from</h3>
                          </th>
                        </tr>
                        
                        <!-- MAIN -->
                        <tr style='border: 1px solid grey;'>
                          <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            Номер телефона клиента
                          </th>
                          <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            $insert_modal_order_phone
                          </td>
                        
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Откуда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_from_where
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Куда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_where_destination
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Дата поездки
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_date
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                груз/передача
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_cargo 
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                пассажиры
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Невыбрано
                            </td>
                        </tr>
                        
                    </table>
                </body>
                </html>";
    			
        mail($to, $subject, $message, $headers);
    
        if(mysqli_query($conn, $sql_modal_order_form)) {
            header("Location: order-send.php"); 
            exit; 
        } else {
            echo "Ошибка при добавлении данных: " . mysqli_error($conn);
        }

    } elseif (isset($_POST["modal_order_from_where"]) && 
              isset($_POST["modal_order_where_destination"]) &&  
              isset($_POST["modal_order_phone"]) &&
              isset($_POST["modal_order_date"]) &&
              empty($_POST["modal_order_cargo"]) &&
              isset($_POST["modal_order_passengers"])) {
    
            $insert_modal_order_from_where = mysqli_real_escape_string($conn, $_POST["modal_order_from_where"]);
            $insert_modal_order_where_destination = mysqli_real_escape_string($conn, $_POST["modal_order_where_destination"]);
            $insert_modal_order_phone = mysqli_real_escape_string($conn,  $_POST["modal_order_phone"]);
            $insert_modal_order_date = mysqli_real_escape_string($conn, $_POST["modal_order_date"]);
            $insert_modal_order_passengers = mysqli_real_escape_string($conn, $_POST["modal_order_passengers"]);

            $sql_modal_order_form = "INSERT INTO `company_orders` (`id`, `order_from_where`, `order_where_destination`, `order_phone`, `order_date`, `order_cargo`, `order_passengers`, `order_time`) VALUES 
                (NULL, '$insert_modal_order_from_where', '$insert_modal_order_where_destination', '$insert_modal_order_phone', '$insert_modal_order_date', 'Невыбрано', '$insert_modal_order_passengers', current_timestamp())";
    
            $to = 'kiratour777@gmail.com, 7357mma@gmail.com';
            $from = 'www.ukrainegermany.com';
            $subject = 'Уведомление о заказе на сайте!';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "Кому: $to" . "\r\n";
          
            $message = "<html>
                    <head>
                      <title>Оформлен заказ на сайте: $from. </title>
                    </head>
                    <body>
                      <table style='border-collapse:collapse; margin: auto;'>
                        <!-- HEADER -->
                        <tr>
                          <th colspan='2'>
                             <img src='https://www.ukrainegermany.com/assets/img/KiraTour.png' height='150px'>
                          </th>
                        </tr>
                        
                        <tr>
                            <th colspan='2'>
                                <h2 style='text-align: center;'>KiraTour</h2>
                            </th>
                        </tr>
                        
                        <tr>
                          <th colspan='2'>
                            <h3 style='text-align: center;'>Оформлен заказ на сайте: $from</h3>
                          </th>
                        </tr>
                        
                        <!-- MAIN -->
                        <tr style='border: 1px solid grey;'>
                          <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            Номер телефона клиента
                          </th>
                          <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            $insert_modal_order_phone
                          </td>
                        
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Откуда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_from_where
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Куда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_where_destination
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Дата поездки
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_date
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                груз/передача
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Невыбрано
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                пассажиры
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_passengers
                            </td>
                        </tr>
                        
                    </table>
                </body>
                </html>";
        			
            mail($to, $subject, $message, $headers);
        
            if(mysqli_query($conn, $sql_modal_order_form)) {
                header("Location: order-send.php"); 
                exit; 
            } else {
                echo "Ошибка при добавлении данных: " . mysqli_error($conn);
            }

    } elseif (isset($_POST["modal_order_from_where"]) && 
          isset($_POST["modal_order_where_destination"]) &&  
          isset($_POST["modal_order_phone"]) &&
          isset($_POST["modal_order_date"]) &&
          empty($_POST["modal_order_cargo"]) &&
          empty($_POST["modal_order_passengers"])) {

        $insert_modal_order_from_where = mysqli_real_escape_string($conn, $_POST["modal_order_from_where"]);
        $insert_modal_order_where_destination = mysqli_real_escape_string($conn, $_POST["modal_order_where_destination"]);
        $insert_modal_order_phone = mysqli_real_escape_string($conn, $_POST["modal_order_phone"]);
        $insert_modal_order_date = mysqli_real_escape_string($conn, $_POST["modal_order_date"]);

        $sql_modal_order_form = "INSERT INTO `company_orders` (`id`, `order_from_where`, `order_where_destination`, `order_phone`, `order_date`, `order_cargo`, `order_passengers`, `order_time`) VALUES 
            (NULL, '$insert_modal_order_from_where', '$insert_modal_order_where_destination', '$insert_modal_order_phone', '$insert_modal_order_date', 'Невыбрано', 'Невыбрано', current_timestamp())";

        $to = 'kiratour777@gmail.com, 7357mma@gmail.com';
        $from = 'www.ukrainegermany.com';
        $subject = 'Уведомление о заказе на сайте!';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "Кому: $to" . "\r\n";
      
        $message = "<html>
                    <head>
                      <title>Оформлен заказ на сайте: $from. </title>
                    </head>
                    <body>
                      <table style='border-collapse:collapse; margin: auto;'>
                        <!-- HEADER -->
                        <tr>
                          <th colspan='2'>
                             <img src='https://www.ukrainegermany.com/assets/img/KiraTour.png' height='150px'>
                          </th>
                        </tr>
                        
                        <tr>
                            <th colspan='2'>
                                <h2 style='text-align: center;'>KiraTour</h2>
                            </th>
                        </tr>
                        
                        <tr>
                          <th colspan='2'>
                            <h3 style='text-align: center;'>Оформлен заказ на сайте: $from</h3>
                          </th>
                        </tr>
                        
                        <!-- MAIN -->
                        <tr style='border: 1px solid grey;'>
                          <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            Номер телефона клиента
                          </th>
                          <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            $insert_modal_order_phone
                          </td>
                        
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Откуда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_from_where
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Куда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_where_destination
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Дата поездки
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_date
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                груз/передача
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Невыбрано
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                пассажиры
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Невыбрано
                            </td>
                        </tr>
                        
                    </table>
                </body>
                </html>";
    			
        mail($to, $subject, $message, $headers);
        
        if(mysqli_query($conn, $sql_modal_order_form)) {
            header("Location: order-send.php"); 
            exit; 
        } else {
            echo "Ошибка при добавлении данных: " . mysqli_error($conn);
        }

    } elseif (isset($_POST["modal_order_from_where"]) && 
        isset($_POST["modal_order_where_destination"]) &&  
        isset($_POST["modal_order_phone"]) &&
        isset($_POST["modal_order_date"]) &&
        isset($_POST["modal_order_cargo"]) &&
        isset($_POST["modal_order_passengers"])) {

        $insert_modal_order_from_where = mysqli_real_escape_string($conn, $_POST["modal_order_from_where"]);
        $insert_modal_order_where_destination = mysqli_real_escape_string($conn, $_POST["modal_order_where_destination"]);
        $insert_modal_order_phone = mysqli_real_escape_string($conn, $_POST["modal_order_phone"]);
        $insert_modal_order_date = mysqli_real_escape_string($conn, $_POST["modal_order_date"]);
        $insert_modal_order_cargo = mysqli_real_escape_string($conn, $_POST["modal_order_cargo"]);
        $insert_modal_order_passengers = mysqli_real_escape_string($conn, $_POST["modal_order_passengers"]);

        $sql_modal_order_form = "INSERT INTO `company_orders` (`id`, `order_from_where`, `order_where_destination`, `order_phone`, `order_date`, `order_cargo`, `order_passengers`, `order_time`) VALUES 
            (NULL, '$insert_modal_order_from_where', '$insert_modal_order_where_destination', '$insert_modal_order_phone', '$insert_modal_order_date', '$insert_modal_order_cargo', '$insert_modal_order_passengers', current_timestamp())";

        $to = 'kiratour777@gmail.com, 7357mma@gmail.com';
        $from = 'www.ukrainegermany.com';
        $subject = 'Уведомление о заказе на сайте!';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "Кому: $to" . "\r\n";
      
        $message = "<html>
                    <head>
                      <title>Оформлен заказ на сайте: $from. </title>
                    </head>
                    <body>
                      <table style='border-collapse:collapse; margin: auto;'>
                        <!-- HEADER -->
                        <tr>
                          <th colspan='2'>
                             <img src='https://www.ukrainegermany.com/assets/img/KiraTour.png' height='150px'>
                          </th>
                        </tr>
                        
                        <tr>
                            <th colspan='2'>
                                <h2 style='text-align: center;'>KiraTour</h2>
                            </th>
                        </tr>
                        
                        <tr>
                          <th colspan='2'>
                            <h3 style='text-align: center;'>Оформлен заказ на сайте: $from</h3>
                          </th>
                        </tr>
                        
                        <!-- MAIN -->
                        <tr style='border: 1px solid grey;'>
                          <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            Номер телефона клиента
                          </th>
                          <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                            $insert_modal_order_phone
                          </td>
                        
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Откуда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_from_where
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Куда
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_where_destination
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                Дата поездки
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_date
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                груз/передача
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_cargo
                            </td>
                        </tr>
                        
                        <tr>
                            <th style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                пассажиры
                            </th>
                            <td style='border: 1px solid grey; text-align: center; padding: 5px;'>
                                $insert_modal_order_passengers
                            </td>
                        </tr>
                        
                    </table>
                </body>
                </html>";
                    
        mail($to, $subject, $message, $headers);
        
        if(mysqli_query($conn, $sql_modal_order_form)) {
            header("Location: order-send.php"); 
            exit; 
        } else {
            echo "Ошибка при добавлении данных: " . mysqli_error($conn);
        }
    }
}

?>

<body>
    <div class="container-fluid">
        <?php
            require('./component/navbar/navbar.php');
        ?>

        <div class="container">
            <?php 
                foreach ($kiatour_company_img as $img) {
                    echo "<img src='" . $img["image"] . "' class='img-fluid w-100' alt='IMG'>";
                }
            ?> 
        </div>

        <!-- DESCRIPTION -->
        <div class="container">
            <div class="row">
                <div class="col pt-5 description">
                    <?php
                        foreach ($kiatour_company_description as $desc) {
                            echo "<div class='title-desc'>" . $desc["title"] . "</div>
                                  <div>
                                    " . $desc["description"] . "
                                  </div>
                                  <blockquote class='blockquote border-blockquote  mt-5'>
                                    <div>
                                    " . $desc["blockquote"] . "
                                    </div>
                                  </blockquote>";
                        }
                    ?>  
                </div>
            </div>
        </div>

        <!-- FORM -->       
        <div class='container bg-secondary p-4'>
            <div class='row'>
                <div class='col pt-4 pb-4'>

                    <form  method='POST'>

                        <div class='row d-flex justify-content-between justify-content-md-center'>
                            <div class='col-lg-2 col-md-12 m-0 p-2'>
                                <input type='text' name='order_from_where' class='form-control' placeholder='Откуда'  required>  
                            </div>

                            <div class='col-lg-2 col-md-12 m-0 p-2'>
                                <input type='text' name='order_where_destination' class='form-control' placeholder='Куда'  required>     
                            </div>

                            <div class='col-lg-4 col-md-12 m-0 p-2'>
                                <input type='tel' name='order_phone' class='form-control phone-input' placeholder='38 (098) 000 00 00' minlength='10' maxlength='20' required>
                            </div>

                            <div class='col-lg-4 col-md-12 m-0 p-2'>
                                <input type='date' name='order_date'  class='form-control' required>
                            </div>
                        </div>

                        <div class='row pt-4'>
                            <div class='col-lg-3 col-md-12 p-2'>
                                <div class='form-check'>
                                    <input class='form-check-input' name='order_cargo' value='Груз/передача' type='checkbox' id='gridCheck'>
                                    <label class='form-check-label text-white' for='gridCheck'>
                                        груз/передача
                                    </label>
                                </div>
                                <div class='form-check'>
                                    <input class='form-check-input' name='order_passengers' value='Пасажири' type='checkbox' id='gridCheck'>
                                    <label class='form-check-label text-white' for='gridCheck'>
                                        пассажиры
                                    </label>
                                </div>
                            </div>
                            <div
                                class='col-lg-9 col-md-12 p-2 d-flex justify-content-sm-center justify-content-md-center justify-content-lg-end'>
                                <button type='submit' name='enter' class='btn btn-primary'>Забронировать</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- CARDS -->
        <div class="container">
            <div class="row">
                <div class="col pt-4 pb-4">
                        <?php 
                            foreach ($kiatour_card_title as $card_title) {
                                echo "<div class='text-center'>" . $card_title['card_title'] . "</div>";
                            }
                        ?>
                        <div class="row d-flex justify-content-evenly">
                            <?php 
                                foreach ($kiatour_card as $cards) {
                                echo "<div class='card pt-2 pb-2 m-3 d-flex justify-content-between' style='width: 15rem;'> 
                                            <img src='" . $cards['img_direction'] . "' class='card-img-top' alt='NoImg'>
                                            <h5 class='card-title text-center p-2'>" . $cards['from_where'] . " - " . $cards['where_destination'] . "</h5>
                                            <a href='#' class='btn btn-primary'  data-bs-toggle='modal' data-bs-target='#cardModal" . $cards['id'] . "'>Забронировать</a>
                                       </div>";
                                
                                // Модальное окно
                                echo "<div class='modal fade' id='cardModal" . $cards['id'] . "' tabindex='-1' aria-labelledby='cardModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='cardModalLabel'>
                                                " . $cards['from_where'] . " - " . $cards['where_destination'] . "
                                                </h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Закрыть'></button>
                                            </div>
                                            <div class='modal-body'>

                                            <!-- START FORM -->
                                                <form method='POST'>
                                                    <div class='row d-flex justify-content-between justify-content-md-center'>
                                                        <div class='col-12 m-0 p-2'>
                                                            <input type='text' name='modal_order_from_where' class='form-control' placeholder='Откуда'  required> 
                                                        </div>
                            
                                                        <div class='col-12 m-0 p-2'>
                                                            <input type='text' name='modal_order_where_destination' class='form-control' placeholder='Куда'  required> 
                                                        </div>
                            
                                                        <div class='col-12 m-0 p-2'>
                                                            <input type='tel' class='form-control phone-input' name='modal_order_phone' placeholder='38 (098) 000 00 00' minlength='10' maxlength='20' required>
                                                        </div>
                            
                                                        <div class='col-12 m-0 p-2'>
                                                            <input type='date' name='modal_order_date' class='form-control' required>
                                                        </div>
                                                    </div>
                            
                                                    <div class='row pt-4'>
                                                        <div class='col-12 p-2'>
                                                            <div class='form-check'>
                                                                <input class='form-check-input' name='modal_order_cargo' value='Груз/передача' type='checkbox' id='gridCheck'>
                                                                <label class='form-check-label' for='gridCheck'>
                                                                    груз/передача
                                                                </label>
                                                            </div>
                                                            <div class='form-check'>
                                                                <input class='form-check-input' name='modal_order_passengers' value='Пасажири' type='checkbox' id='gridCheck'>
                                                                <label class='form-check-label' for='gridCheck'>
                                                                    пассажиры
                                                                </label>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class='modal-footer'>
                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Закрыть</button>
                                                                <button type='submit' name='modal_order_enter' class='btn btn-primary'>Забронировать</button>
                                                        </div>
                                                        
                                                    </div>
                                                </form>
                                            <!-- END FORM -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                            }

                                 
                            ?>
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <button type='button' id="btn-see-more" class='btn btn-secondary w-10 btn-see-more'>Посмотреть ещё</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="container-fluid bg-footer">
            <div class="container">
                <div class="row pt-4 pb-4">

                    <div class="col-lg-3 col-md-12 footer-box">
                        <h3 class="text-center">
                        <img src="assets/img/KiraTour.png" alt="NoImg" width="100px"><br>
                            <?php 
                                foreach ($kiatour_company as $row) {
                                    echo $row["company"];
                                }
                            ?> 
                        </h3>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-box">             
                        <h5 class="text-center">Связаться с нами в чатах:</h5>
                        <div class="row footer-box">
                            <?php 
                                foreach ($kiatour_chat as $chat) {
                                    echo   "<div class='col d-flex justify-content-center'>
                                                <a href='viber://chat?number=%2B" . $chat['viber'] . "' target='_blank'>
                                                    <img src='./assets/img/viber.svg' alt='NoImg' class='social-icon'>
                                                </a>
                                            </div>
                                            <div class='col d-flex justify-content-center'>
                                                <a href='https://t.me/" . $chat['telegram'] . "' target='_blank'>
                                                    <img src='./assets/img/telegram.svg' alt='NoImg' class='social-icon'>
                                                </a>
                                            </div>
                                            <div class='col d-flex justify-content-center'>
                                                <a href='https://wa.me/" . $chat['whatsapp'] . "' target='_blank'>
                                                    <img src='./assets/img/whatsapp.svg' alt='NoImg' class='social-icon'>
                                                </a>
                                            </div>
                                            <div class='col d-flex justify-content-center' target='_blank'>
                                                <a href='tel:" . $chat['phone'] . "'>
                                                    <img src='./assets/img/phone.svg' alt='NoImg' class='social-icon'>
                                                </a>
                                            </div>";
                                }
                            ?> 
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-box">             
                        <h5 class="text-center">Присоединиться в группы:</h5>
                        <div class="row footer-box">
                            <?php
                                foreach ($kiatour_group as $group) {
                                    echo "<div class='col d-flex justify-content-center'>
                                        <a href='" . $group['viber'] . "' target='_blank'>
                                            <img src='./assets/img/viber.svg' alt='NoImg' class='social-icon'>
                                        </a>
                                    </div>
                                    <div class='col d-flex justify-content-center'>
                                        <a href='https://t.me/" . $group['telegram'] . "' target='_blank'>
                                            <img src='./assets/img/telegram.svg' alt='NoImg' class='social-icon'>
                                        </a>
                                    </div>
                                    <div class='col d-flex justify-content-center'>
                                        <a href='" . $group['facebook'] . "' target='_blank'>
                                            <img src='./assets/img/facebook.svg' alt='NoImg' class='social-icon'>
                                        </a>
                                    </div>
                                    <div class='col d-flex justify-content-center'>
                                        <a href='" . $group['instagram'] . "' target='_blank'>
                                            <img src='./assets/img/Instagram.svg' alt='NoImg' class='social-icon'>
                                        </a>
                                    </div>";
                                };
                            ?>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 d-flex flex-column justify-content-center align-items-center footer-box">
                        <p>
                            <?php
                                echo $_SERVER['SERVER_NAME'];
                            ?>
                        </p>
                        <p>© Все права защищены.</p>
                        <p>All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            foreach ($kiatour_chat as $chat) {
                echo "<div class='viber-sidebar-chat'>
                    <a href='viber://chat?number=%2B" . $chat['viber'] . "' target='_blank'>
                        <img src='./assets/img/viber.svg' alt='NoImg' class='social-icon'>
                    </a>
                </div>

                <div class='telegram-sidebar-chat'>
                    <a href='https://t.me/" . $chat['telegram'] . "' target='_blank'>
                        <img src='./assets/img/telegram.svg' alt='NoImg' class='social-icon'>
                    </a>
                </div>

                <div class='whatsapp-sidebar-chat'>
                    <a href='https://wa.me/" . $chat['whatsapp'] . "' target='_blank'>
                        <img src='./assets/img/whatsapp.svg' alt='NoImg' class='social-icon'>
                    </a>
                </div>";
            }
        ?>
    </div>

    <!--  JavaScript -->
    <script src="./assets/libs/bootstrap-5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/script.js"></script>

</body>

</html>
