<!doctype html>
<html <?php language_attributes()?>>
<head>
	<meta charset="UTF-8">

	<title>{{ wp_title('&gt;', false, 'right' ) }}</title>

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