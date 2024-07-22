<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Noticia;
use App\Clima;
use App\Cambio;
use App\Sugestao;
use App\Usuario;
use App\user;
use Input;


class AdministracaoController extends Controller
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
     public function   eliminnoticia($id)
    {
             $noticia    = Noticia::find($id);
             $noticia->delete();
        
        $cambio     = Cambio::all();
        $clima      = Clima::all();
        $usuarios   = Usuario::all(); 
        $noticias   = Noticia::all();  
        $sugestoes  = Sugestao::all();
       return view('Admin_geral')->with('noticias', $noticias)
                                 ->with('usuarios', $usuarios) 
                                 ->with('sugestoes', $sugestoes)
                                 ->with('clima', $clima) 
                                 ->with('cambio', $cambio);
    }

    public function   eliminsugestao($id)
    {
        $sugestao = Sugestao::find($id);
        $sugestao->delete();
        
        $cambio     = Cambio::all();
        $clima      = Clima::all();
        $usuarios   = Usuario::all(); 
        $noticias   = Noticia::all();  
        $sugestoes  = Sugestao::all();
       return view('Admin_geral')->with('noticias', $noticias)
                                 ->with('usuarios', $usuarios) 
                                 ->with('sugestoes', $sugestoes)
                                 ->with('clima', $clima) 
                                 ->with('cambio', $cambio);
    }
   
    public function AddClima(Request $request)
    {
        
        $clima             = new Clima();
        $clima->benguela   = $request->get('benguela' );
        $clima->ganda      = $request->get('ganda'    );
        $clima->cubal      = $request->get('cubal'    );
        $clima->chongoroi  = $request->get('chongoroi');
        $clima->caimbambo  = $request->get('caimbambo');
        $clima->balombo    = $request->get('balombo'  );
        $clima->lobito     = $request->get('lobito'   );
        $clima->bocoio     = $request->get('bocoio'   );
        $clima->baia       = $request->get('baia'     );
        
        $clima->save();
        
        $cambio     = Cambio::all();
        $clima      = Clima::all();
        $usuarios   = Usuario::all(); 
        $noticias   = Noticia::all();  
        $sugestoes  = Sugestao::all();
       return view('Admin_geral')->with('noticias', $noticias)
                                 ->with('usuarios', $usuarios) 
                                 ->with('sugestoes', $sugestoes)
                                 ->with('clima', $clima) 
                                 ->with('cambio', $cambio);   
    }
    
    public function AddCambio(Request $request)
    {
        $cambio                   = new Cambio();

        $cambio->dolar_americano    = $request->get('dolar'    );
        $cambio->real_brasileiro    = $request->get('real'     );
        $cambio->yuan_chines        = $request->get('yuan'     );
        $cambio->franco_congoles    = $request->get('francoc'  );
        $cambio->metical_mocambicano= $request->get('metical'  );
        $cambio->rand_namibiano     = $request->get('randn'    );
        $cambio->rand_sulafrica     = $request->get('rands'    );
        $cambio->escudo_cverde      = $request->get('escudocv' );
        $cambio->Escudo_portugal    = $request->get('escudopt' );
        $cambio->dobra_stome        = $request->get('dobrast'  );
        $cambio->centavo_tleste     = $request->get('sentavotl');
        $cambio->pataca_macau       = $request->get('patacamc' );
        
        $cambio->save();
        
        $cambio     = Cambio::all();
        $clima      = Clima::all();
        $usuarios   = Usuario::all(); 
        $noticias   = Noticia::all();  
        $sugestoes  = Sugestao::all();
       return view('Admin_geral')->with('noticias', $noticias)
                                 ->with('usuarios', $usuarios) 
                                 ->with('sugestoes', $sugestoes)
                                 ->with('clima', $clima) 
                                 ->with('cambio', $cambio);
    }
    
    
     public function ElinClima($id)
    {
        $clima      = Clima::find($id);
        $clima->delete();
        
        $cambio     = Cambio::all();
        $clima      = Clima::all();
        $usuarios   = Usuario::all(); 
        $noticias   = Noticia::all();  
        $sugestoes  = Sugestao::all();
       return view('Admin_geral')->with('noticias', $noticias)
                                 ->with('usuarios', $usuarios) 
                                 ->with('sugestoes', $sugestoes)
                                 ->with('clima', $clima) 
                                 ->with('cambio', $cambio);
    }
    
      public function EliminCambio($id)
    {
        $cambio     = Cambio::find($id);
        $cambio->delete();
        
        $cambio     = Cambio::all();
        $clima      = Clima::all();
        $usuarios   = user::all(); 
        $noticias   = Noticia::all();  
        $sugestoes  = Sugestao::all();
       return view('Admin_geral')->with('noticias', $noticias)
                                 ->with('usuarios', $usuarios) 
                                 ->with('sugestoes', $sugestoes)
                                 ->with('clima', $clima) 
                                 ->with('cambio', $cambio);
    }
    
       public function EliminUsuario($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        
        $cambio     = Cambio::all();
        $clima      = Clima::all();
        $usuarios   = Usuario::all(); 
        $noticias   = Noticia::all();  
        $sugestoes  = Sugestao::all();
       return view('Admin_geral')->with('noticias', $noticias)
                                 ->with('usuarios', $usuarios) 
                                 ->with('sugestoes', $sugestoes)
                                 ->with('clima', $clima) 
                                 ->with('cambio', $cambio);
    }
    
    
    
    
    public function AddUsuario(Request $req)
    {
        $file      = $req->file('imagem');
        $extension = $file->getClientOriginalExtension();
        //return $file;
        $name      = $file->getFilename().'.'.$extension;

        Storage::put($name,File::get($file));

        $publicador                    = new Usuario();
        $publicador->mime              = $file->getClientMimeType();
        $publicador->original_filename = $file->getClientOriginalName();
        $publicador->filename          = $name;
        $publicador->name              =$req->get('name');
       $publicador->email              =$req->get('email');
        $publicador->password          =bcrypt($req->get('senha'));
        $publicador->instituicao       =$req->get('instituicao');
      
        $publicador->save();  
        
        $cambio     = Cambio::all();
        $clima      = Clima::all();
        $usuarios   = Usuario::all(); 
        $noticias   = Noticia::all();  
        $sugestoes  = Sugestao::all();
       return view('Admin_geral')->with('noticias', $noticias)
                                 ->with('usuarios', $usuarios) 
                                 ->with('sugestoes', $sugestoes)
                                 ->with('clima', $clima) 
                                 ->with('cambio', $cambio);   
    }


// FUNÇÃO FAZENDO BUCAS & RETORNANDO TODAS NOTICIAS ARMAZENADAS

 public function Buscartodas()
    {
      $noticias   = Noticia::all()->get();  
       return view('Admin_geral')->with('noticias', $noticias); 
    }

    

    

}
