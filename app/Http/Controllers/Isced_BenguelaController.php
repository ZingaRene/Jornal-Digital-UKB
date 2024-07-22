<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Noticia;
use App\Sugestao;
use Input;

class Isced_BenguelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function   eliminnoticiaben($id)
    {
             $noticia    = Noticia::find($id);
             $noticia->delete();
             $sugestoe   = Sugestao::all(); 
             $noticias   = Noticia::whereInstituicao('ISCED BENGUELA')->get();  
       return view('isced_b')->with('noticias', $noticias)
                                 ->with('sugestoes', $sugestoe);
    }

    public function   eliminsugestaoben($id)
    {
              $sugestao = Sugestao::find($id);
              $sugestao->delete();
              $sugestoe  = Sugestao::all(); 
             $noticias   = Noticia::whereInstituicao('ISCED BENGUELA')->get();  
       return view('isced_b')->with('noticias', $noticias)
                                 ->with('sugestoes', $sugestoe);
    }

    
      public function Adicionar(Request $req)
    {
        
        $file      = $req->file('imagem');
        $extension = $file->getClientOriginalExtension();
        //return $file;
        $name      = $file->getFilename().'.'.$extension;
        Storage::put($name,File::get($file));

        $noticia                    = new Noticia();
        $noticia->mime              = $file->getClientMimeType();
        $noticia->original_filename = $file->getClientOriginalName();
        $noticia->filename          = $name;
        $noticia->informacao=$req->get('informacao');
        $noticia->instituicao=            'ISCED BENGUELA'      ;
        $noticia->save();

$sugestoes  = Sugestao::all();
$noticias   = Noticia::whereInstituicao('ISCED BENGUELA')->get();  
return view('isced_b')->with('noticias', $noticias)
                      ->with('sugestoes',$sugestoes);
    }
    
// FUNÇÃO FAZENDO BUCAS & RETORNANDO NOTICIAS DO ISCED-BENGUELA
     public function Buscar()
    {
      $noticias   = Noticia::whereInstituicao('ISCED BENGUELA')->get(); 
       return view('isced_b')->with('noticias', $noticias); 
    }

 
}
