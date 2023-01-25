<?php
require('./component/head/head.php');
?>

<div class="container-fluid">
    <?php
        require('./component/navbar/navbar.php');
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 300px);">

                    <div class="alert alert-success" role="alert">               
                        <h4 class="alert-heading">Спасибо за заказ!</h4>
                        <p>
                            Ожидайте, скоро с Вами свяжется наш менеджер!
                        </p>
                        <hr>
                        <p class="mb-0">
                            <a href="index.php">Перейти на главную страницу</a>
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>