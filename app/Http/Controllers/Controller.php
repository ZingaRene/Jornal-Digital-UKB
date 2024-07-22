<?php

namespace App\Http\Controllers;

use App\Estudante;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Sugestao;
use App\Noticia;
use App\Cambio;
use App\Clima;
use Input;
use Auth;
use App\Usuario;

class Controller extends BaseController
{
   
public function ppag_principal() {

    if(!Auth::check())
          return view('welcome');
       else 
       {
        $user = auth()->user();
        if($user->admin){
                            $cambio     = Cambio::all();
                            $clima      = Clima::all();
                            $usuarios   = Usuario::all();
                            $sugestoes  = Sugestao::all();
                            $noticias   = Noticia::all(); 
                                  return view('admin_geral')->with(['noticias'=>$noticias])
                                                              ->with(['sugestoes'=>$sugestoes])
                                                              ->with(['usuarios'=>$usuarios])
                                                              ->with('clima',$clima)
                                                              ->with('cambio',$cambio); 
       }
     else{
            switch ($user->instituicao) {
                case 'ISP':{
                            $sugestoes   = Sugestao::all();
                            $noticias   = Noticia::where('instituicao','ISP')->get(); 
                                  return view('isp')->with(['noticias'=>$noticias])
                                                    ->with(['sugestoes'=>$sugestoes]); 
                }
                   return redirect('isp'); break;
                 case 'MEDICINA':{
                                 $sugestoes   = Sugestao::all();
                                  $noticias   = Noticia::where('instituicao','MEDICINA')->get(); 
                                  return view('fac_medicina')->with(['noticias'=>$noticias])
                                                             ->with(['sugestoes'=>$sugestoes]); 
                                 }; break;
                case 'ECONOMIA':{
                                   $sugestoes  = Sugestao::all();
                                  $noticias   = Noticia::whereInstituicao('ECONOMIA')->get();  
                                  return view('fac_economia')->with('noticias', $noticias)->with('sugestoes',$sugestoes); };
                                break;
                case 'DIREITO':
                {
                                   $sugestoes  = Sugestao::all();
                                  $noticias   = Noticia::whereInstituicao('DIREITO')->get();  
                                  return view('fac_direito')->with('noticias', $noticias)->with('sugestoes',$sugestoes); };
                                break;
                   
                case 'ISCED SUMBE':
                 {
                                   $sugestoes  = Sugestao::all();
                                  $noticias   = Noticia::whereInstituicao('ISCED SUMBE')->get();  
                                  return view('isced_s')->with('noticias', $noticias)->with('sugestoes',$sugestoes); };
                                break;
                case 'ISCED BENGUELA':{
                                  $sugestoes  = Sugestao::all();
                                  $noticias   = Noticia::whereInstituicao('ISCED BENGUELA')->get();  
                                  return view('isced_b')->with('noticias', $noticias)->with('sugestoes',$sugestoes); }; break;
                case 'REITORIA':{
                                  $noticia=null;
                                  $sugestoes  = Sugestao::all();
                                  $noticias   = Noticia::whereInstituicao('REITORIA')->get();  
                                  return view('reitor')->with('noticias', $noticias)
                                                       ->with('sugestoes',$sugestoes)
                                                       ->with('noticia',$noticia); }; break;
                
                   return redirect('pprincipal'); break;
            }
        }
    }
}


/*public function facmedicina(){
$noticias   = Noticia::where('instituicao','MEDICINA')->get()->pluck('path'); 
       return view('fac_medicina')->with(['noticias'=>$noticias]); 
    }*/

public function isced_s(){
$sugestoes  = Sugestao::all();
$noticias   = Noticia::whereInstituicao('ISCED SUMBE')->get();  
       return view('isced_S')->with('noticias', $noticias)->with('sugestoes',$sugestoes);
    }

public function isced_b(){
$sugestoes  = Sugestao::all();
$noticias   = Noticia::whereInstituicao('ISCED BENGUELA')->get();  
       return view('isced_b')->with('noticias', $noticias)->with('sugestoes',$sugestoes);
         
    }

public function isp(){
$sugestoes  = Sugestao::all();
$noticias   = Noticia::whereInstituicao('ISP')->get();  
       return view('isp')->with('noticias', $noticias)->with('sugestoes',$sugestoes);
      }


public function faceconomia(){
$sugestoes  = Sugestao::all();
$noticias   = Noticia::whereInstituicao('ECONOMIA')->get();  
       return view('fac_economia')->with('noticias', $noticias)->with('sugestoes',$sugestoes);
    }

public function facdireito(){
$sugestoes  = Sugestao::all();
$noticias   = Noticia::whereInstituicao('DIREITO')->get();  
       return view('fac_direito')->with('noticias', $noticias)
                                 ->with('sugestoes',$sugestoes);
    }

public function facmedicina(){
$sugestoes   = Sugestao::all();
$noticias   = Noticia::where('instituicao','MEDICINA')->get(); 
return view('fac_medicina')->with(['noticias'=>$noticias])
                           ->with(['sugestoes'=>$sugestoes]);
    }

public function administrador(){
              $cambio     = Cambio::all();
             $clima      = Clima::all();
             $usuarios   = user::all(); 
             $noticias   = Noticia::all();  
             $sugestoes  = Sugestao::all();
       return view('Admin_geral')->with('noticias', $noticias)
                                 ->with('usuarios', $usuarios) 
                                 ->with('sugestoes', $sugestoes)
                                 ->with('clima',$clima)
                                 ->with('cambio',$cambio); 
            }

 
    public function reitoria(){
        $sugestoes = Sugestao::all();
         $noticias   = Noticia::whereInstituicao('REITORIA')->get();  
       return view('reitor')->with('noticias', $noticias)
                                 ->with('sugestoes',$sugestoes);  
    }   


public function delete($id){
    
   $est = Estudante::find($id);
   $est->delete();
}

public function Noticia($id){ 
    $noticia = Noticia::find($id);
    $notTemp = $noticia;
    $noticia->delete();

    	return view('EditarNoticia',['noticia'=>$notTemp]);
}
      

public function Cambio($id){ 
    $cambio = Cambio::find($id);
    $cambioTemp = $cambio;
    $cambio->delete();
    return view('EditarCambio',['cambio'=> $cambioTemp]);
}

public function Clima($id){ 
    $clima     = Clima::find($id);
    $climaTemp = $clima;
    $clima->delete();
    return view('EditarClima',['clima'=>$climaTemp]); 
}

public function EditarDireito($id){ 
    $noticia = Noticia::find($id);
    $notTemp = $noticia;
   // $noticia->delete();
    return view('EditarNotDireito',['noticia'=>$notTemp]); 
    }

public function EditarEconomia($id){ 
    $noticia = Noticia::find($id);
    $notTemp = $noticia;
    $noticia->delete();
    return view('EditarNotEconomia',['noticia'=>$notTemp]); 
    }

public function EditarIsp($id){ 
    $noticia = Noticia::find($id);
    $notTemp = $noticia;
    $noticia->delete();
    return view('EditarNotIsp',['noticia'=>$notTemp]);
    }

public function EditarIscedS($id){ 
    $noticia = Noticia::find($id);
    $notTemp = $noticia;
    $noticia->delete();
    return view('EditarNotIscedS',['noticia'=>$notTemp]);
    }

public function EditarIscedB($id){ 
    $noticia = Noticia::find($id);
    $notTemp = $noticia;
    $noticia->delete();
    return view('EditarNotIscedB',['noticia'=>$notTemp]);

    }

public function EditarReitoria($id){ 
    $noticia = Noticia::find($id);
    $notTemp = $noticia;
    $noticia->delete();
    return view('EditarNotReitoria',['noticia'=>$notTemp]); 
    }

  public function Editar(Request $req)
    {
       if( $req->get('instituicao')=='MEDICINA'){

        $file      = $req->file('imagem');
        $extension = $file->getClientOriginalExtension();
        //return $file;
        $name = $file->getFilename().'.'.$extension;

        Storage::put($name,File::get($file));

        $noticia                    = new Noticia();
        $noticia->mime              = $file->getClientMimeType();
        $noticia->original_filename = $file->getClientOriginalName();
        $noticia->filename          = $name;
        $noticia->informacao=$req->get('informacao');
        $noticia->instituicao=          'MEDICINA'  ;
        $noticia->save();
         $sugestoes = Sugestao::all();
        $noticias   = Noticia::whereInstituicao('MEDICINA')->get();
       return view('fac_medicina')->with('noticias', $noticias)
                                  ->with('sugestoes', $sugestoes);
       } 

    }


}