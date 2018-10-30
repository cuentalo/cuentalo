<?php
/*
Template Name: Historia
*/
?>
<?php

get_header(); ?>
<div class="portada-grupo p-4">
	<div class="container">
		<h2>Catálogo de Historia</h2>
		<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque illo vel harum assumenda laborum nemo ullam et suscipit adipisci. Velit harum nesciunt quos deserunt consectetur animi cum distinctio quo sapiente?</p>
		<div class="menu-grupo py-2">
			<a href="#"><i class="fa fa-plus" aria-hidden="true"></i> Registrar Historia</a>
			<a href="#"><i class="fa fa-map" aria-hidden="true"></i> Mapa</a>
			<a href="#"><i class="fa fa-search" aria-hidden="true"></i> Buscar</a>
		</div>
	</div>
	
</div>

<section class="container">
		<section class="row">
				<article>       
						<div class="noticias-actuales py-4">
						  <?php query_posts('category_name=historia'); ?>
						  <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
						  <div class="row bg-items py-4 px-3 mb-5">
							<div class="col-md-6">
								<div class="img-thumb">
									<?php 
										if ( has_post_thumbnail() ) { 
													the_post_thumbnail( 'full', array( 'class' => 'w-100' ) );
												   }
									 ?>
									 <div class="type-item">
										<?php the_category() ?>
									 </div>  
								</div>
							</div>
							<div class="col-md-6">
								<div class="new-home">                          
									<div class="titulo-entrada"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
									<div class="texto-post"><?php the_excerpt(); ?></div>
									<div class="categoria-entrada"><i class="fa fa-tags" aria-hidden="true"></i> <?php the_tags( ' ', ' ', '<br />' ); ?> </div>
									<div class="line-title my-4"></div>
									<div class="more-date">
									  <h3 class="pb-2">Información de contacto</h3>
										<p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:<?php the_author_meta('user_email'); ?>"><?php the_author_meta('user_email'); ?></a></p>
										<p><i class="fa fa-globe" aria-hidden="true"></i> <a href="<?php the_author_meta('user_url'); ?>"><?php the_author_meta('user_url'); ?></a></p>
									  </div>
									  <div>
										  
									  </div>
									<div>
									  <a href="<?php the_permalink(); ?>" class="btn-more">ver mas &#8594</a>
									</div>
								</div>
							</div>
						  </div> 
						  
						  <?php endwhile; else: ?>                
						<?php endif; ?>           
					   </div>
					</article>
	    </section>
</section>

<?php get_footer(); ?>
