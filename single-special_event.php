<?php
/**

 */

get_header(); ?>

<?php 

while ( have_posts() ) : the_post();

	get_template_part('template-parts/post', 'hero');


endwhile; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>   

	<div class="pagination">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if (get_previous_post_link()) : previous_post_link('%link', '<span class="pagination-text">Prev Event</span>'); endif; ?>
					<span class="paginate-home bright-blue-color share-trigger">Share</span>
					<?php if (get_next_post_link()) : next_post_link('%link','<span class="pagination-text">Next Event</span>'); endif; ?>
					<div class="share-icons">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank" class="ss-icon ss-social-regular share-icon share-facebook">Facebook</a>
						<a href="https://twitter.com/home?status=<?php echo the_permalink(); ?>" target="_blank" class="ss-icon ss-social-regular share-icon share-twitter">Twitter</a>
						<a href="mailto:?subject=Check out this article by the <?php bloginfo(); ?> of the Surfrider Foundation&body=Get the article here <?php echo the_permalink(); ?>" class="ss-icon ss-social-regular share-icon share-email">email</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<article id="primary" class="blog-post long-form-text">
		<main id="main" class="container" role="main">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0">
					<div class="entry-content">

						<?php
							/* translators: %s: Name of current post */
							the_content( sprintf(
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
								get_the_title()
							) );
						?>
					</div><!-- .entry-content -->
				</div>
			</div>
		</main>
	</article>

<section>

		<!--loop over all images available for post -->
		 	<!--Images are part of an ACF Gallery - see documentation 
		 	http://www.advancedcustomfields.com/resources/gallery/-->

		 	<?php if( get_field('image') ): ?>

				<h2 class ="blue-title">Check out our photos from that day!</h2>

			<?php endif; ?>

		 <div class="wide-container" itemscope itemtype="http://schema.org/ImageGallery">
		  		<?php 
		  		$images = get_field('image');
			
		  		if( $images ) : ?>		
			        <?php foreach( $images as $image ) : 
			        	
			    	  ?>

			            <figure class="col-md-4 col-sm-6 col-xs-12 gallery-image" data-catagory="" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
			                <a href="<?php echo $image['url']; ?>" itemprop="contentUrl" data-size="<?php echo $image['width'] . 'x' . $image['height']; ?>">
			               		   	<img class="" src="<?php echo $image['sizes']['gallery-image']; ?>" itemprop="thumbnail" alt="<?php echo $image['alt']; ?>" />
			                </a>
			                <!-- <figcaption itemprop="caption description"><?php echo $image['caption']; ?></figcaption>  -->               
			            </figure>
					        
			   		<?php endforeach; ?>		    
		  		<?php endif; ?>
		  		
		 </div> 
	
	</section>

	<?php endwhile; endif;  ?>
		
<?php get_footer(); ?>
