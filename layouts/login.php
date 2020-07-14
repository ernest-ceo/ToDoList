    <div class="wrapper">
        <div class="form-holder">
            <h1>Logowanie</h1>
            <form method="post" class="form">
                <div class="form-group">
                    <input type="text" name="email" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Hasło">
                </div>
                <div class="form-group">
                    <button type="submit" name="login">Zaloguj się</button>
                </div>
            </form>
            <form method="post" class="form">
                <div class="form-group">
                    <button type="submit" name="forgotPassword">Zapomniałem hasła</button>
                </div>
            </form>
            <div class="statement">
                <?php
                if(isset($_SESSION['info']))
                {
                    echo $_SESSION['info'];
                    unset($_SESSION['info']);
                }
                ?>
            </div>
        </div>
    </div>

<div class="footer">
    Work In Progress &copy; <?php echo date("Y");?>
</div>