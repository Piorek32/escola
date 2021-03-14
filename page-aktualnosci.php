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
<section id="news" class="all__news">
    
<h2 class="page__header" ><span> Wszystkie </span><spna><?php the_title() ?></spna></h2>

<div class="container" >
<?php
$qry	=	new	WP_Query([
				'post_type'	=>	'post',
				
				
				
				
]);	?>
<?php	if	(	$qry->have_posts()	)	:
				while	(	$qry->have_posts()	)	:
                $qry->the_post();
                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));
                //template	tags	?>
                <div class="news__box">
                    <div class="img__box">
                <img src="<?php echo $thumbnail[0] ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="content__box">
                <h3 class="box__title"><?php	the_title();	?></h3>
                <p><?php the_date(); ?></p>
                <p><?php the_excerpt();  ?></p>
                <a class="btn" href="<?php the_permalink(); ?>">Więcej</a>
                    </div>

                
            
                 
                </div>          
			
                <?php	wp_reset_postdata();	?>
            
               
<?php	endwhile;	?>
<?php	else:	?>
<?php	endif;	?>

         

               
     
</section>
</main>








<?php


get_footer();
?>