<?php get_header(); ?>

<?php // Let's get the data we need
	$presenter = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

	$resources = new WP_Query(
	array(
		'post_type' => 'resource', // Tell WordPress which post type we want
		'posts_per_page' => '3', // Show the first 3
		'tax_query' => array( // Return only resources where presenter is listed
			array(
				'taxonomy' => 'presenters',
				'field' => 'slug',
				'terms' => $presenter->slug,
				)
			)
		)
	);
	
	$objective = get_post_meta( $post->ID, 'Objective', true );
	$involvement = get_post_meta( $post->ID, 'Involvement', true );
	
	$resource_presenters = get_the_term_list( $post->ID, 'presenters', '', ', ', '' );
	$resource_topics = get_the_term_list( $post->ID, 'topics', '', ', ', '' );
	
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
    
    	<h1>All work for: <?php echo $presenter->name; ?></h1>
          
        <?php while ( $resources->have_posts() ) : $resources->the_post(); ?>
            
            <article class="gallery-item">
            
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <h2>Client: <?php echo $resource_presenters ?></h2>
                
                <section class="gallery-info">
                
					<h3>Objective</h3>
					<?php echo $objective ?>
                    
                    <h3>Technologies</h3>
					<?php echo $resource_topics ?>
                    
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