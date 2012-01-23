<?php if ( have_comments() ) : ?>  
    <h4><?php printf( _n( 'One Comment', '%1$s Comments', get_comments_number() ),number_format_i18n( get_comments_number() ) );  
    ?></h4>

    <a name="comments"></a>
      
    <?php foreach ($comments as $comment) { ?>  
        <div class="comment">  
            <a name="comment-<?php comment_ID(); ?>"></a>  
            <?php echo get_avatar( $comment->comment_author_email, $size = '40'); ?>  
            <div class="comment-right">  
                <span class="comment-author"><a href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a></span> <span class="comment-date">on <?php comment_date(); ?></span>  
                <p><?php echo $comment->comment_content; ?></p>  
            </div>  
            <div class="spacer"></div>  
        </div><!-- comment -->  
    <?php } ?>
      
    <?php else: ?>  
        <h4>No comments</h4>  
<?php endif; ?>

<?php if ( ! comments_open() ) : ?>  
    <h4>Comments are closed.</h4>  
<?php else: ?>  
  
<h4>Leave a Comment</h4>
<a name="respond"></a>
            <form action="<?php bloginfo('url'); ?>/wp-comments-post.php" method="post" id="commentform">  
                <input type='hidden' name='comment_post_ID' value='<?php echo $post->ID; ?>' id='comment_post_ID' />  
                
                <label>Name / Alias (required)</label>
                <input type="text" value="" name="author" placeholder="Your Name"><br />  
                
                <label>Email Address (required, not shown)</label>
                <input type="text" value="" name="email" placeholder="Email"><br />  
                
                <label>Website (optional)</label><input type="text" value="" name="url"><br />  
                
                <textarea rows="7" name="comment" placeholder="Your amazingly thoughtful and inspiration comment..."></textarea><br />

                <input type="submit" value="Comment" />  
            </form>  
  
<?php endif; ?>