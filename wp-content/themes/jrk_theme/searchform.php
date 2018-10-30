<div class="portada foto-portada-history">
	<div class="container">
		<div class="portada-content">
			<h2>Pagina de busqueda</h2>
			<p>Escriba una palabra por la que desea realizar la buscqueda, seleccione el tipo de categoria y luego haga click en el boton buscar.</p>			
	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	  <label>
	    <span class="fa fa-search" aria-hidden="true"></span>
	    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Buscar …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		<input type="hidden" name="post_type" value="post" />
		<input type="hidden" name="categoria" value="historia" />
	  </label>
	  <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
	</form>
		</div>
	</div>	
</div>