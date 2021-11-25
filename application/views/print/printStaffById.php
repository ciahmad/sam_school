<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<style type="text/css">
    .page-break	{ display: block; page-break-before: always; }
    @media print {
        .page-break	{ display: block; page-break-before: always; }
        .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
            float: left;
        }
        .col-sm-12 {
            width: 100%;
        }
        .col-sm-11 {
            width: 91.66666667%;
        }
        .col-sm-10 {
            width: 83.33333333%;
        }
        .col-sm-9 {
            width: 75%;
        }
        .col-sm-8 {
            width: 66.66666667%;
        }
        .col-sm-7 {
            width: 58.33333333%;
        }
        .col-sm-6 {
            width: 50%;
        }
        .col-sm-5 {
            width: 41.66666667%;
        }
        .col-sm-4 {
            width: 33.33333333%;
        }
        .col-sm-3 {
            width: 25%;
        }
        .col-sm-2 {
            width: 16.66666667%;
        }
        .col-sm-1 {
            width: 8.33333333%;
        }
        .col-sm-pull-12 {
            right: 100%;
        }
        .col-sm-pull-11 {
            right: 91.66666667%;
        }
        .col-sm-pull-10 {
            right: 83.33333333%;
        }
        .col-sm-pull-9 {
            right: 75%;
        }
        .col-sm-pull-8 {
            right: 66.66666667%;
        }
        .col-sm-pull-7 {
            right: 58.33333333%;
        }
        .col-sm-pull-6 {
            right: 50%;
        }
        .col-sm-pull-5 {
            right: 41.66666667%;
        }
        .col-sm-pull-4 {
            right: 33.33333333%;
        }
        .col-sm-pull-3 {
            right: 25%;
        }
        .col-sm-pull-2 {
            right: 16.66666667%;
        }
        .col-sm-pull-1 {
            right: 8.33333333%;
        }
        .col-sm-pull-0 {
            right: auto;
        }
        .col-sm-push-12 {
            left: 100%;
        }
        .col-sm-push-11 {
            left: 91.66666667%;
        }
        .col-sm-push-10 {
            left: 83.33333333%;
        }
        .col-sm-push-9 {
            left: 75%;
        }
        .col-sm-push-8 {
            left: 66.66666667%;
        }
        .col-sm-push-7 {
            left: 58.33333333%;
        }
        .col-sm-push-6 {
            left: 50%;
        }
        .col-sm-push-5 {
            left: 41.66666667%;
        }
        .col-sm-push-4 {
            left: 33.33333333%;
        }
        .col-sm-push-3 {
            left: 25%;
        }
        .col-sm-push-2 {
            left: 16.66666667%;
        }
        .col-sm-push-1 {
            left: 8.33333333%;
        }
        .col-sm-push-0 {
            left: auto;
        }
        .col-sm-offset-12 {
            margin-left: 100%;
        }
        .col-sm-offset-11 {
            margin-left: 91.66666667%;
        }
        .col-sm-offset-10 {
            margin-left: 83.33333333%;
        }
        .col-sm-offset-9 {
            margin-left: 75%;
        }
        .col-sm-offset-8 {
            margin-left: 66.66666667%;
        }
        .col-sm-offset-7 {
            margin-left: 58.33333333%;
        }
        .col-sm-offset-6 {
            margin-left: 50%;
        }
        .col-sm-offset-5 {
            margin-left: 41.66666667%;
        }
        .col-sm-offset-4 {
            margin-left: 33.33333333%;
        }
        .col-sm-offset-3 {
            margin-left: 25%;
        }
        .col-sm-offset-2 {
            margin-left: 16.66666667%;
        }
        .col-sm-offset-1 {
            margin-left: 8.33333333%;
        }
        .col-sm-offset-0 {
            margin-left: 0%;
        }
        .visible-xs {
            display: none !important;
        }
        .hidden-xs {
            display: block !important;
        }
        table.hidden-xs {
            display: table;
        }
        tr.hidden-xs {
            display: table-row !important;
        }
        th.hidden-xs,
        td.hidden-xs {
            display: table-cell !important;
        }
        .hidden-xs.hidden-print {
            display: none !important;
        }
        .hidden-sm {
            display: none !important;
        }
        .visible-sm {
            display: block !important;
        }
        table.visible-sm {
            display: table;
        }
        tr.visible-sm {
            display: table-row !important;
        }
        th.visible-sm,
        td.visible-sm {
            display: table-cell !important;
        }
    }
