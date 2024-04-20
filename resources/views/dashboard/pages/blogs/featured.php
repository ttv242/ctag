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
                    <h2>Danh sách nổi bật</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo ROOT_URL . 'dashboard' ?>"><i
                                    class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Bài viết</li>
                        <li class="breadcrumb-item active">Danh sách nổi bật</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Danh sách</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th>Tiêu đề</th>
                                        <th class="text-center">Hình ảnh</th>
                                        <th class="col-2 text-center">Chức năng</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $dataArr = json_decode($data, true);
                                    if (!empty($dataArr)) {
                                        $index = 0;
                                        foreach ($dataArr as $key => $item) {
                                                $index = $index + 1;
                                                if ($item['hidden'] == 0 || $item['featured'] == 0) : $index = $index - 1; continue; endif;
                                            ?>

                                            <tr>
                                                <td>
                                                    <?= $index ?>
                                                </td>
                                                <td>
                                                    <?= $item['title'] ?>
                                                </td>

                                                <td class="text-center"><img class="col-2 img-fluid"
                                                        src="<?= PRIVATE_URL ?>inno-media/assets/upload/<?= $item['img'] ?>"
                                                        alt="<?= $item['title'] ?>" title="<?= $item['alias'] ?>"></td>
                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <a id="viewModalBtn" href="#viewModal" data-toggle="modal"
                                                            data-target="#viewModal" value="<?= $item['id'] ?>" title="Xem">
                                                            <i class="fa fa-search"></i>
                                                        </a>

                                                        <a id="editModalBtn" href="<?php echo ROOT_URL . DASHBOARD_URL . '/' . BLOGS_URL . '/update/' . $item['id']?>" title="Sửa">
                                                            <i class="fa fa-edit text-secondary"></i>
                                                        </a>

                                                        <a href="" title="Xóa" data-itemid="<?= $item['id'] ?>"
                                                            onclick="deleteItem(event)">
                                                            <i class="fa fa-trash-o text-danger"></i>
                                                        </a>
                                                    </div>

                                                </td>
                                            </tr>

                                            <?php
                                        }
                                    } else { ?>

                                        <tr>
                                            <td colspan="4" class="text-center mt-2 h6 text-danger">Không có danh mục</td>
                                        </tr>

                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>

                            <?php
                            if (!empty($dataArr)) {
                                ?>

                                <div class="col-12 pt-4 btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="col-12 btn-group d-flex justify-content-center m-auto" role="group"
                                        aria-label="First group">
                                        <?php
                                        for ($i = 1; $i <= $listPage; $i++) { ?>
                                            <a class="paginationBtn"
                                                href="http://localhost/<?php echo ROOT_URL . DASHBOARD_URL . '/' . BLOGS_URL ?>/list?page=<?php echo $i ?>">
                                                <!-- <button type="submit" class="btn btn-secondary"> -->
                                                <?php echo $i ?>
                                                <!-- </button> -->
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var ROOT_URL = '<?php echo ROOT_URL; ?>';
            let data = <?php echo $data; ?>;
            let categories = <?php echo $categories; ?>;
            let subcategories = <?php echo $subcategories;?>;

        </script>

        <!-- Default Size -->
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog">
            <style>
                .modal-lg {
                    max-width: 90%;
                    height: auto;
                }
            </style>
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="title" id="viewModalLabel"></h4>
                    </div>
                    <div class="modal-body">

                        <div class="card">

                            <div class="body">
                                <ul class=" list-unstyled basic-list">
                                    <li>ID <span class="badge">21</span></li>
                                    <li>Tiêu đề <span class="badge">Hossein</span></li>
                                    <li>Alias<span class="badge">Hossein</span></li>
                                    <li>Keyword<span class="badge text-wrap text-justify pb-4">Hos seinH osse inHos
                                            seinHosse inHosseinHo sseinHossein HosseinHosse inHosseinHosse
                                            inHosseinHosseinHosseinHossein</span></li>
                                    <li>Description<span class="badge text-wrap text-justify pb-4">Hos seinH osse inHos
                                            seinHosse inHosseinHo sseinHossein HosseinHosse inHosseinHosse
                                            inHosseinHosseinHosseinHossein</span></li>
                                    <li>Trạng thái<span class="badge">Hossein</span></li>
                                    <li>Ngày tạo<span class="badge">Hossein</span></li>
                                    <li>Ngày cập nhật<span class="badge">Hossein</span></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

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
                            viewModalLabel.textContent = item.title + ' - ' + (item.hidden == 0 ? 'Trạng thái: Ẩn' : 'Trạng thái: Hiện') + ' - ' +(item.featured == 0 ? 'Nổi bật: Không' : 'Nổi bật: Có');
                            let parentAlias;
                            if (categories.find(c => c.id === item.categories_id).alias) {
                                parentAlias = categories.find(c => c.id === item.categories_id).alias;
                            } else if (subcategories.find(c => c.id === item.subcategories_id).alias) {
                                parentAlias = subcategories.find(c => c.id === item.subcategories_id).alias;
                            }
                            viewModalBody.innerHTML = `
                                <iframe src="${ROOT_URL}/tin-tuc/${parentAlias}/${item.alias}" frameborder="0" width="100%" height="500"></iframe>
                            `;
                        }
                    });
                });
            });
            </script>

        <!-- <script src="<?= PRIVATE_URL ?>handleEvent/handleImage.js"></script> -->