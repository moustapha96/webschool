(function(){
    // Back to Top - by CodyHouse.co
	var backTop = document.getElementsByClassName('js-cd-top')[0],
		// browser window scroll (in pixels) after which the "back to top" link is shown
		offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offsetOpacity = 1200,
		scrollDuration = 700,
		scrolling = false;
	if( backTop ) {
		//update back to top visibility on scrolling
		window.addEventListener("scroll", function(event) {
			if( !scrolling ) {
				scrolling = true;
				(!window.requestAnimationFrame) ? setTimeout(checkBackToTop, 250) : window.requestAnimationFrame(checkBackToTop);
			}
		});
		//smooth scroll to top
		backTop.addEventListener('click', function(event) {
			event.preventDefault();
			(!window.requestAnimationFrame) ? window.scrollTo(0, 0) : scrollTop(scrollDuration);
		});
	}

	function checkBackToTop() {
		var windowTop = window.scrollY || document.documentElement.scrollTop;
		( windowTop > offset ) ? addClass(backTop, 'cd-top--show') : removeClass(backTop, 'cd-top--show', 'cd-top--fade-out');
		( windowTop > offsetOpacity ) && addClass(backTop, 'cd-top--fade-out');
		scrolling = false;
	}
	
	function scrollTop(duration) {
	    var start = window.scrollY || document.documentElement.scrollTop,
	        currentTime = null;
	        
	    var animateScroll = function(timestamp){
	    	if (!currentTime) currentTime = timestamp;        
	        var progress = timestamp - currentTime;
	        var val = Math.max(Math.easeInOutQuad(progress, start, -start, duration), 0);
	        window.scrollTo(0, val);
	        if(progress < duration) {
	            window.requestAnimationFrame(animateScroll);
	        }
	    };

	    window.requestAnimationFrame(animateScroll);
	}

	Math.easeInOutQuad = function (t, b, c, d) {
 		t /= d/2;
		if (t < 1) return c/2*t*t + b;
		t--;
		return -c/2 * (t*(t-2) - 1) + b;
	};

	//class manipulations - needed if classList is not supported
	function hasClass(el, className) {
	  	if (el.classList) return el.classList.contains(className);
	  	else return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
	}
	function addClass(el, className) {
		var classList = className.split(' ');
	 	if (el.classList) el.classList.add(classList[0]);
	 	else if (!hasClass(el, classList[0])) el.className += " " + classList[0];
	 	if (classList.length > 1) addClass(el, classList.slice(1).join(' '));
	}
	function removeClass(el, className) {
		var classList = className.split(' ');
	  	if (el.classList) el.classList.remove(classList[0]);	
	  	else if(hasClass(el, classList[0])) {
	  		var reg = new RegExp('(\\s|^)' + classList[0] + '(\\s|$)');
	  		el.className=el.className.replace(reg, ' ');
	  	}
	  	if (classList.length > 1) removeClass(el, classList.slice(1).join(' '));
	}
})();
(function ($) {

  "use strict";

    // PRE LOADER
    $(window).load(function(){
      $('.preloader').fadeOut(1000); // set duration in brackets    
    });


    // MENU
    $('.navbar-collapse a').on('click',function(e){
		
		if(!$(this).hasClass('dropdown-toggle'))  {	
			$(".navbar-collapse").collapse('hide');
		}

    });
	

    


	$(document).ready(function(){
	  $('.dropdown-submenu a.dropdown-toggle').on("click", function(e){
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
	  });
	});

	

    $(window).scroll(function() {
      if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
          } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
          }
    });


    // HOME SLIDER & COURSES & CLIENTS
    $('.home-slider').owlCarousel({
      animateOut: 'fadeOut',
      items:1,
      loop:true,
      dots:false,
      autoplayHoverPause: false,
      autoplay: true,
      smartSpeed: 1000,
    })

    $('.owl-courses').owlCarousel({
      animateOut: 'fadeOut',
      loop: true,
      autoplayHoverPause: false,
      autoplay: true,
      smartSpeed: 1000,
      dots: false,
      nav:true,
      navText: [
          '<i class="fa fa-angle-left"></i>',
          '<i class="fa fa-angle-right"></i>'
      ],
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
        },
        1000: {
          items: 3,
        }
      }
    });

    $('.owl-client').owlCarousel({
      animateOut: 'fadeOut',
      loop: true,
      autoplayHoverPause: false,
      autoplay: true,
      smartSpeed: 1000,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1,
        },
        1000: {
          items: 3,
        }
      }
    });


    // SMOOTHSCROLL
    $(function() {
      $('.custom-navbar a, #home a').on('click', function(event) {
        var $anchor = $(this);
          $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 49}, 1000);
            event.preventDefault();
      });
    });  

})(jQuery);



/* formulaire contact*/

