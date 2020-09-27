
<?php  if($pesan->id == 1):?>
    <?php $class = "bg-gradient-noshadow-normal" ?> 
<?php elseif($pesan->id == 2):?>
    <?php $class = "bg-gradient-noshadow-normal-tinggi" ?>
<?php elseif($pesan->id == 3):?>
    <?php $class = "bg-gradient-noshadow" ?>
<?php elseif($pesan->id == 4):?>
    <?php $class = "bg-gradient-noshadow-grade-2" ?>
<?php endif;?>

<div class="uk-container uk-margin-large-bottom" style="margin-top: 200px;">
    <div class="uk-card uk-card-default uk-card-body uk-border-rounded <?= $class ?> uk-animation-scale-down delay-animation"
       style="border-radius: 20px;background-color: #00c853">
      <div class="uk-container">
          <img src="img/arm.svg" uk-img style="height: 300px;z-index: -1;position:relative;bottom: 40px;right: 70px;"
               class="uk-position-bottom-right uk-visible@m" alt="">
          <h3 class="white-text font-heavy uk-heading-small uk-position-z-index">Tekanan darah anda : <br> <?= $pesan->kondisi ?>
          </h3>
          <div class="uk-child-width-expand@s uk-text-center uk-margin-medium-top" uk-grid>
              <div>
                  <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-padding-small background-darken-1"
                       style="z-index: 100;">
                      <p class="white-text font-extrabold uk-text-left"
                         style="font-size: 1.2rem;margin-bottom: 0px;display: block">
                          <?= $pesan->pesan ?>
                      </p>
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
  
  <div class="uk-center" style="margin-top: 30px;margin-left: auto;margin-right: auto;display: block">
      <a href="index.html" class="accent-color" style="text-decoration: underline">Kembali ke home</a>
  </div>
  <!-- Jika Normal tinggi
  <div class="uk-card uk-card-default uk-card-body uk-border-rounded bg-gradient-noshadow-normal-tinggi uk-animation-scale-down delay-animation"
       style="border-radius: 20px;background-color: #00c853">
      <div class="uk-container">
          <img src="img/arm.svg" uk-img style="height: 300px;z-index: -1;position:relative;bottom: 40px;right: 70px;"
               class="uk-position-bottom-right uk-visible@m" alt="">
          <h3 class="white-text font-heavy uk-heading-small uk-position-z-index">Tekanan darah anda : <br> Normal
              Tinggi
          </h3>
          <div class="uk-child-width-expand@s uk-text-center uk-margin-medium-top" uk-grid>
              <div>
                  <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-padding-small background-darken-1"
                       style="z-index: 100;">
                      <p class="white-text font-extrabold uk-text-left"
                         style="font-size: 1.2rem;margin-bottom: 0px;display: block">
                          Waspada, tekanan darah normal mendekati tinggi. Segera kurangi konsumsi pangan yang
                          mengandung gula, garam dan lemak, stop merokok, dan konsumsi alkohol. Cek tekanan darah
                          teratur setiap bulan.
                      </p>
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
  Jika Hipertensi Grade 1
        <div class="uk-card uk-card-default uk-card-body uk-border-rounded bg-gradient-noshadow uk-animation-scale-down delay-animation"
             style="border-radius: 20px;background-color: #00c853">
            <div class="uk-container">
                <img src="img/arm.svg" uk-img style="height: 300px;z-index: -1;position:relative;bottom: 40px;right: 70px;"
                     class="uk-position-bottom-right uk-visible@m" alt="">
                <h3 class="white-text font-heavy uk-heading-small uk-position-z-index">Tekanan darah anda : <br> Hipertensi
                    Grade 1
                </h3>
                <div class="uk-child-width-expand@s uk-text-center uk-margin-medium-top" uk-grid>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-padding-small background-darken-1"
                             style="z-index: 100;">
                            <p class="white-text font-extrabold uk-text-left"
                               style="font-size: 1.2rem;margin-bottom: 0px;display: block">
                                Awas! Konsultasikan tekanan darah anda pada dokter. Segera kurangi konsumsi pangan yang
                                mengandung gula, garam dan lemak, stop merokok, dan konsumsi alkohol. Cek tekanan darah
                                teratur setiap bulan
                            </p>
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
  Jika Hipertensi Grade 2
    <div class="uk-card uk-card-default uk-card-body uk-border-rounded bg-gradient-noshadow-grade-2 uk-animation-scale-down delay-animation"
         style="border-radius: 20px;background-color: #00c853">
        <div class="uk-container">
            <img src="img/arm.svg" uk-img style="height: 300px;z-index: -1;position:relative;bottom: 40px;right: 70px;"
                 class="uk-position-bottom-right uk-visible@m" alt="">
            <h3 class="white-text font-heavy uk-heading-small uk-position-z-index">Tekanan darah anda : <br> Hipertensi
                Grade 2
            </h3>
            <div class="uk-child-width-expand@s uk-text-center uk-margin-medium-top" uk-grid>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-padding-small background-darken-1"
                         style="z-index: 100;">
                        <p class="white-text font-extrabold uk-text-left"
                           style="font-size: 1.2rem;margin-bottom: 0px;display: block">
                            Segera konsultasi dengan dokter sekarang juga! Waspadai tanda bahaya hipertensi, antara lain
                            : sakit kepala hebat, nyeri di dada sebelah kiri, sesak nafas dan penurunan kesadaran
                        </p>
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
    <div class="uk-center" style="margin-top: 30px;margin-left: auto;margin-right: auto;display: block">
        <a href="index.html" class="accent-color" style="text-decoration: underline">Kembali ke home</a>
    </div>
    <div class="" style="text-align: center">
        <img src="img/kemenkes_p2ptm.svg" uk-img style="height: 70px;margin-bottom: 20px;margin-top: 80px;"
             alt="">
    </div>
</div> -->