

<?php require 'webcomponents/admin-header.php'; ?>
<?php require 'webcomponents/admin-sidebar.php'; ?>
<?php
ob_start();

if(!isset($_SESSION['user_role']) && !isset($_SESSION['account_type'])) {
	header ("Location:../index.php");
  exit();
}

?>
<?php include 'admin-queries/dashboard-queries.php'; ?>
	<div class="side-app">
						<!--  <div class ="jumbotron"> -->
						 		<div class="page-header">
						 			<h4 class="page-title">Dashboard</h4>
						 			<ol class="breadcrumb">
						 				<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						 				<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
						 			</ol>
						 		</div>
						 <div class="row">
						 	<div class="col-sm-12 col-lg-4">
						 		<div class="card overflow-hidden">
						 			<div class="card-header">
						 				<h3 class="card-title">Published Posts</h3>
						 				<div class="card-options"> <a class="btn btn-sm btn-primary" href="all-posts.php">View</a>
						 				</div>
						 			</div>
						 			<div class="card-body ">
						 				<small class="h6">Posts</small>
						 				<div class="text-dark count mt-0 font-30"><?php echo $publishedpost_count; ?>&nbsp;<i class="fa  fa-file-text-o"></i> </div>
						 				<div class="progress">
										  <div class="progress-bar progress-sm bg-success progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $PPperInc; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php if($PPperInc >0 || $PPperInc ==0){echo $PPperInc; }else{
										  	echo (-($PPperInc));
										  }?>%">
										    <span class="sr-only"><?php if($PPperInc >0 || $PPperInc ==0){echo $PPperInc; }else{
										  	echo (-($PPperInc));
										  }?>% Complete</span>
										  </div>
										</div>
 										<div class=""><?php if($PPperInc >0 || $PPperInc ==0){echo '<i class="fa fa-caret-up text-green">'; }elseif($PPperInc <0){
										  	echo '<i class="fa fa-caret-down text-danger">';
										  }?></i><?php if($PPperInc >0 || $PPperInc ==0){echo $PPperInc."% increase from last Month"; }else{
										  	echo (-($PPperInc))."% decrease from last Month";
										  }?></div>
 									</div>
 								</div>
 							</div>
 							<div class="col-sm-12 col-lg-4">
 								<div class="card overflow-hidden">
 									<div class="card-header">
 										<h3 class="card-title">Draft Posts</h3>
 										<div class="card-options">
 											<a class="btn btn-sm btn-primary" href="all-posts.php">View</a> </div> </div> <div class="card-body "> <small class="h6">Posts</small> <div class="text-dark count mt-0 font-30"><?php echo $draftpost_count; ?>&nbsp;<i class="fa  fa-file-text-o"></i> </div>
 											<div class="progress">
											  <div class="progress-bar progress-sm bg-warning progress-bar-striped" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:<?php if($DPperInc >0 || $DPperInc ==0){echo $DPperInc; }else{
										  	echo (-($DPperInc));
										  }?>%">
										    <span class="sr-only"><?php if($DPperInc >0 || $DPperInc ==0){echo $DPperInc; }else{
										  	echo (-($DPperInc));
										  }?>% Complete</span>
										  </div>
										</div>
 										<div class=""><?php if($DPperInc >0 || $DPperInc ==0){echo '<i class="fa fa-caret-up text-green">'; }else{
										  	echo '<i class="fa fa-caret-down text-danger">';
										  }?></i><?php if($DPperInc >0 || $DPperInc ==0){echo $DPperInc."% increase from last Month"; }else{
										  	echo (-($DPperInc))."% decrease from last Month";
										  }?></div>
											</div>
										</div>
									</div>
								<div class="col-sm-12 col-lg-4">
									<div class="card overflow-hidden">
										<div class="card-header">
											<h3 class="card-title">Total Posts</h3>
											<div class="card-options"> <a class="btn btn-sm btn-primary" href="#">View</a> </div> </div> <div class="card-body "> <small class="h6">Posts</small> <div class="text-dark count mt-0 font-30"><?php echo $totalpost_count; ?>&nbsp;<i class="fa  fa-file-text-o"></i> </div> <div class="progress">
										  <div class="progress-bar progress-sm bg-primary progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:<?php if($TPperInc >0 || $TPperInc ==0){echo $TPperInc; }else{
										  	echo (-($TPperInc));
										  }?>%">
										    <span class="sr-only"><?php if($TPperInc >0 || $TPperInc ==0){echo $TPperInc; }else{
										  	echo (-($TPperInc));
										  }?>% Complete</span>
										  </div>
										</div>
 										<div class=""><?php if($TPperInc >0 || $TPperInc ==0){echo '<i class="fa fa-caret-up text-green">'; }else{
										  	echo '<i class="fa fa-caret-down text-danger">';
										  }?></i><?php if($TPperInc >0 || $TPperInc ==0){echo $TPperInc."% increase from last Month"; }else{
										  	echo (-($TPperInc))."% decrease from last Month";
										  }?></div> </div> </div> </div> </div>
								<!--		  <div class="card-body no-padding height-9">-->
								<!--	<div class="row">-->
								<!--		<canvas id="canvas1"></canvas>-->
								<!--	</div>-->
								<!--</div>-->
									<div class="row">
										<div class="col-lg-8 col-sm-12">
						 				<div class="card ">
						 					<div class="card-header">
						 						<h3 class="card-title">Posts Overview</h3>
						 						<!-- <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
						 						</div> -->
						 					</div>
						 					<div class="card-body">
						 						<div class="text-center"> <ul class="legend align-items-center "> <li> <span class="legend-dots bg-primary"></span>Posts<span class="ml-2 float-right"></span> </li> <li> <span class="legend-dots bg-warning"></span>% Increase/Decrease<span class="ml-2 float-right"></span> </li> </ul> </div> <div id="echart1"style="padding: 10px 0;overflow: scroll; overflow-y: hidden;" class="chartsh dropshadow">

						 						</div>
						 					</div>
						 				</div>
						 			</div>


						 			<div class="col-lg-4">
						 				<div class="card">
						 			<div class="card-header">
						 				<h3 class="card-title">Trashed Posts</h3>
						 				<div class="card-options"> <a href="posts-recyclebin.php" class="btn btn-danger btn-round btn-sm ">view</a>
						 				</div>
						 			</div>
						 			<div class="card-body ">
						 				<small class="h6">Posts</small>
						 				<div class="text-dark count mt-0 font-30"><?php echo $recycledpost_count; ?>&nbsp;<i class="fa  fa-file-text-o"></i> </div>
						 				<div class="progress">
										  <div class="progress-bar progress-sm bg-success progress-bar-striped" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:<?php if($RPperInc >0 || $RPperInc ==0){echo $RPperInc; }else{
										  	echo (-($RPperInc));
										  }?>%">
										    <span class="sr-only"><?php if($RPperInc >0 || $RPperInc ==0){echo $RPperInc; }else{
										  	echo (-($RPperInc));
										  }?>% Complete</span>
										  </div>
										</div>
 										<div class=""><?php if($RPperInc >0 || $RPperInc ==0){echo '<i class="fa fa-caret-up text-green">'; }else{
										  	echo '<i class="fa fa-caret-down text-danger">';
										  }?></i><?php if($RPperInc >0 || $RPperInc ==0){echo $RPperInc."% increase from last Month"; }else{
										  	echo (-($RPperInc))."% decrease from last Month";
										  }?></div>
 									<!-- </div>  -->
 								</div>
 							</div>
						 					 <div class="card"> <div class="card-body"> <div class="content-box"> <h5 class="mb-0 text-muted">Conversations</h5> <h4 class="mb-0 font-weight-normal"><?php echo $comment_count; ?></h4> <p class="text-green"><span class="text-muted"><i class="fa fa-caret-up text-green"></i> Increase</span> <?php echo $MCperInc; ?>%</p><a href="comments.php" class="btn btn-primary btn-round btn-sm">view more <?php echo $MCperInc; ?>%</a> </div> </div> </div> </div> </div>
						 						<div class="row">
	<div class="col-lg-4 col-sm-12">
		<div class="card"> <div class="card-body">
			<div class="row mb-0">


				<div class="col"> <h1 class="mb-1 font-weight-normal"><?php echo $onlineusers_count; ?>&nbsp;<i class="fa  fa-users"></i></h1> <h5 class="text-muted">Online users</h5> </div>
				<!-- <div class="col"> <span class="badge badge-success text-muted float-right text-white m-0"><i class="fa fa-chevron-circle-up"></i> 5%</span> <p class="text-muted float-right mr-2 mb-0 ">Increases</p></div>  -->
			</div>
		</div>
				<div class="chart-wrapper"> <span class="sparkline22 graph dropshadow"><canvas width="240" height="36" style="display: inline-block; width: 301.074px; height: 45px; vertical-align: top;"></canvas></span>
				</div>
			</div>
		</div>
				<div class="col-lg-4 col-sm-12">
					<div class="card"> <div class="card-body"> <div class="row mb-0"> <div class="col"> <h1 class="mb-1 font-weight-normal"><?php echo $users_count; ?>&nbsp;<i class="fa  fa-users"></i></h1> <h5 class="text-muted">Active Users</h5> </div> <div class="col"><span class="badge badge-success text-muted float-right text-white m-0"><i class="fa fa-chevron-circle-up"></i> <?php echo $MUperInc; ?>%</span> <p class="text-muted float-right mr-2 mb-0 ">Increase</p>
										</div> </div> </div> <div class="chart-wrapper"> <span class="sparkline22a graph  dropshadow"><canvas width="240" height="36" style="display: inline-block; width: 301.074px; height: 45px; vertical-align: top;"></canvas></span> </div> </div> </div>
				<div class="col-lg-4 col-sm-12">
					<div class="card">
						<div class="card-body"> <div class="row mb-0"> <div class="col"> <h1 class="mb-1 font-weight-normal"><?php echo $pendingusers_count; ?>&nbsp;<i class="fa  fa-users"></i></h1> <h5 class="text-muted">Pending Users</h5> </div> <div class="col"> <span class="badge badge-success text-muted float-right text-white m-0"><i class="fa fa-chevron-circle-up"></i> <?php echo $MPUperInc; ?>%</span> <p class="text-muted float-right mr-2 mb-0 ">Increases</p></div> </div> </div> <div class="chart-wrapper" style="overflow: scroll; overflow-y: hidden;"> <span class="sparkline22b graph  dropshadow"><canvas width="240" height="36" style="display: inline-block; width: 301.074px; height: 45px; vertical-align: top;"></canvas></span> </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-9"> <div class="card"> <div class="card-header"> <h3 class="card-title">Visitors Status</h3> <!-- <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div>  --></div> <div class="card-body">  <div id="main" style="width:auto;height:400px;overflow: scroll; overflow-y: hidden;"></div> </div> </div> </div> <div class="col-lg-3"> <div class="card"> <div class="card-body"> <div class="content-box"> <h5 class="mb-0 text-muted">Monthly Visitors</h5> <h4 class="mb-1 font-weight-normal"><?php echo $Mvisitors_count ?>&nbsp;<i class="fa  fa-eye"></i></h4> <p class="text-green"><span class="text-muted"><i class="fa fa-caret-up text-green"></i> Growth</span> <?php echo $visitorsInc; ?>%</p><a href="all-users.php" class="btn btn-success btn-round btn-sm ">view more</a> </div> </div> </div> <div class="card"> <div class="card-body"> <div class="content-box"> <h5 class="mb-0 text-muted">Traffic</h5> <h4 class="mb-0 font-weight-normal"><?php echo $visitors_count; ?>&nbsp;<i class="fa   fa-bar-chart-o"></i></h4> <!-- <p class="text-green"><span class="text-muted"><i class="fa fa-caret-up text-green"></i> Increase</span> 32%</p> --><a href="users-recyclebin.php" class="btn btn-primary btn-round btn-sm">view more</a> </div> </div> </div> <div class="card"> <div class="card-body"> <div class="content-box"> <h5 class="mb-0 text-muted">Deleted Users</h5> <h4 class="mb-0 font-weight-normal"><?php echo $deleteduser_count; ?></h4> <!-- <p class="text-green"><span class="text-muted"><i class="fa fa-caret-up text-green"></i> Increase</span> 32%</p> --><a href="users-recyclebin.php" class="btn btn-danger btn-round btn-sm">view Recyclebin</a> </div> </div> </div></div> </div>
	<div class="row">
		<div class="col-sm-12">
			<div class="card ">
				<div class="card-header">
				 <h3 class="card-title">Post Categories</h3>
				 <!-- <div class="card-options"> <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a> <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> </div> -->
				</div>
				<div class="card-body">
					<div class="text-center"> <ul class="legend align-items-center "> <li> <span class="legend-dots bg-primary"></span>Posts<span class="ml-2 float-right"></span> </li> <li> <span class="legend-dots bg-warning"></span>Engagements<span class="ml-2 float-right"></span> </li> </ul> </div> <div id="catchart1" class="chartsh dropshadow" style="width:auto; overflow: scroll; overflow-y: hidden;"></div> </div> </div> </div> </div>
	</div>

						 						<div class="row row-deck">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require 'webcomponents/admin-footer.php'; ?>
	<?php require 'webcomponents/admin-js.php';?>
 <script type="text/javascript">
 $(function(e){
  'use strict'
//   var barChartData = {
//         labels: ["January", "February", "March", "April", "May", "June", "July"],
//         datasets: [{
//             type: 'bar',
//             label: 'Dataset 1',
//             backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
//             borderColor: window.chartColors.red,
//             data: [
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor()
//             ]
//         }, {
//             type: 'line',
//             label: 'Dataset 2',
//             backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
//             borderColor: window.chartColors.blue,
//             data: [
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor()
//             ]
//         }, {
//             type: 'bar',
//             label: 'Dataset 3',
//             backgroundColor: color(window.chartColors.green).alpha(0.2).rgbString(),
//             borderColor: window.chartColors.green,
//             data: [
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor(),
//                 randomScalingFactor()
//             ]
//         }]
//     };

//         var ctx = document.getElementById("canvas1").getContext("2d");
//         window.myBar = new Chart(ctx, {
//             type: 'bar',
//             data: barChartData,
//             options: {
//                 responsive: true,
//                 title: {
//                     display: true,
//                     text: 'Chart.js Combo Bar Line Chart'
//                 },
//             }
//         });

//   var myBarChart = new Chart(ctx, {
//     type: 'bar',
//     data: data,
//     options: options
// });



  /*-----echart2-----*/

  var chartdata = [
      {
      name: 'Increase/Decrease(%)',
      type: 'line',
	   smooth:true,
      data: [<?php echo $DPperInc; ?>, <?php echo $PPperInc; ?>, <?php echo $TPperInc; ?>, <?php echo $RPperInc; ?>, <?php echo $PCperInc; ?>],
	  lineStyle: {
        normal: { width: 1 }
      },
      symbolSize:10,
	   lineStyle: {
			normal: { width: 3

			}
		},

    },
    {
      name: 'Posts',
      type: 'bar',
	   smooth:true,
      data: [<?php echo $draftpost_count; ?>, <?php echo $publishedpost_count; ?>, <?php echo $totalpost_count; ?>,<?php echo $recycledpost_count; ?>, <?php echo $pendingcomment_count; ?>],
       barWidth:40,
	  lineStyle: {
        normal: { }
      },
	    itemStyle: {
			normal: {
				width: 1 ,
				barBorderRadius: [3 ,3, 0 ,0],
					color: new echarts.graphic.LinearGradient(
                        0, 0, 0, 1,
                        [
                            {offset: 0, color: '#4d83ff'},
                            {offset: 1, color: '#4d83ff'}
                        ]
                    )
			}
		},
    }
  ];

  var chart = document.getElementById('echart1');
  var barChart = echarts.init(chart);

  var option = {
    grid: {
      top: '6',
      right: '0',
      bottom: '20',
      left: '25',
    },
    xAxis: {
      data: [ 'Drafts', 'Published', 'T-Posts','D-Posts', 'Pending Comments'],
      axisLine: {
        lineStyle: {
          color: '#e9ecf3'
        }
      },
      axisLabel: {
        fontSize: 12,
        color: '#a7acbf'
      }
    },
	tooltip: {
		show: true,
		showContent: true,
		alwaysShowContent: true,
		triggerOn: 'mousemove',
		trigger: 'axis',
		axisPointer:
		{
			label: {
				show: false,
			}
		}

	},
    yAxis: {
      splitLine: {
        lineStyle: {
          color: '#e9ecf3'
        }
      },
      axisLine: {
        lineStyle: {
          color: '#e9ecf3'
        }
      },
      axisLabel: {
        fontSize: 12,
        color: '#a7acbf'
      }
    },
    series: chartdata,
    color:[ '#ffc94d', '#2b88ff']
  };

  barChart.setOption(option);
  var chartdata2 = [
  //     {
  //     name: 'Engaements',
  //     type: 'line',
	 //   smooth:true,
  //     data: [<?php //for ($i = 0; $i < count($categories); $i++) {
  //     	echo $catposteng_count[$i].','; } ?>],
	 //  lineStyle: {
  //       normal: { width: 1 }
  //     },
  //     symbolSize:10,
	 //   lineStyle: {
		// 	normal: { width: 3

		// 	}
		// },

  //   },
    {
      name: 'Posts',
      type: 'bar',
	   smooth:true,
      data: [<?php for ($i = 0; $i < count($categories); $i++) {
      	echo $catpost_count[$i].','; } ?>],
      barWidth:40,
      // barCategoryGap:'2%',
	  lineStyle: {
        normal: { }
      },
	    itemStyle: {
			normal: {
				width: 1 ,
				barBorderRadius: [3 ,3, 0 ,0],
					color: new echarts.graphic.LinearGradient(
                        0, 0, 0, 1,
                        [
                            {offset: 0, color: '#4d83ff'},
                            // {offset: 1, color: '#4d83ff'}
                        ]
                    )
			}
		},
    }
  ];

  var chart2 = document.getElementById('catchart1');
  var barChart2 = echarts.init(chart2);

  var option = {
    grid: {
      top: '6',
      right: '0',
      bottom: '20',
      left: '25',
    },
    xAxis: {

     data:[  <?php for ($i = 0; $i < count($categories); $i++) {
      	echo "'{$categories[$i]}',"; } ?>
      	],
      axisLine: {
        lineStyle: {
          color: '#e9ecf3'
        }
      },
      axisLabel: {
        fontSize: 12,
        color: '#a7acbf'
      }
    },
	tooltip: {
		show: true,
		showContent: true,
		alwaysShowContent: true,
		triggerOn: 'mousemove',
		trigger: 'axis',
		interval:0,
		axisPointer:
		{
			label: {
				show: false,
			}
		}

	},
    yAxis: {
      splitLine: {
        lineStyle: {
          color: '#e9ecf3'
        }
      },
      axisLine: {
        lineStyle: {
          color: '#e9ecf3'
        }
      },
      axisLabel: {
        fontSize: 12,
        color: '#a7acbf'
      }
    },
    series: chartdata2,
    color:[ '#ffc94d', '#2b88ff']
  };

  barChart2.setOption(option);

  });

