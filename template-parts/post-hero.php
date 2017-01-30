<div class="hero without-title" style="background-image:url(<?php if(has_post_thumbnail()){ the_post_thumbnail_url([1440, null]); } else{ echo '//d3583ivmhhw2le.cloudfront.net/images/uploads/pages/why-surfrider-header.jpg';} ?>);">
	<div class="container">
		<div class="row center-containing-text">
			<div class="col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0 ">
    			<div class="hero-text">
    					<h5><?php if (has_category()): ?><?php the_category(' '); ?> <span>|</span> <?php endif; the_date("m.d.y"); ?></h5>
    					<a href="<?php the_permalink(); ?>"><?php the_title('<h2 class="blue-color">', '</h2>'); ?></a>
    					<p class="p3">by <?php echo get_the_author(); ?></p>
    			</div>
			</div>
		</div>
	</div>
</div>
