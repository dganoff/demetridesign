<?php get_header(); ?>

<div class="page-wrap">

	<section id="main">

        <nav class="breadcrumbs">
            
            <?php include 'breadcrumbs.php'; ?>

        </nav>
    
    	<?php if ( ! have_posts() ) : ?>  
                <h2>Not Found</h2>
                <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post</p>  
        <?php endif; ?>  
          
        <?php while ( have_posts() ) : the_post(); ?>  
  
            <article>
            
            	<hgroup>
                	
                    <h1>
                        <?php the_title(); ?>
                        <?php comments_popup_link('', '1', '%','comments'); ?>
                    </h1>
                    <h2>
                        <?php the_time(get_option('date_format')); ?> &middot; 
                        By: <?php the_author(); ?> &middot; 
                        <img src="<?php bloginfo('template_url'); ?>/images/category.png"> <?php the_category(', '); ?>

                    </h2>
                    
                </hgroup>
                                
                <?php edit_post_link('Edit', '<span class="edit">  ' , '</span>'); ?>
                            
                <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>  
					<?php the_excerpt(); ?>  
				<?php else : ?>  
					<?php the_content('Read More'); ?> 
                <?php endif; ?>

                <span class="post-meta-bottom">
                    Posted on: <?php the_time(get_option('date_format')); ?> &middot; 
                    By: <?php the_author(); ?> &middot; 
                    <?php the_category(', '); ?>
                </span>
                
            </article>  
      
			<?php comments_template( '', true ); ?>  
  
		<?php endwhile; // ends the posts while loop?>
        
    </section><!-- #main -->

<?php get_sidebar(); ?>

</div><!-- .page-wrap -->

<?php get_footer(); ?>