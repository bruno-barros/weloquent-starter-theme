@if( comments_open() )

    {{-- comments template --}}
    <?php comments_template('/app/views/partials/comments/template.blade.php')?>


    {{-- form hook --}}
    <?php comment_form(); ?>


@endif