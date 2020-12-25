<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/flap.css')}}" rel="stylesheet">
  <title>Flappen</title>
</head>
<body>
  
  <header>
    <p class="header_user"><a href="./">Flappen</a></p>

    <div class="header_auth">
      <p class="header_signup"><a href="register">新規登録</a></p>
      <p class="header_login"><a href="login">ログイン</a></p>
    </div>
  </header>

  <div id="main_wrapper">
    <div class="container">

      <div id="main">

        <div id="main_left">
        <div class="left_menu"><span class="arr"></span><a href="../user">ユーザー</a></div>
          <div class="left_menu"><span class="arr"></span><a href="../post/list">ポスト</a></div>
        </div>
  
        <div id="main_right">

        <div class="tabs">

          <div class="tab">
            <object data="" type="">
            <a href="../post/list">みんな</a>
            </object>
            @if(!isset($following) && !isset($favorite))
            <div class="underline"></div>              


            @endif
          </div>

          <div class="tab">
            <object data="" type="">
            <a href="list?list=following">フォロー</a>
            </object>
            @if(isset($following))
            <div class="underline"></div>
            @endif
          </div>

          <div class="tab">
            <object data="" type="">
            <a href="list?list=favorite">ブックマーク</a>
            </object>

            @if(isset($favorite))
            <div class="underline"></div>
            @endif
          </div>

        </div>



          @foreach($posts as $post)
          <a href="../post?id={{$post->id}}" class="boxLink">
          <div class="post">
            <div class="post_header">
              <div class="post_header_left">
                <div class="post_user">
                  {{$post->user->name}}
                </div>
                <div class="post_date">
                  {{$post->updated_at}}
                </div>
                <div class="post_type">
                  農学系
                </div>
              </div>

              <div class="post_header_right">
                <div class="post_fav">
                  <object data="" type="">
                    @if((boolean)$post->favorite()->where('favorites.user_id', auth()->user()->id)->first())
                    <object data="" type="">
                    <a href="?favoriteId={{$post->id}}" class="favLink favorited">❤</a>                      
                    </object>

                    @else
                    <object data="" type="">
                      <a href="?favoriteId={{$post->id}}" class="favLink">❤</a>                      
                    </object>

                    @endif 
                  </object>
                </div>
              </div>


            </div>
  
            <h1 class="post_title">{{$post->title}}</h1>
  
            <div class="post_content">
              {{$post->content}}
            </div>

          </div>
          </a>
          @endforeach


          {{$posts->links()}}















        </div>

      </div>


    </div>

  </div>




</body>
</html>