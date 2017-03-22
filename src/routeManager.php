<?php

/**
 * @param $uri
 * @return array
 * @throws HttpException
 */
function getRoute($uri) {

    require '../config/routes.php';

    $segments = explode('?', $uri);
    $arguments = $segments[1];
    $parameters = array();

    $path = explode('/', $segments[0]);

    // get main page to display
    array_shift($path);
    $queryPage = "index";
    if ($path[0] !== ""){
        $queryPage = $path[0];
        if (!isset($routes[$queryPage])){
            header("HTTP/1.0 404 Not Found");
            die;
        }
    }

    // parse all argument passed by slashed path
    array_shift($path);
    $target = "name";
    $parameterName = "";
    foreach($path as $arg){
        if ($target === "name"){
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
    foreach($args as $arg){
        if ($arg !== "") {
            $elements = explode("=", $arg);
            $parameters[$elements[0]] = $elements[1];
        }
    }

    $page = $routes[$queryPage]['page'];
    $title = $routes[$queryPage]['title'];
    $file = $page . '.php';

    return array(
        'method'        => ($_SERVER['REQUEST_METHOD'] === 'POST') ? 'post' : 'get',
        'page'          => $page,
        'title'         => $title,
        'file'          => $file,
        'parameters'    => $parameters,
    );
}

