<?php get_header(); ?>

<section class="featured">

    <div class="page-wrap">
        
        <h1><?php single_cat_title('Category: '); ?></h1>
        
        <?php
			$category_description = category_description();
			if ( ! empty( $category_description ) )
				echo '<p>';
				echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
				echo '</p>';
		?>

    </div><!-- .page-wrap -->

</section><!-- .featured -->

<div class="page-wrap">

	<section id="main">
    
    	<?php if ( ! have_posts() ) : ?>  
                <h2>Not Found</h2>
                <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>  
        <?php endif; ?>  
          
        <?php while ( have_posts() ) : the_post(); ?>
            
            <article>
            
            	<hgroup>
                	
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <h2><?php the_time(get_option('date_format')); ?> &middot; <?php the_author(); ?> &middot; <?php the_category(', '); ?></h2>
                    
                </hgroup>
                
                <span class="comment-count"><?php comments_popup_link('Comment', '1 Comment', '% Comments'); ?></span>
                
                <?php edit_post_link('Edit', '<span class="edit">  ' , '</span>'); ?><span class="comment-count"><?php comments_popup_link('Comment', '1 Comment', '% Comments'); ?></span>
                            
                <?php if ( is_archive() || is_search() || is_category() ) : // Only display excerpts for archives and search. ?>  
					<?php the_excerpt(); ?>  
				<?php else : ?>  
					<?php the_content('Read More'); ?> 
                <?php endif; ?>
                
            </article>
            
		<?php endwhile; ?>
        
        <?php //check if there are more than 1 posts resulting from the above loop ?>
        <?php if ( $wp_query->max_num_pages > 1 ) : ?>  
                <div id="older-posts"><?php next_posts_link('Older Posts'); ?></div>  
                <div id="newer-posts"><?php previous_posts_link('Newer Posts'); ?></div>  
        <?php else: ?>  
                <div id="only-page">No newer/older posts</div>  
        <?php endif; ?>
        
    </section><!-- #main -->
    
    <?php get_sidebar(); ?>
    
</div><!-- .page-wrap -->

<?php get_footer(); ?>