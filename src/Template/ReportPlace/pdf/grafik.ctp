<style type="text/css">
	body {
	  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
	}

	#chartdiv {
	  width: 100%;
	  height: 600px;
	}

</style>
<div id="chartdiv"></div>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/dataviz.js"></script>
<script type="text/javascript">
	/**
		 * ---------------------------------------
		 * This demo was created using amCharts 4.
		 * 
		 * For more information visit:
		 * https://www.amcharts.com/
		 * 
		 * Documentation is available at:
		 * https://www.amcharts.com/docs/v4/
		 * ---------------------------------------
		 */

		// Themes
		function am4themes_myTheme(target) {
		  if (target instanceof am4core.ColorSet) {
		    target.list = [
		      am4core.color("#48dbfb"),
		      am4core.color("#5f27cd"),
		      am4core.color("#009432"),
		      am4core.color("#DF3520"),
		      am4core.color("#64297B"),
		      am4core.color("#232555")
		    ];
		  }
		}

		am4core.useTheme(am4themes_myTheme);

		// Create chart instance
		var chart = am4core.create("chartdiv", am4charts.XYChart3D);
		chart.numberFormatter.numberFormat = "#.0";

		// Add data
		chart.data = [ 

            <?php foreach ($results as $r): ?>
				{
				  "year": "<?=  $r['nama'] ?>",
				  "hasil_k": "<?=  ($r['hasil_k']) ?>",
				  "hasil_m": "<?=  ($r['hasil_m']) ?>",
				  "hasil_p": "<?=  ($r['hasil_p']) ?>",
	              "color": '#e74c3c'
				},
			<?php endforeach;?> 
		];
chart.numberFormatter.numberFormat = "#.";
		
		// Create axes
		var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
		categoryAxis.dataFields.category = "year";
		categoryAxis.renderer.grid.template.location = 0;
		categoryAxis.renderer.minGridDistance = 20;
		categoryAxis.renderer.inside = true;
		categoryAxis.renderer.labels.template.valign = "top";
		categoryAxis.renderer.labels.template.fontSize = 20;
		categoryAxis.renderer.cellStartLocation = 0.1;
		categoryAxis.renderer.cellEndLocation = 0.9;

		var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.min = 0;
		valueAxis.title.text = "Total Pemeriksaan";

		// Create series
		function createSeries(field, name,color) {
		  	var series = chart.series.push(new am4charts.ColumnSeries3D());
		  	series.dataFields.valueY = field;
		  	series.dataFields.categoryX = "year";
		  	series.name = name;
		  	series.columns.template.tooltipText = "{name}: [bold]{valueY}[/]";
		  	series.columns.template.width = am4core.percent(100);



		  	var bullet = series.bullets.push(new am4charts.LabelBullet);
		  	bullet.label.text = "{name}";
		  	bullet.label.rotation = 0;
		  	bullet.locationY = 1;
		  	bullet.dy = 17;


            var valueLabel = series.bullets.push(new am4charts.LabelBullet());
            valueLabel.label.text = "[bold]{valueY}";
            valueLabel.label.fill = am4core.color("white");
            valueLabel.label.fontSize = 16;
            valueLabel.locationY = 0;
		  	valueLabel.dy = -7;

		}

		chart.paddingBottom = 150;
		chart.maskBullets = false;

		chart.exporting.menu = new am4core.ExportMenu();
        chart.exporting.menu.align = "right";
        chart.exporting.menu.verticalAlign = "top";
        chart.exporting.filePrefix = "Hasil Pemeriksaan Tekanan Darah berdasarkan tempat Pemeriksaan";
        chart.exporting.useWebFonts = false;    // Add cursor
        
        chart.cursor = new am4charts.XYCursor();
      

        var title = chart.titles.create();
        title.text = "Hasil Pemeriksaan Tekanan Darah berdasarkan tempat Pemeriksaan ";
        
        title.fontSize = 25;
        title.marginBottom = 30;
		createSeries("hasil_k", "Klinik", false);
		createSeries("hasil_m", "Mandiri", true);
		createSeries("hasil_p", "Posbindu", true);
   
</script>