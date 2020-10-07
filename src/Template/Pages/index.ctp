
<div class="uk-container uk-margin-large-bottom" style="margin-top: 200px;">
    <div class="uk-card uk-card-default uk-card-body uk-border-rounded bg-gradient-noshadow uk-animation-scale-down delay-animation"
         style="border-radius: 20px;">
        <div class="uk-container">
            <img src="<?=$this->Utilities->generateUrlAsset($content->banner1_dir,$content->banner1);?>" uk-img style="height: 400px;z-index: -1;"
                 class="uk-position-bottom-right uk-visible@m" alt="">
            <h3 class="white-text font-heavy uk-heading-medium uk-position-z-index">Cegah Hipertensi.<br><span
                    class="white-text font-heavy uk-heading-small">Hidup Sehat Lebih Lama!</span><br>
            </h3>
            <div class="uk-child-width-expand@s uk-text-center uk-margin-medium-top" uk-grid>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-padding-small background-darken-1"
                         style="z-index: 100;">
                        <a href="#" uk-toggle="target: #modal-sections"
                           class="white-text font-extrabold uk-text-left"
                           style="font-size: 1.2rem;margin-bottom: 0px;display: block">
                            Ayo isi data tekanan darah anda sekarang!
                        </a>
                        <a href="#" uk-toggle="target: #modal-sections"
                           class="brand-chip uk-align-left accent-color-background-3 grey-text-3 uk-border-rounded"
                           style="font-size: 13px;color: #e6e6e6;padding-left: 10px;padding-right: 10px;padding-top: 4px;padding-bottom: 3px;margin-top: 10px">KLIK
                            DISINI</a>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded"
                         style="background-color: rgba(0,0,0,0.1);box-shadow: none;display: none">Item
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="headerz" style="margin-top: 60px;margin-bottom: 20px;">
        <p class="font-heavy grey-text-4 uk-animation-slide-left"
           style="display:inline-block;position:relative;top: 15px;left: 20px;animation-delay: 1s;font-size: 33px;">
            Mengenai Hipertensi <span
                class="accent-color">:</span></p>
        <div id="search_result" class="uk-grid" uk-grid="masonry: true">
            <div class="uk-width-1-2@m uk-width-1-1@s" uk-lightbox="animation: slide">
                <a href="<?=$this->Utilities->generateUrlAsset($content->dir,$content->photo);?>">
                    <img src="/assets/frontend/img/flyer1.png" uk-img class="z-depth-14"
                         style="width: 100%;margin-top: 50px;border-radius: 20px;"
                         alt="">
                </a>
            </div>
            <div class="uk-width-1-2@m uk-width-1-1@s">
                <iframe class="z-depth-14" src="<?=$content->link_1?>" title="Thread embed video"
                        width="100%" height="350px"
                        style="margin-top: 60px;border-radius: 10px;"></iframe>
                <iframe class="z-depth-14" src="<?=$content->link_2?>" title="Thread embed video"
                        width="100%" height="350px"
                        style="margin-top: 60px;border-radius: 10px;"></iframe>
            </div>
        </div>
    </div>
    <div class="uk-card uk-card-default uk-card-body uk-border-rounded bg-gradient-noshadow uk-animation-scale-down delay-animation"
         style="border-radius: 20px;margin-top: 90px;">
        <div class="uk-container">
            <img src="<?=$this->Utilities->generateUrlAsset($content->banner2_dir,$content->banner2);?>" uk-img style="height: 400px;z-index: -1;position:relative;left: 60px;"
                 class="uk-position-bottom-left uk-visible@m" alt="">
            <div class="uk-child-width-expand@s uk-text-center uk-margin-medium-top" uk-grid>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded"
                         style="background-color: rgba(0,0,0,0.1);box-shadow: none;display: none">Item
                    </div>
                </div>
                <div>
                    <h3 class="white-text font-heavy uk-heading-small uk-position-z-index uk-text-left">Ayo input data
                        anda sekarang untuk mengetahui kategori tekanan darah anda!</h3>
                    <a href="#" uk-toggle="target: #modal-sections"
                       class="brand-chip uk-align-left accent-color-background-3 grey-text-3 uk-border-rounded"
                       style="font-size: 15px;color: #e6e6e6;padding-left: 40px;padding-right: 40px;padding-top: 16px;padding-bottom: 12px;margin-top: 10px">KLIK
                        DISINI</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-sections" class="modal-sections" uk-modal>
    <div class="uk-modal-dialog" style="border-radius: 20px !important;">
        <button class="uk-modal-close-default uk-icon-button" type="button" uk-close></button>
        <div class="uk-modal-body" style="border-radius: 20px !important;">
            <h2 class="uk-modal-title font-heavy grey-text-4" style="font-size: 1.5rem;">Isi data tekanan darah
                anda!</h2>
            <div id="post">
               <?= $this->Form->create(null,['type'=>'file','class'=>'kt-form','url' => ['controller' => 'Pages', 'action' => 'add']]) ?>
                    <div class="uk-inline uk-width-1-1" style="margin-top: 10px;">
                        <label class="uk-form-label"
                               style="position: relative;bottom: 10px;">Nama Lengkap</label>
                        <input class="uk-input form-looks font-light" placeholder="Nama Lengkap anda"
                               style="height: 50px;font-size: 14px;" name="nama" type="text" required autocomplete="off">
                    </div>
                    <div class="uk-inline uk-width-1-1" style="margin-top: 30px;">
                        <label class="uk-form-label"
                               style="position: relative;bottom: 10px;">Nomor Handphone</label>
                        <input class="uk-input form-looks font-light decimal" placeholder="No HP anda"
                               style="height: 50px;font-size: 14px;" name="telp" type="text" required autocomplete="off">
                    </div>
                    <div class="uk-inline uk-width-1-1" style="margin-top: 30px;">
                        <label class="uk-form-label"
                               style="position: relative;bottom: 10px;">Tanggal Lahir (bulan-tanggal-tahun, 12-27-1998) </label>
                        <input class="uk-input form-looks font-light" id="date" placeholder="Tanggal Lahir (bulan-hari-tahun) contoh = 12-27-1998"
                               style="height: 50px;font-size: 14px;" name="birthdate" type="date"  required autocomplete="off" >
                    </div>
                    <div class="uk-inline uk-width-1-1" style="margin-top: 30px;">
                        <label class="uk-form-label"
                               style="position: relative;bottom: 10px;">Jenis Kelamin</label>
                        <select class="uk-select form-looks font-light" required name="gender"
                                style="height: 50px;font-size: 14px;">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="1">Pria</option>
                            <option value="2">Wanita</option>
                        </select>
                    </div>
                    <div class="uk-inline uk-width-1-1" style="margin-top: 30px;">
                        <label class="uk-form-label"
                               style="position: relative;bottom: 10px;">Tempat pengukuran Tekanan Darah</label>
                        <select class="uk-select form-looks font-light" required id="tempat-pengukuran-td" onchange="showComboLuar()" name="tempat_pengukuran_td"
                                style="height: 50px;font-size: 14px;">
                            <option value="">Pilih tempat</option>
                            <option value="1">Klinik</option>
                            <option value="2">Luar Klinik</option>
                        </select>
                    </div>
                    <div class="uk-inline uk-width-1-1 luar_klinik" style="margin-top: 30px;">
                        <label class="uk-form-label"
                               style="position: relative;bottom: 10px;">Tempat luar klinik</label>
                        <select class="uk-select form-looks font-light" required id="luar-klinik" name="luar_klinik"
                                style="height: 50px;font-size: 14px;">
                            <option value="">Pilih tempat</option>
                            <option value="1">Mandiri</option>
                            <option value="2">Posbindu</option>
                        </select>
                    </div>
                    <div class="uk-inline uk-width-1-1" style="margin-top: 30px;">
                        <label class="uk-form-label"
                               style="position: relative;bottom: 10px;">Tekanan Darah Sistolik</label>
                        <input class="uk-input form-looks font-light decimal" placeholder="Sistolik"
                               style="height: 50px;font-size: 14px;" name="sistol" id="sistol" type="text" required>
                    </div>
                    <div class="uk-inline uk-width-1-1" style="margin-top: 30px;">
                        <label class="uk-form-label"
                               style="position: relative;bottom: 10px;">Tekanan Darah Diastolik</label>
                        <input class="uk-input form-looks font-light decimal" placeholder="Diastolik"
                               style="height: 50px;font-size: 14px;" name="diastol" id="diastol" type="text" required>
                    </div>

                    <input type="hidden" name="status" id="td">
                    <button type="submit" class="uk-button bg-gradient white-text uk-border-rounded uk-margin-medium-top">Simpan</button>
                <!--     <button onclick="event.preventDefault();document.location.href='<?=  $this->Url->build(['controller'=>'Pages','action'=>'result'])  ?>'"
                            class="uk-button bg-gradient white-text uk-border-rounded uk-margin-medium-top"
                            type="submit">Submit
                    </button> -->
                <?=$this->Form->end();?>
            </div>
        </div>
    </div>
