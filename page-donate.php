<?php 

/*
  Template Name: Donate Page
*/

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	

	<section class="container extra-margin" >
		<div class="row ">
			<div class="col-xs-12 col-xs-offset-0 col-md-10 col-md-offset-1">

				<?php the_content(); ?>

			</div>
		</div>
	</section>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>

