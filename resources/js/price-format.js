const inputPriceNumber = document.querySelector("input#price_number_input");

function formatRupiah(e) {
    const input = e.target;
    let angka = input.value.replace(/[^,\d]/g, "");

    let parts = angka.split(",");
    let sisa = parts[0].length % 3;
    let rupiah = parts[0].substr(0, sisa);
    let ribuan = parts[0].substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        let separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    input.value = parts[1] !== undefined ? rupiah + "," + parts[1] : rupiah;

    localStorage.setItem("inputPriceNumber", input.value);
}

inputPriceNumber.addEventListener("input", function (e) {
    formatRupiah(e);
});

window.addEventListener("DOMContentLoaded", function (e) {
    const storedPrice = localStorage.getItem("inputPriceNumber");
    if (storedPrice) {
        inputPriceNumber.value = storedPrice;
    }
});
