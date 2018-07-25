<?php
  $hakakses=$this->session->userdata('userHakakses');
?>  
	<!-- BEGIN CONTAINER -->
	<div id="container" class="row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div id="sidebar" class="nav-collapse collapse">
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

			
			<!-- BEGIN SIDEBAR MENU -->
            <ul class="sidebar-menu">
                <li class="<?php if($link=='' ||$link=="dashboard"){echo'active';}?>">
                    <a href="<?=base_url()?>dashboard" class="">
                        <span class="icon-box"> <i class="icon-home"></i></span> Dashboard
                        
                    </a>
                </li>
                <?php 
                  

                  if($hakakses=='Admin'){
                ?>
                <li class="has-sub <?php if($link=='calonnasabah' ||$link=="nasabah"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Master
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='calonnasabah'){echo'active';}?>"><a href="<?=base_url()?>nasabah_control/listcalonnasabah">Calon Nasabah </a></li>
                        <li class="<?php if($link=='nasabah'){echo'active';}?>"><a href="<?=base_url()?>nasabah_control/listnasabah">Nasabah</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=='pengajuan' ||$link=="diterima"||$link=="ditolak"||$link=="pembayaran"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-cogs"></i></span> Transaksi
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='pengajuan'){echo'active';}?>"><a href="<?=base_url()?>pembiayaan_control">Pengajuan Pembiayaan</a></li>
                        <li class="<?php if($link=='diterima'){echo'active';}?>" ><a href="<?=base_url()?>pembiayaan_control/listditerimaadmin">Pembiayaan Diterima</a></li>
                        <li class="<?php if($link=='ditolak'){echo'active';}?>" ><a href="<?=base_url()?>pembiayaan_control/listditolakadmin">Pembiayaan Ditolak</a></li>
                       
                    </ul>
                </li>
                <li class="has-sub <?php if($link=="laporanditerima"||$link=="laporanditolak"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Laporan
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=="laporanditerima"){echo'active';}?>"><a class="" href="<?=base_url()?>laporan_control">Laporan Pembiayaan Diterima</a></li>
                        <li class="<?php if($link=="laporanditolak"){echo'active';}?>"><a class="" href="<?=base_url()?>laporan_control/ditolak">Laporan Pembiayaan Ditolak</a></li>
                    </ul>
                </li>
                <?php
                  }elseif ($hakakses=='Teller'){
                ?>
                <li class="has-sub <?php if($link=='pengajuan' ||$link=="diterima"||$link=="ditolak"||$link=="pembayaran"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-cogs"></i></span> Transaksi
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        
                        <li class="<?php if($link=='diterima'){echo'active';}?>" ><a href="<?=base_url()?>pembiayaan_control/listditerimaadmin">Pembiayaan Diterima</a></li>
                        
                       
                    </ul>
                </li>
                <?php     
                  }else{
                ?>
                <!-- <li><a class="" href="<?php echo base_url() ?>Adm_dash"><span class="icon-box"><i class="icon-dashboard"></i></span> Dashboard</a></li>   -->              
                <li class="has-sub <?php if($link=='calonnasabah' ||$link=="nasabah"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Master
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='calonnasabah'){echo'active';}?>"><a href="<?=base_url()?>nasabah_control/listcalonnasabah">Calon Nasabah </a></li>
                        <li class="<?php if($link=='nasabah'){echo'active';}?>"><a href="<?=base_url()?>nasabah_control/listnasabah">Nasabah</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=='pengajuan' ||$link=="diterima"||$link=="ditolak"||$link=="pembayaran"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-cogs"></i></span> Transaksi
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='pengajuan'){echo'active';}?>"><a href="<?=base_url()?>pembiayaan_control">Pengajuan Pembiayaan</a></li>
                        <li class="<?php if($link=='diterima'){echo'active';}?>" ><a href="<?=base_url()?>pembiayaan_control/listditerimaadmin">Pembiayaan Diterima</a></li>
                        <li class="<?php if($link=='ditolak'){echo'active';}?>" ><a href="<?=base_url()?>pembiayaan_control/listditolakadmin">Pembiayaan Ditolak</a></li>
                       
                    </ul>
                </li>
                 <li class="has-sub <?php if($link=="laporanditerima"||$link=="laporanditolak"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Laporan
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=="laporanditerima"){echo'active';}?>"><a class="" href="<?=base_url()?>laporan_control">Laporan Pembiayaan Diterima</a></li>
                        <li class="<?php if($link=="laporanditolak"){echo'active';}?>"><a class="" href="<?=base_url()?>laporan_control/ditolak">Laporan Pembiayaan Ditolak</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=='userlogin'){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-user"></i></span> User
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='userlogin'){echo'active';}?>"><a class="" href="<?=base_url()?>userlogin_control">List User</a></li>
                    </ul>
                </li>
                <?php
                  }
                ;?>

            	
            </ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->