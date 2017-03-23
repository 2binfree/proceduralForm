<?php
if ($route->getMethod() === "post"){
    $id = $_POST['userId'];
    if (isset($_POST['removeUser'])){
        $userManager->removeUser($id);
    }
    if (isset($_POST['editUser'])){
        header('Location: /contactez-nous/id/' . $id);
    }
}
$data = $userManager->listUser();
