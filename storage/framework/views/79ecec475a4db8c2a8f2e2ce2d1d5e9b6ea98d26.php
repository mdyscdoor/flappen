<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo e(asset('css/flap.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/account.css')); ?>" rel="stylesheet">
  <title>Flappen</title>
</head>
<body>
  
  <header>
    <p class="header_user"><a href="">Flappen</a></p>

    <div class="header_auth">
    <?php if(auth()->user()->id): ?>
      <p id="new_draft"><a href="../draft/new"><span class="plus">＋</span>投稿</a></p>

      <p id="user_name"><?php echo e(auth()->user()->name); ?></p>
      <div id="user_menu">
        <p class="account_profile"><a href="../user/<?php echo e(auth()->user()->name); ?>">プロフィール</a></p>
        <p><a href="../user_info">アカウント情報</a></p>
        <p><a href="../user_logout">ログアウト</a></p>
      </div>
    <?php else: ?>
      <p class="header_signup"><a href="../register">新規登録</a></p>
      <p class="header_login"><a href="../login">ログイン</a></p>
    <?php endif; ?>
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
            <?php if(!isset($following) && !isset($favorite)): ?>
            <div class="underline"></div>              


            <?php endif; ?>
          </div>

          <div class="tab">
            <object data="" type="">
            <a href="list?list=following">フォロー</a>
            </object>
            <?php if(isset($following)): ?>
            <div class="underline"></div>
            <?php endif; ?>
          </div>

          <div class="tab">
            <object data="" type="">
            <a href="list?list=favorite">ブックマーク</a>
            </object>

            <?php if(isset($favorite)): ?>
            <div class="underline"></div>
            <?php endif; ?>
          </div>

        </div>



          <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="../post?id=<?php echo e($post->id); ?>" class="boxLink">
          <div class="post">
            <div class="post_header">
              <div class="post_header_left">
                <div class="post_user">
                  <?php echo e($post->user->name); ?>

                </div>
                <div class="post_date">
                  <?php echo e($post->updated_at); ?>

                </div>
                <div class="post_type">
                <?php if($post->user->type === 0): ?>
                      理
                      <?php elseif($post->user->type === 0): ?>
                      文
                      <?php else: ?>
                      
                      <?php endif; ?>
                </div>
              </div>

              <div class="post_header_right">
                <div class="post_fav">
                  <object data="" type="">
                    <?php if((boolean)$post->favorite()->where('favorites.user_id', auth()->user()->id)->first()): ?>
                    <object data="" type="">
                    <a href="?favoriteId=<?php echo e($post->id); ?>" class="favLink favorited">❤</a>                      
                    </object>

                    <?php else: ?>
                    <object data="" type="">
                      <a href="?favoriteId=<?php echo e($post->id); ?>" class="favLink">❤</a>                      
                    </object>

                    <?php endif; ?> 
                  </object>
                </div>
              </div>


            </div>
  
            <h1 class="post_title"><?php echo e($post->title); ?></h1>
  
            <div class="post_content">
              <?php echo e($post->content); ?>

            </div>

          </div>
          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


          <?php echo e($posts->links()); ?>
















        </div>

      </div>


    </div>

  </div>



<script src="<?php echo e(asset('js/account.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\flappen\resources\views/post/index.blade.php ENDPATH**/ ?>