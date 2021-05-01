<header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?=URL?>">Página Inicial</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=URL?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=URL?>/pages/sobre">Sobre</a>
                    </li>
                </ul>

                <?php if (isset($_SESSION['user_id'])): ?>
                <p>Olá, <?=$_SESSION['user_name']?>, seja bem vindo(a)!
                    <a href="<?= URL  ?>/users/logout" class="btn btn-outline-danger">Sair</a>

                    <?php else: ?>

                    <a class="nav-link" href="<?=URL?>/users/login">Login</a>

                    <a class="nav-link" href="<?=URL?>/users/create">Inscreva-se</a>

                    <?php endif;?>

            </div>
        </div>
    </nav>




    <div class="mask" style="background-color: rgba(0, 0, 0, 0.7);">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                <h1 class="mb-3">Learn Bootstrap 5 with MDB</h1>
                <h5 class="mb-4">Best & free guide of responsive web design</h5>
                <a class="btn btn-outline-light btn-lg m-2" href="https://www.youtube.com/watch?v=c9B4TPnak1A"
                    role="button" rel="nofollow" target="_blank">Start tutorial</a>
                <a class="btn btn-outline-light btn-lg m-2" href="https://mdbootstrap.com/docs/standard/"
                    target="_blank" role="button">Download MDB UI KIT</a>
            </div>
        </div>
    </div>

</header>