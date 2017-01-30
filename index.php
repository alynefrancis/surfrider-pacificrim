<?php
/**


**/

get_header(); ?>

<!-- Code mostly intact from parent theme index except adding a 
class to pagination to maintain some style consistency   -->

<?php
  
    $index = 1;
    $total_results = $wp_query->post_count;
    while ( have_posts() ) : the_post();
     if ($index == 1):
        get_template_part('template-parts/post', 'hero');
        if ($total_results > 1):
        ?>
        <section class="panel">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                    <h5 class="center-containing-text">Latest Posts</h5>
                        <div class="media-block-flex-wrap flex-top">

    <?php endif; ?>
    <?php else: ?>   

          <?php if (has_post_thumbnail()) {
              get_template_part('template-parts/content', 'media_block_top');
          } else { get_template_part('template-parts/content', 'media_block_no_img');
            } ?>

     <?php endif; ?>
     <?php
     $index++;
     endwhile;

    if ($total_results > 1): ?>
                        </div> <!-- Media Block -->
                    </div>
                </div> <!-- Row -->

                <div class="row">
                    <nav class="custom-pagination col-xs-12 center-containing-text">
                        <?php
                        // Previous/next page navigation style from parent theme.
                        the_posts_pagination( array(
                            'screen_reader_text' => " ",
                            'prev_text'          => __( 'Previous page', 'twentysixteen' ),
                            'next_text'          => __( 'Next page', 'twentysixteen' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentysixteen' ) . ' </span>',
                        ) );
                         ?>
                    </nav>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php get_footer(); ?>
