{{-- Modal --}}
<div class="modal fade modal-lg" id="{{ 'detailModal' . $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detailModal">{{ $item['name'] }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6"><img
                            src="{{ $item['image'] = str_contains($item['image'], 'https') ? $item['image'] : asset('images/' . $item['image']) }}"
                            alt="{{ $item['name'] }}" class="img-fluid"></div>
                    <div class="row col-6">
                        <div class="col-6"><strong>Nombre: </strong>{{ $item['name'] }}</div>
                        <div class="col-6"><strong>Estado: </strong>{{ $item['status'] }}</div>
                        <div class="col-6"><strong>Especie: </strong>{{ $item['species'] }}</div>
                        <div class="col-6"><strong>Tipo: </strong>{{ $item['type'] ? $item['type'] : 'No registra' }}
                        </div>
                        <div class="col-6"><strong>Genero: </strong>{{ $item['gender'] }}</div>
                        <div class="col-6"><strong>Origen: </strong>{{ $item['origin_name'] }}</div>
                        <div class="col-6"><strong>Ubicación: </strong>{{ $item['origin_url'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
