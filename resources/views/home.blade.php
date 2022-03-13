@extends('layouts.app')

@section('content')
<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-home"></i> Dashboard</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
									<div class="metric">
										<?php 

                                        $timeArray = [];
                                        $ratingArray = [];
                                        date_default_timezone_set('Asia/Manila');
										if($employeesReference != null){
											foreach($employeesReference as $key => $row)
	                                        {
												if(isset($ratingArray, $row['ratings']))
												{
													array_push($ratingArray, $row['ratings']);
												}
	                                        	
												if(isset($ratingArray, $row['history']))
												{
													foreach($row['history'] as $userData => $historyData)
													{
														array_push($timeArray, $historyData['servingTime']);
													}
												}
	                                        }
										}
                                    ?>
										<span class="icon"><i class="fa fa-university"></i></span>
										<p>
											<span class="number">
												<?php 
													if (is_null($employeesReference)) {
                                        				echo "0";
                                        			}
                                        			else{
														echo count($employeesReference);
													}
												?>
												
											</span>
											<span class="title">Total Counters</span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-male"></i></span>
										<p>

											<span class="number">
												<?php 

                                        			if (is_null($customerCountToday)) {
                                        				echo "0";
                                        			}
                                        			else{
														echo $customerCountToday['customerCount'];
                                        			}
												?></span>
											<span class="title">Customer Today</span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-male"></i></span>
										<p>
											<span class="number">
												<?php 

                                        			if (is_null($customerCountYesterday)) {
                                        				echo "0";
                                        			}
                                        			else{
                                        				echo $customerCountYesterday['customerCount'];
                                        			}

												?></span>
											<span class="title">Customer Yesterday</span>
										</p>
									</div>
								</div>
								<div class="col-md-4 col-md-offset-2">
									<div class="metric">
										<span class="icon"><i class="fa fa-clock-o"></i></span>
										<p>
											<span class="number">
												<?php 
												if (empty($timeArray)) {
													echo "0";
												}
												else{
													echo date('H:i:s', array_sum(array_map('strtotime', $timeArray)) / count($timeArray));
												}
												?>
											</span>
											<span class="title">Average Serving Time</span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-star"></i></span>
										<p>
											<span class="number">
												<?php 
												if (empty($ratingArray)) {
													echo "0";
												}
												else{
													echo array_sum($ratingArray)/count($ratingArray);
												}
												?>
											</span>
											<span class="title">Average Rating</span>
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="headline-chart" class="ct-chart"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="../assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>
	<script>
	$(function() {
		var data, options;

		<?php
			$days = array();
			$customerCount = array();
			if($customerHistory > 0){
				foreach($customerHistory as $key => $row)
				{
					array_push($days, $row['day']);
					array_push($customerCount, $row['customerCount']);

				}
			}
			
		?>

		// headline charts
		data = {
			labels: 
			 	<?php 
			  		echo json_encode($days) 
			  	?>
				// ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
				,
			series: [
			 	<?php 
					echo json_encode($customerCount) 
				?>
				// [23, 29, 24, 40, 25, 24, 35],
				//[14, 25, 18, 34, 29, 38, 44],
			]
		};
		

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>
@endsection
