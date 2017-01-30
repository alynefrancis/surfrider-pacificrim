<?php
/**

  Template Name: Video Page

 *
 */

get_header(); ?>


<?php
// Start the loop.
while ( have_posts() ) : the_post();

	get_template_part('template-parts/page', 'hero');
	get_template_part('template-parts/page', 'content');
	
endwhile;
?>
<?php wp_reset_postdata(); ?>

<?php

$args = array(
  'post_type' => 'video',
  'category_name' => 'pacific-rim-video'
);
$the_query = new WP_Query( $args );

?>

		<?php 

		$counter = 0;

		?>

<section class = "video-section" >
	<h3 class ="blue-title">Surfrider Pacific Rim</h3>
	<div class="wide-container">		
	  	<div class="row">

		<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 video">

				<div class="video-title">
					<h4><?php the_title(); ?></h4>
				</div>
								 
				<div class="video-container">	
					<?php the_field('video_url');  ?>
				</div>

				<div class ="video-info">
					<?php the_content(); ?>
				</div>

			</div>

			<?php 
			$counter++;
              if ($counter % 2 == 0) {
              echo '</div><div class="row">';
            }
            endwhile; endif; ?>	

	    </div>	
    </div>
</section>
<?php wp_reset_postdata(); ?>

<?php

$args = array(
  'post_type' => 'video',
  'category_name' => 'vancouver-island-video'
);
$the_query = new WP_Query( $args );

?>

		<?php 

		$counter = 0;

		 ?>

<section class = "video-section" >
	<h3 class ="blue-title">Surfrider Vancouver Island</h3>
	<div class="wide-container">		
	  	<div class="row">

		<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 video">		
				<div class="video-title">
					<h4><?php the_title(); ?></h4>
				</div>
								 
				<div class="video-container video-modal">	
					<?php the_field('video_url');  ?>
				</div>

				<div class ="video-info">
					<?php the_content(); ?>
				</div>
			</div>

			<?php 
			$counter++;
              if ($counter % 2 == 0) {
              echo '</div><div class="row">';
            }
            endwhile; endif; ?>	

	    </div>	
    </div>
</section>
<?php wp_reset_postdata(); ?>

<?php

$args = array(
  'post_type' => 'video',
  'category_name' => 'hq-video'
);
$the_query = new WP_Query( $args );

?>

			<?php 

			$counter = 0;

			?>

<section class = "video-section" >
	<h3 class ="blue-title">Surfrider Foundation</h3>
	<div class="wide-container">		
	  	<div class="row">

		<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 video">			
				<div class="video-title">
					<h4><?php the_title(); ?></h4>
				</div>
												 
				<div class="video-container">	
					<?php the_field('video_url');  ?>
				</div>

				<div class ="video-info">
					<?php the_content(); ?>
				</div>

			</div>

			<?php 
			$counter++;
              if ($counter % 2 == 0) {
              echo '</div><div class="row">';
            }
            endwhile; endif; ?>	

	    </div>	
    </div>
</section>
<?php wp_reset_postdata(); ?>

<?php

$args = array(
  'post_type' => 'video',
  'category_name' => 'local-educational-video'
);
$the_query = new WP_Query( $args );

?>

			<?php 

			$counter = 0;

			?>

<section class = "video-section" >
	<h3 class ="blue-title">Local Educational Videos</h3>
	<div class="wide-container">	
	  	<div class="row">

		<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 video">		
				<div class="video-title">
					<h4><?php the_title(); ?></h4>
				</div>
								 
				<div class="video-container">	
					<?php the_field('video_url');  ?>
				</div>

				<div class ="video-info">
					<?php the_content(); ?>

				</div>
			</div>

			<?php 
			$counter++;
              if ($counter % 2 == 0) {
              echo '</div><div class="row">';
            }
            endwhile; endif; ?>	

	    </div>	
    </div>
</section>
<?php wp_reset_postdata(); ?>

<?php

$args = array(
  'post_type' => 'video',
  'category_name' => 'local-event-video'
);
$the_query = new WP_Query( $args );

?>

			<?php 

			$counter = 0;

			?>

<section class = "video-section" >
	<h3 class ="blue-title">Happenings in our 'hood</h3>
	<div class="wide-container">	
	  	<div class="row">

		<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 video">		
				<div class="video-title">
					<h4><?php the_title(); ?></h4>
				</div>
								 
				<div class="video-container video-modal">	
					<?php the_field('video_url');  ?>
				</div>

				<div class ="video-info">
					<?php the_content(); ?>
				</div>
			</div>

		<?php 
		$counter++;
          if ($counter % 2 == 0) {
          echo '</div><div class="row">';
        }
        endwhile; endif; ?>	

	    </div>	
    </div>
</section>

<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>
