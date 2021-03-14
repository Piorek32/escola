<?php get_header(); ?>




<div class="small__hero">
   
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

?>
<div class="hero_text_box">
        <h1 class="title">
        <?php	the_title();	?></h1>
      
       
<?php endwhile;  ?>
    <?php else :  ?>
    <?php endif;  ?>

</div>
</div>



<main>
    <section class="sing__up">
            <div class="container">
            <h2 class="page__header" > <span>formularz</span> zgłoszeniowy</h2>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?> 
    
        
<p><?php the_content() ?></p>

<?php endwhile;  ?>
    <?php else :  ?>
    <?php endif;  ?>
        <form  class="wordpress-ajax-form form" method="post" action="<?php echo admin_url('admin-ajax.php');  ?> ">
        <input name="name" type="text"   placeholder="Imie i nazwisko (opkiekuna)" >
        <input name="childName" type="text"  placeholder="Imię i nazwisko (dziecka)" >
        <input name="childData" type="text"  placeholder="Data urodzenia (dziecka)" onfocus="(this.type='date')" >
        <input name="pesel" type="number" placeholder="Pesel (dziecka)">
        <input name="school" type="text" placeholder="Szkoła lub Przedszkole (numer placówki)">
        <input name="adress" type="text" placeholder="Adres zamieszkania (ulica, kod pocztowy,  miasto)">
        <input name="phone" type="number" placeholder="Numer kontaktowy (opiekuna)">  
        
     <input name="email" type="text" placeholder="Adres email (opiekuna)" >

        <div class="checkbox__wraper">
     <input name="checkbox" type="checkbox"> <span> Akceptuję regulamin Klubu dostępny na stronie www.escolavarsovia.pl oraz jego ewentualne zmiany za sprawą uchwał Zarządu, a także wyrażam zgodę na wykorzystanie
i przetwarzanie przez klub moich danych osobowych do celów statutowych klubu, w tym utrzymywania kontaktów ze mną, które nie będą udostępniane innym osobom oraz podmiotom zgodnie z art. 7 pkt. 5 ustawy z dnia 29.08.1997r. o ochronie danych osobowych (Dz.U. z 2002 r., Nr 101, poz. 926 ze zm.).
        </span>
        </div>
        <input type="hidden" name="action" value="custom_action">
        <p class="error"></p>
        <p class="success"></p>
        <button class="btn" >Zapisz się</button>
</form>




            </div>
    </section>
</main>






<?php


get_footer();
?>
