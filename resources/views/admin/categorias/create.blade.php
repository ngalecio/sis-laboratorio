@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h4>Creación de Categoria</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/categorias/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="name">Nombre del Categoria(*)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                                        class="form-control" placeholder="Ingrese el nombre de la categoría" required>
                                </div>
                                @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="slug">Slug(*)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="text" name="slug" id="slug" required readonly value="{{ old('slug') }}"
                                        class="form-control" placeholder="Ingrese el slug de la categoría">
                                </div>
                                @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="password">Descripcion</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <textarea name="descripcion" id="descripcion" 
                                    class="form-control" rows="3" 
                                    placeholder="Ingrese la descripción de la categoría">{{ old('descripcion') }}</textarea>
                        
                          
                                </div>
              
                            </div>

                        </div>
             
                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pagina">Pagina</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-file-earmark-text-fill"></i></span>
                                                    <input type="text" name="pagina" id="pagina" value="{{ old('pagina') }}"
                                                        class="form-control" placeholder="Ingrese la página">
                                                </div>
                                                @error('pagina')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fila">Fila</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-list-ol"></i></span>
                                                    <input type="text" name="fila" id="fila" value="{{ old('fila') }}"
                                                        class="form-control" placeholder="Ingrese la fila">
                                                </div>
                                                @error('fila')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="col">Columna</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-columns-gap"></i></span>
                                                    <input type="text" name="col" id="col" value="{{ old('col') }}" class="form-control"
                                                        placeholder="Ingrese la columna">
                                                </div>
                                                @error('col')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="col2">Columna 2</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-columns-gap"></i></span>
                                                    <input type="text" name="col2" id="col2" value="{{ old('col2') }}"
                                                        class="form-control" placeholder="Ingrese la columna 2">
                                                </div>
                                                @error('col2')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="orden">Orden</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-sort-numeric-down"></i></span>
                                                    <input type="text" name="orden" id="orden" value="{{ old('orden') }}"
                                                        class="form-control" placeholder="Ingrese el orden">
                                                </div>
                                                @error('orden')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/categorias') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Registrar Categoria</button>

                            </div>
                        </div>
                    </div>
                </form>


                <!-- <form action="{{ url('/admin/ajustes/create') }}" method="POST" enctype="multipart/form-data">     -->


            </div>

        </div>
    </div>
</div>
<script>
    // Generar el slug automáticamente al escribir el nombre
    document.getElementById('nombre').addEventListener('input', function() {
        var nombre = this.value;
        // Reemplaza letras con tilde por su equivalente sin tilde
        var slug = nombre
            .replace(/[áàäâã]/gi, 'a')
            .replace(/[éèëê]/gi, 'e')
            .replace(/[íìïî]/gi, 'i')
            .replace(/[óòöôõ]/gi, 'o')
            .replace(/[úùüû]/gi, 'u')
            .replace(/ñ/gi, 'n')
            .toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection