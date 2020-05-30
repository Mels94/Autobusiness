<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 04.04.2020
 * Time: 20:24
 */

namespace application\components;

use application\controllers\SiteController;
use application\controllers\UserController;
use application\controllers\admin\DashboardController;
use application\controllers\admin\CategoryController;

/*class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = __DIR__.'/../config/routes.php';
        $this->routes = include_once($routesPath);
    }

    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->getUri();

        foreach ($this->routes as $pattern => $path)
        {
            if (preg_match("~$pattern~",$uri)) {
                $route = preg_replace("~$pattern~", $path, $uri);

                $segments = explode('/', $route);

                $controllerPath = "application/controllers/";
                if (in_array('admin', $segments)) {
                    $controllerPath = 'application/controllers/admin/';
                    array_shift($segments);
                }
                $controllerName = $controllerPath.ucfirst(array_shift($segments))."Controller";

                $actionName = "action".ucfirst(array_shift($segments));

                $parameters = $segments;

                if (!file_exists($controllerName.'.php')) {
                    header("Location: /error");
                }

                $controllerName = str_replace("/", "\\", $controllerName);

                $objectName = new $controllerName();

                if (!method_exists($objectName, $actionName)) {
                    header("Location: /error");
                }
                //var_dump($parameters);
                $result = call_user_func_array(array($objectName, $actionName), $parameters);

                if ($result != null) {
                    break;
                }
            }
        }
    }
}*/


class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require 'application/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    public function add($route, $params)
    {
        //$route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        return false;
    }

    public function match()
    {
        $url = $this->getUri();
        foreach ($this->routes as $route => $params) {
            if (preg_match('/[?]/', $url)) {
                $url = preg_split('/[?]/', $url)[0];
            }
/*            if (preg_match('#([?])#', $url)) {
                $route = "$route([?])([a-z]+)=([0-9]+)";
            } else {
                $route = "$route";
            }*/
            if (preg_match("#^$route$#", $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function getParams()
    {
        if (!empty($this->getUri())) {
            $url = $this->getUri();
            if (preg_match('#/([?])([a-z]+)=([0-9]+)#', $url)) {
                $arrUrl = explode('/', $url);
                $getParam = array_pop($arrUrl);
                return $param = array_pop($arrUrl);
            }else{
                $arrUrl = explode('/', $url);
                return $param = array_pop($arrUrl);
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            if (preg_match('#admin#', $this->getUri())) {
                $pathAdmin = 'application\controllers\admin\\' . ucfirst($this->params['controller']) . 'Controller';
                if (class_exists($pathAdmin)) {
                    $actionAdminName = 'action' . ucfirst($this->params['action']);
                    if (method_exists($pathAdmin, $actionAdminName)) {
                        $adminController = new $pathAdmin;
                        //$adminController->$actionAdminName();
                        call_user_func_array(array($adminController, $actionAdminName), [$this->getParams()]);
                    } else {
                        header('Location: /error');
                    }
                } else {
                    header('Location: /error');
                }
            } else {
                $pathSite = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
                if (class_exists($pathSite)) {
                    $actionName = 'action' . ucfirst($this->params['action']);
                    if (method_exists($pathSite, $actionName)) {
                        $controller = new $pathSite;
                        //$controller->$actionName();
                        call_user_func_array(array($controller, $actionName), [$this->getParams()]);
                    } else {
                        header('Location: /error');
                    }
                } else {
                    header('Location: /error');
                }
            }
        } else {
            header('Location: /error');
        }
    }
}
