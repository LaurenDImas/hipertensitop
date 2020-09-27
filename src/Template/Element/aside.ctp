<?php
  $c_name = $this->request->getParam('controller');
  $a_name = $this->request->getParam('action');
  // echo $c_name;
  // exit();
?>
<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
   <img src="/assets/frontend/img/logo_2.png" uk-img style="height: 100px; "
               alt="">       
             </div>
        <div class="sidebar-menu" style="margin-top: -40px!important;">
            <ul class="menu">
                
                
            
                <?php if(in_array($userData['role_id'],[1,2,3])):?>
                  <?php if($c_name=='Dashboard' && $a_name == 'index'): ?>
                    <li class='sidebar-item active'> 
                  <?php else:?>
                    <li class='sidebar-item'> 
                  <?php endif;?>    
                      <a href="<?=  $this->Url->build(['controller'=>'Dashboard','action'=>'index'])  ?>" class='sidebar-link'>
                          <i data-feather="home" width="20"></i> 
                          <span>Dashboard</span>
                      </a>
                    </li> 
                <?php endif;?>     

                <?php if(in_array($userData['role_id'],[1])):?>
                <li class='sidebar-title'>Main Menu</li>
                  <?php if($c_name=='Users' && $a_name == 'index'): ?>
                    <li class='sidebar-item active'> 
                  <?php else:?>
                    <li class='sidebar-item'> 
                  <?php endif;?>  
                      <a href="<?=  $this->Url->build(['controller'=>'Users','action'=>'index'])  ?>" class='sidebar-link'>
                          <i data-feather="home" width="20"></i> 
                          <span>Users</span>
                      </a>
                    </li>
                <?php endif;?>                 
                
                <?php if(in_array($userData['role_id'],[1])):?>
                  <?php if($c_name=='Screenings' && $a_name == 'index'): ?>
                    <li class='sidebar-item active'> 
                  <?php else:?>
                    <li class='sidebar-item'> 
                  <?php endif;?>  
                      <a href="<?=  $this->Url->build(['controller'=>'Screenings','action'=>'index'])  ?>" class='sidebar-link'>
                          <i data-feather="home" width="20"></i> 
                          <span>Pemeriksaan</span>
                      </a>
                      
                    </li>
                <?php endif;?>  


                <?php if(in_array($userData['role_id'],[1,3])):?>
                <li class='sidebar-title'>Konten</li>               
                  <?php if($c_name=='Contents' && $a_name == 'index'): ?>
                    <li class='sidebar-item active'> 
                  <?php else:?>
                    <li class='sidebar-item'> 
                  <?php endif;?>  
                      <a href="<?=  $this->Url->build(['controller'=>'Contents','action'=>'index'])  ?>" class='sidebar-link'>
                          <i data-feather="home" width="20"></i> 
                          <span>Konten</span>
                      </a>
                    </li>
                  <?php endif;?>  

                <?php if(in_array($userData['role_id'],[1,2])):?>
                <li class='sidebar-title'>Laporan</li>
                  <?php if($c_name=='ReportScreenings' && $a_name == 'index'): ?>
                    <li class='sidebar-item active'> 
                  <?php else:?>
                    <li class='sidebar-item'> 
                  <?php endif;?>  
                      <a href="<?=  $this->Url->build(['controller'=>'ReportScreenings','action'=>'index'])  ?>" class='sidebar-link'>
                          <i data-feather="home" width="20"></i> 
                          <span>Laporan Pendataan Tekanan Darah</span>
                      </a>
                      
                  </li>
                <?php endif;?>  

                <?php if(in_array($userData['role_id'],[1,2])):?>
                  <?php if($c_name=='ReportGender' && $a_name == 'index'): ?>
                    <li class='sidebar-item active'> 
                  <?php else:?>
                    <li class='sidebar-item'> 
                  <?php endif;?>  
                      <a href="<?=  $this->Url->build(['controller'=>'ReportGender','action'=>'index'])  ?>" class='sidebar-link'>
                          <i data-feather="home" width="20"></i> 
                          <span>Hasil Pemeriksaan Berdasarkan Jenis Kelamin</span>
                      </a>
                      
                  </li>
                  <?php endif;?>  

                <?php if(in_array($userData['role_id'],[1,2])):?>
                  <?php if($c_name=='ReportPlace' && $a_name == 'index'): ?>
                    <li class='sidebar-item active'> 
                  <?php else:?>
                    <li class='sidebar-item'> 
                  <?php endif;?>  
                      <a href="<?=  $this->Url->build(['controller'=>'ReportPlace','action'=>'index'])  ?>" class='sidebar-link'>
                          <i data-feather="home" width="20"></i> 
                          <span>Hasil Pemeriksaan Berdasarkan Tempat</span>
                      </a>
                      
                    </li>
                <?php endif;?>  

                <?php if(in_array($userData['role_id'],[1,2])):?>
                    <?php if($c_name=='ReportMatriks' && $a_name == 'index'): ?>
                      <li class='sidebar-item active'> 
                    <?php else:?>
                      <li class='sidebar-item'> 
                    <?php endif;?>  
                        <a href="<?=  $this->Url->build(['controller'=>'ReportMatriks','action'=>'index'])  ?>" class='sidebar-link'>
                            <i data-feather="home" width="20"></i> 
                            <span>Matriks Data Cegah Hipertensi</span>
                        </a>
                        
                    </li>
                <?php endif;?>  
                
             
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
