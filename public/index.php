<?php

require_once __DIR__ . '/../vendor/autoload.php';

$route          = new \wcs\RouteManager();
$bdd            = new \wcs\BddManager();
$userManager    = new \wcs\UserManager($bdd);

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../view');
$twig = new Twig_Environment($loader, array(
    'cache' => __DIR__ . '/../tmp',
));

$templateData = array(
    'page'  => $route->getPage(),
    'route' => $route->getRoute(),
    'title' => $route->getTitle(),
);

require '../page/' . $route->getPage() . ".php";

switch($route->getRoute()){
    case 'home':
        $templateData['alert'] = $alert;
        break;
    case 'list':
        $templateData['data'] = $data;
        $templateData['contactURL'] = $route->getUrl('contact');
        break;
    case 'contact':
        $templateData['userManager'] = $userManager;
        break;
}

echo $twig->render('index.html.twig', $templateData);