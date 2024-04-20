
// console.log(data);

document.addEventListener('DOMContentLoaded', function () {
    let viewModal = document.getElementById('viewModal');
    let viewModalLabel = document.getElementById('viewModalLabel');
    let viewModalBody = viewModal.querySelector('.modal-body');

    let viewModalBtns = document.querySelectorAll("#viewModalBtn");

    viewModalBtns.forEach(function (viewBtn) {
        viewBtn.addEventListener('click', function (event) {
            let viewTargetValue = viewBtn.getAttribute('value');
            let viewFilteredData = data.filter(function (item) {
                return item.id === parseInt(viewTargetValue);

            });

            if (viewFilteredData.length > 0) {
                let item = viewFilteredData[0];
                viewModalLabel.textContent = item.name;
                viewModalBody.innerHTML = `
            <div class="card">
                <div class="body">
                    <ul class="list-unstyled basic-list">
                        <li>ID <span class="badge">${item.id}</span></li>
                        <li>Tên Sản Phẩm <span class="badge">${item.name}</span></li>
                        <li>Alias<span class="badge">${item.alias}</span></li>
                        <li>Tên Danh Mục <span class="badge">${item.category_id}</span></li>
                        <li>Tên Thương Hiệu <span class="badge">${item.brand_id}</span></li>
                        <li>Giá<span class="badge">${item.price}</span></li>
                        <li>Giá Giảm<span class="badge">${item.discount}</span></li>
                        <li>Keyword<span class="badge text-wrap text-justify pb-4">${item.keyword}</span></li>
                        <li>Description<span class="badge text-wrap text-justify pb-4">${item.description}</span></li>
                        <li>Xu hướng<span class="badge">${item.strending == 0 ? "Ẩn" : "Hiện"}</span></li>
                        <li>Nổi bật<span class="badge">${item.feature == 0 ? "Ẩn" : "Hiện"}</span></li>
                        <li>Trạng thái<span class="badge">${item.hidden == 0 ? "Ẩn" : "Hiện"}</span></li>
                        <li>Ngày tạo<span class="badge">${item.created_at}</span></li>
                        <li>Ngày cập nhật<span class="badge">${item.updated_at}</span></li>
                    </ul>
                </div>
            </div>
        `;
            }
        });
    });

    let editModal = document.getElementById('editModal');
    let editModalLabel = document.getElementById('editModalLabel');
    let editModalBody = editModal.querySelector('.modal-body');
    let editModalBtns = document.querySelectorAll("#editModalBtn");
    editModalBtns.forEach(function (editBtn) {
        editBtn.addEventListener('click', function (event) {
            let editTargetValue = editBtn.getAttribute('value');
            let editFilteredData = data.filter(function (item) {
                return item.id === parseInt(editTargetValue);
            });

            if (editFilteredData.length > 0) {
                let item = editFilteredData[0];
                editModalLabel.textContent = "Cập nhật";
                if (parentData) {
                    console.log(parentData);
                };
                editModalBody.innerHTML = `
                <div class="modal-body">
                    <div class="">
                        <div class="">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="body">
                                        <form id="basic-form" action="" method="POST" enctype="multipart/form-data" novalidate>
                                            <input type="hidden" class="form-control" name="id" value="${item.id}">
                                            <div class="form-group">
                                                <label>Tên Sản Phẩm</label>
                                                <input type="text" class="form-control" name="name" value="${item.name}" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Icon</label>
                                                <div class="reviewImage text-center">
                                                    <img class="col-3 img-fluid pb-4" src="<?= PUBLIC_URL ?>ct_shop/uploads/products/images/${item.image}" alt="${item.alias}">
                                                </div>
                                                <input type="file" class="form-control" name="image"
                                                    onchange="handleImageUpload(event)" />
                                            </div>

                                            <div class="form-group">
                                                <label>Keyword</label>
                                                <input type="email" class="form-control" name="keyword" value="${item.keyword}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" rows="5" cols="30" name="description"
                                                    required>${item.description}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <br />
                                                <label class="fancy-radio">
                                                    <input type="radio" name="hidden" ${item.hidden == 0 ? "checked" : ""} value="0" required
                                                        data-parsley-errors-container="#error-radio">
                                                    <span><i></i>Ẩn</span>
                                                </label>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="hidden" ${item.hidden == 1 ? "checked" : ""} value="1">
                                                    <span><i></i>Hiện</span>
                                                </label>
                                                <p id="error-radio"></p>
                                            </div>

                                            <!-- <br> -->
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary" name="update" value="Lưu thay đổi"></input>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Hủy</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            }

            // Show the modal
            // You can use your preferred method to show the modal, for example:
            // viewModal.show();
        });
    });
});



const categorySelectElement = document.querySelector('.categorySingleSelection');
const categoryButtonTextElement = document.querySelector('.categoryMultiselectSelectedText');
const categoryListItems = document.querySelectorAll('.categoryMultiselectContainer li');

if (categorySelectElement && categoryButtonTextElement && categoryListItems) {
    categoryListItems.forEach(function (categoryItem) {
        const categoryRadioInput = categoryItem.querySelector('input[type="radio"]');
        const categoryRadioValue = categoryRadioInput.value;
        const categoryRadioLabel = categoryItem.textContent.trim();

        categoryItem.addEventListener('click', function () {
            categorySelectElement.value = categoryRadioValue;
            categoryButtonTextElement.textContent = categoryRadioLabel;
        });
    });
} else {
    console.error('Không tìm thấy phần tử cần thiết.');
}

const brandSelectElement = document.querySelector('.brandSingleSelection');
const brandButtonTextElement = document.querySelector('.brandMultiselectSelectedText');
const brandListItems = document.querySelectorAll('.brandMultiselectContainer li');

if (brandSelectElement && brandButtonTextElement && brandListItems) {
    brandListItems.forEach(function (brandItem) {
        const brandRadioInput = brandItem.querySelector('input[type="radio"]');
        const brandRadioValue = brandRadioInput.value;
        const brandRadioLabel = brandItem.textContent.trim();

        brandItem.addEventListener('click', function () {
            brandSelectElement.value = brandRadioValue;
            brandButtonTextElement.textContent = brandRadioLabel;
        });
    });
} else {
    console.error('Không tìm thấy phần tử cần thiết.');
}