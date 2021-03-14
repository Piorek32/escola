<?php 

/**
 * Template Name: cart
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
<section class="cart">
        <div class="container">

 <?php



echo do_shortcode('[woocommerce_cart]');
 ?>
        </div>
</section>

<?php 

get_footer();
?>