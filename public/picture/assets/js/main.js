window.addEventListener('DOMContentLoaded', function () {
    selectBtn = document.querySelector('button[data-select-images="true"]');
    selectBtnAlbum = document.querySelector('button[data-select-album="true"]');
    var originBtn = null;

    var newWindow; // Biến newWindow được khai báo ở mức độ phạm vi rộng

    window.addEventListener("message", (event) => {
        const receivedData = event.data;
        console.log("Received data from child window:", receivedData);

        if (receivedData != null) {
            if (receivedData.type === "img") {
                // Xử lý khi nhận được tin nhắn là "img"
                var imageNames = receivedData.data.map(function (image) {
                    return image.name;
                });

                if (selectBtn) {
                    // selectBtn.children[0].value = imageNames.join(", ");
                    window.console.log(selectBtn); // true
                    selectBtn.innerHTML = imageNames.join(", ") + '' + '<input type="hidden" value="' + imageNames.join(", ") + '" name="img">';
                }
            } else if (receivedData.type === "album") {
                // Xử lý khi nhận được tin nhắn là "album"
                var imageNames = receivedData.data.map(function (image) {
                    return image.name;
                });

                if (selectBtnAlbum) {
                    var albumValue = JSON.stringify(imageNames);
                    console.log(albumValue);
                    var inputElement = '<input type="hidden" value="' + imageNames.join(", ") + '" name="album">';
                    selectBtnAlbum.innerHTML = imageNames.join(", ") + inputElement;
                }
            }
        }
    });

    if (selectBtn) {
        selectBtn.addEventListener('click', function (event) {
            event.preventDefault();
            originBtn = 'img';
            openNewWindow();
        });
    }

    if (selectBtnAlbum) {
        selectBtnAlbum.addEventListener('click', function (event) {
            event.preventDefault();
            originBtn = 'album';
            openNewWindow();
        });
    }

    function openNewWindow() {
        // var currentURL = window.location.href;
        var currentURL = window.location.href;



        const baseUrl = window.location.origin; // Lấy đường dẫn gốc của dự án Laravel
        const newURL = `${baseUrl}/picture/index.php?option=${encodeURIComponent(originBtn)}`;


        // Mở cửa sổ mới với đường dẫn newURL và các thuộc tính cửa sổ
        const windowFeatures = "width=1800,height=1000";

        newWindow = window.open(newURL, '_blank', windowFeatures); // Gán giá trị cho biến newWindow
        window.addEventListener('unload', function () {
            // Kiểm tra nếu newWindow không tồn tại, xóa dữ liệu trong localStorage
            if (!newWindow || newWindow.closed) {
                localStorage.removeItem('imageData');
            }
        });
    };
});
