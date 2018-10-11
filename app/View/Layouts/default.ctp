<!--
*
*  INSPINIA - Responsive Admin Theme
*  version 2.7
*
-->

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php //echo $company_name; ?></title>
    <?php  echo $this->Html->css('../admin/css/bootstrap.min.css'); ?>
    <?php  echo $this->Html->css('../admin/css/metisMenu.min.css'); ?>
    <?php  echo $this->Html->css('../admin/css/timeline.css'); ?>
    <?php  echo $this->Html->css('../admin/css/startmin.css'); ?>
    <?php  echo $this->Html->css('../admin/css/morris.css'); ?>
    
    <!-- Toastr style -->
    <?php  echo $this->Html->css('../admin/css/plugins/toastr/toastr.min.css'); ?>
    <?php  echo $this->Html->css('../admin/css/font-awesome.min.css'); ?>
    <?php  echo $this->Html->css('../admin/css/style.css'); ?>
    <?php  echo $this->Html->css('theme.css'); ?>
    <?php  echo $this->Html->css('../admin/css/animate.css'); ?>

</head>

<body>
    <div id="wrapper">
        <?php echo $this->element('backend_sidemenu'); ?>

        <?php echo $this->fetch('content'); ?>

    </div>
    <?php echo $this->element('sql_dump'); ?>
<?php echo $this->element('footer'); ?>

</body>
</html>
