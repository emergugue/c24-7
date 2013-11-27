/* imgsizer (flexible images for fluid sites) */
var imgSizer={Config:{imgCache:[],spacer:"/path/to/your/spacer.gif"},collate:function(aScope){var isOldIE=(document.all&&!window.opera&&!window.XDomainRequest)?1:0;if(isOldIE&&document.getElementsByTagName){var c=imgSizer;var imgCache=c.Config.imgCache;var images=(aScope&&aScope.length)?aScope:document.getElementsByTagName("img");for(var i=0;i<images.length;i++){images[i].origWidth=images[i].offsetWidth;images[i].origHeight=images[i].offsetHeight;imgCache.push(images[i]);c.ieAlpha(images[i]);images[i].style.width="100%";}
if(imgCache.length){c.resize(function(){for(var i=0;i<imgCache.length;i++){var ratio=(imgCache[i].offsetWidth/imgCache[i].origWidth);imgCache[i].style.height=(imgCache[i].origHeight*ratio)+"px";}});}}},ieAlpha:function(img){var c=imgSizer;if(img.oldSrc){img.src=img.oldSrc;}
var src=img.src;img.style.width=img.offsetWidth+"px";img.style.height=img.offsetHeight+"px";img.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+src+"', sizingMethod='scale')"
img.oldSrc=src;img.src=c.Config.spacer;},resize:function(func){var oldonresize=window.onresize;if(typeof window.onresize!='function'){window.onresize=func;}else{window.onresize=function(){if(oldonresize){oldonresize();}
func();}}}}
// Variable para almacenar los filtros
var filtro = [];
// add twitter bootstrap classes and color based on how many times tag is used
function addTwitterBSClass(thisObj) {
  var title = $(thisObj).attr('title');
  if (title) {
    var titles = title.split(' ');
    if (titles[0]) {
      var num = parseInt(titles[0]);
      if (num > 0)
      	$(thisObj).addClass('label');
      if (num == 2)
        $(thisObj).addClass('label label-info');
      if (num > 2 && num < 4)
        $(thisObj).addClass('label label-success');
      if (num >= 5 && num < 10)
        $(thisObj).addClass('label label-warning');
      if (num >=10)
        $(thisObj).addClass('label label-important');
    }
  }
  else
  	$(thisObj).addClass('label');
  return true;
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {

	// modify tag cloud links to match up with twitter bootstrap
	$("#tag-cloud a").each(function() {
	    addTwitterBSClass(this);
	    return true;
	});
	
	$("p.tags a").each(function() {
		addTwitterBSClass(this);
		return true;
	});
	
	$("ol.commentlist a.comment-reply-link").each(function() {
		$(this).addClass('btn btn-success btn-mini');
		return true;
	});
	
	$('#cancel-comment-reply-link').each(function() {
		$(this).addClass('btn btn-danger btn-mini');
		return true;
	});
	
	$('article.post').hover(function(){
		$('a.edit-post').show();
	},function(){
		$('a.edit-post').hide();
	});
	
	// Input placeholder text fix for IE
	$('[placeholder]').focus(function() {
	  var input = $(this);
	  if (input.val() == input.attr('placeholder')) {
		input.val('');
		input.removeClass('placeholder');
	  }
	}).blur(function() {
	  var input = $(this);
	  if (input.val() == '' || input.val() == input.attr('placeholder')) {
		input.addClass('placeholder');
		input.val(input.attr('placeholder'));
	  }
	}).blur();
	
	// Prevent submission of empty form
	$('[placeholder]').parents('form').submit(function() {
	  $(this).find('[placeholder]').each(function() {
		var input = $(this);
		if (input.val() == input.attr('placeholder')) {
		  input.val('');
		}
	  })
	});
	
	$('#s').focus(function(){
		if( $(window).width() < 940 ){
			$(this).animate({ width: '200px' });
		}
	});
	
	$('#s').blur(function(){
		if( $(window).width() < 940 ){
			$(this).animate({ width: '100px' });
		}
	});
			
	$('.alert-message').alert();
	
	$('.dropdown-toggle').dropdown();

	/**
	* Sección para el manejo del widget de Pronóstico / Radar / Temperatura
	*/
	$("#pronosticos").carousel({
		interval: false
	});
	$("#temperaturas").carousel({
		interval: false
	});	

	$("#radar").css('display','none');

	$("#temperaturas").css('display','none');

	$("#btnMostrarRadar").click(function(e){
		e.preventDefault();
		$("#pronosticos").fadeOut();
		$("#temperaturas").fadeOut();
		$("#radar").fadeIn(1000);

		var medellin = new google.maps.LatLng(6.244316, -75.539932);
		var mapOptions = {
			zoom: 12,
			center: medellin,
			mapTypeId: google.maps.MapTypeId.HYBRID
		}
		var map = new google.maps.Map(document.getElementById("mapa"), mapOptions);		
		var georssLayer = new google.maps.KmlLayer('http://www.siata.gov.co/kml/00_Radar/Ultimo_Barrido/AreaMetropolitanaRadar_10_120_DBZH.kml', {preserveViewport: true});
		georssLayer.setMap(map);
	});

	$("#btnMostrarTemperatura").click(function(e){
		e.preventDefault();
		$("#pronosticos").fadeOut();
		$("#radar").fadeOut();
		$("#temperaturas").fadeIn(1000);
	});	

	$("#btnMostrarPronostico").click(function(e){
		e.preventDefault();
		$("#temperaturas").fadeOut();		
		$("#radar").fadeOut();
		$("#pronosticos").fadeIn(1000);
	});		
	/* Fin de la sección */ 

	/**
	* Sección para el manejo de la página Clima en Vivo
	*/
	$("#radar-meterologico").ready(function(){
		var medellin = new google.maps.LatLng(6.244316, -75.539932);
		var mapOptions = {
			zoom: 12,
			center: medellin,
			mapTypeId: google.maps.MapTypeId.HYBRID
		}
		var map = new google.maps.Map(document.getElementById("mapa"), mapOptions);		
		var georssLayer = new google.maps.KmlLayer('http://www.siata.gov.co/kml/00_Radar/Ultimo_Barrido/AreaMetropolitanaRadar_10_120_DBZH.kml', {preserveViewport: true});
		georssLayer.setMap(map);
	});

	$("#btnMostrarRadarMeteorologico").click(function(e){
		e.preventDefault();
		$("#pronostico").fadeOut();
		$("#vista-vivo").fadeOut();
		$("#sensores").fadeOut();
		$("#radar-meterologico").fadeIn(1000);
	});	

	$("#btnMostrarPronosticoTemperatura").click(function(e){
		e.preventDefault();
		$("#radar-meterologico").fadeOut();
		$("#vista-vivo").fadeOut();
		$("#sensores").fadeOut();
		$("#pronostico").fadeIn(1000);
	});

	$("#btnMostrarVistaVivo").click(function(e){
		e.preventDefault();
		$("#radar-meterologico").fadeOut();
		$("#pronostico").fadeOut();
		$("#sensores").fadeOut();
		$("#vista-vivo").fadeIn(1000);
	});

	$("#btnMostrarSensores").click(function(e){
		e.preventDefault();
		$("#radar-meterologico").fadeOut();
		$("#pronostico").fadeOut();
		$("#vista-vivo").fadeOut();
		$("#sensores").fadeIn(1000);
	});	

	$("#btnMostrarCam1").click(function(e){
		e.preventDefault();
		$("#vivo-camara4").fadeOut();
		$("#vivo-camara3").fadeOut();
		$("#vivo-camara2").fadeOut();
		$("#vivo-camara1").fadeIn(1500);
	});

	$("#btnMostrarCam2").click(function(e){
		e.preventDefault();
		$("#vivo-camara4").fadeOut();
		$("#vivo-camara3").fadeOut();
		$("#vivo-camara1").fadeOut();
		$("#vivo-camara2").fadeIn(1500);
	});

	$("#btnMostrarCam3").click(function(e){
		e.preventDefault();
		$("#vivo-camara4").fadeOut();
		$("#vivo-camara2").fadeOut();
		$("#vivo-camara1").fadeOut();
		$("#vivo-camara3").fadeIn(1500);
	});	

	$("#btnMostrarCam4").click(function(e){
		e.preventDefault();
		$("#vivo-camara2").fadeOut();
		$("#vivo-camara3").fadeOut();
		$("#vivo-camara1").fadeOut();
		$("#vivo-camara4").fadeIn(1500);
	});											
	/* Fin de la sección */
	
	/* Inicio: Sección Blog */
	$(".filtro").change(function(){
		if($("#medio-ambiente").is(':checked')){
			if(filtro.indexOf(".category-medio-ambiente") == -1){
				filtro.push(".category-medio-ambiente");
			}			
		}
		else{
			var i = filtro.indexOf(".category-medio-ambiente");
			if(i != -1){
				filtro.splice(i, 1);
			}			
		}
		if($("#clima-autos").is(':checked')){
			if(filtro.indexOf(".category-clima-y-autos") == -1){
				filtro.push(".category-clima-y-autos");
			}
		}
		else{
			var i = filtro.indexOf(".category-clima-y-autos");
			if(i != -1){
				filtro.splice(i, 1);
			}			
		}
		if($("#clima-ciencia").is(':checked')){
			if(filtro.indexOf(".category-clima-y-ciencia") == -1){
				filtro.push(".category-clima-y-ciencia");
			}
		}
		else{
			var i = filtro.indexOf(".category-clima-y-ciencia");
			if(i != -1){
				filtro.splice(i, 1);
			}			
		}	
		if($("#clima-salud").is(':checked')){
			if(filtro.indexOf(".category-clima-y-salud") == -1){
				filtro.push(".category-clima-y-salud");
			}
		}
		else{
			var i = filtro.indexOf(".category-clima-y-salud");
			if(i != -1){
				filtro.splice(i, 1);
			}			
		}
		if($("#innovacion-sostenible").is(':checked')){
			if(filtro.indexOf(".category-innovacion-sostenible") == -1){
				filtro.push(".category-innovacion-sostenible");
			}
		}
		else{
			var i = filtro.indexOf(".category-innovacion-sostenible");
			if(i != -1){
				filtro.splice(i, 1);
			}			
		}
		if($("#clima-novedades").is(':checked')){
			if(filtro.indexOf(".category-clima-novedades") == -1){
				filtro.push(".category-clima-novedades");
			}
		}
		else{
			var i = filtro.indexOf(".category-clima-novedades");
			if(i != -1){
				filtro.splice(i, 1);
			}			
		}
		if($("#prevencion").is(':checked')){
			if(filtro.indexOf(".category-prevencion") == -1){
				filtro.push(".category-prevencion");
			}
		}
		else{
			var i = filtro.indexOf(".category-prevencion");
			if(i != -1){
				filtro.splice(i, 1);
			}			
		}	
		var valor = "", separador = "";
		for(i=0; i<filtro.length; i++){
			
			if(i == 0 || i == filtro.length)
				separador = "";
			else
				separador =", ";

			valor = valor + separador + filtro[i];

		}
		$("#size option[value='"+valor+"']").attr("selected",true).change();
	});
    /* Fin: Sección Blog */
});
