<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4>Pemeriksaan</h4>
            <p class="text-subtitle text-muted">Detail Pemeriksaan</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <a href="<?=  $this->Url->build(['controller'=>'Screnings','action'=>'index'])  ?>" class="btn btn-primary round">Kembali</a>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">

        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <tbody>
                            <tr>
                                <td class="text-bold-500" width="20%">Nama</td>
                                <td width="1%">:</td>
                                <td class="text-left"><?= $screening->name ?></td>
                            </tr>
                            
                            <tr>
                                <td class="text-bold-500">No.HP</td>
                                <td width="1%">:</td>
                                <td class="text-left"><?= $screening->telp ?></td>
                            </tr>
                            
                            <tr>
                                <td class="text-bold-500">Tanggal Lahir</td>
                                <td width="1%">:</td>
                                <td class="text-left"><?= (!empty($screening->birthdate)?$this->Utilities->indonesiaDateFormat($screening->birthdate->format('Y-m-d')) : '-' ) ?></td>
                            </tr>
                            
                            <tr>
                                <td class="text-bold-500">Jenis Kelamin</td>
                                <td width="1%">:</td>
                                <td class="text-left"><?= (!empty($screening->gender)?$this->Utilities->gender($screening->gender) : '-' ) ?></td>
                            </tr>
                            
                            <tr>
                                <td class="text-bold-500">Tempat Pengukuran TD</td>
                                <td width="1%">:</td>
                                <td class="text-left"><?= (!empty($screening->tempat_pengukuran_td)?$this->Utilities->tempat($screening->tempat_pengukuran_td) : '-' ) ?></td>
                            </tr>

                            <tr>
                                <td class="text-bold-500">Luar Klinik</td>
                                <td width="1%">:</td>
                                <td class="text-left"><?= (!empty($screening->luar_klinik)?$this->Utilities->luar($screening->luar_klinik) : '-' ) ?></td>
                            </tr>
                            
                            <tr>
                                <td class="text-bold-500">Sistol</td>
                                <td width="1%">:</td>
                                <td class="text-left"><?= $screening->sistol ?></td>
                            </tr>

                            <tr>
                                <td class="text-bold-500">Diastol</td>
                                <td width="1%">:</td>
                                <td class="text-left"><?= $screening->diastol ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>