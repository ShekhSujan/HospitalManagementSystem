var options = {
	chart: {
		height: 300,
		type: 'bar',
		stacked: true
	},
	colors: ['#225de4', '#81a3f0'],
	plotOptions: {
		bar: {
			horizontal: true,
			barHeight: '60%',

		},
	},
	dataLabels: {
		enabled: false
	},
	stroke: {
		width: 1,
		colors: ["#fff"]
	},
	series: [{
			name: 'Male',
			data: [10, 15, 3,25,32]
		},
		{
			name: 'Female',
			data: [-10, -15, -3, -25, -32]
		}
	],
	grid: {
		xaxis: {
			showLines: true
		}
	},
	yaxis: {
		min: -5,
		max: 5,
		title: {
			 text: 'Age',
		},
	},
	tooltip: {
		shared: false,
		x: {
			formatter: function(val) {
				return val
			}
		},
		y: {
			formatter: function(val) {
				return Math.abs(val) + "%"
			}
		}
	},
	title: {
		text: 'World population by Age & Gender',
		align: 'center',
	},
	xaxis: {
		categories: ['50+', '40-49', '30-39', '20-29','0-19'],
		title: {
			text: 'Percent'
		},
		labels: {
			formatter: function(val) {
				return Math.abs(Math.round(val)) + "%"
			}
		}
	},
}

var chart = new ApexCharts(
	document.querySelector("#basic-bar-negative-values"),
	options
);

chart.render();
