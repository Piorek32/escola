<?php


/**
 * Template Name: regulamin
 */

?>


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
    <section class="single_cooperation">
            

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content() ?>
      
<?php endwhile;  ?>
    <?php else :  ?>
    <?php endif;  ?>

    </section>
</main>




<?php get_footer(); ?>