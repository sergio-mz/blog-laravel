<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::orderBy('id', 'desc')->paginate();

        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
        ]);

        /* $curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save(); */

        $curso = Curso::create($request->all()); /*otra forma de hacerlo*/

        return redirect()->route('cursos.show', $curso->id);
    }

    public function show(Curso $curso)
    {
        /* compact('curso'); es lo mismo que: ['curso' => $curso] */
        return view('cursos.show', ['curso' => $curso]);
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {

        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
        ]);

        /* $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save(); */

        $curso->update($request->all()); /* otra forma */

        return redirect()->route('cursos.show', $curso->id);
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index');
    }
}
