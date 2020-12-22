<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/edit.css')}}" rel="stylesheet">
  <title>Flappen - プロフィール編集</title>
</head>
<body>
  
  <header>
    <p class="header_user">Flappen - プロフィール編集</p>

    <div class="header_auth">
      <p class="header_signup">新規登録</p>
      <p class="header_login">ログイン</p>
    </div>
  </header>

  <div id="main_wrapper">
    <div class="container">

      <div id="main">

        <div class="profile">

          <form action="" id="edit_user" method="post">
            @csrf
          <div class="profile_cover">

          </div>
          <p class="profile_name"><input type="text" class="edit_name" value="{{$user->nickname}}" name="nickname"></p>
          <p class="profile_userid">{{'@'.$user->name}}</p>

          <div class="profile_detail">
            <textarea id="" cols="30" rows="10" class="edit_profile" name="profile">{{$user->profile}}</textarea>
          </div>

          <div class="end_edit">
            <input type="submit" value="完了">
          </div>
          </form>

        </div>

      </div>


    </div>

  </div>




</body>
</html>