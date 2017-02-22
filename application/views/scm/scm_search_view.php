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
								<td> <?php echo $row->scm_id; ?>
								<!-- <a data-toggle="modal" 
										data-sid="<?php echo $row->scm_id; ?>" 
										data-activity="<?php echo $row->activity; ?>"
										data-fromdate='<?php echo base64_encode($row->from_date); ?>'
										data-comment='<?php echo base64_encode($row->comment); ?>' 
										title="Add this item" 
										class="open-AddBookDialog btn btn-primary btn-xs" 
										href="#art-update"><?php echo $row->scm_id; ?>
								     </a>  -->
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
						<div id="art-update" class="modal fade" role="dialog">
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
						         			
						         			
						              <form id="update_article" class="form-entry" method="post" action="<?=site_url('api/update_scm_support')?>">
						
						<!--  Article ID Field -->
						         			<div class="form-group">
							                    <label>SCM ID:</label>
							                    <div class="input-group">
							                      <div class="input-group-addon">
							                        <i class="fa fa-arrow-circle-right"></i>
							                      </div>
							                      <input type="text" id="aid" name="aid" class="form-control" name="aid" placeholder="Brief description of the issue/problem" readonly>
							                    </div><!-- /.input group -->
						                  	</div><!-- /.form group -->
						                  	
						<!--  Issue Field -->
						         			<div class="form-group">
							                    <label>Issue:</label>
							                    <div class="input-group">
							                      <div class="input-group-addon">
							                        <i class="fa fa-info-circle"></i>
							                      </div>
							                      <input type="text" id="issue" name="issue" class="form-control" name="issue" placeholder="Brief description of the issue/problem">
							                    </div><!-- /.input group -->
						                  	</div><!-- /.form group -->
						<!--  Problem Field -->
						                  <div class="form-group">
						                    <label>Problem:</label>
						                     <div class="input-group">
						                       <textarea id="problem" name="problem" class="form-control" rows="2" cols="150" placeholder="A detailed description of the problem"></textarea>
						                    </div><!-- /.input group -->
						                  </div><!-- /.form group --> 
						                  
						<!--  Description Field -->
						                  <div class="form-group">
						                    <label>Description:</label>
						                     <div class="input-group">
						                       <textarea id="description" name="description" class="form-control" rows="7" cols="150" placeholder="A detailed description on the resolution to the issue"></textarea>
						                    </div><!-- /.input group -->
						                  </div><!-- /.form group --> 
						                   <div class="modal-footer">
						        				<button type="button" class="btn bg-orange" onclick="pageload()" data-dismiss="modal">Close</a>
						        				<button type="submit" class="btn btn-primary">Save changes</button>
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
                 "columnDefs": [{
		                     "targets": [ 8 ],
		                     "visible": false,
		                     "searchable": false
		                 }
		                 ],
                 "dom": 'Bfrtip',
                 "buttons": [
                           'excel', 'print'
                       ]
        	    });

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
    	    } );

      	    
    	});

       $(document).on("click", ".open-AddBookDialog", function () {
    	     var Aid = $(this).data('aid');
    	     $(".modal-body #aid").val( Aid );

    	     var Issue = $(this).data('issue');
    	     $(".modal-body #issue").val( Issue );

    	     var Problem = $(this).data('problem');
    	     Problem = atob(Problem);
    	     $(".modal-body #problem").val( Problem );
    	     
    	     var Desc = $(this).data('description');
    	     Desc = atob(Desc);
    	     $(".modal-body #description").val( Desc );
    	});
    </script>