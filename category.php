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
        
        <nav class="breadcrumbs">
            
            <?php include 'breadcrumbs.php'; ?>

        </nav>
    
    	<?php if ( ! have_posts() ) : ?>  
                <h2>Not Found</h2>
                <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>  
        <?php endif; ?>  
          
        <?php while ( have_posts() ) : the_post(); ?>
            
            <article>

                <div class="post-meta-wide">
                    <span class="date"> <?php the_time(get_option('date_format')); ?> <br> </span>
                    By: <?php the_author(); ?> <br>
                    <img src="<?php bloginfo('template_url'); ?>/images/category.png"> <?php the_category('<br>'); ?>
                </div>
            
                <hgroup>
                    
                    <h1>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h1>

                    <h2><?php the_time(get_option('date_format')); ?> &middot; <?php the_author(); ?></h2>
                    
                </hgroup>

                <div class="article-body">
                                
                    <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>  
                        <?php the_excerpt(); ?>  
                    <?php else : ?>  
                        <?php the_content('Read More'); ?> 
                    <?php endif; ?>

                </div><!-- .article-body -->
                
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