</style>

<html lang="en">
    <head>
        <title><?php echo $this->lang->line('fees_receipt'); ?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/bootstrap/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/AdminLTE.min.css">
    </head>
    <body>       
        <div class="container">
            <div class="row">
                <div id="content" class="col-lg-12 col-sm-12 ">
                    <div class="invoice">
                        <div class="row header ">
                            <div class="col-sm-12">

                            	 <table class="table table-responsive">
                            <tr>
                                <td  colspan="4">
                                    <h2> <?php echo $sch_sett[0]['name']; ?></h2>
                                     <p>Address : <?php echo  $sch_sett[0]['address']; ?> </p>
                                     <p>Phone : <?php echo  $sch_sett[0]['phone']; ?> E-mail : <?php echo  $sch_sett[0]['phone']; ?> </p>
                                </td>
                                <td class="align-right" style="float: right;">
                                    <img src="<?php echo base_url('uploads/school_content/logo/'. $sch_sett[0]['image']);?>" alt="no image">
                                </td>
                            </tr>
                        </table> <hr style=" margin-top: 0px; margin-bottom: 0px; border: 1px solid black !important">
                         <table class="table">
                            <tr>
                                
                                <td class="text-left" style="width: 30%">
                                    <img width="100" style="border-radius: 30%; height: 70px" src="<?php echo base_url('uploads/staff_images/'. $staff['image']);?>" alt="no image">
                                </td>
                                <td class="text-center" style="width: 40%">
                                    <h4><?php  echo $staff['name']." ". $staff['surname']?></h4>
                                    <p> <b> ( <?php echo $staff['designation'] ?> )</b></p>
                                    <h5>Staff Information</h5>
                                </td>
                                <td class="text-right" style="width: 30%">
                                    <h4>Bar Code </h4>
                                </td>
                            </tr> 
                        </table>

                         <section>
                            <table class="table">
                                 <tr>
                                <td style="width: 100%">
                                    <h3  class="pagetitleh2">Official</h3>
                                </td>
                            </tr>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Staff ID</th>
                                        <th>Role</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>EPF No</th>
                                        <th>Basic Salary</th>
                                        <th>Contract Type</th>
                                        <th>Work Shift</th>
                                        <th>Location</th>
                                        <th>Date Of Joining</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $staff['designation']?></td>
                                        <td><?php echo $staff['designation']?></td>
                                        <td><?php echo $staff['epf_no']?></td>
                                        <td><?php echo $staff['basic_salary']?></td>
                                        <td><?php echo $staff['contract_type']?></td>
                                        <td></td>
                                        <td><?php echo $staff['location']?></td>
                                        <td><?php echo $staff['date_of_joining']?></td>
                                    </tr>
                                </tbody>
                            </table>

                              <table class="table">
                                 <tr>
                                <td style="width: 100%">
                                    <h3  class="pagetitleh2">Personal Information</h3>
                                </td>
                            </tr>
                            </table>
                            <table class="table">
                                
                                <thead>
                                    <tr>
                                        <th>Phone</th>
                                        <th>Emergency Contact Number</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Date of Birth</th>
                                        <th>Marital Status</th>
                                    </tr>                                   
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $staff['contact_no']?></td>
                                        <td><?php echo $staff['emergency_contact_no']?></td>
                                        <td><?php echo $staff['email']?></td>
                                        <td><?php echo $staff['gender']?></td>
                                        <td><?php echo $staff['dob']?></td>
                                        <td><?php echo $staff['marital_status']?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Father Name</th>
                                        <th>Mother Name</th>
                                        <th>Qualification</th>
                                        <th>Work Experience</th>
                                        <th>Note</th>
                                        <th>Setup</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $staff['father_name']?></td>
                                        <td><?php echo $staff['mother_name']?></td>
                                        <td><?php echo $staff['qualification']?></td>
                                        <td><?php echo $staff['work_exp']?></td>
                                        <td><?php echo $staff['note']?></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                             <table class="table">
                                   <?php 
                                 // echo "<pre>";
                                 // print_r($staff);
                                 // echo "<pre>";
                                 // die();
                                ?>
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Address</h3>
                                    </td>
                                </tr>
                            </table><div class="page-break"></div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Current Address</th>
                                        <th>Permanent Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $staff['local_address']?></td>
                                        <td><?php echo $staff['permanent_address']?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table">
                                  
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Bank Account Details</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Bank Name</th>
                                        <th>Bank Branch Name</th>
                                        <th>Bank Account Number</th>
                                        <th>IFSC Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $staff['name']." ".$staff['surname']; ?></td>
                                        <td><?php echo $staff['bank_name']; ?></td>
                                        <td><?php echo $staff['bank_branch']; ?></td>
                                        <td><?php echo $staff['bank_account_no']; ?></td>
                                        <td><?php echo $staff['ifsc_code']; ?></td>
                                    </tr>
                                </tbody>
                            </table>

                             <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Social Media Link</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Facebook URL</th>
                                        <th>Twitter URL</th>
                                        <th>Linkedin URL</th>
                                        <th>Instagram URL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $staff['facebook']; ?></td>
                                        <td><?php echo $staff['twitter']; ?></td>
                                        <td><?php echo $staff['linkedin']; ?></td>
                                        <td><?php echo $staff['instagram']; ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Payroll</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Total Net Salary Paid</th>
                                        <th>Total Gross Salary</th>
                                        <th>Total Earning</th>
                                        <th>Total Deduction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Rs <?php echo $staff['net_salary']; ?></td>
                                        <td>Rs <?php echo $staff['']; ?></td>
                                        <td>Rs <?php echo $staff['earnings']; ?></td>
                                        <td>Rs <?php echo $staff['deduction']; ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Leaves</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sick Leave</th>
                                        <th>Leave</th>
                                        <th>Holidays Leave</th>
                                        <th>Absent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>data</td>
                                        <td>data</td>
                                        <td>data</td>
                                        <td>data</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Attendance</h3>
                                    </td>
                                </tr>
                            </table>


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Total Present</th>
                                        <th>Total Late</th>
                                        <th>Total Absent</th>
                                        <th>Total Half Day</th>
                                        <th>Total Holiday</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                       
                                        <td><?php echo count($attendencetypeslist[0]['key_value']);?></td>
                                        <td><?php echo count($attendencetypeslist[1]['key_value']);?></td>
                                        <td><?php echo count($attendencetypeslist[2]['key_value']);?></td>
                                        <td><?php echo count($attendencetypeslist[3]['key_value']);?></td>
                                        <td><?php echo count($attendencetypeslist[4]['key_value']);?></td>
                                    </tr>
                                </tbody>
                            </table>


                             <table class="table">
                                 <tr>
                                    <td style="width: 100%">
                                        <h3  class="pagetitleh2">Documents</h3>
                                    </td>
                                </tr>
                            </table>

                            <table class="table">
                                <thead>
                                <?php 
                                     // echo "<pre>";
                                     // print_r($staff);
                                     // echo "<pre>";
                                     // die();
                                ?>
                                    <tr>
                                        <th>Resume</th>
                                        <th>Joining Letter</th>
                                        <th>Resignation Letter</th>
                                        <th>Other Documents</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php if(!empty($staff['resume'])){ echo "Uploded"; }else{ echo "please Upload Resume"; }?></td>
                                        <td><?php if(!empty($staff['joining_letter'])){ echo "Uploded"; }else{ echo "please Upload Joining Letter"; }?></td>
                                        <td><?php if(!empty($staff['resignation_letter'])){ echo "Uploded"; }else{ echo "please Upload Resignation Letter"; }?></td>
                                        <td><?php if(!empty($staff['other_document_file'])){ echo "Uploded"; }else{ echo "please Upload Other Documents"; }?></td>
                                        
                                    </tr>
                                </tbody>
                            </table>

                        </section>

                                <?php
                                ?>
                               <!--  <img  src="<?php echo base_url(); ?>/uploads/print_headerfooter/student_receipt/<?php $this->setting_model->get_receiptheader(); ?>" style="height: 100px; width: 100%;"> -->
								

                                <?php
                                ?>
                            </div>

                        </div> 
                        <?php
                        if ($settinglist[0]['is_duplicate_fees_invoice']) {
                            ?>
                            <div class="row">
                                <div class="col-md-12 text text-center">
                                    <?php echo $this->lang->line('office_copy'); ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="row">                           
                            <div class="col-xs-6 text-left">
                                <br/>
                                <address>
                                    <strong><?php echo $feeList->firstname . " " . $feeList->lastname; ?></strong><br>

                                    <?php echo $this->lang->line('father_name'); ?>: <?php echo $student['father_name']; ?><br>
                                    <?php echo $this->lang->line('class'); ?>: <?php echo $feeList->class . " (" . $feeList->section . ")"; ?>
                                </address>
                            </div>
                            <div class="col-xs-6 text-right">
                                <br/>
                                <address>
                                    <strong>Date: <?php
                                        $date = date('d-m-Y');

                                        echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($date));
                                        ?></strong><br/>
                                    <strong> <?php echo $this->lang->line('payment_id'); ?>:  <?php echo $feeList->id . "/" . $sub_invoice_id; ?></strong>
                                </address>                               
                            </div>
                        </div>
                        <hr style="margin-top: 0px;margin-bottom: 0px;" />
                        <div class="row">
                            <?php
                            if (!empty($feeList)) {
                                ?>

                                <table class="table table-striped table-responsive" style="font-size: 8pt;">
                                    <thead>
                                        <tr>

                                            <th><?php echo $this->lang->line('date'); ?></th>

                                            <th><?php echo $this->lang->line('fees_group'); ?></th>
                                            <th><?php echo $this->lang->line('fees_code'); ?></th>
                                            <th><?php echo $this->lang->line('mode'); ?></th>
                                            <th class="text text-right"><?php echo $this->lang->line('amount'); ?></th>
                                            <th class="text text-right"><?php echo $this->lang->line('discount'); ?></th>
                                            <th class="text text-right"><?php echo $this->lang->line('fine'); ?></th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $amount = 0;
                                        $discount = 0;
                                        $fine = 0;
                                        $total = 0;
                                        $grd_total = 0;
                                        if (empty($feeList)) {
                                            ?>
                                            <tr>
                                                <td colspan="11" class="text-danger text-center">
                                                    <?php echo $this->lang->line('no_transaction_found'); ?>
                                                </td>
                                            </tr>
                                            <?php
                                        } else {
                                            $count = 1;

                                            $a = json_decode($feeList->amount_detail);
                                            $record = $a->{$sub_invoice_id};
                                            ?>
                                            <tr>

                                                <td>
                                                    <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($record->date)); ?>

                                                </td> 


                                                <td>
                                                    <?php echo $feeList->name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $feeList->code; ?>
                                                </td>
                                                <td>
                                                    <?php echo $record->payment_mode; ?>
                                                </td>
                                                <td class="text text-right">
                                                    <?php
                                                    $amount = number_format($record->amount, 2, '.', '');
                                                    echo $currency_symbol . $amount;
                                                    ?>
                                                </td>
                                                <td class="text text-right">
                                                    <?php
                                                    $amount_discount = number_format($record->amount_discount, 2, '.', '');
                                                    echo $currency_symbol . $amount_discount;
                                                    ?>
                                                </td>
                                                <td class="text text-right">
                                                    <?php
                                                    $amount_fine = number_format($record->amount_fine, 2, '.', '');
                                                    echo $currency_symbol . $amount_fine;
                                                    ?>
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            ?>

                        </div>
                        <div class="row header ">
                            <div class="col-sm-12">
                                <?php $this->setting_model->get_receiptfooter(); ?>

                            </div>

                        </div> 
                    </div>

                    <?php
                    if ($settinglist[0]['is_duplicate_fees_invoice']) {
                        ?>
                        <div class="page-break"></div>
                        <div class="invoice">
                            <div class="row header ">
                                <div class="col-sm-12">
                                    <?php
                                    ?>

                                    <img  src="<?php echo base_url(); ?>/uploads/print_headerfooter/student_receipt/<?php $this->setting_model->get_receiptheader(); ?>" style="height: 100px;width: 100%;">
                                    <?php ?>
                                </div>

                            </div> 
                            <?php
                            if ($settinglist[0]['is_duplicate_fees_invoice']) {
                                ?>
                                <div class="row">
                                    <div class="col-md-12 text text-center">
                                        <?php echo $this->lang->line('student_copy'); ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="row">                           
                                <div class="col-xs-6">
                                    <br/>
                                    <address>
                                        <strong><?php echo $feeList->firstname . " " . $feeList->lastname; ?></strong><br>

                                        <?php echo $this->lang->line('father_name'); ?>: <?php echo $student['father_name']; ?><br>
                                        <?php echo $this->lang->line('class'); ?>: <?php echo $feeList->class . " (" . $feeList->section . ")"; ?>
                                    </address>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <br/>
                                    <address>
                                        <strong>Date: <?php
                                            $date = date('d-m-Y');

                                            echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($date));
                                            ?></strong><br/>
                                        <strong> <?php echo $this->lang->line('payment_id'); ?>:  <?php echo $feeList->id . "/" . $sub_invoice_id; ?></strong>
                                    </address>                               
                                </div>
                            </div>
                            <hr style="margin-top: 0px;margin-bottom: 0px;" />
                            <div class="row">
                                <?php
                                if (!empty($feeList)) {
                                    ?>

                                    <table class="table table-striped table-responsive" style="font-size: 8pt;">
                                        <thead>
                                            <tr>

                                                <th><?php echo $this->lang->line('date'); ?></th>

                                                <th><?php echo $this->lang->line('fees_group'); ?></th>
                                                <th><?php echo $this->lang->line('fee_type'); ?></th>
                                                <th><?php echo $this->lang->line('mode'); ?></th>
                                                <th class="text text-right"><?php echo $this->lang->line('amount'); ?></th>
                                                <th class="text text-right"><?php echo $this->lang->line('discount'); ?></th>
                                                <th class="text text-right"><?php echo $this->lang->line('fine'); ?></th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $amount = 0;
                                            $discount = 0;
                                            $fine = 0;
                                            $total = 0;
                                            $grd_total = 0;
                                            if (empty($feeList)) {
                                                ?>
                                                <tr>
                                                    <td colspan="11" class="text-danger text-center">
                                                        <?php echo $this->lang->line('no_transaction_found'); ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                $count = 1;

                                                $a = json_decode($feeList->amount_detail);
                                                $record = $a->{$sub_invoice_id};
                                                ?>
                                                <tr>

                                                    <td>
                                                        <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($record->date)); ?>

                                                    </td> 


                                                    <td>
                                                        <?php echo $feeList->name; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $feeList->code; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $record->payment_mode; ?>
                                                    </td>
                                                    <td class="text text-right">
                                                        <?php
                                                        $amount = number_format($record->amount, 2, '.', '');
                                                        echo $currency_symbol . $amount;
                                                        ?>
                                                    </td>
                                                    <td class="text text-right">
                                                        <?php
                                                        $amount_discount = number_format($record->amount_discount, 2, '.', '');
                                                        echo $currency_symbol . $amount_discount;
                                                        ?>
                                                    </td>
                                                    <td class="text text-right">
                                                        <?php
                                                        $amount_fine = number_format($record->amount_fine, 2, '.', '');
                                                        echo $currency_symbol . $amount_fine;
                                                        ?>
                                                    </td>

                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }
                                ?>

                            </div>
                            <div class="row header ">
                                <div class="col-sm-12">
                                    <?php $this->setting_model->get_receiptfooter(); ?>

                                </div>

                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>  
            </div>

        </div>
        <div class="clearfix"></div>
        <footer>           
        </footer>
    </body>
</html>
