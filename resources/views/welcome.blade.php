<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prueba de laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Agrega esto en la sección de encabezado de tu vista -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
    @if (session('message'))
        <script>
            // Configuración básica de SweetAlert2
            Swal.fire({
                title: "¡Éxito!",
                text: "{{ session('message') }}",
                icon: "success",
                confirmButtonText: "Aceptar"
            });
        </script>
    @endif
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="https://www.infotegra.com/wp-content/uploads/2022/08/logo_infotegra.jpg"
                    title="MANUAL DE IMAGEN INFOTEGRA" alt="MANUAL DE IMAGEN INFOTEGRA" loading="lazy" width="200">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <h1 class="text-center">Prueba de laravel</h1>
                <h3 class="text-center">Por: Laura Vanessa Torres Caballero</h2>
            </div>
            <a type="button" class=" btn btn-outline-primary" href="{{ url('/ConsumeApi') }}">Consultar información</a>
            <div class="col-12 my-3">
                @if (isset($data))
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Estados</th>
                                <th scope="col">Especie</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['status'] }}</td>
                                    <td>{{ $item['species'] }}</td>
                                    <td>
                                        <a type="button" class=" btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="{{ '#detailModal' . $item['id'] }}">Ver
                                            más</a>
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="{{ '#editModal' . $item['id'] }}">Editar</button>
                                    </td>
                                    <x-view :item="$item" />
                                    <x-form :item="$item" />
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links('pagination::bootstrap-4') }}
                @endif
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
</script>

</html>
