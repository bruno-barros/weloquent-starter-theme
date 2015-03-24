<?php

add_action('init', function ()
{

	$td = \Illuminate\Support\Facades\Config::get('app.textdomain');

	$labels = array(
		'menu_name'          => __('Agenda', $td),
		'name'               => __('Agenda', $td),
		'singular_name'      => __('Agenda', $td),
		'add_new'            => __('Adicionar evento', $td),
		'add_new_item'       => __('Adicionar evento', $td),
		'edit_item'          => __('Editar evento', $td),
		'new_item'           => __('Novo evento', $td),
		'all_items'          => __('Todos os eventos', $td),
		'view_item'          => __('Ver evento', $td),
		'search_items'       => __('Pesquisar eventos', $td),
		'not_found'          => __('Nenhum evento encontrado', $td),
		'not_found_in_trash' => __('Nenhum evento encontrado na', $td),
		'parent_item_colon'  => ''
	);

	$args = array(
		'labels'              => $labels,
		'description'         => 'Eventos da SBP e outras entidades.',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-pressthis',
		'query_var'           => true,
		'rewrite'             => array('slug' => 'agenda'),
		'capability_type'     => 'post', // post|page
		'has_archive'         => true,
		'hierarchical'        => false,
		'menu_position'       => 4,
		'supports'            => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes'),
		// optional
		// compartilha estas taxonomias com posts
		'taxonomies'          => array('agenda_category', 'post_tag'),
	);

	register_post_type('agenda', $args);

	/**
	 * ---------------------------------------
	 * Taxonomies for Agenda
	 * ---------------------------------------
	 *
	 * agenda_category
	 */

	$labels = array(
		'name'              => _x('Categorias da Agenda', $td),
		'singular_name'     => _x('Categoria da Agenda', $td),
		'search_items'      => __('Pesquisar categorias da Agenda', $td),
		'all_items'         => __('Todas as categorias da Agenda', $td),
		'parent_item'       => __('Categoria mãe (Agenda)', $td),
		'parent_item_colon' => __('Categoria mãe (Agenda):', $td),
		'edit_item'         => __('Editar categoria da Agenda', $td),
		'update_item'       => __('Atualizar categoria da Agenda', $td),
		'add_new_item'      => __('Adicionar categoria da Agenda', $td),
		'new_item_name'     => __('Nova categoria da Agenda', $td),
		'menu_name'         => __('Categorias da Agenda', $td),
		'not_found'         => __('Nenhuma categorias da Agenda encontrada.', $td),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_admin_column' => true,
		'rewrite'           => array('slug' => 'agenda_category'),
	);
	register_taxonomy('agenda_category', 'agenda', $args);

}, 0);


/**
 * ---------------------------------------------
 * Filter categories
 * ---------------------------------------------
 */

add_action('restrict_manage_posts', function ()
{
	global $typenow;
	$post_type = 'agenda'; // change HERE
	$taxonomy  = 'agenda_category'; // change HERE
	if ($typenow == $post_type)
	{
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Todas as {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
);

add_filter('parse_query', function ($query)
{
	global $pagenow;
	$post_type = 'agenda'; // change HERE
	$taxonomy  = 'agenda_category'; // change HERE
	$q_vars    = &$query->query_vars;
	if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0)
	{
		$term              = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
});