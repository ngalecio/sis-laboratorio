<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $buscar = $request->get('search');
        $query = Categoria::query();
        if ($buscar) {
            $query->where('nombre', 'like', '%' . $buscar . '%')
                ->orWhere('descripcion', 'like', '%' . $buscar . '%');
        }
    



        $categorias = $query->paginate(ENV('PAGE_SIZE'));
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'pagina' => 'nullable|string|max:255',
            'fila' => 'nullable|string|max:255',
            'col' => 'nullable|string|max:255',
            'col2' => 'nullable|string|max:255',
            'orden' => 'nullable|string|max:255',
        ]);

        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->slug = Str::slug($request->nombre);
        $categoria->descripcion = $request->descripcion;
        $categoria->pagina = $request->pagina;
        $categoria->fila = $request->fila;
        $categoria->col = $request->col;
        $categoria->col2 = $request->col2;
        $categoria->orden = $request->orden;
        $categoria->save();
        return redirect()->route('admin.categorias.index')
            ->with('mensaje', 'Categoria creada exitosamente.')
            ->with('icono', 'success');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id);
        return view('admin.categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $categoria = Categoria::find($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

   
        $request->validate([
            'nombre' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'pagina' => 'nullable|string|max:255',
            'fila' => 'nullable|string|max:255',
            'col' => 'nullable|string|max:255',
            'col2' => 'nullable|string|max:255',
            'orden' => 'nullable|string|max:255',
        ]);

        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->slug = Str::slug($request->nombre);
        $categoria->descripcion = $request->descripcion;
        $categoria->pagina = $request->pagina;
        $categoria->fila = $request->fila;
        $categoria->col = $request->col;
        $categoria->col2 = $request->col2;
        $categoria->orden = $request->orden;
        $categoria->save();
        return redirect()->route('admin.categorias.index')
            ->with('mensaje', 'Categoria actualizada exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);

        $categoria->delete();
        return redirect()->route('admin.categorias.index')
            ->with('mensaje', 'Categoria eliminada exitosamente.')
            ->with('icono', 'success');
    }
}
