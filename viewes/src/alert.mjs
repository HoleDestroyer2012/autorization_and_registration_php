function alert() {
    let element = document.querySelector(".container");
    let data = element.getAttribute("data-container");
    switch (data) {
        case "registration_container":
            return registration_container();
        case "login_container":
            return login_container();
    }
}

function registration_container() {
    const password = document.querySelector("#password").value;
    const passwordConfirm = document.querySelector("#password_confirm").value;
    if (password !== passwordConfirm) {
        console.log(password, passwordConfirm);
        window.alert("Wrong password confirmation");
        return false;
    }
    return true;
}

function login_container() {
    alert('xyi');
    return false;
}

export default alert;
