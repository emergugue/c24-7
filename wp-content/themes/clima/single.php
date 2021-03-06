<?php get_header();?>
			
		<div id="content" class=" row-fluid">
		<!--	<div class="clearfix row-fluid" >
				<?php the_breadcrumb() ?>
			</div> -->
			<div class="span3">
				<div>
					<div class="breadcrumbs">
						<?php if(function_exists('bcn_display'))
						{
							bcn_display();
						}
						?>
					</div>
				</div>
				<div>
					<?php get_sidebar(); ?>
				</div>	
				
			</div>	
			<div id="main" class="span9 clearfix articulo-blog" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<?php 
					if( verifyCategory(get_the_category($post->ID) , 'glosario') ) 
					{ 
						header("Location: ".get_bloginfo( 'url' )."/glosario/?id=".$post->ID);
						die();
					}
					else if ( verifyCategory(get_the_category($post->ID) , 'faq') )
					{
						header("Location: ".get_bloginfo( 'url' )."/faq/?id=".$post->ID);
						die();	
					}

					?>

					<?php if( function_exists('countArticle') ){ countArticle( $post->ID,get_the_category() ); } ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix, post-individual'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">			
					<header>
						
						<!-- deje la linea de la imagen destacada por que aja uno no sabe -->
						<!--<div class ="span14"><?php //the_post_thumbnail( 'wpbs-featured' ); ?></div> -->

						<div class="clearfix row-fluid" id="titulo-int-blog">
							<div class="titulo-entrada span10">
								<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
							</div>
						
						<!-- Fecha con el formato deseado -->

							<span class="meta-titulo span2">  <p style="font-size: 45px;margin-top:10px;"><?php echo get_the_date('d'); ?><p>  <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate> <?php the_date('F'); ?>  </span>
						</div>
						<div class="row-fluid aumentar-content">
							<div class="span6">
									<!-- Boton aumentar letra -->
									<p class="aumentar-letra pull-left">TAMAÑO DE LETRA</p>
									<?php if(function_exists('fontResizer_place')) { fontResizer_place(); } ?>
							</div>	
							<div class="span6 text-right imprimir hidden-phone">	
									<!-- Boton imprimir articulo -->
									<?php if(function_exists('wp_print')) { print_link(); } ?>
							</div>	 
						</div>
						<div  style="width:50px;">					
						</div>


					</header> <!-- end article header -->
					<div class="row-fluid">
						<section class="span12 clearfix" itemprop="articleBody">
							
							<!-- Contenido del blog -->
							
							<?php the_content(); ?>
							
							<div class="enviar-por-correo">
								<span class="span6 enviar-correo">
									<?php if(function_exists('email_link')){ email_link(); } ?>
								</span>
							</div>
							<?php if(function_exists('ec_stars_rating')) {
							    ec_stars_rating(); 
							} ?>

							<div class="row-fluid">
								<div class="pagination articulos-antysig">
									<ul class="clearfix">
										<li class="art-anterior span6"><?php previous_post_link('%link', 'Articulo Anterior', TRUE, '2'); ?></li>
										<li class="art-siguiente span6"><?php next_post_link('%link', 'Articulo Siguiente', TRUE, '2'); ?></li>
									<ul>	
								</div>
								<?php //wp_link_pages(); ?>
							</div>
						</section> <!-- end article section -->
					</div>
					<!--<footer>
						<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', '</p>'); ?>							
						<?php 
						// only show edit button if user has permission to edit posts
						if( $user_level > 0 ) { 
						?>
						<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","bonestheme"); ?></a>
						<?php } ?>
						
					</footer> --><!-- end article footer -->
				
				</article> <!-- end article -->
				    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('socialwidget') ) : ?>
					<?php endif; ?>
				   <?php comments_template(); ?>
				<?php //comments_template('',true); ?>
				
				<?php endwhile; ?>			
					
				<?php else : ?>
				
				<article id="post-not-found">
				    <header>
				    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
				    </header>
				    <section class="post_content">
				    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
				    </section>
				    <footer>
				    </footer>
				</article>
				
				<?php endif; ?>

			</div> <!-- end #main -->
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
		            <?php endif; ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
