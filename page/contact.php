<?php
    if ($route->getMethod() === 'post'){
        $userManager->hydrate($_POST);
        if ($userManager->getId() !== ""){
            $userManager->updateUser();
        } else {
            $userManager->addUser();
        }
        header('Location: /' . $route->getUrl('home') . '/addcontact/ok');
    } else {
        if ($route->getParameter("id") != "") {
            $userManager->getUser($route->getParameter("id"));
        }
    }

