{{-- Modal --}}
<div class="modal fade" id="{{ 'editModal' . $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="{{ 'formEdit' . $item['id'] }}" action="{{ url('/edit/' . $item['id']) }}" method="POST"
                enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{ $item['name'] }}">
                    <label for="status" class="form-label">Estado</label>
                    <input type="text" class="form-control" name="status" value="{{ $item['status'] }}">
                    <label for="species" class="form-label">Especie</label>
                    <input type="text" class="form-control" name="species" value="{{ $item['species'] }}">
                    <label for="type" class="form-label">Tipo</label>
                    <input type="text" class="form-control" name="type" value="{{ $item['type'] }}">
                    <label for="type" class="form-label">Genero</label>
                    <input type="text" class="form-control" name="gender" value="{{ $item['gender'] }}">
                    <label for="type" class="form-label">Origen</label>
                    <input type="text" class="form-control" name="origin_name" value="{{ $item['origin_name'] }}">
                    <label for="type" class="form-label">Ubicación</label>
                    <input type="text" class="form-control" name="origin_url" value="{{ $item['origin_url'] }}">
                    <label for="type" class="form-label">Imagen</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
