<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 mt-2 order-md-1 order-last">
            <h4>Mengenai Hipertensi</h4>
            <p class="text-subtitle text-muted">Tambah Mengenai Hipertensi</p>
        </div>
        <div class="col-12 col-md-6 mt-2 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <a href="<?=  $this->Url->build(['controller'=>'content','action'=>'index'])  ?>" class="btn btn-primary round">Kembali</a>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <style type="text/css">
            fieldset {
                border: 1px solid black;
                display: inline-block;
                font-size: 14px;
                font-family: Arial, Helvetica;
                padding: 1em 2em;
                }

                legend {
                background: #BFD48C;     /* Hijau */
                color: black;          /* Putih */
                margin-bottom: 10px;
                padding: 0.5em 1em;
                }
        </style>
        <?= $this->Form->create($content,['type'=>'file']) ?>
            <div class="card-body">
                
                <div class="col-md-6 mt-2 mt-2">
                    <div class="form-group">
                        <?php
                              echo $this->Form->control('status',[
                                'class'=>'form-control m-input',
                                'required' => true,
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-3',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-4 col-xl-4 col-form-label',
                                    'text'=>'Status'
                                ],
                                'options'=>[1=>'Tampilkan',2=>'Tidak ditampilkan'],
                                'empty' => 'Pilih Status'
                            ]);
                        ?>
                    </div>
                </div>

                <fieldset style="width: 100%">
                    <legend>Header</legend>
                    <div class="row">
                        <div class="col-md-6 mt-2">
                             <?=
                                $this->Form->control('logo',[
                                    'class'=>'form-control m-input',
                                    'required' => false,
                                    'templateVars' => [
                                        'colsize' => 'col-lg-4 col-xl-3',
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-4 col-xl-4 col-form-label',
                                        'text'=>'Logo Header *'
                                    ],
                                    'type' => 'file'
                                ]);
                            ?>
                        </div>
                        <div class="col-md-2 mt-2">
                            <div id="image_view">
                                <?php if(!empty($content->logo)):?>
                                    <img id="logo_image" width="200px" src="<?=$this->Utilities->generateUrlAsset($content->logo_dir,$content->logo);?>">
                                <?php else:?>
                                    <img id="logo_image">
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset style="width: 100%" class="mt-3">
                    <legend>Banner Atas</legend>

                    <div class="row">
                        <div class="col-md-6 mt-2">
                             <?=
                                $this->Form->control('banner1',[
                                    'class'=>'form-control m-input',
                                    'required' => false,
                                    'templateVars' => [
                                        'colsize' => 'col-lg-4 col-xl-3',
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-4 col-xl-4 col-form-label',
                                        'text'=>'Logo Banner Atas *'
                                    ],
                                    'type' => 'file'
                                ]);
                            ?>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div id="image_view">
                                <?php if(!empty($content->banner1)):?>
                                    <img id="banner1_image" width="200px" src="<?=$this->Utilities->generateUrlAsset($content->banner1_dir,$content->banner1);?>">
                                <?php else:?>
                                    <img id="banner1_image">
                                <?php endif;?>
                            </div>
                        </div>


                        <!-- <div class="col-md-6 mt-2">
                             
                            <?=
                                $this->Form->control('banner1_title',[
                                    'class'=>'form-control m-input',
                                    'required' => true,
                                    'templateVars' => [
                                        'colsize' => 'col-lg-4 col-xl-3',
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-4 col-xl-4 col-form-label',
                                        'text'=>'Judul Banner Atas *'
                                    ],
                                ]);
                            ?>
                        </div>


                        <div class="col-md-6 mt-2">
                             
                            <?=
                                $this->Form->control('banner1_desc',[
                                    'class'=>'form-control m-input',
                                    'required' => true,
                                    'templateVars' => [
                                        'colsize' => 'col-lg-4 col-xl-3',
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-4 col-xl-4 col-form-label',
                                        'text'=>'Deskrisi Banner Atas *'
                                    ],
                                ]);
                            ?>
                        </div> -->
                    </div>
                </fieldset>


                <fieldset style="width: 100%" class="mt-3">
                    <legend>Mengenai Hipertensi</legend>

                    <div class="row">
                        
                        <div class="col-md-6 mt-2">
                             <?=
                                $this->Form->control('photo',[
                                    'class'=>'form-control m-input',
                                    'required' => false,
                                    'templateVars' => [
                                        'colsize' => 'col-lg-4 col-xl-3',
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-4 col-xl-4 col-form-label',
                                        'text'=>'Gambar *'
                                    ],
                                    'type' => 'file'
                                ]);
                            ?>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div id="image_view">
                                <?php if(!empty($content->photo)):?>
                                    <img id="photo_image" width="200px" src="<?=$this->Utilities->generateUrlAsset($content->dir,$content->photo);?>">
                                <?php else:?>
                                    <img id="photo_image">
                                <?php endif;?>
                            </div>
                        </div>
                     <!--    <div class="col-md-6 mt-2">
                             
                            <?=
                                $this->Form->control('name',[
                                    'class'=>'form-control m-input',
                                    'required' => true,
                                    'templateVars' => [
                                        'colsize' => 'col-lg-4 col-xl-3',
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-4 col-xl-4 col-form-label',
                                        'text'=>'Judul *'
                                    ],
                                ]);
                            ?>
                        </div> -->
                        <div class="col-md-6 mt-2">
                             
                            <?=
                                $this->Form->control('link_1',[
                                    'class'=>'form-control m-input',
                                    'required' => true,
                                    'templateVars' => [
                                        'colsize' => 'col-lg-4 col-xl-3',
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-4 col-xl-4 col-form-label',
                                        'text'=>'Link Youtube 1 *'
                                    ],
                                ]);
                            ?>
                        </div>
                        <div class="col-md-6 mt-2">
                             
                            <?=
                                $this->Form->control('link_2',[
                                    'class'=>'form-control m-input',
                                    'required' => true,
                                    'templateVars' => [
                                        'colsize' => 'col-lg-4 col-xl-3',
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-4 col-xl-4 col-form-label',
                                        'text'=>'Link Youtube 2 *'
                                    ],
                                ]);
                            ?>
                        </div>
                    </div>
                </fieldset>

                <fieldset style="width: 100%" class="mt-3">
                    <legend>Banner Bawah</legend>

                    <div class="row">
                        <div class="col-md-6 mt-2">
                             <?=
                                $this->Form->control('banner2',[
                                    'class'=>'form-control m-input',
                                    'required' => false,
                                    'templateVars' => [
                                        'colsize' => 'col-lg-4 col-xl-3',
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-4 col-xl-4 col-form-label',
                                        'text'=>'Logo Banner Bawah* '
                                    ],
                                    'type' => 'file'
                                ]);
                            ?>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div id="image_view">
                                <?php if(!empty($content->banner2)):?>
                                    <img id="banner2_image" width="200px" src="<?=$this->Utilities->generateUrlAsset($content->banner2_dir,$content->banner2);?>">
                                <?php else:?>
                                    <img id="banner2_image">
                                <?php endif;?>
                            </div>
                        </div>

