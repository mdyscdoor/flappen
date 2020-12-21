<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/show.css')}}" rel="stylesheet">
  <title>Flappen</title>
</head>
<body>
  
  <header>
    <p class="header_user">Flappen - {{$user->nickname}}</p>

    <div class="header_auth">
      <p class="header_signup">新規登録</p>
      <p class="header_login">ログイン</p>
    </div>
  </header>

  <div id="main_wrapper">
    <div class="container">

      <div id="main">

        <div id="main_left">
          <div class="profile">
            <div class="profile_cover">

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
                <a href="">プロフィールを編集</a>
              </div>
            @endif

            <div class="profile_info">
              <div class="profile_posts">
                <p class="profile_counts">??</p>
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

          <div class="post">

            <div class="post_header">
              <div class="post_header_left">
                <div class="post_user">
                  わたしのなまえ
                </div>
                <div class="post_date">
                  2020-12-12
                </div>
                <div class="post_type">
                  農学系
                </div>
              </div>

              <div class="post_header_right">
                <div class="post_fav">❤</div>
                <div class="post_comment">コメント</div>
              </div>


            </div>
  
            <h1 class="post_title">記事のタイトル</h1>
  
            <div class="post_content">
              aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
              aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
              aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            </div>

          </div>
          
          <div class="post">

            <div class="post_header">
              <div class="post_header_left">
                <div class="post_user">
                  わたしのなまえ
                </div>
                <div class="post_date">
                  2020-12-12
                </div>
                <div class="post_type">
                  農学系
                </div>
              </div>

              <div class="post_header_right">
                <div class="post_fav">❤</div>
                <div class="post_comment">コメント</div>
              </div>


            </div>
  
            <h1 class="post_title">記事のタイトル</h1>
  
            <div class="post_content">
              aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
              aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
              aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            </div>

          </div>


        </div>

      </div>


    </div>

  </div>




</body>
</html>