<?php
    $attachment = get_post( get_post_thumbnail_id() );

	if (get_post_thumbnail_id() != "" && $attachment->post_title !== ""):

		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$image = $image[0];

?>
	<div class="hero-tall  white-color" style="background-image:url(<?php echo $image; ?>);">
	    <div class="text-bottom">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-6 col-xs-12 middle-text hero-text">
	                    <h2><?php echo $attachment->post_title; ?></h2>
	                    <p><?php echo $attachment->post_excerpt; ?></p>
	                </div>
	            </div>

	            <div class="row bottom-section">	                   
	                <div class=" col-xs-12 col-sm-3 arrow-down">
	                    <a href="#first-section" class="scroll-trigger"><img src="//d3583ivmhhw2le.cloudfront.net/assets/images/down-arrow.png"></a>
	                </div>
	                <div class="col-sm-6 col-md-5  pull-right page-title">
	                    <?php the_title('<h1>', '</h1>'); ?>
	                </div>
	            </div>

	        </div>
	    </div>
	    <p class = "photo-credit-hero"><?php echo $attachment->post_content; ?></p>
	</div>

<?php elseif (get_post_thumbnail_id() != "" && $attachment->post_title === ""): ?>

	<div class="hero white-color with-just-title" style="background-image:url(<?php the_post_thumbnail_url('large'); ?>);">
		<div class="container">
			<div class="row bottom-section">
				<div class="col-xs-12 page-title pull-right">
					<?php the_title('<h1>', '</h1>'); ?>
				</div>
			</div>
		</div>
		<p class = "photo-credit-hero"><?php echo $attachment->post_content; ?></p>
	</div>

<?php else : ?>

	<div class="hero white-color with-just-title" style="background-image:url(https://d3583ivmhhw2le.cloudfront.net/images/uploads/pages/our-model-2.jpg);">
		<div class="container">
			<div class="row bottom-section">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 page-title pull-right">
					<?php the_title('<h1>', '</h1>'); ?>
				</div>
			</div>
		</div>
	</div>
	
<?php endif; ?>
