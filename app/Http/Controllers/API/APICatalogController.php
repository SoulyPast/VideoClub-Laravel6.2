<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Movie;
class APICatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( Movie::all() );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $movie = new Movie;
        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');
        $movie->save();
        return response()->json($movie, 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json( Movie::findOrFail( $id ), 200 );
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
        
        $movie_columns = array('title', 'year', 'director', 'poster', 'synopsis');
       
        for ($i = 0; $i < 5 ; $i++) {
            if($request->input($movie_columns[$i]) != null)
            {
                
                Movie::where('id', $id)
                ->update(
                    [$movie_columns[$i] => $request->input($movie_columns[$i]),],
                );
            }
        }
      
    
        return response()->json( Movie::findOrFail( $id ), 200 );
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail( $id ); 
        $movie->delete(); 
        return response()->json(['error' => false, 'msg' => 'Pelicula Elminada'], 200);
    }
    // Return the Movie
    public function putRent($id)
    {
        $movie = Movie::findOrFail( $id ); 
        $movie->rented = true; 
        $movie->save(); 
        
        return response()->json( ['error' => false, 'msg' => 'La pelicula se ha marcado como alquilada' ], 200 );
    }
    // Return the Movie
    public function putReturn($id)
    {
        $movie = Movie::findOrFail( $id ); 
        $movie->rented = FALSE; 
        $movie->save(); 
        
        return response()->json( ['error' => false, 'msg' => 'La pelicula ha sido marcada como devuelta' ], 200 );  
    }
}