<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../css/vehicle.css" />
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
                <a href="/transaction"><button type="button" class="btn1 blue lighten-1 modal-trigger"><span class="fa fa-user icons1"></span>TRANSACTION</button></a><br><br><br><br><br><br><br><br><br><br><br>
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
            <p style="color: dimgray; font-size: 20px; font-weight: 500;">Vehicles List</p>
            <!-- <img class="center" class="img-size" src="{{url('/assets/parkingback.png')}}" /><br> -->
                <table style="margin-top: 50px;" class="striped" class="responsive-table" class="highlight">
            <!-- Start of table -->
                    <thead>
                        
                            <th>Vehicle ID</th>
                            <th>Vehicle Model</th>
                            <th>Vehicle Brand</th>
                            <th>Plate Number</th>
                            <th>Parking Price</th>
                            <th>Action</th>
                            <th></th>
                        
                    </thead>
                    <tbody>
                        @foreach ($vehicle as $vehicle)
                            <tr>
                                <td>{{ $vehicle->vId }}</td>
                                <td>{{ $vehicle->vModel }}</td>
                                <td>{{ $vehicle->vBrand }}</td>
                                <td>{{ $vehicle->vPlatenum }}</td>
                                <td>{{ $vehicle->vPrice }}</td>
                                <td>
                                    <div class="action-btn" style="display: flex">
                                        <form method="POST" action=" {{ route('vehicle.update', $vehicle->vId)}}">
                                            @method('PUT')
                                            @csrf
                                            <div class="remove-btn">
                                                <button type="submit" class="waves-effect btn-flat blue darken-2 white-text">OUT</button>
                                            </div>
                                        </form>
                                        <form method="POST" action=" {{ route('vehicle.destroy', $vehicle->vId)}}">
                                            @method('DELETE')
                                            @csrf
                                           <div class="remove-btn">
                                                <button type="submit" class="waves-effect btn-flat red darken-2 white-text">Remove</button>
                                            </div>
                                        </form>
                                    </div>
                                </td>    
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