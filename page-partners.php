<?php 

/*
  Template Name: Partners Page
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
	  'post_type' => 'partners',
	  'posts_per_page' => -1,
      'offset'    => 0
	);
	$the_query = new WP_Query( $args );

	?>

<h3 class ="blue-title">Thank you!</h3>

<section class="panel">	
	<div class="container">
	    <div class="row">

	    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	      	<div class="partner col-xs-6 col-sm-3">
	      		<a href="<?php the_field('partner_website'); ?>">
	      			<div class="partner-logo">

	      			       <?php if ( has_post_thumbnail() ) { the_post_thumbnail('small');} ?>

	      			</div>
	      		</a>	      		
	      	</div>
	       	            
		<?php endwhile; endif; ?>
	           	        
		</div>
	</div>		
</section>
setup	
<?php wp_reset_postdata(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h3 class ="blue-title">Thank you local photographers</h3>	
<section class ="panel photographer-credits">
	<div class="container">
	    <div class="row">
	    	<div class="photography-intro col-xs-12">
				<p><?php the_field('photographer_intro'); ?></p>
			</div>
	    
	      <?php  if( have_rows('photographer') ): while ( have_rows('photographer') ) : the_row(); ?>
		
	      	<div class="photographer col-xs-6 col-sm-3">
	      		<a href="<?php the_sub_field('photographer_website'); ?>">
	      			<div class="photog-logo">

	      					<?php if( get_sub_field('photographer_logo') ): ?>

                                <img src="<?php the_sub_field('photographer_logo'); ?>" />

                            <?php endif; ?> 

	      			</div>					
	      		</a>
	      		<h6><?php the_sub_field('photographer'); ?></h6>    
	      	</div>
	       	       
		<?php endwhile; endif; ?>
	           	        
		</div>
	</div>		
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>