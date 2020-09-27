<style type="text/css">
    @media (max-width: 400px) {
        .w-auto1{width:auto!important}
    }
</style>
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4>DASHBOARD</h4>
            <p class="text-subtitle text-muted">Dashboard Cegah Hipertensi</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-content mt-4">
                <div class="card-body">
                    <div class="row match-height">

                        <div class="col-xl-3 col-sm-3 col-12">
                            <div class="card bg-biru">
                                <div class="card-content">
                                    <!-- <img class="card-img-top img-fluid" src="assets/images/samples/pages/content-img-3.jpg"
                                        alt="Card image cap"> -->
                                    <div class="card-body">
                                        <h4 class="card-title text-white"><b>Normal</b></h4>
                                        <p class="card-text text-white">
                                            Total&nbsp;:&nbsp;<span class="normal"></span>
                                        </p>
                                        <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-3 col-12">
                            <div class="card bg-biru">
                                <div class="card-content">
                                    <!-- <img class="card-img-top img-fluid" src="assets/images/samples/pages/content-img-2.jpg"
                                        alt="Card image cap" /> -->
                                    <div class="card-body">
                                        <h4 class="card-title text-white"><b>Normal Tinggi</b></h4>
                                        <p class="card-text text-white">
                                            Total&nbsp;:&nbsp;<span class="normal_tinggi"></span>
                                        </p>
                                        <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-3 col-12">
                            <div class="card bg-biru">
                                <div class="card-content">
                                    <!-- <img class="card-img-top img-fluid" src="assets/images/samples/pages/content-img-2.jpg"
                                        alt="Card image cap" /> -->
                                    <div class="card-body">
                                        <h4 class="card-title text-white"><b>Hipertensi Grade 1</b></h4>
                                        <p class="card-text text-white">
                                            Total&nbsp;:&nbsp;<span class="grade_1"></span>
                                        </p>
                                        <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-3 col-12">
                            <div class="card bg-biru">
                                <div class="card-content">
                                    <!-- <img class="card-img-top img-fluid" src="assets/images/samples/pages/content-img-2.jpg"
                                        alt="Card image cap" /> -->
                                    <div class="card-body">
                                        <h4 class="card-title text-white"><b>Hipertensi Grade 2</b></h4>
                                        <p class="card-text text-white">
                                            Total&nbsp;:&nbsp;<span class="grade_2"></span>
                                        </p>
                                        <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-content mt-4">
                <div class="card-body">
                    <div id="chartdiv" style="height: 500px;"></div>     
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pesan</h4>
            </div>
            <div class="card-content">
                <?= $this->Form->create(null,['type'=>'file']) ?>
                    <div class="card-body">
                        <p class="card-text">Pesan Kesehatan pada aplikasi “cegahhipertensi.com”</p>
                    </div>
                    <!-- table striped -->
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>KONDISI</th>
                                    <th>Cut Of Point</th>
                                    <th>Pesan (Maks 122 karakter termasuk spasi)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($screening as $r):?>
                                    <input type="hidden" name="kode[]" value="<?= $r->kode ?>">
                                    <tr>
                                        <td width="20%">
                                            <?=
                                                $this->Form->control('kondisi[]',[
                                                    'class'=>'form-control m-input w-auto1',
                                                    'required' => true,
                                                    'templateVars' => [
                                                        'colsize' => 'col-lg-12 col-xl-12',
                                                    ],
                                                    'label' => false,
                                                    'type' =>'textarea',
                                                    'readonly'=>true,
                                                    'rows' => 2,
                                                    'value' => $r->kondisi
                                                ]);
                                            ?>
                                        </td>
                                        <td width="30%">
                                            <?=
                                                $this->Form->control('cop[]',[
                                                    'class'=>'form-control m-input w-auto1',
                                                    'required' => true,
                                                    'templateVars' => [
                                                        'colsize' => 'col-lg-12 col-xl-12',
                                                    ],
                                                    'readonly'=>true,
                                                    'label' => false,
                                                    'type' =>'textarea',
                                                    'rows' => 2,
                                                    'value' => $r->cop
                                                ]);
                                            ?>
                                        </td>
                                        <td width=""> <?php
                                                echo $this->Form->control('pesan[]',[
                                                    'class'=>'form-control m-input w-auto1',
                                                    'templateVars' => [
                                                        'colsize' => 'col-lg-12 col-md-12',
                                                    ],
                                                    'required' => true,
                                                    'label' => false,
                                                    'type' =>'textarea',
                                                    'rows' => 2,
                                                    'value' => $r->pesan
                                                ]);
                                            ?>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary mr-1 round ">Simpan</button>
                    <!-- <button type="reset" class="btn btn-light-primary">Cancel</button> -->
                </div>

            <?=$this->Form->end();?>
        </div>
    </div>
