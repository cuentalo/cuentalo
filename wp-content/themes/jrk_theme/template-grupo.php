<?php
/*
Template Name: Grupos
*/
?>
<?php get_header(); ?>
<div class="portada foto-portada-grup">
	<div class="container">
		<div class="portada-content">
			<h2>Catálogo de Grupos</h2>
			<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque illo vel harum assumenda laborum nemo ullam et suscipit adipisci. Velit harum nesciunt quos deserunt consectetur animi cum distinctio quo sapiente?</p>			
			<?php if ( !is_search() ) {	get_search_form(); } ?>
			<div class="menu-grupo py-2">				
				<a href="http://cuentalo.org/registrar-grupo/"><i class="fa fa-plus" aria-hidden="true"></i> Registrar grupo</a>
				<a href="http://cuentalo.org/historias/"><i class="fa fa-history" aria-hidden="true"></i> Historias</a>
				<a href="#"><i class="fa fa-map" aria-hidden="true"></i> Mapa</a>				
								
			</div>
		</div>
	</div>
	
</div>

<section class="bg-dark2">
		<div class="container">
			<div class="row pb-5">				
			<?php 
				//global $wp_query;    
   				//$args = array_merge( $wp_query->query, 'category_name=grupo');  
   				//query_posts( $args );
				query_posts('category_name=grupo'); ?>
			<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
						<div class="col-md-4">
							<div class="card mt-5" style="width: 100%;">
								<div class="img-thumb">
										<?php 
										if ( has_post_thumbnail() ) { 
												the_post_thumbnail( 'full', array( 'class' => 'card-img-top' ) );
										}
									?>
								</div>
								
								<div class="card-body">
									<h5 class="card-title"><a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a></h5>
									<p class="card-text"><?php the_excerpt(); ?></p>
									
									  <?php
	  									$edit_page = (int) wpuf_get_option( 'edit_page_id', 'wpuf_frontend_posting' );
    	                        		$url = add_query_arg( array('pid' => $post->ID), get_permalink( $edit_page ) );
	    	                          ?>
    	    	                      <a href="<?php echo wp_nonce_url( $url, 'wpuf_edit' ); ?>"><?php _e( 'Edit', 'wpuf' ); ?></a> 
        	                        
									<p class="card-text"><?php $post->post_status; ?> </p>
									
									<div class="link-social-group pb-3">
										<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>?"><i class="fa fa-facebook-square"></i></a>
										<a href="http://twitter.com/share?text=&url=<?php the_permalink(); ?>"><i class="fa fa-twitter-square"></i></a>
										<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google"></i></a>

								    </div>										
										
								
									<div class="more-date card-text">
										<p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:<?php the_author_meta('user_email'); ?>"><?php the_author_meta('user_email'); ?></a></p>
										<p><i class="fa fa-globe" aria-hidden="true"></i> <a href="<?php the_author_meta('user_url'); ?>"><?php the_author_meta('user_url'); ?></a></p>
									</div>
										
									<a href="<?php the_permalink(); ?>#share" class="card-link">Compartir</a>
									<a href="#" class="card-link">Like</a>
									<a href="<?php the_permalink(); ?>#comments" class="card-link">Comentarios</a>
								</div>
							</div>
						</div>
				<?php endwhile; else: ?>                
				<?php endif; ?>
			</div>
		</div>	
	</section>

<?php get_footer(); ?>