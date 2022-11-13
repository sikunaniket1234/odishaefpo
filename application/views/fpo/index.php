<?php
   include ('inc/metaheader.php');  
   include ('inc/head2.php');   
?>
<style type="text/css">
    #canvas-holder h2{
        position:absolute; z-index: 99999; 
                            top:50%; line-height: 10px; text-align: center;
                            font-size: 22px; margin-left: -24px; margin-top: -12px;
                            font-weight: bold; left:50%; margin-bottom: 0; padding-bottom: 0; margin-bottom: 0;
    }
    #canvas-holder h2 span{
        font-size:12px; line-height: 9px; text-align: center; font-weight: bold;
    }
</style>
<div class="page-body" style="background-color:#252d9de0"> 
    <div class="row dashclass">
         
            <div class="col-md-6 welcomebox" style="min-height: 210px;" >
                <!-- <img src="<?=base_url() ?>decore-left.png"  /> -->
                <div class="avatar">
                    <div class="avatar-content">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                    </div>
                </div>               
                <div class="col-md-12" style="color: white;"> 
                      <h1>Hey <?=$myinfo->name  ?>!<br>
                      <span style="font-size: 16px; font-weight: normal; line-height: 10px !important; ">
                      Thanks for stepping in. <br />
                      Last login: <span style="border:1px dashed #ccc; padding:2px 10px; "><?=date('d M Y h:i A')  ?></span><br>
                       
                    </h1>
                    <br>  
                </div>
            </div>
            
           



              
    </div>  
    
    <div class="row">
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">NO. OF SHARE HOLDER</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">10</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">BANK BALANCE</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">15</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">SHARE CAPITAL AMOUNT</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">05</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">INFRASTRUCTURE OF FPO</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">13</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">SUSTAINANCE FUND</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">11</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">ANNUAL TURNOVER</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">19</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">NO OF AGENCY</span>
                  <hr class="title-devider">
                  <div class="plan-body">
                      <div class="plan-currency" style="display:none">$</div>
                      <div class="plan-price">07</div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-sm-4 col-xs-12">
              <div class="plan-circular">
                  <span class="plan-title">LOAN AVAILED/EMI</span>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js'></script>

 

<script type="text/javascript"> 
    var horizontalBarChart = new Chart(barChart, {
       type: 'horizontalBar',
       data: {
          labels: ["Label 1", "Label 2", "Label 3", "Label 4"],
          datasets: [{
             data: [2000, 4000, 6000, 8000],
             backgroundColor: ["#73BFB8", "#73BFB8", "#73BFB8", "#73BFB8"], 
          }]
       },
       options: {
          tooltips: {
            enabled: false
          },
          responsive: true,
          legend: {
             display: false,
             position: 'bottom',
             fullWidth: true,
             labels: {
               boxWidth: 10,
               padding: 150
             }
          },
          scales: {
             yAxes: [{
               barPercentage: 0.75,
               gridLines: {
                 display: true,
                 drawTicks: true,
                 drawOnChartArea: false
               },
               ticks: {
                 fontColor: '#555759',
                 fontFamily: 'Lato',
                 fontSize: 11
               }
                
             }],
             xAxes: [{
                 gridLines: {
                   display: true,
                   drawTicks: false,
                   tickMarkLength: 5,
                   drawBorder: false
                 },
               ticks: {
                 padding: 5,
                 beginAtZero: true,
                 fontColor: '#555759',
                 fontFamily: 'Lato',
                 fontSize: 11,
                 callback: function(label, index, labels) {
                  return label/1000;
                 }
                   
               },
                scaleLabel: {
                  display: false,
                  padding: 10,
                  fontFamily: 'Lato',
                  fontColor: '#555759',
                  fontSize: 16,
                  fontStyle: 700,
                  labelString: 'Scale Label'
                },
               
             }]
          }
       }
    });
</script>



<script type="text/javascript"> 
    var config = {
        type: 'doughnut',
        data: {
            datasets: [
                {
                    data: [
                        20,30,
                    ],
                        backgroundColor: [
                        "#ccc",
                        "#0762a7",
                    ]
                },  
            ],
            labels: ['Un Answered','Answered','Un Answered','Right','Wrong']
        },
        

        options: {
            aspectRatio: 1,
            responsive: true,
            legend: {
                 display: false
              }
        }
    };
    var ctx = document.getElementById("chart-area").getContext("2d");
    var myDoughnut = new Chart(ctx, config);
</script>



