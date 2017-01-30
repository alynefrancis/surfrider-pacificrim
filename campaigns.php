<?php 

/*
  Template Name: Campaign Page
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
	  'post_type' => 'campaigns'
	);
	
	$the_query = new WP_Query( $args );

	?>


<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	<?php if ( has_post_thumbnail() ) {		
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	} ?>


<section class="panel white-color camprog camprog-background" style="background-image: url(<?php echo $feat_image; ?>);">
	<div class="overlay">
	   	<div class="container">
	     	<div class="row">       
	            <div class="col-sm-4 camprog-logo">

	                <?php if( get_field('camprog_logo_no_text') ): ?>

						<img src="<?php the_field('camprog_logo_no_text'); ?>" />

					<?php endif; ?>
	            </div>

	            <div class="col-sm-8 excerpt-text">
	                <h2><?php the_title(); ?></h2>
	                <p class="padding-bottom small-padding"><?php the_excerpt(); ?></p>
	                <a href="<?php the_permalink(); ?>" class="btn btn-white btn-hollow">Learn More</a>
	            </div>      
	        </div>
	    </div>
	</div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>