<?php
/**

 */

get_header(); ?>

<?php 

while ( have_posts() ) : the_post();

	get_template_part('template-parts/post', 'hero');
	get_template_part('template-parts/post', 'main');

endwhile; ?>

<section>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>   

		<?php if( get_field('image') ): ?>

			<h2 class ="blue-title">Check out our photos from that day!</h2>

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

	<?php endwhile; endif;  ?>

</section>
		
<?php get_footer(); ?>
