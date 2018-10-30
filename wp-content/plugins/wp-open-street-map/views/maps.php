<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<h2>All WP Open Street Maps</h2>



<a href="<?= admin_url('admin.php?page=wp_openstreetmaps&task=new') ?>">Add a new map</a>
<?php



	if(sizeof($maps) > 0)

	{



		foreach($maps as $map)

		{

			echo '<div class="wp_osm"><h3>'.$map->name.'</h3>

			<a href="'.admin_url('admin.php?page=wp_openstreetmaps&task=manage&id='.$map->id).'" title="Manage markers"><img src="'.plugins_url( 'images/manage.png', dirname(__FILE__) ).'" /></a>

			<a href="'.admin_url('admin.php?page=wp_openstreetmaps&task=remove&id='.$map->id).'" title="Remove map"><img src="'.plugins_url( 'images/remove.png', dirname(__FILE__) ).'" /></a>

			<br />

			<b>Shortcode : </b>

			<input type="text" readonly value="[wp-osm id='.$map->id.']" onClick="this.select()" />

			<br />

			</div>';

		}

	}

	else

		echo 'No WP Open street maps created yet!';



?>