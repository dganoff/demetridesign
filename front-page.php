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
            
            <?php query_posts('posts_per_page=3'); ?>
            
            <?php if ( ! have_posts() ) : ?>  
                    <h2>Not Found</h2>
                    <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post</p>  
            <?php endif; ?>  
              
            <?php while ( have_posts() ) : the_post(); ?>
            
                <article>
                
                	<hgroup>
                    
                    	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <h2>
                            <?php the_time(get_option('date_format')); ?> &middot; By: <?php the_author(); ?> &middot; <?php the_category(', '); ?>
                        </h2>
                        
                    </hgroup>
                    
                    <p>
					<?php 
						$excerpt = get_the_excerpt();
						echo string_limit_words($excerpt,10);
						echo ' <a class="moretag" href="'. get_permalink($post->ID) . '">Continue Reading...</a>'
					?>
                    </p>
                        
                </article>
            
            <?php endwhile; ?>
        
        </article>
        
        <article class="work-preview">
            
            <h1><a href="/">my work</a></h1>
            
            <?php
            $args = array( 'post_type' => 'resource', 'posts_per_page' => 10 );
            $loop = new WP_Query( $args );
            ?>
            
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <?php // Let's get the data we need 
                    $objective = get_post_meta( $post->ID, 'Objective', true );
                    $involvement = get_post_meta( $post->ID, 'Involvement', true );
                    $address = get_post_meta( $post->ID, 'address', true );
                    
                    $resource_presenters = strip_tags( get_the_term_list( $wp_query->post->ID, 'presenters', '', ', ', '' ) );
                    //$resource_topics = get_the_term_list( $post->ID, 'topics', '', ', ', '' );
                    $topics = strip_tags( get_the_term_list( $wp_query->post->ID, 'topics', '', ', ', '' ) );
                    
                    $resource_image = new WP_Query( // Start a new query for our videos
                    array(
                        'post_parent' => $post->ID, // Get data from the current post
                        'post_type' => 'attachment', // Only bring back attachments
                        'post_mime_type' => 'image', // Only bring back attachments that are videos
                        'posts_per_page' => '1', // Show us the first result
                        'post_status' => 'inherit', // Attachments require "inherit" or "all"
                        )
                    );
                ?>
                
                <a href="<?php the_permalink(); ?>" class="work-thumb">

                    <?php while ( $resource_image->have_posts() ) : $resource_image->the_post(); ?>

                        <img src="<?php echo $post->guid; ?>">
                    
                    <?php endwhile; ?>

                </a>

            <?php endwhile; ?>
        
        </article>
        
        <article class="contact-preview">
            
            <h1><a href="/">contact me</a></h1>
            
            <form name="contact">

                <input type="text" name="name" placeholder="Your Name" />
                <input type="text" name="email" placeholder="Your E-mail" />
                <textarea name="msg" placeholder="A message to me..."></textarea>
                <input type="submit" name="submit" value="Send">

            </form>

            <a href="/" class="twitter">Follow Me</a>
            <a href="/" class="linkedin">LinkedIn</a>
        
        </article>
    
    </section><!-- .home-features -->
    
</div><!-- .page-wrap -->

<?php get_footer(); ?>