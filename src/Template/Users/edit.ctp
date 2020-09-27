<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4>Users</h4>
            <p class="text-subtitle text-muted">Edit User</p>
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
        
            <?php unset($user->password);?>
        <?= $this->Form->create($user,['type'=>'file']) ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                            <!-- <p>asd</p> -->
                        <?=
                            $this->Form->control('username',[
                                'class'=>'form-control m-input',
                                'required' => true,
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-3',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-3 col-xl-2 col-form-label',
                                    'text'=>'Username *'
                                ],
                            ]);
                        ?>
                    </div>
                    <div class="col-md-6">
                         <?=
                            $this->Form->control('password',[
                                'class'=>'form-control m-input',
                                'required' => true,
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-3',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-3 col-xl-2 col-form-label',
                                    'text'=>'Password *'
                                ],
                                'type' => 'password'
                            ]);
                        ?>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <?php
                                  echo $this->Form->control('role_id',[
                                    'class'=>'form-control m-input',
                                    'required' => true,
                                    'templateVars' => [
                                        'colsize' => 'col-lg-4 col-xl-3',
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-3 col-xl-2 col-form-label',
                                        'text'=>'Role User *'
                                    ],
                                    'empty' => 'Pilih role user'
                                ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-start">
                <button type="submit" class="btn btn-primary mr-1 round ">Simpan</button>
                <!-- <button type="reset" class="btn btn-light-primary">Cancel</button> -->
            </div>

        <?=$this->Form->end();?>
    </div>
</div>