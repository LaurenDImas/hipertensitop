<style type="text/css">

    *{
        font-family: arial;
    }
    .title{
        text-align: center;
        line-height: 1.2;
        margin: 0;
        padding: 0;
    }
    .table{
        border-collapse: collapse;
        width: 100%;
    }
    .table th,.table td{
        border: thin solid #444;
        padding: 5px;
        font-size: 12px;
    }
    .text-center{
        text-align: center;
    }
    
    .header-atas{
        font-size:25px;
    }

    .header-sub{
        font-size:20px;
    }

    .table thead th {
        vertical-align: middle!important;
        border-bottom: 1px solid black!important;
    }

</style>
<table class="text-center header" width="100%;">
    <tr>
        <th class="header">Matriks Data Cegah Hipertensi</th>
    </tr>
</table><br>
<!-- <div class="table-responsive-lg"> -->
<table class="table table-condensed table-bordered table-res" border="1" style="font-size:12px;">
    <thead>
       
        <tr>
            <th class="head" rowspan="2" style="width: 1%;">No</th>
            <th class="head" rowspan="2" width='10%'>Kondisi</th>
            <th class="head" colspan="2" width='10%'>Usia 15-30 tahun</th>
            <th class="head" colspan="2" width='10%'>Usia > 30 Tahun</th>
            <th class="head" rowspan="2" width='10%'>Total</th>
        </tr>
        <tr>
            <th class="head" width='10%'>Laki-Laki</th>
            <th class="head" width='10%'>Perempuan</th>
            <th class="head" width='10%'>Laki-Laki</th>
            <th class="head" width='10%'>Perempuan</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no=1;
            $hasil_1=0;
            $hasil_2=0;
            $hasil_3=0;
            $hasil_4=0; ?>
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $r): ?>
                <?php
                    $hasil_1 +=$r['hasil_1'];
                    $hasil_2 +=$r['hasil_2'];
                    $hasil_3 +=$r['hasil_3'];
                    $hasil_4 +=$r['hasil_4'];
                    $total = $hasil_1+$hasil_2+$hasil_3+$hasil_4;

                ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td><?=  $r['nama'] ?></td>
                <td  style="text-align: right;"><?=  number_format($r['hasil_1']) ?></td>
                <td  style="text-align: right;"><?=  number_format($r['hasil_2']) ?></td>
                <td  style="text-align: right;"><?=  number_format($r['hasil_3']) ?></td>
                <td  style="text-align: right;"><?=  number_format($r['hasil_4']) ?></td>
                <td  style="text-align: right;"><?=  number_format($r['hasil_1']+$r['hasil_2']+$r['hasil_3']+$r['hasil_4']) ?></td>
            </tr>
        <?php endforeach;?>
        <tr>
            <td colspan="2" align="center">Total</td>
            <td  style="text-align: right;"><?=  number_format($hasil_1) ?></td>
            <td  style="text-align: right;"><?=  number_format($hasil_2) ?></td>
            <td  style="text-align: right;"><?=  number_format($hasil_3) ?></td>
            <td  style="text-align: right;"><?=  number_format($hasil_4) ?></td>
            <td  style="text-align: right;"><?=  number_format($total) ?></td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
<!-- </div> -->