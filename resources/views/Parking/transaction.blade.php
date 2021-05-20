<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../css/transaction.css" />
    <title>Transaction</title>
</head>

<body>
    <div class="row">
        <div class="col s2">
            <ul id="slide-out" class="sidenav sidenav-fixed" style="width: 350px;background-color:  #5a5ccf; ; ">
                <li>
                    <div class="user-view">
                        <a href="#user"><img class="circle" style="width: 100% ; height: 100%;" src="../assets/parkinglogo.png"></a>
                    </div>
                </li>


                <li>
                    <div class="divider"></div>
                </li>
                <br><br>
                <form method="/" action="{{ route('admin') }}">
                        @csrf
                        <div class="form-group row mb-0" id="admin" class="card-action">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn1 blue lighten-1 modal-trigger" class="btn" id="admin">
                                    {{ __('ADMIN') }}
                                </button><br><br>
                            </div>
                        </div>
                    </form>
                    <form method="/" action="{{ route('vehicle') }}">
                        @csrf
                        <div class="form-group row mb-0" id="vehicle" class="card-action">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn1 blue lighten-1 modal-trigger" class="btn" id="vehicle">
                                    {{ __('VEHICLE') }}
                                </button><br><br><br><br><br><br><br>
                            </div>
                        </div>
                    </form><br><br><br>
                    <form method="/" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row mb-0" id="out" class="card-action">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn1 red lighten-1 modal-trigger" class="btn" id="out">
                                    {{ __('LOGOUT') }}
                                </button><br><br>
                            </div>
                        </div>
                    </form>
                <!-- <li><a class="waves-effect " style="color: white; " href="http://localhost/parking1/www/Admin.html ">Admin</a></li>
                <li> <a class="waves-effect " style="color: white; " href="http://localhost/parking1/www/index.html ">Vehicles parked</a></li>
                <li><a class="waves-effect " style="color: white; " href=" http://localhost/parking1/www/transaction.html ">Transaction</a></li> -->

            </ul>
            <a href="# " data-target="slide-out " class="sidenav-trigger "><i class="material-icons ">menu</i></a>
            <div class="container">
            </div>
        </div>

        <div class="container" >
        <div class="col s10">
            <div class="row">

            </div>
            <!-- Display all records in a table -->
            <body class="background"></body>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card sizeCard blue lighten-5 ">
                <h3 class="card-header, center">{{ __('Vehicle Transaction') }}</h3>
                <img class="center" src="{{url('/assets/parkingback.png')}}" /><br>
                <table style="margin-top: 50px;" class="striped" class="responsive-table" class="highlight">
                <thead>
                <thead>

                        <th>record #</th>
                <!-- <th>Transaction Number</th> -->
                <th>Vehicle Plate Number</th>
                <th>Time in</th>
                <th>Time out</th>
                <th>Total</th>
                <th>Action</th>

                </thead>
                <tbody id="records1"></tbody>
                </table>                         
        </div>
    </div>
</div>
            <div class="container">

                <div id="modal2" class="modal">
                    <div class="modal-content">
                        <div class="col s12 m8 l9">



                            <label for="vPlatenum1">Plate Number</label>
                            <input id="vPlatenum1" type="text" disabled placeholder="Plate Number" /><br>

                            <label for="vDeparture1">Time Out</label>
                            <input id="vDeparture1" type="time" placeholder="Time Out" /><br>

                            <label for="parkTamount1">Total Amount</label>
                            <input id="parkTamount1" type="text" disabled placeholder="Total Amount" /><br>



                            <a class="waves-light btn" onclick="edit_transaction()"> <i class="material-icons Right">done</i>Done</a>
                        </div>
                    </div>
                </div>

                <br>
                <br>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/scripts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>
</body>

</html>