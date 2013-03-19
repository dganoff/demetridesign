<?php get_header(); ?>

<section class="featured">

    <div class="page-wrap">
        
        <hgroup>
                
            <h1><?php the_title(); ?></h1>
            
        </hgroup>

    </div><!-- .page-wrap -->

</section><!-- .featured -->

<div class="page-wrap">

	<section id="main">
    
    	<?php if ( ! have_posts() ) : ?>  
                <h2>Not Found</h2>
                <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post</p>  
        <?php endif; ?>  
          
        <?php while ( have_posts() ) : the_post(); ?>
  
        <article>
            
            <?php edit_post_link('Edit', '<span class="edit">  ' , '</span>'); ?>
                        
            <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>  
                <?php the_excerpt(); ?>  
            <?php else : ?>  
                <?php the_content('Read More'); ?> 
            <?php endif; ?>
            
        </article>
          
		<?php endwhile; ?>  
        
    </section><!-- #main -->

<?php get_sidebar(); ?>
    
</div><!-- .page-wrap -->

<?php get_footer(); ?> 