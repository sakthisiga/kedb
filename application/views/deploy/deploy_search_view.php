<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View/Edit Deployment
            <small>Full Dpeloyment details</small>
          </h1><h4><span class="label label-default"><a href="<?=base_url()?>deploy/add_deploy">Add Details</a></span></h4>
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
                   <table id="deploy-table" class="table table-bordered table-condensed">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>ENV</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Time</th>
                        <th>Day</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>OH/WH</th>
                        <th>Status</th>
                        <th>Reason</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
			          <tr>
			            <th>ID</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>ENV</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Time</th>
                        <th>Day</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>OH/WH</th>
                        <th>Status</th>
                        <th>Reason</th>
                        <th></th>
			          </tr>
			        </tfoot>
                    <tbody>
                    
                      <?php foreach($deploys as $row) : ?>
							<tr>
								<td>
								<a data-toggle="modal" 
										data-did="<?php echo $row->deploy_id; ?>" 
										data-date="<?php echo $row->date; ?>"
										data-name='<?php echo $row->name; ?>'
										data-environment='<?php echo $row->environment; ?>'
										data-sdate='<?php echo $row->from_date; ?>'
										data-edate='<?php echo $row->to_date; ?>'
										data-status='<?php echo $row->status; ?>'
										data-reason='<?php echo $row->reason; ?>'
										title="View and Edit" 
										class="open-AddBookDialog btn btn-primary btn-xs" 
										href="#deploy-update"><?php echo "D-".$row->deploy_id; ?>
								     </a> 
								<td> <?php echo $row->date; ?> </td>
								<td> <?php echo $row->name; ?> </td>
								<td> <?php echo $row->environment;?> </td>
								<td> <?php echo $row->from_date;?> </td>
								<td> <?php echo $row->to_date;?> </td>
								<td> <?php						
											$start = new DateTime($row->from_date);
											$end = new DateTime($row->to_date);
											$interval = $start->diff($end);
											$hrs = $interval->d * 24 + $interval->h;
											echo $hrs.":".$interval->format('%i');
								     ?> </td>
								<td><?php echo date("l",strtotime($row->date));?></td>
								<td><?php echo date("F",strtotime($row->date));?></td>
								<td><?php echo date("o",strtotime($row->date));?></td>
								<td><?php
								$hr = date("G",strtotime($row->from_date));
								if($hr < 18) {
									echo "WH"; } else{
        							echo "OH";}
								     ?></td>
								<td><?php echo $row->status;?></td>
								<td><?php echo $row->reason;?></td>
								<td>						
								     <a class="btn btn-danger btn-xs" href="<?=site_url('api/delete_deploy/'.$row->deploy_id)?>">
								     <span class="glyphicon glyphicon-trash"></span>
								    </a>
								</td>
							</tr>
					   <?php endforeach;?>
                    </tbody>
                  </table>
                  

						<!-- Modal -->
						<div id="deploy-update" class="modal fade" role="dialog">
						  <div class="modal-dialog modal-lg">
						
						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" onclick="pageload()">&times;</button>
						        <h4 class="modal-title"><strong>Deployment</strong> - <small>View and Update</small></h4>
						      </div>
						      <div class="modal-body">
						        <div class="box-body">			
						          <div class="row">
						            <div id="notify"><!-- Error/Success/Warning Notifications go here.. --></div>
						              <form id="update_deploy" class="form-entry" method="post" action="<?=site_url('api/update_deploy')?>">
						                <div class="col-md-5">
						<!--  deploy ID Field -->
						         			<div class="form-group">
							                    <label>Deploy ID:</label>
							                    <div class="input-group">
							                      <input type="text" id="did" name="did" class="form-control" readonly>
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
						                  	                  	
						
						<!--  Environment Field -->
						                  <div class="form-group">
						                    <label>Environment:</label>
						                     <div class="input-group">
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
														<option>Failed</option>
														<option>Success</option>
							                    </select>
						                    </div><!-- /.input group -->
						                  </div><!-- /.form group -->                 
						<!--  Reason Field -->
						                  <div class="form-group">
						                    <label>Reason:</label>
						                     <div class="input-group">
						                       <select id="reason" name="reason" class="form-control">
							                      		<option></option>
														<option>NA</option>
														<option>WSRP</option>
														<option>WAS</option>
														<option>PTL</option>
														<option>WPS</option>
														<option>HTML5</option>
							                    </select>
						                    </div><!-- /.input group -->
						                  </div><!-- /.form group --> 
						                   <div class="modal-footer">
						                   		<button type="submit" class="btn btn-primary">Save changes</button>
						        				<button type="button" class="btn bg-orange" onclick="pageload()" data-dismiss="modal">Close</button>
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
    	   $('#deploy-table').DataTable({
  	    	 	 "paging": true,
                 "lengthChange": true,
                 "searching": true,
                 "order": ([ 1, "desc" ],[0, "desc"]),
                 "info": true,
                 "autoWidth": true,
				 "dom": 'Blfrtip',
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
  			
    	   $('#deploy-table tfoot th').each( function () {
    	        var title = $(this).text();
    	        $(this).html( '<input type="text" placeholder="...." />' );
    	    } );
    	 
    	    // DataTable
    	    var table = $('#deploy-table').DataTable();
    	 
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
    	    
    	     $(".modal-body #did").val( $(this).data('did') );
    	     $(".modal-body #date").val( $(this).data('date') );
    	     $(".modal-body #name").val( $(this).data('name') );
    	     $(".modal-body #environment").val( $(this).data('environment') );
    	     $(".modal-body #sdate").val( $(this).data('sdate') );
    	     $(".modal-body #edate").val( $(this).data('edate') );
    	     $(".modal-body #status").val( $(this).data('status') );
			 $(".modal-body #reason").val( $(this).data('reason') );
    	});

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