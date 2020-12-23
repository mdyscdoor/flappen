<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Favorite;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(User $user, Post $post, Favorite $favorite,Request $request)
    {

        //フォローボタンの処理
        if(isset($request->followId)) {
            $follower = auth()->user();
            $followId = $request->followId;

            if(!$follower->isFollowing($followId)) {
                $follower->follow($followId);
            } else {
                $follower->unfollow($followId);
            }

            return back();
        }

        
        //いいねする場合
        if(isset($request->favoriteId)) {
            $person = auth()->user();
            $articleId = $request->favoriteId;

            if($favorite->isFavoriting($articleId)) {
                $favorite->post_id = $articleId;
                $favorite->user_id = $person->id;
                $favorite->save();
            } else {
                $favorite->where('post_id', $articleId)->where('user_id',$person->id)->delete();
            }

             return back();
        }






        //フォローしているユーザーのリストを表示する場合
        if($request->list === 'following') {
            $users = $user->getFollowingUsers(auth()->user()->id);
            $myUser = auth()->user();
            return view('user.index', ['items' => $users], ['myUser' => $myUser]);

        }


        //フォローしているユーザーのリストを表示する場合
        if($request->list === 'followers') {

            $users = $user->getFollowedUsers(auth()->user()->id);
            $myUser = auth()->user();
            return view('user.index', ['items' => $users], ['myUser' => $myUser]);

        }







        //ユーザー詳細画面
        if(isset($request->username)) {

            $featuringUser = $user->getUser($request->username);

            if(isset($featuringUser)) {
                $userPosts = $post->getUserPosts($featuringUser->id);
                return view('user.show', ['user' => $featuringUser, 'posts' => $userPosts, 'postsCount' => $post->howManyPosts($featuringUser->id)]);

            } else {
                //ユーザーがいなければリダイレクト
                return redirect('/user');
            }



        } else {
            //ユーザー一覧ページ
            $users = $user->getOtherUsers(auth()->user()->id);
            $myUser = auth()->user();
            return view('user.index', ['items' => $users], ['myUser' => $myUser]);
        }







    }


    public function followIndex(User $user, Request $request) {
        $users = $user->getFollowingUsers(auth()->user()->id);
        $myUser = auth()->user();


        if(isset($request->followId)) {
            $follower = auth()->user();
            $followId = $request->followId;

            if(!$follower->isFollowing($followId)) {
                $follower->follow($followId);
            } else {
                $follower->unfollow($followId);
            }

            return back();
        }

        return view('user.following', ['items' => $users], ['myUser' => $myUser]);
    }

    

    //フォロー
    // public function follow(User $user, Request $request) {
    //     $follower = auth()->user();

    //     if(!$follower->isFollowing($user->id)) {
    //         $follower->follow($user->id);

    //         return back();
    //     }
    // }


    //アンフォロー
    public function unfollow(User $user, Request $request) 
    {
        $follower = auth()->user();

        if($follower->isFollowing($user->id)) {
            $follower->unfollow($user->id);

            return back();
        }
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
    public function show(Request $request, User $user)
    {
        if(!isset($request->username)) {
            return redirect('/');
        }



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Request $request)
    {
        if($request->username !== auth()->user()->name) {
            return redirect('/');
        }

        $edittingUser = auth()->user();


        return view('user.edit', ['user' => $edittingUser]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $edittingUser = auth()->user();

        $edittingUser->nickname = $request->nickname;
        $edittingUser->profile = $request->profile;
        $edittingUser->save();

        return redirect("/user/". $edittingUser->name);
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
}