</div>

<?php $this->start('script');?>
<script>
    // alert('ads');
    // $('#date').attr('data-uk-datepicker', '{format:"DD.MM.YYYY"}');
        $('.decimal').on('input', function (event) { 
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        $('#tempat-pengukuran-td').on('change', function (event) { 
             td =  $('#tempat-pengukuran-td').val();
            
            tdarah(td);
        });
        function tdarah(td){
            // 
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


    var form1 = $(".kt-form");
    
    form1.submit(function(e){
        e.preventDefault();
        var form = $(this).closest('.modal-sections').find('form'),
            csrf        = '<?= $this->request->_csrfToken ?>';
            dataForm    = form.serializeArray();

        $.ajax({
            url: '<?=$this->Url->build(['controller'=>'Pages','action'=>'add']);?>',
            dataType: 'json',
            type: 'POST',
            headers: { 'X-XSRF-TOKEN' : csrf },
            data: form.serialize(),
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-Token', csrf);
            },
            beforeSend : function(){
                swal.fire({
                    type : 'info',
                    title: 'Harap menunggu',
                    text: 'Sedang mengirim data',
                    showCancelButton: false,
                    showConfirmButton: false,
                    allowOutsideClick : false,
                    allowEscapeKey : false,
                    allowEnterKey : false
                })
            },
            success: function(response){  
                var td = $('#td').val();

                if(response.code ==  200){
                    swal.fire({
                        title: 'Berhasil',
                        text: response.message,
                        type: 'success',
                        confirmButtonText: 'OK',

                    }).then((result) => {
                        document.location.href="result"
                    });

                }else{
                    swal("Ooopss!!",response.message,'error');
                }
            },
            error: function(){
                swal.fire('Oops','Terjadi kesalahan','error');  

            }
        })
    });

   
    </script>
<?php $this->end();?>