<?php
/*
Template Name: Glosario
*/
?>
<?php 

get_header();
$id_glosario           = ( !empty($_GET['id']) ) ? $_GET['id'] : 0;
$id_glosario           = cleanInt($glosario);
$typeCollapse          = '';

 ?>
    <div id="content" class="clearfix row-fluid">
        <div id="main" class="span12 clearfix">
      <div id="main-content" class="span8">
          <section class="post_content">
            <div class="row-fluid clearfix">
             <div class="span12">
              <header>
              <div class="page-header"><h1>GLOSARIO</h1></div>
              </header>
            </div>
           </div>
           <?php
            $args = array('cat'=>'49', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => '-1' ); 
            $query = new WP_Query( $args );

            if ($query->have_posts()) :
              while ($query->have_posts() ) : $query->the_post();


              if ($id_glosario == $post->ID )
              {
              $typeCollapse = 'in';
              }
              else
              {
              $typeCollapse  = '';
              }

              $url_glosario = get_bloginfo( 'url' ).'/glosario/?id='.$post->ID;


            ?>
           <div class="panel-group" id="accordion">
            <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $post->ID ?>" >
                <?php echo ucwords(the_title('','',false)); ?>
              </a>
              </h4>
            </div>
            <div id="collapse-<?php echo $post->ID ?>" class="panel-collapse collapse <?php echo $typeCollapse ?>">
              <div class="panel-body">
              <?php echo get_the_content(); ?>
              <div id="share">
                <span class="social-button">
                 <!-- <span class="facebook">
                    <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php echo get_permalink(); ?>&amp;p[title]=<?php echo ucwords(the_title('','',false)); ?>&amp;p[summary]=<?php echo substr(strip_tags (get_the_content()), 0, 200) ?>">
                      Facebook
                    </a> -->
                  </span>
                  <div class="fb-share-button" data-href="<?php echo get_permalink() ?>" data-width="500" data-type="button"></div>
                </span>
                <span class="social-button">
                  <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url_glosario ?>" 
                  data-text="<?php echo the_title('','',false); ?> | GLOSARIO"   data-via="Clima24_7" data-count="none">Tweet</a>
                </span>
               </div>   
              </div>
            </div>
            </div>
          </div>

         <?php
         endwhile;
         else : ;
         ?>
        <div id="content" class="clearfix row-fluid">
          <div class="page-header">
             <h1>No hay preguntas disponibles.</h1>
          </div>  
        </div>

      <?php       
      endif;
      ?>
        </section>
      </div>
        <div id="slidebar-der" class="span4">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('slidebar_derecha') ) : ?>
          <?php endif; ?>
        </div> 
        </div>
 
    </div>      
<?php get_footer(); ?>  
