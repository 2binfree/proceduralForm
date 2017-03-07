<?php

/**
 * @param $uri
 * @return array
 */
function getRoute($uri) {

    require '../config/routes.php';

    $segments = explode('?', $uri);
    $pages = explode('/', $segments[0]);
    if (isset($routes[$pages[1]])){
        $index = $pages[1];
    } else {
        $index = "index";
    }
    $argument = (isset($pages[2])) ? $pages[2] : "";
    $page = $routes[$index]['page'];
    $title = $routes[$index]['title'];
    $file = $page . '.php';

    return array(
        'page'      => $page,
        'title'     => $title,
        'file'      => $file,
        'argument'  => $argument,
    );
}

