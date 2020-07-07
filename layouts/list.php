<div class="col-6 offset-3">
    <div class="row">
        <div class="col-6">
            <form action="print.php" method="post">
                <button class="btn btn-secondary" name="print">Drukuj</button>
            </form>
        </div>
        <div class="col-6">
            <form action="add.php" method="post">
                <button class="btn btn-primary" name="add" value="<?=$_SESSION['userID']?>">Dodaj</button>
            </form>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Zadanie</th>
                <th scope="col">Data</th>
            </tr>
        </thead>
        <tbody>
<?php
foreach ($listArray as $item)
{
    ?>
            <tr>
                <th scope="row"><?=$item['id']?></th>
                <td><?=$item['task']?></td>
                <td><?=$item['date']?></td>
                <form action="edit.php" method="post">
                <td><button name="edit" class="btn btn-success" value="<?=$item['id']?>">Edytuj</button></td>
                </form>
                <form action="delete.php" method="post">
                <td><button name="delete" class="btn btn-danger" value="<?=$item['id']?>">Usuń</button></td>
                </form>
            </tr>
<?php
}
       ?>
        </tbody>
    </table>
</div>
