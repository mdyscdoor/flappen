<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Favorite;
use App\Models\Comment;

class PostsController extends Controller
{
    

    ////みんなの投稿
    public function index(User $user, Post $post, Favorite $favorite, Request $request) {

        //いいねする場合
        if(isset($request->favoriteId)) {
            $person = auth()->user();
            $articleId = $request->favoriteId;

            if(!$favorite->isFavoriting($articleId)) {
                $favorite->post_id = $articleId;
                $favorite->user_id = $person->id;
                $favorite->save();

            } else {
                $favorite->where('post_id', $articleId)->where('user_id',$person->id)->delete();
            }

            return back();
        }
        




        //フォローしているユーザーの投稿の表示
        if($request->list == 'following') {
            $posts = $post->whereIn('user_id',auth()->user()->follows()->pluck('followed_id'))->simplePaginate(5);
            return view('post.index', ['posts' => $posts, 'following' => 'yes']);

        } else if($request->list == 'favorite') {

        $posts = $post->whereIn('id', auth()->user()->favorites()->pluck('post_id'))->simplePaginate(5);
        return view('post.index', ['posts' => $posts, 'favorite' => 'yes']);


        } else {
            $posts = $post->with('user')->orderBy('updated_at', 'desc')->simplePaginate(5);
        }

        return view('post.index', ['posts' => $posts]);




    }













    ////新しく投稿する
    public function new() {
        $myUser = auth()->user();
        
        return view('post.new', ['user' => $myUser]);
    }   

    public function create(User $user, Request $request) {
        $myUser = auth()->user();

        $rule = [
            'content' => 'required'
        ];

        $this->validate($request, $rule);




        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $myUser->id;
        $post->save();

        return redirect('user/'.$myUser->name);
    }  





    //////投稿の詳細
    public function show(User $user, Post $posts,Request $request, Favorite $favorite) {
        if(!isset($request->id)) {
            return back();
        }


        //いいねする場合
        if(isset($request->favoriteId)) {
            $person = auth()->user();
            $articleId = $request->favoriteId;

            if(!$favorite->isFavoriting($articleId)) {
                $favorite->post_id = $articleId;
                $favorite->user_id = $person->id;
                $favorite->save();
            } else {
                $favorite->where('post_id', $articleId)->where('user_id',$person->id)->delete();
            }
        }




        $post = $posts->where('id', (int)$request->id)->first();
        $postedUser = $user->where('id', $post->user_id)->first();
        $comments = Comment::with('user')->where('post_id',$post->id)->get();
        
        return view('post.show', ['user' => $postedUser, 'post' => $post, 'comments' => $comments]);

    }




    //////コメントする
    public function comment(Post $post, Comment $comment, Request $request) {
        $myUser = auth()->user();
        $rule = [
            'id' => 'numeric',
            'comment' => 'required'
        ];

        $this->validate($request, $rule);


        $comment->user_id = $myUser->id;
        $comment->post_id = $request->post_id;
        $comment->content = $request->comment;
        $comment->save();

        return back();
    }


    public function delete(Post $post, Request $request) {

        $deletingPost = $post->where('id', $request->id)->first();
        if($deletingPost->user_id === auth()->user()->id) {
            $deletingPost->delete();
            return redirect ('/user/'. auth()->user()->name);
        } else {
            return back();
        }



    }






}
