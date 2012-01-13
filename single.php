<?php get_header(); ?>

<div class="page-wrap">

	<section id="main">
    
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
                
                <?php edit_post_link('Edit', '<span class="edit">  ' , '</span>'); ?>
                            
                <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>  
					<?php the_excerpt(); ?>  
				<?php else : ?>  
					<?php the_content('Read More'); ?> 
                <?php endif; ?>
                
            </article>  
      
			<?php comments_template( '', true ); ?>  
  
		<?php endwhile; // ends the posts while loop?>
        
    </section><!-- #main -->

<?php get_sidebar(); ?>

</div><!-- .page-wrap -->

<?php get_footer(); ?>