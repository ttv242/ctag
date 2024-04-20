<!-- main page content body part -->
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Danh sách tài khoản</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">Tài khoản</li>
                        <li class="breadcrumb-item active">Danh sách tài khoản</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addcontact">Thêm mới</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tài khoản cần phê duyệt  -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Tài khoản cần phê duyệt</h2>
                        <ul class="header-dropdown">
                            <!-- <li><a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#addcontact">Add New</a></li> -->
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>
                                            <label class="fancy-checkbox">
                                                <input class="select-all" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                        </th>
                                        <th>Tên</th>
                                        <th>Biệt danh</th>
                                        <th>Điện thoại</th>
                                        <th>Ngày tạo TK</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $dataArr = json_decode($data, true);
                                    if (!empty($dataArr)) {
                                        foreach ($dataArr as $key => $item) { ?>
                                            <tr>
                                                <td class="width45">
                                                    <label class="fancy-checkbox">
                                                        <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                        <span></span>
                                                    </label>
                                                    <img src="https://wrraptheme.com/templates/iconic/dist/assets/images/xs/avatar1.jpg" class="rounded-circle avatar" alt="">
                                                </td>
                                                <td>

                                                    <h6 class="mb-0"><?= $item['name'] ?></h6>
                                                    <span><?= $item['email'] ?></span>
                                                </td>
                                                <td><span><?= $item['alias'] ?></span></td>
                                                <td><span><?= $item['number_phone'] ?></span></td>
                                                <td><?= $item['created_at'] ?></td>

                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-success">Phê duyệt</button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danh sách tài khoản -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2 class="block-header">Danh sách nhân viên</h2>
                        <ul class="header-dropdown">
                            <!-- <li><a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#addcontact">Add New</a></li> -->
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list">
                                <thead class="block-header">
                                    <tr>
                                        <th>
                                            <label class="fancy-checkbox">
                                                <input class="select-all" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                        </th>
                                        <th>Tên</th>
                                        <th>Biệt danh</th>
                                        <th>Điện thoại</th>
                                        <th>Ngày tạo TK</th>
                                        <th>URL</th>
                                        <th>Vị trí</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $dataArr = json_decode($data, true);
                                    if (!empty($dataArr)) {
                                        foreach ($dataArr as $key => $item) { ?>
                                            <tr>
                                                <td class="width45">
                                                    <label class="fancy-checkbox">
                                                        <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                        <span></span>
                                                    </label>
                                                    <img src="https://wrraptheme.com/templates/iconic/dist/assets/images/xs/avatar1.jpg" class="rounded-circle avatar" alt="">
                                                </td>
                                                <td>

                                                    <h6 class="mb-0"><?= $item['name'] ?></h6>
                                                    <span><?= $item['email'] ?></span>
                                                </td>
                                                <td><span><?= $item['alias'] ?></span></td>
                                                <td><span><?= $item['number_phone'] ?></span></td>
                                                <td><?= $item['created_at'] ?></td>
                                                <td>
                                                    <select name="role_urls" id="">
                                                        <option value="url">Trang admin</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="role_id" id="role_id">
                                                        <option value="role_id"><?= $item['role_id'] ?></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#editcontact"><i class="fa fa-edit"></i></button>
                                            
                                                    <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>

<!-- Default Size -->
<div class="modal animated zoomIn" id="addcontact" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Thêm tài khoản</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Họ tên">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Địa chỉ email">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Biệt danh">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Ngày tạo TK">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Vai trò">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">Đăng tải hình ảnh đại diện</small>
                        </div>
                        <hr>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Facebook">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Twitter">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Linkedin">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="instagram">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" style="color: green;">Thêm</button>
                <button type="button" class="btn btn-secondary" style="color: red;" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!--Edit box-->
<div class="modal animated zoomIn" id="editcontact" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Sửa tài khoản</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Họ tên">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Địa chỉ email">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Biệt danh">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Trang quản lý">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Vai trò">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">Đăng tải hình ảnh đại diện</small>
                        </div>
                        <hr>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Facebook">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Twitter">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Linkedin">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="instagram">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" >Cập Nhật</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Huỷ</button>
            </div>
        </div>
    </div>
</div>