<!-- start  Footer --> 
<footer style="background-color:#000;">
    <div class="container" >
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="<?=base_url()  ?>">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="<?=base_url()  ?>about">About</a>
              </li>
              <li class="list-inline-item">
                <a href="<?=base_url()  ?>gallery">Gallery</a>
              </li>
              
              <li class="list-inline-item">
                <a href="<?=base_url()  ?>contact">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">Nabard </span>All Rights Reserved.
            </p>
          </div>
          <div class="credits">
           
           
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>
  
<!-- Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <script src="<?=base_url()  ?>frontassets/fancybox/js/jquery.fancybox.min.js"></script>
    <script src="<?=base_url()  ?>frontassets/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?=base_url()  ?>frontassets/counterup/counterup.min.js"></script>
    <script src="<?=base_url()  ?>frontassets/js/owl.carousel.min.js"></script>
<script src="<?=base_url()  ?>frontassets/js/owl.carousel.js"></script>
    
     <!-- Main JS File -->
  <script src="<?=base_url()  ?>frontassets/js/main.js"></script>

<script>
    $('.editorinline').each(function(e){
        CKEDITOR.inline(this.id);
    });
    function ClickToSave (ids,ed_id) {
        
        
        var data = CKEDITOR.instances[ids].getData();
         $.ajax(
               {
                 type: 'POST',   
                 url: '<?=base_url()  ?>admin/update_content',       
                 data: {
                    'ed_id': ed_id,
                    'content': data
                },
                 success: function(html)
                 {  
                     if(html != '')    
                     {  
                        alert('Status: '+html);
                     } 
                     else
                     {
                        alert('failed to update.');                    
                     }        
                 },    
        });
    }
</script>



</body>
</html>