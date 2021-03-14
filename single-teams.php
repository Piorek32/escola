<?php get_header(); ?>




<div class="small__hero">
   
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
// $t = the_title();
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
    <section class="single_team">
            <div class="container">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?> 
    
        <h2 class="page__header" > <span>Drużyna</span> <?php the_title() ?></h2>
<?php the_content() ?>
<?php 

// args
$args = array(
	
    'post_type'		=> 'trenerzy',
	'meta_query'	=> array( 
    
       array(
        'key'	 	=> 'teams',
        
            'value'	  	=> get_the_title(),
            'compare' => 'LIKE'
    ))
);


// query
$the_query = new WP_Query( $args );

?>

<h3 class="trainer__header"> trener</h3>
<?php if( $the_query->have_posts() ): ?>
	<ul class="trainers">
    <?php while( $the_query->have_posts() ) : $the_query->the_post(); 
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));
    ?>
		<li class="trainer">
            
				<h3>   <?php the_title(); ?></h3>
                <?php the_content() ?>
                <div class="img__box__trainer">
        <img class="team" src="<?php echo $thumbnail[0] ?>" alt="<?php the_title();  ?>">
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