
<?php include(APPPATH.'views/common/header.php'); ?>
<?php $home=1; ?>

                    



<!--chart dashboard start-->
<div id="chart-dashboard">
<!-- BAR CHART FOR SECTORS-->

<div <?php if($this->session->userdata['logged_in']['role'] == 5 || $this->session->userdata['logged_in']['role'] == 6 ): ?> style="display:none" <?php endif; ?> class="row">
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="section">
                <div class="row">
                    <div id="flot-stacking-chart" class="section">
                        <h4 class="chart-title black-text" style="padding-left: 10px;"><strong>Chapter Wise Data</strong></h4>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="sample-chart-wrapper">
                                    <canvas id="canvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <?php 
                $complete = 0;
                $incomplete = 0;
                $inprogress = 0;
                $total = 0;

                foreach($actions['sectorData'] as $key => $value): 
                    $complete += $value['complete'];
                    $incomplete += $value['Incomplete'];
                    $inprogress += $value['Inprogress'];
                    $total += $value['total_count'];
                 endforeach; 
                 ?>
                <div class="row center">
                    <p><strong>Complete : <?php echo $complete; ?> | Incomplete : <?php echo $incomplete; ?></strong></p>
                    <p><strong>In Progress : <?php echo $inprogress; ?> | Total : <?php echo $total; ?></strong></p>
                </div>    

            </div>

        </div>
    </div>
</div>
            


</div>

<div class="divider"></div>

<!--Stacking Chart-->


<!--CARDS FOR SECTORS-->
<div <?php if($this->session->userdata['logged_in']['role'] == 5 || $this->session->userdata['logged_in']['role'] == 6): ?> style="display:none" <?php endif; ?> class="row">
    <div class="col s12 m12 l12">
        <?php foreach($actions['sectorData'] as $key => $value): ?>
            <div class="col s12 m6 l3">
                <div class="card center">
                    <div class="card-content blue white-text ">
                        <h4 class="card-stats-number"><a href="<?php echo base_url()."index.php/Actions/index/0/".$value['id']; ?>" style="text-decoration: none; color: white;"><?php echo $value['short']; ?></a></h4>
                        <p class="card-stats-compare">Complete <?php echo $value['complete']; ?>&nbsp;&nbsp;&nbsp; Incomplete <?php echo $value['Incomplete']; ?> <br /> In Progress <?php echo $value['total_count'] - ($value['complete'] + $value['Incomplete']); ?>&nbsp;&nbsp;&nbsp; Total <?php echo $value['total_count']; ?></p>
                        <p class="card-stats-compare"><a style="color:white;" href="<?php echo base_url().$value['attachments'];?>" download><u>PDF FILE</u></a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
                   
<!--chart dashboard end-->


<!-- BAR CHART FOR AGENCIES -->
<div class="row" <?php if($this->session->userdata['logged_in']['role'] == 3 || $this->session->userdata['logged_in']['role'] == 6): ?> style="display:none" <?php endif; ?>>
    <!-- <div class="col s12 m12 l12">
        <div class="card">
            <div id="chartjs-bar-chart" class="section cyan darken-1">
              <h4 class="chart-title white-text" style="padding-left: 10px;">Agencies Wise Data</h4>
                <div class="row">
                    <div class="col s12 m12 l12">
                      <div class="sample-chart-wrapper">
                        <canvas id="bar-chart-sample1" height="120"></canvas>
                      </div>
                    </div>
                </div>    
            </div>

        </div>
        <div class="card-content">
            <div class="col s12 m2 l2">
                <ul class="doughnut-chart-legend">
                    <li class="mobile ultra-small"><span class="legend-color"></span>Incomplete</li>
                    <li class="kitchen ultra-small"><span class="legend-color"></span>Complete</li>
                </ul>
            </div>
        </div>
    </div> -->
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="section">
                <div class="row">
                    <div id="flot-stacking-chart" class="section">
                        <h4 class="chart-title black-text" style="padding-left: 10px;"><strong>Agency Wise Data</strong></h4>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="sample-chart-wrapper">
                                    <canvas id="canvas2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 
                $complete_ag = 0;
                $incomplete_ag = 0;
                $inprogress_ag = 0;
                $total_ag = 0;

                foreach($actions['agencyData'] as $key => $value): 
                    $complete_ag += $value['complete'];
                    $incomplete_ag += $value['Incomplete'];
                    $inprogress_ag += $value['Inprogress'];
                    $total_ag += $value['total_count'];
                 endforeach; 
                 ?>
                <div class="row center">
                    <p><strong>Complete : <?php echo $complete_ag; ?> | Incomplete : <?php echo $incomplete_ag; ?></strong></p>
                    <p><strong>In Progress : <?php echo $inprogress_ag; ?> | Total : <?php echo $total_ag; ?></strong></p>
                </div>   

            </div>

        </div>
    </div>

