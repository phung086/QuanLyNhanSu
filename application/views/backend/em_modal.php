                        <!-- sample modal content -->
                        <div class="modal fade" id="EduModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Thông báo kỷ luật</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Education" id="educationmodal" enctype="multipart/form-data">
                                    <div class="modal-body">
			                                    <div class="form-group">
			                                        <label>Bậc</label>
			                                        <input type="text" name="name" class="form-control form-control-line" placeholder=" Bậc" minlength="2" required> 
			                                    </div>
			                                    <div class="form-group">
			                                        <label>Tên Trường</label>
			                                        <input type="text" name="institute" class="form-control form-control-line" placeholder=" Tên Trường" minlength="7" required> 
			                                    </div>
			                                    <div class="form-group">
			                                        <label>Kết Quả</label>
			                                        <input type="text" name="result" class="form-control form-control-line" placeholder=" Kết Quả" minlength="2" required> 
			                                    </div>
			                                    <div class="form-group">
			                                        <label>Hoàn Thành Năm</label>
			                                        <input type="text" name="year" class="form-control form-control-line" placeholder="Hoàn Thành Năm"> 
			                                    </div>                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="emid" value=""> 
                                        <input type="hidden" name="id" value=""> 
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-success">Xác Nhận</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>                        
                        <!-- sample modal content -->
                        <div class="modal fade" id="ExpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1"></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Experience" id="experiencemodal" enctype="multipart/form-data">
                                    <div class="modal-body">
			                                    	<div class="form-group">
			                                    	    <label> Tên Công Ty</label>
			                                    	    <input type="text" name="company_name" class="form-control form-control-line company_name" placeholder="Tên Công Ty" minlength="2" required> 
			                                    	</div>
			                                    	<div class="form-group">
			                                    	    <label>Chức vụ</label>
			                                    	    <input type="text" name="position_name" class="form-control form-control-line position_name" placeholder="Chức Vụ" minlength="3" required> 
			                                    	</div>
			                                    	<div class="form-group">
			                                    	    <label>Địa chỉ</label>
			                                    	    <input type="text" name="address" class="form-control form-control-line duty" placeholder=" Địa Chỉ" minlength="7" required> 
			                                    	</div>
			                                    	<div class="form-group">
			                                    	    <label>Thời gian làm việc</label>
			                                    	    <input type="text" name="work_duration" class="form-control form-control-line working_period" placeholder="Thời Gian Làm Việc" required> 
			                                    	</div>                                      
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="emid" value=""> 
                                        <input type="hidden" name="id" value=""> 
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-success">Xác Nhận</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>