<!-- 
                        <div class="col-md-6 mt-2">
                             
                            <?=
                                $this->Form->control('banner2_title',[
                                    'class'=>'form-control m-input',
                                    'required' => true,
                                    'templateVars' => [
                                        'colsize' => 'col-lg-4 col-xl-3',
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-4 col-xl-4 col-form-label',
                                        'text'=>'Judul Banner Bawah*'
                                    ],
                                ]);
                            ?>
                        </div>
 -->

                        <!-- <div class="col-md-6 mt-2"> -->
                             
                            <!-- <?=
                                $this->Form->control('banner2_desc',[
                                    'class'=>'form-control m-input',
                                    'required' => true,
                                    'templateVars' => [
                                        'colsize' => 'col-lg-4 col-xl-3',
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-4 col-xl-4 col-form-label',
                                        'text'=>'Deskrisi Banner Bawah*'
                                    ],
                                ]);
                            ?>
                        </div> -->
                    </div>
                </fieldset>


                 <fieldset style="width: 100%" class="mt-3">
                    <legend>Footer</legend>
                    <div class="row">
                        <div class="col-md-6 mt-2">
                             <?=
                                $this->Form->control('footer',[
                                    'class'=>'form-control m-input',
                                    'required' => false,
                                    'templateVars' => [
                                        'colsize' => 'col-lg-4 col-xl-3',
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-4 col-xl-4 col-form-label',
                                        'text'=>'Footer*'
                                    ],
                                    'type' => 'file'
                                ]);
                            ?>
                        </div>
                        <div class="col-md-2 mt-2">
                            <div id="image_view">
                                <?php if(!empty($content->footer)):?>
                                    <img id="footer_image" width="200px" src="<?=$this->Utilities->generateUrlAsset($content->footer_dir,$content->footer);?>">
                                <?php else:?>
                                    <img id="footer_image">
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </fieldset>


            </div>

            <div class="card-footer d-flex justify-content-start">
                <button type="submit" class="btn btn-primary mr-1 round ">Simpan</button>
                <!-- <button type="reset" class="btn btn-light-primary">Cancel</button> -->
            </div>

        <?=$this->Form->end();?>
    </div>
</div>

<?php $this->start('script');?>
<script type="text/javascript">
      function logo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#logo_image')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function banner1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#banner1_image')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    function banner2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#banner2_image')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    function footer(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#footer_image')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function photo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo_image')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#logo").change(function () {
        logo(this);
    });

    $("#photo").change(function () {
        photo(this);
    });


    $("#banner1").change(function () {
        banner1(this);
    });

    $("#banner2").change(function () {
        banner2(this);
    });


    $("#footer").change(function () {
        footer(this);
    });


</script>
<?php $this->end();?>