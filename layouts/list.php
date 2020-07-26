<nav class="topnav">
    <button><i class="fa fa-bars" style="scale: 1.5"></i></button>
    <sidebar class="topnav-menu">
        <ul>
            <li><a href="<?=ROOT_URL."list.php?category=all"?>">Wszystkie</a></li>
            <li><a href="<?=ROOT_URL."list.php?category=home"?>">Dom</a></li>
            <li><a href="<?=ROOT_URL."list.php?category=work"?>">Praca</a></li>
            <li><a href="<?=ROOT_URL."list.php?category=entertainment"?>">Rozrywka</a></li>
        </ul>
    </sidebar>
</nav>

<form id="print" action="print.php" method="post">
    <input type="hidden" name="category" value="<?=$category?>">
    <input type="hidden" name="sortBy" value="<?=$sortBy?>">
    <input type="hidden" name="orderBy" value="<?=$orderBy?>">
    <button type="submit" name="print">
        <i class="fa fa-print" style="scale: 1.5"></i>Drukuj
    </button>
</form>
<div class="statementRed">
    <?php
    if(isset($_SESSION['info']))
    {
        echo $_SESSION['info'];
        unset($_SESSION['info']);
    }
    ?>
</div>

<div class="hello">
    <h3>Witaj <?= $_SESSION['userFirstName'];?>!</h3>
</div>
<div class="section-task">
    <div class="add-task">
          <form action="add.php" method="post" autocomplete="off">
            <input class="input-task" type="text" name="task" placeholder="Dodaj nowe zadanie" required>
              <input type="text" class="my-datepicker" name="dateTimeAdd" placeholder="Wybierz datę wykonania zadania" required>
            <button title="Dodaj zadanie" type="submit"><b>&#43;</b></button>
            <div class="radio-group">

                Wybierz kategorię:
                <input type="radio" name="categoryID" id="dom"  value="1" required>
                <label for="dom">Dom</label>
                <input type="radio" name="categoryID" id="praca" value="2">
                <label for="praca">Praca</label>
                <input type="radio" name="categoryID" id="rozrywka" value="3">
                <label for="rozrywka">Rozrywka</label>
            </div>
          </form>
    </div>
</div>

<div class="section-list">
    <div id="sort">
        <button name="sort">
            <a href="<?=ROOT_URL."list.php$categoryURL&sortBy=task&orderBy=ASC"?>">Nazwa &nbsp;<i class="fa fa-sort-up"></i></a>
        </button>
        <button name="sort">
            <a href="<?=ROOT_URL."list.php$categoryURL&sortBy=task&orderBy=DESC"?>">Nazwa &nbsp;<i class="fa fa-sort-down"></i></a>
        </button>
        <button name="sort">
            <a href="<?=ROOT_URL."list.php$categoryURL&sortBy=date&orderBy=ASC"?>">Data &nbsp;<i class="fa fa-sort-up"></i></i></a>
        </button>
        <button name="sort">
            <a href="<?=ROOT_URL."list.php$categoryURL&sortBy=date&orderBy=DESC"?>">Data &nbsp;<i class="fa fa-sort-down"></i></a>
        </button>

    </div>
    
    <?php foreach ($listArray as $item) { ?>
        <div class="list-item">
            <form action="delete.php" method="post">
                <button title="Usuń" name="delete" class="remove-task" value="<?=$item['id']?>">
                    <a onclick="return confirm('Czy chcesz skasować zadanie?')">
                        <i class="fa fa-window-close" style="scale: 0.9"></i>
                    </a>
                </button>
            </form>
            <form action="edit.php" method="post">
                <button title="Edycja" name="edit" class="edit-task" value="<?=$item['id']?>">
                    <i class="fa fa-edit"></i>
                </button>
            </form>
            <h3><?=$item['task']?></h3>
            <br>
            <small><?=$item['date']?></small>
            <small>Kategoria: <?php switch($item['category_id']){
                case 1:
                    echo "Dom";
                break;
                case 2:
                    echo "Praca";
                break;
                case 3:
                    echo "Rozrywka";
                break;
                }?></small>
        </div>
    <?php } ?>
</div>



<div class="footer">
    Work In Progress &copy; <?php echo date("Y");?>
</div>

<script src="./jquery.js"></script>
<script src="./jquery.datetimepicker.full.min.js"></script>

<script>
    jQuery('.my-datepicker').datetimepicker({
        format:'d.m.Y H:i'
    });
</script>