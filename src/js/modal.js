document.addEventListener("DOMContentLoaded", function () {
    const regModal = document.getElementById("registrationModal");
    const loginModal = document.getElementById("loginModal");

    if (!regModal || !loginModal) return;

    // Маска для номера телефона
    let inputPhone = document.getElementById("phone");
    if (inputPhone) {
        inputPhone.addEventListener("input", () => phoneMask(inputPhone));
    }

    function phoneMask(inputEl) {
        let patStringArr = "+7 (___) ___-__-__".split('');
        let arrPush = [4, 5, 6, 9, 10, 11, 13, 14, 16, 17]; 
        let val = inputEl.value.replace(/\D+/g, "").split('').splice(1);
        let n;

        val.forEach((s, i) => {
            n = arrPush[i];
            patStringArr[n] = s;
        });

        inputEl.value = patStringArr.join('');
        inputEl.setSelectionRange(n ? n + 1 : 18, n ? n + 1 : 18);
    }

    // Регистрация по кнопке (по ID)
    document.getElementById("registerButton")?.addEventListener("click", function () {
        const registerForm = document.getElementById("registerForm");

        if (registerForm) {
            const phoneField = registerForm.querySelector("input[name='phone']");
            if (phoneField) {
                phoneField.value = phoneField.value.replace(/\D+/g, ""); // Удаление всех символов, кроме цифр
            }

            const formData = new FormData(registerForm);

            fetch("../server/register.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "success") {
                    alert("Регистрация прошла успешно!");
                    regModal.style.display = "none";
                    loginModal.style.display = "flex";
                } else {
                    alert(data);
                }
            });
        }
    });

    // Авторизация по кнопке (по ID)
    document.getElementById("loginButton")?.addEventListener("click", function () {
        const loginForm = document.getElementById("loginForm");

        if (loginForm) {
            const formData = new FormData(loginForm);

            fetch("../server/login.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "success") {
                    alert("Вход выполнен успешно!");
                    window.location.reload();
                } else {
                    alert(data);
                }
            });
        }
    });

    // Открытие авторизации по иконке
    document.querySelector(".open-login-modal")?.addEventListener("click", (e) => {
        e.preventDefault();
        loginModal.style.display = "flex";
    });

    // Закрытие окон по крестику
    document.querySelectorAll(".close")?.forEach(closeBtn => {
        closeBtn.addEventListener("click", () => {
            regModal.style.display = "none";
            loginModal.style.display = "none";
        });
    });

    // Переключение между окнами
    document.querySelector(".switch-to-login")?.addEventListener("click", (e) => {
        e.preventDefault();
        regModal.style.display = "none";
        loginModal.style.display = "flex";
    });

    document.querySelector(".switch-to-register")?.addEventListener("click", (e) => {
        e.preventDefault();
        loginModal.style.display = "none";
        regModal.style.display = "flex";
    });

    // Закрытие окна по клику вне области контента
    window.addEventListener("click", (event) => {
        if (event.target === regModal) regModal.style.display = "none";
        if (event.target === loginModal) loginModal.style.display = "none";
    });
});