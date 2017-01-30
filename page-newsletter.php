<?php
/*

  Template Name: Newsletter Page
 
 */

get_header(); ?>


<?php

while ( have_posts() ) : the_post();

	get_template_part('template-parts/page', 'hero');
	get_template_part('template-parts/page', 'content');
	
endwhile;
?>

<?php

	$args = array(
	  	'post_type' => 'newsletter',
	  	'orderby' => 'ASC'
	);
	
	$the_query = new WP_Query( $args );

?>
	
<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

<section class="newsletter small-padding">
	<h2 class = blue-title><?php the_title(); ?></h2>	
    	<div class="container">
    		<div class="row">

	    		<?php  if( have_rows('newsletter') ): while ( have_rows('newsletter') ) : the_row(); ?>
	          	
				<a href="<?php the_sub_field('newsletter_url'); ?>" target = "blank">
					<div class="col-xs-6 col-sm-6 col-md-3 single-newsletter">

						<?php if ( has_post_thumbnail() ) { the_post_thumbnail();} ?>
			       
						<h5><?php the_sub_field('newsletter_date'); ?></h5>		            
			    	</div>		
			    </a>
	             
	    		<?php endwhile; endif;  ?>

			</div>
    	</div>
</section>

<?php endwhile; endif;  ?>


<?php get_footer(); ?>
