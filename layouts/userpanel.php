
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
                    <button type="submit" name="updateData">Zaktualizuj</button>
                </div>
            </form>
        </div>
        <div class="form-holder">
            <h1>Zmiana hasła</h1>
            <form method="post" class="form">
                <div class="form-group">
                    <input type="password" name="passwordOld" placeholder="Stare hasło" required>
                </div>
                <div class="form-group">
                    <input type="password" name="passwordNew" placeholder="Nowe hasło" required>
                </div>
                <div class="form-group">
                    <input type="password" name="passwordNewRepeated" placeholder="Powtórz nowe hasło" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="updatePassword">Zmień hasło</button>
                </div>
            </form>
        </div>
    </div>

<div class="footer">
    Work In Progress &copy; <?php echo date("Y");?>
</div>