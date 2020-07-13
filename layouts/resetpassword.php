
<div class="wrapper">
    <div class="form-holder">
        <h1>Reset hasła</h1>
        <form method="post" class="form">
            <div class="form-group">
                <input type="password" name="password" placeholder="Hasło" required>
            </div>
            <div class="form-group">
                <input type="password" name="passwordRepeated" placeholder="Powtórz hasło" required>
            </div>
            <div class="form-group">
                <button type="submit" name="resetPassword">Zmień hasło</button>
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

<div class="footer">
    Work In Progress &copy; <?php echo date("Y");?>
</div>