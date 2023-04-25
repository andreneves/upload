<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class UploadController extends Controller
{
    public function form_image(){
        $images = Image::get();
        //dd($image);
        return view('upload/form_image', ['images' => $images]);
    }


    public function upload_image(Request $request){

        // Verifique se a imagem foi enviada
        if ($request->hasFile('image')) {
                    
            // Obtenha o nome original da imagem
            $imageFileName = $request->file('image')->getClientOriginalName();
            
            // Armazene a imagem na pasta "public/images"
            $path = $request->file('image')->store('public/images');
            
            // Crie uma entrada no banco de dados para a imagem
            $image = new Image();
            $image->filename = $imageFileName;
            $image->path = str_replace('public/', '', $path);
            $image->save();
            
            // Redirecione o usuário de volta ao formulário com uma mensagem de sucesso
            return redirect()->back()->with('success', 'Imagem enviada com sucesso.');
        }

        // Se nenhuma imagem foi enviada, redirecione de volta com uma mensagem de erro
        return redirect()->back()->with('error', 'Nenhuma imagem enviada.');
    }
}
