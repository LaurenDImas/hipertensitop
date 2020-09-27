<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4>Users</h4>
            <p class="text-subtitle text-muted">Data User</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <a href="<?=  $this->Url->build(['controller'=>'Users','action'=>'add'])  ?>" class="btn btn-primary round">Tambah Data</a>
                </ol>
            </nav>
        </div>
    </div>
</div>
<section class="section">
    <div class="card">
        <div class="card-header">
            Data Tabel Users
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th width="2%">No</th>
                            <th width="20%">Username</th>
                            <th width="20%">Role</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <!--   <a class="btn-delete-on-table" href="<?=  $this->Url->build(['controller'=>'Users','action'=>'delete'])?>/<?= $r->id ?>" id="delete">
                                        <i data-feather="trash-2" width="20"></i> 
                                    </a>
                                    <a class="" href="/users/edit/<?= $r->id ?>">
                                    <i data-feather="edit-2" width="20"></i> 
                                    </a>

                                    <a class="" href="/users/view/<?= $r->id ?>">
                                    <i data-feather="eye" width="20"></i>  -->
                    <tbody>
                        <?php $no=0; foreach($record as $r):?>
                            <tr>
                                <td><?= $no += 1 ?></td>
                                <td><?= $r->username ?></td>
                                <td><?= $r->role->name ?></td>
                                <td> 
                                    <?= $this->Html->link(
                                        '<i data-feather="edit-2"></i>',
                                        ['action' => 'edit', $r->id],
                                        ['escape' => false, 'title' => __('View')]
                                    ) ?>

                                    <?= $this->Html->link(
                                        '<i data-feather="eye"></i>',
                                        ['action' => 'view', $r->id],
                                        ['escape' => false, 'title' => __('View')]
                                    ) ?>
                                    
                                    <a class="" href="<?=  $this->Url->build(['controller'=>'Users','action'=>'delete'])?>/<?= $r->id ?>" id="delete">
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
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<?php $this->end();?>