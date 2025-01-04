export function PreviewImage(event) {
    const target = event.target;

    if (target.files.length > 0) {
        let src = URL.createObjectURL(target.files[0]);
        const imgFileUpload = document.querySelector(
            "img#image_upload_preview"
        );
        imgFileUpload.src = src;

        if (imgFileUpload.classList.contains("hidden")) {
            imgFileUpload.classList.replace("hidden", "block");
        }
    }
}

const imgFileUpload = document.querySelector(
    "input[type='file']#img_file_upload"
);

imgFileUpload.addEventListener("change", function (e) {
    PreviewImage(e);
});
