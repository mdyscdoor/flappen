<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo e(asset('css/show.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/account.css')); ?>" rel="stylesheet">
  <title>Flappen</title>
</head>
<body>
  
  <header>
  <p class="header_user"><a href="../post/list">Flappen</a></p>

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
          <div class="profile">
            <div class="profile_cover">
            <p class="imgWrapper">


            <?php if(isset($user->profile_image)): ?>
              <img src="<?php echo e(asset('storage/profiles/'.$user->profile_image)); ?>" id="img">
            <?php else: ?>
              <img src="<?php echo e(asset('storage/profiles/default.png')); ?>" id="img">
            <?php endif; ?>
            
            </p>
            </div>
            <p class="profile_name"><?php echo e($user->nickname); ?></p>
            <p class="profile_userid"><?php echo e('@'.$user->name); ?></p>

            <div class="profile_detail">
              <?php echo e($user->profile); ?>

            </div>

            <?php if($user->id !== auth()->user()->id): ?>
              <div class="profile_follow">
                <?php if(!auth()->user()->isFollowing($user->id)): ?>
                  <a href="?followId=<?php echo e($user->id); ?>" class="follow">フォローする</a>
                <?php else: ?>
                  <a href="?followId=<?php echo e($user->id); ?>" class="unfollow">フォロー中</a>
                <?php endif; ?>
              </div>

            <?php else: ?>
              <div class="profile_edit">
                <a href="<?php echo e($user->name); ?>/edit">プロフィールを編集</a>
              </div>
            <?php endif; ?>

            <div class="profile_info">
              <div class="profile_posts">
                <p class="profile_counts"><?php echo e($postsCount); ?></p>
                投稿数
              </div>
              <div class="profile_follows">
                <p class="profile_counts"><?php echo e($user->howManyFollowings($user->id)); ?></p>
                フォロー
              </div>
              <div class="profile_followers">
                <p class="profile_counts"><?php echo e($user->howManyFollowers($user->id)); ?></p>
                フォロワー
              </div>
            </div>
          </div>
        </div>
  



        <div id="main_right">


          <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
          <div class="post post<?php echo e($loop->iteration); ?>">
            <a href="../post?id=<?php echo e($post->id); ?>" class="postLink<?php echo e($loop->iteration); ?>">
              <div class="post_header">
                <div class="post_header_left">
                  <div class="post_user">
                    <?php echo e($user->nickname); ?>

                  </div>
                  <div class="post_date">
                    <?php echo e($post->created_at); ?>

                  </div>
                  <div class="post_type">
                  <?php if($user->type === 0): ?>
                      理
                      <?php elseif($user->type === 0): ?>
                      文
                      <?php else: ?>
                      
                      <?php endif; ?>          
                  </div>
                </div>

                <div class="post_header_right">
                  <div class="post_fav">
                    <object data="" type="">
                      <?php if((boolean)$post->favorite()->orwhere('user_id', $user->id)->first()): ?>
                      <a href="?favoriteId=<?php echo e($post->id); ?>" class="favLink favorited">❤</a>
                      <?php else: ?>
                      <a href="?favoriteId=<?php echo e($post->id); ?>" class="favLink">❤</a>
                      <?php endif; ?> 
                    </object>
                  </div>
                </div>


              </div>

              <h1 class="post_title"><?php echo e($post->title); ?></h1>

              <div class="post_content">
                <?php echo e($post->content); ?>

              </div>
            </a>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php echo e($posts->links()); ?>




        </div>

      </div>


    </div>

  </div>



<script src="<?php echo e(asset('js/account.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\flappen\resources\views/user/show.blade.php ENDPATH**/ ?>