<?php
/*
Template Name: Works
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
				$args = array( 'post_type' => 'work', 'posts_per_page' => 10 );
				$loop = new WP_Query( $args );
				?>
				
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<?php // Let's get the data we need	
						$objective = get_post_meta( $post->ID, 'Objective', true );
						$involvement = get_post_meta( $post->ID, 'Involvement', true );
						$address = get_post_meta( $post->ID, 'address', true );
						
						$work_clients = strip_tags( get_the_term_list( $post->ID, 'clients', '', ', ', '' ) );
						$technologies = strip_tags( get_the_term_list( $post->ID, 'technology', '', ', ', '' ) );
						
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

                    <li>

                    	<div class="gallery-item">                        	
            
			                <h1><a href="<?php echo $address ?>" target="_blank" title="Go to Live Site..."><?php the_title(); ?></a></h1>
			                <h2>Client: <?php echo $work_clients ?></h2>

							<section class="gallery-media">
                	
			                    <a href="<?php echo $address ?>" target="_blank" title="Go to Live Site...">

			                    <?php while ( $work_image->have_posts() ) : $work_image->the_post(); ?>
			                    	<img src="<?php echo $post->guid; ?>">
			                    <?php endwhile; ?>

			                    </a>
			                
			                </section>

							<section class="gallery-info">
            
								<h3>Objective</h3>
								<p><?php echo $objective ?></p>
			                    
			                    <h3>Technologies</h3>
			                    <code><?php echo $technologies; ?></code>
			                    
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