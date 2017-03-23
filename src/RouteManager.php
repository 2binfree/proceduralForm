<?php

namespace wcs;

class RouteManager
{
    /**
     * @var array
     */
    private $routes;
    private $parameters;

    /**
     * @var string
     */
    private $route;
    private $title;
    private $method;
    private $url;
    private $page;

    public function __construct()
    {
        $this->routes = require '../config/routes.php';
        $segments = explode('?', $_SERVER['REQUEST_URI']);
        $arguments = $segments[1];
        $parameters = array();

        $path = explode('/', $segments[0]);

        // get main page to display
        array_shift($path);
        $routeName = 'home';
        $route = $this->routes[$routeName];
        if ($path[0] !== "") {
            if (false === ($routeIndex = array_search($path[0], array_column($this->routes, 'url')))){
                header("HTTP/1.0 404 Not Found");
                die;
            } else {
                $routeName = array_keys(array_slice($this->routes, $routeIndex, 1))[0];
                $route = array_values(array_slice($this->routes, $routeIndex, 1))[0];
            }
        }

        // parse all argument passed by slashed path
        array_shift($path);
        $target = "name";
        $parameterName = "";
        foreach ($path as $arg) {
            if ($target === "name") {
                $target = "value";
                $parameterName = $arg;
            } else {
                // target = value
                $parameters[$parameterName] = $arg;
                $target = "name";
            }
        }

        // parse all argument passed by classic way (? and &)
        $args = explode("&", $arguments);
        foreach ($args as $arg) {
            if ($arg !== "") {
                $elements = explode("=", $arg);
                $parameters[$elements[0]] = $elements[1];
            }
        }
        $this->url          = $route['url'];
        $this->page         = $route['page'];
        $this->title        = $route['title'];
        $this->route        = $routeName;
        $this->method       = ($_SERVER['REQUEST_METHOD'] === 'POST') ? 'post' : 'get';
        $this->parameters   = $parameters;
    }

    /**
     * @param $parameter
     * @return bool|string
     */
    public function getParameter($parameter)
    {
        if (isset($this->parameters[$parameter])){
            return $this->parameters[$parameter];
        }
        return false;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param string $route
     * @return string
     */
    public function getUrl($route = "")
    {
        if ($route === "") {
            return $this->url;
        }
        return $this->routes[$route]['url'];
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
}

