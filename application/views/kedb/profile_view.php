<div class="content-wrapper">
        <!-- Content Header (Page header) -->
   <section class="content-header">
          <h1>
            Profile
            <small> - Change Profile and Upload Photo</small>
          </h1>
   </section>

        <!-- Main content -->
   <section class="content">
   				<div id="notify"><!-- Error/Success/Warning Notifications go here.. --></div>
         	  
          <div class="row">
          <?php 
				$filename = base_url().'public/img/profile/'.$this->session->userdata('user_id').'.jpg';
				if (@getimagesize($filename)) {
					$dp_image = $filename;
				} else {
					$dp_image = base_url().'public/img/profile/anonymous.jpg';
				}
		  ?>
          <div class="col-md-4">
			<?php foreach($profile as $row) : ?>
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?= $dp_image; ?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $row->emp_name; ?></h3>
                  <p class="text-muted text-center"><?php echo $row->emp_id; ?></p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right"><?php echo $row->email; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>State</b> <a class="pull-right"><?php echo $row->state; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Articles Contribution</b> <a class="pull-right"><span class="badge badge-success"><?php echo $a_count; ?></span></a>
                    </li>
                    <li class="list-group-item">
                      <b>Builds Completed</b> <a class="pull-right"><span class="badge badge-error"><?php echo $build_count; ?></span></a>
                    </li>
                    <li class="list-group-item">
                      <b>SCM Activities Completed</b> <a class="pull-right"><span class="badge badge-inverse"><?php echo $scm_count; ?></span></a>
                    </li>
                  </ul>

                  <a data-toggle="modal" title="Add this item" 
										class="open-AddBookDialog btn btn-primary btn-block" 
										href="#myModal"><b>Upload Photo</b>
                  
                  </a>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
             <?php endforeach;?>
            
				  <div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog modal-sm">
				
				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" onclick="pageload()">&times;</button>
				        <h4 class="modal-title"><strong>Upload the Profile Picture</strong></h4>
				      </div>
				      <div class="modal-body">
				      			<?php 
				      			//$attr = array('id' => 'upload_photo');
				      			//echo form_open_multipart('api/do_upload');
				      			?>
				      			<form method="post" action="<?=site_url('api/do_upload')?>" enctype="multipart/form-data" id="upload_photo" />
									<input type="file" name="userfile" size="20" class="btn btn-primary" /><br />
									<input type="submit" value="upload" class="btn btn-warning btn-xs" />
								</form>
				       </div>
				    </div>
				  </div>
				 </div> 
		</div><!-- /.col -->    
		
		<div class="col-md-8">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#preset" data-toggle="tab">Reset Password</a></li>
                  <li><a href="#settings" data-toggle="tab">Settings</a></li>
                  <li><a href="#keynote" data-toggle="tab">KeyNote</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="preset">
                  		 	
                  		<form id="reset_password" class="form-horizontal" method="post" action="<?=site_url('api/reset_password')?>">
                      <div class="form-group">
                        <label for="inputName" class="col-lg-3 control-label">Current Password</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" id="cpass" name="cpass">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-lg-3 control-label">New Password</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" id="npass" name="npass">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-lg-3 control-label">Retype New Password</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" id="rnpass" name="rnpass">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                          <button type="submit" class="btn btn-success">Reset</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- Tab_Pane -->
                  <div class="tab-pane" id="settings">
                  		<form id="reset_profile" class="form-horizontal" method="post" action="<?=site_url('api/reset_profile')?>">
                  		<?php foreach($user_details as $row) : ?>
                      <div class="form-group">
                        <label for="inputName" class="col-lg-3 control-label">Employee Name</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="name" name="name" value="<?=$row->emp_name; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-lg-3 control-label">Email</label>
                        <div class="col-sm-6">
                          <input type="email" class="form-control" id="email" name="email" value="<?=$row->email; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-lg-3 control-label">State</label>
                        <div class="col-sm-6">
                           <select name="state" class="form-control" placeholder="State">
								<option disabled selected> Select a State</option>
									<?php foreach($states as $state) : 
									if($row->state == $state->state_name)
									{
										echo "<option selected>$state->state_name</option>";
									}else 
									{
										echo "<option>$state->state_name</option>";
									}
										
									endforeach;
									?>
							</select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                          <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                      </div>
                       <?php endforeach;?>
                    </form>
                  </div><!-- Tab_Pane -->
                  <div class="tab-pane" id="keynote">
                  		<div class="box box-primary collapsed-box box-solid">
                			<div class="box-header with-border">
                  				<h3 class="box-title">Add Note</h3>
                  				<div class="box-tools pull-right">
                    				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  				</div><!-- /.box-tools -->
                			</div><!-- /.box-header -->
                			<div class="box-body">
                			
                  							<form id="create_keynote" class="form-horizontal" method="post" action="<?=site_url('api/create_keynote')?>">
						                      <div class="form-group">
						                        <label for="inputName" class="col-lg-3 control-label">Key Name</label>
						                        <div class="col-sm-6">
						                          <input type="text" class="form-control" id="kname" name="kname">
						                        </div>
						                      </div>
						                      <div class="form-group">
						                        <label for="inputEmail" class="col-lg-3 control-label">Username</label>
						                        <div class="col-sm-6">
						                          <input type="text" class="form-control" id="kusername" name="kusername">
						                        </div>
						                      </div>
						                      <div class="form-group">
						                        <label for="inputName" class="col-lg-3 control-label">Password</label>
						                        <div class="col-sm-6">
						                          <input type="text" class="form-control" id="kpassword" name="kpassword">
						                        </div>
						                      </div>
						                      <div class="form-group">
						                        <label for="inputName" class="col-lg-3 control-label">Description</label>
						                        <div class="col-sm-6">
						                          <input type="text" class="form-control" id="kdescription" name="kdescription">
						                        </div>
						                      </div>
						                      <div class="form-group">
						                        <div class="col-sm-offset-3 col-sm-10">
						                          <button type="submit" class="btn btn-primary">New</button>
						                        </div>
						                      </div>
						                    </form>
                    
                    
                			</div><!-- /.box-body -->
              			</div><!-- /.box -->
              			<div id="list_keynote" class="panel-body">
									<table class="table">
										<th>
											<!-- <td>name</td>
											<td>age</td> -->
											</th>
									</table>
							</div>
              			
                  </div> <!-- Tab_Pane -->
                 </div><!-- Tab-Content -->
               </div><!-- Nav-Tabs -->
          </div><!-- Col-md-9 -->   
                     
	  </div><!-- /.row -->
   </section>
</div>
          