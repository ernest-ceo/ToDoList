<nav class="topnav">
    <button><i class="fa fa-bars" style="scale: 1.5"></i></button>
    <sidebar class="topnav-menu">
        <ul>
            <button><i class="fa fa-bars" style="scale: 1.5"></i></button>
            <li><a href="<?=ROOT_URL."list.php?category=all"?>">Wszystkie</a></li>
            <li><a href="<?=ROOT_URL."list.php?category=home"?>">Dom</a></li>
            <li><a href="<?=ROOT_URL."list.php?category=work"?>">Praca</a></li>
            <li><a href="<?=ROOT_URL."list.php?category=entertainment"?>">Rozrywka</a></li>
        </ul>
    </sidebar>
</nav>

<form id="print" action="print.php" method="post">
    <button name="print">
        <i class="fa fa-print" style="scale: 1.5"></i>Drukuj
    </button>
</form>
<?php
if(isset($_SESSION['info']))
{
    echo $_SESSION['info'];
    unset($_SESSION['info']);
}
?>
<div class="section-task">
    <div class="add-task">
          <form action="add.php" method="post" autocomplete="off">
            <input class="input-task" type="text" name="task" placeholder="Dodaj nowe zadanie" required>
            <button type="submit"><b>&#43;</b></button>
            <div class="radio-group">
                Wybierz kategorię:&nbsp
                <label for="dom">Dom</label>
                <input type="radio" name="categoryID" id="dom"  value="1" required>
                <label for="praca">Praca</label>
                <input type="radio" name="categoryID" id="praca" value="2">
                <label for="rozrywka">Rozrywka</label>
                <input type="radio" name="categoryID" id="rozrywka" value="3">
            </div>
          </form>
    </div>
</div>

<div class="section-list">

        <a href="<?=ROOT_URL."list.php$categoryURL&sortBy=date&orderBy=ASC"?>">Data ^</a>&nbsp
        <a href="<?=ROOT_URL."list.php$categoryURL&sortBy=task&orderBy=ASC"?>">Nazwa ^</a>&nbsp
        <a href="<?=ROOT_URL."list.php$categoryURL&sortBy=date&orderBy=DESC"?>">Data v</a>&nbsp
        <a href="<?=ROOT_URL."list.php$categoryURL&sortBy=task&orderBy=DESC"?>">Nazwa v</a>

    <?php foreach ($listArray as $item) { ?>
        <div class="list-item">
            <form action="delete.php" method="post">
                <button name="delete" class="remove-task" value="<?=$item['id']?>">
                    <i class="fa fa-window-close" style="scale: 0.9"></i>
                </button>
            </form>
            <form action="edit.php" method="post">
                <button name="edit" class="edit-task" value="<?=$item['id']?>">
                    <i class="fa fa-edit"></i></i>
                </button>
            </form>
            <h3><?=$item['task']?></h3>
            <br>
            <small>Dodano: <?=$item['date']?></small>
        </div>
    <?php } ?>
</div>

<div class="section-notes">
    <div class="add-notes">
          <form action="#" method="POST" autocomplete="off">
              <h3>Notatki</h3>
              <textarea type="text" name="title"></textarea>
              <input type="text" name="title" placeholder="Dodaj notatkę">
              <button type="submit"><b>&#43;</b></button>
          </form>
    </div>
</div>