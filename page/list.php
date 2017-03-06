<?php
    require "../src/bdd.php";

    $sql = "SELECT * from contact";
    $mysqli = getConnection();
    $data = execSql($mysqli, $sql);

?>
<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">Liste des contacts</div>
            <table class="table">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                </tr>
                <?php foreach($data as $record): ?>
                    <tr>
                        <td><?php echo $record['firstname'];?></td>
                        <td><?php echo $record['lastname'];?></td>
                        <td><?php echo $record['lastname'];?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
</div>
