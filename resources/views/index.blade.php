<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <title>View Keeper</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">
                            <img alt="V-Keep" style="width: 27%;margin-top:-7px;" src="https://dewey.tailorbrands.com/production/brand_version_mockup_image/32/850206032_81c2ef8a-c958-4574-a39e-2490f5656f3f.png">
                        </a>
                    </div>
                    <div class="pull-right">
                        <div style="padding: 5px">
                            <div class="panel-body">
                                <a href="{{action('LoginController@logout')}}">
                                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                </a>    
                            </div>
                        </div>        
                    </div>
                </div>
            </nav>

            <div id="app">
                @include('elements.flash')
                @yield('content')
            </div>

            <nav class="navbar navbar-default navbar-fixed-bottom">
                <div class="container text-center"></br>
                    <a href="#">Copyright@ 2018</a>  
                </div>
            </nav>
        </div>
    </div>
    <script>
        window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
    </script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>