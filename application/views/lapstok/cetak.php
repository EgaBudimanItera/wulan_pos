


<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th class="hidden-phone">No</th>
      <th class="hidden-phone">Tanggal</th>
      <th class="hidden-phone">No Transaksi</th>
      <th class="hidden-phone">Kode Barang</th>
      <th class="hidden-phone">Nama Barang</th>
      <th class="hidden-phone">Keterangan</th>
      <th class="hidden-phone">Stok Awal</th>
      <th class="hidden-phone">Stok Masuk</th>
      <th class="hidden-phone">Stok Keluar</th>
      <th class="hidden-phone">Stok Akhir</th>
    </tr>
  </thead>
  <tbody>
    <!-- <?php
      $no=1;
      foreach($list as $l){
    ?>
    <tr>
      <td><?=$no++;?></td>
      <td><?=$l->stokTanggal;?></td>
      <td><?=$l->stokNoFaktur;?></td>
      <td><?=$l->brngKode;?></td>
      <td><?=$l->brngNama;?></td>
      <td><?=$l->stokKet;?></td>
      <td><?=$l->stokAwal;?></td>
      <td><?=$l->stokMasuk;?></td>
      <td><?=$l->stokKeluar;?></td>
      <td><?=$l->stokAkhir;?></td>
    </tr>
    <?php
      $hpp=$l->brngHpp;
      $stokAkhir=$l->stokAkhir;
      }
    ?>
    <tr>
      <td colspan="3">Hpp Barang</td>
      <td colspan="7"><?php echo 'Rp '. number_format($hpp)?> * <?=$stokAkhir?> = <?php echo 'Rp '.number_format($hpp*$stokAkhir)?></td>
    </tr> -->
  </tbody>
</table>