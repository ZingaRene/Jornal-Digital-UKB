<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Fileentry;
use App\Noticia;
use Input;


class FileEntryController extends Controller
{
    //
    public function add($file){
        $extension = $file->getClientOriginalExtension();
        //return $file;
        $name = $file->getFilename().'.'.$extension;

        Storage::put($name,
            File::get($file));

        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $name;
        $entry->save();

        return $entry->filename;
    }

    
    public function addFoto(Request $req){
        $file            = $req->file('imagem');
        
        $extension = $file->getClientOriginalExtension();
        //return $file;
        $name = $file->getFilename().'.'.$extension;

        Storage::put($name,
            File::get($file));

        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $name;
        $entry->descricao=$req->get('informacao');
        $entry->save();

        return view('fac_medicina');
    }

    

    public function get_string($string){
        $string = str_replace(array('[\', \']'), '',$string);
        $string = preg_replace('/\[.*\]/U','',$string);
        $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i','-',$string);
        $string = htmlentities($string,ENT_COMPAT,'utf-8');
        $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slah|tilde|caron|lig|quot|rsquo);/i','\\1',$string);
        $string = preg_replace(array('/[^a-z0-9]/i'),'/[-]+/',$string);
        return strtolower(trim($string,'-'));
    }

    public function get($filename,$w=530,$h=320){
        $entry = Fileentry::where('filename','=',$filename)
                ->firstOrFail();
        $file = Storage::get($entry->filename);

        $image = Image::make($file)->orientate()->fit($w,$h);
        $image->stream();

        return (new Response($image->__toString(),200))
            ->header('Content-Type',$entry->mime);
    }

    public function getFile($filename){
        $entry = Fileentry::where('filename','=',$filename)
                ->firstOrFail();
        $file = Storage::get($entry->filename);
        return (new Response($file,200))
            ->header('Content-Type',$entry->mime);
    }

    public function getFile2($id){
        $n = Noticia::findOrFail($id);
        $file = Storage::get($n->filename);
        return (new Response($file,200))
            ->header('Content-Type',$n->mime);
    }

    public function getPerfil($filename=""){
        $entry = Fileentry::where('filename','=',$filename)
                ->first();
        if($entry==null)
            return (new Response(File::get('img/perfil.jpg'),200))
            ->header('Content-Type',File::mimeType('img/perfil.jpg'));
        else 
            return $this->get($filename,100,100);
    }

    public function getCroped($filename=""){
        $entry = Fileentry::where('filename','=',$filename)
                ->first();
        if($entry==null)
            return (new Response(File::get('img/perfil.jpg'),200))
            ->header('Content-Type',File::mimeType('img/perfil.jpg'));
        else 
            return $this->get($filename);
    }

    public function getType($type=""){
        $file = File::get('img/file.jpg');
        switch($type){
            case 'application/pdf': $file = File::get('img/pdf.jpg'); break;
            case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                 $file = File::get('img/doc.jpg'); break;
        }

       return (new Response($file,200))
            ->header('Content-Type',File::mimeType($file));
       
    }
}
