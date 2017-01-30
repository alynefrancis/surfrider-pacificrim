<?php 

/*
  Template Name: Trash Trends Page
*/

get_header();  ?>


<?php

while ( have_posts() ) : the_post();

    get_template_part('template-parts/page', 'hero');
    get_template_part('template-parts/page', 'content');
  
endwhile;
?>

<section class ="trash-trends">
    <div class="wide-container">
        <div class="row center-containing-text">
        
            <?php  if( have_rows('trash_trend') ): while ( have_rows('trash_trend') ) : the_row(); ?>
                 
                <div class="trash-trend-item col-xs-4 col-sm-2 col-med-2">
                    <a href="<?php the_permalink(); ?>">
                    <div class="trash-trend-icon">

                        <?php if( get_sub_field('trash_trend_icon') ): ?>

                            <img src="<?php the_sub_field('trash_trend_icon'); ?>" />

                        <?php endif; ?>
                          
                    </div>
                    </a>
                    <div class="trash-trend-info">
                        <h2><?php the_sub_field('trash_trend_count'); ?></h2>
                        <h6><?php the_sub_field('trash_trend_title'); ?></h6>                         
                    </div>
                </div>   

            <?php endwhile; endif; ?>   

        </div> 
    </div>
</section>

<?php wp_reset_postdata(); ?>        


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


<section class="center-containing-text">    
    <h3 class = blue-title>Past Trash Trends</h3>   
        <div class="container">
            
             <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>                
               
                <?php if( get_field('top_five') ): ?>

                    <div class="row trash-summary">  
                    <a href="<?php the_sub_field('trash_trend_link'); ?>"> 
                    <h6 class ='trend-title'><?php the_title(); ?> <br> <?php the_date(); ?></h6> 
                    </a> 
          
                   <?php  if( have_rows('top_five') ): while ( have_rows('top_five') ) : the_row(); ?>
                   
                        <div class="trash-trend-item small col-xs-4 col-sm-2 ">
                            <div class="trash-trend-info">
                            <h4><?php the_sub_field('quantity'); ?></h4>
                            <h6><?php the_sub_field('item'); ?></h6>                               
                            </div>                            
                        </div>  

                    <?php endwhile; endif; ?>

                    </div>

                <?php endif; ?>
        
            <?php endwhile; ?> 

        </div>   
</section>


<section class ="panel">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 cpt-navigation">

              <!-- pagination here -->
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
