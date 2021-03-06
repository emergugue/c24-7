<?php
/*
Template Name: Clima en Vivo
*/
$hoy = strtotime(date('Y-m-d'));
$manana = strtotime(date('Y-m-d').' +1 day');   
?>
<?php get_header(); ?>

<div id="content" class="clearfix row-fluid">
  <div id="main" class="span12 clearfix" role="main">
    <?php if(function_exists('cargarCsvNiveles')) { cargarCsvNiveles(); } ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
      <header>
       <div class="page-header">
         <h1>
           <?php the_title(); ?>
         </h1>
       </div>
     </header>
     <!-- end article header -->
     
     <section id="clima-vivo" class="post_content">
      <div class="row-fluid clearfix">
        <div class="span3"> 
          <!-- menu Clima en vivo -->

          <div id="clima-vivo" class="menu-clima">
           <ul>
             <li class="item-clima"><a id="btnMostrarRadarMeteorologico" class="radar menu-activo" href="#radar-meterologico">Radar Meteorológico</a></li>
             <li class="item-clima"><a id="btnMostrarPronosticoTemperatura" class="pronostico" href="#pronostico">Pronóstico - Temperatura actual, máxima y mínima</a></li>
             <li class="item-clima"><a id="btnMostrarVistaVivo" class="siata" href="#vista-vivo">Vista en vivo del SIATA</a></li>
             <li class="item-clima"><a id="btnMostrarSensores" class="temperatura" href="#sensores">Red de sensores de nivel de quebradas</a></li>
             <li class="item-clima"><a id="btnMostrarTemperaturaActual" class="sensores" href="#temperatura-actual">Temperatura Actual</a></li>
           </ul>
         </div>
         <!-- suscripciones -->
         <?php //get_sidebar();  ?>

         <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('widget_gallery') ) : ?>
         <?php endif; ?>
         <div class="widget_mailchimpsf_widget" >
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('suscrib') ) : ?>
            <?php endif; ?>
         </div>

     </div>

     <div class="span9">

      <div id="radar-meterologico" class="container-function-1">
       <?php viewConvenciones("<p>Un radar meteorológico permite conocer los sectores donde ocurren o han ocurrido precipitaciones en las últimas horas. En este caso, el radar presenta imágenes de las últimas 6 horas y la imagen actual.<p>
       <p><strong> ¿Cómo funciona?</strong> Un radar es un sensor remoto, que emite una señal de microondas que llega hasta las nubes y se refleja en las gotas de agua. La cantidad y el tamaño de las gotas de agua presentes  en las nubes se registra en la imagen y se denomina “reflectividad”. El radar meteorológico, ubicado en Santa  Elena, que sirve para el monitoreo del Valle de Aburrá, permite conocer la localización y movimiento de las lluvias, el lugar y hora  donde ocurren en la subregión.</p><p> <strong> ¿Cómo interpretar los colores de la imagen del radar?</strong> En la escala de colores, el azul y verde  representan baja reflectividad, lo que se interpreta como baja intensidad de  precipitaciones. Los colores cálidos, como el amarillo, naranja y rojo indican lluvias de  moderada a alta intensidad. El magenta indica lluvias muy intensas, que incluso pueden traer  granizo.</p>"); ?>
     <!-- <div id="contenedor-radar" class="fondo-contenido-1">
        <div id="mapa" style="width: 721px; height: 638px"></div>
      </div> --> 
        <div id="contenedor-radar">
          <img src="http://alpha.telemedellin.tv/clima24-7/paginaweb/radaranimado.gif" />
        </div>
         
      <div>
        <span ><strong>Datos SIATA</strong></span>
      </div>
    </div>

    <div id="pronostico" style="display:none" class="container-function-1">
      <?php viewConvenciones("<p>Pronóstico del estado del tiempo que presenta el SIATA, en términos de probabilidad de  que se presenten precipitaciones, para los municipios del Valle de Aburrá.</p><p>  Esta información se actualiza permanentemente con ayuda de las redes de  monitoreo en tiempo real.</p><p> <strong> ¿Cómo interpretar la probabilidad de lluvias?</strong> </br>Probabilidad baja de lluvias: Inferior al 30% de  que ocurran precipitaciones.  </br>Probabilidad media de lluvias: 40% a 60% de  probabilidad de que ocurran precipitaciones.  </br>Probabilidad alta de lluvias: Probabilidad  mayor al 60% de que ocurran precipitaciones.</p>"); ?>
      <div id="pronosticos" class="carousel slide"> 
        <!-- Carousel items -->
        <!-- para mas info consulte a functions.php -->
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('pronostico-widget') ) : ?>
      <?php endif; ?>
    </div>
  </div>
  <div id="vista-vivo" style="display:none">
    <?php ini_set('display_errors', 1); ?>
    <?php $display = ''; ?>
    <?php $i = 1; ?>

    <?php while ( get_option( 'cam'.$i ) != "" ) : ?>

      <div id="vivo-camara<?php echo $i ?>" class="container-vivo" style="<?php echo $display ?>">
        <?php viewConvenciones("<p>La vista en vivo de las cámaras ubicadas desde la torre SIATA y el Radar ubicado en Santa Elena permiten apreciar la formación y  el desplazamiento de las nubes en gran parte  de los sectores del Valle de Aburrá.</p><p> Desde la Torre SIATA, ubicada en el sector  Estadio Atanasio Girardot, se aprecia la  vista hacia el oriente, suroriente, nororiente, noroccidente y occidente de algunos  municipios del Valle de Aburrá. Y gracias a las cámaras ubicadas en el Radar  en Santa Elena se observa la vista de los  sectores Noroccidente y Suroccidente de  Medellín.</p>"); ?>
        <div class="img-vivo"> <img src="<?php echo get_option( 'cam'.$i ) ?>"/> 
        </div>
        <div class="description">
          <h4><?php echo get_option( 'text_cam'.$i ) ?></h4>
        </div>
      </div>

      <?php $display = 'display:none;'; ?>
      <?php $i ++; ?>

    <?php endwhile; ?>

  <div id="controles-vivo">
      <ul>
        <?php $i = 1; ?>
        <?php while ( get_option( 'cam'.$i ) != "" ) : ?>

          <li>
             <a id="btnMostrarCam<?php echo $i ?>" href="vivo-camara<?php echo $i ?>" class="thumb-camara">
              <img src="<?php echo get_option( 'cam'.$i ) ?>" alt="<?php echo get_option( 'text_cam'.$i ) ?>" />
              <p><?php echo get_option( 'text_cam'.$i ); ?></p>
            </a>
          </li>
          <?php $i ++; ?>

        <?php endwhile; ?>
      </ul>
  </div> 

