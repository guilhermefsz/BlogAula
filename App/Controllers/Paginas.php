<?php
class Paginas extends Controller{
    public function index(){
        $dados = ['titulo' => 'Paginas Inicial', 'descricao' => 'AULA de PHP'];
        $this ->view ('paginas/home', $dados);
    }
    public function sobre(){
        $dados = ['titulo' => 'Sobre nós...', 'descricao' => 'Esta aula é sobre PHP orientado a objetos com MVC'];
        $this->view('paginas/sobre', $dados);
        
    }
}
?>