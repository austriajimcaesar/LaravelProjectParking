<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../css/vehicle.css" />
    <script type="text/javascript" src="{{ asset('css/app.js') }}"></script>
    <title>Vehicles</title>
</head>

<body>
    <div class="row">
        <div class="col s2 blue lighten-5">
            <ul id="slide-out" class="sidenav sidenav-fixed" style="width: 350px; background-color:  #5a5ccf; ; ">
                <li>
                    <div class="user-view">
                        <a href="#user">
                        <img class="square" style="width: 100% ; height: 100%;" src="../assets/parking.png"></a>

                    </div>
                </li>
                <li>
                    <div class="divider"></div>
                </li>
                <br><br>
             
                <a href="/admin"><button type="button" class="btn1 blue lighten-1 modal-trigger"><span class="fa fa-user icons1"></span>ADMIN</button></a><br><br>
                <a href="/vehicle"><button type="button" class="btn1 blue lighten-1 modal-trigger"><span class="fa fa-user icons1"></span>VEHICLE</button></a><br><br><br><br><br><br><br><br><br><br><br>
                <li><a button type="button" class="btn1 red lighten-1 modal-trigger white-text" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                          
            </ul>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <div class="container">
            </div>
        </div>
        <div class="container" >
        <div class="col s10">
            <div class="row">

            </div>
            <body class="background"></body>
  <!-- Orders card table -->
  <div class="card sizeCard" style="border-radius: 20px;">
            <div class="card-content black-text">
        
            <!-- Display all records in a table -->
            <p style="color: dimgray; font-size: 20px; font-weight: 600;">Outgoing Vehicles</p>
                <table style="margin-top: 50px;" id="vehiclestbl" class="striped" class="responsive-table" class="highlight">
            <!-- Start of table -->
                    <thead>
                        <tr>
                        <tr>
                            <th>Vehicle ID</th>
                            <th>Plate Number</th>
                            <th>Parking Price</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $vehicle)
                            <tr>
                                <td>{{ $vehicle->vId }}</td>
                                <td>{{ $vehicle->vPlatenum }}</td>
                                <td>{{ $vehicle->vPrice }}</td>
                                <td>{{ $vehicle->created_at }}</td> 
                                <td>{{ $vehicle->updated_at }}</td>      
                            </tr>
                        @endforeach
                    </tbody>
                </table>
     </div></div>
                <!-- End of table -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/scripts.js">
    </script>
</body>

</html>