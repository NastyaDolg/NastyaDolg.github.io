/*
$('.open-poput').click(function(e){
  e.preventDefault();
  $('.poput-bg').fadeIn(600);
  $('html').addClass('no-scroll');
});
$('.close-poput').click(function(){
  $('.poput-bg').fadeOut(600);
  $('html').removeClass('no-scroll');
});
*/
let registrationInputs;
let registrationPlaceholders;
let registrationCheckbox;
let registrationSubmitButton;

let loginInputs;
let loginPlaceholders;
let loginSubmitButton;

let panelsIsActive = false;

window.onload = function () {
    registrationInputs = document.querySelectorAll(".registration__form__input");
    registrationPlaceholders = document.querySelectorAll(".registration__placeholder");
    registrationCheckbox = document.querySelector(".agree__checkbox");
    registrationSubmitButton = document.querySelector(".registration__submit");


    document.querySelector(".header__button__registration").onclick = showRegistrationForm;
    document.querySelector(".header__button__login").onclick = showLoginForm;
    //document.querySelector(".change-mode__button__registration").onclick = showRegistrationForm;
    //document.querySelector(".change-mode__button__login").onclick = showLoginForm;
    document.querySelector(".close-button").onclick = closePanels;
    document.querySelector(".form__background").onclick = closePanels;
    


    for (let i = 0; i < registrationInputs.length; i++) {
        if (registrationInputs[i].value != "") {
            registrationPlaceholders[i].classList.add("form__placeholder__mini");
            registrationInputs[i].parentNode.parentNode.classList.add("registration__not-empty");
        }
        else {
            registrationPlaceholders[i].classList.remove("form__placeholder__mini");
            registrationInputs[i].parentNode.parentNode.classList.remove("registration__not-empty");
        }

        checkRegistrationFields();


        registrationInputs[i].oninput = function () {
            if (registrationInputs[i].value != "") {
                registrationPlaceholders[i].classList.add("form__placeholder__mini");
                registrationInputs[i].parentNode.parentNode.classList.add("registration__not-empty");
            }
            else {
                registrationPlaceholders[i].classList.remove("form__placeholder__mini");
                registrationInputs[i].parentNode.parentNode.classList.remove("registration__not-empty");
            }

            checkRegistrationFields();
        }
    }

    registrationCheckbox.onclick = checkRegistrationFields;



    loginInputs = document.querySelectorAll(".login__form__input");
    loginPlaceholders = document.querySelectorAll(".login__placeholder");
    loginSubmitButton = document.querySelector(".login__submit");

    for (let i = 0; i < loginInputs.length; i++) {
        if (loginInputs[i].value != "") {
            loginPlaceholders[i].classList.add("form__placeholder__mini");
            loginInputs[i].parentNode.parentNode.classList.add("login__not-empty");
        }
        else {
            loginPlaceholders[i].classList.remove("form__placeholder__mini");
            loginInputs[i].parentNode.parentNode.classList.remove("login__not-empty");
        }

        checkLoginFields();


        loginInputs[i].oninput = function () {
            if (loginInputs[i].value != "") {
                loginPlaceholders[i].classList.add("form__placeholder__mini");
                loginInputs[i].parentNode.parentNode.classList.add("login__not-empty");
            }
            else {
                loginPlaceholders[i].classList.remove("form__placeholder__mini");
                loginInputs[i].parentNode.parentNode.classList.remove("login__not-empty");
            }

            checkLoginFields();
        }
    }




    let registrationModeButton = document.querySelector(".change-mode__button__registration");
    let loginModeButton = document.querySelector(".change-mode__button__autorization");
    let registrationButton = document.querySelector(".change-mode__button__registration");
    let loginButton = document.querySelector(".change-mode__button__autorization");
    registrationModeButton.onclick = function () {
        showRegistrationForm();
    }
    loginModeButton.onclick = function () {
        showLoginForm();
    }
    registrationButton.onclick = function () {
        showRegistrationForm();
        registrationModeButton.classList.add("change-mode__button__active");
        loginModeButton.classList.remove("change-mode__button__active");
    }
    loginButton.onclick = function () {
        showLoginForm();
        registrationModeButton.classList.remove("change-mode__button__active");
        loginModeButton.classList.add("change-mode__button__active");
    }



    let formBackground = document.querySelector(".form__background");
    formBackground.onclick = function () {
        let form = document.querySelector(".form");
        form.style.display = "none";
    }
}


function checkRegistrationFields() {
    if (registrationCheckbox.checked == false) {
        registrationSubmitButton.disabled = true;
        registrationSubmitButton.classList.add("submit__unactive");
        return;
    }
    ;
    for (let i = 0; i < registrationInputs.length; i++) {
        if (registrationInputs[i].value == "") {
            registrationSubmitButton.disabled = true;
            registrationSubmitButton.classList.add("submit__unactive");
            return;
        }
    }
    registrationSubmitButton.disabled = false;
    registrationSubmitButton.classList.remove("submit__unactive");
}


