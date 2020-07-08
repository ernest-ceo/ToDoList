<nav class="topnav">
    <button><i class="fa fa-bars" style="scale: 1.5"></i></button>
    <sidebar class="topnav-menu">
        <ul>
            <button><i class="fa fa-bars" style="scale: 1.5"></i></button>
            <li><a href="#">Dziś</a></li>
            <li><a href="#">Jutro</a></li>
            <li><a href="#">Ten tydzień</a></li>
            <li><a href="#">Kiedyś</a></li>
        </ul>
    </sidebar>
</nav>

<form id="print" action="print.php" method="post">
    <button name="print">
        <i class="fa fa-print" style="scale: 1.5"></i>Drukuj
    </button>
</form>

<div class="section-task">
    <div class="add-task">
          <form action="add.php" method="post" autocomplete="off">
              <input type="text" name="task" placeholder="Dodaj nowe zadanie" required>
              <button type="submit"><b>&#43;</b></button>
          </form>
    </div>
</div>

<div class="section-list">
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
            <input type="checkbox"/>
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