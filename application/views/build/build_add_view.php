<div class="content-wrapper">
        <!-- Content Header (Page header) -->
         
        <section class="content-header">
          <h1>
            Register Build
            <small>Full/Patch Buildss</small>
          </h1>
          <h4><span class="label label-default"><a href="<?=base_url()?>build/search_build">Search Details</a></span></h4>
        </section>

<!-- Main content -->
        <section class="content">

<!-- New Article Form -->
          <div class="box box-default">
           				
            <div class="box-body">			
              <div class="row">
              <form id="add_build" class="form-entry" method="post" action="<?=site_url('api/add_build')?>">
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
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
 
 <!--  Build Field -->
                  <div class="form-group">
                    <label>Build:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-gear"></i>
                      </div>
                      	<select id="build" name="build" class="form-control" onchange='checkvalue(this.value)'>
                      		<option></option>
							<option>Patch</option>
							<option>Full</option>
                    </select>
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
                 </div>
                  
                
                
                <div class="col-md-4">	 
<!--  From Date Field -->


        		<div class="form-group">
                    <label>Build From:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" id="from_date" name="from_date" class="form-control" value="" onblur='date_change(this.value)'>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

<!--  Build End Date Field -->
                  <div class="form-group">
                    <label>Build End:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" id="build_date" name="build_date" class="form-control" value="">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
<!--  To Date Field -->
                  <div class="form-group">
                    <label>Deployment End:</label>
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
							<option>Failed</option>
							<option selected="selected">Success</option>
                    </select>
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
							<option>Build</option>
							<option>Package</option>
							<option>WSRP-PTL</option>
							<option>WAS</option>
							<option>WPS</option>
							<option>HTML5</option>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
                  
<!--  Submit Button -->
                  <div class="form-group">
                    <div class="input-group"><label> &nbsp;</label><div> </div>
                      <button type="submit" class="btn btn-success btn">Submit</button> &nbsp
                      <button type="reset" class="btn btn-primary btn">Reset</button> &nbsp
                      <a data-toggle="modal" title="Upload Builk Data" 
					   class="btn btn-warning" 
					   href="#Upload_Model">Import</a> &nbsp;
					   <a href="<?=base_url()?>public/templates/Build_Upload_Template.csv">Download Template</a>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                                                           
                </div><!-- /.col -->
                <div class="col-md-4">	
                     <div id="notify"><!-- Error/Success/Warning Notifications go here.. --></div>
                </div>
                </form>
              </div><!-- /.row -->         
            </div><!-- /.box-body -->    
           </div><!-- /.box -->
           
              <div id="Upload_Model" class="modal fade" role="dialog">
				  <div class="modal-dialog modal-sm">
				
				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" onclick="pageload()">&times;</button>
				        <h4 class="modal-title"><strong>BUILD: Upload the CSV File</strong></h4>
				      </div>
				      <div class="modal-body">
				      			<form method="post" action="<?=site_url('api/do_build_upload')?>" enctype="multipart/form-data" id="upload_csv" >
									<input type="file" name="userfile" size="10" class="btn btn-primary btn-sm" /><br />
									<input type="submit" value="upload" class="btn btn-warning btn-xs" />
								</form>
				       </div>
				    </div>
				  </div>
				 </div>
				 
				 
        </section><!-- /.content -->
        
        
      </div><!-- /.content-wrapper -->
      
      <script>
      function date_change(val)
      {
        	 document.getElementById('build_date').value=val;
        	 document.getElementById('to_date').value=val;
      }
      function checkvalue(val)
      {
          if(val==="Patch")
          {
             document.getElementById('to_date').disabled=false;
      	  }
          else
          {
        	 document.getElementById('to_date').value=null;
             document.getElementById('to_date').disabled=true;
          }
      }
      
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
          
          $('#build_date').datetimepicker({
                      format: 'YYYY-MM-DD HH:mm'
          });
          $('#to_date').datetimepicker({
              format: 'YYYY-M-DD HH:mm'
          });
      });
    </script>