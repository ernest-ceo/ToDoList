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
            <h3>Z Todokit zrealizujesz wyznaczone cele</h3>
            <p>Planowanie pomaga nam w realizacji celów, marzeń oraz codziennych obowiązków. Dzięki temu unikamy chaosu i możemy od razu przystąpić do wykonywania zadań.</p>
            <p>Korzystanie z list zadań do zrobienia oraz kalendarzy odciąża umysł. Wówczas nie trzeba już się przejmować tym, że się o czymś zapomni. Posiadanie planu wpływa korzystnie na Twoją motywację do działania. Wówczas znacznie częściej dążymy do tego, co założyliśmy.</p>
        </div>
        <div class="s1-box-2">
            <img src="./layouts/img/quote.png" alt="quote" />
        </div>
    </div>

    <div id="section-header">
        <h2><b>Zorganizuj swój czas z Todokit</b></h2>
        <p>Todokit jest aplikacją, dzięki której nie zapomnisz o tym, co miałeś zrobić. Załóż konto, abyś miał dostęp do swoich zadań gdzie i kiedy chcesz.</p>
    </div>

    <div id="section-1">
        <div class="s1-box-1">
            <h3>Z Todokit będziesz pamiętał o umówionych spotkaniach!</h3>
            <p>Kluczem do dobrego zarządzania czasem jest również branie pod uwagę celowości Twoich spotkań. Przed akceptacją propozycji spotkania, weź pod uwagę, czy danej sprawy nie można załatwić inaczej. W niektórych przypadkach wystarczy rozmowa przez telefon lub wymiana kilku e-maili.</p>
            <p>Jeśli zdecydowałeś się już na spotkanie, zadbaj o to, aby było jak najlepiej zorganizowane. Uczestnicy powinni wiedzieć wcześniej jaki jest cel i przebieg spotkania oraz jak długo będzie trwało. Staraj się zmieścić w wyznaczonym czasie.</p>
        </div>
        <div class="s1-box-2">
            <img id="img-rating" src="./layouts/img/rating.png" alt="rating" />
            <h6>Nr 1 wśród użytkowników</h6>
        </div>
    </div>

    <div id="section-2">
        <div class="s2-box-1">
            <img src="./layouts/img/f01.jpg" alt="image2-app" />
            </div>
        <div class="s2-box-2">
            <h3>Miej wszystko pod kontrolą</h3>
            <p>Przed rozpoczęciem pracy przygotuj listę zadań do wykonania w danym dniu. Dobra organizacja pozwala zaoszczędzić czas i pieniądze. 
            </p>
            <p>Jeśli nie inwestujesz czasu w planowanie zadań, znacznie łatwiej poddajesz się wpływowi czynników rozpraszających uwagę. Możemy do nich zaliczyć: scrollowanie niekończącej się tablicy na Facebooku, odbieranie telefonów, wysyłanie wiadomości czy plotki w czasie pracy. Walka z rozpraszaczami czasu jest trudna, lecz jak najbardziej możliwa.</p>
        </div>
    </div>

    <div id="section-3">
        <div class="box-1">
        
        <h6><img src="./layouts/img/5-stars.png" alt="rating" /></h6>
        <p><i>Zawsze wieczorem dodaję do listy zadania, które wykonam następnego dnia. Wtedy mogę spać spokojnie, nie martwiąc się, że o czymś zapomnę.</i></p><b>Ania</b>
        </div>
        <div class="box-2">
        <h6><img src="./layouts/img/5-stars.png" alt="rating"/></h6>
        <p><i>Bardzo przydatna aplikacja.</i></p><b>Marek</b>
        </div>
        <div class="box-3">
        <h6><img src="./layouts/img/5-stars.png" alt="rating"/></h6>
        <p><i>Todokit jest tak proste w obsłudze, że nawet moja babcia tego używa. Polecam!</i></p><b>Kamil</b>
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