</div>
</div>
<?php $this->start('script');?>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script type="text/javascript">

    var textEditor = ['#body'];
    const format = num => {
        const n = String(num),
              p = n.indexOf('.')
        return n.replace(
            /\d(?=(?:\d{3})+(?:\.|$))/g,
            (m, i) => p < 0 || i < p ? `${m},` : m
        )
    }
    $.ajax({
        url: "<?= $this->Url->build('webadminpjpd/apis/get-screenings/');?>",
        dataType: 'json',
        type: 'get',
        beforeSend: function(){
        },
        success: function(e){
            var data = e.screening;

            $('.normal').html(format(data.normal));
            $('.normal_tinggi').html(format(data.normal_tinggi));
            $('.grade_1').html(format(data.grade_1));
            $('.grade_2').html(format(data.grade_2));


            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();

            // Add data
            chart.data = [{
              "country": "Normal",
              "visits": data.normal,
              "color": '#27ae60'
            }, {
              "country": "Normal Tinggi",
              "visits": data.normal_tinggi,
              "color": '#f1c40f'
            }, {
              "country": "Hipertensi Grade 1",
              "visits": data.grade_1,
              "color": '#e67e22'
            }, {
              "country": "Hipertensi Grade 2",
              "visits": data.grade_2,
              "color": '#e74c3c'
            }];

            // Create axes
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
         categoryAxis.dataFields.category = "country";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.verticalCenter = "middle";
        categoryAxis.renderer.labels.template.rotation = 270;
        categoryAxis.tooltip.disabled = true;
        categoryAxis.renderer.minHeight = 110;
            
             var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "Total";
            valueAxis.renderer.labels.template.adapter.add("text", function(text) {
                return text + "";
            });

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;

            series.tooltip.pointerOrientation = "vertical";

            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;
            series.columns.template.propertyFields.fill = "color";


            var valueLabel = series.bullets.push(new am4charts.LabelBullet());
            valueLabel.label.text = "{valueY}";
            valueLabel.label.fill = am4core.color("black");
            valueLabel.label.fontSize = 20;
            valueLabel.locationY = 0;

            
            // var bulletLabel = series.bullets.push(new am4charts.LabelBullet());
            // bulletLabel.label.background = new am4core.RoundedRectangle();
            // bulletLabel.locationY = 0;
            // bulletLabel.label.text = "{valueY}";
            // on hover, make corner radiuses bigger
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;


            // Cursor

            // Add legend
            chart.exporting.menu = new am4core.ExportMenu();
            chart.exporting.menu.align = "right";
            chart.exporting.menu.verticalAlign = "top";
            chart.exporting.filePrefix = "GRAFIK HIPERTENSI";
            chart.exporting.useWebFonts = false;    // Add cursor
            
            chart.cursor = new am4charts.XYCursor();
          

            var title = chart.titles.create();
            title.text = "GRAFIK HIPERTENSI ";
            
            title.fontSize = 17;
            title.marginBottom = 30;
            

        },
        errorr: function(){
            swall('Gagal','Data tidak ada','error');
        }
    })
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

    // Themes begin
   
</script>
<?php $this->end();?>
