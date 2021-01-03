<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/edit.css')}}" rel="stylesheet">
  <link href="{{asset('css/account.css')}}" rel="stylesheet">
  <title>Flappen - プロフィール編集</title>
</head>
<body>
  
  <header>
    <p class="header_user">Flappen - プロフィール編集</p>

    <div class="header_auth">
      @if(auth()->user()->id)
        <p id="user_name">{{auth()->user()->name}}</p>
        <div id="user_menu">
          <p class="account_profile"><a href="../../user/{{auth()->user()->name}}">プロフィール</a></p>
          <p><a href="../../user_info">アカウント情報</a></p>
          <p><a href="../../user_logout">ログアウト</a></p>
        </div>
      @else
        <p class="header_signup"><a href="register">新規登録</a></p>
        <p class="header_login"><a href="login">ログイン</a></p>
      @endif
    </div>
  </header>

  <div id="main_wrapper">
    <div class="container">

      <div id="main">

        <div class="profile">

          <form action="" id="edit_user" method="post" enctype="multipart/form-data">
            @csrf



          <div class="profile_cover">

            <p class="imgWrapper"><img src="{{ asset('storage/profiles/'.$user->profile_image) }}" id="img"></p>

            <input type="file" name="profile_image" id="upload">
            @error('profile_image')
                <p class="err">入力内容を確認してください</p>
            @enderror


          </div>



          <p class="profile_name">
            <input type="text" class="edit_name" value="{{$user->nickname}}" name="nickname">
            @error('nickname')
                <p class="err">入力内容を確認してください</p>
            @enderror
          </p>



          <p class="profile_userid">{{'@'.$user->name}}</p>

          <div class="profile_detail">
            <textarea id="" cols="30" rows="10" class="edit_profile" name="profile">{{$user->profile}}</textarea>
            @error('comment')
                <p class="err">入力内容を確認してください</p>
            @enderror
          </div>

          <div class="end_edit">
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