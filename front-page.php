<?php 

/*
  Template Name: Front Page
*/

get_header();  ?>

<div class="owl-carousel hero-slider">
    <?php show_hero('one');?>
    <?php show_hero('two');?>
    <?php show_hero('three');?>
</div>

<!-- ****** Content from Page ******  -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 

<section class="panel">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2 front-intro">                
                    <?php the_content(); ?>
            </div>
         </div>
    </div>
</section>

<!-- ****** Who we are section ******  -->

<section class="panel white-color who-we-are" <?php if ( get_field('who_we_are') ) { echo 'style="background-image: url(' . get_field('who_we_are') . ')"'; } ?>>   
    <div class="container">
        <div class="row">

        <!-- who-big and who-small Id's hook into CSS to show/hide depending on screen size for design purposes  -->
            <div class="col-sm-6 col-xs-12" id ="who-big" >          
                <h5>Who We Are</h5>          
                <h4>Champions of Surf & Sand</h4>                  
                    <p class="padding-bottom small-padding">Surfrider is a community of everyday people who passionately protect our playground - the ocean, waves, and beaches that provide us so much enjoyment.</p>
                    <a href="/the-crew" class="btn btn-hollow btn-white">Meet us</a>
            </div>

            <div class="col-sm-6 col-xs-12">
                <a class="video-modal video-preview" data-effect="mfp-zoom-in" href="<?php the_field('who_we_are_video'); ?>">
                    <span class="play-btn">Play</span>
                      <script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
                    <iframe id="player1" src="" width="100%" height="auto" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </a>
            </div>

            <div class="col-sm-6 col-xs-12" id ="who-small">            
                <h5>Who We Are</h5>           
                <h4>Champions of Surf & Sand</h4>
                    <p>Surfrider is a community of everyday people who passionately protect our playground - the ocean, waves, and beaches that provide us so much enjoyment.</p>
                    <a href="/the-crew" class="btn btn-hollow btn-white">Meet us</a>
            </div>
        </div>
    </div>
</section>

   <?php  endwhile; endif; ?>

   <?php wp_reset_postdata(); ?>


<!-- ****** What we found section ******  -->
  
<section class="panel what-we-found" <?php if ( get_field('what_we_do') ) { echo 'style="background-image: url(' . get_field('what_we_do') . ')"'; } ?>>
    <p class ="photo-credit"><?php the_field('who_we_are_photo_credit'); ?></p>
        <div class="container">
            <div class="row padding-bottom">
                <div class="col-sm-12 col-md-6 col-md-offset-3 col-sm-offset-0 center-containing-text">
                    <h5 class="bright-blue-color padding-bottom">What We Do</h5>
                    <h2>Protect & Enjoy</h2>
                    <p class="padding-bottom small-padding">We ensure clean water, healthy ocean and coastlines and accessible beaches for all to enjoy by finding lasting solutions to the threats our ocean faces.</p>
                    <a href="/programs" class="btn btn-primary btn-hollow">Learn More</a>
                </div>
            </div>
        
            <div class="row padding-bottom small-padding">
                <div class="col-xs-12 center-containing-text">
                    <h2>See what we found on our latest beach cleans!</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="media-block-flex-wrap">
                        <?php                  
                            $args = array(
                                'post_type' => 'beach_clean',
                                'orderby'=> 'post_date', 
                                'order' => 'desc',        
                                'posts_per_page' => 4,
                                'offset'    => 0
                            );
                            $results = get_posts($args);
                            foreach ($results as $post){
                            setup_postdata($post);

                            get_template_part('template-parts/content', 'media_block_top');
                            }                           
                        ?>
                    </div>
                </div>
            </div> 
        </div> <!-- container -->
</section>

<?php wp_reset_postdata(); ?>


<!-- ****** Blue Campaign Section with Video ******  -->
  
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 

<section class="panel white-color dark-blue-color-bg making-difference" <?php if ( get_field('home_page_campaign_link_background') ) { echo 'style="background-image: url(' . get_field('home_page_campaign_link_background') . ')"'; } ?>>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <h5>Campaigns</h5>
                <h2>Making a Difference on our Coast</h2>
                    <p class="padding-bottom small-padding">Campaigns define us as an organization. It’s how we protect our special coastal places, ensure our ocean is healthy and wild, keep pollution out of the water and make sure every beach is clean and accessible for all to enjoy. </p>
                    <a href="/campaigns" class="btn btn-primary btn-hollow">View All Campaigns</a>
            </div>

            <div class="col-sm-6 col-xs-12 front-vid-container">
                <a class="video-modal video-preview" data-effect="mfp-zoom-in" href="<?php the_field('featured_campaign_video'); ?>">
                  <span class="play-btn">Play</span>
                  <script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
                  <iframe id="player1" src="" width="100%" height="auto" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </a>
            </div>             
        </div> 
    </div>
</section>

<?php endwhile; endif; ?>

<?php wp_reset_postdata(); ?>   

<!-- ****** Featured Programs and Campaigns ******  -->

    <?php
  
    $args = array(
        'post_type' => array('programs', 'campaigns'),
        'category_name' => 'front-page',
        'posts_per_page' => 5
        );
    $the_query = new WP_Query( $args );

    ?>

<section class="row-reveal-wrap">

    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php if ( has_post_thumbnail() ) {   
            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
        } ?>
             
        <div class="row-reveal-item reveal-with-icon" style="background-image: url(<?php echo $feat_image; ?>);">
            <span class="reveal-icon" <?php if ( get_field('camprog_logo_no_text') ) { echo 'style="background-image: url(' . get_field('camprog_logo_no_text') . ')"'; } ?>></span>
                    <div class="row-reveal-wrap-text">
                        <h6><?php the_title(); ?></h6>
                        <div class="text-effect">
                            <p><?php the_field('camprog_summary'); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-hollow">Learn More</a>
                        </div>
                    </div>
                    <span class="row-reveal-overlay"></span>
        </div>
               
    <?php endwhile; endif; ?>     
    
    <?php wp_reset_postdata(); ?>
      
</section>


<!-- ****** Coast Factoid ******  -->

    <?php
    $args = array(
      'post_type' => 'coastal_factoid',
      'orderby'        => 'rand',
      'posts_per_page' => '1'
      
    );
    $the_query = new WP_Query( $args );

    ?>
    
<section id="coastal-factoids" class="">

    <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    
    <div class="panel">
        <div class="container">
            <div class="row">
                <div class="col-xs- 12 col-md-8 col-md-offset-2">  
                    <h5><?php the_title(); ?></h5>
                        <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>

    <?php endwhile; endif;  ?>

</section>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
