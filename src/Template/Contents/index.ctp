<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4>Halaman Depan</h4>
            <p class="text-subtitle text-muted">Data Halaman Depan</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <a href="<?=  $this->Url->build(['controller'=>'Contents','action'=>'add'])  ?>" class="btn btn-primary round">Tambah Data</a>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            Data Tabel Halaman Depan<br>Hanya Menampilkan data terakhir input ke halaman awal
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th width="2%">No</th>
                            <th width="10%">Header</th>
                            <th width="10%">Banner Atas</th>
                            <th width="10%">Mengenai Hipertensi</th>
                            <th width="10%">Link Youtube 1</th>
                            <th width="10%">Link Youtube 2</th>
                            <th width="10%">Banner Bawah</th>
                            <th width="10%">Footer</th>
                            <th width="10%">Status</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0; foreach($record as $r):?>
                            <tr>
                                <td><?= $no += 1 ?></td>
                                <td><img src="<?=$this->Utilities->generateUrlAsset($r->logo_dir,$r->logo);?>"  width="120px" /></td>
                                <td><img src="<?=$this->Utilities->generateUrlAsset($r->banner1_dir,$r->banner1);?>"  width="120px" /></td>
                                <td><img src="<?=$this->Utilities->generateUrlAsset($r->dir,$r->photo);?>"  width="120px" /></td>
                                <td><iframe class="embed-responsive-item" src="<?= $r->link_1 ?>" allowfullscreen></iframe></td>
                                <td><iframe class="embed-responsive-item" src="<?= $r->link_2 ?>" allowfullscreen></iframe></td>

                                <td><img src="<?=$this->Utilities->generateUrlAsset($r->banner2_dir,$r->banner2);?>"  width="120px" /></td>
                                <td><img src="<?=$this->Utilities->generateUrlAsset($r->footer_dir,$r->footer);?>"  width="120px" /></td>
                                <td><?= ($r->status)? 'Aktif' : 'Tidak'?></td>
                                <td> 
                                    <?= $this->Html->link(
                                        '<i data-feather="edit-2"></i>',
                                        ['action' => 'edit', $r->id],
                                        ['escape' => false, 'title' => __('Edit'), 'class' => '']
                                    ) ?>&nbsp;

                                  <!--   <?= $this->Html->link(
                                        '<i data-feather="eye"></i>',
                                        ['action' => 'view', $r->id],
                                        ['escape' => false, 'title' => __('detail'), 'class' => '']
                                    ) ?> -->
                                    
                                    <a class="btn-delete-on-table " href="<?=  $this->Url->build(['controller'=>'Contents','action'=>'delete'])?>/<?= $r->id ?>" id="delete">
                                        <i data-feather="trash-2" width="20"></i> 
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<?php $this->start('script');?>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>   
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Data Gagal Dihapus!");
                  }
                });
            });
</script>
<script type="text/javascript">
    
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<?php $this->end();?>