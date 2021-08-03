function formatMoney(amount, decimalCount, decimal, thousands) {
	try {
		decimalCount = Math.abs(decimalCount);
		decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

		const negativeSign = amount < 0 ? "-" : "";

		let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
		let j = (i.length > 3) ? i.length % 3 : 0;

		return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
	} catch (e) {
		console.log(e)
	}
}

jQuery(document).ready(function($){


	//Statistic widgets
	if($('.bar-chart-multi').length){
		$('.bar-chart-multi').each(function(){
			var $this_bar_chart_multi = $(this);
			var title = $this_bar_chart_multi.data('title');
			var label = $this_bar_chart_multi.data('label');
			var price_sign = $this_bar_chart_multi.data('price-sign');
			var min = $this_bar_chart_multi.data('min');
			var max = $this_bar_chart_multi.data('max');
			var labels = $this_bar_chart_multi.data('labels');
			var data = $this_bar_chart_multi.data('data');
			var backgroundcolors = $this_bar_chart_multi.data('backgroundcolors');
			var bordercolors = $this_bar_chart_multi.data('bordercolors');
			var labelString = $this_bar_chart_multi.data('axeslabels');
			var ctx_data = {
				labels: labels,
				datasets: data
			};
			var ctx_options = {
				title: {
					display: false,
					text: title
				},
				legend:{
					display: true,
					position: "top",
					fullWidth: true,
					labels: {padding: 10,fontColor: "#666",fontSize: 14, usePointStyle: true}
				},
				layout: {
					padding: {
						left: 0,
						right: 0,
						top: 0,
						bottom: 0
					},
				},
				barValueSpacing: 20,
				scales: {
					xAxes: [{
						ticks: {
							mirror: false,
							padding: 0,
							fontSize: 12,
							fontColor: "#000",
							fontFamily: "Helvetica",
							/*callback: function(value, index, values) {
								return value + ' - '+price_sign+ctx_data.datasets[0].data[index];
							}*/
						},
						scaleLabel: {
							display: true,
							labelString: labelString.xAxes,
							fontColor: "#ff006f",
							fontSize: 16,
							padding: 0
						}
					}],
					yAxes: [{
						ticks: {
							beginAtZero: true,
							min: min,
							max: max,
							fontFamily: "Helvetica",
							callback: function(value, index, values) {
								return price_sign + '' + value;
							}
						},
						scaleLabel: {
							display: true,
							labelString: labelString.yAxes,
							fontColor: "#ff006f",
							fontSize: 16,
							padding: 0
						}
					}]
				},
				hover: {
					intersect: false
				},
				tooltips: {
					backgroundColor: "rgba(0,0,0,0.8)",
					bodyFontFamily: "Helvetica",
					titleDisplay: false,
					titleFontFamily: "Helvetica",
					titleFontSize: 11,
					titleSpacing: 2,
					mode: 'index'
				}
			};
			if(label != ''){
				ctx_options.legend.display = true;
			}
			if(title != ''){
				ctx_options.title.display = true;
			}
			new Chart($this_bar_chart_multi, {type: "bar", data: ctx_data, options: ctx_options});
		});
	}

	if($('.bar-chart').length){
		$('.bar-chart').each(function(){
			var $this_bar_chart = $(this);
			var title = $this_bar_chart.data('title');
			var label = $this_bar_chart.data('label');
			var price_sign = $this_bar_chart.data('price-sign');
			var min = $this_bar_chart.data('min');
			var max = $this_bar_chart.data('max');
			var labels = $this_bar_chart.data('labels');
			var data = $this_bar_chart.data('data');
			var backgroundcolors = $this_bar_chart.data('backgroundcolors');
			var bordercolors = $this_bar_chart.data('bordercolors');
			var labelString = $this_bar_chart.data('axeslabels');
			var ctx_data = {
				labels: labels,
				datasets: [{
					label: label,
					fill: false,
					data: data,
					backgroundColor: backgroundcolors,
					borderColor: bordercolors,
					borderWidth: 1
				}]
			};
			var ctx_options = {
				title: {
					display: false,
					text: title
				},
				legend:{
					display: false,
					position: "top",
					fullWidth: true,
					labels: {padding: 10,fontColor: "#666",fontSize: 14, usePointStyle: true}
				},
				layout: {
					padding: {
						left: 0,
						right: 0,
						top: 0,
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
							fontFamily: "Helvetica",
							/*callback: function(value, index, values) {
								return value + ' - '+price_sign+ctx_data.datasets[0].data[index];
							}*/
						},
						scaleLabel: {
							display: true,
							labelString: labelString.xAxes,
							fontColor: "#ff006f",
							fontSize: 16,
							padding: 0
						}
					}],
					yAxes: [{
						ticks: {
							min: min,
							max: max,
							fontFamily: "Helvetica",
							callback: function(value, index, values) {
								return price_sign + '' + value;
							}
						},
						scaleLabel: {
							display: true,
							labelString: labelString.yAxes,
							fontColor: "#ff006f",
							fontSize: 16,
							padding: 0
						}
					}]
				},
				hover: {
					intersect: false
				},
				tooltips: {
					backgroundColor: "rgba(0,0,0,0.8)",
					bodyFontFamily: "Helvetica",
					titleDisplay: false,
					titleFontFamily: "Helvetica",
					titleFontSize: 11,
					titleSpacing: 2,
					mode: 'index',
					axis: 'x',
					callbacks: {
						label: function(item, data) {
							return ' '+price_sign+data.datasets[0].data[item.index] + '';
						}
					},
					filter: function(item){
						item.label = "";
						item.xLabel = "";
						item.yLabel = "";
						return item;
					}
				}
			};
			if(label != ''){
				ctx_options.legend.display = true;
			}
			if(title != ''){
				ctx_options.title.display = true;
			}
			new Chart($this_bar_chart, {type: "bar", data: ctx_data, options: ctx_options});
		});
	}

	if($('#sgpPieChart').length){
		var $sgpPieChart =$('#sgpPieChart');
		var sgpPieChart_ctx_data = {
			"labels": $sgpPieChart.data('labels'),
			"datasets": [{
				"label": "",
				"data": $sgpPieChart.data('data'),
				"backgroundColor": $sgpPieChart.data('backgroundcolors'),
				"hoverBorderColor": "#fff"
			}]
		};
		var sgpPieChart_ctx_options = {
			legend:{
				position: "bottom",
				fullWidth: true,
				labels: {padding: 10, fontColor: "#666",fontSize: 14, usePointStyle: true}
			},
			layout: {
				padding: {
					left: 0,
					right: 0,
					top: 0,
					bottom: 0
				},
			},
			tooltips: {
				callbacks: {
					label: function(item, data) {
						return ' '+data.datasets[0].data[item.index] + '%';
					}
				}
			}
		};
		new Chart($sgpPieChart, {type: 'doughnut', data: sgpPieChart_ctx_data, options: sgpPieChart_ctx_options});
	}

	if($('.pie-charts').length){
		$('.pie-charts').each(function(){
			var $this_pie_chart =$(this);
			var pie_chart_ctx_data = {
				"labels": $this_pie_chart.data('labels'),
				"datasets": [{
					"label": "",
					"data": $this_pie_chart.data('data'),
					"backgroundColor": $this_pie_chart.data('backgroundcolors'),
					"hoverBorderColor": "#fff"
				}]
			};
			var pie_chart_ctx_options = {
				legend:{
					position: "bottom",
					fullWidth: true,
					labels: {
						padding: 10,fontColor: "#666",fontSize: 12, usePointStyle: true,
					}
				},
				layout: {
					padding: {
						left: 0,
						right: 0,
						top: 0,
						bottom: 0
					},
				},
				legendCallback: function(legendItem) {
					console.log(legendItem);
				},
				tooltips: {
					mode: 'index',
					callbacks: {
						label: function(item, data) {
							return ' '+data.datasets[0].data[item.index] + '%';
						}
					}
				},
				title: {display: true, text: $this_pie_chart.data('title')},
				maintainAspectRatio:false
			};
			new Chart($this_pie_chart, {type: 'doughnut', data: pie_chart_ctx_data, options: pie_chart_ctx_options});
		});
	}

	if($('.scatter-chart').length){
		$('.scatter-chart').each(function(){
			var $this_scatter_chart = $(this);
			var title = $this_scatter_chart.data('title');
			var label = $this_scatter_chart.data('label');
			var price_sign = $this_scatter_chart.data('price-sign');
			var year_sign = $this_scatter_chart.data('year-sign');
			var tooltip_label_prefix = $this_scatter_chart.data('tooltip-label-prefix');
			var tooltip_label_suffix = $this_scatter_chart.data('tooltip-label-suffix');
			var yaxis_labels = $this_scatter_chart.data('yaxis-labels');
			var min = $this_scatter_chart.data('min');
			var max = $this_scatter_chart.data('max');
			var labels = $this_scatter_chart.data('labels');
			var data = $this_scatter_chart.data('data');
			var backgroundcolors = $this_scatter_chart.data('backgroundcolors');
			var bordercolors = $this_scatter_chart.data('bordercolors');
			var labelString = $this_scatter_chart.data('axeslabels');
			var scatter_chart_ctx_data = {
				labels: labels,
				datasets: [{
					label: label,
					showLine: true,
					fill: true,
					data: data,
					backgroundColor: backgroundcolors[0],
					borderColor: bordercolors[0],
					borderWidth: 1
				}]
			};
			var scatter_chart_ctx_options = {
				title: {
					display: false,
					text: title
				},
				legend:{
					display: false,
					position: "bottom",
					fullWidth: true,
					labels: {
						padding: 10,
						fontColor: "#666",
						fontSize: 12,
						usePointStyle: true,
						boxWidth: 40,
						filter: function(item, data) {
							item.pointStyle = 'line';
							item.lineWidth = 2;
							item.fillStyle = bordercolors[0];
							item.strokeStyle = bordercolors[0];
							return item;
						}
					}
				},
				layout: {
					padding: {
						left: 0,
						right: 0,
						top: 0,
						bottom: 0
					},
				},
				scales: {
					xAxes: [{
						type: 'category',
						position: 'bottom',
						ticks: {
							precision: 0,
							mirror: false,
							padding: 0,
							fontSize: 12,
							fontColor: "#000",
							fontFamily: "Helvetica",
						},
						scaleLabel: {
							display: true,
							labelString: labelString.xAxes,
							fontColor: "#ff006f",
							fontSize: 16,
							padding: 0
						}
					}],
					yAxes: [{
						ticks: {
							precision: 0,
							min: min,
							max: max,
							fontFamily: "Helvetica",
							callback: function(value, index, values){
								if(Object.keys(yaxis_labels).length > 0){
									return yaxis_labels[value];
								}else{
									value = formatMoney(value, 0, '.', ',');
									return price_sign + '' + value + '' + year_sign;
								}
							}
						},
						scaleLabel: {
							display: true,
							labelString: labelString.yAxes,
							fontColor: "#ff006f",
							fontSize: 16,
							padding: 0
						}
					}]
				},
				hover: {
					intersect: false
				},
				tooltips: {
					backgroundColor: "rgba(0,0,0,0.8)",
					bodyFontFamily: "Helvetica",
					titleFontFamily: "Helvetica",
					titleFontSize: 12,
					titleSpacing: 20,
					mode: 'point',
					axis: 'y',
					callbacks: {
						title: function(item, data){
							return " Age range: "+data.labels[item[0].index];
						},
						label: function(item, data){
							//return " Age range: "+data.labels[item.index]+", Avg price: "+price_sign+item.value + "";
							var value = item.value;
							if(price_sign != ''){
								var r = value - ~~value;
								var decimalCount = 0;
								if(r > 0){
									decimalCount = 2;
								}
								value = formatMoney(value, decimalCount, '.', ',');
							}else if(Object.keys(yaxis_labels).length > 0){
								value = yaxis_labels[value];
							}
							return " "+tooltip_label_prefix + price_sign + value + tooltip_label_suffix;
						}
					},
					/*filter: function(item){
						item.label = "";
						item.xLabel = "";
						item.yLabel = "";
						return item;
					}*/
				}
			};
			if(label != ''){
				scatter_chart_ctx_options.legend.display = true;
			}
			if(title != ''){
				scatter_chart_ctx_options.title.display = true;
			}
			new Chart($this_scatter_chart, {type: "scatter", data: scatter_chart_ctx_data, options: scatter_chart_ctx_options});
		});
	}
	//END Statistic widgets


});
