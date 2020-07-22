    <div class="wrapper">
        <div class="form-holder">
            <h1>Rejestracja</h1>
            <form method="post" class="form">
                <div class="form-group">
                    <input type="text" name="first_name" placeholder="Imię">
                </div>
                <div class="form-group">
                    <input type="text" name="second_name" placeholder="Nazwisko">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" name="confirmPassword" placeholder="Confirm password">
                </div>
                <div class="form-group">
                    <button type="submit" name="register">Zarejestruj się</button>
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