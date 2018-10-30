<?php get_header(); ?>

<section>
	<h2>Resultado de la Busqueda</h2>		
	<p><strong><?php echo get_search_query() ?></strong></p>
	<div class="noticias-actuales">
			  		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?> 
						<div class="texto-post">
							<ol>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<span><?php the_excerpt(); ?></span></li>
							</ol>
							
						</div>
						<?php endwhile; else: ?>							  
					<?php endif; ?>			  		
	</div>

</section>

<?php get_footer(); ?>
