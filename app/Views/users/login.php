<div class="col-xl-4 col-md-6 mx-auto p-5">

    <div class="card">
        <div class="card-header bg-secondary text-white">
            Login
        </div>
        <div class="card-body">
            <?= Sessao::mensagem('user') ?>
            <p class="card-text"><small class="text-muted">Informe seus dados para fazer o login</small></p>

            <form method="post" name="login" action="<?= URL ?>/users/login">

                <div class="mb-3">
                    <label for="email">E-mail: <sup class="text-danger">*</sup></label>
                    <input type="text" name="email" id="email" value="<?= $dados['email'] ?>" class="form-control <?= $dados['email_erro'] != '' ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['email_erro'] ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="pass">Senha: <sup class="text-danger">*</sup></label>
                    <input type="password" name="pass" id="pass" value="<?= $dados['pass'] ?>" class="form-control <?= $dados['pass_erro'] != '' ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['pass_erro'] ?>
                    </div>
                </div>


                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-info btn-block" value="Entrar">
                        </div>
                        <div class="col-md-6">
                            <a href="<?=URL?>/users/create">Não está registrado? Registre-se</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>