<div class="content-wrapper">
        <!-- Content Header (Page header) -->
         
        <section class="content-header">
          <h1>
            Add an Article
            <small>KEDB</small>
          </h1>
          <h4><span class="label label-default"><a href="<?=base_url()?>home/search_article">Search Article</a></span></h4>
        </section>

<!-- Main content -->
        <section class="content">

<!-- New Article Form -->
          <div class="box box-success">
            <div id="notify"><!-- Error/Success/Warning Notifications go here.. --></div>				
            <div class="box-body">			
              <div class="row">
              <form id="create_article" class="form-entry" method="post" action="<?=site_url('api/create_article')?>">
                <div class="col-md-6">
                
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

<!--  Employee Name Field -->
                  <div class="form-group">
                    <label>Employee Name:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" id="emp_name" name="emp_name" class="form-control" value="<?=$this->session->userdata('emp_name')?>" readonly>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->



<!--  Issue Field -->
                  <div class="form-group">
                    <label>Issue:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-info-circle"></i>
                      </div>
                      <input type="text" id="issue" name="issue" class="form-control" name="issue" placeholder="Brief description of the issue/problem statement">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
<!--  Description Field -->
                  <div class="form-group">
                    <label>Solution:</label>
                     <div class="input-group">
                      
                       <textarea id="description" name="description" class="form-control" rows="7" cols="80" placeholder="A detailed description of the solution for the problem"></textarea>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->     
                </div><!-- /.col -->    
                
                
                <div class="col-md-6">	 
<!--  State Field -->
                  <div class="form-group">
                    <label>State:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-university"></i>
                      </div>
                      <input type="text" id="state" name="state" class="form-control" value="<?=$this->session->userdata('state')?>" readonly>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

<!--  Tool Field -->
                  <div class="form-group">
                    <label>Tool:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-gear"></i>
                      </div>
                      	<select name="tool" class="form-control select2">
                      		<option></option>
							<option>GIT</option>
							<option>Stash</option>
							<option>Ant</option>
							<option>Maven</option>
							<option>Jenkins</option>
							<option>Sonar</option>
							<option>Full Build</option>
							<option>Patch Build</option>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
<!--  Problem Field -->
                  <div class="form-group">
                    <label>Problem:</label>
                     <div class="input-group">
                      
                       <textarea id="problem" name="problem" class="form-control" rows="4" cols="80" placeholder="A detailed description of the problem"></textarea>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->   
                  
                  
<!--  Submit Button -->
                  <div class="form-group">
                    <div class="input-group"><label> &nbsp;</label><div> </div>
                      <button type="submit" class="btn btn-success btn">Submit</button> &nbsp;
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
		    startDate: '0d',
		    autoclose: true
		});
      });
    </script>