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
  
<?php comment_form(); ?>
  
<?php endif; ?>