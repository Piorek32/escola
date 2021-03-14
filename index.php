<?php get_header(); ?>




<div class="slider">
    <div class="slider__container">
        <?php
        $qry    =    new    WP_Query([
            'post_type'    =>    'hero',
            'posts_per_page'    =>    4,
            'orderby'    =>    'title',
            'order'    =>    'ASC',

        ]);    ?>
        <?php if ($qry->have_posts()) :
            while ($qry->have_posts()) :
                $qry->the_post();
                //template	tags	
        ?>
                <div class="slide" style=" height: 100%; background-repeat: no-repeat; background: linear-gradient(rgba(0, 0, 0, 0.4) 100%, transparent) , url('<?php echo get_the_post_thumbnail_url($post->ID) ?>'); background-size: cover; background-position: center">
                  
                    <div class="slider_content_box">

                            <h1 class="slider_title"><?php the_title();    ?></h1>
                            <p><?php the_content();  ?></p>
                            <a class="btn" href="<?php echo home_url() . "#onas"; ?>">Więcej</a>




                        <?php wp_reset_postdata();    ?>
                    </div>
                </div>

            <?php endwhile;    ?>
        <?php else :    ?>
        <?php endif;    ?>



    </div>
</div>




<main>


    <section id="onas" class="about__us">
        <div class="container">
            <?php
            $qry    =    new    WP_Query([
                'post_type'    =>    'o-klubie',
                'posts_per_page'    =>    1,



            ]);    ?>
            <?php if ($qry->have_posts()) :
                while ($qry->have_posts()) :
                    $qry->the_post();
                    //template	tags	
            ?>


                    <h2 class="page__header">
                        <spna><?php the_title() ?></spna>
                    </h2>

                    <p><?php the_content();  ?></p>





                    <?php wp_reset_postdata();    ?>



                <?php endwhile;    ?>
            <?php else :    ?>
            <?php endif;    ?>


        </div>

    </section>
    <section id="aktualności" class="news">
        <h2 class="page__header"><span>Aktualności</span> klubowe <h2>

                <div class="container gallerey__row">
                    <?php
                    $qry    =    new    WP_Query([
                        'post_type'    =>    'post',
                        'posts_per_page'    =>    5,



                    ]);    ?>
                    <?php if ($qry->have_posts()) :
                        while ($qry->have_posts()) :
                            $qry->the_post();
                            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));
                            //template	tags	
                    ?>
                            <div class="news__box">
                                <div class="img__box">
                                    <img src="<?php echo $thumbnail[0] ?>" alt="<?php the_title(); ?>">
                                </div>
                                <div class="content__box">
                                    <h3 class="box__title"><?php the_title();    ?></h3>
                                    <p><?php the_date(); ?></p>
                                    <p><?php the_excerpt();  ?></p>
                                    <a class="btn" href="<?php the_permalink(); ?>">Więcej</a>
                                </div>




                            </div>

                            <?php wp_reset_postdata();    ?>


                        <?php endwhile;    ?>
                    <?php else :    ?>
                    <?php endif;    ?>


                </div>


                <div class="container">
                    <a class="btn" href="<?php echo get_page_link(get_page_by_title("aktualności")->ID); ?>">wszystkie aktualności</a>
                </div>
                </div>


    </section>


    <section class="prallax">





    </section>


    <section class="partners">

        <h2 class="page__header"> <span> SPONSORZY </span> i PARTNERZY </h2>
        <div class="container">
            <ul>
                <li>HOTEL MISTRAL SPORT****</li>
            </ul>
        </div>
    </section>

</main>


<?php get_footer(); ?>