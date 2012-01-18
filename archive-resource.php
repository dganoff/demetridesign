<?php
/*
Template Name: Resources
*/
?>

<?php get_header(); ?>

<div class="page-wrap">

	<section class="gallery">

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
			
			<a href="<?php the_permalink(); ?>">

				<?php while ( $resource_image->have_posts() ) : $resource_image->the_post(); ?>

	            	<img src="<?php echo $post->guid; ?>">
	            
				<?php endwhile; ?>

			</a>

		<?php endwhile; ?>
        
    </section><!-- .gallery -->
    
</div><!-- .page-wrap -->

<?php get_footer(); ?>