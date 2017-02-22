<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if(get_option('pu_theme_options')['facebook_handle']):?>
    <meta property="og:site_name" content="<?php bloginfo();?> - Surfrider Foundation" />
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:description" content="<?php the_excerpt(); ?>" />
    <meta property="og:image" content="<?php the_post_thumbnail_url(); ?>" />
    <meta property="og:type" content="article" />
<?php endif; ?>
<?php if(get_option('pu_theme_options')['twitter_handle']):?>
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="<?php echo get_option('pu_theme_options')['twitter_handle']; ?>" />
    <meta name="twitter:title" content="<?php the_title(); ?>" />
    <meta name="twitter:description" content="<?php the_excerpt(); ?>" />
    <meta name="twitter:image" content="<?php the_post_thumbnail_url(); ?>" />
<?php endif?>

<?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'thumbnail'); ?>
<?php if ($fb_image) : ?>
    <meta property="og:image" content="<?php echo $fb_image[0]; ?>" />
<?php endif; ?>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link rel="stylesheet" type="text/css" href="//cloud.typography.com/7603774/739868/css/fonts.css" />

    <style>
        .mobile-header-ctas{
            margin-top: 21px;
        }
        .mobile-trigger{
            top:7px;
        }
        .logo-2{
            max-width: 55%;
        }
        .logo-2 img{
            float: left;
            max-height:80px;
        }

        .media-block-flex-wrap{
            display: flex;
            flex-flow: row wrap;

            justify-content: flex-start;
        }
        .media-block-flex-wrap.flex-top {
            align-items: center;
        }
        .media-block.flex {
            flex: 0 0 100%;
            margin: 2em 0;
            padding: 0 1em;
        }
        .media-block-no-img{
            text-align: center;
        }
        .media-block-no-img .media-block-text {
            font-size: 1.2em;
        }
        .pta-sus-sheets{
            margin-top: 2em;
            width:100%;
        }
        table.pta-sus-tasks{
            width: 100%;
        }
        #bwtf-waterquality {
            position: relative;
            height: 300px;
            width:100%;
            margin-top: -3em;
        }

        .water-quality.red{
            border-top: 5px solid rgb(214,62,42);
        }

        .water-quality.orange{
            border-top: 5px solid rgb(246,151,48);
        }

        .water-quality.green{
            border-top: 5px solid rgb(114,176,48);
        }
        @media (min-width: 480px) and (max-width: 768px) {
            .media-block.flex.media-block-no-img, .media-block.flex.media-block-on-top {
                flex: 0 0 50%;
            }
            .water-quality {
                margin-top: -4em;
                z-index: 1001;
            }
            .logo-2 {
                width: 55%;
            }

            /* Fix for gallery shortcode*/
            #gallery-1 .gallery-item {
              width: 100% !important;
              height: auto;
            }
            #gallery-1 .gallery-item img{
              margin-bottom: 0;
            }
        }
        @media (min-width:768px) {
            .navbar-nav {
              margin-top: 6px;
            }
            .media-block.flex {
                flex: 0 0 25%;
            }
            .media-block-small.flex{
                flex: 0 0 50%;
            }
            #bwtf-waterquality {
                position: absolute;
                top:0;
                right:0;
                bottom:0;
                left:0;
                z-index: -10;
                height: auto;
            }
        }

        @media (min-width:1080px) and (max-width: 1330px){
        /*Bigger than mobile menu, but smaller than XL grid*/
            .logo-2 img{
                float: left;
                max-height:65px;
            }
        }


    </style>
    <?php wp_head(); ?>
	</head>
<body <?php body_class(isset($class) ? $class : ''); ?> >
  <header class="main-header ">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <a href="<?php echo home_url(); ?>" class="logo-2" style="background-image: url()">
                  <img src="<?php header_image(); ?>" title="<?php bloginfo( 'name' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                </a>
                  <?php wp_nav_menu( array('theme_location'=>"main_menu", 'menu_class' => 'nav navbar-nav main-navigation', 'depth'=> 3, 'container'=> false, 'walker'=> new Bootstrap_Walker_Nav_Menu)); ?>
              </div>
          </div>
        </div>
  </header>
  <header class="mobile-header ">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <a href="<?php echo home_url(); ?>" style="float:left; background-image: url()" class="logo-2">
                <img src="<?php header_image(); ?>" title="<?php bloginfo( 'name' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                </a>
                  <ul class="mobile-header-ctas">
                      <li class="main-mobile-cta"><a href="https://www.surfrider.org/support-surfrider<?php echo "?source=CH" . get_option('pu_theme_options')['cid']; ?>">Give</a></li>
                  </ul>
                  <button class="mobile-header-trigger">
                      <span class="line-one"></span>
                      <span class="line-two"></span>
                      <span class="line-three"></span>
                  </button>
              </div>
          </div>
      </div>
  </header>
  <div class="mobile-menu">
     <nav id="mobile-nav">
        <?php wp_nav_menu( array('theme_location' => 'mobile_secondary', 'menu_class' => '', 'depth'=> 3, 'container'=> false, 'walker'=> new Mobile_Nav_menu)); ?>
     </nav>
     <span class="mobile-menu-bg" style="background: url(https://www.surfrider.org/assets/images/nav-bg.jpg) center top no-repeat; background-size: cover;"></span>
  </div>
