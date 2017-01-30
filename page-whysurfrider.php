<?php
/**
 
  Template Name: Why Surfrider Page

 */

get_header(); ?>

<?php

while ( have_posts() ) : the_post();
   
    get_template_part('template-parts/page', 'hero');    
    
endwhile;
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 

    <div class="two-panel-block why-surfrider-images" id="first-section">
        <p class ="photo-credit"><?php the_field('photo_credit_bottom'); ?></p>
               
            <div class="top-panel white-color" id = "why-surfrider-top"  <?php if ( get_field('why_surfrider_top') ) { echo 'style="background-image: url(' . get_field('why_surfrider_top') . ')"'; } ?> >
               
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0 col-xs-12">
                            <h2><?php the_field('top_panel_title'); ?></h2>
                            <p><?php the_field('top_panel_text'); ?> </p>
                            <a href="/campaigns" class="btn btn-white btn-hollow">View Campaigns</a>
                        </div>
                    </div>
                </div>
            </div>
                
                
            <div class="center-text-wrap">
                <div class="two-panel-center-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
                                <h1>Protect<br />&<br />Enjoy</h1>
                                <p class=" bottom-panel-text"><?php the_field('bottom_panel_text'); ?> </p>
                                <a href="<?php the_field('bottom_panel_video'); ?>"class="video-modal play-btn">Play Video</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class= "bottom-panel white-color">
                <span class="bottom-panel-overlay"></span>
                <div class="video-background muted" <?php if ( get_field('why_surfrider_bottom') ) { echo 'style="background-image: url(' . get_field('why_surfrider_bottom') . ')"'; } ?>>
                </div>
            </div>
    </div>
        
            
          
    <div class="panel " id = "why-surfrider-bottom"" <?php if ( get_field('under_seige_image') ) { echo 'style="background-image: url(' . get_field('under_seige_image') . ')"'; } ?> >
                
        <div class="container">
            <div class="row padding-bottom">
                <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12 under-seige-text">
                    <h2><?php the_field('under_seige_title'); ?></h2>
                    <p><?php the_field('under_seige_text'); ?></p>
                </div>
            </div>
           
            <div class="row">

                     <?php  if( have_rows('four_challenges') ): while ( have_rows('four_challenges') ) : the_row(); ?>
                       
                        <div class="col-sm-3 col-xs-6 four-challenges">
                            <div class="four-challenges-title">
                                <h4><?php the_sub_field('challenge_title') ?></h4>
                            </div>
                                       
                            <?php if( get_sub_field('challenge_icon') ): ?>

                                <img src="<?php the_sub_field('challenge_icon'); ?>" />

                            <?php endif; ?>

                            <p><?php the_sub_field('challenge_description') ?></p>
                        </div>
                       
                    <?php endwhile; endif; ?>
                        
            </div>
        </div>
    </div>
        
           
    <div class="panel our-solution white-color" <?php if ( get_field('our_solution_image') ) { echo 'style="background-image: url(' . get_field('our_solution_image') . ')"'; } ?> >

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <h5 class="padding-bottom">Our Solution</h5>
                    <h2><?php the_field('our_solution_title'); ?></h2>
                    <p><?php the_field('our_solution_text'); ?></p>
                    <a href="/volunteer" class="btn btn-primary btn-white btn-hollow">Volunteer Now</a>
                </div>
            </div>
        </div>            
    </div>   

    <div class="panel donate-panel" <?php if ( get_field('donate_image') ) { echo 'style="background-image: url(' . get_field('donate_image') . ')"'; } ?> >

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12  white-color">

                    <h2>We have a vision to protect 100% of the coastlines we love.</h2>
                    <p>To get there, we need your support. Help fund our network and ensure that there is long term protection for our coasts now and for future generations to come.</p>
                    <a href="/donate" class="btn btn-white btn-hollow">Donate Today</a>
                    <br><br>
                    <br><br>
                    <br>
                    <a href="/volunteer" class="btn btn-primary btn-white">Or Volunteer</a>

                </div>
            </div>
        </div>

        <p class ="photo-credit"><?php the_field('photo_credit_donate'); ?></p>

    </div>

 <?php endwhile; endif;?>
                 
<?php get_footer(); ?>