const insertElementBeforeEvent = (parentNode, image) => {
    const newElement = document.createElement("div");
    newElement.setAttribute("id", "previewImage");
    newElement.style.textAlign = "center"; // Adjust the styling as desired

    const createDestroyImageBtn = () => {
        const destroyImageBtn = document.createElement("div");
        destroyImageBtn.setAttribute("class", "destroyImageBtn");
        destroyImageBtn.setAttribute("onclick", "destroyPreviewImage()");


        const destroyImageSvg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        destroyImageSvg.setAttribute("viewBox", "0 0 448 512");
        destroyImageSvg.setAttribute("class", "svgIcon");

        const destroyImagePath = document.createElementNS("http://www.w3.org/2000/svg", "path");
        destroyImagePath.setAttribute("d", "M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z");


        destroyImageSvg.appendChild(destroyImagePath);
        destroyImageBtn.appendChild(destroyImageSvg);

        newElement.appendChild(destroyImageBtn);
    }

    if (parentNode.querySelector("#previewImageTag")) {
        createDestroyImageBtn();
        let img = parentNode.querySelector("#previewImageTag");
        img.src = image;
    } else {
        createDestroyImageBtn();

        const img = document.createElement("img");
        img.setAttribute("id", "previewImageTag");
        img.style.maxWidth = "100%"; // Adjust the styling as desired
        img.style.height = "400px"; // Adjust the styling as desired
        img.style.padding = "10px 0"; // Adjust the styling as desired
        img.src = image;
        newElement.appendChild(img);
    }

    parentNode.insertBefore(newElement, parentNode.children[1]);
};

const handleSingleImagePost = (event) => {
    const file = event.target.files[0];
    const reader = new FileReader();
    const parentNode = event.target.parentNode;

    reader.onload = (e) => {
        const image = e.target.result;
        insertElementBeforeEvent(parentNode, image);
    };

    if (file) {
        reader.readAsDataURL(file);
    }
};

// Usage:
const fileInputImage = document.getElementById("fileInputImage");
fileInputImage.addEventListener("change", handleSingleImagePost);

let destroyImageBtn = document.querySelector(".destroyImageBtn");
const destroyPreviewImage = () => {
    let previewImage = document.querySelector("#previewImage");
    let inputFile = document.querySelector("input[type='file']");
    // console.log(previewImage);

    if (previewImage) {
        previewImage.remove();
    }
    if (inputFile) {
        inputFile.value = ""; // Xóa giá trị của input file
    }
};


const handleAlbumImagePost = (event) => {
    const reader = new FileReader();
    const parentNode = event.target.parentNode;
    console.log(parentNode);

    const fileInput = event.target;
    const files = fileInput.files;
    const fileCount = files.length;

    reader.onload = (e) => {
        const image = e.target.result;
        const newElement = document.createElement("div");
        newElement.setAttribute("class", "previewImage col-12 row");
        newElement.style.textAlign = "center";

        Array.from(files).forEach((file, index) => {
            const createDestroyImageBtn = () => {
                const destroyImageBtn = document.createElement("div");
                destroyImageBtn.setAttribute("class", "destroyImageBtn");
                destroyImageBtn.addEventListener("click", destroyPreviewImage);

                const destroyImageSvg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                destroyImageSvg.setAttribute("viewBox", "0 0 448 512");
                destroyImageSvg.setAttribute("class", "svgIcon");

                const destroyImagePath = document.createElementNS("http://www.w3.org/2000/svg", "path");
                destroyImagePath.setAttribute("d", "M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z");

                destroyImageSvg.appendChild(destroyImagePath);
                destroyImageBtn.appendChild(destroyImageSvg);

                newElement.appendChild(destroyImageBtn);
            };

            // createDestroyImageBtn();

            const img = document.createElement("img");
            img.setAttribute("class", "img-fluid col-3 p-1");

            img.src = URL.createObjectURL(file); // Sử dụng URL.createObjectURL() để tạo URL tạm thời cho file
            newElement.appendChild(img);
        });

        parentNode.insertBefore(newElement, parentNode.children[1]);
    };

    if (files && files[0]) {
        reader.readAsDataURL(files[0]);
    }
};

const fileInputAlbum = document.getElementById("fileInputAlbum");
fileInputAlbum.addEventListener("change", handleAlbumImagePost);