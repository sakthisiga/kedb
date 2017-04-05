<div class="content-wrapper">
        <!-- Content Header (Page header) -->
         
        <section class="content-header">
          <h1>
            Register Deployment
            <small>Full Deployments</small>
          </h1>
          <h4><span class="label label-default"><a href="<?=base_url()?>deploy/search_deploy">Search Details</a></span></h4>
        </section>

<!-- Main content -->
        <section class="content">

<!-- New Article Form -->
          <div class="box box-success">
            <div id="notify"><!-- Error/Success/Warning Notifications go here.. --></div>				
            <div class="box-body">			
              <div class="row">
              <form id="add_deploy" class="form-entry" method="post" action="<?=site_url('api/add_deploy')?>">
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



<!--  Environment Field -->
                  <div class="form-group">
                    <label>Environment:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-gear"></i>
                      </div>
                      	<select id="environment" name="environment" class="form-control">
                      		<option></option>
							<option>DEV1</option>
							<option>DEV2</option>
							<option>DEV3</option>
							<option>DEV4</option>
							<option>DEV5</option>
							<option>DEV6</option>
							<option>CAT1</option>
							<option>CAT2</option>
							<option>CAT3</option>
							<option>CAT4</option>
							<option>CAT5</option>
							<option>CAT6</option>
                        </select>
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
							<option>Failed</option>
							<option selected="selected">Success</option>
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

<!--  Reason Field -->
                  <div class="form-group">
                    <label>Reason:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-gear"></i>
                      </div>
                      	<select id="reason" name="reason" class="form-control">
                      		<option></option>
							<option selected="selected">NA</option>
							<option>WSRP</option>
							<option>WAS</option>
							<option>PTL</option>
							<option>WPS</option>
							<option>HTML5</option>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
                  
<!--  Submit Button -->
                  <div class="form-group">
                    <div class="input-group"><label> &nbsp;</label><div> </div>
                      <button type="submit" class="btn btn-success btn">Submit</button> &nbsp
                      <button type="reset" class="btn btn-primary btn">Reset</button>
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
		    startDate: '-30d',
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