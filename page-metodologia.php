


<?php 

/**
 * Template Name: metodologia
 */



?>

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
    <section class="infrastructure">
            <div class="container">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?> 
    
        <h2 class="page__header" ><spna><?php the_title() ?></spna></h2>
<?php the_content() ?>
<?php 

// args
$args = array(

	'post_type'		=> 'nasza-metodologia',
	
);


// query
$the_query = new WP_Query( $args );

?>


<?php if( $the_query->have_posts() ): ?>
	<ul class="buildings">
    <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));
    ?>
		<li class="single__building">
                   <div class="img__box__building">
        <img  src="<?php echo $thumbnail[0] ?>" alt="<?php the_title();  ?>">
        </div>
        <div class="content__box">
				<h3>   <?php the_title(); ?></h3>
                <?php the_content() ?>
        </div>

		</li>
	<?php endwhile; ?>
	</ul>
<?php endif; ?>

<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>


      
<?php endwhile;  ?>
    <?php else :  ?>
    <?php endif;  ?>
            </div>
    </section>
</main>




<?php


get_footer();
?>