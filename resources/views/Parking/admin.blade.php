<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../css/admin.css" />
    <script type="text/javascript" src="{{ asset('css/app.js') }}"></script>
    <title>Admin</title>
</head>

<body>

    <div class="row">
        <div class="col s2 blue lighten-5">
            <ul id="slide-out" class="sidenav sidenav-fixed" style="width: 350px;background-color:  #5a5ccf; ; ">
                <li>
                    <div class="user-view">
                        <a href="#user"><img class="square" style="width: 100% ; height: 100%;" src="../assets/parking.png"></a>

                    </div>
                </li>
                <li>
                    <div class="divider"></div>
                </li>
                <br><br>
                
                <a href="/vehicle"><button type="button" class="btn1 blue lighten-1 modal-trigger"><span class="fa fa-user icons1"></span>VEHICLE</button></a><br><br>
                <a href="/transaction"><button type="button" class="btn1 blue lighten-1 modal-trigger"><span class="fa fa-user icons1"></span>TRANSACTION</button></a><br><br><br><br><br><br><br><br><br><br><br>
                
                                    <li><a button type="button" class="btn1 red lighten-1 white-text modal-trigger" href="{{ route('logout') }}"
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

<body class="background"></body>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card sizeCard blue lighten-5 ">
                <h3 class="card-header, center">{{ __('Parking Management System') }}</h3>
                <div class="card-image">
                <img class="center" src="{{url('/assets/picsur1.jpg')}}" /><br>
                <div class="card-body">
                    <form method="/" action="{{ route('transaction') }}">
                    
                        @csrf
                        <div class="form-group row mb-0" id="parked" class="card-action">
                            <div class="col-md-8 offset-md-4">
                           
                                <button type="submit" class="btn blue lighten-1 modal-trigger" class="btn" data-target="modal1">
                                    {{ __('Add Vehicle') }}
                                </button>
                                <br><br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
            {{-- Add Vehicle Modal --}}
            <div id="modal1" class="modal white">
                <div class="modal-content">
    
                    <div class="modalHeader">
                        <p class="header">Add Vehicle</p>
                        <a class="waves-effect waves-grey lighten-2 btn-flat modal-close"><i class="material-icons">close</i></a>
                    </div>
                    <div class="zontaline">
                        
                    </div>
                    <div class="modalImg">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>                                        
                                    @endforeach
                                </ul>
                            </div>                        
                        @endif
                        
                        <div class="addProductForm">
                            <div class="row">
                                <form class="col s12" method="POST" action="/vehicle" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                       
                                        <div class="input-field col s6">
                                            <select type="dropdown" id="vBrand" class="form-control @error('vBrand') is-invalid @enderror" name="vBrand" value="{{ old('vBrand') }}" autofocus>
                                                <option value=""></option>
                                                <option value="TOYOTA">TOYOTA</option>
                                                <option value="MITSUBISHI">MITSUBISHI</option>
                                                <option value="HONDA">HONDA</option>
                                                <option value="SUZUKI">SUZUKI</option>
                                                <option value="NISSAN">NISSAN</option>
                                                <option value="ISUZU">ISUZU</option>
                                                <option value="HYUNDAI">HYUNDAI</option>
                                                <option value="FORD">FORD</option>
                                                <option value="MAZDA">ISUZU</option>
                                                <option value="CHEVROLET">CHEVROLET</option>
                                                <option value="KIA">KIA</option>
                                                <option value="MG">MG</option>
                                                <option value="FOTON">FOTON</option>
                                                <option value="SUBARU">SUBARU</option>
                                                <option value="JEEP">JEEP</option>
                                                <option value="BMW">BMW</option>
                                                <option value="MERCEDES-BENZ">MERCEDES-BENZ</option>
                                                <option value="AUDI">AUDI</option>
                                            </select>
                                            <label style="font-family: 'Poppins', sans-serif;">Choose Type</label>
                                            @error('vBrand')
                                                <span class="invalid-feedback" role="alert"> 
                                                    {{ $message }}
                                                </span>                                
                                            @enderror
                                        </div>
                                        <div class="input-field col s6">
                                            <select type="dropdown" id="vType" class="form-control @error('vType') is-invalid @enderror" name="vType" value="{{ old('vType') }}" autofocus>
                                                <option value=""></option>
                                                <option value="SUV">SUV</option>
                                                <option value="TRUCK">TRUCK</option>
                                                <option value="VAN">VAN</option>
                                                <option value="SEDAN">SEDAN</option>
                                                <option value="PICKUP">PICKUP</option>
                                                <option value="MPV">MPV</option>
                                                <option value="COUPE">COUPE</option>
                                                <option value="CROSSOVER">CROSSOVER</option>
                                                <option value="HATCHBACK">HATCHBACK</option>
                                                <option value="CONVERTIBLE">CONVERTIBLE</option>
                                                <option value="MINIVAN">MINIVAN</option>
                                                <option value="WAGON">WAGON</option>
                                            </select>
                                            <label style="font-family: 'Poppins', sans-serif;">Choose Type</label>
                                            @error('vType')
                                                <span class="invalid-feedback" role="alert"> 
                                                    {{ $message }}
                                                </span>                                
                                            @enderror
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="vModel" type="text" class="form-control @error('vModel') is-invalid @enderror" name="vModel" value="{{ old('vModel') }}">
                                            <label for="vModel">Vehicle Model</label>
                                        </div>
                                        @error('vModel')
                                            <span class="invalid-feedback" role="alert"> 
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                        </div>
                                    <div class="form-group row">
                                        <div class="input-field col s6">
                                            <textarea id="vPlatenum" type="text" class="materialize-textarea form-control @error('vPlatenum') is-invalid @enderror" name="vPlatenum" value="{{ old('vPlatenum') }}"></textarea>
                                            <label for="vPlatenum">Vehicle Plate Number</label>
                                        </div>
                                        @error('vPlatenum')
                                            <span class="invalid-feedback" role="alert"> 
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-field col s6">
                                            <input id="vPrice" type="text" class="form-control @error('vPrice') is-invalid @enderror" name="vPrice" value="{{ old('vPrice') }}">
                                            <label for="vPrice">Vehicle Price</label>
                                        </div>
                                        @error('vPrice')
                                            <span class="invalid-feedback" role="alert"> 
                                                {{ $message }}
                                            </span>                                
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" class="waves-effect btn-flat blue darken-2 white-text addproduct-btn">
                                        {{ __('Add Customer') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End of Add Product Modal --}}
    




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