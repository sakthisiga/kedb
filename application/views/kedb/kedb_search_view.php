<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View/Edit Articles
            <small>with View and Search Options</small>
          </h1>
			<h4><span class="label label-default"><a href="<?=base_url()?>home/add_article">Add Article</a></span></h4>
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
                    <thead class="thead-inverse">
                      <tr>
                        <th>Article ID</th>
                        <th>Date</th>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>State</th>
                        <th>Tool</th>
                        <th>Issue</th>
                        <th>Problem</th>
                        <th>Solution</th>
                      </tr>
                    </thead>
                    <tfoot>
			          <tr>
			            <th>Article ID</th>
			            <th>Date</th>
			            <th>Employee ID</th>
			            <th>Employee Name</th>
			            <th>State</th>
			            <th>Tool</th>
			            <th>Issue</th>
			            <th>Problem</th>
			            <th>Solution</th>
			          </tr>
			        </tfoot>
                    <tbody>
                    
                      <?php foreach($articles as $row) : ?>
							<tr>
								<td> <a data-toggle="modal" 
										data-aid="<?php echo $row->article_id; ?>" 
										data-issue="<?php echo $row->issue; ?>"
										data-problem='<?php echo base64_encode($row->problem); ?>'
										data-description='<?php echo base64_encode($row->description); ?>' 
										title="Add this item" 
										class="open-AddBookDialog btn btn-primary btn-xs" 
										href="#art-update"><?php echo "K-".$row->article_id; ?>
								     </a> 
								</td>
								<td> <?php echo $row->date; ?> </td>
								<td> <?php echo $row->user_id; ?> </td>
								<td> <?php echo $row->emp_name; ?> </td>
								<td> <?php echo $row->state; ?> </td>
								<td> <?php echo $row->tool;?> </td>
								<td> <?php echo $row->issue;?> </td>
								<td> <?php echo $row->problem;?> </td>
								<td><xmp> <?php echo $row->description;?></xmp> </td>
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
						        <h4 class="modal-title"><strong>Article</strong> - <small>View and Update</small></h4>
						      </div>
						      <div class="modal-body">
						      
						      
						        
						        	<div class="box-body">			
						              <div class="row">
						              
						             <div id="notify"><!-- Error/Success/Warning Notifications go here.. --></div>
						         			
						         			
						              <form id="update_article" class="form-entry" method="post" action="<?=site_url('api/update_article')?>">
						
						<!--  Article ID Field -->
						         			<div class="form-group">
							                    <label>Article ID:</label>
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
						                    <label>Solution:</label>
						                     <div class="input-group">
						                       <textarea id="description" name="description" class="form-control" rows="7" cols="150" placeholder="A detailed description on the resolution to the issue"></textarea>
						                    </div><!-- /.input group -->
						                  </div><!-- /.form group --> 
						                   <div class="modal-footer">
						                        <button type="submit" class="btn btn-primary">Save changes</button>
						        				<button type="button" class="btn bg-orange" onclick="pageload()" data-dismiss="modal">Close</a>
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
				 "dom": 'Blfrtip',
                 "columnDefs": [{
		                     "targets": [ 7 ],
		                     "visible": false,
		                     "searchable": false
		                 },
		                 {
		                     "targets": [ 8 ],
		                     "visible": false,
		                     "searchable": false
		                 }
		                 ],
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

   	//Date Picker
	$('#date_min').datetimepicker({
              format: 'YYYY-MM-DD'
          });
          $('#date_max').datetimepicker({
              format: 'YYYY-MM-DD'
          });
    </script>