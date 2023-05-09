<?php
    session_start();
    if(!$_SESSION['email']){
    header('Location:/');
    }
    require_once 'header.php';
?>

<main>
<div class="wrapper">
    <form action="php-scripts/action_db.php" method="post" enctype="multipart/form-data" class="form-load" id="form-load">
        <input type="text" placeholder="Название" class="filename" name="title">
        <input type="text" placeholder="Описание" class="fileDescription" name="description">
        <div class="fileLoad-area">
            <div class="files">
<!--                <div class="file-item">-->
<!--                    <div class="file-name">Расписание занятий. 1 курс</div>-->
<!--                    <div class="file-size">2.6 Mb</div>-->
<!--                    <img src="assets/img/close-svg.svg" alt="">-->
<!--                </div>-->
<!---->
<!--                <div class="file-item">-->
<!--                    <div class="file-name">Расписание занятий. 1 курс</div>-->
<!--                    <div class="file-size">2.6 Mb</div>-->
<!--                    <img src="assets/img/close-svg.svg" alt="">-->
<!--                </div>-->

                <input type="file" accept=".zip,.doc,.docx,.xls,.xlsx,.pdf,.jpg,.png" multiple="multiple" id="input__file" placeholder="Добавить файл" class="input-load-real" name="file">
                <label for="input__file" class="input-load-fake">
                    <img src="assets/img/+_green.png" alt="">
                    <span class="button-load-text">Добавить файл</span>
                </label>


            </div>

            <div class="load-description">
                Допустимые типы файл: zip, doc, docx, xls, xlsx, pdf, jpg, png
            </div>

            <div class="error_load" id="error_load"></div>
        </div>
        <button class="btn-load login__submit" type="button">Опубликовать пост</button>
    </form>
</div>
</main>
<script src="assets/js/addFiles.js"></script>
<?php
    require_once 'footer.php'
?>
