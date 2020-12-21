<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(User $user, Request $request)
    {
        $users = $user->getOtherUsers(auth()->user()->id);
        $myUser = auth()->user();


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


        if(isset($request->username)) {
            //ユーザー詳細ページ
            $featuringUser = $user->getUser($request->username);

            if(isset($featuringUser)) {
                //ユーザーがいなければリダイレクト
                return view('user.show', ['user' => $featuringUser]);
            } else {
                return redirect('/user');
            }


        } else {
            //ユーザー一覧ページ
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
}
