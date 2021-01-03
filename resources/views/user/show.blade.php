<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/show.css')}}" rel="stylesheet">
  <link href="{{asset('css/account.css')}}" rel="stylesheet">
  <title>Flappen</title>
</head>
<body>
  
  <header>
  <p class="header_user"><a href="../post/list">Flappen</a></p>

<div class="header_auth">
@if(auth()->user()->id)
<p id="new_draft"><a href="../draft/new"><span class="plus">＋</span>投稿</a></p>
  <p id="user_name">{{auth()->user()->name}}</p>
  <div id="user_menu">
    <p class="account_profile"><a href="../user/{{auth()->user()->name}}">プロフィール</a></p>
    <p><a href="../user_info">アカウント情報</a></p>
    <p><a href="../user_logout">ログアウト</a></p>
  </div>
@else
  <p class="header_signup"><a href="../register">新規登録</a></p>
  <p class="header_login"><a href="../login">ログイン</a></p>
@endif
</div>






  </header>

  <div id="main_wrapper">
    <div class="container">

      <div id="main">

        <div id="main_left">
          <div class="profile">
            <div class="profile_cover">
            <p class="imgWrapper">


            @if(isset($user->profile_image))
              <img src="{{ asset('storage/profiles/'.$user->profile_image) }}" id="img">
            @else
              <img src="{{ asset('storage/profiles/default.png')}}" id="img">
            @endif
            
            </p>
            </div>
            <p class="profile_name">{{$user->nickname}}</p>
            <p class="profile_userid">{{'@'.$user->name}}</p>

            <div class="profile_detail">
              {{$user->profile}}
            </div>

            @if($user->id !== auth()->user()->id)
              <div class="profile_follow">
                @if(!auth()->user()->isFollowing($user->id))
                  <a href="?followId={{$user->id}}" class="follow">フォローする</a>
                @else
                  <a href="?followId={{$user->id}}" class="unfollow">フォロー中</a>
                @endif
              </div>

            @else
              <div class="profile_edit">
                <a href="{{$user->name}}/edit">プロフィールを編集</a>
              </div>
            @endif

            <div class="profile_info">
              <div class="profile_posts">
                <p class="profile_counts">{{$postsCount}}</p>
                投稿数
              </div>
              <div class="profile_follows">
                <p class="profile_counts">{{$user->howManyFollowings($user->id)}}</p>
                フォロー
              </div>
              <div class="profile_followers">
                <p class="profile_counts">{{$user->howManyFollowers($user->id)}}</p>
                フォロワー
              </div>
            </div>
          </div>
        </div>
  



        <div id="main_right">


          @foreach($posts as $post) 
          <div class="post post{{$loop->iteration}}">
            <a href="../post?id={{$post->id}}" class="postLink{{$loop->iteration}}">
              <div class="post_header">
                <div class="post_header_left">
                  <div class="post_user">
                    {{$user->nickname}}
                  </div>
                  <div class="post_date">
                    {{$post->created_at}}
                  </div>
                  <div class="post_type">
                  @if($user->type === 0)
                      理
                      @elseif($user->type === 0)
                      文
                      @else
                      
                      @endif          
                  </div>
                </div>

                <div class="post_header_right">
                  <div class="post_fav">
                    <object data="" type="">
                      @if((boolean)$post->favorite()->orwhere('user_id', $user->id)->first())
                      <a href="?favoriteId={{$post->id}}" class="favLink favorited">❤</a>
                      @else
                      <a href="?favoriteId={{$post->id}}" class="favLink">❤</a>
                      @endif 
                    </object>
                  </div>
                </div>


              </div>

              <h1 class="post_title">{{$post->title}}</h1>

              <div class="post_content">
                {{$post->content}}
              </div>
            </a>
          </div>
          @endforeach
          {{$posts->links()}}



        </div>

      </div>


    </div>

  </div>



<script src="{{asset('js/account.js')}}"></script>
</body>
</html>