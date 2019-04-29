<?php include ('public/views/includes/head.view.php') ?>

<?php include ('public/views/includes/top-nav.view.php') ?>

<?php include ('public/views/includes/side-nav.view.php') ?>


<div class="main-new-post">
    <form class="new-post" method="POST" action="newPost">
        <textarea class="new-post__textarea" id="new-post__textarea" rows="3" placeholder="Što ti je na umu ?" name="post"></textarea>
        <button type="submit" class="new-post__btn">Objavi</button>
    </form>
</div>

<?php if(isset($posts)) :?>
  <?php $cnt = 0; ?> 
  <?php foreach($posts as $post) : ?>
  <?php $cnt++; ?> 

<div class="main-post">
    <div class="main-post__user__image">
        <img src="public/img/profile.png">
    </div>
    <div class="main-post__details">
        <div class="main-post__details__header">
            <span class="main-post__details__header__username"><?= $user->username ?></span>
            <span>-</span>
            <span><?= $post->created_at?></span>
        </div>
        <div class="main-post__details__main">
            <div class="main-post__details__main__content">
                <span>
                  <?= $post->body ?>
                </span>
            </div>
        </div>
        <div class="main-post__details__footer">
            <span class="main-post__details__footer__comment__icon"><span onclick="displayComments(<?= $cnt ?>,<?= $post->id ?>)"><i class="far fa-comment"></i> <?= $post->num_of_comments ?></span></span>
            <span class="main-post__details__footer__likes__icon"><i class="far fa-thumbs-up"></i></span>
            <span class="main-post__details__footer__likes__number">121</span>
        </div>

        <span class="main-post__details__show-comments--<?= $cnt ?>">
    
        </span>
    </div> 
</div>
<?php endforeach; ?>
  <?php endif; ?>
<?php include ('public/views/includes/footer.view.php') ?>