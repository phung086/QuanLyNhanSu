<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>

<div class="page-wrapper">
<div class="message"></div>
<div class="row page-titles">
   <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor"><i class="fa fa-briefcase"></i> Ứng dụng
      </h3>
   </div>
   <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="javascript:void(0)">Home
            </a>
         </li>
         <li class="breadcrumb-item active">Ứng dụng ủy quyền hiện trường
         </li>
      </ol>
   </div>
</div>
<div class="container-fluid">
<div class="row m-b-10">
   <div class="col-12">
      <button type="button" class="btn btn-info">
      <i class="fa fa-plus"></i>
      <a data-toggle="modal" data-target="#appmodel" data-whatever="@getbootstrap" class="text-white" id="addNewApplication">
      <i class="" aria-hidden="true"></i>Thêm ứng dụng 
      </a>
      </button>
   </div>
</div>
<div class="row">
   <div class="col-12">
      <div class="card card-outline-info">
         <div class="card-header">
            <h4 class="m-b-0 text-white"> Danh sách ứng dụng                      
            </h4>
         </div>
         <div class="card-body">
            <div class="table-responsive ">
               <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Tên dự án</th>
                        <th>Vị trí</th>
                        <th>Mã Nhân Viên</th>
                        <th>Tên Nhân Viên</th>
                        <th>Bắt Đầu Ngày</th>
                        <th>Khoảng Ngày Kết Thúc</th>
                        <th>Tổng số ngày</th>
                        <th>Số Ngày Thực Tế</th>
                        <th>Trạng thái</th>
                        <th>Hành Động</th>
                     </tr>
                  </thead>
                  <!-- <tfoot>
                     <tr>
                        <th>ID</th>
                        <th>Project Name</th>
                        <th>Location</th>
                        <th>Employee PIN</th>
                        <th>Employee Name</th>
                        <th>start Date</th>
                        <th>Approx. End Date</th>
                        <th>Total Days</th>
                        <th>Actual Return Date</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </tfoot> -->
                  <tbody>
                     <?php foreach($application as $value): ?>
                     <tr style="vertical-align:top">
                        <td>
                           <?php echo $value->id; ?>
                        </td>
                        <td>
                           <?php echo substr($value->pro_name,0,22).'...'; ?>
                        </td>
                        <td>
                           <?php echo $value->field_location; ?>
                        </td>
                        <td>
                           <?php echo $value->em_code; ?>
                        </td>
                        <td>
                           <?php echo $value->first_name.' '.$value->last_name ?>
                        </td>
                        <td>
                           <?php echo date('d-m-Y',strtotime($value->start_date)); ?>
                        </td>
                        <td>
                           <?php echo date('d-m-Y',strtotime($value->approx_end_date)); ?>
                        </td>
                        <td>
                           <?php echo $value->total_days; ?>
                        </td>
                        <td>
                           <?php echo $value->actual_return_date; ?>
                        </td>
                        <td>
                           <?php echo $value->status; ?>
                        </td>
                        <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                        <?php } else { ?>
                        <td class="jsgrid-align-center">

                           <?php if($value->status =='Approve'){ ?>

                           <?php } elseif($value->status =='Not Approve'){ ?>

                           <a href="" title="Sửa" class="btn btn-sm btn-info waves-effect waves-light Status " data-id="<?php echo $value->id; ?>" data-value="Approved" data-duration="<?php echo $value->total_days; ?>">Chấp Nhận
                           </a>
                           <br>

                           <a href="" title="Sửa" class="btn btn-sm btn-info waves-effect waves-light  Status" data-id = "<?php echo $value->id; ?>" data-value="Rejected" >Từ Chối
                           </a>
                           <br>

                           <?php } elseif($value->status =='Rejected'){ ?>

                           <?php } ?>

                           <a href="" title="Sửa" class="btn btn-sm btn-primary waves-effect waves-light fieldAuthEdit" data-id="<?php echo $value->id; ?>" >
                            <i class="fa fa-pencil-square-o"></i>
                           </a>
                           
                           <?php if ($value->attendance_updated !== 'done' AND $value->status == 'Approved'): ?>
                               <a href="" id="closeAndUpdateFieldVisit" data-confirm="Bạn có chắc muốn đóng bảng và  cập nhập không ?" title="Đánh dấu đã xong" class="btn btn-sm btn-info waves-effect waves-light" data-id="<?php echo $value->id; ?>" data-employeeID="<?php echo $value->em_code; ?>">
                                <i class="fa fa-scissors"></i> Cập nhật 
                               </a>
                           <?php endif; ?>
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


<script>
    $(document).on('click', '#closeAndUpdateFieldVisit', function(e){
        console.log($(this).attr('data-id'));
        console.log($(this).attr('data-employeeID'));
        if(!confirm($(this).data('confirm'))){
            e.stopImmediatePropagation();
            e.preventDefault();
        } else {
            e.stopImmediatePropagation();
            e.preventDefault();
            $.ajax({
               url: "closeAndUpdateFieldVisit",
               type:"POST",
               data:
               {
                 'fieldApplicationID': $(this).attr('data-id'),
                 'employeeID': $(this).attr('data-employeeid')
               },
               success: function(response) {
                 //console.log(' ');
                 $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                 window.setTimeout(function(){
                   location.reload()} ,3000);
               }
               ,
               error: function(response) {
                 console.error();
               }
             });
        }
    });
</script>

<div class="row">
    <div class="col-md-12">
        <ul>
            <li>Khi bạn chỉnh sửa các biểu mẫu đã đăng ký từ nút chỉnh sửa, đừng quên ủy quyền lại việc phê duyệt thông tin.</li>
            <li>Sau khi bạn đưa ra phê duyệt cuối cùng và xác nhận kết thúc lần cuối, việc tham dự sẽ được cập nhật vĩnh viễn.</li>
        </ul>
    </div>
</div>
<div class="modal fade" id="appmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content ">
         <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel1">Ủy quyền
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
            </button>
         </div>
         <form method="post" action="Field_Application" id="fieldAuthForm" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="row">
              <div class="col-md-6">
               <div class="form-group">
                  <label>Tên dự án
                  </label>
                  <select class="form-control select2 custom-select emid"  tabindex="1" name="projectID" style="width:100%" required>
                     <?php foreach($projects as $project): ?>
                     <option value="<?php echo $project->id; ?>">
                        <?php echo substr($project->pro_name,0,60).'...' ?>
                     </option>
                     <?php endforeach; ?>
                  </select>
               </div>
               <div class="form-group">
                  <label>Nhân Viên
                  </label>
                  <select class="form-control select2 custom-select emid"  tabindex="1" name="emid" style="width:100%"  required>
                     <?php foreach($employee as $value): ?>
                     <option value="<?php echo $value->em_id; ?>">
                        <?php echo $value->first_name.' '.$value->last_name ?>
                     </option>
                     <?php endforeach; ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="fieldLocation" class="control-label">Địa Điểm</label>
                  <input type="text" class="form-control" placeholder="Địa Điểm" name="fieldLocation">
               </div>
               <div class="form-group">
                  <label class="control-label">Khoảng Ngày Bắt Đầu</label>
                  <input type="text" name="startdate" class="form-control mydatetimepickerFull" id="recipient-name1" required>
               </div>
               </div>
               <div class="col-md-6">
               <div class="form-group" id="enddate">
                  <label class="control-label">Khoảng Ngày Kết Thúc
                  </label>
                  <input type="text" name="enddate" class="form-control mydatetimepickerFull" id="recipient-name1">
               </div>               
               <div class="form-group" id="totalDays">
                  <label class="control-label">Tổng số ngày
                  </label>
                  <input type="number" name="totalDays" class="form-control" id="recipient-name1" readonly>
               </div>
               <div class="form-group">
                  <label class="control-label">Ghi chú
                  </label>
                  <textarea name="notes" id="notes" class="form-control" rows="5"></textarea>
               </div>
               <div class="form-group" id="returnDate">
                  <label class="control-label">Số Ngày Thực Tế
                  </label>
                  <input type="date" name="actualReturnDate" class="form-control" id="">
               </div>
            </div>
            </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="fid">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close
               </button>
               <button type="submit" class="btn btn-success">Xác Nhận
               </button>
            </div>
         </form>
      </div>
   </div>
</div>


<script>
  
  $("#addNewApplication").on("click", function() {
    console.log('Yes');
    $('#fieldAuthForm').find('[name="fid"]').val("").end();
    $('#fieldAuthForm').find('[name="projectID"]').val("").end();
    $('#fieldAuthForm').find('[name="emid"]').val("").end();
    $('#fieldAuthForm').find('[name="fieldLocation"]').val("").end();
    $('#fieldAuthForm').find('[name="startdate"]').val("").end();
    $('#fieldAuthForm').find('[name="enddate"]').val("").end();
    $('#fieldAuthForm').find('[name="notes"]').val("").end();



    $('#fieldAuthForm').find('[name="enddate"]').on("change", function() {
      console.log('Yes');
      var date1 = new Date($('#fieldAuthForm').find('[name="startdate"]').val());
      var date2 = new Date($('#fieldAuthForm').find('[name="enddate"]').val());
      var timeDiff = Math.abs(date2.getTime() - date1.getTime());
      var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
      $('#fieldAuthForm').find('[name="totalDays"]').val(diffDays).end();
    });

    $('#fieldAuthForm').find('[name="totalDays"]').val("").end();
    $('#fieldAuthForm').find('[name="actualReturnDate"]').val("").end();
    $('#fieldAuthForm').find('[id="returnDate"]').css("display", "none").end();

  });

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".fieldAuthEdit").click(function(e) {
            e.preventDefault(e);
            // Get the record's ID via attribute
            var fieldAppID = $(this).attr('data-id');
            $('#fieldAuthForm').trigger("reset");
            $('#fieldAuthForm #returnDate').css("display", "block !IMPORTANT");
            $('#appmodel').modal('show');
            $.ajax({
                url: 'getFieldVisitAppData?id=' + fieldAppID,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).done(function(response) {
                console.log(response);
                // Populate the form fields with the data returned from server
                $('#fieldAuthForm').find('[name="fid"]').val(response.id).end();
                $('#fieldAuthForm').find('[name="projectID"]').val(response.project_id).end();
                $('#fieldAuthForm').find('[name="emid"]').val(response.emp_id).end();
                $('#fieldAuthForm').find('[name="fieldLocation"]').val(response.field_location
).end();
                $('#fieldAuthForm').find('[name="startdate"]').val(response.start_date
).end();
                $('#fieldAuthForm').find('[name="enddate"]').val(response.approx_end_date).end();

var date1 = new Date(response.start_date);
var date2 = new Date(response.approx_end_date);
var timeDiff = Math.abs(date2.getTime() - date1.getTime());
var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 

                $('#fieldAuthForm').find('[name="totalDays"]').val(diffDays).end();
                $('#fieldAuthForm').find('[name="notes"]').val(response.notes).end();

                $('#fieldAuthForm').find('[id="returnDate"]').css("display", "block").end();
                $('#fieldAuthForm').find('[name="actualReturnDate"]').val(response.actual_return_date).end();




            });
        });
    });
