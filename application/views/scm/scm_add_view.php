<div class="content-wrapper">
        <!-- Content Header (Page header) -->
         
        <section class="content-header">
          <h1>
            Register SCM Support
            <small>GIT/Jenkins/Sonar/Merge/KLOC</small>
          </h1>
        </section>

<!-- Main content -->
        <section class="content">

<!-- New Article Form -->
          <div class="box box-warning">
            <div id="notify"><!-- Error/Success/Warning Notifications go here.. --></div>				
            <div class="box-body">			
              <div class="row">
              <form id="add_scm_support" class="form-entry" method="post" action="<?=site_url('api/add_scm_support')?>">
                <div class="col-md-4">
                
<!--  Date Field -->
                  <div class="form-group">
                    <label>Date:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" id="date" name="date" class="form-control" value="<?=date('m'.'/'.'d'.'/'.'Y');?>">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

<!--  Name Field -->
                  <div class="form-group">
                    <label>Name:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" id="name" name="name" class="form-control" value="<?=$this->session->userdata('emp_name')?>" readonly>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->



<!--  Activity Field -->
                  <div class="form-group">
                    <label>Activity:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-gear"></i>
                      </div>
                      	<select id="activity" name="activity" class="form-control select2">
                      		<option></option>
							<option>GIT Support	</option>
							<option>Jenkins Support</option>
							<option>Build Support</option>
							<option>Patch Build and Deploys</option>
							<option>Full Builds</option>
							<option>Deployments (alone)</option>
							<option>Merge Support</option>
							<option>Reporting</option>
							<option>Move IT</option>
							<option>V1 tracking</option>
							<option>Meetings</option>
							<option>SONAR</option>
							<option>IBM App Scan</option>
							<option>KLOC</option>
							<option>Validation</option>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
<!--  Release Field -->
                  <div class="form-group">
                    <label>Release:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-gear"></i>
                      </div>
                      	<select id="rel" name="rel" class="form-control">
                      		<option></option>
							<option>R1</option>
							<option>R1.5</option>
							<option>R2</option>
							<option>NA</option>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
				</div>
                            
                
                <div class="col-md-4">	 
<!--  From Date Field -->


        		<div class="form-group">
                    <label>From:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" id="from_date" name="from_date" class="form-control" value="">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

<!--  To Date Field -->
                  <div class="form-group">
                    <label>To:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" id="to_date" name="to_date" class="form-control" value="">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
<!--  Status Field -->
                  <div class="form-group">
                    <label>Status:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-gear"></i>
                      </div>
                      	<select id="status" name="status" class="form-control">
                      		<option></option>
							<option selected="selected">Completed</option>
							<option>Not Completed</option>
							<option>Aborted</option>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

<!--  Comment Field -->
                  <div class="form-group">
                    <label>Comment:</label>
                    <div class="input-group">
                     <textarea id="comment" name="comment" class="form-control" rows="4" cols="80" placeholder="Comment for the activity done (if any)"></textarea>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
                  
<!--  Submit Button -->
                  <div class="form-group">
                    <div class="input-group">
                      <button type="submit" class="btn btn-success btn-lg">Submit</button>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                                                           
                </div><!-- /.col -->
                </form>
              </div><!-- /.row -->         
            </div><!-- /.box-body -->    	
           </div><!-- /.box -->
        </section><!-- /.content -->
        
        
      </div><!-- /.content-wrapper -->
      
      <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2({
        		tags: true
        });

		//Date Picker
		$('#date').datepicker({
		    startDate: '0d',
		    autoclose: true
		});
 
          $('#from_date').datetimepicker({
              format: 'YYYY-MM-DD HH:mm'
          });
          $('#to_date').datetimepicker({
              format: 'YYYY-M-DD HH:mm'
          });
      });
    </script>