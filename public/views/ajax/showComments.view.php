<div class="main-post__add-post-comment">
    <form class="add-post-comment" id="storeComment">
        <input type="hidden" value="<?= $_GET['postId'] ?>" name="postId">
        <textarea class="add-post-comment__textarea" id="add-post-comment__textarea" rows="1" placeholder="Komentiraj..." name="comment"></textarea>
        <input type="submit" class="add-post-comment__btn" onclick="storeComment()" value="Objavi">
    </form>
</div>

<?php if(isset($comments)): ?>
    <?php foreach($comments as $comment) : ?>
        <?php if($comment->post_id === $_GET['postId']) : ?>
            <div class="main-post__details__comments-section">
                <span class="main-post__details__comments-section__user">
                    <a href ="#"><?= $comment->firstName ?> <?= $comment->lastName ?></a>
                </span>
                <span class="main-post__details__comments-section__comment">
                    <?= $comment->body ?>
                </span>
            </div>       
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
