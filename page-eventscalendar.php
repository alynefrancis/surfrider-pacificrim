<?php 

/*
  Template Name: Event Calendar Page
*/

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	

<section class="extra-margin">
	<div class="container">	
		<div class="row">
			<div class="col-xs-12">
				
				<?php the_content(); ?>

			</div>
		</div>		
	</div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>

