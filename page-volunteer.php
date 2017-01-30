<?php 

/*
  Template Name: Volunteer Page
*/

get_header();  ?>


<?php
while ( have_posts() ) : the_post();

	get_template_part('template-parts/page', 'hero');
	get_template_part('template-parts/page', 'content');
	
endwhile;
?>


<?php

	$args = array(
	  'post_type' => 'volunteer'
	);
	$the_query = new WP_Query( $args );

?>

<section>
	<h3 class ="blue-title">Become part of our team!</h3>
		<div class="container">

		<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	
			<div class="row volunteer-position">	       
	            <div class="col-xs-12 col-sm-2 col-md-2 volunteer-logo">

		            <?php if ( has_post_thumbnail() ) { the_post_thumbnail('small');} ?>
            
	            </div>
	            <div class="col-xs-12 col-sm-10 col-md-10 volunteer-description">
	                <h2><?php the_title(); ?></h2>
	                	<?php the_content(); ?>	            
	            </div>	        
	        </div>

		<?php endwhile; endif; ?>

	 	</div>
</section>

<?php wp_reset_postdata(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="panel volunteer-form">
	<div class="container">	
		<div class="row">
			<div class="col-xs-12 col-xs-offset-0 col-md-10 col-md-offset-1">

					<?php the_field('volunteer_form'); ?>

			</div>
		</div>
	</div>
</section>		

<?php endwhile; endif; ?>

<?php get_footer(); ?>