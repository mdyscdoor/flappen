<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo e(asset('css/draft.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/account.css')); ?>" rel="stylesheet">
  <title>Flappen</title>
</head>
<body>
  
  <header>
    <p class="header_user">Flappen - 新しい投稿</p>

    <div class="header_auth">
    <?php if(auth()->user()->id): ?>

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

        <div class="post">
          <form action="" method="post">
            <?php echo csrf_field(); ?>

            <p class="post_name"><input type="text" class="edit_name" placeholder="タイトル" name="title" value="<?php echo e(old('title')); ?>"></p>


            <div class="post_content">
              <textarea id="" cols="30" rows="10" class="edit_post" name="content"><?php echo e(old('content')); ?></textarea>
            </div>
            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="err">何か入力してください</p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <div class="post_submit">
              <input type="submit" value="完了">
            </div>
          </form>

        </div>

      </div>


    </div>

  </div>



  <script src="<?php echo e(asset('js/account.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\flappen\resources\views/post/new.blade.php ENDPATH**/ ?>