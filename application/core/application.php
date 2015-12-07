<?php

class Application
{

    private $url_controller = null;
    private $url_action = null;
    private $url_params = array();

    public function __construct()
    {
        $this->getUrlWithoutModRewrite();

        if (!$this->url_controller) {

            require APP . 'controllers/home.php';
            $page = new Home();
            $page->index();

        } elseif (file_exists(APP . 'controllers/' . $this->url_controller . '.php')) {

            require APP . 'controllers/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();


            if (method_exists($this->url_controller, $this->url_action)) {

                if(!empty($this->url_params)) {
                    // Llama el metodo y le pasa los argumentos
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    //Si no hay  parametros llama a el metodo sin argumentos.
                    $this->url_controller->{$this->url_action}();
                }

            } else {
                if(strlen($this->url_action) == 0) {
                    // Si no se define alguna accion defino por defecto la index
                    $this->url_controller->index();
                }
                else {
                    //Si la accion no existe lanzo el error
                    require APP . 'controllers/error.php';
                    $page = new Error();
                    $page->index();
                }
            }
        } else {
            require APP . 'controllers/error.php';
            $page = new Error();
            $page->index();
        }
    }


    private function getUrlWithoutModRewrite()
    {

        $url = explode('/', $_SERVER['REQUEST_URI']);
        $url = array_diff($url, array('', 'index.php'));
        $url = array_values($url);

        
        if (defined('URL_SUB_FOLDER') && !empty($url[0]) && $url[0] === URL_SUB_FOLDER) {
            unset($url[0]);
            $url = array_values($url);
        }

        $this->url_controller = isset($url[0]) ? $url[0] : null;
        $this->url_action = isset($url[1]) ? $url[1] : null;
        unset($url[0], $url[1]);
        $this->url_params = array_values($url);
    }
}
