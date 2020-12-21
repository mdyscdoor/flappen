<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/user.css')}}" rel="stylesheet">
  <title>Flappen</title>
</head>
<body>
  
  <header>
    <p class="header_user">Flappen</p>

    <div class="header_auth">
    @if(isset($myUser->name))
      <p class="myname"><a href="">{{$myUser->name}}</a></p>
    @else
      <p class="header_signup">新規登録</p>
      <p class="header_login">ログイン</p>
    @endif
    </div>
  </header>

  <div id="main_wrapper">
    <div class="container">

      <div id="main">

        <div id="main_left">
          <div class="left_menu"><span class="arr"></span>ホーム</div>
          <div class="left_menu"><span class="arr"></span>フォロー</div>
          <div class="left_menu"><span class="arr"></span>いいね</div>
          <div class="left_menu"><span class="arr"></span></div>
          <div class="left_menu"><span class="arr"></span></div>
        </div>
  
        <div id="main_right">

          @foreach($items as $item)
          <div class="user">
            <div class="userImg">
              <img src="" alt="">
            </div>

            <div class="userAbout">
              <div class="userHeader">
                <div class="userHeaderLeft">
                  <h1 class="userName">{{$item->nickname}}</h1>
                  <div class="userDetail">
                    <div class="userId">{{'@'.$item->name}}</div>
                    <div class="userType">{{$item->type}}</div>
                  </div>
                </div>

                <div class="userHeaderRight">


                    @if(!$myUser->isFollowing($item->id))
                    <a href="?followId={{$item->id}}" class="follow">フォローする</a>
                    @else
                    <a href="?followId={{$item->id}}" class="unfollow">フォロー中</a>
                    @endif

                </div>

              </div>
  

              <p class="userProfile">
              {{$item->profile}}aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
              </p>
            </div>
          </div>

          @endforeach
          
           {{$items->links()}}




        </div>

      </div>


    </div>

  </div>




</body>
</html>