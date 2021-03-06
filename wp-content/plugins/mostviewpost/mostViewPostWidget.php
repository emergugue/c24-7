<?php
  setlocale(LC_ALL, 'es_ES.UTF8');
  class mostViewPostWidget extends WP_Widget 
   {

	  function mostViewPostWidget()
	  {
		  parent::__construct( false, 'Most View Post widget', array('description'=>'Este widget los artículos mas vistos, primero configure la categoría sobre la cual desea hacer el conteo mediante el pluggin.'));
	  }
  
	  function widget( $args, $instance )
	  {
		  $this->mostrarArticulos($args, $instance);
	  }
  
	  function update( $new_instance, $old_instance )
	  {
		  return $new_instance;
	  }

	 function form( $instance ) {
	?>
		<!--	<div>
				<h1>sizas</h1>
			</div> -->
	<?php 

	}
 
function mostrarArticulos($args, $instance)
 {

extract($args);																					
/* Se muestra el título del widget */
echo $before_widget;

$optionPost = get_option( 'optionPost' );
$num_per = get_option('option_num');
$optionPost = ( !empty($optionPost) ) ? $optionPost : 1;
$num_per = ( !empty($num_per) ) ? $num_per : 1;

$post_array = array();

?>
<div class="enc-widget-view">
<h2>Más vistos</h2>
</div>

<?php
$args = array('cat'=>$optionPost, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => '-1' );
$the_query = new WP_Query($args); 


if ($the_query->have_posts())
{

while ($the_query->have_posts() ) : $the_query->the_post(); 

  if(in_category($optionPost)) :

      $categoria    = get_the_category();
      $categoria    = ( !empty($categoria[1]->name) ) ? $categoria[1]->name : $categoria[0]->name ;

      $post_thumbnail_id   = get_post_thumbnail_id(get_the_ID(), 'full');
      $post_thumbnail_url  = (!empty($post_thumbnail_id)) ? wp_get_attachment_url( $post_thumbnail_id ) : get_template_directory_uri().'/images/dummie-post.png';

      $contenuto = get_the_content();

      $coutPost = get_post_meta( get_the_ID(), 'count_view', true);


  if( !empty( $optionPost ) )
	{
	   $post_array['count'][] = $coutPost;

	   $post_array['post'][] = '<article id="most-'.get_the_ID().'" class="most-widget" >'.
	    	  						'<a href="'.get_permalink( get_the_ID() ).'" >'.
	      							'<figure> <img src="'.$post_thumbnail_url.'" alt="'.the_title('','',false).'" class="thumb" /></figure>'.
	      							'<div class="contenido">'.
		      						'<span class="categorias">'.strtolower($categoria).'</span>'.
		      						'<h1>'.the_title('','',false).'</h1>'.
		      						'<time datetime="'.get_the_time('Y-m-j').'" pubdate>'.get_the_time('j').' de '.get_the_time('F').' del '.get_the_time('Y').'</time>'.
	      							'</div></a></article>';
     }
        endif;
endwhile;
}

//ordenar por votos
if( count($post_array) > 0)
{
	array_multisort($post_array['count'], SORT_DESC,$post_array['post']);
}

for($i=0; $i < $num_per; $i++)
{
	echo $post_array['post'][$i];
}

  echo $after_widget;
}




}	  
