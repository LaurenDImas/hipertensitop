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
		<th class="header">Laporan Pendataan Tekanan Darah</th>
	</tr>
</table><br>
<!-- <div class="table-responsive-lg"> -->
<table class="table table-condensed table-bordered table-res" border="1" style="font-size:12px;">
	<thead>
	   
	    <tr>
	        <th class="head" style="width: 1%;">No</th>
	        <th class="head" width='10%'>Nama</th>
	        <th class="head" width='10%'>Nomor Handphone</th>
	        <th class="head" width='10%'>Tanggal Lahir</th>
			<th class="head" width='10%'>Jenis Kelamin</th>
			<th class="head" width='10%'>Tempat Pengukuran Tekanan Darah</th>
			<th class="head" width='10%'>Sistol</th>
			<th class="head" width='10%'>Diastolik</th>
			<th class="head" width='10%'>Kondisi</th>
	    </tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php if (!empty($results)): ?>
            <?php foreach ($results as $r): ?>
			<tr>
				<td style="text-align: center;"><?= $no++ ?></td>
				<td><?=  $r->nama ?></td>
				<td  style="text-align: right;"><?=  $r->telp ?></td>
 				<td><?= (!empty($r->birthdate)?$this->Utilities->indonesiaDateFormat($r->birthdate->format('Y-m-d')) : '-' ) ?></td>
                <td><?= (!empty($r->gender)?$this->Utilities->gender($r->gender) : '-' ) ?></td>
<td><?=$this->Utilities->tempat($r->tempat_pengukuran_td)?><?= ($r->tempat_pengukuran_td == 2) ?  '('.$this->Utilities->luar($r->luar_klinik) .')':'' ?></td>
                <td style="text-align: right;"><?=  $r->sistol ?></td>
				<td style="text-align: right;"><?=  $r->diastol ?></td>
				<td style="text-align: left;"><?=  $this->Utilities->hasil($r->status) ?></td>
 				
			</tr>
		<?php endforeach;?>
	<?php endif; ?>
	</tbody>
</table>
<!-- </div> -->