<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProductvalidation;
use App\Http\Requests\ValidationFormCategorie;
use App\Models\Categorie;
use App\Models\Livre_product;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    

    //
    public function index(){
    //     $product = Livre_product::findOrFail(1);
    //     $filePath = storage_path('app/public/' . $product->pdf);

    // return response()->download($filePath);=>download
    // return response()->file($filePath);=>read
        $categories=Categorie::all();
        $products=Product::all();
        if(!Auth::guard('admin')->check()) {
            // Redirige vers la page de connexion si non connecté
            return redirect()->route('admin.login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }
        return view('admin.index',['AllProducts'=>$products,'Allcategories'=>$categories]);
    }
    public function create(){
        $categories=Categorie::all();
        return view('admin.create',['Allcategories'=>$categories]);
    }


    public function store(FormRequestProductvalidation $request){
        if(!Auth::guard('admin')->check()) {
            // Redirige vers la page de connexion si non connecté
            return redirect()->route('admin.login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }
        $data=$request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ImageName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('img',$ImageName,'public');
            $data['image'] =$ImageName;
        }
        Product::create($data);
        return redirect()->route('admin.index')->with('success', 'Produit ajouté avec succès');
    }
    public function destroy($productId){
        // if(!Auth::guard('admin')->check()) {
        //     // Redirige vers la page de connexion si non connecté
        //     return redirect()->route('admin.login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        // }
        $product=Product::find($productId);
        Storage::disk('public')->delete('img/'.$product->image);
        $product->delete();
        return to_route('admin.index');

    }
    public  function create_cate(){
        return view('admin.create_cat');
    }
    public function store_cate(ValidationFormCategorie $request){
        
        $data=$request->validated();
        if ($request->hasFile('image_categorie')) {
            $file = $request->file('image_categorie');
            $ImageName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('images-catego',$ImageName,'public');
            $data['image_categorie'] =$ImageName; // Enregistrer le chemin relatif
        }
        Categorie::create($data);
        // dd(Categorie::create($data));
        return to_route('admin.index')->with('success','categorie ajouté avec succès');
    }
    
}