</div>
   
    <div id="sensores" style="display:none" class="container-function-1">
      <?php viewConvenciones("<p>El monitoreo de los ríos y quebradas en el Valle de Aburrá se realiza gracias a las estaciones de nivel del SIATA.</p><p> A través de  esta herramienta se puede conocer cuál es el nivel y porcentaje de la canalización que está siendo ocupada por agua. La canalización es la parte que se encuentra en cemento y representa el 100 % de  capacidad en zonas canalizadas.</p><p>  Se recomienda la observación y vigilancia por parte de los habitantes que habitan los sectores cercanos a las estaciones de las quebradas en monitoreo y avisar oportunamente a las autoridades en la línea  de emergencia 123, cualquier obstrucción en el cauce o eventualidad en el nivel de las quebradas.</p>"); ?>
      <?php $cuencasList = getCuencas(); ?>
      
      <div id="cont-sensores">

        <div id="body-cuenca"  class="span7">
          <div id="body-fill">
            <img  id="cuenca-sup" src="<?php echo bloginfo('wpurl').'/wp-content/themes/clima/images/sup.png' ?>" />
          </div>
          <div id="body-cuenca-img">
            <img  id="cuenca-inf" src="<?php echo bloginfo('wpurl').'/wp-content/themes/clima/images/fill.png' ?>" />
          </div>
          <div id="body-cuenca-izq"></div>
          <div id="body-cuenca-der"></div>
        </div>
        
        <div id="cuenca-info" class="span5">
          <div id="cuenca-info-inf" class="form-horizontal">
            <div id="cuenca-info-s"class="control-group">
              <select id="s_cuenca" placeholder="Seleccione Quebrada">
                <?php echo $cuencasList ?>
              </select>
            </div>
            <div id="cuenca-info-sup" class="control-group">

            </div>
            <div id="cuenca-info-photo" class="control-group">

            </div>
          </div>
        </div>
      <div>
        <span><strong>Datos SIATA</strong></span>
      </div>

    </div>
  </div>
  
    <div id="temperatura-actual" style="display:none" class="container-function-1"> 
      <?php viewConvenciones("Registro actual de los valores de temperatura de las estaciones meteorológicas del SIATA, ubicadas en diferentes sectores de los municipios del Valle de Aburrá."); ?>
      <div id="temperatura" >
		  	<?php		
		  //	$url = 'http://alpha.telemedellin.tv/clima24-7/paginaweb/tempamva.jpg';
		  	 $url = get_option('temperatura');
			if( ! verificar($url) )
			{
				$url = get_bloginfo('wpurl').'/wp-content/themes/clima/images/broken.png';
			}
			
		  ?>
        <img src="<?php echo $url; ?>" />
      </div> 
    </div>

</div>
<?php //the_content(); ?>
</section>
<!-- end article section -->
<!-- end article footer --> 

</article>
<!-- end article -->

<?php //comments_template(); ?>
<?php endwhile; ?>
<?php else : ?>
  <article id="post-not-found">
    <header>
      <h1>
        <?php _e("Not Found", "bonestheme"); ?>
      </h1>
    </header>
    <section class="post_content">
      <p>
        <?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?>
      </p>
    </section>
  </article>
<?php endif; ?>
</div>
<!-- end #main -->
</div>
<!-- end #content -->

<?php get_footer(); ?>
