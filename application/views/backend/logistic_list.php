<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-map-o"></i> Danh sách hỗ trợ hậu cần</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><i class="fa fa-bars" aria-hidden="true"></i> Danh sách hậu cần</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>Projects/All_Assets" class="text-white"><i class="" aria-hidden="true"></i>  Danh sách tài sản</a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>Projects/All_Assets" class="text-white"><i class="" aria-hidden="true"></i>  Hỗ trợ hậu cần</a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Danh sách hậu cần</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tiêu đề tài sản </th>
                                                <th>Chi Tiết </th>
                                                <th>Loại </th>
                                                <th>Số lượng </th>
                                                <th>Thời Gian </th>
                                                <th>Hành Động </th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Assets Title </th>
                                                <th>Description </th>
                                                <th>Type </th>
                                                <th>Quantity </th>
                                                <th>Date </th>
                                                <th>Action </th>
                                            </tr>
                                        </tfoot> -->
                                        <tbody>
                                           <?php foreach($logisticview as $value): ?>
                                            <tr>
                                                <td><?php echo $value->id ?></td>
                                                <td><?php echo $value->assets_name ?></td>
                                                <td><?php echo substr($value->description,0,42).'.......' ?></td>
                                                <td><?php echo $value->Assets_type ?></td>
                                                <td><?php echo $value->quantity ?></td>
                                                <td><?php echo $value->entry_date ?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="#" title="Sửa" class="btn btn-sm btn-primary waves-effect waves-light assets" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="<?php echo base_url();?>projects/AssetsDelet?D=<?php echo $value->id; ?>" onclick="confirm('Are you Sure??')" title="Delete" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            <!-- sample modal content -->
                        <div class="modal fade" id="assetsmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Thêm tài sản </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="<?php echo base_url(); ?>projects/Add_Assets" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        
                                            <div class="form-group">
                                                <label class="control-label">Tên tài sản</label>
                                                <input type="text" name="assetstitle" class="form-control" id="recipient-name1" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Chi Tiết</label>
                                                <input type="text" name="details" class="form-control" id="recipient-name1">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Số Lượng</label>
                                                <input type="text" name="qty" class="form-control" id="recipient-name1">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Nhập Ngày</label>
                                                <input type="text" name="date" class="form-control mydatepicker" id="recipient-name1 datetimepicker2">
                                            </div>
                                            <div class="form-group">
                                                <input name="type" type="checkbox" id="radio_2" data-value="Logistic" class="type" value="Logistic">
                                                <label for="radio_2">Thêm vào danh sách hỗ trợ hậu cần</label>
                                            </div>                                           
                                        
                                    </div>
                                    <div class="modal-footer">
                                       <input type="hidden" name="aid" value="">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-success">Xác Nhận</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".assets").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#btnSubmit').trigger("reset");
                                                $('#assetsmodel').modal('show');
                                                $.ajax({
                                                    url: '<?php echo base_url();?>projects/AssetsByID?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#btnSubmit').find('[name="aid"]').val(response.assetsByid.id).end();
                                                    $('#btnSubmit').find('[name="assetstitle"]').val(response.assetsByid.assets_name).end();
                                                    $('#btnSubmit').find('[name="qty"]').val(response.assetsByid.quantity).end();
                                                    $('#btnSubmit').find('[name="date"]').val(response.assetsByid.entry_date).end();
                                                    $('#btnSubmit').find('[name="details"]').val(response.assetsByid.description).end();                                                   // $('#btnSubmit').find('[name="type"]').val(response.assetsByid.Assets_type).end();//
                                                     if (response.assetsByid.Assets_type == 'Assets')
                                                   $('#btnSubmit').find(':checkbox[name=type][value="Assets"]').prop('checked', true);
                                                   else
                                                    $('#btnSubmit').find(':radio[name=type][value="Logistic"]').prop('checked', true);
                                                   
												});
                                            });
                                        });
</script>                       
    <?php $this->load->view('backend/footer'); ?>        