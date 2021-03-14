<?php


get_header(); ?>




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
<section>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

?>
<div class="container">
<div class="single__news">
<h2 class="page__header" ><spna><?php the_title() ?></spna></h2>

        <?php	the_content();	?></h1>
      
        <p><?php the_date(); ?></p>
        <p><?php the_author(); ?></p>
<?php endwhile;  ?>
    <?php else :  ?>
    <?php endif;  ?>

</div>

</div>

</section>
</main>





<?php


get_footer();
?>