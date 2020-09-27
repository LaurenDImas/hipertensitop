<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4>Laporan Pemeriksaan</h4>
            <p class="text-subtitle text-muted">Laporan Pemeriksaan Hipertensi</p>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        
		<?= $this->Form->create(null,['type'=>'file','class'=>'m-form']) ?>
	        <div class="card-body">
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="form-group">
			                <?php
			                	  echo $this->Form->control('output',[
			                        'class'=>'form-control m-input',
			                        'required' => true,
			                        'templateVars' => [
			                            'colsize' => 'col-lg-4 col-xl-3',
			                        ],
			                        'label' => [
			                            'class'=> 'col-lg-3 col-xl-2 col-form-label',
			                            'text'=>'Pilih output *'
			                        ],
	                                'options' => [
	                                    'webview' => 'Web View',
	                                    'pdf' => 'PDF',
	                                    'excel' => 'Excel'
	                                ],
			                    ]);
			                ?>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="card-footer d-flex justify-content-start">
	            <button type="submit" class="btn btn-primary mr-1 round btn-submit">Submit</button>
	            <!-- <button type="reset" class="btn btn-light-primary">Cancel</button> -->
	        </div>

		<?=$this->Form->end();?>
    </div>
</div>


<?php $this->start('script');?>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        var form = $(".m-form");
        form.submit(function(e){
            e.preventDefault();
            var btn = $(".btn-submit");
			window.open('<?=$this->Url->build(['action'=>'index']);?>?output='+$("#output").val());
        })

    </script>

<?php $this->end();?>