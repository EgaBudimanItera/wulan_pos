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
                    <a href="<?=base_url()?>" class="">
                        <span class="icon-box"> <i class="icon-home"></i></span> Dashboard
                        
                    </a>
                </li>
                
                <li class="has-sub <?php if($link=='satuan'||$link=="barang"||$link=="pelanggan"||$link=="supplier"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"> <i class="icon-book"></i></span> Master
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=='satuan'){echo'active';}?>"><a href="<?=base_url()?>c_satuan">Satuan</a></li>
                        <li class="<?php if($link=='barang'){echo'active';}?>"><a href="<?=base_url()?>c_barang">Barang</a></li>
                        <li class="<?php if($link=='pelanggan'){echo'active';}?>"><a href="<?=base_url()?>c_pelanggan">Pelanggan</a></li>
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
                        <li class="<?php if($link=='penjualan'){echo'active';}?>" ><a href="#">Penjualan</a></li>
                        <li class="<?php if($link=='returpembelian'){echo'active';}?>" ><a href="#">Retur Pembelian</a></li>
                        <li class="<?php if($link=='returpenjualan'){echo'active';}?>" ><a href="#">Retur Penjualan</a></li>
                        <li class="<?php if($link=='bayarutang'){echo'active';}?>" ><a href="#">Pembayaran Hutang</a></li>
                        <li class="<?php if($link=='bayarpiutang'){echo'active';}?>" ><a href="#">Pembayaran Piutang</a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($link=="lapstok"||$link=="laphutang"||$link=="lappiutang"||$link=="lappembelian"||$link=="lappenjualan"||$link=="lapreturbeli"||$link=="lapreturjual"||$link=="lapkaskeluar"||$link=="lapkasmasuk"){echo'active';}?>">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-tasks"></i></span> Laporan
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($link=="lapstok"){echo'active';}?>"><a class="" href="#">Stok</a></li>
                        <li class="<?php if($link=="laphutang"){echo'active';}?>"><a class="" href="#">Hutang</a></li>
                        <li class="<?php if($link=="lappiutang"){echo'active';}?>"><a class="" href="#">Piutang</a></li>
                        <li class="<?php if($link=="lappembelian"){echo'active';}?>"><a class="" href="#">Pembelian</a></li>
                        <li class="<?php if($link=="lappenjualan"){echo'active';}?>"><a class="" href="#">Penjualan</a></li>
                        <li class="<?php if($link=="lapreturbeli"){echo'active';}?>"><a class="" href="#">Retur Pembelian</a></li>
                        <li class="<?php if($link=="lapreturjual"){echo'active';}?>"><a class="" href="#">Retur Penjualan</a></li>
                        <li class="<?php if($link=="lapkaskeluar"){echo'active';}?>"><a class="" href="#">Pengeluaran Kas</a></li>
                        <li class="<?php if($link=="lapkasmasuk"){echo'active';}?>"><a class="" href="#">Penerimaan Kas</a></li>
                    </ul>
                </li>
            </ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->