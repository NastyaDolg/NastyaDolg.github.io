<?php
    session_start();
    include 'db_connection.php';
    $postId = $_GET['post'];

    $post = $mysql->query("SELECT * FROM posts WHERE id = '$postId'");
    $post = $post->fetch();

    $id_user = $post['id_user'];
    $owner = $mysql->query("SELECT name, email FROM users WHERE id = '$id_user'");
    $owner = $owner->fetch();

    $files  = $mysql->query("SELECT * FROM files WHERE id_post = '$postId'");
    require_once 'header.php'
?>

<?php
?>
<main>
<div class="wrapper">
    <div class="main-row">
        <h1 class="h1 post-title"><?=$post['title']?></h1>
        <a href="/" class="main-row__button btn-prev">
            <img src="assets/img/back.png" alt="">
            <span class="btn-prev-text">Назад к списку</span>
        </a>
    </div>
    <div class="post-info">
        <p class="post-date">Добавлено <?=date("d.m.y",strtotime($post['data_load']))?> в <?=date("H:i:s",strtotime($post['data_load']))?></p>
        <img src="assets/img/dot.png" alt="">
        <p class="post-owner"><?=$owner['name']?>, <?=$owner['email']?></p>
    </div>
    <p class="post-description"><?=$post['description']?></p>

    <div class="post-files">

        <?php foreach ($files as $file){
        ?>
            <div class="post-files__item file-item">
                <a href="<?=$file['path']?>" download=""><img src="assets/img/load.png" alt=""></a>
                <div class="file-name"><?=$file['name']?></div>
                <div class="file-size"><?=round($file['size']/1000, 0)?> KB</div>
            </div>
        <?php }?>

    </div>
</div>
</main>
<?php
    require_once 'footer.php'
?>

