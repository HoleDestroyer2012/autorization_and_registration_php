<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">AreaWeb</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home">Home</a>
                </li>
            </ul>
            <form class="d-flex">
                <?php
                session_start();
                if (isset($_SESSION["loggined"]) && $_SESSION["loggined"] === true) {
                    echo '<a class="nav-link active m-2" href="profile" type="submit">Profile</a>';
                } else {
                    echo '<a class="nav-link active m-2" href="login" type="submit">Login</a>
                <a class="nav-link active m-2" href="register" type="submit">Register</a>';
                }
                ?>
            </form>
        </div>
    </div>
</nav>