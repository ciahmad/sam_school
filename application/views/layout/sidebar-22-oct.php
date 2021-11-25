<style type="text/css">
   /* Code By Webdevtrick ( https://webdevtrick.com ) */

#accordian{
    margin-top: 85px;
}

#accordian ul li h3 a:hover {
        background: #070707;
        border-left: 5px solid #DC700E;
        color: #faa21c;
}

#accordian h3 a {
        padding: 5px;
        font-size: 13px;
        line-height: 25px;
        display: block;
        color: #fff;
        text-decoration: none;
}

#accordian h3:hover {
        text-shadow: 0 0 1px rgba(255, 255, 255, 0.7);
}

i {
        margin-right: 5px;
}

#accordian li {
        list-style-type: none;
}

#accordian ul ul li a,
#accordian h4 {
        color: #fff;
        text-decoration: none;
        font-size: 12px;
        line-height: 27px;
        display: block;
        padding: 0 15px;
        -webkit-transition: all 0.15s;
        transition: all 0.15s;
        position: relative;
}

#accordian ul ul li a:hover {
        background: #070707;
        border-left: 5px solid #DC700E;
        color: #faa21c;
}

#accordian ul ul {
        display: none;
}

#accordian li.active&gt;ul {
        display: block;
}

#accordian ul ul ul {
        border-left: 1px dotted rgba(0, 0, 0, 0.5);
}

#accordian a:not(:only-child):after {
        content: "\f104";
        font-family: fontawesome;
        position: absolute;
        right: 10px;
        top: 0;
        font-size: 12px;
}

