
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-user-plus"></i> <?php //echo $this->lang->line('student_information'); ?>
        </h1>
    </section> 
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('generate_paper', 'can_view')) {
                echo "12";
            } else {
                echo "12";
            }
            ?>">             
              <!--   <div class="box box-primary"> -->
                <div class="">
                    <!-- <div class="box-header ptbnull"> -->
                    <div class="">
                      <!--   <h3 class="box-title titlefix"></h3> -->                   
                    </div>
                    <div class="box-body">
                        <table class="table">
                          
                            <tbody>
                                <tr>
                                    <td style="width: 40%">
                                        <?php  //echo $school_setting->name; die(); ?>
                                        <img src="<?php echo base_url('uploads/school_content/logo/'. $school_setting->image);?>" alt="no image">
                                    </td>
                                    
                                    <td style="width: 60%" class="">
                                        <h3 class="">Hira Model School</h3>
                                        <h4 class=""><?php echo $viewpaper->subject_name; ?>  Model Question Paper</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table> <p class="box box-primary"></p>

                        	<!-- <div class="row">
                                	<div class="col-md-2 text-center 2">
                                		<img src="" alt="No image">
                                	</div>
                                	<div class="col-md-8">
                                		
                                	</div>
                                	<div class="col-md-2 box box-primary"></div>
                                </div> -->
                                <section>
                                      <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Paper Date</th>
                                                    <th>Time Allowed</th>
                                                    <th>Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $viewpaper->paper_date; ?></td>
                                                    <td><?php echo $viewpaper->time_duration; ?> Minutes</td>
                                                    <td>20</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    
                                </section>
                
                                <section>
                                	<table class="table">
                                		<thead>
                                			<tr>
                                				<th>Subject:</td>
                                				<th>Class:</td>
                                				<th>Section:</td>
                                				<th>Paper type:</td>
                                				<th>Exam:</td>
                                			</tr>
                                		</thead>
                                		<tbody>
                                			<tr>
                                				
                                				<td><?php echo $viewpaper->subject_name; ?></td>
                                				<td><?php echo $viewpaper->class_name; ?></td>
                                				<td><?php echo $viewpaper->section_name; ?></td>
                                				<td><?php echo $viewpaper->paper; ?></td>
                                				<td><?php echo $viewpaper->paper; ?></td>
                                			</tr>
                                		</tbody>
                                	</table>
                                	 </section>

                                	<div class="row">
                                		<div class="col-md-1"></div>
	                                		<div class="col-md-10">
	                                			<hr style="border: 1px solid black">
	                                			<div class="col-md-1">
	                                				<strong>
	                                					Note:
	                                				</strong>
	                                			</div>
	                                			<div class="col-md-11">
	                        <p><b> Section-A is compulsory. All parts of this section are to be answered on the separately provided OMR Answer Sheet which should be completed in the first 25 minutes and handed over to the Centre Superintendent. Do not use lead pencil<b></p>
	                                			</div>
	                                			<hr style="border: 1px solid black">
	                                		</div>
	                                	
                                		<!-- End center align wali div -->
                                	</div>
                                	<div class="row">
                                		<div class="col-md-1 text-right">
                                			<strong>
                                				*
                                			</strong>
                                		</div>
                                		<div class="col-md-10 text-left">
                                			<p> <strong>Choose the correct answer ie. A / B/C / D by filling the relevant bubble for each question on the OMR Answer Sheet according to the instructions given there. Each part carries one mark.</strong></p>
                                		</div>
                                	</div>
                                	<?php $count = 0; 
                                	for($i = 0; $i<count($obj_questions); $i++){
                                			$count++;
                                		?>
                                		<section>
                                			
                                			<table class="table">
                                				
                                				<thead>
                                					<tr>
                                						<th  class="" style="width:10%">Q <?php echo $count;?> # </th>
                                                        <th class=""><?php echo $obj_questions[$i]['question']; ?>.</th>
                                					</tr>
                                				</thead>
                                				<tbody class="text-center">
                                					 <tr>
                                						<td><strong>A.</strong></td>
                                                        <td><?php echo $obj_questions[$i]['opt_a']; ?></td>
                                                        <td><strong>B.</strong></td>
                                                        <td><?php echo $obj_questions[$i]['opt_b']; ?></td>
                                					</tr> 
                                                     <tr>
                                                        <td><strong>C.</strong></td>
                                                        <td><?php echo $obj_questions[$i]['opt_c']; ?></td>
                                                        <td><strong>D.</strong></td>
                                                        <td><?php echo $obj_questions[$i]['opt_d']; ?></td>
                                                    </tr> 
                                				</tbody>
                                			</table>
                                			
                                		</section>
                                		
                              
                            <?php } ?>
                                	
                    </div>
                    <?php $subjectiv_counter = 0; ?>
                    <div class="row">
                    	<h3 class="text-center">Subjective Question</h3> <p class="box box-primary"></p>
                    	<?php if(empty($subjective_questions)){

                    		echo '<h5 class="text-danger text-center">No Question Found</h5>';
                    	}
                    	for($k = 0; $k<count($subjective_questions); $k++){
                    		$subjectiv_counter++;
                    	?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10%">Q # <?php echo $subjectiv_counter; ?> </th>
                                    <th style="width: 70%"><?php echo $subjective_questions[$k]['question_value']; ?></th>
                                </tr>
                            </thead>
                           <!--  <tbody>
                                <tr>
                                    <td>data</td>
                                </tr>
                            </tbody> -->
                        </table>
                    <!-- 	<div class="col-md-12">
                                			<div class="col-md-1">
                                				<strong>
                                					<p class="text-center">Q <?php echo $subjectiv_counter;?>.</p>
                                				</strong>
                                			</div>
                                			<div class="col-md-11">
                                				<p><?php echo $subjective_questions[$k]['question_value']; ?></p>
                                			</div>
                                		</div> -->
                                	<?php }?>
                    </div>
                    
                </div>
            </div> 
<div class="box-footer">
    <style type="text/css">
@media print {
    #printbtn {
        display :  none;
    }
}
</style>
                                <button type="submit" id="printbtn" class="btn btn-info pull-right" onclick="window.print()">Print Paper</button>
                             <!--    <button id="printPageButton" onClick="window.print();">Print</button> -->
                            </div>
        </div> 
    </section>
</div>
<script type="text/javascript">

    $(document).ready(function () {
          $('#PrintDiv').css('visibility', 'hidden');
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
   });

      function getsection(){
        	 var class_id = $('#class_id option:selected').val();
        $.ajax({
            type: "POST",
            url: baseurl + 'admin/generatepaper/getsection',
            data: {class_id: class_id},
            dataType: "JSON", // serializes the form's elements.
            beforeSend: function () {
              //  $('.loading-overlay').css("display", "block");
            },
            success: function (data)
            {
             var   html =''
                for(var i=0; i <data.section.length; i++){
                      html+='<option value="'+data.section[i].id+'">'+data.section[i].section+'</option>';  
                }
                $('#section_id').html(html);
                $('#teacher_id').html('<option value="'+data.teacher.id+'">'+data.teacher.name+'</option>'); 
            }
            // error: function (xhr) { 

            //     alert("Error occured.please try again");
            //     $('.loading-overlay').css("display", "none");
            // },
            // complete: function () {
            //     $('.loading-overlay').css("display", "none");
            // }
        });
        	
   	 }

    
</script>