</script>
   <script type="text/javascript">
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('main'));

        // specify chart configuration item and data
        var option = {
            // title: {
            //     text: 'ECharts entry example'
            // },
            tooltip: {},
            // legend: {
            //     data:['Users']
            // },
            xAxis: {
                data: ["Online","Active","Pending", "Banned","Deleted","Admins"]
            },
            yAxis: {},
            series: [{
                name: 'Users',
                type: 'bar',
                 barWidth:40,
                data: [<?php echo $onlineusers_count;?>, <?php echo $users_count;?>, <?php echo $pendingusers_count;?>, <?php echo $bannedusers_count;?>, <?php echo $deleteduser_count;?>, <?php echo $adminusers_count;?>]
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
    </script>

		<?php
			$sql = "SELECT last_activity FROM sessions WHERE user_id = '".$_SESSION['user_id']."' ORDER BY ID LIMIT 1 ";
			$qry = $database->query($sql);
			$row = $database->fetch_array($qry);
			foreach ($qry as $key => $row ){
						$user_last_activity = $row['last_activity'];
					}
		?>
		   <script>
				 var script = document.referrer.split('/');
					script= script[script.length-1];
					alert(script);
					var $last_activity = "<?php echo timeAgo($user_last_activity); ?>";
					var username = "<strong><?php echo getName($_SESSION['user_id']) ;?></strong>";
		  if(script == 'login.php'){
		  	  $.toast({
		                                            heading: 'Welcome back! '+username ,
		                                            text:'Last seen: '+$last_activity,
		                                            position: 'top-right',
		                                            loaderBg:'#ff6849',
		                                            icon: 'success',
		                                            hideAfter: 3500,
		                                            stack: 6
		                                          });
		  }
		    </script>

</body>
</html>
