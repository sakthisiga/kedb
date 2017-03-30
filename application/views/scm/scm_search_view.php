<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SCM Support
            <small>with View, Search and Edit Options</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-warning">
                <div class="box-body">
                <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#search"><b>Custom Search</b></button><p></p>
                  <div class="container col-xs-12">
				   <div id="search" class="collapse">
				   <div class="panel panel-default">
  					<div class="panel-body">
    				  <form class="form-horizontal">
						  <div class="form-group">
						    <label for="fromdate" class="col-sm-2 control-label">From Date:</label>
						    <div class="col-sm-5">
						      <input type="text" id="date_min" name="date_min" placeholder="Select - From Date">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="todate" class="col-sm-2 control-label">To Date:</label>
						    <div class="col-sm-5">
						      <input type="text" id="date_max" name="date_max" placeholder="Select - To Date">
						    </div>
						  </div>
						</form>
  					  </div>
				    </div>
				  </div>
				</div>
                   <table id="article-table" class="table table-bordered table-condensed">
                    <thead>
                      <tr>
                        <th>SCM ID</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Activity</th>
                        <th>Release</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                        <th>Comment</th>
                      </tr>
                    </thead>
                    <tfoot>
			          <tr>
			           <th>SCM ID</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Activity</th>
                        <th>Release</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                        <th>Comment</th>
			          </tr>
			        </tfoot>
                    <tbody>
                    
                      <?php foreach($scmdetails as $row) : ?>
							<tr>
								<td><a data-toggle="modal" 
										data-sid="<?php echo $row->scm_id; ?>" 
										data-date="<?php echo $row->date; ?>"
										data-name='<?php echo $row->name; ?>'
										data-activity='<?php echo $row->activity; ?>'
										data-release='<?php echo $row->rel; ?>'
										data-sdate='<?php echo $row->from_date; ?>'
										data-edate='<?php echo $row->to_date; ?>'
										data-status='<?php echo $row->status; ?>'
										data-comment='<?php echo base64_encode($row->comment); ?>'
										title="Add this item" 
										class="open-AddBookDialog btn btn-primary btn-xs" 
										href="#scm-update"><?php echo $row->scm_id; ?>
								     </a>
								</td>
								<td> <?php echo $row->date; ?> </td>
								<td> <?php echo $row->name; ?> </td>
								<td> <?php echo $row->activity; ?> </td>
								<td> <?php echo $row->rel;?> </td>
								<td> <?php echo $row->from_date;?> </td>
								<td> <?php echo $row->to_date;?> </td>
								<td> <?php echo $row->status;?> </td>
								<td><xmp> <?php echo $row->comment;?></xmp> </td>
							</tr>
					   <?php endforeach;?>
                    </tbody>
                  </table>
                  

						<!-- Modal -->
						<div id="scm-update" class="modal fade" role="dialog">
						  <div class="modal-dialog modal-lg">
						
						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" onclick="pageload()">&times;</button>
						        <h4 class="modal-title"><strong>SCM Support</strong> - <small>View and Edit</small></h4>
						      </div>
						      <div class="modal-body">
						        <div class="box-body">			
						          <div class="row">			              
						            <div id="notify"><!-- Error/Success/Warning Notifications go here.. --></div>	         			
						              <form id="update_scm" class="form-entry" method="post" action="<?=site_url('api/update_scm_support')?>">
						                <div class="col-md-5">
						<!--  SCM ID Field -->
						         			<div class="form-group">
							                    <label>SCM ID:</label>
							                    <div class="input-group">
							                      <input type="text" id="sid" name="sid" class="form-control" readonly>
							                    </div><!-- /.input group -->
						                  	</div><!-- /.form group -->
						                  	
						<!--  Date Field -->
						         			<div class="form-group">
							                    <label>Date:</label>
							                    <div class="input-group">
							                      <input type="text" id="date" name="date" class="form-control">
							                    </div><!-- /.input group -->
						                  	</div><!-- /.form group -->
						<!--  Name Field -->
						                  <div class="form-group">
						                    <label>Name:</label>
						                     <div class="input-group">
						                       <select id="name" name="name" class="form-control">
														<option>Ganesh</option>
														<option>Sakthivel</option>
														<option>John</option>
							                    </select>
						                    </div><!-- /.input group -->
						                  </div><!-- /.form group --> 
						 <!--  Activity Field -->
						                  <div class="form-group">
						                    <label>Activity:</label>
						                     <div class="input-group">
						                       <select id="activity" name="activity" class="form-control">
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
						                       <select id="release" name="release" class="form-control">
							                      		<option></option>
														<option>R1</option>
														<option>R1.5</option>
														<option>R2</option>
														<option>NA</option>
							                    </select>
						                    </div><!-- /.input group -->
						                  </div><!-- /.form group --> 
						                 </div>
						                 <div class="col-md-5">
						  <!--  Start Date Field -->
						                  <div class="form-group">
						                    <label>From Date:</label>
						                     <div class="input-group">
						                       <input type="text" id="sdate" name="sdate" class="form-control">
						                    </div><!-- /.input group -->
						                  </div><!-- /.form group -->                   
						<!--  End Date Field -->
						                  <div class="form-group">
						                    <label>To Date:</label>
						                     <div class="input-group">
						                       <input type="text" id="edate" name="edate" class="form-control">
						                    </div><!-- /.input group -->
						                  </div><!-- /.form group -->  
						<!--  Status Field -->
						                  <div class="form-group">
						                    <label>Status:</label>
						                     <div class="input-group">
						                       <select id="status" name="status" class="form-control">
							                      		<option></option>
														<option>Completed</option>
														<option>Not Completed</option>
														<option>Aborted</option>
							                    </select>
						                    </div><!-- /.input group -->
						                  </div><!-- /.form group -->
						                                                 
						<!--  Comment Field -->
						                  <div class="form-group">
						                    <label>Comment:</label>
						                     <div class="input-group">
						                       <textarea id="comment" name="comment" class="form-control" rows="7" cols="150"></textarea>
						                    </div><!-- /.input group -->
						                  </div><!-- /.form group --> 
						                   <div class="modal-footer">
						        				<button type="submit" class="btn btn-primary">Save changes</button>
						        				<button type="button" class="btn bg-orange" onclick="pageload()" data-dismiss="modal">Close</a>
						      				</div>
						      			  </div>	
						             	</form>
						               </div> <!--  row -->
						            </div>      
						      </div>
						     
						    </div>
						
						  </div>
						</div> <!-- Modal Ends -->


                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
       <script>
       function pageload() {
    	    location.reload();
    	}
       $(document).ready(function() {
    	   $('#article-table').DataTable({
  	    	 	 "paging": true,
                 "lengthChange": true,
                 "searching": true,
                 "ordering": true,
                 "info": true,
                 "autoWidth": true,
                 "dom": 'Bfrtip',
                 "columnDefs": [{
                     "targets": [ 8 ],
                     "visible": false,
                     "searchable": false
                 }],
                 "buttons": [
                     'excel', 'print'
                 ]
        	    });

    	   $.fn.dataTable.ext.search.push(
   			    function( settings, data, dataIndex ) {
   			        var min = Date.parse( $('#date_min').val(), 10 );
   			        var max = Date.parse( $('#date_max').val(), 10 );
   			        var date = Date.parse( data[1] ) || 0; // use data for the age column
   			 
   			        if ( ( isNaN( min ) && isNaN( max ) ) ||
   			             ( isNaN( min ) && date <= max ) ||
   			             ( min <= date   && isNaN( max ) ) ||
   			             ( min <= date   && date <= max ) )
   			        {
   			            return true;
   			        }
   			        return false;
   			    }
   			);
    	   $('#article-table tfoot th').each( function () {
    	        var title = $(this).text();
    	        $(this).html( '<input type="text" placeholder="...." />' );
    	    } );
    	 
    	    // DataTable
    	    var table = $('#article-table').DataTable();
    	 
    	    // Apply the search
    	    table.columns().every( function () {
    	        var that = this;
    	 
    	        $( 'input', this.footer() ).on( 'keyup change', function () {
    	            if ( that.search() !== this.value ) {
    	                that
    	                    .search( this.value )
    	                    .draw();
    	            }
    	        } );
    	        $('#date_min, #date_max').on( 'blur', function() {
    	            table.draw();
    	        } );
    	    } );

      	    
    	});

       $(document).on("click", ".open-AddBookDialog", function () {
    	     $(".modal-body #sid").val( $(this).data('sid') );
    	     $(".modal-body #date").val( $(this).data('date') );
    	     $(".modal-body #name").val( $(this).data('name') );
    	     $(".modal-body #activity").val( $(this).data('activity') );
    	     $(".modal-body #release").val( $(this).data('release') );
    	     $(".modal-body #sdate").val( $(this).data('sdate') );
    	     $(".modal-body #edate").val( $(this).data('edate') );
    	     $(".modal-body #status").val( $(this).data('status') );
			 $(".modal-body #comment").val( atob($(this).data('comment')) );
    	});

       //Initialize Select2 Elements
       $(".select2").select2({
       		tags: true
       })
       
       $('#date').datetimepicker({
           format: 'YYYY-MM-DD'
       });
       $('#sdate').datetimepicker({
           format: 'YYYY-MM-DD HH:mm'
       });
       $('#edate').datetimepicker({
           format: 'YYYY-M-DD HH:mm'
       });

       $('#date_min').datetimepicker({
           format: 'YYYY-MM-DD'
       });
       $('#date_max').datetimepicker({
           format: 'YYYY-MM-DD'
       });
    </script>