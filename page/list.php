<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_POST['userId'];
    if (isset($_POST['removeUser'])){
        removeUser($conn, $id);
    }
    if (isset($_POST['editUser'])){
        header('Location: /contactez-nous/?userid=' . $id);
    }
}

$data = listUser($conn);
?>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">Liste des contacts</div>
            <form action="" method="POST" id="formList" name="formList">
                <input type="hidden" name="userId" id="userId" value="">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($data as $record): ?>
                        <tr>
                            <td>
                                <a href="/contactez-nous?userid=<?php echo $record['id'];?>">
                                    <?php echo $record['id'];?>
                                </a>
                            </td>
                            <td><?php echo $record['firstname'];?></td>
                            <td><?php echo $record['lastname'];?></td>
                            <td><?php echo $record['lastname'];?></td>
                            <td><?php echo $record['password'];?></td>
                            <td>
                                <button name="removeUser" type="submit" id="removeUser_<?php echo $record['id']; ?>" class="btn btn-default" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-remove listRemove" aria-hidden="true"></span>
                                </button>
                                <button name="editUser" id="editUser_<?php echo $record['id']; ?>" type="submit" class="btn btn-default" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-pencil listEdit" aria-hidden="true"></span>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </form>
        </div>
    </div>
</div>
