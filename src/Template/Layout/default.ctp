<?php
  $c_name = $this->request->getParam('controller');
  $a_name = $this->request->getParam('action');
  // echo $c_name;
  // exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Hipertensi</title>
    
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/assets/frontend/img/arm.png" type="image/x-icon">


    <link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>


<style type="text/css">
    input[type="text"] {
        font-family: monospace;
        font-size: 15px;
    }
    b,p,td{
        font-family: arial;
    }
    .bg-biru {
        box-shadow: 1px 2px 5px rgba(47, 170, 244, 0.5);
        background: linear-gradient(to bottom, #25a6f1, #54b9ff);
        border: none;
    }
    tspan{
        color : red!important;
    }
    * {
        font-family: "arial";
    }
</style>
</head>
<body>
    <div id="app">
        <?=$this->element('aside');?>
        <div id="main">
           <?= $this->element('header');?>
            
            <div class="main-content container-fluid">
                <?= $this->Flash->render();?>
                <?=$this->fetch('content');?>
            </div>

            
            <?=$this->element('footer');?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="/assets/js/feather-icons/feather.min.js"></script>
    <script src="/assets/js/DataTables.cakephp.dataTables.js"></script>
    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/app.js"></script>
    
    <script src="/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                    <?php if($c_name=='Dashboard' && $a_name == 'index'): ?>
            <!-- <script src="/assets/js/pages/dashboard.js"></script> -->
        <?php endif;?>

    <script src="/assets/js/main.js"></script>
    <?php echo $this->fetch('script');?>
</body>
</html>
