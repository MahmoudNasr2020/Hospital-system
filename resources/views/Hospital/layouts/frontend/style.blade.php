<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
<meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
<meta name="author" content="pixelstrap">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{ asset('Hospital/Images/'.\App\helper\settings()->icon) }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('Hospital/Images/'.\App\helper\settings()->icon) }}" type="image/x-icon">
<title>{{ \App\helper\settings()->site_name }}</title>
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo&family=Harmattan&family=Katibeh&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" /><!-- ico-font-->
<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/assets/css/vendors/icofont.css') }}">
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/assets/css/vendors/flag-icon.css') }}">
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/assets/css/vendors/scrollbar.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

@yield('style')

<!-- Plugins css Ends-->
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/assets/css/vendors/bootstrap.css') }}">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/assets/css/style.css') }}">
<link id="color" rel="stylesheet" href="{{ asset('Dashboard/assets/css/color-1.css') }}" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/assets/css/responsive.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('Dashboard/assets/css/view-customers.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('Dashboard/assets/noty/noty.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('Dashboard/assets/noty/relax.css')}}">
<style>
    .dt-buttons
    {
        width: 100% !important;
        display: block !important;
        margin-bottom: 15px !important;
        margin-top: 10px !important;

    }
    .dataTables_length
    {
        display: inline-block !important;
    }
    .dataTableBuilder_filter
    {
        display: inline-block !important;
    }
</style>
