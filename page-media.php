<?php
/**

  Template Name: Press Page

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
        'post_type' => 'press',
        'orderby'=> 'post_date', 
        'order' => 'desc',       
        'posts_per_page' => 8,
        'paged' => $paged
        );

      $the_query = new WP_Query( $args ); 

    ?>

      <!-- set up counter to create new row after for every two media items -->

	<?php 

		$counter = 0;

	?>

<section class="newsletter small-padding">	
	<h2 class = "blue-title">We made the news!</h2>	
    	<div class="container">
    		<div class="row">

       			 <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>	

    			<div class="col-xs-12 col-sm-6 single-newsletter">
    				<a href="<?php the_field('press_url'); ?>" target = "blank">
    					<h4><?php the_title(); ?></h4>
    				</a>
    					<h5><?php the_field('press_source'); ?></h5>
    						<p><?php the_field('press_date'); ?></p>

    						<p>Press Relation: <a href="<?php the_field('related_page'); ?>" target = "blank"><?php the_field('press_relation'); ?></a></p>
    		            
    		    </div>

    			<?php 
    				$counter++;

              		if ($counter % 2 == 0) {
              			echo '</div><div class="row">';
            		}

            	endwhile;?>	

                <?php wp_reset_postdata(); ?>

        	</div>
        </div>	

</section><!-- .site-main -->

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



<?php get_footer(); ?>
