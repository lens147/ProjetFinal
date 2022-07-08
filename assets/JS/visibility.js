const pass = document.querySelector('#password')
const repass = document.querySelector('#repass')
const button = document.querySelector('#visiblity-toggle')
const btn = document.querySelector('#re-visiblity-toggle')

button.addEventListener('click', () => {
    if (pass.type === "text") {
        pass.type = "password";
        button.innerHTML = "visibility_off";
    } else {
        pass.type = "text";
        button.innerHTML = "visibility";

    }
})
btn.addEventListener('click', () => {
    if (repass.type === "text") {
        repass.type = "password";
        btn.innerHTML = "visibility_off";
    } else {
        repass.type = "text";
        btn.innerHTML = "visibility";

    }
})