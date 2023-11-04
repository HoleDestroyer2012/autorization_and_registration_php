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
    <div class="container" data-container="login_container">
        <h2 class="mt-4">Sign In</h2>

        <?php
        session_start();
        if (isset($_SESSION["login_error"]))
            echo  '<div class="alert alert-secondary" role="alert">' . $_SESSION["login_error"] . '</div>';
        ?>

        <form class="mt-4 form" id="login_form" action="/auth/login" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>