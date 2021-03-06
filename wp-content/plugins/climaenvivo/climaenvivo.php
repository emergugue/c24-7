<?php 
/*
Plugin Name: Clima en Vivo
Plugin URI http://www.telemedellin.tv
Description: Este plugin permite almacenar los datos que muestran el pronóstico, radar, temperatura, vistas en vivo y la red de sensores
Version: 0.5
Author: Belmar Santanilla Gutiérrez
Author URI: belmar.santanilla@telemedellin.tv
License: GNU Public (GPL2)
*/
/*  Copyright 2013 BELMAR SANTANILLA GUTIÉRREZ  (email : belmar.santanilla@telemedellin.tv)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
setlocale(LC_ALL, 'es_ES.UTF8');
 
add_action("admin_menu", "menu_clima_vivo");

function menu_clima_vivo(){
	add_menu_page("Configuración Clima en Vivo", "Clima en Vivo", 10, "climaenvivo", "pagina_configuracion", plugins_url( 'climaenvivo/img/ico.png' ));
	add_action( 'admin_init', 'registrar_opciones' );
}

function registrar_opciones() {
	//register our settings
	register_setting( 'climaenvivo-opciones', 'tempMaxMedellin' );
	register_setting( 'climaenvivo-opciones', 'tempMinMedellin' );
	register_setting( 'climaenvivo-opciones', 'LluvMadMedellin' );
	register_setting( 'climaenvivo-opciones', 'LluvManMedellin' );
	register_setting( 'climaenvivo-opciones', 'LluvTarMedellin' );
	register_setting( 'climaenvivo-opciones', 'LluvNocMedellin' );
	register_setting( 'climaenvivo-opciones', 'tempMaxMedellinOcc' );
	register_setting( 'climaenvivo-opciones', 'tempMinMedellinOcc' );
	register_setting( 'climaenvivo-opciones', 'LluvMadMedellinOcc' );
	register_setting( 'climaenvivo-opciones', 'LluvManMedellinOcc' );
	register_setting( 'climaenvivo-opciones', 'LluvTarMedellinOcc' );
	register_setting( 'climaenvivo-opciones', 'LluvNocMedellinOcc' );	
	register_setting( 'climaenvivo-opciones', 'tempMaxMedellinOr' );
	register_setting( 'climaenvivo-opciones', 'tempMinMedellinOr' );
	register_setting( 'climaenvivo-opciones', 'LluvMadMedellinOr' );
	register_setting( 'climaenvivo-opciones', 'LluvManMedellinOr' );
	register_setting( 'climaenvivo-opciones', 'LluvTarMedellinOr' );
	register_setting( 'climaenvivo-opciones', 'LluvNocMedellinOr' );		
	register_setting( 'climaenvivo-opciones', 'tempMaxBarbosa' );
	register_setting( 'climaenvivo-opciones', 'tempMinBarbosa' );
	register_setting( 'climaenvivo-opciones', 'LluvMadBarbosa' );
	register_setting( 'climaenvivo-opciones', 'LluvManBarbosa' );
	register_setting( 'climaenvivo-opciones', 'LluvTarBarbosa' );
	register_setting( 'climaenvivo-opciones', 'LluvNocBarbosa' );	
	register_setting( 'climaenvivo-opciones', 'tempMaxGirardota' );
	register_setting( 'climaenvivo-opciones', 'tempMinGirardota' );
	register_setting( 'climaenvivo-opciones', 'LluvMadGirardota' );
	register_setting( 'climaenvivo-opciones', 'LluvManGirardota' );
	register_setting( 'climaenvivo-opciones', 'LluvTarGirardota' );
	register_setting( 'climaenvivo-opciones', 'LluvNocGirardota' );	
	register_setting( 'climaenvivo-opciones', 'tempMaxCopacabana' );
	register_setting( 'climaenvivo-opciones', 'tempMinCopacabana' );
	register_setting( 'climaenvivo-opciones', 'LluvMadCopacabana' );
	register_setting( 'climaenvivo-opciones', 'LluvManCopacabana' );
	register_setting( 'climaenvivo-opciones', 'LluvTarCopacabana' );
	register_setting( 'climaenvivo-opciones', 'LluvNocCopacabana' );	
	register_setting( 'climaenvivo-opciones', 'tempMaxBello' );
	register_setting( 'climaenvivo-opciones', 'tempMinBello' );
	register_setting( 'climaenvivo-opciones', 'LluvMadBello' );
	register_setting( 'climaenvivo-opciones', 'LluvManBello' );
	register_setting( 'climaenvivo-opciones', 'LluvTarBello' );
	register_setting( 'climaenvivo-opciones', 'LluvNocBello' );
	register_setting( 'climaenvivo-opciones', 'tempMaxEnvigado' );
	register_setting( 'climaenvivo-opciones', 'tempMinEnvigado' );
	register_setting( 'climaenvivo-opciones', 'LluvMadEnvigado' );
	register_setting( 'climaenvivo-opciones', 'LluvManEnvigado' );
	register_setting( 'climaenvivo-opciones', 'LluvTarEnvigado' );
	register_setting( 'climaenvivo-opciones', 'LluvNocEnvigado' );
	register_setting( 'climaenvivo-opciones', 'tempMaxSabaneta' );
	register_setting( 'climaenvivo-opciones', 'tempMinSabaneta' );
	register_setting( 'climaenvivo-opciones', 'LluvMadSabaneta' );
	register_setting( 'climaenvivo-opciones', 'LluvManSabaneta' );
	register_setting( 'climaenvivo-opciones', 'LluvTarSabaneta' );
	register_setting( 'climaenvivo-opciones', 'LluvNocSabaneta' );
	register_setting( 'climaenvivo-opciones', 'tempMaxLaEstrella' );
	register_setting( 'climaenvivo-opciones', 'tempMinLaEstrella' );
	register_setting( 'climaenvivo-opciones', 'LluvMadLaEstrella' );
	register_setting( 'climaenvivo-opciones', 'LluvManLaEstrella' );
	register_setting( 'climaenvivo-opciones', 'LluvTarLaEstrella' );
	register_setting( 'climaenvivo-opciones', 'LluvNocLaEstrella' );
	register_setting( 'climaenvivo-opciones', 'tempMaxItagui' );
	register_setting( 'climaenvivo-opciones', 'tempMinItagui' );
	register_setting( 'climaenvivo-opciones', 'LluvMadItagui' );
	register_setting( 'climaenvivo-opciones', 'LluvManItagui' );
	register_setting( 'climaenvivo-opciones', 'LluvTarItagui' );
	register_setting( 'climaenvivo-opciones', 'LluvNocItagui' );
	register_setting( 'climaenvivo-opciones', 'tempMaxCaldas' );
	register_setting( 'climaenvivo-opciones', 'tempMinCaldas' );
	register_setting( 'climaenvivo-opciones', 'LluvMadCaldas' );
	register_setting( 'climaenvivo-opciones', 'LluvManCaldas' );
	register_setting( 'climaenvivo-opciones', 'LluvTarCaldas' );
	register_setting( 'climaenvivo-opciones', 'LluvNocCaldas' );								
}

function pagina_configuracion(){
	$hoy = strtotime(date('Y-m-d'));
	$manana = strtotime(date('Y-m-d').' +1 day');    
	?>
	<style type="text/css">
		.contenido-p
		{
			float:left; 
			border: 1px solid;
			height: 376px;
			width: 255px;
			padding: 10px;

		}
		.pronosticoLluvia
		{
			height: 44px;
		}

		.contenido-p label
		{
			width: 150px;
			float: left;
		}

		input[type="number"]
		{
			width: 50px;
		}


	</style>


	<div class="clearfix row-fluid">
		<h1><img src="<?php echo plugins_url( 'climaenvivo/img/ico.png' )?>"> Configuración Pronosticos</h1>
		<!-- Start: Formulario Medellín -->
		<form action="options.php" method="POST">
			<div class="contenido-p" >			
				<?php settings_fields( 'climaenvivo-opciones' ); ?>			
				<h3>Medellín Oriente</h3>
				<h4>Pronóstico de Temperatura</h4>
				<div>
				<label for="tempMaxMedellinOr">Temperatura Máxima: </label>
				<input id="tempMaxMedellinOr" name="tempMaxMedellinOr" type="number" value="<?php echo get_option('tempMaxMedellinOr'); ?>">
				</div>
				<div>
				<label for="tempMinMedellinOr">Temperatura Mínima: </label>
				<input id="tempMinMedellinOr" name="tempMinMedellinOr" type="number" value="<?php echo get_option('tempMinMedellinOr'); ?>">
				</div>
				<h4>Pronóstico de Lluvias</h4>
				<div class="pronosticoLluvia">
					<label for="LluvMadMedellinOr">Madrugada: </label>
					<select id="LluvMadMedellinOr" name="LluvMadMedellinOr">
						<option<?php echo (get_option('LluvMadMedellinOr') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvMadMedellinOr') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvMadMedellinOr') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>
				<div class="pronosticoLluvia">
					<label for="LluvManMedellinOr">Mañana: </label>
					<select id="LluvManMedellinOr"  name="LluvManMedellinOr">
						<option<?php echo (get_option('LluvManMedellinOr') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvManMedellinOr') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvManMedellinOr') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>
				<div class="pronosticoLluvia">
					<label for="LluvTarMedellinOr">Tarde: </label>
					<select id="LluvTarMedellinOr" name="LluvTarMedellinOr">
						<option<?php echo (get_option('LluvTarMedellinOr') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvTarMedellinOr') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvTarMedellinOr') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>
				<div class="pronosticoLluvia">
					<label for="LluvNocMedellinOr">Noche: </label>
					<select id="LluvNocMedellinOr" name="LluvNocMedellinOr">
						<option<?php echo (get_option('LluvNocMedellinOr') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvNocMedellinOr') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvNocMedellinOr') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>			
			</div>
			<div class="contenido-p" >			
				<?php settings_fields( 'climaenvivo-opciones' ); ?>			
				<h3>Medellín Centro</h3>
				<h4>Pronóstico de Temperatura</h4>
				<div>
				<label for="tempMaxMedellin">Temperatura Máxima: </label>
				<input id="tempMaxMedellin" class="span1" name="tempMaxMedellin" type="number" value="<?php echo get_option('tempMaxMedellin'); ?>">
				</div>
				<div>
				<label for="tempMinMedellin">Temperatura Mínima: </label>
				<input id="tempMinMedellin" class="span1" name="tempMinMedellin" type="number" value="<?php echo get_option('tempMinMedellin'); ?>">
				</div>
				<h4>Pronóstico de Lluvias</h4>
				<div class="pronosticoLluvia">
					<label for="LluvMadMedellin">Madrugada: </label>
					<select id="LluvMadMedellin" name="LluvMadMedellin">
						<option<?php echo (get_option('LluvMadMedellin') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvMadMedellin') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvMadMedellin') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>
				<div class="pronosticoLluvia">
					<label for="LluvManMedellin">Mañana: </label>
					<select id="LluvManMedellin"  name="LluvManMedellin">
						<option<?php echo (get_option('LluvManMedellin') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvManMedellin') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvManMedellin') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>
				<div class="pronosticoLluvia">
					<label for="LluvTarMedellin">Tarde: </label>
					<select id="LluvTarMedellin" name="LluvTarMedellin">
						<option<?php echo (get_option('LluvTarMedellin') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvTarMedellin') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvTarMedellin') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>
				<div class="pronosticoLluvia">
					<label for="LluvNocMedellin">Noche: </label>
					<select id="LluvNocMedellin" name="LluvNocMedellin">
						<option<?php echo (get_option('LluvNocMedellin') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvNocMedellin') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvNocMedellin') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>			
			</div>
		<!-- End: Formulario Medellín -->
			<div class="contenido-p" >			
				<?php settings_fields( 'climaenvivo-opciones' ); ?>			
				<h3>Medellín Occidente</h3>
				<h4>Pronóstico de Temperatura</h4>
				<div>
				<label for="tempMaxMedellinOcc">Temperatura Máxima: </label>
				<input id="tempMaxMedellinOcc" class="span1" name="tempMaxMedellinOcc" type="number" value="<?php echo get_option('tempMaxMedellinOcc'); ?>">
				</div>
				<div>
				<label for="tempMinMedellinOcc">Temperatura Mínima: </label>
				<input id="tempMinMedellinOcc" class="span1" name="tempMinMedellinOcc" type="number" value="<?php echo get_option('tempMinMedellinOcc'); ?>">
				</div>
				<h4>Pronóstico de Lluvias</h4>
				<div class="pronosticoLluvia">
					<label for="LluvMadMedellinOcc">Madrugada: </label>
					<select id="LluvMadMedellinOcc" name="LluvMadMedellinOcc">
						<option<?php echo (get_option('LluvMadMedellinOcc') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvMadMedellinOcc') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvMadMedellinOcc') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>
				<div class="pronosticoLluvia">
					<label for="LluvManMedellinOcc">Mañana: </label>
					<select id="LluvManMedellinOcc"  name="LluvManMedellinOcc">
						<option<?php echo (get_option('LluvManMedellinOcc') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvManMedellinOcc') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvManMedellinOcc') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>
				<div class="pronosticoLluvia">
					<label for="LluvTarMedellinOcc">Tarde: </label>
					<select id="LluvTarMedellinOcc" name="LluvTarMedellinOcc">
						<option<?php echo (get_option('LluvTarMedellinOcc') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvTarMedellinOcc') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvTarMedellinOcc') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>
				<div class="pronosticoLluvia">
					<label for="LluvNocMedellinOcc">Noche: </label>
					<select id="LluvNocMedellinOcc" name="LluvNocMedellinOcc">
						<option<?php echo (get_option('LluvNocMedellinOcc') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvNocMedellinOcc') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvNocMedellinOcc') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>			
			</div>
		<!-- End: Formulario Medellín -->	

		<!-- Start: Formulario Barbosa -->
		<div class="contenido-p">
			<h3>Barbosa</h3>
      		<h4>Pronóstico de Temperatura</h4>
			<div>
				<label fr="tempMaxBarbosa">Temperatura Máxima: </label>
				<input id="tempMaxBarbosa" class="span1" name="tempMaxBarbosa" type="number" value="<?php echo get_option('tempMaxBarbosa'); ?>">
			</div>
			<div>
				<label for="tempMinBarbosa">Temperatura Mínima: </label>
				<input id="tempMinBarbosa" class="span1" name="tempMinBarbosa" type="number" value="<?php echo get_option('tempMinBarbosa'); ?>">
			</div>
			<h4>Pronóstico de Lluvias</h4>
			<div class="pronosticoLluvia">
				<label for="LluvMadBarbosa">Madrugada: </label>
				<select id="LluvMadBarbosa" class="span2" name="LluvMadBarbosa">
					<option<?php echo (get_option('LluvMadBarbosa') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvMadBarbosa') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvMadBarbosa') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvManBarbosa">Mañana: </label>
				<select id="LluvManBarbosa" class="span2" name="LluvManBarbosa">
					<option<?php echo (get_option('LluvManBarbosa') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvManBarbosa') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvManBarbosa') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvTarBarbosa">Tarde: </label>
				<select id="LluvTarBarbosa" class="span2" name="LluvTarBarbosa">
					<option<?php echo (get_option('LluvTarBarbosa') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvTarBarbosa') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvTarBarbosa') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvNocBarbosa">Noche: </label>
				<select id="LluvNocBarbosa" class="span2" name="LluvNocBarbosa">
					<option<?php echo (get_option('LluvNocBarbosa') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvNocBarbosa') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvNocBarbosa') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
		</div>
		<!-- End: Formulario Barbosa -->

		<!-- Start: Formulario Girardota -->
		<div class="contenido-p">
			<h3>Girardota</h3>
      		<h4>Pronóstico de Temperatura</h4>
			<div>
				<label for="tempMaxGirardota">Temperatura Máxima: </label>
				<input id="tempMaxGirardota" class="span1" name="tempMaxGirardota" type="number" value="<?php echo get_option('tempMaxGirardota'); ?>">
			</div>
			<div>
				<label for="tempMinGirardota">Temperatura Mínima: </label>
				<input id="tempMinGirardota" class="span1" name="tempMinGirardota" type="number" value="<?php echo get_option('tempMinGirardota'); ?>">
			</div>
			<h4>Pronóstico de Lluvias</h4>
			<div class="pronosticoLluvia">
				<label for="LluvMadGirardota">Madrugada: </label>
				<select id="LluvMadGirardota" class="span2" name="LluvMadGirardota">
					<option<?php echo (get_option('LluvMadGirardota') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvMadGirardota') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvMadGirardota') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvManGirardota">Mañana: </label>
				<select id="LluvManGirardota" class="span2" name="LluvManGirardota">
					<option<?php echo (get_option('LluvManGirardota') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvManGirardota') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvManGirardota') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvTarGirardota">Tarde: </label>
				<select id="LluvTarGirardota" class="span2" name="LluvTarGirardota">
					<option<?php echo (get_option('LluvTarGirardota') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvTarGirardota') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvTarGirardota') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvNocGirardota">Noche: </label>
				<select id="LluvNocGirardota" class="span2" name="LluvNocGirardota">
					<option<?php echo (get_option('LluvNocGirardota') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvNocGirardota') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvNocGirardota') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
		</div>
		<!-- End: Formulario Girardota -->

		<!-- Start: Formulario Copacabana -->
		<div class="contenido-p">
			<h3>Copacabana</h3>
      			<h4>Pronóstico de Temperatura</h4>
			<div>
				<label for="tempMaxCopacabana">Temperatura Máxima: </label>
				<input id="tempMaxCopacabana" class="span1" name="tempMaxCopacabana" type="number" value="<?php echo get_option('tempMaxCopacabana'); ?>">
			</div>
			<div>
				<label for="tempMinCopacabana">Temperatura Mínima: </label>
				<input id="tempMinCopacabana" class="span1" name="tempMinCopacabana" type="number" value="<?php echo get_option('tempMinCopacabana'); ?>">
			</div>
			<h4>Pronóstico de Lluvias</h4>
			<div class="pronosticoLluvia">
				<label for="LluvMadCopacabana">Mañana: </label>
				<select id="LluvMadCopacabana" class="span2" name="LluvMadCopacabana">
					<option<?php echo (get_option('LluvMadCopacabana') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvMadCopacabana') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvMadCopacabana') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvManCopacabana">Mañana: </label>
				<select id="LluvManCopacabana" class="span2" name="LluvManCopacabana">
					<option<?php echo (get_option('LluvManCopacabana') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvManCopacabana') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvManCopacabana') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvTarCopacabana">Tarde: </label>
				<select id="LluvTarCopacabana" class="span2" name="LluvTarCopacabana">
					<option<?php echo (get_option('LluvTarCopacabana') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvTarCopacabana') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvTarCopacabana') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvNocCopacabana">Noche: </label>
				<select id="LluvNocCopacabana" class="span2" name="LluvNocCopacabana">
					<option<?php echo (get_option('LluvNocCopacabana') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvNocCopacabana') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvNocCopacabana') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
		</div>
		<!-- End: Formulario Copacabana -->
		<!-- Start: Formulario Bello -->
		<div class="contenido-p">
			<h3>Bello</h3>
      			<h4>Pronóstico de Temperatura</h4>
			<div>
				<label for="tempMaxBello">Temperatura Máxima: </label>
				<input id="tempMaxBello" class="span1" name="tempMaxBello" type="number" value="<?php echo get_option('tempMaxBello'); ?>">
			</div>
			<div>
				<label for="tempMinBello">Temperatura Mínima: </label>
				<input id="tempMinBello" class="span1" name="tempMinBello" type="number" value="<?php echo get_option('tempMinBello'); ?>">
			</div>
			<h4>Pronóstico de Lluvias</h4>
			<div class="pronosticoLluvia">
				<label for="LluvMadBello">Mañana: </label>
				<select id="LluvMadBello" class="span2" name="LluvMadBello">
					<option<?php echo (get_option('LluvMadBello') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvMadBello') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvMadBello') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvManBello">Mañana: </label>
				<select id="LluvManBello" class="span2" name="LluvManBello">
					<option<?php echo (get_option('LluvManBello') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvManBello') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvManBello') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvTarBello">Tarde: </label>
				<select id="LluvTarBello" class="span2" name="LluvTarBello">
					<option<?php echo (get_option('LluvTarBello') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvTarBello') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvTarBello') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvNocBello">Noche: </label>
				<select id="LluvNocBello" class="span2" name="LluvNocBello">
					<option<?php echo (get_option('LluvNocBello') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvNocBello') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvNocBello') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
		</div>
		<!-- End: Formulario Bello -->
	<!--	<br class="clear"/> -->
		<!-- Start: Formulario Envigado -->
		<div class="contenido-p">
			<h3>Envigado</h3>
      		<h4>Pronóstico de Temperatura</h4>
			<div>
			<label for="tempMaxEnvigado">Temperatura Máxima: </label>
			<input id="tempMaxEnvigado" class="span1" name="tempMaxEnvigado" type="number" value="<?php echo get_option('tempMaxEnvigado'); ?>">
			</div>
			<div>
			<label for="tempMinEnvigado">Temperatura Mínima: </label>
			<input id="tempMinEnvigado" class="span1" name="tempMinEnvigado" type="number" value="<?php echo get_option('tempMinEnvigado'); ?>">
			</div>
			<h4>Pronóstico de Lluvias</h4>
			<div class="pronosticoLluvia">
				<label for="LluvMadEnvigado">Madrugada: </label>
				<select id="LluvMadEnvigado" class="span2" name="LluvMadEnvigado">
					<option<?php echo (get_option('LluvMadEnvigado') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvMadEnvigado') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvMadEnvigado') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvManEnvigado">Mañana: </label>
				<select id="LluvManEnvigado" class="span2" name="LluvManEnvigado">
					<option<?php echo (get_option('LluvManEnvigado') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvManEnvigado') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvManEnvigado') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvTarEnvigado">Tarde: </label>
				<select id="LluvTarEnvigado" class="span2" name="LluvTarEnvigado">
					<option<?php echo (get_option('LluvTarEnvigado') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvTarEnvigado') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvTarEnvigado') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvNocEnvigado">Noche: </label>
				<select id="LluvNocEnvigado" class="span2" name="LluvNocEnvigado">
					<option<?php echo (get_option('LluvNocEnvigado') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvNocEnvigado') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvNocEnvigado') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
		</div>
		<!-- End: Formulario Envigado -->
		
		<!-- Start: Formulario Sabaneta -->
		<div class="contenido-p">
			<h3>Sabaneta</h3>
      		<h4>Pronóstico de Temperatura</h4>
			<div>
			<label for="tempMaxSabaneta">Temperatura Máxima: </label>
			<input id="tempMaxSabaneta" class="span1" name="tempMaxSabaneta" type="number" value="<?php echo get_option('tempMaxSabaneta'); ?>">
			</div>
			<div>
			<label for="tempMinSabaneta">Temperatura Mínima: </label>
			<input id="tempMinSabaneta" class="span1" name="tempMinSabaneta" type="number" value="<?php echo get_option('tempMinSabaneta'); ?>">
			</div>
			<h4>Pronóstico de Lluvias</h4>
			<div class="pronosticoLluvia">
				<label for="LluvMadSabaneta">Madrugada: </label>
				<select id="LluvMadSabaneta" class="span2" name="LluvMadSabaneta">
					<option<?php echo (get_option('LluvMadSabaneta') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvMadSabaneta') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvMadSabaneta') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvManSabaneta">Mañana: </label>
				<select id="LluvManSabaneta" class="span2" name="LluvManSabaneta">
					<option<?php echo (get_option('LluvManSabaneta') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvManSabaneta') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvManSabaneta') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia"> 
				<label for="LluvTarSabaneta">Tarde: </label>
				<select id="LluvTarSabaneta" class="span2" name="LluvTarSabaneta">
					<option<?php echo (get_option('LluvTarSabaneta') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvTarSabaneta') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvTarSabaneta') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvNocSabaneta">Noche: </label>
				<select id="LluvNocSabaneta" class="span2" name="LluvNocSabaneta">
					<option<?php echo (get_option('LluvNocSabaneta') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvNocSabaneta') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvNocSabaneta') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
		</div>
		<!-- End: Formulario Sabaneta -->
		
		<!-- Start: Formulario LaEstrella -->
		<div class="contenido-p">
			<h3>La Estrella</h3>
     		 <h4>Pronóstico de Temperatura</h4>
			<div>
			<label for="tempMaxLaEstrella">Temperatura Máxima: </label>
			<input id="tempMaxLaEstrella" class="span1" name="tempMaxLaEstrella" type="number" value="<?php echo get_option('tempMaxLaEstrella'); ?>">
			</div>
			<div>
			<label for="tempMinLaEstrella">Temperatura Mínima: </label>
			<input id="tempMinLaEstrella" class="span1" name="tempMinLaEstrella" type="number" value="<?php echo get_option('tempMinLaEstrella'); ?>">
			</div>	
			<h4>Pronóstico de Lluvias</h4>
			<div class="pronosticoLluvia">
				<label for="LluvMadLaEstrella">Madrugada: </label>
				<select id="LluvMadLaEstrella" class="span2" name="LluvMadLaEstrella">
					<option<?php echo (get_option('LluvMadLaEstrella') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvMadLaEstrella') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvMadLaEstrella') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvManLaEstrella">Mañana: </label>
				<select id="LluvManLaEstrella" class="span2" name="LluvManLaEstrella">
					<option<?php echo (get_option('LluvManLaEstrella') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvManLaEstrella') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvManLaEstrella') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvTarLaEstrella">Tarde: </label>
				<select id="LluvTarLaEstrella" class="span2" name="LluvTarLaEstrella">
					<option<?php echo (get_option('LluvTarLaEstrella') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvTarLaEstrella') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvTarLaEstrella') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvNocLaEstrella">Noche: </label>
				<select id="LluvNocLaEstrella" class="span2" name="LluvNocLaEstrella">
					<option<?php echo (get_option('LluvNocLaEstrella') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvNocLaEstrella') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvNocLaEstrella') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
		</div>
		<!-- End: Formulario LaEstrella -->
		
		<!-- Start: Formulario Itagui -->
		<div class="contenido-p">
			<h3>Itagüi</h3>
      		<h4>Pronóstico de Temperatura</h4>
			<div>
			<label for="tempMaxItagui">Temperatura Máxima: </label>
			<input id="tempMaxItagui" class="span1" name="tempMaxItagui" type="number" value="<?php echo get_option('tempMaxItagui'); ?>">
			</div>
			<div>
			<label for="tempMinItagui">Temperatura Mínima: </label>
			<input id="tempMinItagui" class="span1" name="tempMinItagui" type="number" value="<?php echo get_option('tempMinItagui'); ?>">
			</div>
			<h4>Pronóstico de Lluvias</h4>
			<div class="pronosticoLluvia">
					<label for="LluvMadItagui">Madrugada: </label>
					<select id="LluvMadItagui" class="span2" name="LluvMadItagui">
						<option<?php echo (get_option('LluvMadItagui') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvMadItagui') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvMadItagui') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>
				<div class="pronosticoLluvia">
					<label for="LluvManItagui">Mañana: </label>
					<select id="LluvManItagui" class="span2" name="LluvManItagui">
						<option<?php echo (get_option('LluvManItagui') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvManItagui') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvManItagui') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>
				<div class="pronosticoLluvia">
					<label for="LluvTarItagui">Tarde: </label>
					<select id="LluvTarItagui" class="span2" name="LluvTarItagui">
						<option<?php echo (get_option('LluvTarItagui') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvTarItagui') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvTarItagui') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>
				<div class="pronosticoLluvia">
					<label for="LluvNocItagui">Noche: </label>
					<select id="LluvNocItagui" class="span2" name="LluvNocItagui">
						<option<?php echo (get_option('LluvNocItagui') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
						<option<?php echo (get_option('LluvNocItagui') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
						<option<?php echo (get_option('LluvNocItagui') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
					</select>
				</div>
			</div>
		<!-- End: Formulario Itagui -->
		<!-- Start: Formulario Caldas -->
		<div class="contenido-p">
			<h3>Caldas</h3>
      			<h4>Pronóstico de Temperatura</h4>
			<div>
			<label for="tempMaxCaldas">Temperatura Máxima: </label>
			<input id="tempMaxCaldas" class="span1" name="tempMaxCaldas" type="number" value="<?php echo get_option('tempMaxCaldas'); ?>">
			</div>
			<div>
			<label for="tempMinCaldas">Temperatura Mínima: </label>
			<input id="tempMinCaldas" class="span1" name="tempMinCaldas" type="number" value="<?php echo get_option('tempMinCaldas'); ?>">
			</div>
			<h4>Pronóstico de Lluvias</h4>
			<div class="pronosticoLluvia">
				<label for="LluvMadCaldas">Madrugada: </label>
				<select id="LluvMadCaldas" class="span2" name="LluvMadCaldas">
					<option<?php echo (get_option('LluvMadCaldas') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvMadCaldas') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvMadCaldas') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvManCaldas">Mañana: </label>
				<select id="LluvManCaldas" class="span2" name="LluvManCaldas">
					<option<?php echo (get_option('LluvManCaldas') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvManCaldas') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvManCaldas') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvTarCaldas">Tarde: </label>
				<select id="LluvTarCaldas" class="span2" name="LluvTarCaldas">
					<option<?php echo (get_option('LluvTarCaldas') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvTarCaldas') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvTarCaldas') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
			<div class="pronosticoLluvia">
				<label for="LluvNocCaldas">Noche: </label>
				<select id="LluvNocCaldas" class="span2" name="LluvNocCaldas">
					<option<?php echo (get_option('LluvNocCaldas') === "Baja") ? ' selected="selected"' : '' ?>>Baja</option>
					<option<?php echo (get_option('LluvNocCaldas') === "Media") ? ' selected="selected"' : '' ?>>Media</option>
					<option<?php echo (get_option('LluvNocCaldas') === "Alta") ? ' selected="selected"' : '' ?>>Alta</option>
				</select>
			</div>
		</div>

		<br class="clear"/>
		<!-- End: Formulario Caldas -->
			<?php submit_button(); ?>
		</form>		
	</div>
	<?php
} 

?>