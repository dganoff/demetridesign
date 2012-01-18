<?php get_header(); ?>

<?php // Let's get the data we need	
	$objective = get_post_meta( $post->ID, 'Objective', true );
	$involvement = get_post_meta( $post->ID, 'Involvement', true );
	$address = get_post_meta( $post->ID, 'address', true );
	
	$work_clients = strip_tags( get_the_term_list( $wp_query->post->ID, 'clients', '', ', ', '' ) );
	$technologies = strip_tags( get_the_term_list( $wp_query->post->ID, 'technology', '', ', ', '' ) );
	
	$work_image = new WP_Query( // Start a new query for our videos
	array(
		'post_parent' => $post->ID, // Get data from the current post
		'post_type' => 'attachment', // Only bring back attachments
		'post_mime_type' => 'image', // Only bring back attachments that are videos
		'posts_per_page' => '1', // Show us the first result
		'post_status' => 'inherit', // Attachments require "inherit" or "all"
		)
	);
?>

<section class="featured">

	<div class="page-wrap">
		
		<h1><a href="<?php echo $address ?>" target="_blank" title="Go to Live Site..."><?php the_title(); ?></a></h1>
        <h2>Client: <?php echo $work_clients ?></h2>

	<div><!-- .page-wrap -->

</section><!-- .featured -->

<div class="page-wrap">

	<section class="gallery">
          
        <?php while ( have_posts() ) : the_post(); ?>
            
            <article class="gallery-item">
                            
                <section class="gallery-info">
                
					<h3>Objective</h3>
					<p><?php echo $objective ?></p>
                    
                    <h3>Technologies</h3>
                    <p><?php echo $technologies; ?></p>
                    
                    <h3>My Involvement</h3>
					<p><?php echo $involvement ?></p>
                
                </section>
                
                <section class="gallery-media">
                	
                    <a href="<?php echo $address ?>" target="_blank" title="Go to Live Site...">

		                <?php while ( $work_image->have_posts() ) : $work_image->the_post(); ?>
		                	<img src="<?php echo $post->guid; ?>">
		                <?php endwhile; ?>

                    </a>

					<?php wp_reset_postdata(); // Reset the loop ?>
                
                </section>
                
            </article>
            
		<?php endwhile; ?>
        
    </section><!-- .gallery -->
    
</div><!-- .page-wrap -->

<?php get_footer(); ?>