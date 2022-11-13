


            </div>
        </div>
    </div>


     <!--Basic Scripts-->
<script src="<?=base_url()  ?>assets/js/jquery.min.js"></script>
<script src="<?=base_url()  ?>assets/js/jquery-2.0.3.min.js"></script>
<script src="<?=base_url()  ?>assets/js/bootstrap.min.js"></script>
  
<!--Beyond Scripts-->
<script src="<?=base_url()?>assets/js/beyond.js"></script>
<script src="<?=base_url()?>assets/js/select2/select2.js"></script>
<script src="<?=base_url()  ?>assets/js/slimscroll/jquery.slimscroll.min.js"></script>

<script>
    $(".select_cls").select2();
    $("#e1").select2();
        $("#e2").select2({
            placeholder: " Select a Service",
            allowClear: true
        });
</script>



<script src="<?=base_url()?>assets/js/datetime/bootstrap-datepicker.js"></script>

<script>
    //--Bootstrap Date Picker--
    $('.date-picker').datepicker();

</script>

 <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 3000);

    </script>

</body>
<!--  /Body -->
</html>
