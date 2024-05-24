<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@extends('plantilla.principal')

@section('titulo', 'Administracio Usuaris')

@section('contingut')



    <!-- Modal -->
    <div class="modal fade" id="modaluser" tabindex="-1" aria-labelledby="modaluserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaluserLabel">Dades del Usuari</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('usuaris.store') }}">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="nom">Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="cognoms">Cognoms:</label>
                            <input type="text" class="form-control" id="cognoms" name="cognoms" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="username">Nom d'usuari:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="contrasenya">Contrasenya:</label>
                            <input type="password" class="form-control" id="contrasenya" name="contrasenya" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="tipus_usuaris_id">Tipus d'usuari:</label>
                            <select class="form-select" id="tipus_usuaris_id" name="tipus_usuaris_id" required>
                                <option value="1">Operador 112</option>
                                <option value="2">Supervisor 112</option>
                                <option value="3">Administrador Sistema</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row mt-4">
            <div class="form-group mt-3 mb-3">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modaluser">Crear
                    Usuari</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">USUARIS</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('usuaris.search') }}" method="GET">
                            <div class="input-group mb-4">
                                <input type="text" class="form-control me-3" placeholder="Buscar per Nom i/o Cognom"
                                    name="search">
                                <div class="input-group-append mr-4">
                                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                    <form action="{{ route('usuaris.search') }}" method="GET">
                                        <button class="btn btn-outline-secondary" type="submit">Borrar filtres</button>
                                    </form>
                                </div>
                            </div>
                        </form>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Cognom</th>
                                    <th>Usuari</th>
                                    <th>Contrasenya</th>
                                    <th>Tipus Usuari</th>
                                    <th>Accions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuaris as $usuari)
                                    @if ($usuari)
                                        <tr>
                                            <td>{{ $usuari->nom }}</td>
                                            <td>{{ $usuari->cognoms }}</td>
                                            <td>{{ $usuari->username }}</td>
                                            <td>{{ $usuari->contrasenya }}</td>
                                            <td>{{ $usuari->tipus_usuaris_id }}</td>
                                            <td>
                                                <a href="{{ route('modificarUsuari', $usuari) }}"
                                                    class="btn btn-sm btn-primary">Modificar</a>

                                                <form action="{{ route('usuaris.destroy', $usuari) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        {{ $usuaris->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



<script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert-success").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);

        setTimeout(function() {
            $(".alert-danger").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    });
</script>

