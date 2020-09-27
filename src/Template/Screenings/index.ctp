<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4>Pemeriksaan</h4>
            <p class="text-subtitle text-muted">Data Pemeriksaan</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <a href="<?=  $this->Url->build(['controller'=>'Screenings','action'=>'add'])  ?>" class="btn btn-primary round">Tambah Data</a>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            Data Tabel Pemeriksaan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th width="2%">No</th>
                            <th width="20%">Nama</th>
                            <th width="20%">No.HP</th>
                            <th width="20%">Tanggal Lahir</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0; foreach($record as $r):?>
                            <tr>
                                <td><?= $no += 1 ?></td>
                                <td><?= $r->nama ?></td>
                                <td><?= $r->telp ?></td>
                                <td><?= (!empty($r->birthdate)?$this->Utilities->indonesiaDateFormat($r->birthdate->format('Y-m-d')) : '-' ) ?></td>
                                <td> 
                                    <?= $this->Html->link(
                                        '<i data-feather="edit-2"></i>',
                                        ['action' => 'edit', $r->id],
                                        ['escape' => false, 'title' => __('Edit'), 'class' => '']
                                    ) ?>

                                    <?= $this->Html->link(
                                        '<i data-feather="eye"></i>',
                                        ['action' => 'view', $r->id],
                                        ['escape' => false, 'title' => __('detail'), 'class' => '']
                                    ) ?>
                                    
                                    <a class="btn-delete-on-table " href="<?=  $this->Url->build(['controller'=>'Screenings','action'=>'delete'])?>/<?= $r->id ?>" id="delete">
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