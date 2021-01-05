<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo e(asset('css/post.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/account.css')); ?>" rel="stylesheet">
  <title>Flappen - </title>
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
      <p class="header_signup"><a href="../register">新規登録</a></p>
      <p class="header_login"><a href="../login">ログイン</a></p>
    <?php endif; ?>
    </div>

  </header>

  <div id="main_wrapper">
    <div class="container">

      <div id="main">

        <div id="main_left">
          <div class="left_menu"><span class="arr"></span><a href="./user">ユーザー</a></div>
          <div class="left_menu"><span class="arr"></span><a href="./post/list">ポスト</a></div>

        </div>
  

        <div id="main_right">

          <div class="post">
            <div class="post_header">
              <div class="post_header_left">
                <div class="post_user">
                  <?php echo e($user->name); ?>

                </div>
                <div class="post_date">
                  <?php echo e($post->updated_at); ?>

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
                <?php if($post->user_id == auth()->user()->id): ?>
                <div class="post_delete">
                  <a href="post/delete?id=<?php echo e($post->id); ?>">投稿を取り消す</a>
                </div>
                <?php endif; ?>
                <div class="post_fav">
                      <object data="" type="">
                        <?php if((boolean)$post->favorite()->where('favorites.user_id', auth()->user()->id)->first()): ?>
                        
                        <a href="?favoriteId=<?php echo e($post->id. '&id='. $post->id); ?>" class="favLink favorited">❤</a>
                        <?php else: ?>
                        <a href="?favoriteId=<?php echo e($post->id. '&id='. $post->id); ?>" class="favLink">❤</a>
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



          <div class="comments">
            <h1 class="comments_header">コメント</h1>

            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="comment">
              <div class="comment_header">
                <div class="comment_user">
                  <?php echo e($comment->user->nickname); ?>

                </div>
                <div class="comment_date">
                  <?php echo e($comment->updated_at); ?>

                </div>
                <div class="comment_type">
                  <?php echo e($comment->user->type); ?>

                </div>
              </div>


              <div class="comment_content">
                <?php echo e($comment->content); ?>

              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>










            <div class="post_comment">
              <form action="" method="post">
                <?php echo csrf_field(); ?>
                
                <textarea name="comment" id="" cols="30" rows="10" placeholder="コメント"></textarea>

                <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="err">何か入力してください</p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                <input type="submit" value="完了" class="btn">
              </form>

            </div>

          </div>
          
 


        </div>

      </div>


    </div>

  </div>



<script src="<?php echo e(asset('js/account.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\flappen\resources\views/post/show.blade.php ENDPATH**/ ?>