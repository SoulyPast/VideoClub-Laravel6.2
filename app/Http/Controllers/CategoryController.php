<?php

namespace App\Http\Controllers;
use Notify;
use Illuminate\Http\Request;
use App\Categorie;
use App\Movie;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar category
        $Categories=Categorie::all();
        return view('category.index', array( 'Categories' => $Categories));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Categorie;
        $p->title = $request->input('title');
        $p->description = $request->input('description');
        if($request->input('adult')=="SI"){$p->adult = true;}
        else{$p->adult = false;}
        $p->save();
        Notify::success("se ha guardado correctamente");
        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Movies=Movie::all()->where('category_id','=',$id);
        return view('category.show',array('Movies' => $Movies));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Categorie=Categorie::findOrFail($id);
        return view('category.edit', array('Categorie'=>$Categorie));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Categorie=Categorie::findOrFail($id);
            $Categorie->title = $request->input('title');
            $Categorie->description = $request->input('description');
            if($request->input('adult')=="SI"){$Categorie->adult = true;}
            else{$Categorie->adult = false;}
            $Categorie->save();
            Notify::success("se ha modificado correctamente");
            return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //borra category
        $Categorie=Categorie::findOrFail($id);
        $Categorie->delete();
        notify()->error('Categoria Borrada')->delay(1500);
        return redirect('category');
    }
}
