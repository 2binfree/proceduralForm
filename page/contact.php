<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        if ($_POST["id"] !== ""){
            updateUser($conn, $_POST["id"], $firstname, $lastname, $email, $password);
        } else {
            addUser($conn, $firstname, $lastname, $email, $password);
        }
        header('Location: /?page=index&addcontact=ok');
    } else {
        if (isset($_GET['userid'])) {
            $id = $_GET['userid'];
            $user = getUser($conn, $id);
            $firstname =  $user['firstname'];
            $lastname =  $user['lastname'];
            $email =  $user['email'];
            $password =  $user['password'];
        }
?>
<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <form action="" method="post" role="form">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <legend>Formulaire de contact</legend>

            <div class="form-group">
                <label for="">Prénom</label>
                <input type="text" class="form-control" name="firstname" id="firstname"
                       placeholder="Entrez votre prénom" value="<?php echo $firstname;?>">
            </div>
            <div class="form-group">
                <label for="">Nom</label>
                <input type="text" class="form-control" name="lastname" id="lastname"
                       placeholder="Entrez votre nom" value="<?php echo $lastname;?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" id="email"
                       placeholder="Entrez votre email" value="<?php echo $email;?>">
            </div>
            <div class="form-group">
                <label for="">Mot de passe</label>
                <input type="text" class="form-control" name="password" id="password"
                       placeholder="Entrez votre mot de passe" value="<?php echo $password;?>">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
</div>
<?php }

