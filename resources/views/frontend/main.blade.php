<!DOCTYPE html>
<html lang="fr">
<head>
    <title>WebSchool 1.0</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('page_accueille/css/bootstrap.min.css') }}">

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="EducScol est un logiciel en ligne de gestion d'école. Nous fournissons une communication entre l'administration et les parents pour améliorer la vie scolaire.">
    <meta name="keywords" content=" EducScol, inscription en ligne, vie scolaire, éducation, gestion d'école, espace élève, application web, solution pour gestion de college, solution pour gestion de lycée, école,enseignants, gestion de vie scolaire, parents, absences, emploi du temps, gestion de élèves, gestion des enseignants, gestion d'inscription, ">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('page_accueille/images/site.png') }}" />

    <link rel="stylesheet" href="{{ asset('page_accueille/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('page_accueille/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('page_accueille/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('page_accueille/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('page_accueille/css/style.css') }}"> 
    
    <link rel="stylesheet" href="{{ asset('page_accueille/css/templatemo-style.css') }}"> 
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127735373-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-127735373-2');
    </script>

    <script src="{{ asset('page_accueille/recaptcha/api.js') }}" async defer></script>
   

	
	@yield('styles')
</head>
<body class="">

       
    @include('frontend.header')

    
	 <div id="app">	

         @yield('main')
         
	 </div>




	 @include('frontend.footer')
    <script type='text/javascript' src='{{ asset('page_accueille/js/jquery.js')}}'></script>
    <script type='text/javascript' src='{{ asset('page_accueille/js/owl.carousel.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('page_accueille/js/smoothscroll.js') }}'></script>
    <script type='text/javascript' src='{{ asset('page_accueille/js/custom.js') }}'></script> 
    <script src="{{ asset('page_accueille/js/bootstrap.min.js') }}"></script>
  

	@yield('scripts')

	
</body>
</html>