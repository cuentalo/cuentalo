<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">	
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.min.css">
	<title><?php wp_title('|', true, 'right');?> <?php bloginfo('name');?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="py-1">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1>Cartagena Justicia Social</h1>
				</div>
				<div class="col-md-6">
					<div class="jkr-menu-header">
						<ul class="d-flex flex-row float-right mt-3">
							<li class="ml-4"><a href="#">Registro</a></li>
							<li class="ml-4"><a href="#">Iniciar sesión</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>		
	</header>
	<div id="nav-home">
		<div class="container">
				<?php wp_nav_menu(array(
					'theme_location'  => 'menu-principal',
					'container'       => 'nav',
					'container_class' => 'menu-home',
					'items_wrap'      => '<ul id="%1$s" class="menu_main">%3$s</ul>'));
				?>
		</div>
	</div>
		