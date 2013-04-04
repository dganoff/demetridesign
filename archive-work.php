<?php
/*
Template Name: Works
*/
?>

<?php get_header(); ?>

<section class="featured">

	<div class="page-wrap">
		
		<?php if (have_posts()) : while (have_posts()) : the_post();?>

			<h1><?php the_title(); ?></h1>
			
			<?php the_content('Read More'); ?>

		<?php endwhile; endif; ?>

	<div><!-- .page-wrap -->

</section><!-- .featured -->

<div class="page-wrap">

	<nav class="breadcrumbs">
            
        <?php include 'breadcrumbs.php'; ?>

    </nav>

	<div class="gallery">
		

	    <?php
			$args = array( 'post_type' => 'work', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );
		?>

		<h1>Website Projects</h1>
		
		<div class="work-group">
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

		    	<div class="work-item">
					
					<a class="work-info" href="<?php echo $address ?>" target="_blank">
	
    					<h1><?php the_title(); ?></h1>

    					<code><?php echo $technologies; ?></code>
    	
    					<p class="find-out-more">View Site &raquo;</p>
	
					</a>
	
					<?php while ( $work_image->have_posts() ) : $work_image->the_post(); ?>
	                	<img class="work-thumb" src="<?php echo $post->guid; ?>">
	                <?php endwhile; ?>
		    	
		    	</div><!-- .work-item -->
				
			<?php endwhile; ?>
		</div><!-- .work-group -->

    </div><!-- .gallery -->

</div><!-- .page-wrap -->



<?php get_footer(); ?>