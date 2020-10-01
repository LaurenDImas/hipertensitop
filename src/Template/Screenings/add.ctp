<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4>Pemeriksaan</h4>
            <p class="text-subtitle text-muted">Tambah Pemeriksaan</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class='breadcrumb-header'>
                <ol class="breadcrumb">
                    <a href="<?=  $this->Url->build(['controller'=>'Screenings','action'=>'index'])  ?>" class="btn btn-primary round">Kembali</a>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        
        <?= $this->Form->create($screening,['type'=>'file']) ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mt-1">
                            <!-- <p>asd</p> -->
                        <?=
                            $this->Form->control('nama',[
                                'class'=>'form-control m-input',
                                'required' => true,
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-3',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-3 col-xl-2 col-form-label',
                                    'text'=>'Nama *'
                                ],
                            ]);
                        ?>
                    </div>
                    <div class="col-md-6 mt-1">
                         <?=
                            $this->Form->control('telp',[
                                'class'=>'form-control m-input decimal',
                                'required' => true,
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-3',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-3 col-xl-2 col-form-label',
                                    'text'=>'No.HP'
                                ],
                                'type' => 'text'
                            ]);
                        ?>
                    </div>
                    <div class="col-md-6 mt-1">
                         <?=
                            $this->Form->control('birthdate',[
                                'class'=>'form-control m-input datepicker',
                                'required' => true,
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-3',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-3 col-xl-2 col-form-label',
                                    'text'=>'Tanggal Lahir'
                                ],
                                'type' => 'text'
                            ]);
                        ?>
                    </div>

                    <div class="col-md-6 mt-1">
                        <?php
                              echo $this->Form->control('gender',[
                                'class'=>'form-control m-input',
                                'required' => true,
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-3',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-6 col-xl-6 col-form-label',
                                    'text'=>'Jenis Kelamin'
                                ],
                                'options' => [1=>'Laki-Laki',2=>'Perempuan'],
                                'empty' => 'Pilih Jenis Kelamin'
                            ]);
                        ?>
                    </div>

                    <div class="col-md-6 mt-1">
                        <?php
                              echo $this->Form->control('tempat_pengukuran_td',[
                                'class'=>'form-control m-input',
                                'required' => true,
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-3',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-6 col-xl-6 col-form-label',
                                    'text'=>'Tempat Pengukuran TD'
                                ],
                                'options' => [1=>'Klinik',2=>'Luar Klinik'],
                                'empty' => 'Pilih Tempat Pengukuran TD'
                            ]);
                        ?>
                    </div>

                     <div class="col-md-6 mt-1 luar_klinik">
                        <?php
                              echo $this->Form->control('luar_klinik',[
                                'class'=>'form-control m-input',
                                'required' => true,
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-3',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-6 col-xl-6 col-form-label',
                                    'text'=>'Luar Klinik'
                                ],
                                'options' => [1=>'mandiri',2=>'Posbindu'],
                                'empty' => 'Pilih Luar Klinik'
                            ]);
                        ?>
                    </div>


                    <div class="col-md-6 mt-1">
                         <?=
                            $this->Form->control('sistol',[
                                'class'=>'form-control m-input decimal',
                                'required' => true,
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-3',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-3 col-xl-2 col-form-label',
                                    'text'=>'Sistol'
                                ],
                                'type' => 'text'
                            ]);
                        ?>
                    </div>
                    <div class="col-md-6 mt-1">
                         <?=
                            $this->Form->control('diastol',[
                                'class'=>'form-control m-input decimal',
                                'required' => true,
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-3',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-3 col-xl-2 col-form-label',
                                    'text'=>'Diastol'
                                ],
                                'type' => 'text'
                            ]);
                        ?>
                    <input type="hidden" name="status" id="td">
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

<?php $this->start('script');?>
    <script type="text/javascript">
        
        $('.datepicker').datepicker({
            calendarWeeks: true,
            todayHighlight: true,
            autoclose: true,
            format: 'dd-mm-yyyy',
            startView: 2
        });


        $('.decimal').on('input', function (event) { 
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        $('#tempat-pengukuran-td').on('change', function (event) { 
             td =  $('#tempat-pengukuran-td').val();
            // console.log(td);
            tdarah(td);
        });
        function tdarah(td){
            // console.log(td)
            if (td==1) {
                $("#luar-klinik").removeAttr('required');
                $('.luar_klinik').hide();
            }else{
                $("#luar-klinik").attr('required', 'required');
                $('.luar_klinik').show();
            }   
        }
        if ($('#tempat-pengukuran-td').val() == 2){
            tdarah(2);
        }else{
            tdarah(1);
        }

        function calTD(){
            var sistol=$('#sistol').val();
            var diastol=$('#diastol').val();
            if (sistol < 130 && diastol < 85) {
                $('#td').val(1); //normal
            }else if (sistol < 130 && (diastol >= 85 && diastol <= 89)) {
                $('#td').val(2); //normal
            }else if (sistol < 130 && (diastol >= 90 && diastol <= 99)) {
                $('#td').val(3); //normal
            }else if (sistol < 130 && (diastol >= 100)) {
                $('#td').val(4); //normal
            }else if ((sistol >= 130 && sistol <= 139) && diastol < 85) {
                $('#td').val(2); //normal
            }else if ((sistol >= 130 && sistol <= 139) && (diastol >= 85 && diastol <= 89)) {
                $('#td').val(2); //normal
            }else if ((sistol >= 130 && sistol <= 139) && (diastol >= 90 && diastol <= 99)) {
                $('#td').val(3); //normal
            }else if ((sistol >= 130 && sistol <= 139) && (diastol >= 100)) {
                $('#td').val(4); //normal
            }else if ((sistol >= 140 && sistol <= 159) && diastol < 85) {
                $('#td').val(3); //normal
            }else if ((sistol >= 140 && sistol <= 159) && (diastol >= 85 && diastol <= 89)) {
                $('#td').val(3); //normal
            }else if ((sistol >= 140 && sistol <= 159) && (diastol >= 90 && diastol <= 99)) {
                $('#td').val(3); //normal
            }else if ((sistol >= 140 && sistol <= 159) && (diastol >= 100)) {
                $('#td').val(4); //normal
            }else if ((sistol >= 160) && diastol < 85) {
                $('#td').val(4); //normal
            }else if ((sistol >= 160) && (diastol >= 85 && diastol <= 89)) {
                $('#td').val(4); //normal
            }else if ((sistol >= 160) && (diastol >= 90 && diastol <= 99)) {
                $('#td').val(4); //normal
            }else if ((sistol >= 160) && (diastol >= 100)) {
                $('#td').val(4); //normal
            }else{
                $('#td').val(0); //normal
            }
        }
         $(document).on('input','#sistol,#diastol',function(){
            calTD();
        });
         calTD();

    </script>
<?php $this->end();?>