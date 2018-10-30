<?php get_header(); ?>
<section id="slider" class="slider-home pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="slider-content">
                     <h1>Social Justice Repair Kit</h1>
                     <p>Contando el valor de la diversidad!</p>                     
                </div>
				 
				<div class="buscar-home">
                    <form action="<?php echo esc_url( home_url() ); ?>" method="GET" role="search">
                        <h2 class="buscar-title"><label for="s">Encuentra Historias, Grupos</label></h2>						
                        <fieldset class="buscar-content">
                            <div class="buscar-boder-caja clearfix row">
								<div class="col-md-10">									
									<input class="buscar-caja float-left" name="s" id="s" type="text" placeholder="¿Que estas buscando?" value="<?php echo get_search_query(); ?>">
								</div>																							
                                <div class="col-md-2">
                                    <input type="hidden" name="post_type" value="post" />
                                    <input type="submit" value=" Buscar " class="buscar-boton btn btn-warning"/>
                                </div>                                                             
                            </div>				
                        </fieldset>
                    </form>
                </div>
				
            </div>

        </div>
    </div>  
</section>

<section class="time-line py-5" id="b">
  <div class="container">
      <h2 class="title-h2 line-title pb-2 mt-5">Actividad Reciente</h2>
      <div class="item-tl my-4 p-3">
          <article>       
              <div class="noticias-actuales">
               <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                <div class="row bg-items py-4 px-3 mb-5">
                  <div class="col-md-6">
                      <div class="img-thumb">
                          <?php 
                              if ( has_post_thumbnail() ) { 
                                          the_post_thumbnail( 'full', array( 'class' => 'w-100 h-100') );
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
                          <div class="categoria-entrada"><em class="fa fa-tags" aria-hidden="true"></em> <?php the_tags( ' ', ' ', '<br />' ); ?> </div>
                          <div class="line-title my-4"></div>
                          <div class="more-date">
                            <h3 class="pb-2">Información de contacto</h3>
                              <p><em class="fa fa-envelope" aria-hidden="true"></em> <a href="mailto:<?php the_author_meta('user_email'); ?>"><?php the_author_meta('user_email'); ?></a></p>
                              <p><em class="fa fa-globe" aria-hidden="true"></em> <a href="<?php the_author_meta('user_url'); ?>"><?php the_author_meta('user_url'); ?></a></p>
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
