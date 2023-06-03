const input = document.querySelector("#phone");

const errorMsg = document.querySelector("#error-msg");
const validMsg = document.querySelector("#valid-msg");

const form = document.querySelector("#form");
const message = document.querySelector("#message");

    window.intlTelInput(input, {
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
});

window.intlTelInput(input, {
    initialCountry: "auto",
    geoIpLookup: callback => {
        fetch("https://ipapi.co/json")
            .then(res => res.json())
            .then(data => callback(data.country_code))
            .catch(() => callback("EG"));
    },
    utilsScript: "/intl-tel-input/js/utils.js?1681516311936" // just for formatting/placeholders etc
});
// here, the index maps to the error code returned from getValidationError - see readme
const errorMap = [
    "Invalid number",
    "Invalid country code",
    "Too short",
    "Too long",
    "Invalid number",
];

// initialise plugin
const iti = window.intlTelInput(input, {
    hiddenInput: "full_phone",
    utilsScript: "/intl-tel-input/js/utils.js?1681516311936" // just for formatting/placeholders etc
});

const reset = () => {
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
};

// on blur: validate
input.addEventListener("blur", () => {
    reset();
    if (input.value.trim()) {
        if (iti.isValidNumber()) {
            validMsg.classList.remove("hide");
        } else {
            input.classList.add("error");
            const errorCode = iti.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
        }
    }
});

// on keyup / change flag: reset
input.addEventListener("change", reset);
input.addEventListener("keyup", reset);



form.onsubmit = () => {
    if (!iti.isValidNumber()) {
        message.innerHTML = "Invalid number. Please try again.";
        return false;
    }
};

const urlParams = new URLSearchParams(window.location.search);
const fullPhone = urlParams.get('full_phone')
if (fullPhone) {
    message.innerHTML = `Submitted hidden input value: ${fullPhone}`;
}
