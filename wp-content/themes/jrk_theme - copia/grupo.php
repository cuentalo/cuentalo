<?php

get_header(); ?>

<section>
	<div class="container">
		<div class="row">			
			<article class="col-md-12 py-4">		  	
			  	<div class="noticias-actuales">
					  <h2>Grupos Publicos</h2>
			  		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?> 
						<h2><?php the_title(); ?></h2>
						<small>Publicado el <?php the_time('j/m/Y') ?></small>
						<div class="texto-post">
							<?php
								if ( has_post_thumbnail() ) { 
									the_post_thumbnail( 'full', array( 'class' => 'alignleft img-responsive' ) );
									}
							?>
							<?php the_content(); ?>
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
