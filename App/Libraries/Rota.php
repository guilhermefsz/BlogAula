<?php

class Rota{
    private $controlador = "Paginas";
    private $metodos = "index";
    private $parametros = [];

    public function __construct(){
        $url = $this->url() ? $this->url() :[0];
        
       // echo "criando a primeira classe";
        if(file_exists('../app/Controllers/'.ucwords($url[0]).'.php')){
            $this->controlador = ucwords($url[0]);
            unset($url[0]);
        }
        require_once '../app/Controllers/'.$this->controlador.'.php';
        $this->controlador = new $this->controlador;
        $this->parametros = $url ? array_values($url) : [];
        call_user_func_array([$this->controlador, $this->metodos],
        $this->parametros);

        if(isset($url[1])){
            if(method_exists($this->controlador, $url[1])){
                $this-> $metodos = $url[1];
                unset($url[1]);
            }
        }
           $this->controlador = ucwords($url[0]);
           unset($url[0]);

        var_dump($this);

        $url = $this->url();
        var_dump($this->url());
    }
    public function url(){

        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        if(isset($url)){
            $url = explode('/', $url);
            return $url;
        }

        //echo $_GET['url'];
        //echo"Chamando a URL";
    }
}