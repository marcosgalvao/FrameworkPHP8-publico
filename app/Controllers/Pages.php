<?php

class Pages extends Controller
{

    public function index()
    {

        if (Sessao::estaLogado()):
            Url::redirect('posts');
        endif;

        $dados = [
            'tituloPagina' => 'Página Inicial',
            'descricao' => 'Aprendendo PHP MVC',
        ];

        $this->view('pages/home', $dados);
    }

    public function sobre()
    {
        $dados = [
            'tituloPagina' => 'Página Sobre'
        ];

        $this->view('pages/sobre', $dados);
    }

    public function uploadimg() {


        $this->view('pages/upload-img');
    }

    public function error()
    {
        $dados = [
            'tituloPagina' => 'Erro - Página não encontrada'
        ];

        $this->view('pages/error', $dados);
    }

}
