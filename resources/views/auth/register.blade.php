<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Flappen</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{asset('css/register.css')}}" rel="stylesheet">
  
</head>
<body>
  <div id="app">


  <header>
    <p class="header_user"><a href="./">Flappen</a></p>

    <div class="header_auth">
      <p class="header_login"><a href="./login">ログイン</a></p>
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




          <form method="POST" action="{{ route('register') }}">
                        @csrf





                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ユーザーID') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus maxlength="16">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('ニックネーム') }}</label>

                            <div class="col-md-6">
                                <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname">

                                @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>







                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Eメールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('文理選択') }}</label>

                            <div class="col-md-6">
                                <select name="type" id="type">
                                    <option value="0">理系</option>
                                    <option value="1">文系</option>
                                    <option value="2">無回答</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワードの確認') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>





                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>







        </div>


    </div>

  </div>
  </div>



</body>
</html>