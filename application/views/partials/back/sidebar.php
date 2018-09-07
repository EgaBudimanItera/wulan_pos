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
                    <a href="<?=base_url()?>c_dashboard" class="">
                        <span class="icon-box"> <i class="icon-home"></i></span> Dashboard
                        
                    </a>
                </li>
                <!-- JIKA GUDANG-->
                <?php
                if($hakakses=='Gudang'){
                ?>
                <li class="has-sub <?php if($link=='satuan'||$link=="barang"||$link=="pelanggan"||$link=="supplier"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Master
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='satuan'){echo'active';}?>"><a href="<?=base_url()?>c_satuan">Satuan</a></li>
                        <li class="<?php if($link=='barang'){echo'active';}?>"><a href="<?=base_url()?>c_barang">Barang</a></li>
                        
                    </ul>
                </li>
                <!-- <li class="has-sub <?php if($link=='pembelian' ||$link=="penjualan"||$link=="returpembelian"||$link=="returpenjualan"||$link=="bayarutang"||$link=="bayarpiutang"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-cogs"></i></span> Transaksi
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='pembelian'){echo'active';}?>"><a href="<?=base_url()?>c_pembelian">Pembelian</a></li>
                       
                        <li class="<?php if($link=='returpembelian'){echo'active';}?>" ><a href="<?=base_url()?>c_returpembelian">Retur Pembelian</a></li>
                       
                    </ul>
                </li> -->
                <li class="has-sub <?php if($link=="lapstok"||$link=="laputang"||$link=="lappiutang"||$link=="lappembelian"||$link=="lappenjualan"||$link=="lapreturbeli"||$link=="lapreturjual"||$link=="lapkas"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Laporan
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        
                        <li class="<?php if($link=="lapstok"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lapstok">Stok</a></li>
                      
                        <!-- <li class="<?php if($link=="lappembelian"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lappembelian">Pembelian</a></li>
                       
                        <li class="<?php if($link=="lapreturbeli"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lapreturbeli">Retur Pembelian</a></li> -->
                        
                       
                    </ul>
                </li>
                <!-- JIKA PENJUALAN-->
                <?php    
                }else if($hakakses=='Penjualan'){
                ?>
                <li class="has-sub <?php if($link=='satuan'||$link=="barang"||$link=="pelanggan"||$link=="supplier"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Master
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='pelanggan'){echo'active';}?>"><a href="<?=base_url()?>c_pelanggan">Pelanggan</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=='pembelian' ||$link=="penjualan"||$link=="returpembelian"||$link=="returpenjualan"||$link=="bayarutang"||$link=="bayarpiutang"||$link=="orderpenjualan"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-cogs"></i></span> Transaksi
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='orderpenjualan'){echo'active';}?>" ><a href="<?=base_url()?>c_orderpenjualan">Order Penjualan</a></li>
                        <li class="<?php if($link=='penjualan'){echo'active';}?>" ><a href="<?=base_url()?>c_penjualan">Penjualan</a></li>
                       
                        <li class="<?php if($link=='returpenjualan'){echo'active';}?>" ><a href="<?=base_url()?>c_returpenjualan">Retur Penjualan</a></li>
                        
                    </ul>
                </li>
                <li class="has-sub <?php if($link=="lapstok"||$link=="laputang"||$link=="lappiutang"||$link=="lappembelian"||$link=="lappenjualan"||$link=="lapreturbeli"||$link=="lapreturjual"||$link=="lapkas"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Laporan
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                       
                        <li class="<?php if($link=="lappenjualan"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lappenjualan">Penjualan</a></li>
                       
                        <li class="<?php if($link=="lapreturjual"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lapreturjual">Retur Penjualan</a></li>
                        
                       
                    </ul>
                </li>
                <!-- JIKA KEUANGAN-->
                <?php
                }else if($hakakses=='Keuangan'){
                ?>
                <li class="has-sub <?php if($link=='pembelian' ||$link=="penjualan"||$link=="returpembelian"||$link=="returpenjualan"||$link=="bayarutang"||$link=="bayarpiutang"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-cogs"></i></span> Transaksi
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                       
                        <li class="<?php if($link=='bayarutang'){echo'active';}?>" ><a href="<?=base_url()?>c_bayarutang">Pembayaran Hutang</a></li>
                        <li class="<?php if($link=='bayarpiutang'){echo'active';}?>" ><a href="<?=base_url()?>c_bayarpiutang">Pembayaran Piutang</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=="lapstok"||$link=="laputang"||$link=="lappiutang"||$link=="lappembelian"||$link=="lappenjualan"||$link=="lapreturbeli"||$link=="lapreturjual"||$link=="lapkas"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Laporan
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=="lapkas"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lapkas">Kas</a></li>
                       
                        <li class="<?php if($link=="laputang"){echo'active';}?>"><a class="" href="<?=base_url()?>c_laputang">Hutang</a></li>
                        <li class="<?php if($link=="lappiutang"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lappiutang">Piutang</a></li>
                        
                        
                       
                    </ul>
                </li>
                <!-- JIKA PIMPINAN-->
                <?php
                }else if($hakakses=='Pimpinan'){
                ?>
                <li class="has-sub <?php if($link=='satuan'||$link=="barang"||$link=="pelanggan"||$link=="supplier"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Master
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='users'){echo'active';}?>"><a href="<?=base_url()?>c_users">Users</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=="lapstok"||$link=="laputang"||$link=="lappiutang"||$link=="lappembelian"||$link=="lappenjualan"||$link=="lapreturbeli"||$link=="lapreturjual"||$link=="lapkas"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Laporan
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=="lapkas"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lapkas">Kas</a></li>
                        <li class="<?php if($link=="lapstok"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lapstok">Stok</a></li>
                        <li class="<?php if($link=="laputang"){echo'active';}?>"><a class="" href="<?=base_url()?>c_laputang">Hutang</a></li>
                        <li class="<?php if($link=="lappiutang"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lappiutang">Piutang</a></li>
                        <li class="<?php if($link=="lappembelian"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lappembelian">Pembelian</a></li>
                        <li class="<?php if($link=="lappenjualan"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lappenjualan">Penjualan</a></li>
                        <li class="<?php if($link=="lapreturbeli"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lapreturbeli">Retur Pembelian</a></li>
                        <li class="<?php if($link=="lapreturjual"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lapreturjual">Retur Penjualan</a></li>
                        
                       
                    </ul>
                </li>

                
                <?php
                }else if($hakakses=='Pembelian'){
                ?>
                <li class="has-sub <?php if($link=="supplier"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Master
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        
                        <li class="<?php if($link=='supplier'){echo'active';}?>"><a href="<?=base_url()?>c_supplier">Supplier</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=='pembelian' ||$link=="penjualan"||$link=="returpembelian"||$link=="returpenjualan"||$link=="bayarutang"||$link=="bayarpiutang"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-cogs"></i></span> Transaksi
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='pembelian'){echo'active';}?>"><a href="<?=base_url()?>c_pembelian">Pembelian</a></li>
                       
                        <li class="<?php if($link=='returpembelian'){echo'active';}?>" ><a href="<?=base_url()?>c_returpembelian">Retur Pembelian</a></li>
                       
                    </ul>
                </li>
                <li class="has-sub <?php if($link=="lapstok"||$link=="laputang"||$link=="lappiutang"||$link=="lappembelian"||$link=="lappenjualan"||$link=="lapreturbeli"||$link=="lapreturjual"||$link=="lapkas"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Laporan
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        
                        
                      
                        <li class="<?php if($link=="lappembelian"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lappembelian">Pembelian</a></li>
                       
                        <li class="<?php if($link=="lapreturbeli"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lapreturbeli">Retur Pembelian</a></li>
                        
                       
                    </ul>
                </li>
                <?php
                }
                ?>
                <!-- <li class="has-sub <?php if($link=='satuan'||$link=="barang"||$link=="pelanggan"||$link=="supplier"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Master
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='satuan'){echo'active';}?>"><a href="<?=base_url()?>c_satuan">Satuan</a></li>
                        <li class="<?php if($link=='barang'){echo'active';}?>"><a href="<?=base_url()?>c_barang">Barang</a></li>
                        <li class="<?php if($link=='supplier'){echo'active';}?>"><a href="<?=base_url()?>c_supplier">Supplier</a></li>
                        <li class="<?php if($link=='pelanggan'){echo'active';}?>"><a href="<?=base_url()?>c_pelanggan">Pelanggan</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=='pembelian' ||$link=="penjualan"||$link=="returpembelian"||$link=="returpenjualan"||$link=="bayarutang"||$link=="bayarpiutang"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-cogs"></i></span> Transaksi
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='pembelian'){echo'active';}?>"><a href="<?=base_url()?>c_pembelian">Pembelian</a></li>
                       
                        <li class="<?php if($link=='returpembelian'){echo'active';}?>" ><a href="<?=base_url()?>c_returpembelian">Retur Pembelian</a></li>
                         <li class="<?php if($link=='penjualan'){echo'active';}?>" ><a href="<?=base_url()?>c_penjualan">Penjualan</a></li>
                       
                        <li class="<?php if($link=='returpenjualan'){echo'active';}?>" ><a href="<?=base_url()?>c_returpenjualan">Retur Penjualan</a></li>
                        <li class="<?php if($link=='bayarutang'){echo'active';}?>" ><a href="<?=base_url()?>c_bayarutang">Pembayaran Hutang</a></li>
                        <li class="<?php if($link=='bayarpiutang'){echo'active';}?>" ><a href="<?=base_url()?>c_bayarpiutang">Pembayaran Piutang</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=="lapstok"||$link=="laputang"||$link=="lappiutang"||$link=="lappembelian"||$link=="lappenjualan"||$link=="lapreturbeli"||$link=="lapreturjual"||$link=="lapkas"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Laporan
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        
                        <li class="<?php if($link=="lapkas"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lapkas">Kas</a></li>
                        <li class="<?php if($link=="lapstok"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lapstok">Stok</a></li>
                        <li class="<?php if($link=="laputang"){echo'active';}?>"><a class="" href="<?=base_url()?>c_laputang">Hutang</a></li>
                        <li class="<?php if($link=="lappiutang"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lappiutang">Piutang</a></li>
                        <li class="<?php if($link=="lappembelian"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lappembelian">Pembelian</a></li>
                        <li class="<?php if($link=="lappenjualan"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lappenjualan">Penjualan</a></li>
                        <li class="<?php if($link=="lapreturbeli"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lapreturbeli">Retur Pembelian</a></li>
                        <li class="<?php if($link=="lapreturjual"){echo'active';}?>"><a class="" href="<?=base_url()?>c_lapreturjual">Retur Penjualan</a></li>
                        
                       
                    </ul>
                </li> -->
               
                
            </ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->