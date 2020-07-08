    <div class="wrapper">
        <div class="form-holder">
            <h1>Dane konta</h1>
            <form method="post" class="form">
                <div class="form-group">
                    <input type="text" name="firstName" value="<?php echo $_SESSION['userFirstName']; ?>" placeholder="Imię">
                </div>
                <div class="form-group">
                    <input type="text" name="secondName" value="<?php echo $_SESSION['userSecondName']; ?>" placeholder="Nazwisko">
                </div>
                <div class="form-group">
                    <button type="submit" name="update">Zaktualizuj</button>
                </div>
            </form>
        </div>
    </div>

<div class="footer">
    Work In Progress &copy; <?php echo date("Y");?>
</div>