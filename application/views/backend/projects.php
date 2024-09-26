<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-archive" aria-hidden="true"></i> Dự Án</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dự Án</li>
                    </ol>
                </div>
            </div>
            <?php
/*            $startDate = strtotime('2015-06-21');
            $endDate = strtotime('2015-08-01');
            for($i = $startDate; $i <= $endDate; $i = strtotime('+1 day', $i))
                        echo date('Y-m-d',$i);*/
/*                if($result == "Friday"){  
                   echo date("Y-m-d", strtotime($i)). " ".$result."<br>";
                } */
           ?>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                        
                        <?php } else { ?>
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Thêm Dự Án </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>Projects/All_Tasks" class="text-white"><i class="" aria-hidden="true"></i>  Danh sách công việc</a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>Projects/All_Tasks" class="text-white"><i class="" aria-hidden="true"></i>  Tham gia thực tế</a></button>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Danh sách dự án                       
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Tên Dự Án</th>
                                                <th>Trạng Thái </th>
                                                <th>Ngày Bắt Đầu</th>
                                                <th>Ngày Kết Thúc</th>
                                                <th>Hành Động </th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Project Title</th>
                                                <th>Status </th>
                                                <th>Start Date </th>
                                                <th>End Date </th>
                                                <th>Action </th>
                                            </tr>
                                        </tfoot> -->
                                        <tbody>
                                           <?php foreach($projects as $value): ?>
                                            <tr>
                                                <td><?php echo substr($value->pro_name,0,50).'....' ?></td>
                                                <td><?php echo $value->pro_status ?></td>
                                                <td><?php echo date('d-m-Y',strtotime($value->pro_start_date)); ?></td>
                                                <td><?php echo date('d-m-Y',strtotime($value->pro_end_date)) ?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="view?P=<?php echo base64_encode($value->id); ?>" title="Sửa" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="pDelet?D=<?php echo base64_encode($value->id); ?>" title="Xoá" onclick="alert('Bạn chắn chắn muốn xoá dự án ?')" class="btn btn-sm btn-danger waves-effect waves-light projectdelet"><i class="fa fa-trash-o"></i></a>
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
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1"><i class="fa fa-braille"></i> Thêm Dự Án</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Projects" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                           <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tên Dự Án</label>
                                                <input type="text" name="protitle" class="form-control" id="recipient-name1" minlength="8" maxlength="250" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Ngày Bắt Đầu</label>
                                                <input type="text" name="startdate" class="form-control datepicker" id="recipient-name1" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Ngày Kết Thúc</label>
                                                <input type="text" name="enddate" class="form-control datepicker" id="recipient-name1" required placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Bản tóm tắt</label>
                                                <textarea class="form-control" name="summery" id="message-text1" placeholder=""></textarea>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Chi Tiết</label>
                                                <textarea class="form-control" name="details" id="message-text1" minlength="10" maxlength="1300" rows="8" placeholder=""> </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Trạng Thái</label>
                                                <select class="form-control custom-select" data-placeholder="Chọn một mục" tabindex="1" name="prostatus" required>
                                                    <option value="upcoming">Sắp Hoàn Thành</option>
                                                    <option value="complete">Hoàn Thành</option>
                                                    <option value="running">Đang Chạy</option>
                                                </select>
                                            </div>
                                        </div>                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-success">Xác Nhận</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->    
<?php $this->load->view('backend/footer'); ?>