<?php
get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php
    // Start the Loop.
    // global $wp_query;
    // $total_posts = get_option('post_count');
    // $cat =
    // $args = array();
    // get_posts()
    $index = 1;
    $total_results = $wp_query->post_count;
    while ( have_posts() ) : the_post();
     if ($index == 1):
        get_template_part('template-parts/post', 'hero');

        ?>
            <section class="panel">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                        <div class="media-block-flex-wrap">
     <?php else: ?>

          <?php if (has_post_thumbnail()) {
              get_template_part('template-parts/content', 'media_block_top');
          } else { get_template_part('template-parts/content', 'media_block_no_img');
            } ?>

     <?php endif; ?>
     <?php
     $index++;
     endwhile;
     ?>

                    </div> <!-- Media Block -->
                </div>
            </div> <!-- Row -->
            <div class="row">
                <div class="col-xs-12 center-containing-text">
                    <?php
                    // Previous/next page navigation.
                    the_posts_pagination( array(
                        'screen_reader_text' => " ",
                        'prev_text'          => __( 'Previous page', 'twentysixteen' ),
                        'next_text'          => __( 'Next page', 'twentysixteen' ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentysixteen' ) . ' </span>',
                    ) );
                     ?>
                </div>
            </div>
            </div>
        </section>

<?php endif; ?>

 <?php if ( is_active_sidebar('sidebar-1')) :?>
   <?php dynamic_sidebar('sidebar-1'); ?>
 <?php endif; ?>
<?php get_footer(); ?>