</div>

<!--DISTRICT WISE GRAPH-->

<div class="row" <?php if($this->session->userdata['logged_in']['role'] == 3 || $this->session->userdata['logged_in']['role'] == 4): ?> style="display:none" <?php endif; ?>>
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="section">
                <div class="row">
                    <div id="flot-stacking-chart" class="section">
                        <h4 class="chart-title black-text" style="padding-left: 10px;"><strong>District Wise Data</strong></h4>
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="sample-chart-wrapper">
                                    <canvas id="canvas3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 
                $complete_ag = 0;
                $incomplete_ag = 0;
                $inprogress_ag = 0;
                $total_ag = 0;

                foreach($actions['districtData'] as $key => $value): 
                    $complete_ag += $value['complete'];
                    $incomplete_ag += $value['Incomplete'];
                    $inprogress_ag += $value['Inprogress'];
                    $total_ag += $value['total_count'];
                 endforeach; 
                 ?>
                <div class="row center">
                    <p><strong>Complete : <?php echo $complete_ag; ?> | Incomplete : <?php echo $incomplete_ag; ?></strong></p>
                    <p><strong>In Progress : <?php echo $inprogress_ag; ?> | Total : <?php echo $total_ag; ?></strong></p>
                </div>   

            </div>

        </div>
    </div>
</div>

<!--DISTRICT WISE GRAPH ENDS HERE-->

<!--CARDS FOR AGENCIES-->
<div class="row" <?php if($this->session->userdata['logged_in']['role'] == 3 || $this->session->userdata['logged_in']['role'] == 6): ?> style="display:none" <?php endif; ?>>
    <div class="col s12 m12 l12">
        <?php foreach($actions['agencyData'] as $key => $value): ?>
        <div class="col s12 m6 l3">
            
            <div class="card center">
                <div class="card-content blue white-text ">
                    <!-- <p class="card-stats-title"><i class="mdi-action-trending-up"></i> Today Profit</p> -->
                    <h4 class="card-stats-number"><?php echo $value['short']; ?></h4>
                    <p class="card-stats-compare">complete <?php echo $value['complete']; ?>&nbsp;&nbsp;&nbsp; Incomplete <?php echo $value['Incomplete']; ?> <br /> In Progress <?php echo $value['total_count'] - ($value['complete'] + $value['Incomplete']); ?>&nbsp;&nbsp;&nbsp; Total <?php echo $value['total_count']; ?></p>
                </div>
            </div>
            
        </div>
        <?php endforeach; ?>

    </div>

</div>

</div>

<!--tab starts here-->
<div class="divider"></div> 

<div class="row" <?php if($this->session->userdata['logged_in']['role'] == 6): ?> style="display:none" <?php endif; ?>>

    <div class="col s12 m12 l12">
        <div class="card">
            <div id="using-color">
                <h4 class="header">Objectives Of Chapters</h4>
                <div class="row">
                    <div class="col s12 m4 l3">
                        <p>SESP OBJECTIVES, STRATEGIES, TARGETS AND ACTIVITIES</p>
                    </div>

                    <div class="col s12 m8 l9">
                
                        <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                            <?php foreach($actions['sectorData'] as $key => $value): ?>
                            <li>
                                <div class="collapsible-header light-blue light-blue-text text-lighten-5"><?php echo $value['short']; ?></div>
                                <div class="collapsible-body light-blue lighten-5" id="info">
                                    <p><?php echo $value['objectives']; ?></p>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                 </div>
            </div>
        </div>
    </div>

