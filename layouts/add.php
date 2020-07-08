<div calss="row">
    <div class="col-6 offset-3">
    <form action="add.php" method="post">
        <div class="form-group">
            <label for="1">Treść zadania</label>
            <textarea class="form-control" id="1" rows="3" name="task"></textarea>
            <button type="submit" class="btn btn-secondary">Zapisz</button>
        </div>
    </form>
        <?php
        if(isset($_SESSION['info']))
        {
            echo $_SESSION['info'];
            unset($_SESSION['info']);
        }
        ?>
    </div>
</div>
