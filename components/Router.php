<?php


class Router
{
    private $routes;

    public function __construct()       //при создании класа Router подключаем файл конфига
    {
        $routersPath = ROOT.'/config/routes.php';
        $this->routes = include ($routersPath);
    }

    public function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI'])){
            $uri = trim($_SERVER['REQUEST_URI'], '/');
            return reset(explode('?', $uri)); //убираем $_GET
        }
    }

    public function run(){
        $uri = $this->getURI(); //получение части адресной строки после домена

        foreach ($this->routes as $uriPattern => $path) //проходим массив маршрутов
        {
            if(preg_match("~$uriPattern~", $uri))   //если есть совпадение маршрута и адресной строки
            {
                $internalroute = preg_replace("~$uriPattern~", $path, $uri);
                $segment = explode('/', $internalroute); //разбиваем на части значение маршрута
                $controllerName = ucfirst(array_shift($segment)). 'Controller'; //имя контроллера

                $actionName = 'action'.ucfirst(array_shift($segment));  //имя action
                $parameters = $segment; //остатки, параметры

                $controlFile = ROOT.'/controllers/'.$controllerName.'.php'; //подключаем контроллер
                
                if(file_exists($controlFile)){  //если файл есть
                    include_once $controlFile;  //подключаем
                }

                $controllerObject = new $controllerName;

                 $result = call_user_func_array(array($controllerObject, $actionName), $parameters); //для выполнения action из Класса и передачи ему параметров

                if ($result != null){
                    break;
                }
            }
        }

    }
}