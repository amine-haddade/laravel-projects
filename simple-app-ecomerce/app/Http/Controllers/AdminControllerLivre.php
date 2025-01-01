<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Livre_product;
use App\http\Requests\Livre_create_validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminControllerLivre extends Controller
{
    //
    public function create_liv(){
        return view('admin.create_livre');
    }
    public function store_liv(Livre_create_validation $request){
        $data=$request->validated();
        if ($request->hasFile('image_livre') && $request->hasFile('pdf')) {
            $ImageName_Livre = time() . '_' . $request->file('image_livre')->getClientOriginalName();
            $PdfName_Livre = time() . '_' . $request->file('pdf')->getClientOriginalName();
        
            $ImagePath = $request->file('image_livre')->storeAs('Livres/images_livres', $ImageName_Livre, 'public');
            $PdfPath = $request->file('pdf')->storeAs('Livres/pdfs', $PdfName_Livre, 'public');
        
            // Enregistrement des données dans la base
            Livre_product::create([
                'image_livre' => $ImagePath,
                'titre_livre' => $request->titre_livre,
                'prix_livre' => $request->prix_livre,
                'pdf' => $PdfPath,
                'description' => $request->description
            ]);
        } else {
            return back()->withErrors(['error' => 'L\'image ou le PDF n\'a pas été téléchargé.']);
        }
        return to_route('admin.index')->with('succes','livre et ajouter avec succées');
    }
    public function read($livreId){
        $LivreProduct=Livre_product::findOrFail($livreId);
        $filePath=storage_path('app/public/'.$LivreProduct->pdf);
        return response()->file($filePath);
    }
    public function download($livreId){
        $LivreProduct=Livre_product::findOrFail($livreId);
        $filePath=storage_path('app/public/'.$LivreProduct->pdf);
        return response()->download($filePath);
    }
    
    
    
}
