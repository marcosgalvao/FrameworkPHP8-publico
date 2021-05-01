<div class="col-xl-4 col-md-6 mx-auto p-5">

    <div class="card">
        <div class="card-header bg-secondary text-white">
            Registro
        </div>
        <div class="card-body">

            <p class="card-text"><small>Preencha o formulário para fazer seu registro.</small></p>

            <form method="post" name="registrar" action="<?= URL ?>/users/create">

                <div class="mb-3">
                    <label for="nome">Nome: <sup class="text-danger">*</sup></label>
                    <input type="text" name="nome" id="nome" value="<?= $dados['name_user'] ?>"
                        class="form-control <?= $dados['nome_erro'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['nome_erro'] ?>
                    </div>
                </div>

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
                    <label for="confirm-pass">Confirme a senha: <sup class="text-danger">*</sup></label>
                    <input type="password" name="confirm-pass" id="confirm-pass" value="<?= $dados['confirm-pass'] ?>"
                        class="form-control <?= $dados['confirm-pass_erro'] != '' ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                        <?= $dados['confirm-pass_erro'] ?>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-info btn-block" value="Registrar">
                        </div>
                        <div class="col-md-6">
                            <a href="<?=URL?>/users/login">Já é registrado? Faça o login</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>