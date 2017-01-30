<?php
/**

  Template Name: Crew Page

 **/

get_header(); ?>

<?php

while ( have_posts() ) : the_post();

	get_template_part('template-parts/page', 'hero');
	get_template_part('template-parts/page', 'content');
	
endwhile;
?>

	<?php

	$args = array(
  		'post_type' => 'crew',
  		'category_name' => 'executive-committee',
  		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );

	?>

<!-- set up counter to create new row after for every two crew members -->

			<?php 
				$counter = 0;
			?>

<section id="main" role="main" class ="crew">
	<h3 class = "blue-title">Our Executive Committee</h3>
	<div class="wide-container">	
  		<div class="row">

			<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div class="col-sm-6 col-xs-12 crew-member">			
				<h3><?php the_title(); ?></h3>						 
					<div class = "crew-member-image">			

						<?php if ( has_post_thumbnail() ) { the_post_thumbnail('crew-member');} ?>

						<h5><?php the_field('role'); ?></h5>
					</div>

					<div class ="crew-member-info">
						<?php the_content(); ?>
					</div>
			</div>

			<?php 
			$counter++;
              if ($counter % 2 == 0) {
              echo '</div><div class="row">';
            }
            endwhile; endif; ?>	
			<?php wp_reset_postdata(); ?>
        </div>	
    </div>
</section><!-- .site-main -->


	<?php

	$args = array(
	  'post_type' => 'crew',
	  'category_name' => 'support-crew',
	  'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );

	?>

	<?php 

	$counter = 0;

	 ?>

<section id="main" role="main" class ="crew">

	<h3 class ="blue-title">Our Support Crew</h3>
	<div class="wide-container">	
  		<div class="row">

			<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div class="col-sm-6 col-xs-12 crew-member">				
				<h3><?php the_title(); ?></h3>					 
					<div class = "crew-member-image">	

						<?php if ( has_post_thumbnail() ) { the_post_thumbnail('crew-member');} ?>

						<h5><?php the_field('role'); ?></h5>
						<p><?php the_field('crew_email'); ?></p>
					</div>

					<div class ="crew-member-info">
						<?php the_content(); ?>
					</div>				
			</div>

				<?php 
				$counter++;
                  if ($counter % 2 == 0) {
                  echo '</div><div class="row">';
                }
                endwhile; endif; ?>	
				<?php wp_reset_postdata(); ?>
        </div>	
    </div>
</section><!-- .site-main -->

<?php get_footer(); ?>
