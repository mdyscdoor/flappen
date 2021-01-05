<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo e(asset('css/user.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/account.css')); ?>" rel="stylesheet">
  <title>Flappen</title>
</head>
<body>
  
  <header>
  <p class="header_user"><a href="post/list">Flappen</a></p>

<div class="header_auth">
<?php if(auth()->user()->id): ?>
<p id="new_draft"><a href="draft/new"><span class="plus">＋</span>投稿</a></p>
  <p id="user_name"><?php echo e(auth()->user()->name); ?></p>
  <div id="user_menu">
    <p class="account_profile"><a href="user/<?php echo e(auth()->user()->name); ?>">プロフィール</a></p>
    <p><a href="user_info">アカウント情報</a></p>
    <p><a href="user_logout">ログアウト</a></p>
  </div>
<?php else: ?>
  <p class="header_signup"><a href="register">新規登録</a></p>
  <p class="header_login"><a href="login">ログイン</a></p>
<?php endif; ?>
</div>
  </header>

  <div id="main_wrapper">
    <div class="container">

      <div id="main">

        <div id="main_left">
          <div class="left_menu"><span class="arr"></span><a href="user">ユーザー</a></div>
          <div class="left_menu"><span class="arr"></span><a href="post/list">ポスト</a></div>
        </div>
  
        <div id="main_right">

        <div class="tabs">
          <div class="tab">
            <a href="user">みんな</a>
            <?php if(!isset($following) && !isset($followers)): ?>
            <div class="underline"></div>
            <?php endif; ?>
          </div>
          <div class="tab">
            <a href="user?list=following">フォロー</a>
            <?php if(isset($following)): ?>
            <div class="underline"></div>
            <?php endif; ?>
          </div>
          <div class="tab">
            <a href="user?list=followers">フォロワー</a>
            <?php if(isset($followers)): ?>
            <div class="underline"></div>
            <?php endif; ?>
          </div>
        </div>




          <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="user/<?php echo e($item->name); ?>" class="boxLink">
          <div class="user">
            <div class="userImg">

            <?php if(isset($item->profile_image)): ?>
              <img src="<?php echo e(asset('storage/profiles/'.$item->profile_image)); ?>" id="img">
            <?php else: ?>
              <img src="<?php echo e(asset('storage/profiles/default.png')); ?>" id="img">
            <?php endif; ?>
            </div>

            <div class="userAbout">
              <div class="userHeader">
                <div class="userHeaderLeft">
                  <h1 class="userName"><?php echo e($item->nickname); ?></h1>
                  <div class="userDetail">
                    <div class="userId"><?php echo e('@'.$item->name); ?></div>
                    <div class="userType">
                      <?php if($item->type === 0): ?>
                      理
                      <?php elseif($item->type === 0): ?>
                      文
                      <?php else: ?>
                      
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

                <div class="userHeaderRight">
                    <?php if(!$myUser->isFollowing($item->id)): ?>
                    <object data="" type="">
                    <a href="?followId=<?php echo e($item->id); ?>" class="follow">フォローする</a>
                    </object>
  
                    <?php else: ?>
                    <object data="" type="">
                    <a href="?followId=<?php echo e($item->id); ?>" class="unfollow">フォロー中</a>
                    </object>

                    <?php endif; ?>

                </div>

              </div>
  

              <p class="userProfile">
              <?php echo e($item->profile); ?>

              </p>
            </div>
          </div>
          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          <?php echo e($items->links()); ?>





        </div>

      </div>


    </div>

  </div>



  <script src="<?php echo e(asset('js/account.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\flappen\resources\views/user/index.blade.php ENDPATH**/ ?>