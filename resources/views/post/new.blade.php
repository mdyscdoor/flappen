<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/draft.css')}}" rel="stylesheet">
  <link href="{{asset('css/account.css')}}" rel="stylesheet">
  <title>Flappen</title>
</head>
<body>
  
  <header>
    <p class="header_user">Flappen - 新しい投稿</p>

    <div class="header_auth">
    @if(auth()->user()->id)

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

        <div class="post">
          <form action="" method="post">
            @csrf

            <p class="post_name"><input type="text" class="edit_name" placeholder="タイトル" name="title" value="{{old('title')}}"></p>


            <div class="post_content">
              <textarea id="" cols="30" rows="10" class="edit_post" name="content">{{old('content')}}</textarea>
            </div>
            @error('content')
            <p class="err">何か入力してください</p>
            @enderror

            <div class="post_submit">
              <input type="submit" value="完了">
            </div>
          </form>

        </div>

      </div>


    </div>

  </div>



  <script src="{{asset('js/account.js')}}"></script>
</body>
</html>