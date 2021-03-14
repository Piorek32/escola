const inputs = [...document.querySelectorAll('.sing__up input[type="text"]')];
const inputsNumber = [
  ...document.querySelectorAll('.sing__up input[type="number"]'),
];
const allInputs = [...inputs, ...inputsNumber];

let checkbox = document.querySelector('input[type="checkbox"');

let isValid = false;
const error = document.querySelector(".error");
const success = document.querySelector(".success");

const validation = (isValid, isChecked) => {
  if (isValid && isChecked) {
    return true;
  } else {
    return false;
  }
};

successHandler = (data) => {
  let string = data.error_message
    .map((val) => {
      return `<p>${val}</p>`;
    })
    .join("");
  success.innerHTML = string;
};

errorHandler = (data) => {
  let string = data.error_message
    .map((val) => {
      return `<p>${val}</p>`;
    })
    .join("");
  error.innerHTML = string;
};

jQuery(document).ready(function ($) {
  $(".wordpress-ajax-form").on("submit", function (e) {
    error.innerHTML = "";
    success.innerHTML = "";
    e.preventDefault();
    isValid = allInputs.every((val) => val.value != "");
    isChecked = checkbox.checked;
    if (validation(isValid, isChecked)) {
      var $form = $(this);
      $.post(
        $form.attr("action"),
        $form.serialize(),
        function (data) {
          if (!data.error) {
            successHandler(data);
          } else {
            errorHandler(data);
          }
        },
        "json"
      );
    } else {
      if (!isValid) {
        error.innerHTML = "<p>Uzupełnuj wszystkie pola</p>";
      } else if (!isChecked) {
        error.innerHTML = "<p>Zaakceptuje regulamin<?p>";
      }
    }
  });
});
