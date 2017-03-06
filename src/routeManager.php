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
    $page = $routes[$index]['page'];
    $title = $routes[$index]['title'];
    $file = $page . '.php';

    return array(
        'page'  => $page,
        'title' => $title,
        'file'  => $file,
    );
}

