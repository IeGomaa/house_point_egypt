<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Error 403</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/assets/img/favicon.ico') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('dashboard/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/css/pages/error/style-400.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

</head>
<body class="error404 text-center">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 mr-auto mt-5 text-md-left text-center">
            <img alt="image-404" src="{{ asset('dashboard/assets/img/90x90.jpg') }}" class="theme-logo">
        </div>
    </div>
</div>
<div class="container-fluid error-content">
    <div class="">
        <h1 class="error-number">403</h1>
        <p class="mini-text">Ooops!</p>
        <p class="error-text mb-4 mt-1">Unauthorized To Access This Page</p>
    </div>
</div>
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('dashboard/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('dashboard/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('dashboard/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>