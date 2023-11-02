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
    <div class="container" data-container="registration_container">
        <h2 class="mt-4">Sign Up</h2>
        <form class="mt-4 form" action="/auth/register" method="post" enctype="multipart/form-data" id="registration_form">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" name="full_name" class="form-control" id="full_name">
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" name="avatar" class="form-control" id="avatar">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="password_confirm" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirm" class="form-control" id="password_confirm">
            </div>
            <script type="module" src="viewes/src/preventLoginRegister.mjs"></script>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>