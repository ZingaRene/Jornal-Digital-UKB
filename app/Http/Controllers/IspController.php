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

class IspController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return view('isp');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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

     public function   eliminnoticiaisp($id)
    {
             $noticia    = Noticia::find($id);
             $noticia->delete();
             $sugestoe   = Sugestao::all(); 
             $noticias   = Noticia::whereInstituicao('ISP')->get();  
       return redirect('isp')->with('noticias', $noticias)
                                 ->with('sugestoes', $sugestoe);
    }

    public function   eliminsugestaoisp($id)
    {
              $sugestao = Sugestao::find($id);
              $sugestao->delete();
              $sugestoe  = Sugestao::all(); 
             $noticias   = Noticia::whereInstituicao('ISP')->get();  
       return redirect('isp')->with('noticias', $noticias)
                                 ->with('sugestoes', $sugestoe);
    }
   
    
     public function Adicionar(Request $req)
    {
        
        $file      = $req->file('imagem');
        $extension = $file->getClientOriginalExtension();
        //return $file;
        $name = $file->getFilename().'.'.$extension;

        Storage::put($name,File::get($file));

        $noticia                    = new Noticia();
        $noticia->mime              = $file->getClientMimeType();
        $noticia->original_filename = $file->getClientOriginalName();
        $noticia->filename          = $name;
        $noticia->informacao        =$req->get('informacao');
        $noticia->instituicao       ='ISP'      ;
        $noticia->save();

        $noticias   = Noticia::whereInstituicao('ISP')->get();
         $sugestoe  = Sugestao::all(); 
       return view('isp')->with('noticias', $noticias)
                         ->with('sugestoes', $sugestoe);
    }
    

 // FUNÇÃO FAZENDO BUCAS & RETORNANDO NOTICIAS DO ISP
    public function Buscar()
    {
      $noticias   = Noticia::whereInstituicao('ISP')->get();
       
      // $curso   = Curso::whereNome($req->get('nome'))->first();
      // $noticias = Noticia::all();
      //return view('teste',['noticias'=>$noticias]);  
       return view('isp')->with('noticias', $noticias); 
    }
    
    public function teste()
    {
      return view('teste');  
    }
    
    public function getFile($filename){
        $entry = Fileentry::where('filename','=',$filename)
                ->firstOrFail();
        $file = Storage::get($entry->filename);
        return (new Response($file,200))
            ->header('Content-Type',$entry->mime);
    }
}
