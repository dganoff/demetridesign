<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

<section class="featured">

    	<div class="page-wrap">

            <section class="home-intro">
            
                <div class="anim">
                
                    <div class="flex-container">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <div class="screens anim-section">
                                    
                                        <div class="screens-imgs">
                                            <img class="screen-arrows" src="<?php bloginfo('template_url'); ?>/images/arrows.png">
                                            <img class="screen-desktop" src="<?php bloginfo('template_url'); ?>/images/desktop.png">
                                            <img class="screen-tablet" src="<?php bloginfo('template_url'); ?>/images/tablet.png">
                                            <img class="screen-mobile" src="<?php bloginfo('template_url'); ?>/images/mobile.png">
                                        </div><!-- .screens-imgs -->
                                        
                                        <div class="screens-info">
                                            <h1><span>1</span> Flexible</h1><hr>
                                            <h2>Websites should look good on any device!</h2>
                                            <p>New technologies allow us web designers to create beautiful websites for any device.</p>
                                            <a href="/">Responsive Web Design!</a>
                                        </div><!-- .screens-info -->
                                        
                                    </div><!-- .screens -->
                                </li>
                                <li>
                                    <div class="connect anim-section">
                            
                                        <div class="connect-imgs">
                                            <img class="connect-bg" src="<?php bloginfo('template_url'); ?>/images/connect-bg.png">
                                            <img class="connect-lines" src="<?php bloginfo('template_url'); ?>/images/connect-lines.png">
                                            <img class="connect-dots" src="<?php bloginfo('template_url'); ?>/images/dots.png">
                                        </div>
                                        
                                        <div class="connect-info">
                                            <h1><span>2</span> Social</h1><hr>
                                            <h2>Lets be friends!</h2>
                                            <p>Social networks open up endless possibilities for growth on your website.</p>
                                            <a href="/" class="twitter">Follow Me</a>
                                            <a href="/" class="linkedin">LinkedIn</a>
                                        </div>
                                        
                                    </div><!-- .connect -->
                                </li>
                                <li>
                                    <div class="engage anim-section">
                                    
                                        <div class="engage-imgs">
                                            <img class="engage-people" src="<?php bloginfo('template_url'); ?>/images/people.png">
                                            <img class="engage-bolts" src="<?php bloginfo('template_url'); ?>/images/bolts.png">
                                            <img class="engage-magnets" src="<?php bloginfo('template_url'); ?>/images/magnets.png">
                                        </div>
                                        
                                        <div class="engage-info">
                                            <h1><span>3</span> Engage</h1><hr>
                                            <h2>User-centered design creates repeat-visits!</h2>
                                            <p>Create a pleasant experience for your visitors and you will be rewarded with higher traffic.</p>
                                            <a href="/">Contact Me</a>
                                        </div>
                                        
                                    </div><!-- .engage -->
                                </li>
                            </ul>
                        </div><!-- flexslider -->
                    </div><!-- flex-container -->
                    
                </div><!-- .anim -->
                
                
                
            </section><!-- .home-intro -->

    	</div><!-- .page-wrap -->

    </section><!-- .featured -->

<div class="page-wrap">

	<section class="home-featured">
                	
        <article class="blog-preview">
                
            <h1><a href="/">blog</a></h1>
            
            <hr>
            
            <?php query_posts('posts_per_page=3'); ?>
            
            <?php if ( ! have_posts() ) : ?>  
                    <h2>Not Found</h2>
                    <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post</p>  
            <?php endif; ?>  
              
            <?php while ( have_posts() ) : the_post(); ?>
            
                <article>
                
                	<hgroup>
                    
                    	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <h2><?php the_time(get_option('date_format')); ?> &middot; <?php the_author(); ?> &middot; <?php the_category(', '); ?></h2>
                        
                    </hgroup>
                    
                    <span class="comment-count"><?php comments_popup_link('Comment', '1 Comment', '% Comments'); ?></span>
                    
					<?php 
						$excerpt = get_the_excerpt();
						echo string_limit_words($excerpt,15);
						echo ' <a class="moretag" href="'. get_permalink($post->ID) . '">Continue Reading...</a>'
					?>
                        
                </article>
            
            <?php endwhile; ?>
            
            <?php //check if there are more than 1 posts resulting from the above loop ?>
            <?php if ( $wp_query->max_num_pages > 1 ) : ?>  
                    <div id="older-posts"><?php next_posts_link('Older Posts'); ?></div>  
                    <div id="newer-posts"><?php previous_posts_link('Newer Posts'); ?></div>  
            <?php else: ?>  
                    <div id="only-page">No newer/older posts</div>  
            <?php endif; ?>
        
        </article>
        
        <article class="work-preview">
            
            <h1><a href="/">my work</a></h1>
            
            <hr>
            
            <div class="work-thumb">
            	<a href="/"><img src="images/ss-hdsupply-electrical.png" /></a>
            </div>
            
      <div class="work-thumb">
            	<a href="/"><img src="images/ss-hdsupply-electrical.png" /></a>
            </div>
        
        </article>
        
        <article class="contact-preview">
            
            <h1><a href="/">contact me</a></h1>
            
            <hr>
            
            <a href="/">E-mail Me</a>
            <a href="/" class="twitter">Follow Me</a>
            <a href="/" class="linkedin">LinkedIn</a>
        
        </article>
    
    </section><!-- .home-features -->
    
</div><!-- .page-wrap -->

<?php get_footer(); ?>