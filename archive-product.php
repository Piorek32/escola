<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;






$show_default_orderby    = 'menu_order' === apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby', 'menu_order'));
$catalog_orderby_options = apply_filters(
    'woocommerce_catalog_orderby',
    array(
        'menu_order' => __('Default sorting', 'woocommerce'),
        'popularity' => __('Sortuj według popularnośći ', 'woocommerce'),
        'rating'     => __('Sort by average rating', 'woocommerce'),
        'date'       => __('Sort by latest', 'woocommerce'),
        'price'      => __('Sort by price: low to high', 'woocommerce'),
        'price-desc' => __('Sort by price: high to low', 'woocommerce'),
    )
);

$default_orderby = wc_get_loop_prop('is_search') ? 'relevance' : apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby', ''));
$orderby         = isset($_GET['orderby']) ? wc_clean(wp_unslash($_GET['orderby'])) : $default_orderby; // WPCS: sanitization ok, input var ok, CSRF ok.

if (wc_get_loop_prop('is_search')) {
    $catalog_orderby_options = array_merge(array('relevance' => __('Relevance', 'woocommerce')), $catalog_orderby_options);

    unset($catalog_orderby_options['menu_order']);
}

if (!$show_default_orderby) {
    unset($catalog_orderby_options['menu_order']);
}

if (!wc_review_ratings_enabled()) {
    unset($catalog_orderby_options['rating']);
}

if (!array_key_exists($orderby, $catalog_orderby_options)) {
    $orderby = current(array_keys($catalog_orderby_options));
}



?>
<?php get_header(); ?>

<div class="small__hero">
   <?php
   
$category = get_queried_object();

$category->term_id;


$currentCat = get_the_category_by_ID($category->term_id);

   
   
   ?>

<div class="hero_text_box">
        <h1 class="title">
            <?php   echo $currentCat;    ?> 
        </h1>
        
      
</div>       




</div>



<main>
    <?php
  
    $order_by =  (!empty($_GET['orderby'])) ? $_GET['orderby'] : "";
  
    

    if ('price' === $order_by) {
        $meta_key = "_regular_price";
        $order = "ASC";
    }
    if ('price-desc' === $order_by) {
        $meta_key = "_regular_price";
        $order = "DESC";
    }
    if ('rating' === $order_by) {
        $meta_key = "_wc_average_rating";
        $order = "DESC";
    }
    if ('popularity' === $order_by) {
        $meta_key = "_wc_review_count";
        $order = "DESC";
    }


    if ('date' === $order_by) {
        $meta_key = "_wc_review_count";
        $order= "DESC";
    
    } 
    



    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  



    ?>
    <section class="products">
    
  
    <?php
    if (!empty($_POST['sort'])) {
        $selected = $_POST['sort'];
    }

    ?>


    
        <div class="container">
            <div class="sidebar">
                <?php get_sidebar() ?>
            </div>
            <div class="products__cointeiner">
                <div class="sort__box">
                    <?php wc_get_template(
                        'loop/orderby.php',
                        array(
                            'catalog_orderby_options' => $catalog_orderby_options,
                            'orderby'                 => $orderby,
                            'show_default_orderby'    => $show_default_orderby,
                        )
                    ); ?>
                </div>
                <?php
               $category = get_queried_object();
                $qry    =    new    WP_Query([
                    'posts_per_page' => 12,
                    'post_type'    =>    'product',
                    "meta_key" => $meta_key,
                    'orderby'    =>    'meta_value',
                    'order'    =>    $order,
                  
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'id',
                            'terms' => $category->term_id,
                        ),

                    )





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
                            <?php $price = get_post_meta(get_the_ID(), '_price', true); ?>
                            <p><?php echo wc_price($price); ?></p>
                            <!-- <button><?php echo do_shortcode('[add_to_cart id=  "' . $id . '" ]') ?></button>  -->
                            <a class="btn" href="<?php the_permalink() ?>">Więcej</a>

                            <!-- <?php wp_reset_postdata();    ?> -->

                        </div>
                    <?php endwhile;
                    // next_posts_link('next', $qry->max_num_pages);

                    // previous_posts_link('prv', $qry->max_num_pages);
                    ?>



                <?php else :    ?>
                    <h1>brak</h1>
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





// array(
// 'taxonomy' => 'product_cat',
// 'field' => 'id',
// 'terms' => $category->term_id,
// ),