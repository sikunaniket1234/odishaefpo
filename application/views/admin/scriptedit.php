<?php
   include 'inc/metaheader.php'; 
   include ('inc/head2.php');  
?>

<style>
.dyna{
  margin-top:10px; padding-bottom:30px;
}
.dyna li{
  margin-bottom:5px;
}
#tabs-1{
   padding-bottom:50px;
  overflow-y:scroll;
}

#tabs-2{
   padding-bottom:50px;
  overflow-y:scroll;
}
</style>

<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
   



      <div class="page-body">
        <div class="row">
            <div class="col-md-9">
                <form class="form-horizontal" role="form" method="post">
                  <?php include('p1.php'); ?>

                      <div name="vvvvvvv" id="editor"  contenteditable="true">
                          <h1>Inline Editing in Action!</h1>
                          <p>The "div" element that contains this text is now editable.</p>
                      </div>




                  <p style="font-size: 12px;"><?=nl2br($cmn->nsw_tnc)  ?></p>
                  <?php include('p2.php'); ?>

                    <button id="submitz" class="btn btn-success" onclick='ClickToSave()'  >GO</button>
                </form>
            </div>
            <div class="col-md-3">
                  <section class="panel" style="height:380px; overflow-y:scroll;">
                    <h2>Dymic Items</h2>
                          <ul class="dyna">
                              <?php
                              foreach($dynafld as $dff){
                                
                              ?>
                              <li> <span class="btn btn-success dynabtn" value="<?=$dff->df_f_name  ?>" ><?=$dff->df_name  ?></span></li>
                              <?php
                              }
                              ?>
                          </ul>
                  </section>
            </div>




      </div>
     

<?php
      include 'inc/footer-js.php';  
?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
 <script>



 jQuery(function () {
    jQuery('#myTab a:first').tab('show')
})
 
 
$(".dynabtn").click(function(){
   var dd = ' '+ $(this).attr("value")+' ';
   CKEDITOR.instances['editor'].insertText(dd);
});
/*CKEDITOR.instances['editor'].on('change', function() { 
  alert('xchfgh');
    var data = CKEDITOR.instances['editor'].getData();
    //alert('xcghdfh'+data);
    console.log(data);
});*/


function ClickToSave () {
    var data = CKEDITOR.instances['editor'].getData();
    alert('xcghdfh'+data);
    
}

$(".dynafbtn").click(function(){
   var ddm = $(this).attr("value");
   var ttl = $(this).attr("ttl");
     var lnk = ' <a href="'+ddm+'">'+ttl+'</a> '
   CKEDITOR.instances['editor'].insertHtml(lnk);
});





                
        //CKEDITOR.replace( 'editor' );
        CKEDITOR.inline( 'editor', {
          uiColor: '#f1f1f1',
          removeButtons: ('About')
        });
            </script> 