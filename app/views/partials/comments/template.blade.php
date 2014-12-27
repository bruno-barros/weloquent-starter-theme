@if ( post_password_required() )
    <?php return;?>
@endif


<div id="comments">

    <h3><?php comments_number('0 Comentários', '1 Comentário', '% Comentários');?></h3>

    @if ( have_comments() )

        <div class="commentlist">

            {{ wp_list_comments([
                    'walker'            => null,
                    'max_depth'         => '',
                    'style'             => 'div',
                    'callback'          => array(new Weloquent\Support\Comments\Comments, 'item'),
                    'end-callback'      => null,
                    'type'              => 'all',
                    'reply_text'        => __('Reply'),
                    'page'              => '',
                    'per_page'          => '',
                    'avatar_size'       => 32,
                    'reverse_top_level' => null,
                    'reverse_children'  => '',
                    'format'            => 'html5',
                    'short_ping'        => false,
                    'echo'              => false
            ]) }}

        </div>

        @if ($wp_query->max_num_pages > 1)

            <div class="pagination">
                <ul>
                    <li class="older"><?php previous_comments_link('&laquo; Older Comments'); ?></li>
                    <li class="newer"><?php next_comments_link('Newer Comments &raquo;'); ?></li>
                </ul>
            </div>

        @endif

    @endif

</div>