$("#contact-form").submit(function(event){
    // cancels the form submission
	
    event.preventDefault();
    submitForm();
});
function submitForm(){
    // Initiate Variables With Form Content

    var name = $("#name").val();
    var myemail = $("#myemail").val();
    var msg = $("#msg").val();
	var academie = $("#academie").val();
	var numtel = $("#numtel").val();
	var type_etablissement = $("#type_etablissement option:selected" ).text();
	var uai_rne = $("#uai_rne").val();
	var n_siret = $("#n_siret").val();
	var declaration_prefecture = $("#declaration_prefecture").val();
	var radioValue = $("input[name='gender']:checked").val();
	var pays = $("#pays").val();
	//console.log(type_etablissement);
 
    $.ajax({
        type: "POST",
        url: "formul.php",
        data: {
        name: name,
        myemail: myemail,
        msg: msg,
		academie: academie,
		numtel: numtel,
		type_etablissement: type_etablissement,
		uai_rne: uai_rne,
		n_siret: n_siret,
		declaration_prefecture: declaration_prefecture,
		radioValue: radioValue,
		pays: pays,
        //THIS WILL TELL THE FORM IF THE USER IS CAPTCHA VERIFIED.
        captcha: grecaptcha.getResponse(),
      },
        success : function(text){
			
			
            if (text.substring(0, 7) == "success"){
				
                formSuccess();
            }
			else {
				formError();
			}
			
			
        }
		
    });
/* vider formulaire après envoi */
	//document.forms['contact-form'].reset();
	
	
 }
 function formSuccess(){
	
     $( "#msgSubmit" ).removeClass( "hidden" );
	 $( "#recaptcha" ).addClass( "hidden" );
	 //document.forms['contact-form'].reset();
	 $('#envoi').remove();
	 $('#myCaptcha').remove();
	//$('#msgSubmit').fadeOut('slow');
 
 }

 
function formError(){
	
     $( "#recaptcha" ).removeClass( "hidden" );
 }
 
 
/* le 08/11/2018 test form : formulaire tester educscol */

$("#test-form").submit(function(event){
    // cancels the form submission
	
    event.preventDefault();
    testForm();
});
function testForm(){
// Initiate Variables With Form Content

    var nom = $("#nom").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
	var school = $("#school").val();
 
    $.ajax({
        type: "POST",
        url: "demande.php",
        data: {
		nom : nom,
		email: email,
		phone: phone,
		school: school,
		},
        success : function(text){
			
            if (text.substring(0, 7) == "success"){
				
                testSuccess();
            }
			
			
        }
    });
	
/* vider formulaire après envoi */
	//document.forms['test-form'].reset();
}
function testSuccess(){
	
    $( "#msgtest" ).removeClass( "hidden" );
	//document.forms['test-form'].reset();
	$('#form-submit').remove();
}
/* alert formulaire contact */

function masquer_div(msgSubmit)
			{
			 
				   document.getElementById(msgSubmit).style.display = 'block';
			  
			}
			
			
/*cookies*/
$(function () {
    "use strict";

    /*if (!Cookies.get("acceptCookies")) {
        $(".cookiealert").addClass("show");
    }*/

    $(".acceptcookies").click(function () {
        Cookies.set("acceptCookies", true, { expires: 60 });
        $(".cookiealert").removeClass("show");
    });
});

(function () {
    "use strict";

    var cookieAlert = document.querySelector(".cookiealert");
    var acceptCookies = document.querySelector(".acceptcookies");

    cookieAlert.offsetHeight; // Force browser to trigger reflow (https://stackoverflow.com/a/39451131)

    if (!getCookie("acceptCookies")) {
        cookieAlert.classList.add("show");
    }

    acceptCookies.addEventListener("click", function () {
        setCookie("acceptCookies", true, 60);
        cookieAlert.classList.remove("show");
    });
})();

// Cookie functions stolen from w3schools
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

/*scroll button*/
$("#form-submit").click(function() {
   $([document.documentElement, document.body]).animate({
       scrollTop: $("#contact").offset().top
   }, 2000);
});


$( "#type_etablissement" ).change(function() {
             var type_etablissement = $( "#type_etablissement" ).val();
            if(type_etablissement == 'Collège'){
                 $('#college_uai').show();
				 $('#n_dec_pref').hide();
				$('#numero_siret').hide();
				$('#uai_rne').attr("required", "true");
                 
                 
            }else if(type_etablissement == 'Ecole élémentaire'){
               $('#college_uai').show();
			   $('#n_dec_pref').hide();
				$('#numero_siret').hide();
				$('#uai_rne').attr("required", "true");
                
            }else if(type_etablissement == 'Lycée'){
               $('#college_uai').show();
			   $('#n_dec_pref').hide();
				$('#numero_siret').hide();
				$('#uai_rne').attr("required", "true");
                
            }else if(type_etablissement == 'Université'){
               $('#college_uai').show();
			   $('#n_dec_pref').hide();
				$('#numero_siret').hide();
				$('#uai_rne').attr("required", "true");
                
            }else if(type_etablissement == 'Association'){
               $('#n_dec_pref').show();
			   $('#college_uai').hide();
			   $('#numero_siret').hide();
			   $('#declaration_prefecture').attr("required", "true");
                
            }else if(type_etablissement == 'Centre de formation'){
               $('#numero_siret').show();
			   $('#college_uai').hide();
			   $('#n_dec_pref').hide();
			   $('#n_siret').attr("required", "true");
                
            }else {
				$('#college_uai').hide();
				$('#n_dec_pref').hide();
				$('#numero_siret').hide();
				$('#type_etablissement').attr("required", "true");
			}


});
$('#numtel').attr("pattern" , "0[1-9][0-9]{8}");
$("input:radio").change(function () {
       if($("#autres_pays").prop('checked')){
           $('#pays').css('display','inline-block');
		   $('#pays').attr("required", "true");
		   $('#numtel').attr("pattern" , "[0-9]{3}[0-9]{10}");
		   $("numtel").attr({
       "max" : 13,        
       "min" : 10,
       	   
    });
       }else {
           $('#pays').css('display','none');
		   $('#numtel').attr("pattern" , "0[1-9][0-9]{8}");
		   $("numtel").attr({
       "max" : 10,        
       "min" : 10          
    });
		   
       }
       });
	   
	   
	  
	  
	   


