<?php


/**
 * Template Name: Products 
 * */

?>








<?php 
	
    $show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', 'menu_order' ) );
    $catalog_orderby_options = apply_filters(
        'woocommerce_catalog_orderby',
        array(
            'menu_order' => __( 'Default sorting', 'woocommerce' ),
            'popularity' => __( 'Sortuj według popularnośći ', 'woocommerce' ),
            'rating'     => __( 'Sort by average rating', 'woocommerce' ),
            'date'       => __( 'Sort by latest', 'woocommerce' ),
            'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
            'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
        )
    );

    $default_orderby = wc_get_loop_prop( 'is_search' ) ? 'relevance' : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', '' ) );
    $orderby         = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : $default_orderby; // WPCS: sanitization ok, input var ok, CSRF ok.

    if ( wc_get_loop_prop( 'is_search' ) ) {
        $catalog_orderby_options = array_merge( array( 'relevance' => __( 'Relevance', 'woocommerce' ) ), $catalog_orderby_options );

        unset( $catalog_orderby_options['menu_order'] );
    }

    if ( ! $show_default_orderby ) {
        unset( $catalog_orderby_options['menu_order'] );
    }

    if ( ! wc_review_ratings_enabled() ) {
        unset( $catalog_orderby_options['rating'] );
    }

    if ( ! array_key_exists( $orderby, $catalog_orderby_options ) ) {
        $orderby = current( array_keys( $catalog_orderby_options ) );
    }




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
<?php 

?>

<main>
<?php
// $category = get_queried_object();
// $relation = "OR";
$order_by =  ( ! empty( $_GET['orderby'])) ? $_GET['orderby'] : "";
// $min_price =  ( ! empty( $_GET['min_price'])) ? $_GET['min_price'] : 0;
// $max_price =  ( ! empty( $_GET['max_price'])) ? $_GET['max_price'] : 9999;
// $data=  ( ! empty( $_GET['max_price'])) ? $_GET['max_price'] : 9999;
// $color =  ( ! empty( $_GET['color'])) ? $_GET['color'] : array('czarny', 'beż');
// $sort =  ( ! empty( $_GET['sort'])) ? $_GET['sort'] : ""; 
// $size =  ( ! empty( $_GET['size'])) ? $_GET['size'] : "";
// if ( ! empty( $_GET['size']) && ! empty( $_GET['color'])) {
//         $relation = "AND";
// }



if ('price' === $order_by) {
    $meta_key = "_regular_price";
    $order= "ASC";

}
if ('price-desc' === $order_by) {
    $meta_key = "_regular_price";
    $order= "DESC";

} 
if ('rating' === $order_by) {
    $meta_key = "_wc_average_rating";
    $order= "DESC";

} 
if ('popularity' === $order_by) {
    $meta_key = "_wc_review_count";
    $order= "DESC";

} 

if ('date' === $order_by) {
    $meta_key = "_wc_review_count";
    $order= "DESC";

} 




$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;



 ?>
    <section class="products">
  
      
        <?php 
       

        ?>
    
       
        </header>
        <div class="container">
            <div class="sidebar">
            <?php get_sidebar() ?>
            </div>
            <div class="products__cointeiner">
                <div class="sort__box">
            <?php   wc_get_template(
        'loop/orderby.php',
        array(
            'catalog_orderby_options' => $catalog_orderby_options,
            'orderby'                 => $orderby,
            'show_default_orderby'    => $show_default_orderby,
        ) 
    ); ?>     
                </div>
            <?php
            $qry    =    new    WP_Query([
                'posts_per_page'=>12,
                'post_type'    =>    'product',
                 "meta_key" => $meta_key,
                 'orderby'    =>    'meta_value',
                 'order'    =>    $order,
            

                    

            ]);    ?>
            <?php if ($qry->have_posts()) :
                while ($qry->have_posts()) :
                    $qry->the_post();
                    //template	tags	
            ?>
                    <div class="product__box">
                        <?php
                        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));
                        $id = get_the_ID()
                        ?>
                       
                        <a class="product__link" href="<?php the_permalink() ?>">
                            <img class="col-img" src="<?php echo $thumbnail[0] ?>" alt="">
                        </a>
                        <h3><?php the_title();    ?></h3>
                        <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
<p><?php echo wc_price( $price ); ?></p>
                       <!-- <button><?php echo do_shortcode('[add_to_cart id=  "' . $id . '" ]') ?></button>  -->
                       <a class="btn" href="<?php the_permalink() ?>">Więcej</a>
                        <!-- <?php wp_reset_postdata();    ?> -->

                    </div>
                <?php endwhile;  
                        // next_posts_link('next', $qry->max_num_pages);
                      
                        // previous_posts_link('prv', $qry->max_num_pages);
                    ?> 
                

                
            <?php else :    ?>
            <?php endif;    ?>
            </div>



            
        </div>
        <div class="paginator">


<?php 

echo paginate_links(array(
    'total' => $qry->max_num_pages
));

?> 

        </div>
    </section>

</main>
<script></script>


<?php get_footer(); ?>

