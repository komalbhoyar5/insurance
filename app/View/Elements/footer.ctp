<?php

    echo $this->Html->script('../admin/js/jquery.min.js'); 
    echo $this->Html->script('../admin/js/bootstrap.min.js'); 
    echo $this->Html->script('../admin/js/metisMenu.min.js'); 
    echo $this->Html->script('../admin/js/raphael.min.js'); 


    echo $this->Html->script('../admin/js/startmin.js'); 

    echo $this->Html->script('../admin/js/plugins/toastr/toastr.min.js'); 

?>

    <!-- flash messages template -->
        <?php 
        $fail = $this->Session->flash('fail');
        $success = $this->Session->flash('success');
         if ($fail !="") { ?>
                <script>
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.error("<?php echo $fail; ?>", 'Failed');

                    }, 1300);
                </script>
        <?php } ?>
        <?php if ($success !="") { ?>
                <script>
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.success("<?php echo $success; ?>", 'success');

                    }, 1300);
                </script>
        <?php } ?>
    <!-- flash messages template -->
    <script>
        $(function(){
        var url = window.location;
        $('.sidebar li').removeClass('active');
        var element = $('.sidebar li a').filter(function() {
            return this.href == url;
        }).parent().addClass('active'); 
            element.parent().parent('li').addClass('active');
            element.parent('ul').addClass('in');
    });
    </script>