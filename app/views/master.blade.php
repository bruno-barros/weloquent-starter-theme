<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">

	<title><?php wp_title() ?></title>

	@include('partials.head')

	<?php wp_head()?>

	@yield('head')

</head>

<body <?php body_class()?>>

@yield('body_top')

@yield('body_middle')

@yield('body_bottom')

</body>

</html>