<div class="row">
                    <div class ="col-md-3"></div>			
					<div class="row" style="padding-top: 7%; padding-left: 20%;"> 
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h3>TRASH PAGES</h3></div>
                                    <div class="card-body">
                                   <a href="<?php echo base_url().'admin/show_property/'?>"> <button type="button" class="btn btn-primary">PROPERTY</button></a>
                                        <table id="data_table" class="table">
                                            <thead>
                                                <tr>
                                                    <th style="width:50px">PROPERTY Id</th>
                                                    <th style="width:130px">PROPERTY NAME</th>
                                                    <th style="width:130px">PROPERTY IMAGE</th>
                                                    <th style="width:130px">PROPERTY PRICE</th>
													<th style="width:160px">NO.OF KITCHENS</th>
                                                    <th style="width:160px">NO.OF BED ROOMS</th>
                                                    <th style="width:160px">NO.OF PARKINGS</th>
                                                    <th style="width:160px">NO.OF LIVING ROOMS</th>
													<th style="width:130px">Status</th>
													<th>&nbsp;</th>
													<th>Action;</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php foreach($property_list as $trash_property){?>

                                            <tr>
                                            <td><?php echo $trash_property->property_id; ?></td>
													<td><?php echo $trash_property->property_name; ?></td>
                                                    <td><img src="<?php echo base_url().$trash_property->property_img; ?>" class="table-user-thumb" alt=""></td>
                                                    <td><?php echo $trash_property->property_price; ?></td>
													<td><?php echo $trash_property->property_kitchen; ?></td>
                                                    <td><?php echo $trash_property->property_bedroom; ?></td>
													<td><?php echo $trash_property->property_parking; ?></td>
													<td><?php echo $trash_property->property_living_room; ?></td>

                                                   
												
                                                	<?php
                                                            $status ="";
                                                            if($trash_property->status=="1")
                                                            {
                                                                $status ="ACTIVE";
                                                            }
                                                            else if($trash_property->status=="0")
                                                            {
                                                                $status ="INACTIVE";
                                                            }
                                                        ?>
													
													<td><?php echo $status; ?></td>
													<td><div class="table-actions">
														<a href="<?php echo base_url().'admin/view_property/'.$trash_property->property_id;?>"><button type="button" class="btn btn-primary">VIEW</button></a>
														</div>
													</td>
													<td><div class="table-actions">
														<a href="<?php echo base_url().'admin/recover_property/'.$trash_property->property_id;?>"><button type="button" class="btn btn-primary">RECOVER</button></a>
													</div></td>
													<td><div class="table-actions">
														<a href="<?php echo base_url().'admin/delete_property/'.$trash_property->property_id;?>"><button type="button" class="btn btn-primary">DELETE</button></a>
													</div></td>
													
                                         </tr>
											<?php } ?>
			
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
				</div>
