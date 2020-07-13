<style type="text/css">
body{
background-image: none;
display: block;
}
</style>
<div id="content">
    <h1>Witaj!</h1>
    <h2>Zaplanuj z nami swój dzień.</h2>
    <a href="registration.php" class="button">Dołącz do nas</a>
</div>

<div class="section">
    <div id="section-1">
        <div class="s1-box-1">
            <h3>Todokit</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia fugit nam libero molestias laudantium delectus laborum itaque eum quod. Sed quisquam doloremque tempora ad vitae laborum doloribus reprehenderit, magnam vero! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe adipisci eius et eaque corporis delectus quia obcaecati architecto, mollitia voluptas assumenda ipsa, necessitatibus atque pariatur itaque debitis culpa quas laborum. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde, ullam. Ea quas voluptatibus nesciunt quibusdam vitae, dolore voluptas tenetur itaque quidem labore. Dicta, soluta. Doloremque illo iste repellat ut minima.</p>
            <p>Officia fugit nam libero molestias laudantium delectus laborum itaque eum quod. Sed quisquam doloremque tempora ad vitae laborum doloribus reprehenderit, magnam vero!
            </p>
            <p>Odit magnam pariatur nesciunt, repellat in tempora officiis fugit iusto officia reiciendis vel! Quam blanditiis fugit laudantium nam minus maiores commodi obcaecati.</p>
        </div>
        <div class="s1-box-2">
            <img src="./layouts/img/rating.png" alt="rating" />
            <h6>Nr 1 wśród użytkowników</h6>
        </div>
    </div>
    <div id="section-2">
        <div class="s2-box-1">
            <img src="./layouts/img/f01.jpg" alt="image2-app" />
            </div>
        <div class="s2-box-2">
            <h3>Todokit</h3>
            <p>Sit amet consectetur adipisicing elit. Quam in omnis vel aperiam alias maxime explicabo, repudiandae amet. Nam odit dolorem vel consequuntur adipisci architecto dolorum. Cum laudantium nemo obcaecati.</p>
            <p>Accusamus sed a neque delectus dolor facilis corrupti assumenda impedit quo sapiente quas et velit at voluptatem aperiam, facere quis amet perspiciatis!</p>
            <p>Quis vel, fugit repellendus saepe consequatur officiis omnis magni quia commodi cupiditate dolorem quam asperiores voluptate veritatis suscipit? Eius incidunt maxime animi?</p>
        </div>
    </div>

    <div id="section-3">
        <div class="box-1">
        
        <h6><img src="./layouts/img/5-stars.png" alt="rating" /></h6>
        <p><i>Zawsze wieczorem dodaję do listy zadania, które wykonam następnego dnia. Wtedy mogę spać spokojnie, nie martwiąc się, że o czymś zamponę.</i></p>Ania
        </div>
        <div class="box-2">
        <h6><img src="./layouts/img/5-stars.png" alt="rating"/></h6>
        <p><i>Bardzo przydatna aplikacja.</i></p>Marek
        </div>
        <div class="box-3">
        <h6><img src="./layouts/img/5-stars.png" alt="rating"/></h6>
        <p><i>Todokit jest tak proste w obsłudze, że nawet moja babcia tego używa. Polecam!</i></p>Kamil
        </div>
    </div>
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

