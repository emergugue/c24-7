<?php
  setlocale(LC_ALL, 'es_ES.UTF8');
  class WidgetPronostico extends WP_Widget 
   {
  
	  private $hoy;
	  private $manana;
	  public  $ciudades;
  
	  function WidgetPronostico()
	  {
		  $this->hoy 		= strtotime(date('Y-m-d'));
		  $this->manana 	= strtotime(date('Y-m-d').' +1 day');
		  $this->ciudades 	= unserialize(C247_CIUDADES);
		  $this->meses 		= unserialize(C247_MESES);

		  parent::__construct( false, 'Pronóstico', array('description'=>'Este widget contiene los pronosticos hoy y mañana.'));
	  }
  
	  function widget( $args, $instance )
	  {
		  $this->mostrarPronostico($args, $instance);
	  }
  
	  function update( $new_instance, $old_instance )
	  {
		  return $new_instance;
	  }
 
	  function mostrarPronostico($args, $instance)
	  {
		  extract($args);																					
		  /* Se muestra el título del widget */
		  echo $before_widget;
?>
<div id="widget-pronostico">
	  <div class="controles">
	<!--    <ul class="menuControles">
	      <li><a href="#pronosticos" id="btnMostrarPronostico">Pronóstico</a></li>
	    </ul> -->
  	</div>
	  <div id="pronosticos" class="carousel slide"> 
	    <!-- Carousel items -->
	    <div id="ciudades" class="carousel-inner">

	    <?php $i=1;

		foreach($this->ciudades as $key => $ciudad):?>

	    <div class="<?php if($i) echo 'active';$i=0?> item">
	        <h2>Pronóstico de <?php echo $ciudad ?></h2>
		        <div class="row-fluid">
		          <div class="span7">
	    	        <div class="row-fluid clearfix">
	        	      <div class="span12"> <span class="dia">Hoy</span> <span class="mes"><?php echo $this->meses[date('n')]; ?> </span> <span class="dias"><?php echo strftime("%d", $this->hoy); ?> </span> </div>
	              <div class="span12 lluvias"> <span class="titulo2">Pronóstico Lluvia</span>
	                <div class="row-fluid">
	               	  <div class="span3">
	                    
	                      <div class="pronostico-item">Madrugada</div>
	                      <div class="numMax"><?php echo porcentajeEquivalente( get_option('LluvMad'.$key) )."%"; ?></div>
	                      <div class="numMax"><?php echo get_option('LluvMad'.$key) ?></div>
	                    
	                  </div>

	                  <div class="span3">
	                    
	                      <div class="pronostico-item">Mañana</div>
	                      <div class="numMax"><?php echo porcentajeEquivalente( get_option('LluvMan'.$key) )."%"; ?></div>
	                      <div class="numMax"><?php echo get_option('LluvMan'.$key) ?></div>
	                  </div>
	                  <div class="span3">
	                    
	                      <div class="pronostico-item">Tarde</div>
	                      <div class="numMax"><?php echo porcentajeEquivalente( get_option('LluvTar'.$key) )."%"; ?></div>
	                      <div class="numMax"><?php echo get_option('LluvTar'.$key) ?></div>
	                    
	                  </div>
	                  <div class="span3">
	                    
	                      <div class="pronostico-item">Noche</div>
	                      <div class="numMax"><?php echo porcentajeEquivalente( get_option('LluvNoc'.$key) )."%"; ?></div>
	                      <div class="numMax"><?php echo get_option('LluvNoc'.$key) ?></div>
	                    
	                  </div>
	                </div>
	              </div>
	            </div>

	            <div class="row-fluid">
	              <div class="span12 temp"> <span class="titulo2">Pronóstico Temperatura</span>
	                <div class="row-fluid">
	                  <div class="span6">
	                  	<div class="row-fluid">
		                    <div class="span8 tempMaxgrados">Máxima</div>
		                    <div class="span4 numMaxgrados"> <?php echo get_option('tempMax'.$key); ?>° </div>
		                </div>
	                  </div>
	                  <div class="span6">
	                  	<div class="row-fluid">
	                    	<div class="span8 tempMingrados">Mínima</div>
	                    	<div class="span4 numMingrados"><?php echo get_option('tempMin'.$key) ?>° </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
	          <div class="span5 mapa-ciudades">
	          	<figure>
	          		<img src=<?php echo bloginfo('wpurl')."/wp-content/uploads/mapas/mapa_".ucfirst($key).".png"  ?> />   
	          	</figure> 
	          </div>
	        </div>
	      </div>
	    <?php endforeach?>
	    </div>
	    <ol class="ciudades">
	    	<?php
	    			$i = 0;
	    			foreach($this->ciudades as $value ) 
	    			{
	    				if($i == 0)
	    				{
	    					echo '<li data-target="#pronosticos" data-slide-to="'.$i.'" class="active">'.$value.'</li>';			
	    				}
	    				else
	    				{
	    					echo '<li data-target="#pronosticos" data-slide-to="'.$i.'" >'.$value.'</li>';				
	    				}
	    			
	    				$i = $i + 1;
	    			}
	    	?>	      

	    </ol>
	  </div>
	</div>  
<?php
	echo $after_widget;
	}
}	  