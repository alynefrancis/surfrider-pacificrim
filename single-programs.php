<?php
/**

 */

get_header(); ?>

<?php 

while ( have_posts() ) : the_post();

	get_template_part('template-parts/page', 'hero');


endwhile; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>   

	<div class="pagination">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if (get_previous_post_link()) : previous_post_link('%link', '<span class="pagination-text">Prev Program</span>'); endif; ?>
					<span class="paginate-home bright-blue-color share-trigger">Share</span>
					<?php if (get_next_post_link()) : next_post_link('%link','<span class="pagination-text">Next Program</span>'); endif; ?>
					<div class="share-icons">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank" class="ss-icon ss-social-regular share-icon share-facebook">Facebook</a>
						<a href="https://twitter.com/home?status=<?php echo the_permalink(); ?>" target="_blank" class="ss-icon ss-social-regular share-icon share-twitter">Twitter</a>
						<a href="mailto:?subject=Check out this article by the <?php bloginfo(); ?> of the Surfrider Foundation&body=Get the article here <?php echo the_permalink(); ?>" class="ss-icon ss-social-regular share-icon share-email">email</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<article id="first-section" class="blog-post long-form-text">
		<section id="main" class="container" role="main">
			<div class="row entry-content">
				<div class="col-xs-12 col-xs-offset-0 col-md-10 col-md-offset-1">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
	</article><!-- .content-area -->

	<section>

		

			<?php if( get_field('image') ): ?>

				<h2 class ="blue-title">The Program in Action</h2>

			<?php endif; ?>

		<div class="wide-container ">
		
			<?php $images = get_field('image');

			if( $images ): ?>

			<div class="row">
			  
		        <?php foreach( $images as $image ): 
		            $content = '<div class=" col-md-4 col-sm-6 col-xs-12 gallery-image">';
		                $content .= '<a class="gallery_image" href="'. $image['url'] .'">';
		                     $content .= '<img src="'. $image['sizes']['gallery-image'] .'" alt="'. $image['alt'] .'" />';
		                $content .= '</a>';
		            $content .= '</div>';
		            if ( function_exists('slb_activate') ){
		    			$content = slb_activate($content);
		    		}
		    
					echo $content;?>
		        <?php endforeach; ?>

			</div>

			<?php endif; ?>

		</div>

	

	</section>

	<?php wp_reset_postdata(); ?>

	<?php if( get_field('camprog_video') ): ?>

	<section class="panel white-color campaign-video">
	 	<div class="container">
	    	<div class="row padding-bottom">
	          	<div class="col-md-12">
	              	<h2>Check out our Campaign Video</h2>
	          	</div>
	      	</div>
	   		<div class="row">

		      	<div class="col-xs-12 ">
		           <a class="video-modal video-preview with-bottom-script-text" data-effect="mfp-zoom-in" href="<?php the_field('camprog_video'); ?>">
		              <span class="play-btn">Play</span>
		              <script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
		              <iframe id="player1" src="" width="100%" height="auto" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		          </a>
		      	</div>
	   	 	</div>
	  	</div>
	</section>

	<?php else : ?>

	<section class="panel white-color campaign-video">
	    <div class="container">
	        <div class="row padding-bottom">
	            <div class="col-md-12">
	                  <h2>Check out our Campaign Video</h2>
	            </div>
	        </div>

	        <div class="row">
	            <div class="col-sm-12  col-xs-12 ">
	                   <p>COMING SOON!</p>
	            </div>
	        </div>
	    </div>
	</section>

	<?php endif; ?>

<?php endwhile; endif;  ?>

<?php get_footer(); ?>
