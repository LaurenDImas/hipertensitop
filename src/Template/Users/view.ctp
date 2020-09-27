<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4>Users</h4>
            <p class="text-subtitle text-muted">Detail User</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <a href="<?=  $this->Url->build(['controller'=>'Users','action'=>'index'])  ?>" class="btn btn-primary round">Kembali</a>
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
                                <td class="text-bold-500" width="20%">Username</td>
                                <td width="1%">:</td>
                                <td class="text-left"><?= $user->username ?></td>
                            </tr>
                            <tr>
                                <td class="text-bold-500">Michael Right</td>
                                <td width="1%">:</td>
                                <td class="text-left"><?= $user->role->name ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>