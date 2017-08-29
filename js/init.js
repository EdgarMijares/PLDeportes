$(document).ready(function(){
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create', 'UA-98896822-1', 'auto');ga('send', 'pageview');

	$('.button-collapse').sideNav();
	$('.parallax').parallax();
	//ajustesPagina();
	var activaBanner = false;
	if(activaBanner){
		banner();
	}

});

function banner(){
	var alto = $(window).height();

	function ajustesPagina(){
		$("section#body").css({"margin-top": alto - 150 + "px"});
		$("#contenedor_general").css({"height": alto + 30 + "px"});
		if ($(window).width() < 600) {
			$("#contenedor_general").css({"background-image": "url(img/parallaxc.gif)"})
		} else if($(window).width() < 900 && $(window).width() >= 600) {
			$("#contenedor_general").css({"background-image": "url(img/parallaxm.gif)"})
		} else{
			$("#contenedor_general").css({"background-image": "url(img/parallaxg.gif)"})
		}
	}

	$(document).scroll(function(){
		var scrollTop = $(this).scrollTop();
		var pixels = scrollTop / 70;
		if(scrollTop < alto){
			$("#contenedor_general").css({
				"-webkit-filter": "blur(" + pixels + "px)",
				"background-position": "center -" + pixels * 10 + "px"
			});
		}
	});
}