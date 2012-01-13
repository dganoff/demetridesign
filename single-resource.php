<?php get_header(); ?>

<?php // Let's get the data we need	
	$objective = get_post_meta( $post->ID, 'Objective', true );
	$involvement = get_post_meta( $post->ID, 'Involvement', true );
	$address = get_post_meta( $post->ID, 'address', true );
	
	$resource_presenters = strip_tags( get_the_term_list( $wp_query->post->ID, 'presenters', '', ', ', '' ) );
	//$resource_topics = get_the_term_list( $post->ID, 'topics', '', ', ', '' );
	$topics = strip_tags( get_the_term_list( $wp_query->post->ID, 'topics', '', ', ', '' ) );
	
	$resource_video = new WP_Query( // Start a new query for our videos
	array(
		'post_parent' => $post->ID, // Get data from the current post
		'post_type' => 'attachment', // Only bring back attachments
		'post_mime_type' => 'image', // Only bring back attachments that are videos
		'posts_per_page' => '1', // Show us the first result
		'post_status' => 'inherit', // Attachments require "inherit" or "all"
		)
	);
?>

<div class="page-wrap">

	<section class="gallery">
          
        <?php while ( have_posts() ) : the_post(); ?>
            
            <article class="gallery-item">
            
                <h1><a href="<?php echo $address ?>" target="_blank"><?php the_title(); ?></a></h1>
                <h2>Client: <?php echo $resource_presenters ?></h2>
                
                <section class="gallery-info">
                
					<h3>Objective</h3>
					<?php echo $objective ?>
                    
                    <h3>Technologies</h3>
                    <?php echo $topics; ?>
                    
                    <h3>My Involvement</h3>
					<?php echo $involvement ?>
                
                </section>
                
                <section class="gallery-media">
                	
                    <?php while ( $resource_video->have_posts() ) : $resource_video->the_post(); ?>
                    
                    <a href="/" target="_blank">
                    	<img src="<?php echo $post->guid; ?>">
                    </a>
                    
					<?php endwhile; ?>

					<?php wp_reset_postdata(); // Reset the loop ?>
                
                </section>
                
            </article>
            
		<?php endwhile; ?>
        
    </section><!-- .gallery -->
    
</div><!-- .page-wrap -->

<?php get_footer(); ?>