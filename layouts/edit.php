<div class="wrapper">
    <div class="form-holder">
        <h1>Edycja zadania</h1>
        <form method="post" class="form">
            <div class="form-group">
                <textarea class="form-control" rows="3" name="task" placeholder="<?=$taskToDisplay['task']?>"><?=$taskToDisplay['task']?></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="my-datepicker" name="date" value="<?=$newDate?>" required>
            </div>
            <div class="form-group">
                <button><a href="list.php" class="button">Anuluj</a></button>
                <button type="submit" name="taskID" value="<?=$taskToDisplay['id']?>" class="button">Zatwierdź zmianę</button>
            </div>
        </form>
    </div>
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