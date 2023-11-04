<!DOCTYPE html>
<html lang="ru">

<?php

use App\Services\Viewes;
?>

<?php
Viewes::part("head");
?>

<body>

    <?php
    Viewes::part("navbar");
    ?>
    <?php
    session_start();
    if (isset($_SESSION["loggined"]) && $_SESSION["loggined"] === true) {
        echo '<div class="container mt-4">
        <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <form action="auth/logout" method="post">
        <button type="submit" class="btn btn-primary">Log out</button>
    </form>
        </div>
    </div>';
    } else {
        echo '<div class="container mt-4">
        <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="login" role="button">Sing In</a>
        </div>
    </div>';
    }
    ?>

</body>

</html>