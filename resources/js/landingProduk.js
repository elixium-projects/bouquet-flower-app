// search
document
    .getElementById("search-form")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        const query = document
            .getElementById("search-input")
            .value.toLowerCase();
        const products = document.querySelectorAll(".card");
        let hasResult = false;

        products.forEach((product) => {
            const productName = product
                .querySelector(".card-title")
                .textContent.toLowerCase();
            if (productName.includes(query)) {
                product.style.display = "block";
                hasResult = true;
            } else {
                product.style.display = "none";
            }
        });

        const messageContainer = document.getElementById("no-results");
        if (!hasResult) {
            if (!messageContainer) {
                const container = document.getElementById("product-container");
                const message = document.createElement("p");
                message.id = "no-results";
                message.textContent = "Produk tidak ditemukan";
                message.className = "text-center text-black p-5 font-semibold";
                container.appendChild(message);
            }
        } else {
            if (messageContainer) {
                messageContainer.remove();
            }
        }
    });
