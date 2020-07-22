<div class="wrapper">
    <div class="form-holder">
        <h1>Reset hasła</h1>
        <form method="post" class="form">
            <div class="form-group">
                <input type="email" name="email" placeholder="E-mail" required>
            </div>
            <div class="form-group">
                <button type="submit" name="resetPassword">Wyślij</button>
            </div>
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
        <div class="statementGreen">
            <?php
            if(isset($_SESSION['confirmation']))
            {
                echo $_SESSION['confirmation'];
                unset($_SESSION['confirmation']);
            }
            ?>
        </div>
    </div>
</div>

<div class="footer">
    Work In Progress &copy; <?php echo date("Y");?>
</div>