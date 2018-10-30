<?php get_header(); ?>
	<?php
	// Filtrando por slug
	if (in_category('grupo')) {
		include(TEMPLATEPATH . '/ver-post-grupo.php');
	} elseif (in_category('historia')) {
		include(TEMPLATEPATH . '/ver-post-historia.php');
	} else { // Sino, cargo otro single por defecto
		include(TEMPLATEPATH . '/single-default.php');
	}?>
<?php get_footer(); ?>