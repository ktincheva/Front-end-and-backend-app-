<html>
    <head>
        @yield('head')

        <!-- Latest compiled and minified Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div id="header-container" class="container">
            @include('layouts.navbar')
            @yield('header')
        </div>

        <div id="main_container" class="container">
            @yield('content')
        </div>

        <div id="header-container" class="container">
            @include('layouts.footer')
            @yield('footer')
        </div>

        <!-- Latest compiled and minified jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Latest compiled and minified Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>
            var host = 'http://bus_stations.localhost.bg/'
            var sendRequest = function()
            {
                
                console.log("Send Request");
                var url = host+'getdata';
                    $.ajax({
                    type: 'POST',
                            cache: false,
                            url: url,
                            data: $('#searchForm').serializeArray(),
                            success: function(data){
                                console.log(data);
                                $("#responcedata").html(data);
                            },
                       
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                            $("#responcedata").html('<div class="error">' + XMLHttpRequest.responseText + '</div>');
                    }
                });
               // return false;
            }
            $('#sendRequest').click(function (event) {
                event.preventDefault(); 
                console.log('cliki miki');
               sendRequest();
            });
            var getCities = function()
            {
            console.log("Send Request");
                var url = host+'getcities';
                    $.ajax({
                    type: 'POST',
                            cache: false,
                            url: url,
                            data: $('#searchForm').serializeArray(),
                            success: function(data){
                                console.log(data);
                                $("#from_city").html(data);
                                $("#to_city").html(data);
                            },
                       
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                            $("#error").html('<div class="error">' + XMLHttpRequest.responseText + '</div>');
                    }
                });
               // return false;
           }
           getCities();
        </script>    
        @yield('scripts')

    </body>
</html>