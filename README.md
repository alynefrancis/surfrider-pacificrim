# Project Title

Surfrider Pacific Rim Chapter - Child Theme 

## Getting Started

This is a child theme developed to work with the Surfrider Headquarters Theme title 'Surfrider-Chapter'. 
This theme can be found here: https://repo.surfrider.org/wp_template/info.json

To meet the specific use goals of the Surfrider Pacific Rim Chapter the parent theme was highly customized, as you will see from the large number of child theme pages. 

This theme can be seen live at http://pacificrim.surfrider.org

Note: WP Debug has been turned off on deployed theme and off during dev unless needed. 
Errors consistently come from components of the Parent theme, including:
- surfrider-chapter/inc/bwtf-waterquality/bwtf-waterquality.php
- surfrider-chapter/inc/email/index.php
- surfrider-chapter/inc/coastal-factoid/coastalfactoid.php
- surfrider-chapter/inc/membership_cta/membership_cta.php

### Prerequisites

Two critical plugins used in the development of this theme are  

1) Advanced Custom Fields Pro https://en-ca.wordpress.org/plugins/advanced-custom-fields/
2) Custom Post Types UI https://en-ca.wordpress.org/plugins/custom-post-type-ui/

### Additionally the following Plugins are recommend to be used with this theme:

1) Simple Lightbox,  https://en-ca.wordpress.org/plugins/simple-lightbox/
2) The Events Calendar, https://en-ca.wordpress.org/plugins/the-events-calendar/
3) Give, https://en-ca.wordpress.org/plugins/give/
4) Enhanced Media Library, https://en-ca.wordpress.org/plugins/enhanced-media-library/


### Localhost Development 

This theme was developed using Grunt task runner. The Gruntfile.js and the package.json file are included. Much of the Gruntfile is commented out as the the processing was too slow. A post deployment plugin called Autoptimize (https://en-ca.wordpress.org/plugins/autoptimize/) was added to minimize js and css. 


### Notes on CSS

Technically CSS code was written in _scss files, however in terms of writing in SASS, little more was done past nesting and the inclusion of a few variables. 

### Notes on HTML

The parent theme was built using Bootstrap. I have maintained the use of the Bootstrap grid but, where I could, moved styling out of the classes in HTML and into styling using classes in CSS . 

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

Thank you to Surfrider chapter lead Michelle, for ongoing support and unrelenting dedication to making our Chapter the best it can be. And thank you to Surfirider Headquarters web Guru Chris for his ongoing support and assistance. 