</script> 


<script type="text/javascript">
   $(document).ready(function () {
     $(".assignleave").click(function (e) {
       e.preventDefault(e);
       // Get the record's ID via attribute  
       var iid = $(this).val();
       if(iid){
         console.log(iid);
         $.ajax({
           url: 'LeaveAssign?id=' + iid,
           method: 'GET',
           data: '',
         }
               ).done(function (response) {
           //console.log(response);
           $("#total").html(response);
         }
                     );
       }
       else {
         $("#total").val('');
       }
     }
                            );
   }
                    );
</script>
<script type="text/javascript">
   $(document).ready(function () {
     $(".emleavetype").click(function (e) {
       e.preventDefault(e);
       // Get the record's ID via attribute  
       var iid = $(this).val();
       //console.log(iid);
       $.ajax({
         url: 'LeaveType?id=' + iid,
         method: 'GET',
         data: '',
       }
             ).done(function (response) {
         //console.log(response);
         $("#leavetype").html(response);
       }
                   );
     }
                            );
   }
                    );
</script>
<script type="text/javascript">
   $(document).ready(function () {
     $(".leaveapp").click(function (e) {
       e.preventDefault(e);
       // Get the record's ID via attribute  
       var iid = $(this).attr('data-id');
       $('#leaveapply').trigger("reset");
       $('#appmodel').modal('show');
       $.ajax({
         url: 'LeaveAppbyid?id=' + iid,
         method: 'GET',
         data: '',
         dataType: 'json',
       }
             ).done(function (response) {
         console.log(response);
         // Populate the form fields with the data returned from server
         $('#leaveapply').find('[name="id"]').val(response.id).end();
         $('#leaveapply').find('[name="emid"]').val(response.em_id).end();
         $('#leaveapply').find('[name="applydate"]').val(response.apply_date).end();
         $('#leaveapply').find('[name="typeid"]').val(response.typeid).end();
         $('#leaveapply').find('[name="startdate"]').val(response.start_date).end();
         $('#leaveapply').find('[name="enddate"]').val(response.end_date).end();
         $('#leaveapply').find('[name="duration"]').val(response.leave_duration).end();
         $('#leaveapply').find('[name="reason"]').val(response.reason).end();
         $('#leaveapply').find('[name="status"]').val(response.leave_status).end();
         $('#leaveapply').find('[name="type"]').val(response.leave_type).end();
       }
                   );
     }
                         );
   }
                    );
</script>
<script>
   $(".Status").on("click", function(event){
     event.preventDefault();
     
     $.ajax({
       url: "authorizeFieldVisit",
       type:"POST",
       data:
       {
         'fieldApplicationID': $(this).attr('data-id'),
         'approvalStatus': $(this).attr('data-value')
       }
       ,
       success: function(response) {
         //console.log(' ');
         $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
         window.setTimeout(function(){
           location.reload()}
                           ,3000)
       }
       ,
       error: function(response) {
         console.error();
       }
     }
           );
   }
                  );
</script>
<?php $this->load->view('backend/footer'); ?>