function checkLoginFields() {
    for (let i = 0; i < loginInputs.length; i++) {
        if (loginInputs[i].value == "") {
            loginSubmitButton.disabled = true;
            loginSubmitButton.classList.add("submit__unactive");
            return;
        }
    }
    loginSubmitButton.disabled = false;
    loginSubmitButton.classList.remove("submit__unactive");
}


function showRegistrationForm() {
    console.log("reg");
    let form = document.querySelector(".form");
    form.style.display = "block";
    let registrationFields = document.querySelector(".registration__form");
    let loginFields = document.querySelector(".login__form");
    registrationFields.style.display = "block";
    loginFields.style.display = "none";
    document.querySelector(".change-mode__button__registration").classList.add("change-mode__button__active");
    document.querySelector(".change-mode__button__autorization").classList.remove("change-mode__button__active");
    
}

function showLoginForm() {
    console.log("log");
    let form = document.querySelector(".form");
    form.style.display = "block";
    let registrationFields = document.querySelector(".registration__form");
    let loginFields = document.querySelector(".login__form");
    registrationFields.style.display = "none";
    loginFields.style.display = "block";
    document.querySelector(".change-mode__button__registration").classList.remove("change-mode__button__active");
    document.querySelector(".change-mode__button__autorization").classList.add("change-mode__button__active");
    
}

const loginForm = document.getElementById('form-login');
const registerForm = document.getElementById('form-register');

console.log(registerForm)
function closePanels(){
    let formPanel = document.querySelector(".form");
    let form = document.getElementById(formPanel.getAttribute("id"));
    formPanel.style.display = "none";
    loginForm.reset()
    registerForm.reset()
}


const register_submit_btn = document.querySelector('.registration__submit')

register_submit_btn.addEventListener('click',
    function() {
        if (!register_submit_btn.classList.contains('submit__unactive')) {
            let name = registerForm.name.value;
            let email = registerForm.email.value;
            let number = registerForm.telefon.value;
            let userpassr = registerForm.password.value;
            let userpass2 = registerForm.password2.value;

            let error = "";

            let checklog = /^[\w]{3,}$/;
            let regExp = /\S+@\S+\.\S+/;
            let telcheck = /^\+?[78][-\(]?\d{3}\)?-?\d{3}-?\d{2}-?\d{2}$/;

            if (name == "" || email == "" || number == "" || userpassr == "" || userpass2 == "") {
                error = "Заполните все поля!";

            }
            // else if (name.length < 3) {
            //     error += "Логин слишком короткий! (Не менее 3 символов)";
            //
            // }
            else if (!checklog.test(name)) {
                error += "Неверно указано имя!";

            }
            else if (!regExp.test(email)) {
                error += "Неверно указан email!";

            }
            else if (isNaN(number)) {
                error += "Номер телефона должен содержать цифры!";

            } else if (number.length < 11) {
                error += "Номер телефона слишком короткий!";

            } else if (!telcheck.test(number)) {
                error += "Неверно указан номер телефона!";

            } else if (userpassr.length < 6) {
                error += "Слишком короткий пароль!(Не менее 6 символов)";

            } else if (userpassr != userpass2) {
                error += "Пароли должны совпадать!";
            }

            if (error != "") {
                document.getElementById('error-register').innerHTML = error;
                console.log(error)
            } else {
                $.ajax({
                    type: "POST",
                    url: "../../php-scripts/register.php",
                    data: {
                        name: name,
                        email: email,
                        telefon: number,
                        password: userpassr
                    },
                    cache: false,
                    success: function(html) {
                        if (html != "") {
                            document.getElementById('error-register').innerHTML = html;
                            return;
                        }
                        alert("Регистрация прошла успешно!")
                        window.location = '/';
                        console.log("ok");
                    }
                });
            }
        }
    });

const login_submit_btn = document.querySelector('.login__submit')

login_submit_btn.addEventListener('click',
    function check_auth() {
        let email = loginForm.email.value;
        let pass_v = loginForm.password.value;
        $.ajax({
            type: "POST",
            url: "../php-scripts/auth.php",
            data: {
                email: email,
                password: pass_v
            },
            cache: false,
            success: function(html) {
                document.getElementById('error-login').innerHTML = html;
                if (html == "") {
                    window.location = '/'
                }
            }
        })
        return false;
    })

const tooltipDivs = document.querySelectorAll('[data-tooltip]')

console.log(tooltipDivs)

tooltipDivs.forEach((item) => {
    let tooltipElem;
    let tooltipHtml = item.getAttribute('data-tooltip')
    tooltipElem = document.createElement('div');
    tooltipElem.className = 'tooltip';
    tooltipElem.innerHTML = tooltipHtml;
    item.parentNode.append(tooltipElem);
})


