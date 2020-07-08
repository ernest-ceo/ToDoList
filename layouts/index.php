<div id="content">
    <h1>Witaj!</h1>
    <h2>Zaplanuj z nami swój dzień.</h2>
    <a href="#" class="button">Dowiedz się więcej</a>
</div>
<?php
if(isset($_SESSION['info']))
{
    echo $_SESSION['info'];
    unset($_SESSION['info']);
}
?>

<div class="footer">
    Work In Progress &copy; <?php echo date("Y");?>
</div>