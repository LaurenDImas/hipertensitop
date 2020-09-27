<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hari Hipertensi Sedunia | World Hipertension Day</title>
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/css/uikit.min.css"/>
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--Addons-->
    <link rel="stylesheet" href="/assets/frontend/css/style.css">
    <link rel="shortcut icon" href="/assets/frontend/img/arm.png">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body class="font-regular">
	<div class="uk-position-top-center" style="margin-top:20px;">
	    <a class="font-heavy grey-text-4" href="<?=  $this->Url->build(['controller'=>'Pages','action'=>'index'])  ?>">
	        <img src="<?=$this->Utilities->generateUrlAsset($content->logo_dir,$content->logo);?>" uk-img style="height: 150px;margin-right: 10px;"
	             alt="">
	    </a>
	</div>
	<?=$this->fetch('content');?>
	
    <div class="" style="text-align: center">
        <img src="<?=$this->Utilities->generateUrlAsset($content->footer_dir,$content->footer);?>" uk-img style="height: 70px;margin-bottom: 20px;margin-top: 80px;"
             alt="">
    </div>
	
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- UIkit JS -->
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit-icons.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <?php echo $this->fetch('script');?>
	<script type="text/javascript">
	    // $('#luar_klinik').hide();
	    function showComboLuar() {
	        var con = $('#tempatTD').val();
	        if (con == 1) {
	            $('#luar_klinik').show();
	        }
	    }
	</script>
</body>
</html>