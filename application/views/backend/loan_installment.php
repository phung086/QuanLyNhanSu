<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-money"></i> Khoản vay trả góp</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Khoản vay trả góp</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#loanmodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Thêm khoản vay trả góp </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>Loan/installment" class="text-white"><i class="" aria-hidden="true"></i>  Danh sách cho vay</a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Khoản vay trả góp                       
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="loan123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Mã Nhân Viên</th>
                                                <th>ID khoản vay</th>
                                                <th>Số tiền vay </th>
                                                <th>Hạn Mức </th>
                                                <!--<th>Pay Amount</th>-->
                                                <th>Phê duyệt ngày </th>
                                                <th>Người nhận </th>
                                                <th>Số Ngày Vay </th>
                                                <th>Hành Động </th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Employee PIN</th>
                                                <th>Loan Id</th>
                                                <th>Loan Number </th>
                                                <th>Install Amount </th>
                                                <th>Pay Amount</th>
                                                <th>Approve Date </th>
                                                <th>Receiver </th>
                                                <th>Install No </th>
                                                <th>Action </th>
                                            </tr>
                                        </tfoot> -->
                                        <tbody>
                                           <?php foreach($installment as $value): ?>
                                            <tr>
                                                <td><?php echo $value->em_code ?></td>
                                                <td><?php echo $value->loan_id ?></td>
                                                <td><?php echo $value->loan_number ?></td>
                                                <td><?php echo $value->install_amount ?></td>
                                                <!--<td><?php #echo $value->pay_amount ?></td>-->
                                                <td><?php echo date('d-m-Y',strtotime($value->app_date)); ?></td>
                                                <td><?php echo $value->receiver ?></td>
                                                <td><?php echo $value->install_no ?></td>
                                                <td class="jsgrid-align-center">
                                                    <a href="#" title="Sửa" class="btn btn-sm btn-primary waves-effect waves-light installment" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="#" title="Xoá" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash-o"></i></a>
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
            </div>
                        <!-- sample modal content -->
                        <div class="modal fade" id="loanmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Thêm khoản vay</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form role="form" method="post" action="Add_Loan_Installment" id="loanvalueform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                             <div class="form-group">
                                                <label class="control-label">Giao cho</label>
                                                <select class="form-control custom-select" data-placeholder="Chọn một mục" tabindex="1" name="emid" id="employee" required>
                                                  <option value="">Chọn ở đây</option>
                                                   <?php foreach($employee as $value): ?>
                                                    <option value="<?php echo $value->em_id; ?>"><?php echo $value->first_name.' '.$value->last_name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>  
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Số tiền vay</label>
                                                <input type="text" name="loanno" class="form-control" id="recipient-name1" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Hạn Mức</label>
                                                <input type="text" name="amount" class="form-control" id="recipient-name1" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Ngày</label>
                                                <input type="text" name="appdate" class="form-control mydatetimepickerFull" id="recipient-name1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Người nhận</label>
                                                <input type="text" name="receiver" class="form-control" id="recipient-name1" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Số Ngày Vay</label>
                                                <input type="text" name="installno" class="form-control" id="recipient-name1" readonly required>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label"> Ghi chú</label>
                                                <textarea class="form-control" name="notes" id="message-text1"></textarea>
                                            </div>                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                       <input type="hidden" name="loanid" value="">
                                       <input type="hidden" name="id" value="">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-success">Xác Nhận</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal --> 
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".installment").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#loanvalueform').trigger("reset");
                                                $('#loanmodel').modal('show');
                                                $.ajax({
                                                    url: 'LoanByID?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
                                                    $('#loanvalueform').find('[name="id"]').val(response.loanvalueinstallment.id).end();
                                                    $('#loanvalueform').find('[name="loanid"]').val(response.loanvalueinstallment.loan_id).end();
                                                    $('#loanvalueform').find('[name="emid"]').val(response.loanvalueinstallment.emp_id).end();
                                                    $('#loanvalueform').find('[name="loanno"]').val(response.loanvalueinstallment.loan_number).end();
                                                    $('#loanvalueform').find('[name="amount"]').val(response.loanvalueinstallment.install_amount).end();
                                                    $('#loanvalueform').find('[name="appdate"]').val(response.loanvalueinstallment.app_date).end();
                                                    $('#loanvalueform').find('[name="receiver"]').val(response.loanvalueinstallment.receiver).end();
                                                    $('#loanvalueform').find('[name="installno"]').val(response.loanvalueinstallment.install_no).end();
                                                    $('#loanvalueform').find('[name="notes"]').val(response.loanvalueinstallment.notes).end();
												});
                                            });
                                        });
</script>                           
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#employee").change(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = +this.value;
                                                //console.log(this.value);
                                                $( "#loanvalueform" ).change();
                                                //$('#salaryform').trigger("reset");
                                                $.ajax({
                                                    url: 'LoanByID?id=' + this.value,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													if(response.loanvalueem == null){
                                                    $('#loanvalueform').find('[class="form-control"]').val("","true").end();    
                                                    }
                                                    $('#loanvalueform').find('[name="loanid"]').val(response.loanvalueem.id).end();
                                                    $('#loanvalueform').find('[name="amount"]').val(response.loanvalueem.installment).end();
                                                    $('#loanvalueform').find('[name="loanno"]').val(response.loanvalueem.loan_number).end();
                                                    $('#loanvalueform').find('[name="installno"]').val(response.loanvalueem.install_period).end();
												});
                                            });
                                        });
</script>                           
<?php $this->load->view('backend/footer'); ?>
  <script>
    $('#loan123').DataTable({
        "aaSorting": [[4,'desc']],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>