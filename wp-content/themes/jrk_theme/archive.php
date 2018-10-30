<?php
/*
Template Name: Archives
*/
get_header(); 

$categoria = "";
if (isset($_GET['cat'])) {
	$categoria 	= trim($_GET['cat']);
}
$pid = '';
if (isset($_GET['p'])) {
	$pid 	= trim($_GET['p']);
}

	//Cuando es un Post especifico hago la busqueda manual porque sino direcciona directamente a la pagina de gestion del Post
	$i = '';
	if( $categoria!='') {
	   if ($categoria!='historia' && $categoria!='grupo'){
		   $argus = array('post_type' =>'post');   
		   $i = trim($categoria);
	   } else {
			$argus = array(
    			'post_type'  	=> 'post',
				'category_name' => $categoria,
				'numberposts'	=> -1
			);				
	   }
    } 	
	global $post; 
	$tq = get_posts($argus); 
	$total = 0; //Usado en la busqueda manual
	foreach ($tq as $post ) : setup_postdata($post);
			$id 	= get_the_ID(); //trim(ID);		
			$titulo = get_the_title(); //post_title; 
			$des 	= get_the_content(); //post_content; 
			$exc	= get_the_excerpt();
			//$tags	= get_the_tags();
			$ur 	= get_permalink();
			$ot 	= "";
			$oc 	= "";
			$oc .="<div class='row bg-items py-4 px-3 mb-5'>";	
			if ( has_post_thumbnail($id) ) { 
				$oc .="<div class='img-thumb'><p class='w-100 h-100'>".get_the_post_thumbnail($id, 'thumbnail')."</p></div>";
			}			 
            $oc .="<div class='new-home'>";
			 //<small class="form-text text-muted">Usted NO tiene Grupos registrados</small>
			$oc .="<div class='texto-post'>".$exc."</div>";
           // $oc .="<div class='categoria-entrada'><i class='fa fa-tags' aria-hidden='true'></i>".the_tags( ' ', ' ', '<br />' )."</div>";
            $oc .="<div class='line-title my-4'></div>";
			//$oc .="<div>";
			$oc .="<div><a href='".$ur."' class='btn-more'>ver mas &#8594</a></div>"; 
			$oc .="</div>";
			$oc .="</div>";    		
									 			 			 			 
			//$direccion 	= get_post_meta( $id, 'Direccion', true );		           
			$lon = '';
			if ($i!='') {
				if ($i==$id) {
					$lon	= trim(get_post_meta($id, 'Lon', true ));
					$lat	= trim(get_post_meta($id, 'Lat', true ));
				}
		 	} else {
				$lon	= trim(get_post_meta($id, 'Lon', true ));
				$lat	= trim(get_post_meta($id, 'Lat', true ));			 
		 	}
			if ($lon){ 
				$a[] = array($lon, $lat);
				$b[] = array($titulo, $oc);				
				$total = $total + 1;
				?>				
    	<?php } 
	endforeach;

?>

<section id="slider" class="slider-home">
	<div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="slider-content">
                     <h1>SJRK</h1>
                     <p>Contando el valor de la diversidad!</p>                     
                </div>
            </div>
        </div>		
    </div>  
</section>

<section class="time-line py-5" id="b">
  <div class="container">
	  <?php if ($total>0){ 
			$texto = $total." Ubicaciones ";?>	
      		<h2 class="title-h2 line-title pb-2 mt-5"> <?php echo $texto; ?></h2>
	        <h5>Toque el Marcador y aparecerà al lado, la informaciòn de la Ubicaciòn.</h5>
			<h5>Toque el link y aparecerà la informacion dentro del Mapa.</h5>			
	  		<p><a href="http://cuentalo.org"> Ir a la pàgina principal</a></p>	
	  <?php } else {	
	  		$texto = "Ninguna Ubicaciòn encontrada. ";?>	
      		<h2 class="title-h2 line-title pb-2 mt-5"> <?php echo $texto; ?></h2>	  
	  		<p><a href="http://cuentalo.org"> Ir a la pàgina principal</a></p>	
	  <?php } ?>	
      <div class="item-tl my-4 p-3">
          <article>       
        	<link rel="stylesheet" href="http://dev.openlayers.org/theme/default/style.css" type="text/css">
      		<?php //<link rel="stylesheet" href="http://dev.openlayers.org/examples/style.css" type="text/css">	?>
			  <div class="noticias-actuales">
                <div class="row bg-items py-4 px-3 mb-5">
                  <div class="col-md-6">
                      <div class="img-thumb">
	        			<div id="map" style="width: 900px; height: 600px; border: 1px solid #ccc;"></div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="new-home">       
						<div id="layerswitcher" class="olControlLayerSwitcher"></div>					    
                      </div>
                  </div>				
                  <div class="col-md-6">
                      <div class="new-home">       						
						 <ul id="style_chooser"></ul>
    	    			<div id="divList" style="float:left; min-width: 200px; margin-left: 6px"></div>		
                      </div>
                  </div>
	<?php if ($total>0){ ?>		
		<div style="clear:both;display:none" id="docs">			            
			<script type="application/json" id="desdePHP"><?php echo jh_osm_array_string_json($a, $b); ?></script>		
			<p id="desdeJS" ></p>
        </div>	
					
		<script src="http://dev.openlayers.org/OpenLayers.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/patches_OL-popup-autosize.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/lib/FeaturePopups.js"></script>
				
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/feature-popups-common.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/feature-popups-external.js"></script>				
    <?php }else{ ?>
	<?php } ?>
	<?php wp_reset_query(); // reset the query ?>											
                </div> 
             </div>
          </article>
      </div>
  </div> 
</section>

<?php get_footer(); ?>