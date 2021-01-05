<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo e(asset('css/user.css')); ?>" rel="stylesheet">
  <title>Flappen</title>
</head>
<body>
  
  <header>
    <p class="header_user">Flappen</p>

    <div class="header_auth">
    <?php if(isset($myUser->name)): ?>
      <p class="myname"><a href=""><?php echo e($myUser->name); ?></a></p>
    <?php else: ?>
      <p class="header_signup">新規登録</p>
      <p class="header_login">ログイン</p>
    <?php endif; ?>
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

          <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="user">
            <div class="userImg">
              <img src="" alt="">
            </div>

            <div class="userAbout">
              <div class="userHeader">
                <div class="userHeaderLeft">
                  <h1 class="userName"><?php echo e($item->nickname); ?></h1>
                  <div class="userDetail">
                    <div class="userId"><?php echo e('@'.$item->name); ?></div>
                    <div class="userType"><?php echo e($item->type); ?></div>
                  </div>
                </div>

                <div class="userHeaderRight">


                    <?php if(!$myUser->isFollowing($item->id)): ?>
                    <a href="?followId=<?php echo e($item->id); ?>" class="follow">フォローする</a>
                    <?php else: ?>
                    <a href="?followId=<?php echo e($item->id); ?>" class="unfollow">フォロー中</a>
                    <?php endif; ?>

                </div>

              </div>
  

              <p class="userProfile">
              <?php echo e($item->profile); ?>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
              </p>
            </div>
          </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
           <?php echo e($items->links()); ?>





        </div>

      </div>


    </div>

  </div>




</body>
</html><?php /**PATH C:\xampp\htdocs\flappen\resources\views/user/following.blade.php ENDPATH**/ ?>