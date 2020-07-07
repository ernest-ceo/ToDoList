<div calss="row">
    <div class="col-6 offset-3">
        <form action="edit.php" method="post">
            <div class="form-group">
                <label for="1"><Treść zadania></label>
                <textarea class="form-control" id="1" rows="3" name="task" placeholder="<?=$taskToDisplay['task']?>"></textarea>
                <button type="submit" name="taskID" value="<?=$taskToDisplay['id']?>" class="btn btn-secondary">Zatwierdź zmianę</button>
            </div>
        </form>
    </div>
</div>
