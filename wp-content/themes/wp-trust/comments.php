<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package cshero
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php // You can start editing here -- including this comment! ?>
	<?php if ( have_comments() ) : ?>
        <div class="st-comments-wrap clearfix">
            <h4 class="cms-title">
                <span><?php comments_number(__('Comments','wp-trust'),__('1 Comments','wp-trust'),__('% Comments','wp-trust')); ?></span>
            </h4>
            <ol class="comment-list">
				<?php wp_list_comments( 'type=comment&callback=wp_trust_comment' ); ?>
			</ol>
			<?php wp_trust_comment_nav(); ?>
        </div>
	<?php endif; // have_comments() ?>

	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name__mail' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'title_reply'       => esc_html__( 'Leave A Reply','wp-trust'),
			'title_reply_to'    => esc_html__( 'Leave A Reply To ','wp-trust') . '%s',
			'cancel_reply_link' => esc_html__( 'Cancel Reply','wp-trust'),
			'label_submit'      => esc_html__( 'Post Your Comment','wp-trust'),
			'comment_notes_before' => '',
			'fields' => apply_filters( 'comment_form_default_fields', array(

					'author' =>
					'<p class="comment-form-author">'.
					'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . $aria_req . ' placeholder="'.esc_html__('YOUR NAME', 'wp-trust').'"/></p>',

					'email' =>
					'<p class="comment-form-email">'.
					'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"' . $aria_req . ' placeholder="'.esc_html__('EMAIL', 'wp-trust').'"/></p>',

					'website' =>
					'<p class="comment-form-website">'.
					'<input id="website" name="website" type="text" value="" size="30"' . $aria_req . ' placeholder="'.esc_html__('WEBSITE', 'wp-trust').'"/></p>',
			)
			),
			'comment_field' =>  '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.esc_html__('COMMENT', 'wp-trust').'" aria-required="true">' .
			'</textarea></p>',
	);
	comment_form($args);
	?>

</div><!-- #comments -->
