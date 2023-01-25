<?php
$kiatour_phone_number = "SELECT `phone` FROM `company_phone`"; // Выбирает телефонные номера 
$company_phone_number = mysqli_query($conn, $kiatour_phone_number);
$kiatour_company_phone_number = mysqli_fetch_all($company_phone_number, MYSQLI_ASSOC);
?>

<!-- NAVBAR -->
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
        <div class="container-fluid">
            <img src="assets/img/KiraTour.png" alt="NoImg" width="100px">
        <!-- Название компании -->
            <a class="navbar-brand" href="index.php">
                <strong> 
                    <?php 
                        foreach ($kiatour_company as $row) {
                            echo $row["company"];
                        }
                    ?> 
                </strong>
            </a>

            <!-- Телефонные номера -->
            <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
            <?php 
                foreach ($kiatour_company_phone_number as $phone_number) {
                    echo "<li class='nav-item'>
                                <a class='nav-link active' aria-current='page' href='tel:" . $phone_number['phone'] . "'>" . $phone_number['phone'] . "</a>
                            </li>";
                }
            ?>
            </ul>
                
            <!--
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Головна</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Напрямки
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Україна - Чехія</a></li>
                            <li><a class="dropdown-item" href="#">Україна - Литва</a></li>
                        </ul>
                    </li>


                </ul>
                <form id="form_search" class="d-flex">
                    <input id="input_search" class="form-control me-2" type="search" placeholder="Пошук"
                        aria-label="Search">
                    <button id="btn_search" class="btn btn-outline-success" type="submit">Пошук</button>
                </form>-->
            </div>
        </div>
    </nav>
</div>