<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/draft.css')}}" rel="stylesheet">
  <title>Flappen</title>
</head>
<body>
  
  <header>
    <p class="header_user">Flappen - 新しい投稿</p>

    <div class="header_auth">
      <p class="header_signup">新規登録</p>
      <p class="header_login">ログイン</p>
    </div>
  </header>

  <div id="main_wrapper">
    <div class="container">

      <div id="main">

        <div class="post">
          <form action="" method="post">
            @csrf

            <p class="post_name"><input type="text" class="edit_name" placeholder="タイトル" name="title" value="{{old('title')}}"></p>
            <p class="edit_type"><input type="text" class="content_type" placeholder="例) 数学I" name="tags" value="{{old('tags')}}"></p>

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




</body>
</html>