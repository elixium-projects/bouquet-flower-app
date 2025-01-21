import axios from "axios";
window.axios = axios;

const csrfTokenContent = document
    .querySelector("meta[name='csrf-token']")
    ?.getAttribute("content");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

if (csrfTokenContent) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = csrfTokenContent;
}
