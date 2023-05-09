<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=adge">
    <title> Лабораторная работа</title>
    <link rel="stylesheet" href="assets/styles/style.css">

    <!--    Шрифты-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
<header class="header">
    <div class="contatiner">
        <div class="header__row">

            <a class="header__logo" href="/">
                <img src="assets/img/logo.png" alt="Лого">
                <p>Студенческий файлообменник
                </p>
            </a>

            <di class="header__actions">
                <?php
                if(isset($_SESSION['name'])){?>
                    <div class="user">
                        <div class="user__name">
                            Здравствуйте, <?=$_SESSION['name']?>
                        </div>
                        <a href="/php-scripts/exit.php" class="user__exit-btn header__button">
                            Выход
                        </a>
                    </div>
                <?php }

                else{?>
                    <button class="header__button header__button__registration">Регистрация</button>
                    <button class="header__button header__button__login">Вход</button>
                <?php }
                ?>


                <div class="form">
                    <div class="form__background">
                    </div>
                    <div class="form__window">
                        <div  class="back">
                            <button class="close-button"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="C:\OpenServer\domains\web\assets\img\close.svg">
                                    <path d="M4 4L16 16" stroke="#B9B9B9" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M16 4L4 16" stroke="#B9B9B9" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </button>
                        </div>



                        <div class="form__window__change-mode">
                            <button class="change-mode__button change-mode__button__registration change-mode__button__active">
                                Регистрация
                            </button>
                            <button class="change-mode__button change-mode__button__autorization change-mode__button__unactive">
                                Авторизация
                            </button>
                        </div>

                        <div class="registration__form">
                            <form action="" method="post" id="form-register">
                                <div class="registration-inputs__container">
                                    <div class="registration__name">
                                        <label class="input__label input__label__big">
                                            <input type="text" required name="name" class="form__input registration__form__input form__input__big registration__name__input">
                                            <p class="form__placeholder registration__placeholder">
                                                Ваше имя
                                            </p>
                                        </label>
                                    </div>

                                    <div class="registration__email">
                                        <label class="input__label">
                                            <input type="text" required name="email" class="form__input registration__form__input registration__email__input">
                                            <p class="form__placeholder registration__placeholder">
                                                Email
                                            </p>
                                        </label>
                                    </div>

                                    <div class="registration__phone">
                                        <label class="input__label">
                                            <input type="text" onkeyup="this.value = this.value.replace (/\D/, '')" required name="telefon" class="form__input registration__form__input registration__phone__input">
                                            <p class="form__placeholder registration__placeholder">
                                                Мобильный телефон
                                            </p>
                                        </label>
                                    </div>

                                    <div class="registration__pass">
                                        <label class="input__label">
                                            <input type="password" required name="password" class="form__input registration__form__input registration__pass__input">
                                            <p class="form__placeholder registration__placeholder">
                                                Пароль
                                            </p>
                                        </label>
                                    </div>

                                    <div class="registration__pass-check">
                                        <label class="input__label">
                                            <input type="password" required name="password2" class="form__input registration__form__input registration__pass-check__input">
                                            <p class="form__placeholder registration__placeholder">
                                                Повторите пароль
                                            </p>
                                        </label>
                                    </div>
                                </div>

                                <div class="agree">
                                    <label class="agree__checkbox__label">
                                        <input type="checkbox" class="agree__checkbox">
                                        <div class="agree__checkbox__background"></div>
                                    </label>
                                    <p class="agree__text">
                                        Согласен на обработку
                                        <a class="agree__link">персональных данных</a>
                                    </p>
                                </div>


                                <input type="button" value="Зарегистрироваться" disabled class="registration__submit submit__unactive">
                                <div class="error" id="error-register"></div>

                                <div class="registration__info">
                                    <div class="registration__info__icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="10" cy="10" r="7" stroke="#838383" stroke-width="2"/>
                                            <rect x="9" y="6" width="2" height="5" rx="1" fill="#838383"/>
                                            <rect x="9" y="12" width="2" height="2" rx="1" fill="#838383"/>
                                        </svg></div>

                                    <p class="registration__info__text">
                                        Все поля обязательны для заполнения
                                    </p>
                                </div>
                            </form>
                        </div>

                        <div class="login__form" id="rrr">
                            <form action="" method="post" id="form-login">
                                <div class="login-inputs__container">
                                    <div class="login__email">
                                        <label class="input__label">
                                            <input type="text" required name="email" class="form__input login__form__input login__email__input">
                                            <p class="form__placeholder login__placeholder">
                                                Email
                                            </p>
                                        </label>
                                    </div>

                                    <div class="login__pass">
                                        <label class="input__label">
                                            <input type="password" required name="password" class="form__input login__form__input login__pass__input">
                                            <p class="form__placeholder login__placeholder">
                                                Пароль
                                            </p>
                                        </label>
                                    </div>
                                </div>

                                <input type="button" disabled value="Войти" class="login__submit submit__unactive">
                                <div class="error" id="error-login"></div>

                                <div class="registration__info">
                                    <div class="registration__info__icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="10" cy="10" r="7" stroke="#838383" stroke-width="2"/>
                                            <rect x="9" y="6" width="2" height="5" rx="1" fill="#838383"/>
                                            <rect x="9" y="12" width="2" height="2" rx="1" fill="#838383"/>
                                        </svg></div>
                                    <p class="registration__info__text">
                                        Все поля обязательны для заполнения
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <hr>

    </div>
    </div>
</header>
