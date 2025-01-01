<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    // Logic code for the route
    public function create(){ 
        $userFromDataBases=User::all();
        return view('posts.create',['AllUsers'=>$userFromDataBases]);
    }





    public function index()
    {
        $fromDatabase=Post::all();// select * from posts table
        return view('posts.index',['allposts'=>$fromDatabase]);
        
    }









    // public function show($postId){

    //     $post_Show = Post::where('id', $postId)->first();// 1 e sybtaxe pour ecrire select * from posts where id=$postsId
        
    //     if(is_null($post_Show)){
    //         return to_route(route:"posts.index");// tester si l'id existe dans base de donnée 
    //     }
        
    //     // $post_Show = Post::findOrFail($postId);// 2e méthode pour tester si id existe si non diriger vers page 404
    //     // $post_Show=Post::find($postId);//2 e méthode pour chercher par identifiant 

    //     // $post_Show=Post::where('title','php')->get();// afficher tous les posts contien une title nomé php 
    //     return view('posts.show',['post'=>$post_Show]);
    // }

    // ***************************************
    // route model binding

    // methode pour crée la fonction show plus facile et court

    public function show(Post $post){// 1 paramétre nom du model 2 la valeur de id méme valuer de route
     return view('posts.show',['post'=>$post]);
    }







    //***************************************** 

    public function store(){

        //$$$$$$$$$$$$$$$$$*/ validetion data backend

        request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:5'],
            'post_creator'=>['required','exists:users,id'],
        ]);




    







        // $request=request();
        // dd($request,$request->title);// object contien tous les proprties de donner pour depugain code 



    // 1 ere methode :::>>> globl helprs methode permet de routerner tous les donner de form dans une object json
        // $data=request()->all();
        // return $data;


    // 2 ere méthode pour récupérer les données de formulaire

        $title=request()->title;
        $description=request()->description;
        $post_creator=request()->post_creator;
        // $post_creator=request()->post_creator;



        // 1e méthode pour insérer les données dans la base de données 

        // $post= new   Post;
        // $post->title=$title;
        // $post->description=$description;

        // $post->save();// inser into posts values('''')
        // dd($title,$description,$post_creator);





        // une autre méthode pour inséree avec la possibilité de mettre une valeur par défaut

        Post::create(['title'=>$title,'description'=>$description,'user_id'=>$post_creator]);
        return to_route(route:"posts.index");// diriger vers la  page index si le programme se termine
    }











    public function edit($postId){
        $AllUsers=User::all();
        $post_Edit = Post::where('id', $postId)->first();
        return view("posts.edit",['post_Edit'=>$post_Edit,'AllUsers'=>$AllUsers]);  
    }







    public function update($postId){


        request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:5'],
            'post_creator'=>['required','exists:users,id'],
        ]);

        $title=request()->title;
        $description=request()->description;
        $post_creator=request()->post_creator;


        
        $post_Update=Post::find($postId);//2 e méthode pour chercher par identifiant 
        if($post_Update) {
            $post_Update->title =$title;
            $post_Update->description =$description;
            $post_Update->user_id =$post_creator;
            $post_Update->save();
        }

        // 2e méthode 
        // if($post_Update) {
        //     $post_Update->update([
        //         'title'=>$title,
        //         "description"=>$description,


        //     ]);
        // }

        return to_route('posts.show',$postId);
    }







    public function destroy($postId){

        $post=Post::find($postId);
        $post->delete();

        return to_route('posts.index');
    }
        
}






    





