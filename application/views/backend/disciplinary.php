<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?> 
        <div class="message"></div>
         <div class="page-wrapper">
                <?php 
                $allemployees = $this->employee_model->GetAllEmployee(); 
                ?> 
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-compass" style="color:#1976d2"></i> Kỉ Luật</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Kỉ Luật</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"  class="text-white"><i class="" aria-hidden="true"></i> Thêm Kỉ Luật </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>employee/Employees" class="text-white"><i class="" aria-hidden="true"></i>  Danh Sách Nhân Viên</a></button>
                    </div>
                </div>         
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Danh Sách Kỉ Luật</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Tên</th>
                                                <th>Mã Nhân Viên</th>
                                                <th>Tiêu Đề </th>
                                                <th>Chi Tiết</th>
                                                <th>Trạng Thái</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Employee Name</th>
                                                <th>PIN</th>
                                                <th>Title </th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot> -->
                                        <tbody>
                                           <?php foreach($desciplinary as $value): ?>
                                            <tr>
                                                <td ><?php echo $value->first_name.' '.$value->last_name; ?></td>
                                                <td ><?php echo $value->em_code; ?></td>
                                                <td ><?php echo substr("$value->title",0,15).'...' ?></td>
                                                <td><?php echo substr("$value->description",0,10).'...' ?> </td>
                                                <td><button class="btn btn-sm btn-success"><?php echo $value->action; ?></button></td>
                                                <td  class="jsgrid-align-center ">
                                                    <a href="#" title="Sửa" class="btn btn-sm btn-primary waves-effect waves-light disiplinary" data-id="<?php echo $value->id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="DeletDisiplinary?D=<?php echo $value->id; ?>" onclick="confirm('Bạn có chắc chắn muốn xoá ?')" title="Xoá" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <!-- sample modal content -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel1">Thông Báo Kỉ Luật</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form method="post" action="add_Desciplinary" id="btnSubmit" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    
                                                        <div class="form-group">
                                                            <label class="control-label">Tên Nhân Viên</label>
                                                            <select class="form-control custom-select" name="emid" data-placeholder="Chọn một mục" tabindex="1" value="" required>
                                                               <?php foreach($allemployees as $value): ?>
                                                                <option value="<?php echo $value->em_id ?>"><?php echo $value->first_name.' '.$value->last_name ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Hành Động Kỉ Luật</label>
                                                            <select class="form-control custom-select" data-placeholder="Chọn một mục" tabindex="1" name="warning" value="">
                                                                <option value="Verbel Warning">Cảnh Cáo </option>
                                                                <option value="Writing Warning">Lập Biên Bản</option>
                                                                <option value="Demotion">Cách Chức</option>
                                                                <option value="Suspension">Đình Chỉ</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Tiêu Đề</label>
                                                            <input type="text" name="title" value="" class="form-control" id="recipient-name1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label">Chi Tiết</label>
                                                            <textarea class="form-control" value="" name="details" id="message-text1" rows="4"></textarea>
                                                        </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                   <input type="hidden" name="id" value="">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-success">Xác Nhận</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".disiplinary").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#btnSubmit').trigger("reset");
                                                $('#exampleModal').modal('show');
                                                $.ajax({
                                                    url: 'DisiplinaryByID?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#btnSubmit').find('[name="id"]').val(response.desipplinary.id).end();
                                                    $('#btnSubmit').find('[name="emid"]').val(response.desipplinary.em_id).end();
                                                    $('#btnSubmit').find('[name="warning"]').val(response.desipplinary.action).end();
                                                    $('#btnSubmit').find('[name="title"]').val(response.desipplinary.title).end();
                                                    $('#btnSubmit').find('[name="details"]').val(response.desipplinary.description).end();
												});
                                            });
                                        });
</script>
    <?php $this->load->view('backend/footer'); ?>