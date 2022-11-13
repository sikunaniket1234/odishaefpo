<?php
   include ('inc/metaheader.php');  
   include ('inc/head2.php');


?>


<div class="page-body">

  <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: none;">

          <div class="databox databox-lg databox-inverted radius-bordered databox-shadowed databox-graded databox-vertical">
            <div class="databox-top no-padding1 bg-sky white text-left">
                <h4><?php greetings(); ?> </h4>
                <img src="<?=base_url().'uploads/'.$settings->company_logo;?>" height="50"> 
                <!-- <img src="<?=base_url()?>/assets/img/adminlogo.png" height="50">                    -->
            </div>
            <div class="databox-bottom no-padding bordered-thick bordered-orange" >
                <div class="databox-row" style="display:none">
                    <div class="databox-cell cell-3 no-padding text-align-center bordered-right bordered-platinum">
                        <span class="databox-number lightcarbon no-margin">120</span>
                        <span class="databox-text sonic-silver  no-margin">Reviews</span>
                    </div>
                    <div class="databox-cell cell-3 no-padding text-align-center bordered-right bordered-platinum">
                        <span class="databox-number lightcarbon no-margin">12</span>
                        <span class="databox-text sonic-silver no-margin">Blog / Posts</span>
                    </div>
                    <div class="databox-cell cell-3 no-padding text-align-center bordered-right bordered-platinum">
                        <span class="databox-number lightcarbon no-margin">20</span>
                        <span class="databox-text sonic-silver no-margin">Newsletter Subscribed.</span>
                    </div>
                    <div class="databox-cell cell-3 no-padding text-align-center">
                        <span class="databox-number lightcarbon no-margin">5</span>
                        <span class="databox-text sonic-silver no-margin">FAQ</span>
                    </div>
                </div>
            </div>
          </div>
        </div>

       <!--  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          
        </div>  -->      

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="display:none">
            <div class="orders-container">
                <div class="orders-header">
                    <h6>Recent Newsletter Subscribed.</h6>
                </div>
                <ul class="orders-list">
                  <?php
                      if ($newsletter) {
                        $i=0;
                        foreach($newsletter as $r){
                          $i++;
                          ?>

                            <li class="order-item">
                              <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item-left">
                                      <div class="item-booker"><?= $r->email;  ?></div>
                                      <!-- <div class="item-time">
                                          <i class="fa fa-calendar"></i>
                                          <span>10 minutes ago</span>
                                      </div> -->
                                  </div>
                                  
                              </div>
                              <a class="item-more" href="">
                                  <i></i>
                              </a>
                            </li>
                          <?php
                        }
                      }
                      else{
                        ?>
                          <li class="order-item">
                              Record not found.
                          </li>                              
                        <?php
                      }
                    ?>
                </ul>
                <div class="orders-footer">
                    <a class="show-all" href="<?=base_url('admin/newsletter');?>"><i class="fa fa-angle-down"></i> Show All</a>
                    
                </div>
            </div>
        </div>
    </div>   
    
    <div class="row" style="background-color:#252d9de0">
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">TOTAL NO OF NGO/POPI</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">10</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">TOTAL NO OF FPO</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">15</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">NO OF COMPANY</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">05</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">NO OF TRUST</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">13</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">TOTAL NO OF SHARE HOLDER</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">11</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">NO. OF CREDIT LINKAGE</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">19</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">STATUS OF ROC FILLING</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">07</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">NO.OF SF/MF</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">17</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">NO.OF SHAREHOLDER (SC)</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">11</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">NO.OF SHAREHOLDER (ST)</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">19</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">NO.OF SHAREHOLDER (WOMEN)</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">07</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">NABFPO UPDATE</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">17</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">AMOUNT SANCTIONED</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">11</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">AMOUNT RELEASED</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">19</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">EQUITY</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">07</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">TURNOVER</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">17</div>
                  </div>
              </div>
          </div>
      </div>  


</div>




<?php
  include 'inc/footer-js.php';
?>

