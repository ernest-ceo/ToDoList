
<div class="col-6 offset-3">
    <form action="print.php" method="post">
       <button class="btn btn-warning" name="print">Drukuj</button>
    </form>
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
            </tr>
<?php
}
       ?>
        </tbody>
    </table>
</div>
