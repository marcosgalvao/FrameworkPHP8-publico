<?php

class Users extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $dados = [
            'tituloPagina' => 'Página Users Index',
            'descricao' => 'blablaC',
        ];

        $this->view('users/create', $dados);
    }

    public function create()
    {

        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($form)):
            $dados = [
                'name_user' => trim($form['nome']),
                'email' => trim($form['email']),
                'pass' => trim($form['pass']),
                'confirm-pass' => trim($form['confirm-pass']),
                'nome_erro' => '',
                'email_erro' => '',
                'pass_erro' => '',
                'confirm-pass_erro' => '',
            ];

            if (in_array("", $form)):
                if (empty($form['nome'])):
                    $dados['nome_erro'] = 'Preencha o campo nome';
                endif;

                if (empty($form['email'])):
                    $dados['email_erro'] = 'Preencha o campo e-mail';
                endif;

                if (empty($form['pass'])):
                    $dados['pass_erro'] = 'Preencha o campo senha';

                endif;

                if (empty($form['confirm-pass'])):
                    $dados['confirm-pass_erro'] = 'Confirme a senha';
                endif;

            else:
                ///[a-zA-Z]+/m'
                if(Check::checkNome($form['nome'])):
                    $dados['nome_erro'] = 'O nome informado é inválido';

                elseif(Check::checkEmail($dados['email'])):
                    $dados['email_erro'] = 'O e-mail informado é inválido';
                
                elseif($this->userModel->checkEmail($form['email'])):
                    $dados['email_erro'] = 'O e-mail informado já está registrado.';

                elseif (strlen($form['pass']) < 6):
                    $dados['pass_erro'] = 'A senha deve ter no mínimo 6 caracteres.';

                elseif ($form['pass'] != $form['confirm-pass']):
                    $dados['confirm-pass_erro'] = 'As senhas devem ser iguais.';

                else:
                    $dados['pass'] = password_hash($form['pass'], PASSWORD_DEFAULT);

                    if($this->userModel->insert($dados)):
                        Sessao::mensagem('user', 'Registro realizado com sucesso!');
                        URL::redirect('users/login');
                    else:
                        die("Erro ao registrar usuário no banco de dados");
                    endif;

                    
                endif;
            endif;

        else:
            $dados = [
                'name_user' => '',
                'email' => '',
                'pass' => '',
                'confirm-pass' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'pass_erro' => '',
                'confirm-pass_erro' => '',
            ];
        endif;

        $this->view('users/create', $dados);
    }

    public function login()
    {

        $form = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($form)):
            $dados = [
                'email' => trim($form['email']),
                'pass' => trim($form['pass']),
                'email_erro' => '',
                'pass_erro' => '',
            ];

            if (in_array("", $form)):

                if (empty($form['email'])):
                    $dados['email_erro'] = 'Preencha o campo e-mail';
                endif;

                if (empty($form['pass'])):
                    $dados['pass_erro'] = 'Preencha o campo senha';

                endif;


            else:
                if(Check::checkEmail($form['email'])):
                    $dados['email_erro'] = 'O e-mail informado é inválido.';
                else:

                    $user = $this->userModel->checkLogin($form['email'], $form['pass']);

                    if($user): 
                        $this->createSessionUser($user);
                    else:
                        Sessao::mensagem('user', 'Usuário ou senha inválidos', 'alert alert-danger'); 
                    endif;

                endif;
            endif;

        else:
            $dados = [
                'email' => '',
                'pass' => '',
                'email_erro' => '',
                'pass_erro' => '',
            ];
        endif;

        $this->view('users/login', $dados);
    }

    private function createSessionUser($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name_user;
        $_SESSION['user_email'] = $user->email;
        
        URL::redirect('posts');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);

        session_destroy();

        URL::redirect('users/login');
    }

}
