<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> <?php echo $this->lang->line('library'); ?></h1>
    </section>


    <section class="content">
        <div class="row">

            <!-- left column -->
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="box box-primary" id="bklist">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">Chart Of Accounts</h3><div class="pull-right">
                            <?php if ($this->rbac->hasPrivilege('accounttype', 'can_add')) {
                                ?>
                                <a href="<?php echo base_url() ?>admin/accounttype">
                                    <button class="btn btn-primary btn-sm" autocomplete="off"><i class="fa fa-plus"></i> Add Account Type</button>
                                </a>
                            <?php }
                            ?>
                            <?php if ($this->rbac->hasPrivilege('accounts', 'can_add')) {
                                ?>
                                <a href="<?php echo base_url() ?>admin/account">
                                    <button class="btn btn-primary btn-sm" autocomplete="off"><i class="fa fa-plus"></i> Add Account</button>
                                </a>
                            <?php }
                            ?>

                        </div><!-- /.pull-right -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="mailbox-controls">
                            <!-- Check all button -->

                        </div>
                        <div class="mailbox-messages table-responsive">
                            <div class="download_label">Chart Of Accounts</div>
                            <table id="" class="table table-striped table-bordered table-hover example" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Account Type</th>
                                        <th>Account Sub Type</th>
                                        <th>Account Number</th>
                                        <th>Opening Balance</th>
                                        <th>Closing Balance</th>
                                        <th>Account Details</th>
                                        <th>Added By</th>
                                        <th class="no-print text text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    if (!empty($accountslist)) {
                                        foreach ($accountslist as $listaccount) {

                                            if($listaccount['account_type_id'] > 0){

                                                if($listaccount['parent_account_type_id'] == 0){
                                                    $parent_account_type  = $listaccount['name'];
                                                    $sub_account_type  = '';
                                                }else {
                                                    $sub_account_type  = $listaccount['name'];
                                                    $parent_account_type = $this->account_model->checkIsParentExist($listaccount['parent_account_type_id']) ;
                                                }
                                                
                                            }

                                            ?>
                                            <tr>
                                                <td class="mailbox-name"><?php echo $listaccount['account_title']?></td>
                                                <td class="mailbox-name"><?php echo $parent_account_type;?></td>
                                                <td class="mailbox-name"><?php echo $sub_account_type;?></td>
                                                <td class="mailbox-name"><?php echo $listaccount['account_number']?></td>
                                                <td class="mailbox-name">Rs.<?php echo number_format($listaccount['opening_balance'], 2);?></td>
                                                <td class="mailbox-name">Rs.<?php echo number_format($listaccount['closing_balance'], 2);?></td>
                                                <td class="mailbox-name"></td>
                                                <td class="mailbox-name"><?php echo $addedby;?></td>
                                                
                                                <td class="mailbox-date no-print text text-right">
                                                    <?php if ($this->rbac->hasPrivilege('accounts', 'can_edit')) { ?> 
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/account/edit/<?php echo $listaccount['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    <?php }if ($this->rbac->hasPrivilege('accounts', 'can_delete')) { ?> 
                                                        <!-- <a data-placement="left" href="<?php echo base_url(); ?>admin/account/delete/<?php echo $listaccount['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                            <i class="fa fa-remove"></i>
                                                        </a> -->
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $count++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <div class="pull-right">
                            </div><!-- /.pull-right -->
                        </div>
                    </div>
                </div>
            </div><!--/.col (left) -->
            <!-- right column -->
        </div>
        <div class="row">
            <!-- left column -->
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <!-- general form elements disabled -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function () {
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#postdate').datepicker({
            // format: "dd-mm-yyyy",
            format: date_format,
            autoclose: true
        });
        $("#btnreset").click(function () {
            /* Single line Reset function executes on click of Reset Button */
            $("#form1")[0].reset();
        });

    });
</script>



<script type="text/javascript">
    var base_url = '<?php echo base_url() ?>';
    function Popup(data)
    {

        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({"position": "absolute", "top": "-1000000px"});
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/bootstrap/css/bootstrap.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/font-awesome.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/ionicons.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/AdminLTE.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/skins/_all-skins.min.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/iCheck/flat/blue.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/morris/morris.css">');


        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/datepicker/datepicker3.css">');
        frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/daterangepicker/daterangepicker-bs3.css">');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);


        return true;
    }


    $("#print_div").click(function () {
        Popup($('#bklist').html());
    });


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