<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INICI</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/app.scss'])

</head>

<body>
    <div class="container-fluid h-100 d-flex flex-column justify-content-center align-items-center">
        <div class="row w-100 mb-1">
            <div class="col text-end">
                <div class="btn-group mt-3">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person"></i>
                        <span>{{ auth()->user()->nom }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end ">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-light" type="submit">Tancar Sessió</button>
                        </form>
                    </ul>
                </div>
            </div>
        </div>



        <div class="row justify-content-center align-items-center flex-grow-1">
            <div class="col-12 col-md-8 col-lg-6 text-center mb-2">
                <img src="https://via.placeholder.com/500x200" class="img-fluid">
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">

                <a href="{{ route('cartaTrucada') }}">
                    <div class="col text-center">

                        <img class="img-fluid" src="https://via.placeholder.com/300x150" alt="">
                        <h6>INICIAR TRUCADA</h6>

                    </div>
                </a>

                <a href="{{ route('expedients.index') }}">
                    <div class="col text-center">
                        <img class="img-fluid" src="https://via.placeholder.com/300x150" alt="">
                        <h6>GESTIONAR EXPEDIENTS</h6>
                    </div>
                </a>


                <div class="col text-center">

                    <img class="img-fluid" src="https://via.placeholder.com/300x150" alt="">
                    <h6>VIDEO INTERACTIU</h6>

                </div>

                <div class="col text-center">

                    <img class="img-fluid" src="https://via.placeholder.com/300x150" alt="">
                    <h6>GESTIONAR TRUCADES</h6>

                </div>

                <div class="col text-center">

                    <img class="img-fluid" src="https://via.placeholder.com/300x150" alt="">
                    <h6>OBSERVAR GRAFICS</h6>

                </div>

                @if (auth()->user()->tipus_usuaris_id === 3)
                    <a href="{{ route('gestioUsuaris') }}">
                        <div class="col text-center">
                            <img class="img-fluid" src="https://via.placeholder.com/300x150" alt="">
                            <h6>GESTIONAR USUARIS</h6>
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </div>
</body>



</html>
