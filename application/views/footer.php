<?php if ($this->session->userdata('type') == 'Admin'): ?>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 10000);
    </script>

    <!--Nav bar notification-->
<script>
    $(document).ready(function(){
        get_requests();
        function get_requests() {
            $.ajax(
                {
                    type:"post",
                    url: "<?php echo base_url(); ?>adminController/getRequests",
                    success:function(response)
                    {
                        $("#desingationreq").text(response);
                        $.ajax(
                            {
                                type:"post",
                                url: "<?php echo base_url(); ?>adminController/getAdminEvents",
                                success:function(response)
                                {
                                    $("#event_messages").text(response);
                                    $.ajax(
                                        {
                                            type:"post",
                                            url: "<?php echo base_url(); ?>adminController/getAdminMessages",
                                            success:function(response)
                                            {
                                                $("#admin_messages").text(response);
                                                $.ajax(
                                                    {
                                                        type:"post",
                                                        url: "<?php echo base_url(); ?>adminController/getTotalMessages",
                                                        success:function(response)
                                                        {
                                                            $("#total_messages").text(response);
                                                            $.ajax(
                                                                {
                                                                    type:"post",
                                                                    url: "<?php echo base_url(); ?>users/getNoOfStudents",
                                                                    success:function(response)
                                                                    {
                                                                        $('#carddetails').html(response);


                                                                    }
                                                                });

                                                        }
                                                    });

                                            }
                                        });

                                }
                            });

                    }
                });








        }



    });

</script>
<?php endif; ?>
<footer class="sticky-footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2018</span>
        </div>
    </div>
</footer>