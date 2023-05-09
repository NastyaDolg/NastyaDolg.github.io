<?php
    session_start();
    include 'db_connection.php';

    $posts = $mysql->query("SELECT * FROM posts ORDER BY id DESC");
    require_once 'header.php'
?>

  <main>
    <div class="contatiner">
      <div class="main-row">
        <h1 class="h1 main-row__title">Учебные материалы</h1>
          <?php if(isset($_SESSION['name'])){?>
              <a href="/add_post.php" class="btn-add-link">
                  <button class="main-row__button">
                      <div class="button-plus"><img src="assets/img/+.svg" alt=""></div>
                      <div class="button-text">Добавить пост</div>
                  </button>
              </a>
                <?php }

                else{?>
                    <button class="main-row__button btn-denied" data-tooltip="Вы не авторизованы!">
                        <div class="button-plus"><img src="assets/img/+.svg" alt=""></div>
                        <div class="button-text">Добавить пост</div>
                    </button>
                <?php }
                ?>
      </div>
      
      <div class="cards">
        <?php
            foreach ($posts as $row) { ?>
                <div class="card">
                  <p class="card__date">Добавлено <?=date("d",strtotime($row['data_load']))?> декабря</p>
                  <p class="card__title"><?=$row['title']?></p>
                  <a href="postDetail.php?post=<?=$row['id']?>" class="card__button">Подробнее</a>
                </div>

                <a href="postDetail.php?post=<?=$row['id']?>" class="card card-mobile">
                    <p class="card__date card__date-mobile"><img src="assets/img/clock.svg" alt=""> <?=date("d.m.y",strtotime($row['data_load']))?></p>
                    <p class="card__title"><?=$row['title']?></p>
                </a>
        <?php }
        ?>
      </div>
      <button class="show-more">Показать ещё</button>
    </div>
  </main>

<?php
    require_once 'footer.php'
?>

