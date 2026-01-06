<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/demo/favicon.png">
    <title>{{ $title ?? 'Page Title' }}</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600%7CRoboto:400" rel="stylesheet" type="text/css">
    <link href="/assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/vendors/mono-social-icons/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="/assets/vendors/feather-icons/feather.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body class="body-bg-full profile-page" style="background-image: url(/assets/img/site-bg.jpg)">
    <div id="wrapper" class="row wrapper">
        <div class="col-10 ml-sm-auto col-sm-8 col-md-10 ml-md-auto login-center mx-auto">
            <div class="navbar-header text-center mt-2 mb-4">
                <h5>Apply Lamaran Kamu</h5>
            </div>
            {{ $slot }}
            <footer class="col-sm-12 text-center">
                <hr>
                <p>Sudah Apply Lamaran? <a href="#" class="text-primary m-l-5"><b>Lacak Lamaran Kamu!</b></a>
                </p>
            </footer>
        </div>
        <!-- /.login-center -->
    </div>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/assets/js/material-design.js"></script>
</body>

</html>