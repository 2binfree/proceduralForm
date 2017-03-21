<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $userManager->hydrate($_POST);
        if ($userManager->getId() !== ""){
            $userManager->updateUser();
        } else {
            $userManager->addUser();
        }
        header('Location: /?page=index&addcontact=ok');
    } else {
        if (isset($_GET['id'])) {
            $userManager->getUser($_GET['id']);
        }
?>
<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <form action="" method="post" role="form">
            <input type="hidden" name="id" value="<?php echo $userManager->getId();?>">
            <legend>Formulaire de contact</legend>

            <div class="form-group">
                <label for="">Prénom</label>
                <input type="text" class="form-control" name="firstname" id="firstname"
                       placeholder="Entrez votre prénom" value="<?php echo $userManager->getFirstName();?>">
            </div>
            <div class="form-group">
                <label for="">Nom</label>
                <input type="text" class="form-control" name="lastname" id="lastname"
                       placeholder="Entrez votre nom" value="<?php echo $userManager->getLastName();?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" id="email"
                       placeholder="Entrez votre email" value="<?php echo $userManager->getEmail();?>">
            </div>
            <div class="form-group">
                <label for="">Mot de passe</label>
                <input type="text" class="form-control" name="password" id="password"
                       placeholder="Entrez votre mot de passe" value="<?php echo $userManager->getPassword();?>">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
</div>
<?php }

