jQuery(document).ready(function($){

	var SSC = {
		options: {
			ww: $(window).width(),
			chart: {
				title: {
					display: false,
					text: 'Chart title'
				},
				legend: {
					display: false,
					position: "bottom",
					fullWidth: true,
					labels: {padding: 32, fontColor: "#333333", fontSize: 14, usePointStyle: false}
				},
				layout: {
					padding: {
						left: 0,
						right: 0,
						top: 16,
						bottom: 0
					},
				},
				scales: {
					xAxes: [{
						ticks: {
							mirror: false,
							padding: 0,
							fontSize: 12,
							fontColor: "#000",
							fontFamily: "Helvetica"
						},
						scaleLabel: {
							display: false,
							labelString: 'labelString.xAxes',
							fontColor: "#ff006f",
							fontSize: 16,
							padding: 0
						}
					}],
					yAxes: [{
						ticks: {
							beginAtZero: true,
							min: 0,
							max: 400,
							fontFamily: "Helvetica",
							callback: function(value, index, values){
								return '$' + value;
							}
						},
						scaleLabel: {
							display: true,
							labelString: 'Monthly Premium',
							fontColor: "#333333",
							fontSize: 18,
							padding: 16
						}
					}]
				},
				hover: {
					intersect: false,
					animationDuration: 0
				},
				tooltips: {
					enabled: false,
				},
				animation: {
					duration: 1,
					onComplete: function(){
						var chartInstance = this.chart,
							ctx = chartInstance.ctx,
							fs = Chart.defaults.global.defaultFontSize;

						if(SSC.options.ww < 992){
							fs = 11;
						}

						ctx.font = Chart.helpers.fontString(
							fs,
							Chart.defaults.global.defaultFontStyle,
							Chart.defaults.global.defaultFontFamily
						);
						ctx.textAlign = 'center';
						ctx.textBaseline = 'bottom';

						this.data.datasets.forEach(function(dataset, i){
							var meta = chartInstance.controller.getDatasetMeta(i);
							meta.data.forEach(function(bar, index){
								var data = dataset.data[index];
								ctx.fillText('$' + data, bar._model.x, bar._model.y - 5);
							});
						});
					}
				}
			}
		},
		vars: {
			myBar: null,
			ctxSmokingChart: null,
			removedItem: false,
			smallSizeUpdated: false
		},
		chartDefaultData: {
			labels: ["AIG", "Banner", "Pacific Life", "Prudential", "Mutual of Omaha", "SBLI"],
			datasets: [
				{
					label: 'Smoking Rate Per Month',
					backgroundColor: "#859a9c",
					borderColor: "#859a9c",
					borderWidth: 1,
					data: null
				},
				{
					label: 'Non-Smoking Rate Per Month',
					backgroundColor: "#6d91c0",
					borderColor: "#6d91c0",
					borderWidth: 1,
					data: [73.44, 71.54, 75.22, 85.75, 82.78, 83.33]
				}
			]
		},
		chartResponsiveData: {
			mob: {
				labels: ["AIG", "Banner", "Pacific Life", "Prudential", "SBLI"],
				data: [
					[302.24, 302.23, 315.35, 360.06, 324.87],
					[73.44, 71.54, 75.22, 85.75, 83.33]
				],
			},
			desktop: {
				labels: ["AIG", "Banner", "Pacific Life", "Prudential", "Mutual of Omaha", "SBLI"],
				data: [
					[302.24, 302.23, 315.35, 360.06, 362.28, 324.87],
					[73.44, 71.54, 75.22, 85.75, 82.78, 83.33]
				]
			}
		},
		Init: function(){
			this.drawSmokingChart();
		},
		drawSmokingChart: function(){
			if(SSC.options.ww < 992){
				SSC.chartDefaultData.labels = SSC.chartResponsiveData.mob.labels;
				SSC.chartDefaultData.datasets[0].data = SSC.chartResponsiveData.mob.data[0];
				SSC.chartDefaultData.datasets[1].data = SSC.chartResponsiveData.mob.data[1];
			}else if(SSC.options.ww > 991){
				SSC.chartDefaultData.labels = SSC.chartResponsiveData.desktop.labels;
				SSC.chartDefaultData.datasets[0].data = SSC.chartResponsiveData.desktop.data[0];
				SSC.chartDefaultData.datasets[1].data = SSC.chartResponsiveData.desktop.data[1];
			}

			SSC.vars.ctxSmokingChart = document.getElementById("smokingChart").getContext("2d");
			SSC.vars.myBar = new Chart(SSC.vars.ctxSmokingChart, {type: "bar", data: SSC.chartDefaultData, options: SSC.options.chart});
			SSC.redrawSmokingChart();
		},
		redrawSmokingChart: function(){
			if(SSC.options.ww < 992 && !SSC.vars.removedItem){
				SSC.vars.myBar.data.labels = SSC.chartResponsiveData.mob.labels;
				SSC.vars.myBar.data.datasets[0].data = SSC.chartResponsiveData.mob.data[0];
				SSC.vars.myBar.data.datasets[1].data = SSC.chartResponsiveData.mob.data[1];

				SSC.vars.removedItem = true;
				SSC.vars.myBar.update();
			}else if(SSC.options.ww > 991 && SSC.vars.removedItem){
				SSC.vars.myBar.data.labels = SSC.chartResponsiveData.desktop.labels;
				SSC.vars.myBar.data.datasets[0].data = SSC.chartResponsiveData.desktop.data[0];
				SSC.vars.myBar.data.datasets[1].data = SSC.chartResponsiveData.desktop.data[1];

				SSC.vars.removedItem = false;
				SSC.vars.myBar.update();
			}

			if(SSC.options.ww < 768 && !SSC.vars.smallSizeUpdated){
				SSC.vars.myBar.options.scales.yAxes[0].scaleLabel.fontSize = 12;
				SSC.vars.myBar.options.scales.yAxes[0].scaleLabel.padding = 0;
				SSC.vars.myBar.update();
				SSC.vars.smallSizeUpdated = true;
			}else if(SSC.options.ww > 767 && SSC.vars.smallSizeUpdated){
				SSC.vars.myBar.options.scales.yAxes[0].scaleLabel.fontSize = 18;
				SSC.vars.myBar.options.scales.yAxes[0].scaleLabel.padding = 16;
				SSC.vars.myBar.update();
				SSC.vars.smallSizeUpdated = false;
			}
		},
		resizeWindow: function(){
			SSC.options.ww = $(window).width();
			SSC.redrawSmokingChart();
		}
	};

	SSC.Init();

	$(window).resize(SSC.resizeWindow);

});
