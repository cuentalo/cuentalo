<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php
		global $post;								
		$imagen = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		$ruta_imagen = $imagen[0];	
//<div class="portada-post" style="background-image: url(<?php echo($ruta_imagen) ?>)">
	?>	 	
<?php endwhile; else: ?>
 No hay post
<?php endif; ?>
<div class="portada foto-portada-history">
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
							
							<h4 class="title2-post mt-3">Etiquetas</h4>
							<div class="categoria-entrada"><i class="fa fa-tags" aria-hidden="true"></i> <?php the_tags( ' ', ' ', '<br />' ); ?> </div>													
							<h4 class="title2-post mt-3">Protagonistas</h4>
							<div class="more-date card-text"> <?php the_field('Protagonistas'); ?> 	</div>
							
							<h4 class="title2-post mt-3">Narativa digital</h4>
							<div class="more-date card-text"> <?php the_field('Narrativa'); ?> 	</div>								
							<h4 class="title2-post mt-3">Video</h4>
							<div class="more-date card-text">
								<?php $value = get_field("Video"); ?>	
								<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $value; ?>?rel=0&amp;controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>							
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
		</div>
	</div>
   </section>

<?php get_footer(); ?>