</div>



<?php include(APPPATH.'views/common/footer.php');?>


<script type="text/javascript">

$(document).ready(function(){
    //Sectors
    var labelArr = [];
    var complete = [];
    var incomplete = [];
    var inprogress = [];

    //Agencies
    var labelArrAg = [];
    var completeAg = [];
    var incompleteAg = [];
    var inprogressAg = [];

    //District wise
    var labelArrDistrict = [];
    var completeArrDistrict = [];
    var incompleteArrDistrict = [];
    var inprogressArrDistrict = [];

    //SECTORS
    $.ajax({
        url: "<?php echo base_url(); ?>index.php/Dashboards/dataForAjaxCalls",
        contentType: "application/json; charset=utf-8",
        cache: true,
        dataType: "json",
        success: function(result){
          $.each(result.sectorData, function(k, v) {
                
                labelArr.push(v.short);
                complete.push(parseInt(v.complete));
                incomplete.push(parseInt(v.Incomplete));
                inprogress.push(parseInt(v.Inprogress));
            });

          $.each(result.agencyData, function(k, v) {
            
                labelArrAg.push(v.short);
                completeAg.push(parseInt(v.complete));
                incompleteAg.push(parseInt(v.Incomplete));
                inprogressAg.push(parseInt(v.Inprogress));
            });

          $.each(result.districtData, function(k, v) {
               
                labelArrDistrict.push(v.district_name);
                completeArrDistrict.push(parseInt(v.complete));
                incompleteArrDistrict.push(parseInt(v.Incomplete));
                inprogressArrDistrict.push(parseInt(v.Inprogress));
            });
        }
    });


    //Sectors
    var barChartData = {
            labels: labelArr,
            datasets: [{
                label: 'Complete',
                backgroundColor: window.chartColors.green,
                data: complete
                
            }, {
                label: 'Incomplete',
                backgroundColor: 'rgb(255, 140, 26)',
                data: incomplete
            }, {
                label: 'In Progress',
                backgroundColor: 'rgb(77, 148, 255)',
                data: inprogress
            }]
        };

    //Agencies
    var barChartData2 = {
            labels: labelArrAg,
            datasets: [{
                label: 'Complete',
                backgroundColor: window.chartColors.green,
                data: completeAg
                
            }, {
                label: 'Incomplete',
                backgroundColor: 'rgb(255, 140, 26)',
                data: incompleteAg
            }, {
                label: 'In Progress',
                backgroundColor: 'rgb(77, 148, 255)',
                data: inprogressAg
            }]
        };

    //district wise
    var barChartData3 = {
            labels: labelArrDistrict,
            datasets: [{
                label: 'Complete',
                backgroundColor: window.chartColors.green,
                data: completeArrDistrict
                
            }, {
                label: 'Incomplete',
                backgroundColor: 'rgb(255, 140, 26)',
                data: incompleteArrDistrict
            }, {
                label: 'In Progress',
                backgroundColor: 'rgb(77, 148, 255)',
                data: inprogressArrDistrict
            }]
        };


    window.onload = function() {

        var ctxOne = document.getElementById("canvas").getContext("2d");

        window.canvas = new Chart(ctxOne, {
            type: 'bar',
            data: barChartData,
            options: {
                title:{
                    display:true,
                    text:"CHAPTER WISE DATA",
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });

        var ctxTwo = document.getElementById("canvas2").getContext("2d");
        window.canvas2 = new Chart(ctxTwo, {
            type: 'bar',
            data: barChartData2,
            options: {
                title:{
                    display:true,
                    text:"AGENCIES WISE DATA",
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });

        var ctxThree = document.getElementById("canvas3").getContext("2d");
        window.canvas3 = new Chart(ctxThree, {
            type: 'bar',
            data: barChartData3,
            options: {
                title:{
                    display:true,
                    text:"DISTRICT WISE DATA",
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });

        setInterval(
            function(){
                window.canvas.update();
                window.canvas2.update();
                window.canvas3.update();
            }, 1000);
    };

    });

</script>