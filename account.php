<?php 

/**
 * Template Name: account
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


 <section>
     <div class="container">
<?php 


echo  do_shortcode('[woocommerce_my_account]')  

?>
     </div>

 </section>



 <?php get_footer(); ?>