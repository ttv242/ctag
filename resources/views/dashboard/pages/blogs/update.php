<style>
    td div a:hover i {
        font-size: 20px;
        transition: .3s ease-out;
    }
</style>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Tạo bài viết</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo ROOT_URL . 'dashboard' ?>"><i
                                    class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Bài viết</li>
                        <li class="breadcrumb-item active">Thêm</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Viết bài</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <form id="basic-form" action="" method="POST" enctype="multipart/form-data" novalidate="">
                                <input type="hidden" name="id" value="<?= $data[0]['id'] ?>">
                                <div class="form-group">
                                    <label>Tiêu đề bài viết</label>
                                    <input type="text" class="form-control" required="" name="title"
                                        placeholder="Tiêu đề bài viết ở đây..." value="<?= $data[0]['title'] ?>">
                                </div>
                                <div class="col-12 row px-0">
                                    <div class="form-group col-6">
                                        <label>Danh mục bài viết (Categories)</label>
                                        <div class="c_multiselect">
                                            <select class="form-select form-control" name="categories_id"
                                                aria-label="Default select example">
                                                <option value="0">Chọn danh mục cha</option>
                                                <?php foreach ($categories as $key => $item):
                                                    if ($item['hidden'] == 0) {
                                                        continue;
                                                    }
                                                    ?>
                                                    <option value="<?= $item['id'] ?>" <?= $item['id'] == $data[0]['categories_id'] ? 'selected' : '' ?>>
                                                        <?= $item['name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Danh mục bài viết (Subcategories)</label>
                                        <div class="c_multiselect">
                                            <select class="form-select form-control" name="subcategories_id"
                                                aria-label="Default select example">
                                                <option value="0">Chọn danh mục con</option>
                                                <?php foreach ($subcategories as $key => $item):
                                                    if ($item['hidden'] == 0) {
                                                        continue;
                                                    }
                                                    ?>
                                                    <option value="<?= $item['id'] ?>" <?= $item['id'] == $data[0]['subcategories_id'] ? 'selected' : '' ?>>
                                                        <?= $item['name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn bài viết</label>
                                    <textarea class="form-control" rows="5" cols="30" required="" name="summary"
                                        placeholder="Mô tả ngắn bài viết ở đây..."><?= $data[0]['summary'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <button class="col-12 p-2 border" class="uploadImage" data-select-images='true'><?= $data[0]['img'] ?>
                                        <!-- <input type="hidden" value name="img"> -->
                                    </button>
                                </div>
                                <div class="form-group">
                                    <label>Nội dung bài viết</label>
                                    <textarea id="editor" class="form-control" rows="10" cols="30" required=""
                                        name="content"><?= $data[0]['content'] ?></textarea>
                                </div>
                                <div class="col-12 row">
                                    <div class="form-group col-6">
                                        <label>Trạng thái</label>
                                        <br>
                                        <label class="fancy-radio">
                                            <input type="radio" name="hidden" value="0" required=""
                                                data-parsley-errors-container="#error-radio"
                                                data-parsley-multiple="hidden" <?= $data[0]['hidden'] == 0 ? "checked" : '' ?>>
                                            <span><i></i>Ẩn</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="hidden" value="1" data-parsley-multiple="hidden" <?= $data[0]['hidden'] == 1 ? "checked" : '' ?>>
                                            <span><i></i>Hiện</span>
                                        </label>
                                        <p id="error-radio"></p>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Nổi bật</label>
                                        <br>
                                        <label class="fancy-radio">
                                            <input type="radio" name="featured" value="0" required=""
                                                data-parsley-errors-container="#error-radio"
                                                data-parsley-multiple="featured" <?= $data[0]['featured'] == 0 ? "checked" : '' ?>>
                                            <span><i></i>Không</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="featured" value="1"
                                                data-parsley-multiple="featured" <?= $data[0]['featured'] == 1 ? "checked" : '' ?>>
                                            <span><i></i>Có</span>
                                        </label>
                                        <p id="error-radio"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Meta keyword</label>
                                    <textarea class="form-control" rows="5" cols="30" required="" name="meta_keyword"
                                        placeholder="Meta keywords (từ khóa meta): Nhập các từ khóa liên quan đến nội dung..."><?= $data[0]['meta_keyword'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta description</label>
                                    <textarea class="form-control" rows="5" cols="30" required=""
                                        name="meta_description"
                                        placeholder="Meta description (mô tả meta): Nhập mô tả ngắn về nội dung..."><?= $data[0]['meta_description'] ?></textarea>
                                </div>
                                <input type="submit" class="col-12 btn btn-primary" name="update" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const selectCategories = document.querySelector('select[name="categories_id"]');
                const selectSubcategories = document.querySelector('select[name="subcategories_id"]');

                // Kiểm tra giá trị ban đầu của selectCategories và vô hiệu hóa selectSubcategories nếu có giá trị
                if (selectCategories.value !== selectCategories.options[0].value) {
                    selectSubcategories.disabled = true;
                }

                // Kiểm tra giá trị ban đầu của selectSubcategories và vô hiệu hóa selectCategories nếu có giá trị
                if (selectSubcategories.value !== selectSubcategories.options[0].value) {
                    selectCategories.disabled = true;
                }
                
                selectCategories.addEventListener('change', function (event) {
                    selectSubcategories.disabled = selectCategories.value !== selectCategories.options[0].value;
                });

                selectSubcategories.addEventListener('change', function (event) {
                    selectCategories.disabled = selectSubcategories.value !== selectSubcategories.options[0].value;
                });
            });
        </script>