<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<?php $textdoimain = 'birva'; ?>

		<!-- COMMENTS -->
		<div id="comments" class="margbot30" data-animated="fadeInUp">
					 	<?php if ( have_comments() ) : ?>
							<h3 class="margbot40">Comments <span class="comments_count"><?php comments_number( __('0 ', $textdoimain), __('1 ', $textdoimain), __('% ', $textdoimain) ); ?></span></h3>
							<ul>
								<?php wp_list_comments('callback=birva_theme_comment'); ?>
							</ul>
						<?php
                            // Are there comments to navigate through?
                            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
                        ?>
                            <nav class="navigation comment-navigation" role="navigation">
                               
                                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'birva' ) ); ?></div>
                                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'birva' ) ); ?></div>
                            </nav><!-- .comment-navigation -->
                        <?php endif; // Check for comment navigation ?>

                        <?php if ( ! comments_open() && get_comments_number() ) : ?>
                            <p class="no-comments"><?php _e( 'Comments are closed.' , 'CNE' ); ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
		</div>
		<!-- //COMMENTS -->

<?php if (comments_open()) { ?>
<!-- LEAVE A COMMENT -->
<div class="leave_comment" data-animated="fadeInUp">
				<?php
                    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
                        $aria_req = ( $req ? " aria-required='true'" : '' );
                        $comment_args = array(
                                'id_form' => 'comment_form',                                
                                'title_reply'=> '<h3>'.__('Leave a comment',$textdoimain).'</h3>',
                                'fields' => apply_filters( 'comment_form_default_fields', array(
                                    'author' => '<input id="author" type="text" name="author" placeholder="Name" />',   
                                    'email' => '<input id="email" class="last" name="email" type="text" placeholder="Email" />',                                                                                  
                                ) ),                                
                                 'comment_field' => '<textarea id="comment"  name="comment"'.$aria_req.' placeholder="Your Message ..." ></textarea>',
                                                                                       
                                 'label_submit' => 'Send message',
                                 'comment_notes_before' => '',
                                 'comment_notes_after' => '',
                                 
                        )
                    ?>
                    <?php comment_form($comment_args); ?>
</div><!-- //LEAVE A COMMENT -->
<?php }else {}?>

                