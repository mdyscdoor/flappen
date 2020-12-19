<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="auth.css" rel="stylesheet">
  <title>Flappen</title>
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
          <h1>Flappen へようこそ</h1>
          <p>Flappen は学生のための情報共有サービスです。</p>
          <p> 学習中の気づき、ノウハウ、メモを簡単に記録 & 公開することができます。</p>
        </div>


  
        <div id="main_right">

          <h1>ユーザー登録</h1>

          <form action="{{route('login')}}" method="post">
            @csrf
            <div>
              <label for="nickname">ニックネーム</label>
              <br>
              <input type="text" name="nickname" id="nickname" placeholder="えんぴつ" class="form-control @error('nickname') is-invalid @enderror" value="{{ old('nickname') }}" required autocomplete="nickname">
            </div>

            <div>
              <label for="name">ユーザーID</label>
              <br>
              <input type="text" name="name" id="name" placeholder="flappenid" class="form-control @error('email') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name">
            </div>




            <div>
              <label for="email">メールアドレス</label>
              <br>
              <input type="text" name="email" id="email" placeholder="example@flappen.com" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
            </div>
            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror





            <div>
              <label for="password">パスワード</label>
              <br>
              <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>





            <div>
              <label for="type">文理選択</label>
              <br>
              <select name="type" id="type" required>
                <option value="0">理系</option>
                <option value="1">文系</option>
                <option value="2">無回答</option>
              </select>
            </div>

            

            <a href="" class="register">登録する</a>

          </form>

        </div>

    </div>

  </div>




</body>
</html>