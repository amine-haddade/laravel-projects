<?php
namespace App\Http\Controllers;

use App\Http\Requests\FormRequestValidate;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function index()
    {
        // dd(Auth::user());
        $serche=request()->serche;

        if(empty($serche)){
            $PostsFromDataBase = Post::all();
        }
        if(!empty($serche)){
            $PostsFromDataBase=Post::where('title','like','%'.$serche.'%')
            ->orWhere('description','like','%'.$serche.'%')
            ->orWhereHas('user',function($query)  use($serche){
                $query->where('name','like','%'.$serche.'%');

            })
            ->get();
        }
        return view('posts.index', ['AllPosts' => $PostsFromDataBase]);
        
   
    }

    // create post
    public function create()
    {
        $UserFromDataBases = User::all();
        return view('posts.create', ['AllUsers' => $UserFromDataBases]);
    }




    public function store(FormRequestValidate $request){
        $data=$request->validated();
        if($request->hasFile('image')){
            //générer un nom unique pour l'image
            $file = $request->file('image');
            $imageName=time().'_'.$file->getClientOriginalName();
            // stocker l'iameg dans la répértoire public/image
            $request->image->storeAs('image',$imageName,'public');
            // ajouter le nom de l'image aux donnée sauvegaeder
            $data['image']=$imageName;
        }
        Post::create($data);
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }


    public function show($postId){
        $Post = Post::find($postId);
        $Comments = Comment::where('posts_id',$postId)->get();
        return view('posts.show',['singlPost'=>$Post,'AllComents'=>$Comments]);
    }
    public function destroy($postId){
        $post=Post::find($postId);
        $post->delete();
        // back retourner à dernier page qui visite par l'utilisateur
        return back()->with('warning','attention tu as supprimé un post ');
    }



    public function edit($postId){
        $AllUser=User::all();
        $postEdit = Post::where('id', $postId)->first();
        return view('posts.edit',['PostsEdit'=>$postEdit,'AllUser'=>$AllUser]);
    }

    public function update($postId, FormRequestValidate $request){
        $postData=$request->except('image');

        if($request->hasFile('image')){
            //générer un nom unique pour l'image
            $file = $request->file('image');
            $imageName=time().'_'.$file->getClientOriginalName();
            // stocker l'image dans la répértoire public/image
            $file->storeAs('public/image',$imageName);
            // ajouter le nom de l'image aux donnée sauvegaeder
            $data['image']=$imageName;
        }
        else{
            $post=Post::findOrFail($postId);
            $postData['image']=$post->image;
        }
         // la méthode finOrFail  Récupérer le post à mettre à jour ou renvoyer une erreur 404 si non trouvé
        $postUpdated=Post::findOrFail($postId);
        $postUpdated->update($postData);
        return to_route('posts.show', $postId);
    }



    function toggleLike(Post $post){
        $post->isLiked=!($post->isLiked);
        $post->save();
        return redirect()->back();
    }

}

