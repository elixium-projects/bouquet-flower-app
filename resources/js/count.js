const buttonAdd = document.querySelector("button#btn_add");
const buttonLess = document.querySelector("button#btn_less");
const inputCount = document.querySelector("input#input_count");

function buttonCountHandler(e) {
    const button = e.target;

    switch (button.id) {
        case "btn_add":
            inputCount.setAttribute("value", inputCount.value++);
            break;
        case "btn_less":
            if (inputCount.value <= 0) {
                break;
            }
            inputCount.setAttribute("value", inputCount.value--);
            break;
        default:
    }
}

buttonAdd.addEventListener("click", (e) => buttonCountHandler(e));
buttonLess.addEventListener("click", (e) => buttonCountHandler(e));
