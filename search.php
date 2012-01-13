<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	<div class="page-wrap">
		<section id="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>


				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						?>
                        
                        <article>
            
            	<hgroup>
                	
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <h2><?php the_time(get_option('date_format')); ?> &middot; <?php the_author(); ?> &middot; <?php the_category(', '); ?></h2>
                    
                </hgroup>
                
                <span class="comment-count"><?php comments_popup_link('Comment', '1 Comment', '% Comments'); ?></span>
                
                <?php edit_post_link('Edit', '<span class="edit">  ' , '</span>'); ?><span class="comment-count"><?php comments_popup_link('Comment', '1 Comment', '% Comments'); ?></span>
                            
                <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>  
					<?php the_excerpt(); ?>  
				<?php else : ?>  
					<?php the_content('Read More'); ?> 
                <?php endif; ?>
                
            </article>
                        
                        <?php
					?>

				<?php endwhile; ?>


			<?php else : ?>

				<p>nothing found</p>

			<?php endif; ?>

        </section><!-- #main -->

<?php get_sidebar(); ?>
</div><!-- .page-wrap -->
<?php get_footer(); ?>