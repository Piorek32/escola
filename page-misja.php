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
    <section class="mission">
            <div class="container flex">
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));
                ?> 
    
<div>  
<h2 class="page__header" > <span>Misja</span> klubu</h2>      
<p><?php the_content() ?></p>
</div>
<div>
<img src="<?php echo $thumbnail[0] ?>" alt="<?php the_title(); ?>">

</div>
<?php endwhile;  ?>
    <?php else :  ?>
    <?php endif;  ?>


    </div>
    </section>
</main>


<?php


get_footer();
?>
