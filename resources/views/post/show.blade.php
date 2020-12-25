<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/post.css')}}" rel="stylesheet">
  <title>Flappen - </title>
</head>
<body>
  
  <header>
    <p class="header_user">Flappen</p>

    <div class="header_auth">
      <p class="header_signup">新規登録</p>
      <p class="header_login">ログイン</p>
    </div>
  </header>

  <div id="main_wrapper">
    <div class="container">

      <div id="main">

        <div id="main_left">
          <div class="left_menu"><span class="arr"></span><a href="./user">ユーザー</a></div>
          <div class="left_menu"><span class="arr"></span><a href="./post/list">ポスト</a></div>
          <div class="left_menu"><span class="arr"></span>いいね</div>
          <div class="left_menu"><span class="arr"></span></div>
          <div class="left_menu"><span class="arr"></span></div>
        </div>
  

        <div id="main_right">

          <div class="post">
            <div class="post_header">
              <div class="post_header_left">
                <div class="post_user">
                  {{$user->name}}
                </div>
                <div class="post_date">
                  {{$post->updated_at}}
                </div>
                <div class="post_type">
                  ??系
                </div>
              </div>


              <div class="post_header_right">
                @if($post->user_id == auth()->user()->id)
                <div class="post_delete">
                  <a href="post/delete?id={{$post->id}}">投稿を取り消す</a>
                </div>
                @endif
                <div class="post_fav">
                      <object data="" type="">
                        @if((boolean)$post->favorite()->where('favorites.user_id', auth()->user()->id)->first())
                        
                        <a href="?favoriteId={{$post->id. '&id='. $post->id}}" class="favLink favorited">❤</a>
                        @else
                        <a href="?favoriteId={{$post->id. '&id='. $post->id}}" class="favLink">❤</a>
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



          <div class="comments">
            <h1 class="comments_header">コメント</h1>

            @foreach($comments as $comment)
            <div class="comment">
              <div class="comment_header">
                <div class="comment_user">
                  {{$comment->user->nickname}}
                </div>
                <div class="comment_date">
                  {{$comment->updated_at}}
                </div>
                <div class="comment_type">
                  農学系
                </div>
              </div>


              <div class="comment_content">
                {{$comment->content}}
              </div>
            </div>
            @endforeach










            <div class="post_comment">
              <form action="" method="post">
                @csrf
                <textarea name="comment" id="" cols="30" rows="10" placeholder="コメント"></textarea>
                @error('comment')
                <p class="err">何か入力してください</p>
                @enderror
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <input type="submit" value="完了" class="btn">
              </form>

            </div>

          </div>
          
 


        </div>

      </div>


    </div>

  </div>




</body>
</html>