#accordian .active&gt;a:not(:only-child):after {
        content: "\f107";
}
</style>
<aside class="main-sidebar" id="alert2">
    <?php if ($this->rbac->hasPrivilege('student', 'can_view')) { ?>
        <form class="navbar-form navbar-left search-form2" role="search"  action="<?php echo site_url('admin/admin/search'); ?>" method="POST">
            <?php echo $this->customlib->getCSRF(); ?>
            <div class="input-group ">

                <input type="text"  name="search_text" class="form-control search-form" placeholder="<?php echo $this->lang->line('search_by_student_name'); ?>">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" style="padding: 3px 12px !important;border-radius: 0px 30px 30px 0px; background: #fff;" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
    <?php } ?>
    <section class="sidebar" id="sibe-box">
        <?php $this->load->view('layout/top_sidemenu'); ?>
        
        <div id="accordian">
            <ul style="padding: 0px;">
                <?php
            if ($this->module_lib->hasActive('front_office')) {
                if (($this->rbac->hasPrivilege('admission_enquiry', 'can_view') ||
                        $this->rbac->hasPrivilege('visitor_book', 'can_view') ||
                        $this->rbac->hasPrivilege('phon_call_log', 'can_view') ||
                        $this->rbac->hasPrivilege('postal_dispatch', 'can_view') ||
                        $this->rbac->hasPrivilege('postal_receive', 'can_view') ||
                        $this->rbac->hasPrivilege('complaint', 'can_view') ||
                        $this->rbac->hasPrivilege('setup_font_office', 'can_view'))) {
                    ?>
                <li class="<?php echo menu_heading('front_office');?>">
                    <h3 style="padding: 0px; margin: 0px; "><a href="javascript:"><i class="fa fa-user-plus ftlayer"></i></span>FRONT OFFICE</a></h3>
                    <ul style="padding-left: 5px; <?php echo menu_heading('front_office');?>">

                        <li><a href="<?php echo base_url(); ?>admin/enquiry" style="<?php echo set_1stLevel('admin/enquiry');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('admission_enquiry'); ?> </a></li>

                        <li><a href="<?php echo base_url(); ?>admin/visitors" style="<?php echo set_1stLevel('admin/visitors');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('visitor_book'); ?></a></li>

                        <li><a href="<?php echo base_url(); ?>admin/generalcall" style="<?php echo set_1stLevel('admin/generalcall');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('phone_call_log'); ?></a></li>

                        <li><a href="<?php echo base_url(); ?>admin/dispatch" style="<?php echo set_1stLevel('admin/dispatch');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('postal_dispatch'); ?></a></li>

                        <li><a href="<?php echo base_url(); ?>admin/receive" style="<?php echo set_1stLevel('admin/receive');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('postal_receive'); ?></a></li>

                        <li><a href="<?php echo base_url(); ?>admin/complaint" style="<?php echo set_1stLevel('admin/complaint');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('complain'); ?></a></li>

                        <li><a href="<?php echo base_url(); ?>admin/visitorspurpose" style="<?php echo set_1stLevel('admin/visitorspurpose');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('setup_front_office'); ?></a></li>
                    </ul>
                </li>
                <?php
                }
            } ?>
                <li>
                    <h3 style="padding: 0px; margin: 0px;"><a href="javascript:"><i class="fa fa-user-plus ftlayer"></i></span>STUDENTS</a></h3>
                    <ul style="padding-left: 5px; <?php echo menu_heading('STUDENTS');?>">

                        <?php if ($this->rbac->hasPrivilege('student', 'can_view')) {?>
                        <li><a href="<?php echo base_url(); ?>student/search" style="<?php echo set_1stLevel('student/search');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student_details'); ?></a></li>
                        <?php }?>

                        <?php if ($this->rbac->hasPrivilege('student', 'can_add')) {?>
                        <li><a href="<?php echo base_url(); ?>student/create" style="<?php echo set_1stLevel('student/create');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student_admission'); ?></a></li>
                        <?php } ?>
                    
                        <?php if ($this->module_lib->hasActive('online_admission')) {
                            if ($this->rbac->hasPrivilege('online_admission', 'can_view')) { ?>
                        <li><a href="<?php echo site_url('admin/onlinestudent'); ?>" style="<?php echo set_1stLevel('onlinestudent');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('online') . " " . $this->lang->line('admission'); ?></a></li>
                        <?php }} ?>

                        <li><a href="<?php echo base_url(); ?>admin/stuattendence" style="<?php echo set_1stLevel('stuattendence/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student_attendance'); ?></a></li>

                        <?php if ($this->rbac->hasPrivilege('approve_leave', 'can_view')) { ?>
                        <li><a href="<?php echo base_url(); ?>admin/approve_leave" style="<?php echo set_1stLevel('Attendance/approve_leave');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('approve') . " " . $this->lang->line('leave'); ?></a></li>
                        <?php } ?>
                        <?php if ($this->rbac->hasPrivilege('promote_student', 'can_view')) { ?>
                            <li><a href="<?php echo base_url(); ?>admin/stdtransfer" style="<?php echo set_1stLevel('stdtransfer/index');?>"><i class="fa fa-angle-double-right" ></i> <?php echo $this->lang->line('promote_students'); ?></a></li>
                        <?php }?>

                        <!-- <li class=""><a href="<?php echo base_url(); ?>admin/approve_leave" ><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('approve') . " " . $this->lang->line('leave'); ?></a></li> -->
                        <!-- <li class=""><a href="<?php echo base_url(); ?>admin/stdtransfer" ><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('promote_students'); ?></a></li> -->
                    </ul>
                </li>

                <li>
                    <h3 style="padding: 0px; margin: 0px;">
                        <a href="javascript:"><i class="fa fa-lg fa-tasks"></i>ACCOUNTS</a></h3>
                    <ul style="padding-left: 5px; <?php echo menu_heading('ACCOUNTS');?>" >
                        <li class="active"> 
                            <a href="javascript:"><i class="fa fa-money ftlayer"></i>FEE</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('FEE'); ?>">
                            <?php if ($this->rbac->hasPrivilege('collect_fees', 'can_view')) { ?>    
                                <li><a href="<?php echo base_url(); ?>studentfee" style="<?php echo set_1stLevel('studentfee/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('collect_fees'); ?></a></li>
                            <?php } ?>
                            <?php if ($this->rbac->hasPrivilege('fees_carry_forward', 'can_view')) { ?>
                                <li><a href="<?php echo base_url('admin/feesforward'); ?>" style="<?php echo set_1stLevel('feesforward/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_carry_forward'); ?></a></li>
                            <?php } ?>
                            <?php if ($this->rbac->hasPrivilege('fees_reminder', 'can_view')) { ?>
                                <li><a href="<?php echo site_url('admin/feereminder/setting'); ?>" style="<?php echo set_1stLevel('feereminder/setting');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees') . " " . $this->lang->line('reminder'); ?></a></li>
                            <?php }?>
                            </ul>
                        </li>
                        <?php if ($this->rbac->hasPrivilege('income', 'can_view')) { ?>
                        <li> 
                            <a href="javascript:"><i class="fa fa-dollar ftlayer"></i>INCOME</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('INCOME'); ?>">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/income" style="<?php echo set_1stLevel('income/index');?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('add_income'); ?></a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if ($this->rbac->hasPrivilege('expense', 'can_view')) { ?>
                        <li> 
                            <a href="javascript:"><i class="fa fa-money ftlayer"></i>EXPENSES</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('EXPENSES'); ?>">
                                <li><a href="<?php echo base_url(); ?>admin/expense" style="<?php echo set_1stLevel('expense/index');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('add_expense'); ?></a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <li> 
                            <a href="javascript:"><i class="fa fa-newspaper-o ftlayer"></i>VOUCHERS</a>
                            <ul style="padding-left: 5px; ">
                                <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Cash/Bank Receipt Voucher</a></li>
                                <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Bank Payment Voucher</a></li>
                                <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Journal Voucher</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </li>
                
                <li>
                    <h3 style="padding: 0px; margin: 0px;">
                        <a href="javascript:"><i class="fa fa-sitemap ftlayer"></i></span>HUMAN RESOURCE</a></h3>
                    <ul style="padding-left: 5px; <?php echo menu_heading('HUMAN RESOURCE'); ?>">
                        <?php if ($this->rbac->hasPrivilege('staff', 'can_view')) { ?>
                        <li><a href="<?php echo base_url(); ?>admin/staff" style="<?php echo set_1stLevel('HR/staff');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('staff_directory'); ?></a></li>
                        <?php } ?>
                        <?php
                            if ($this->rbac->hasPrivilege('staff_attendance', 'can_view')) {
                                ?>
                        <li><a href="<?php echo base_url(); ?>admin/staffattendance" style="<?php echo set_1stLevel('admin/staffattendance');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('staff_attendance'); ?></a></li>
                        <?php } ?>
                        <?php if ($this->rbac->hasPrivilege('staff_payroll', 'can_view')) {
                                ?>
                        <li><a href="<?php echo base_url(); ?>admin/payroll" style="<?php echo set_1stLevel('admin/payroll');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('payroll'); ?></a></li>
                        <?php } 
                        if ($this->rbac->hasPrivilege('approve_leave_request', 'can_view')) {
                                ?>
                        <li><a href="<?php echo base_url(); ?>admin/leaverequest/leaverequest" style="<?php echo set_1stLevel('admin/leaverequest/leaverequest');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('approve_leave_request'); ?></a></li>
                        <?php } ?>
                        <?php if ($this->rbac->hasPrivilege('apply_leave', 'can_view')) {
                                ?>
                        <li><a href="<?php echo base_url(); ?>admin/staff/leaverequest" style="<?php echo set_1stLevel('admin/staff/leaverequest');?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('apply_leave'); ?></a></li>
                        <?php } ?>
                    </ul>
                </li>

                <li>
                    <h3 style="padding: 0px; margin: 0px;">
                        <a href="javascript:"><i class="fa fa-book ftlayer"></i></span>LIBRARY</a></h3>
                    <ul style="padding-left: 5px; <?php echo menu_heading('LIBRARY'); ?>">
                        <?php if ($this->rbac->hasPrivilege('books', 'can_view')) { ?>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/book/getall"  style="<?php echo set_1stLevel('book/getall'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('book_list'); ?></a></li>
                        <?php } ?>
                        <?php if ($this->rbac->hasPrivilege('issue_return', 'can_view')) { ?>
                        <li><a href="<?php echo base_url(); ?>admin/member" style="<?php echo set_1stLevel('member/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('issue_return'); ?></a></li>
                        <?php } ?>
                        <?php if ($this->rbac->hasPrivilege('add_student', 'can_view')) { ?>
                        <li><a href="<?php echo base_url(); ?>admin/member/student" style="<?php echo set_1stLevel('member/student'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('add_student'); ?></a></li>
                        <?php } ?>
                         <?php if ($this->rbac->hasPrivilege('add_staff_member', 'can_view')) { ?>
                        <li><a href="<?php echo base_url(); ?>admin/member/teacher"  style="<?php echo set_1stLevel('Library/member/teacher'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('add_staff_member'); ?></a></li>
                        <?php } ?>
                    </ul>
                </li>

                <li>
                    <h3 style="padding: 0px; margin: 0px;"><a href="javascript:"><i class="fa fa-object-group ftlayer"></i></span>INVENTORY</a></h3>
                    <ul style="padding-left: 5px; <?php echo menu_heading('INVENTORY'); ?>">
                        <li><a href="<?php echo base_url(); ?>admin/issueitem"  style="<?php echo set_1stLevel('issueitem/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('issue_item'); ?></a></li>

                        <li><a href="<?php echo base_url(); ?>admin/itemstock" style="<?php echo set_1stLevel('Itemstock/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('add_item_stock'); ?></a></li>
                    </ul>
                </li>

                <li>
                    <h3 style="padding: 0px; margin: 0px;">
                    <a href="javascript:"><i class="fa fa-gears ftlayer"></i>SETTINGS</a></h3>
                    <ul style="padding-left: 5px; <?php echo menu_heading('SETTINGS'); ?>">
                        <li class="active"> 
                            <a href="javascript:"><i class="fa fa-user-plus ftlayer"></i>STUDENTS</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('STUDENTS'); ?>">
                                <?php
                                    if ($this->rbac->hasPrivilege('student_houses', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/schoolhouse"  style="<?php echo set_1stLevel('admin/schoolhouse'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('house'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('disable_reason', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/disable_reason" style="<?php echo set_1stLevel('student/disable_reason'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('disable') . " " . $this->lang->line('reason'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('item_category', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>category" style="<?php echo set_1stLevel('category/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student_categories'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('student', 'can_delete')) {
                                ?>
                                <li><a href="<?php echo site_url('student/bulkdelete'); ?>" style="<?php echo set_1stLevel('bulkdelete'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('bulk') . " " . $this->lang->line('delete'); ?></a>
                                </li>
                                <?php  } ?>
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-money ftlayer"></i>FEE</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('FEE'); ?>">
                                <?php if ($this->rbac->hasPrivilege('fees_master', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/feemaster" style="<?php echo set_1stLevel('admin/feemaster'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_master'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('fees_group', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/feegroup" style="<?php echo set_1stLevel('admin/feegroup'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_group'); ?></a></li>
                                <?php  } ?>
                                <?php  if ($this->rbac->hasPrivilege('fees_type', 'can_view')) {
                                ?>
                                 <li><a href="<?php echo base_url(); ?>admin/feetype" style="<?php echo set_1stLevel('feetype/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_type'); ?></a></li>
                                <?php  } ?>
                                <?php  if ($this->rbac->hasPrivilege('fees_discount', 'can_view')) {
                                ?>
                                 <li><a href="<?php echo base_url(); ?>admin/feediscount" style="<?php echo set_1stLevel('admin/feediscount'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('fees_discount'); ?></a></li>
                                <?php  } ?>
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-list-alt ftlayer"></i>ACCOUNTS</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('ACCOUNTS'); ?>">

                                <?php if ($this->rbac->hasPrivilege('income_head', 'can_view')) {?>
                                <li><a href="<?php echo base_url(); ?>admin/incomehead" style="<?php echo set_1stLevel('incomeshead/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('income_head'); ?></a></li>
                                <?php  } ?>
                                 <?php if ($this->rbac->hasPrivilege('expense_head', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/expensehead" style="<?php echo set_1stLevel('expenseshead/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('expense_head'); ?></a></li>
                                <?php  } ?>

                                <?php if ($this->rbac->hasPrivilege('account', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/account/getall" style="<?php echo set_1stLevel('account/getall'); ?>"><i class="fa fa-angle-double-right"></i> Chart of Accounts</a></li>
                                <?php  } ?>

                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-map-o ftlayer"></i>EXAMINATIONS</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('EXAMINATIONS'); ?>">

                                <li><a href="<?php echo site_url('admin/exam_schedule'); ?>" style="<?php echo set_1stLevel('Examinations/Examschedule'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('exam_schedule'); ?></a></li>
                            <?php if ($this->rbac->hasPrivilege('print_admit_card', 'can_view')) { ?>
                               <li><a href="<?php echo base_url(); ?>admin/examresult/admitcard" style="<?php echo set_1stLevel('Examinations/examresult/admitcard'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('print') . " " . $this->lang->line('admit') . " " . $this->lang->line('card'); ?></a></li>
                               <?php  } ?>
                               <?php if ($this->rbac->hasPrivilege('print_marksheet', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/examresult/marksheet" style="<?php echo set_1stLevel('Examinations/examresult/marksheet'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('print') . " " . $this->lang->line('marksheet'); ?></a></li>
                                <?php  } ?>
                                <?php if (($this->rbac->hasPrivilege('rank_report', 'can_view'))) { ?>
                                <li><a href="<?php echo base_url(); ?>report/examinations" style="<?php echo set_1stLevel('Reports/examinations'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('examinations'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('online_examination', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/onlineexam" style="<?php echo set_1stLevel('Online_Examinations/Onlineexam'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('online') . " " . $this->lang->line('exam'); ?></a></li>
                                <?php  } ?>
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-mortar-board ftlayer"></i>ACADEMICS</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('ACADEMICS'); ?>">

                                <?php if ($this->rbac->hasPrivilege('class', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>classes" style="<?php echo set_1stLevel('classes/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('class'); ?></a></li>
                                <?php  } ?>
                                <?php  if ($this->rbac->hasPrivilege('subject', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/subject" style="<?php echo set_1stLevel('Academics/subject'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('subjects'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('section', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>sections" style="<?php echo set_1stLevel('sections/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('sections'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('subject_group', 'can_view')) { ?>
                                <li><a href="<?php echo base_url('admin/subjectgroup'); ?>" style="<?php echo set_1stLevel('subjectgroup/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('subject') . " " . $this->lang->line('group') ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('assign_class_teacher', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/teacher/assign_class_teacher" style="<?php echo set_1stLevel('admin/teacher/assign_class_teacher'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('assign_class_teacher'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('class_timetable', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/timetable/classreport" style="<?php echo set_1stLevel('Academics/timetable'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('class_timetable'); ?></a></li>
                                <?php  } ?>
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-list-alt ftlayer"></i>LESSON PLAN</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('LESSON PLAN'); ?>">
                                <?php if ($this->rbac->hasPrivilege('manage_lesson_plan', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/syllabus" style="<?php echo set_1stLevel('admin/syllabus'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('manage_lesson_plan'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('manage_syllabus_status', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/syllabus/status" style="<?php echo set_1stLevel('admin/lessonplan'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('manage_syllabus_status'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('lesson', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/lessonplan/lesson" style="<?php echo set_1stLevel('admin/lessonplan/lesson'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('lesson'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('topic', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/lessonplan/topic" style="<?php echo set_1stLevel('admin/lessonplan/topic'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('topic'); ?></a></li>
                                <?php  } ?>
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-sitemap ftlayer"></i>HUMAN RESOURCE</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('HUMAN RESOURCE'); ?>">

                               <?php if ($this->rbac->hasPrivilege('department', 'can_view')) { ?>
                                 <li><a href="<?php echo base_url(); ?>admin/department/department" style="<?php echo set_1stLevel('admin/department/department'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('department'); ?></a></li>
                                <?php  } ?>
                                <?php  if ($this->rbac->hasPrivilege('designation', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/designation/designation" style="<?php echo set_1stLevel('admin/designation/designation'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('designation'); ?></a></li>
                                <?php  } ?>
                                <?php  if ($this->rbac->hasPrivilege('disable_staff', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/staff/disablestafflist" style="<?php echo set_1stLevel('HR/staff/disablestafflist'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('disabled_staff'); ?></a></li>
                                <?php  } ?>
                                <?php  if ($this->rbac->hasPrivilege('leave_types', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/leavetypes" style="<?php echo set_1stLevel('admin/leavetypes'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('leave_type'); ?></a></li>
                                <?php  } ?>
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-bullhorn ftlayer"></i>COMMUNICATION</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('COMMUNICATION'); ?>">

                                <?php if ($this->rbac->hasPrivilege('notification_setting', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/notification" style="<?php echo set_1stLevel('notification/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('notice_board'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('email', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/mailsms/compose" style="<?php echo set_1stLevel('Communicate/mailsms/compose'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('send') . " " . $this->lang->line('email') ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('sms', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/mailsms/compose_sms" style="<?php echo set_1stLevel('mailsms/compose_sms'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('send') . " " . $this->lang->line('sms') ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('email_sms_log', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/mailsms/index" style="<?php echo set_1stLevel('mailsms/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('email_/_sms_log'); ?></a></li>
                                <?php  } ?>
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-paragraph ftlayer"></i>CONTENTS CENTRE</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('CONTENTS CENTRE'); ?>">
                                <?php if ($this->rbac->hasPrivilege('upload_content', 'can_view')) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/content" style="<?php echo set_1stLevel('admin/content'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('upload_content'); ?></a></li>
                                <?php  } ?>
                                <?php  if ($this->module_lib->hasActive('homework')) {
                                    if (($this->rbac->hasPrivilege('homework', 'can_view'))) {
                                        ?>
                                        <?php if ($this->rbac->hasPrivilege('homework', 'can_view')) { ?>
                                    <li><a href="<?php echo base_url(); ?>homework" style="<?php echo set_1stLevel('homework'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('add_homework'); ?></a></li>
                                <?php  } ?>
                                <?php  }} ?>
                            </ul>   
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-object-group ftlayer"></i>INVENTORY</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('INVENTORY'); ?>">
                                <?php if ($this->rbac->hasPrivilege('item', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/item" style="<?php echo set_1stLevel('Item/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('add_item'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('item_category', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/itemcategory" style="<?php echo set_1stLevel('itemcategory/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('item_category'); ?></a></li>
                                <?php  } ?>
                                <?php if ($this->rbac->hasPrivilege('store', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/itemstore" style="<?php echo set_1stLevel('itemstore/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('item_store'); ?></a></li>
                                 <?php  } ?>

                                 <?php if ($this->rbac->hasPrivilege('supplier', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/itemsupplier" style="<?php echo set_1stLevel('itemsupplier/index'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('item_supplier'); ?></a></li>
                                <?php  } ?>
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-bus ftlayer"></i>TRANSPORT</a>
                            <ul style="padding-left: 5px; <?php echo sub_heading('TRANSPORT'); ?>">
                                <?php
                                    if ($this->rbac->hasPrivilege('routes', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/route" style="<?php echo set_1stLevel('route/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('routes'); ?></a></li>
                                <?php
                                    }
                                    if ($this->rbac->hasPrivilege('vehicle', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/vehicle" style="<?php echo set_1stLevel('vehicle/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('vehicles'); ?></a></li>
                                <?php
                                    }
                                    if ($this->rbac->hasPrivilege('assign_vehicle', 'can_view')) {
                                ?>
                                <li><a href="<?php echo base_url(); ?>admin/vehroute" style="<?php echo set_1stLevel('vehroute/index'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('assign_vehicle'); ?></a></li>
                                <?php
                                    }
                                ?>
                                <li><a href="javascript:"><i class="fa fa-angle-double-right"></i> Assign Students</a></li>
                                <li><a href="javascript:"><i class="fa fa-angle-double-right"></i> Assign Staff</a></li>
                                
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-building-o ftlayer"></i>HOSTEL</a>
                            <ul style="padding-left: 5px;">
                                <li class="<?php echo set_Submenu('hostelroom/index'); ?>"><a href="<?php echo base_url(); ?>admin/hostelroom"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('hostel_rooms'); ?></a></li>
                                <li class="<?php echo set_Submenu('roomtype/index'); ?>"><a href="<?php echo base_url(); ?>admin/roomtype"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('room_type'); ?></a></li>
                                <li class="<?php echo set_Submenu('hostel/index'); ?>"><a href="<?php echo base_url(); ?>admin/hostel"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('hostel'); ?></a></li>
                                <li><a href="javascript:"><i class="fa fa-angle-double-right"></i> Assign Room</a></li>
                                <li><a href="javascript:"><i class="fa fa-angle-double-right"></i> Assign Dean</a></li>
                                
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-newspaper-o ftlayer"></i>CERTIFICATES</a>
                            <ul style="padding-left: 5px;">
                                <li class="<?php echo set_Submenu('admin/certificate'); ?>"><a href="<?php echo base_url(); ?>admin/certificate/"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('certificate'); ?></a></li>
                                <li class="<?php echo set_Submenu('admin/generatecertificate'); ?>"><a href="<?php echo base_url(); ?>admin/generatecertificate/"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('generate'); ?> <?php echo $this->lang->line('certificate'); ?></a></li>
                                <li class="<?php echo set_Submenu('admin/studentidcard'); ?>"><a href="<?php echo base_url('admin/studentidcard/'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('icard'); ?></a></li>
                                <li class="<?php echo set_Submenu('admin/generateidcard'); ?>"><a href="<?php echo base_url('admin/generateidcard/'); ?>"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('generate'); ?> <?php echo $this->lang->line('icard'); ?></a></li>
                                
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-empire ftlayer"></i>FRONT CMS</a>
                            <ul style="padding-left: 5px;">
                                <li class="<?php echo set_Submenu('admin/front/events'); ?>"><a href="<?php echo base_url(); ?>admin/front/events"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('event'); ?></a></li>
                                <li class="<?php echo set_Submenu('admin/front/gallery'); ?>"><a href="<?php echo base_url(); ?>admin/front/gallery"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('gallery'); ?></a></li>
                                <li class="<?php echo set_Submenu('admin/front/notice'); ?>"><a href="<?php echo base_url(); ?>admin/front/notice"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('notice'); ?></a></li>
                                <li class="<?php echo set_Submenu('admin/front/media'); ?>"><a href="<?php echo base_url(); ?>admin/front/media"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('media_manager'); ?></a></li>
                                <li class="<?php echo set_Submenu('admin/front/page'); ?>"><a href="<?php echo base_url(); ?>admin/front/page"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('page'); ?></a></li>
                                <li class="<?php echo set_Submenu('admin/front/menus'); ?>"><a href="<?php echo base_url(); ?>admin/front/menus"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('menus'); ?></a></li>
                                <li class="<?php echo set_Submenu('admin/front/banner'); ?>"><a href="<?php echo base_url(); ?>admin/front/banner"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('banner_images'); ?></a></li>
                                
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-universal-access ftlayer"></i>ALUMNI</a>
                            <ul style="padding-left: 5px;">
                                <li class="<?php echo set_Submenu('alumni/alumnilist'); ?>"><a href="<?php echo base_url(); ?>admin/alumni/alumnilist"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('manage_alumini'); ?></a></li>
                                <li class="<?php echo set_Submenu('alumni/event'); ?>"><a href="<?php echo base_url(); ?>admin/alumni/events"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('events'); ?></a></li>

                                
                            </ul>
                        </li>
                        <li> <a href="javascript:"><i class="fa fa-gears ftlayer"></i>OTHER SETTINGS</a>
                            <ul style="padding-left: 5px;">
                                <li class="<?php echo set_Submenu('schsettings/index'); ?>"><a href="<?php echo base_url(); ?>schsettings"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('general_settings'); ?></a></li>
                                <li class="<?php echo set_Submenu('sessions/index'); ?>"><a href="<?php echo base_url(); ?>sessions"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('session_setting'); ?></a></li>
                                <li class="<?php echo set_Submenu('notification/setting'); ?>"><a href="<?php echo base_url(); ?>admin/notification/setting"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('notification_setting'); ?></a></li>
                                <li class="<?php echo set_Submenu('smsconfig/index'); ?>"><a href="<?php echo base_url(); ?>smsconfig"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('sms_setting'); ?></a></li>
                                <li class="<?php echo set_Submenu('emailconfig/index'); ?>"><a href="<?php echo base_url(); ?>emailconfig"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('email_setting'); ?></a></li>
                                <li class="<?php echo set_Submenu('admin/paymentsettings'); ?>"><a href="<?php echo base_url(); ?>admin/paymentsettings"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('payment_methods'); ?></a></li>

                                <li class="<?php echo set_Submenu('users/index'); ?>"><a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('users'); ?></a></li>
                                <li class="<?php echo set_Submenu('System Settings/module'); ?>"><a href="<?php echo base_url(); ?>admin/module"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('modules'); ?></a></li>
                                <li class="<?php echo set_Submenu('System Settings/customfield'); ?>"><a href="<?php echo base_url(); ?>admin/customfield"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('custom') . " " . $this->lang->line('fields'); ?></a></li>
                                <li class="<?php echo set_Submenu('System Settings/systemfield'); ?>"><a href="<?php echo base_url(); ?>admin/systemfield"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('system') . " " . $this->lang->line('fields'); ?></a></li>
                                <li class="<?php echo set_Submenu('System Settings/profilesetting'); ?>"><a href="<?php echo base_url(); ?>student/profilesetting"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student') . " " . $this->lang->line('profile') . " " . $this->lang->line('update'); ?></a></li>
                                <li class="<?php echo set_Submenu('System Settings/updater'); ?>"><a href="<?php echo base_url(); ?>admin/updater"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('system_update') ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <h3 style="padding: 0px; margin: 0px;">
                    <a href="javascript:"><i class="fa fa-line-chart ftlayer"></i>REPORTS</a></h3>
                    <ul style="padding-left: 5px;">
                                <li class="active"> 
                                    <a href="javascript:"><i class="fa fa-user-plus ftlayer"></i>STUDENTS</a>
                                    <ul style="padding-left: 5px;">
                                        <li class="<?php echo set_Submenu('student/multiclass'); ?>"><a href="<?php echo base_url(); ?>student/multiclass"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('multiclass') . " " . $this->lang->line('student'); ?></a></li>
                                        <li class="<?php echo set_Submenu('student/disablestudentslist'); ?>"><a href="<?php echo base_url(); ?>student/disablestudentslist"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('disabled_students'); ?></a></li>
                                        <li class="<?php echo set_Submenu('stuattendence/attendenceReport'); ?>"><a href="<?php echo base_url(); ?>admin/stuattendence/attendencereport"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('attendance_by_date'); ?></a></li>
                                        <li class="<?php echo set_Submenu('Reports/student_information'); ?>"><a href="<?php echo base_url(); ?>report/studentinformation"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('student_information'); ?></a></li>

                                    </ul>
                                </li>
                                <li> <a href="javascript:"><i class="fa fa-money ftlayer"></i>FEE</a>
                                    <ul style="padding-left: 5px;">
                                        <li class="<?php echo set_Submenu('studentfee/searchpayment'); ?>"><a href="<?php echo base_url(); ?>studentfee/searchpayment"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('search_fees_payment'); ?></a></li>
                                        <li class="<?php echo set_Submenu('studentfee/feesearch'); ?>"><a href="<?php echo base_url(); ?>studentfee/feesearch"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('search_due_fees'); ?> </a></li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:"><i class="fa fa-list-alt ftlayer"></i>ACCOUNTS</a>
                                    <ul style="padding-left: 5px;">
                                        <li class="<?php echo set_Submenu('income/incomesearch'); ?>"><a href="<?php echo base_url(); ?>admin/income/incomesearch"><i class="fa fa-angle-double-right"></i><?php echo $this->lang->line('search_income'); ?></a></li>
                                        <li class="<?php echo set_Submenu('expense/expensesearch'); ?>"><a href="<?php echo base_url(); ?>admin/expense/expensesearch"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('search_expense'); ?></a></li>
                                        <li class="<?php echo set_Submenu('Reports/finance'); ?>"><a href="<?php echo base_url(); ?>report/finance"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('finance'); ?></a></li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:"><i class="fa fa-map-o ftlayer"></i>EXAMINATIONS</a>
                                    <ul style="padding-left: 5px;">
                                        <li class="<?php echo set_Submenu('Examinations/Examresult'); ?>"><a href="<?php echo site_url('admin/examresult'); ?>"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('exam') . " " . $this->lang->line('result'); ?></a></li>
                                        <li class="<?php echo set_Submenu('Examinations/examresult/admitcard'); ?>"><a href="<?php echo base_url(); ?>admin/examresult/admitcard"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('print') . " " . $this->lang->line('admit') . " " . $this->lang->line('card'); ?></a></li>
                                        <li class="<?php echo set_Submenu('Examinations/examresult/marksheet'); ?>"><a href="<?php echo base_url(); ?>admin/examresult/marksheet"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('print') . " " . $this->lang->line('marksheet'); ?></a></li>
                                        <li class="<?php echo set_Submenu('Reports/examinations'); ?>"><a href="<?php echo base_url(); ?>report/examinations"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('examinations'); ?></a></li>
                                        <li class="<?php echo set_Submenu('Reports/online_examinations'); ?>"><a href="<?php echo base_url(); ?>admin/onlineexam/report"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('online') . " " . $this->lang->line('examinations'); ?></a></li>

                                        <!-- <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Cash/Bank Receipt Voucher</a></li>
                                        <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Cash/Cash/Bank Payment Voucher</a></li>
                                        <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Cash/Journal Voucher</a></li> -->
                                    </ul>
                                </li>

                                <li> <a href="javascript:"><i class="fa fa-paragraph ftlayer"></i>CONTENTS CENTRE</a>
                                    <ul style="padding-left: 5px;">
                                        <li class="<?php echo set_Submenu('content/assignment'); ?>"><a href="<?php echo base_url(); ?>admin/content/assignment"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('assignments'); ?></a></li>
                                    <li class="<?php echo set_Submenu('content/studymaterial'); ?>"><a href="<?php echo base_url(); ?>admin/content/studymaterial"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('study_material'); ?></a></li>
                                    <li class="<?php echo set_Submenu('content/syllabus'); ?>"><a href="<?php echo base_url(); ?>admin/content/syllabus"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('syllabus'); ?></a></li>
                                    <li class="<?php echo set_Submenu('content/other'); ?>"><a href="<?php echo base_url(); ?>admin/content/other"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('other_downloads'); ?></a></li>
                                    <li class="<?php echo set_Submenu('homework'); ?>"><a href="<?php echo base_url(); ?>homework"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('add_homework'); ?></a></li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:"><i class="fa fa-object-group ftlayer"></i>INVENTORY</a>
                                    <ul style="padding-left: 5px;">
                                        <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Inventory List</a></li>
                                        <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Inventory Report</a></li>
                                        <li class="<?php echo set_Submenu('Reports/inventory'); ?>"><a href="<?php echo base_url(); ?>report/inventory"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('inventory'); ?></a></li>
                                    </ul>
                                </li>

                                <li> <a href="javascript:"><i class="fa fa-map-o ftlayer"></i>EXAMINATIONS</a>
                                    <ul style="padding-left: 5px;">

                                        <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Hostel List</a></li>
                                        <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Rooms List</a></li>
                                        <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Assigned Rooms</a></li>
                                        <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Available Rooms</a></li>
                                        <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Hostel Management</a></li>

                                        <li class="<?php echo set_Submenu('hostel/index'); ?>"><a href="<?php echo base_url(); ?>admin/hostel"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('hostel'); ?></a></li>

                                        
                                    </ul>
                                </li>
                                <li> <a href="javascript:"><i class="fa fa-newspaper-o ftlayer"></i>CERTIFICATES</a>
                                    <ul style="padding-left: 5px;">
                                        <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>Certificates List</a></li>
                                        <li class=""><a href="javascript:"><i class="fa fa-angle-double-right"></i>ID Cards List</a></li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:"><i class="fa fa-gears ftlayer"></i>GENERAL REPORTS</a>
                                    <ul style="padding-left: 5px;">
                                        <li class="<?php echo set_Submenu('subjectattendence/index'); ?>"><a href="<?php echo base_url(); ?>admin/subjectattendence"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('period') . " " . $this->lang->line('attendance'); ?></a></li>
                                        <li class="<?php echo set_Submenu('Reports/lesson_plan'); ?>"><a href="<?php echo base_url(); ?>report/lesson_plan"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('lesson_plan'); ?></a></li>
                                        <li class="<?php echo set_Submenu('Reports/human_resource'); ?>"><a href="<?php echo base_url(); ?>report/staff_report"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('human_resource'); ?></a></li>
                                        <li class="<?php echo set_Submenu('Reports/library'); ?>"><a href="<?php echo base_url(); ?>report/library"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('library'); ?></a></li>
                                        <li class="<?php echo set_Submenu('reports/studenttransportdetails'); ?>"><a href="<?php echo base_url(); ?>admin/route/studenttransportdetails"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('transport'); ?></a></li>
                                        <li class="<?php echo set_Submenu('Reports/alumni_report'); ?>"><a href="<?php echo base_url(); ?>report/alumnireport"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('alumni'); ?></a></li>
                                        <li class="<?php echo set_Submenu('Reports/userlog'); ?>"><a href="<?php echo base_url(); ?>admin/userlog"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('user_log'); ?></a></li>
                                        <li class="<?php echo set_Submenu('audit/index'); ?>"><a href="<?php echo base_url(); ?>admin/audit"><i class="fa fa-angle-double-right"></i>
                                        <?php echo $this->lang->line('audit') . " " . $this->lang->line('trail') . " " . $this->lang->line('report'); ?></a></li>
                                        <li class="<?php echo set_Submenu('Academics/timetable/mytimetable'); ?>"><a href="<?php echo base_url(); ?>admin/timetable/mytimetable"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('teachers') . " " . $this->lang->line('timetable') ?></a></li>
                                        <li class="<?php echo set_Submenu('HR/rating'); ?>"><a href="<?php echo base_url(); ?>admin/staff/rating"><i class="fa fa-angle-double-right"></i> <?php echo $this->lang->line('teachers') . " " . $this->lang->line('rating'); ?></a></li>
                                    </ul>
                                </li>
                                
                            </ul>
                </li>
                
            </ul>

        </div>
        <img src="<?php echo base_url(); ?>uploads/school_content/admin_logo/<?php $this->setting_model->getAdminlogo();?>" alt="<?php echo $this->customlib->getAppName() ?>" style="padding-left: 4px;width: 150px;position: fixed;height: 55px;bottom: 0px;left: 0px;" />
    </section>

</aside>

<script type="text/javascript">
    // Code By Webdevtrick ( https://webdevtrick.com )
$(document).ready(function() {
        $("#accordian a").click(function() {
                var link = $(this);
                var closest_ul = link.closest("ul");
                var parallel_active_links = closest_ul.find(".active")
                var closest_li = link.closest("li");
                var link_status = closest_li.hasClass("active");
                var count = 0;

                closest_ul.find("ul").slideUp(function() {
                        if (++count == closest_ul.find("ul").length)
                                parallel_active_links.removeClass("active");
                });

                if (!link_status) {
                        closest_li.children("ul").slideDown();
                        closest_li.addClass("active");
                }
        })
})
</script>