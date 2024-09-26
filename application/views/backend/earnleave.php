<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
         <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-bookmark-o" style="color:#1976d2"> </i>Nghỉ Có Lương</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Nghỉ Có Lương</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#earnmodel" data-whatever="@getbootstrap" class="text-white TypeModal"><i class="" aria-hidden="true"></i> Chỉ Định Nghỉ Phép Được Hưởng </a></button>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Kiếm số dư                     
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Mã Nhân Viên </th>
                                                <th>Tên nhân viên </th>
                                                <!--<th>Total Day </th>-->
                                                <th>Tổng số giờ </th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Employee PIN</th>
                                                <th>Employee Name </th>
                                                <th>Total Day </th>
                                                <th>Total Hour </th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot> -->
                                        <tbody>
                                           <?php foreach($earnleave as $value): ?>
                                            <tr>
                                                <td><?php echo $value->em_code ?></td>
                                                <td><?php echo $value->first_name.' '.$value->last_name; ?></td>
                                                <!--<td><?php echo $value->present_date; ?></td>-->
                                                <td><?php echo $value->hour .' Hours' ?></td>
                                                <?php if($value->present_date > 0){ ?>
                                               <td class="jsgrid-align-center">
                                                    <a href="" title="Sửa" class="btn btn-sm btn-primary waves-effect waves-light deductionmodel" data-id="<?php echo $value->em_id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="modal fade" id="earnmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Nghỉ Có Lương</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Update_Earn_Leave" id="earnform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        
                                        <div class="form-group">
                                       <label>Nhân Viên </label>
                                        <select name="emid" class="form-control select2 custom-select" style="width:100%" required>
                                            <option>Chọn nhân viên</option>
                                            <?php foreach($employee as $value): ?>
                                            <option value="<?php echo $value->em_code ?>"><?php echo $value->first_name.' '.$value->last_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Bắt Đầu </label>
                                        <input type="text" name="startdate" class="form-control mydatepicker" value="" required>
                                        </div>
                                        <div class="form-group">
                                        <label>Kết Thúc</label>
                                        <input type="text" name="enddate" class="form-control mydatepicker" value="">
                                        </div>
                                        <!--<div class="form-group">
                                        <label>Number Of Days </label>
                                        <input type="text" name="days" class="form-control" value="" placeholder="number of days..." readonly>
                                        </div> -->                                         
                                        
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" name="eid" value="" class="form-control" id="recipient-name1">                                       
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-success">Xác Nhận</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="earndeductionmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Nghỉ Có Lương</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Update_Earn_Leave_Only" id="deductionform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        
                                        <div class="form-group">
                                       <label>Nhân Viên </label>
                                        <input type="text" name="emname" class="form-control" value="" readonly>
                                        <input type="hidden" name="employee" class="form-control" value="" readonly>
                                        </div> 
                                        <div class="form-group">
                                       <label>Số ngày </label>
                                        <input type="number" min="0" name="day" class="form-control day" value="" required>
                                        </div> 
                                        <div class="form-group">
                                       <label>Giờ </label>
                                        <input type="text" name="hour" class="form-control hour" value="" readonly>
                                        </div>                                         
                                        
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" name="eid" value="" class="form-control" id="recipient-name1">                                       
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-success">Xác Nhận</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".deductionmodel").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                console.log(iid);
                                                $('#deductionform').trigger("reset");
                                                $('#earndeductionmodel').modal('show');
                                                $.ajax({
                                                    url: 'GetEarneBalanceByEmCode?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#deductionform').find('[name="employee"]').val(response.earnval.em_id).end();
													$('#deductionform').find('[name="emname"]').val(response.earnval.emname).end();
                                                    $('#deductionform').find('[name="day"]').val(response.earnval.present_date).end();
                                                    $('#deductionform').find('[name="hour"]').val(response.earnval.hour).end();
/*                                                     if (response.assetsByid.Assets_type == 'Logistic')
                                                   $('#btnSubmit').find(':checkbox[name=type][value="Logistic"]').prop('checked', true);*/
                                                   
												});
                                            });
                                        });
</script> 
        <script type="text/javascript">
            $('.day').on('input', function() {
                var day = parseInt($('.day').val());
                console.log(hour);
                var hour = 8;
                $('.hour').val((day * hour ? day * hour : 0).toFixed(2));

            });
        </script>
        
        <script>
            $('#earnform').find('[name="enddate"]').on("change", function() {
              console.log('Yes');
              var date1 = new Date($('#earnform').find('[name="startdate"]').val());
              var date2 = new Date($('#earnform').find('[name="enddate"]').val());
              var timeDiff = Math.abs(date2.getTime() - date1.getTime());
              var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
              $('#earnform').find('[name="days"]').val(diffDays).end();
            });
        </script>
<?php $this->load->view('backend/footer'); ?>