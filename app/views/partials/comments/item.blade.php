
<div id="comment-<?php comment_ID() ?>"
<?php comment_class(empty($args['has_children']) ? 'media' : 'media parent') ?>>

    <div id="div-comment-<?php comment_ID() ?>" class="comment-body ">

        <div class="media-left">

            @if( $args['avatar_size'] != 0 )

                {{ get_avatar( $comment, $args['avatar_size'] ) }}

            @endif

        </div>

        <div class="media-body comment-author vcard">

            <?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>

            @if( $comment->comment_approved == '0' )

                <em class="comment-awaiting-moderation">
                    {{ __( 'Your comment is awaiting moderation.' ) }}
                </em>
                <br />

            @endif

            <div class="comment-meta commentmetadata">

                <a href="{{ htmlspecialchars( get_comment_link( $comment->comment_ID ) ) }}">
                    <?php /* translators: 1: date, 2: time */
                    printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() );
                    ?>
                </a>
                <?php edit_comment_link( __( '(Edit)' ), '  ', '' )?>

            </div>

            <?php comment_text(); ?>

            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>

        </div>



    </div>

{{-- </div> // WordPress will handle this --}}