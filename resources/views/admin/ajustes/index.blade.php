@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Ajustes de Inventario Registradas
                    <a href="{{ url('/admin/ajustes-inventario/0/edit') }}" style="float: right; margin-left: 10px;"
                        class="btn btn-primary">
                        <i class="bi bi-plus"></i> Crear Nuevo</a>
                    <button id="btn-crear-pdf" type="button" class="btn btn-primary"
                        style="float: right; margin-left: 10px;" onclick="reporte_ajustes_inventario_pdf()">
                        <i class="bi bi-file-earmark-pdf"></i> PDF
                    </button>
                </h4>

            </div>
            <div class="card-body">
                <form action="{{ url('/admin/ajustes-inventario') }}" method="GET">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fecha-desde">Fecha Desde (*)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                    <input type="date" name="fecha-desde" id="fecha-desde" class="form-control"
                                        value="{{ $fecha_desde ?? request('fecha-desde') }}" required>
                                </div>
                                <small class="text-danger" id="error-fecha-desde"></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fecha-hasta">Fecha Hasta (*)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                    <input type="date" name="fecha-hasta" id="fecha-hasta" class="form-control"
                                        value="{{ $fecha_hasta ?? request('fecha-hasta') }}" required>
                                </div>
                                <small class="text-danger" id="error-fecha-hasta"></small>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="codigo-catalogo">Texto a Buscar (*)</label>

                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                    <input type="text" id="search" name="search" class="form-control"
                                        value="{{ $buscar ?? request('search') }}" placeholder="Buscar compras...">
                                    <button id="btn-buscar-citas" type="submit" class="btn btn-primary">
                                        <i class="bi bi-search"></i>Buscar</button>
                                </div>
                            </div>
                        </div>


                </form>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Comprobante</th>
                            <th>Proveedor</th>
                            <th>Fecha</th>
                            <th>Subtotal</th>
                            <th>Iva</th>
                            <th>Total</th>


                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ajustes as $ajuste)
                        <tr>
                            <td>{{ ($ajustes->currentPage() -1)*$ajustes->perPage()+$loop->iteration }}</td>
                            <td>{{ $ajuste->numero_comprobante }}</td>
                            <td>{{ $ajuste->cliente->apellidos }} {{ $ajuste->cliente->nombres }}</td>
                            <td>{{ \Carbon\Carbon::parse($ajuste->fecha)->format('d/m/Y') }}</td>
                            <td>$ {{ number_format($ajuste->valor_subtotal, 2, '.', ',') }}</td>
                            <td>$ {{ number_format($ajuste->valor_iva, 2, '.', ',') }}</td>
                            <td>$ {{ number_format($ajuste->valor_total, 2, '.', ',') }}</td>

                            <td class="text-center">
                                <a href="{{ url('/admin/ajustes-inventario/'.$ajuste->id) }}" class="btn btn-sm btn-info ">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ url('/admin/ajustes-inventario/'.$ajuste->id.'/edit') }}"
                                    class="btn btn-sm btn-success "><i class="bi bi-pencil"></i>

                                </a>
                                <form action="{{ url('/admin/ajustes-inventario/delete/'.$ajuste->id) }}" method="POST"
                                    id="delete-form-{{ $ajuste->id }}" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger "
                                        onclick="preguntar({{$ajuste->id}}, event);">
                                        <i class="bi bi-trash"></i></button>
                                </form>
                                <script>
                                    function preguntar(id, event) {
                                        event.preventDefault();
                                        Swal.fire({
                                            title: '¿Estás seguro de eliminar este ajuste?',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Eliminar',
                                            cancelButtonText: 'Cancelar'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                document.getElementById('delete-form-' + id).submit();
                                            }
                                        });
                                    }
                                </script>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($ajustes->hasPages())
                <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                    <div class="text-muted">
                        Mostrando {{ $ajustes->firstItem() }} a {{ $ajustes->lastItem() }} de {{
                        $ajustes->total() }} registros
                    </div>
                    {{ $ajustes->links('pagination::bootstrap-4') }}
                </div>
                @endif

            </div>



        </div>
    </div>
</div>
</div>

@endsection

@push('scripts')
<script>

    function reporte_ajustes_inventario_pdf() {

        // Recuperar los valores de los campos de fecha
        const fechaDesde = document.getElementById('fecha-desde').value;
        const fechaHasta = document.getElementById('fecha-hasta').value;
        // Valida el estado con operador ternario
        let estado = document.getElementById('estado') ? document.getElementById('estado').value : '';
        const search = document.getElementById('search').value;

        // Construir la URL con los parámetros
        const url = `{{ url('/admin/ajustes-inventario/reporteajustespdf') }}?search=${encodeURIComponent(search)}&fecha-desde=${encodeURIComponent(fechaDesde)}&fecha-hasta=${encodeURIComponent(fechaHasta)}`;
        window.open(url, '_blank');

    }

    // function f_fecha_desde_mes() {
    //     const today = new Date();
    //     const yyyy = today.getFullYear();
    //     const mm = String(today.getMonth() + 1).padStart(2, '0');
    //     return `${yyyy}-${mm}-01`;
    // }

    // function f_fecha_hasta_mes() {
    //     const today = new Date();
    //     const yyyy = today.getFullYear();
    //     const mm = today.getMonth() + 1;
    //     // Obtener el último día del mes en curso
    //     const lastDay = new Date(yyyy, mm, 0).getDate();
    //     return `${yyyy}-${String(mm).padStart(2, '0')}-${String(lastDay).padStart(2, '0')}`;
    // }
    // document.addEventListener('DOMContentLoaded', function () {
    //     // Obtener la URL actual




    //     document.getElementById('fecha-desde').value = f_fecha_desde_mes()
    //     document.getElementById('fecha-hasta').value = f_fecha_hasta_mes()

    //     cargarProductosInsumos();
    // });
</script>
@endpush