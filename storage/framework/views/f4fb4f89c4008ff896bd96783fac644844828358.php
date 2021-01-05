<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo e(asset('css/edit.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/account.css')); ?>" rel="stylesheet">
  <title>Flappen - プロフィール編集</title>
</head>
<body>
  
  <header>
    <p class="header_user">Flappen - プロフィール編集</p>

    <div class="header_auth">
      <?php if(auth()->user()->id): ?>
        <p id="user_name"><?php echo e(auth()->user()->name); ?></p>
        <div id="user_menu">
          <p class="account_profile"><a href="../../user/<?php echo e(auth()->user()->name); ?>">プロフィール</a></p>
          <p><a href="../../user_info">アカウント情報</a></p>
          <p><a href="../../user_logout">ログアウト</a></p>
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

        <div class="profile">

          <form action="" id="edit_user" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>



          <div class="profile_cover">

            <p class="imgWrapper"><img src="<?php echo e(asset('storage/profiles/'.$user->profile_image)); ?>" id="img"></p>

            <input type="file" name="profile_image" id="upload">
            <?php $__errorArgs = ['profile_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="err">入力内容を確認してください</p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


          </div>



          <p class="profile_name">
            <input type="text" class="edit_name" value="<?php echo e($user->nickname); ?>" name="nickname">
            <?php $__errorArgs = ['nickname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="err">入力内容を確認してください</p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </p>



          <p class="profile_userid"><?php echo e('@'.$user->name); ?></p>

          <div class="profile_detail">
            <textarea id="" cols="30" rows="10" class="edit_profile" name="profile"><?php echo e($user->profile); ?></textarea>
            <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="err">入力内容を確認してください</p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

          <div class="end_edit">
            <input type="submit" value="完了">
          </div>
          </form>

        </div>

      </div>


    </div>

  </div>



  <script src="<?php echo e(asset('js/account.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\flappen\resources\views/user/edit.blade.php ENDPATH**/ ?>