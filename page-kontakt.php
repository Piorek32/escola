<?php get_header(); ?>




<div class="small__hero">
   
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="hero_text_box">
        <h1 class="title">
        <?php	the_title();	?></h1>
      
       
<?php endwhile;  ?>
    <?php else :  ?>
    <?php endif;  ?>

</div>
</div>


<main>
    <section class="contact"> <h2 class="page__header" > <span>Dane</span> kontaktowe</h2>
            <div class="container">
           
            <?php
$qry	=	new	WP_Query([
                'post_type'	=>	'dane-kontaktowe',
                'orderby'	=>	'menu_order',
                
               
				
				
				
]);	?>
<?php	if	(	$qry->have_posts()	)	:
				while	(	$qry->have_posts()	)	:
				$qry->the_post();
                //template	tags	?>
                
                <div class="<?php the_title(); "contact__box" ?>" >
                <h3><?php the_title(); ?></h3>
                <?php the_content(); ?>
                </div> 
              
			
                <?php	wp_reset_postdata();	?>
                
               
<?php	endwhile;	?>
<?php	else:	?>
<?php	endif;	?>
            </div>
            
    </section>
    <section class="map">
        <div class="container flex">
            <div class="map__box">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2439.008836150717!2d20.980038851466258!3d52.31584215899201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ec90da1752611%3A0x45cb5a1455415c1c!2sEscola%20Varsovia!5e0!3m2!1spl!2spl!4v1613222343747!5m2!1spl!2spl" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="form__contact">
                <form class="wordpress-ajax-form2 form flex" method="post" action="<?php echo admin_url('admin-ajax.php');  ?>" >
                <input type="text" name="name" placeholder="Imię i nazwisko">
                <input type="text" name="email" placeholder="Email">
                <input type="textarea" name="message" placeholder="Wiadomość" >

        <div class="checkbox__wraper">
                <input type="checkbox" name="checkbox"> <span> Akceptuję regulamin Klubu dostępny na stronie www.escolavarsovia.pl oraz jego ewentualne zmiany za sprawą uchwał Zarządu, a także wyrażam zgodę na wykorzystanie
i przetwarzanie przez klub moich danych osobowych do celów statutowych klubu, w tym utrzymywania kontaktów ze mną, które nie będą udostępniane innym osobom oraz podmiotom zgodnie z art. 7 pkt. 5 ustawy z dnia 29.08.1997r. o ochronie danych osobowych (Dz.U. z 2002 r., Nr 101, poz. 926 ze zm.).
        </span>
        </div>
        <input type="hidden" name="action" value="custom_action2">
        <p class="error"></p>
        <p class="success"></p>        
        <button class="btn"   >wyślij</button>
                </form>
            </div>
        </div>
    </section>
</main>



<?php


get_footer();
?>