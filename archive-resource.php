<?php
/*
Template Name: Resources
*/
?>

<?php get_header(); ?>

<section class="featured">

	<div class="page-wrap">
		
		<h1><?php the_title(); ?></h1>

	<div><!-- .page-wrap -->

</section><!-- .featured -->

<div class="page-wrap">
	<div class="flex-container">
        <div class="flexslider">
            <ul class="slides">

				<?php
				$args = array( 'post_type' => 'resource', 'posts_per_page' => 10 );
				$loop = new WP_Query( $args );
				?>
				
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<?php // Let's get the data we need	
						$objective = get_post_meta( $post->ID, 'Objective', true );
						$involvement = get_post_meta( $post->ID, 'Involvement', true );
						$address = get_post_meta( $post->ID, 'address', true );
						
						$resource_presenters = strip_tags( get_the_term_list( $post->ID, 'presenters', '', ', ', '' ) );
						$topics = strip_tags( get_the_term_list( $post->ID, 'topics', '', ', ', '' ) );
						
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

                    <li>

                    	<div class="gallery-item">                        	
            
			                <h1><a href="<?php echo $address ?>" target="_blank"><?php the_title(); ?></a></h1>
			                <h2>Client: <?php echo $resource_presenters ?></h2>

							<section class="gallery-media">
                	
			                    <?php while ( $resource_image->have_posts() ) : $resource_image->the_post(); ?>
			                    
			                    <a href="<?php $address ?>" target="_blank">
			                    	<img src="<?php echo $post->guid; ?>">
			                    </a>
			                    
								<?php endwhile; ?>
			                
			                </section>

							<section class="gallery-info">
            
								<h3>Objective</h3>
								<p><?php echo $objective ?></p>
			                    
			                    <h3>Technologies</h3>
			                    <code><?php echo $topics; ?></code>
			                    
			                    <h3>My Involvement</h3>
								<p><?php echo $involvement ?></p>
			                
			                </section>

			                

						</div><!-- .gallery-item -->

                    </li>

				<?php endwhile; ?>

            </ul>
        </div><!-- flexslider -->
    </div><!-- flex-container -->

</div><!-- .page-wrap -->



<?php get_footer(); ?>