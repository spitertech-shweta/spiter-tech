<div class="row">
                    <div class ="col-md-3"></div>			
					
					
						<div class="row" style="padding-top: 7%; padding-left:30%; padding-right: 20%;"> 
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h3>TRASH  CONTACT ENQUIRY</h3></div>
                                    <div class="card-body">
                                   <a href="<?php echo base_url().'admin/show_contact_enquiry/'?>"> <button type="button" class="btn btn-primary">SHOW USER ENQUIRY</button></a>
                                    <br><br>  
                                        <table id="data_table" class="table">
                                        <thead>
                                                <tr>
                                                    <th style="width:50px">Contact Id</th>
                                                    <th style="width:130px">User Name</th>
                                                    <th style="width:130px">User Email</th>
                                                    <th style="width:130px">User Mobile</th>
                                                   
                                                   
													<th>&nbsp;</th>
													<th>Action</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody><?php foreach($contact_enquiry_trash as $trash_enquiry_details){?>

                                             <tr>
                                                    <td><?php echo $trash_enquiry_details->contact_id; ?></td>
                                                    <td><?php echo $trash_enquiry_details->contact_name; ?></td>
                                                    <td><?php echo $trash_enquiry_details->contact_email; ?></td>
                                                    <td><?php echo $trash_enquiry_details->contact_mobile; ?></td>
                                                  
                                                  
													<td><div class="table-actions">
														<a href="<?php echo base_url().'admin/view_contact_enquiry/'.$trash_enquiry_details->contact_id;?>"><button type="button" class="btn btn-primary">VIEW</button></a>
														</div>
													</td>
													<td><div class="table-actions">
														<a href="<?php echo base_url().'admin/recover_contact_enquiry/'.$trash_enquiry_details->contact_id;?>"><button type="button" class="btn btn-primary">RECOVER</button></a>
													</div></td>
													<td><div class="table-actions">
														<a href="<?php echo base_url().'admin/delete_contact_enquiry/'.$trash_enquiry_details->contact_id;?>"><button type="button" class="btn btn-primary">DELETE</button></a>
													</div></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  
                                                  
                                                   
													
                                         </tr>
											<?php } ?>
			
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
				</div>
