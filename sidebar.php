
<?php 


$category = get_queried_object();

  $category->term_id;

?>

<!-- <div class="sub__categories__box">
    <p class="sidebar__title" >Kategorie</p>
 <?php $wcatTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'ASC', 'parent' => $category->term_id )); 
 foreach($wcatTerms as $wcatTerm) : 
 $wthumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
 $wimage = wp_get_attachment_url( $wthumbnail_id );
?>
<div><a href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>">
<?php if($wimage!=""):?><img src="<?php echo $wimage?>" class="aligncenter"><?php endif;?></a>
<p class="text-center"><a href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>"><?php echo $wcatTerm->name; ?></a></h3>
</div>
<?php endforeach; ?> 
</div> -->


<?php

// $link  = get_category_link(20);
// $link2  = get_category_link(107);

?>
<!-- <a href="<?php echo $link ?>" >Pończochy</a>;
 <a href="<?php echo $link2 ?>" >Body</a>; -->


<?php

$currentCat = get_the_category_by_ID($category->term_id);

$parentcats = get_ancestors($category->term_id, 'product_cat');

echo $parentcats[0];
$name = get_the_category_by_ID(($parentcat[0]));
$catpar = get_the_category_by_ID($parentcats[0]);


$cateName = single_cat_title('', false); // for print current category
$argsp = array(
    'taxonomy'     => 'product_cat',


);
$all_categories = get_categories($argsp);



?>

<?php

$taxonomy     = 'product_cat';
$orderby      = 'name';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no  
$title        = '';
$empty        = 0;

$args = array(
    'taxonomy'     => $taxonomy,


);
$all_categories = get_categories($args);

?>
<h3>Kategorie</h3>
<ul  class="category__list <?php echo strlen($category->term_id) > 0  ? "ExpandCategory" : "" ?> ">
    <?php
    foreach ($all_categories as $cat) {
        if ($cat->category_parent == 0) {
            $category_id = $cat->term_id;

    ?>
            <li class="category <?php 
             echo $catpar == $cat->name ?   "expand" :   $currentCat == $cat->name ?   "expand" : "nie";
             
            
            
            ?>"  ><span></span><a  class="<?php  echo $currentCat == $cat->name ?   "current" : "nie";  ?>" href=" <?php echo  get_term_link($cat->slug, 'product_cat') ?> "><?php echo $cat->name ?> </a>
                <?php
                $args2 = array(
                    'taxonomy'     => $taxonomy,
                    'child_of'     => 0,
                    'parent'       => $category_id,
                    'orderby'      => $orderby,
                    'show_count'   => $show_count,
                    'pad_counts'   => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li'     => $title,
                    'hide_empty'   => $empty
                );
                $sub_cats = get_categories($args2);
                if ($sub_cats) {
                ?>
                    <ul class="sub__categories" <?php  echo $cateName == $sub_category->name ?   "expand" : "" ?>">
                        <?php
                        foreach ($sub_cats as $sub_category) {
                            ?>
                            <li ><a class="<?php echo   $currentCat == $sub_category->name ? "current"  : "nie" ?>" href="<?php echo  get_term_link($sub_category->name, 'product_cat')?>"><?php echo $sub_category->name ?></a></li>

                            <?php
                            // echo '<li ><a class=" .echo  " href="' . get_term_link($sub_category->name, 'product_cat') . '">' . $sub_category->name  . '</a></li>';
                            //   echo  $sub_category->name ;
                        }
                        ?>
                    </ul>

                <?php

                }
                ?>
            </li>
    <?php
        }
    }
    ?>


</ul>