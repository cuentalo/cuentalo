<?php get_header(); ?>
<section class="home-contenido">
    <div class="slider">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block img-silder" src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h2>Grupo de Danza Caribe</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis aliquam tempora possimus doloremque voluptatem placeat velit exercitationem doloribus? Qui quasi nemo quas natus odio provident repellat tempore expedita totam hic?</p>
                <button type="button" class="btn btn-outline-warning">VER HISTORIA</button>
              </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</div>  
</section>
<section class="time-line py-5">
  <div class="container">
      <h2 class="title-h2 line-title pb-2">Actividad Reciente</h2>
      <div class="item-tl my-4 p-3">
          <article>       
              <div class="noticias-actuales">
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
      </div>
  </div>
 
</section>


<?php get_footer(); ?>
