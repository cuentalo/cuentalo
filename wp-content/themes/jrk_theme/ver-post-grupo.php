<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php

		global $post;								

		$id = $post->ID;
		$imagen = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');

		$ruta_imagen = $imagen[0];		

	?>	 	

<?php endwhile; else: ?>

 No hay post

<?php endif; ?>

<div class="portada-post" style="background-image: url(<?php echo($ruta_imagen) ?>)">

</div>

<section>

	<div class="container">

		<div class="row">			

			<article class="col-md-6 py-4">		  	

			  	<div class="noticias-actuales">

					  <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>					  

					  	<h2><?php the_title(); ?></h2>

						<div class="texto-post">										
							
							<div class="img-thumb">
										<?php 
										if ( has_post_thumbnail() ) { 
												the_post_thumbnail( 'full', array( 'class' => 'card-img-top' ) );
										}
									?>
							</div>
							
							<?php the_content(); ?>

							<h4 class="title2-post mt-3">Direccion</h4>
							<div class="more-date card-text"> <?php the_field('Direccion'); ?> 	</div>
							
							<h4 class="title2-post mt-3">Poblacion</h4>
							<div class="more-date card-text"> <?php the_field('Poblacion'); ?> </div>
																					
							<h4 class="title2-post mt-3">Video</h4>
							<div class="more-date card-text">
								<?php $value = get_field("Video"); ?>	
								<iframe width="460" height="315" src="https://www.youtube.com/embed/<?php echo $value; ?>?rel=0&amp;controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>							
							</div>
							
							<h4 class="title2-post mt-3">Etiquetas</h4>
							<div class="categoria-entrada"><i class="fa fa-tags" aria-hidden="true"></i> <?php the_tags( ' ', ' ', '<br />' ); ?> </div>
							<div  id="share">
							  <h4 class="title2-post mt-3">Datos de Contacto</h4>
							  <div class="link-social-group pb-3">

							<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>?"><i class="fa fa-facebook-square"></i></a>
								<a href="http://twitter.com/share?text=&url=<?php the_permalink(); ?>"><i class="fa fa-twitter-square"></i></a>
								<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google"></i></a>

							  </div>
							</div>

							<div class="more-date card-text">

								<p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:<?php the_author_meta('user_email'); ?>"><?php the_author_meta('user_email'); ?></a></p>

								<p><i class="fa fa-globe" aria-hidden="true"></i> <a href="<?php the_author_meta('user_url'); ?>"><?php the_author_meta('user_url'); ?></a></p>

							</div>

							

						</div>

						<div>

							<?php 

							if ( comments_open() || get_comments_number() ) :

								comments_template();

							endif;?>

						</div>

						<?php endwhile; else: ?>							  

					<?php endif; ?>			  		

				 </div>

			</article>
		
			<article class="col-md-6">
				<?php 
					$args = array(
						'category_name' => 'historia',
						'meta_query' => array(array('key' => 'Grupo_historia',
										'value' => $id))
                	);
					//query_posts( $args ); 
					$posts = query_posts( $args );
					$count = count($posts);
				?>

				<h4 class="title2-post mt-3">Historias del Grupo</h4>
									
				<?php if ( have_posts() ) { ?>
					<p> <a href="http://cuentalo.org/?s=&post_type=post&categoria=historia&grupo_historia=<?php echo $id; ?>"><i class="fa fa-history" aria-hidden="true"></i> Ver Historias (<?php echo $count; ?>)</a></p>
					<p> </p>
				
					<?php while ( have_posts() ) : the_post(); ?>

						<h5 class="card-title"><a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>					
						</a></h5>	 	

					<?php endwhile; 
				} else { ?>
	
 					Este grupo aun no tiene Historias
	
				<?php }; ?>

			</article>

		</div>

	</div>

   </section>
<?php get_footer(); ?>