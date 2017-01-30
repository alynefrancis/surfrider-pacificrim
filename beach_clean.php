<?php 

/*
  Template Name: Beach Clean Page
*/

get_header();  ?>


<?php
while ( have_posts() ) : the_post();

    get_template_part('template-parts/page', 'hero');
    get_template_part('template-parts/page', 'content');
  
endwhile;
?>



    <?php 

    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'beach_clean',
        'orderby'=> 'post_date', 
        'order' => 'desc',       
        'posts_per_page' => 8,
        'paged' => $paged
        );

    $the_query = new WP_Query( $args ); ?>

    <section>

        <p class = "blue-title"><a href="/trash-trends" class="btn btn-white btn-hollow">Trash Trends</a></p> 

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="media-block-flex-wrap">

                <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                    <div class="media-block flex media-block-on-top">
                        <a href="<?php the_permalink(); ?>" class="media-block-media-wrap">
                            <img class="media-block-media" src="<?php echo the_post_thumbnail_url([300, null]);?>" alt="<?php the_title(); ?>" />
                        </a>
                            <div class="media-block-text-wrap">
                                <p class="p3 media-subtext"><?php if (has_category()): ?><?php the_category(' '); ?><span>|</span> <?php endif; the_time("m.d.y"); ?></p>
                                <a href="<?php the_permalink(); ?>" class="media-block-text"><?php short_title('...', '50'); ?></a>
                            </div>

                    </div>

                <?php endwhile; ?>           

                </div>
            </div>
        </div>
    </div>
</section>

<section class ="panel">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 cpt-navigation">

        <!-- pagination connected to Functions File-->
           <?php
             if (function_exists(custom_pagination)) {
               custom_pagination($the_query->max_num_pages,"",$paged);
             }
           ?>
            

            </div>
        </div>
    </div>
</section>  

            <?php endif; ?>

<?php wp_reset_postdata(); ?>

            

<?php get_footer(); ?>




