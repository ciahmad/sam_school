<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> <?php echo $this->lang->line('library'); ?> </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Account</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form id="form1" action="<?php echo site_url('admin/book/edit/' . $id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body row">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?>
                            <?php
                            if (isset($error_message)) {
                                echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                            }
                            ?>      
                            <?php echo $this->customlib->getCSRF(); ?>                     
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('account_title'); ?></label><small class="req"> *</small>
                                <input autofocus=""  id="account_title" name="account_title" placeholder="" type="text" class="form-control"  value="<?php echo set_value('account_title'); ?>" />
                                <span class="text-danger"><?php echo form_error('account_title'); ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('account_number'); ?></label><small class="req"> *</small>
                                <input id="account_number" name="account_number" placeholder="" type="text" class="form-control"  value="<?php echo set_value('account_number'); ?>" />
                                <span class="text-danger"><?php echo form_error('account_number'); ?></span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('account_type'); ?></label>
                                <select id="account_type_id" name="account_type_id" class="form-control" style="<?php echo $style;?>">
                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                    <?php
                                        foreach ($listaccounts as $listaccount) {
                                            if ($editaccount['id']==$listaccount['id']) {
                                                $selected = 'selected';
                                            }else{ $selected = ''; }
                                            
                                            ?>
                                            <option style="color: #000;font-weight: 600;" value="<?php echo $listaccount['id']; ?>" <?php echo set_select('id', $key, set_value('id')); ?> <?php echo $selected;?> ><?php echo $listaccount['name']; ?></option>
                                            <?php 
                                            if ($listaccount['children']) {
                                            foreach ($listaccount['children'] as $child) {
                                                if ($editaccount['id']==$child['id']) {
                                                    $selected = 'selected';
                                                }else{ $selected = ''; }
                                             ?>
                                            <option value="<?php echo $child['id']; ?>" <?php echo set_select('id', $key, set_value('id')); ?> <?php echo $selected;?>><?php echo $child['name']; ?></option>
                                            <?php } }?>
                                            <?php
                                        }
                                    ?>
                                </select>
                                
                                <span class="text-danger"><?php echo form_error('account_type_id'); ?></span>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Opening Balance</label>
                                <input id="opening_balance" name="opening_balance" placeholder="" type="text" class="form-control"  value="0" />
                                <span class="text-danger"><?php echo form_error('opening_balance'); ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Closing Balance</label>
                                <input id="closing_balance" name="closing_balance" placeholder="" type="text" class="form-control"  value="0" />
                                <span class="text-danger"><?php echo form_error('closing_balance'); ?></span>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Account details:</label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-group col-md-6"><label for="exampleInputEmail1">Label</label></div>
                                <div class="form-group col-md-6"><label for="exampleInputEmail1">Value</label></div>
                                <?php for ($i=0; $i < 6 ; $i++) { ?>
                                    
                                <div class="form-group col-md-6">
                                    <input name="account_details[<?php echo $i;?>]['label']" placeholder="" type="text" class="form-control"  value="" />
                                   
                                </div>
                                <div class="form-group col-md-6">
                                    <input name="account_details[<?php echo $i;?>]['value']" placeholder="" type="text" class="form-control"  value="" />
                                </div>
                                <?php }?>

                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Note</label>
                                <textarea class="form-control" placeholder="Note" rows="4" name="note" cols="50" id="note"></textarea>
                                <span class="text-danger"><?php echo form_error('note'); ?></span>
                            </div>


                            <div class="clearfix"></div>
                            
                        </div><!-- /.box-body -->

                        <div class="box-footer">

                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>

            </div><!--/.col (right) -->

        </div>
        <div class="row">

            <div class="col-md-12">
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">


    $(document).ready(function () {



        $("#btnreset").click(function () {
            /* Single line Reset function executes on click of Reset Button */
            $("#form1")[0].reset();
        });

    });


</script>
<script>
    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });

    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/savemode.js"></script>