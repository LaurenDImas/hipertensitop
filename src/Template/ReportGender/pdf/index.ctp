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
		<th class="header">Hasil Pemeriksaan Tekanan Darah Berdasarkan Jenis Kelamin</th>
	</tr>
</table><br>
<!-- <div class="table-responsive-lg"> -->
<table class="table table-condensed table-bordered table-res" border="1" style="font-size:12px;">
	<thead>
	   
	    <tr>
	        <th class="head" style="width: 1%;">No</th>
	        <th class="head" width='10%'>Kondisi</th>
	        <th class="head" width='10%'>Laki-laki</th>
	        <th class="head" width='10%'>Perempuan</th>
	    </tr>
	</thead>
	<tbody>
		<?php $no=1;
            $hasil_l =0;
            $hasil_p =0;
         ?>
		<?php if (!empty($results)): ?>
            <?php foreach ($results as $r): ?>
                <?php
                    $hasil_l +=$r['hasil_l'];
                    $hasil_p +=$r['hasil_p'];
                    $total = $hasil_l + $hasil_p;
                ?>
			<tr>
				<td style="text-align: center;"><?= $no++ ?></td>
				<td><?=  $r['nama'] ?></td>
				<td  style="text-align: right;"><?=  number_format($r['hasil_l']) ?></td>
                <td  style="text-align: right;"><?=  number_format($r['hasil_p']) ?></td>
 				
			</tr>
		<?php endforeach;?>
        <tr>
            <td colspan="2" align="center">Total</td>
            <td  style="text-align: right;"><?=  number_format($hasil_l) ?></td>
            <td  style="text-align: right;"><?=  number_format($hasil_p) ?></td>
            
        </tr>
	<?php endif; ?>
	</tbody>
</table>
<!-- </div> -->