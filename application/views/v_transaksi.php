
<h1> Transaksi</h1>

<?php if($this->session->flashdata('pesan')): ?>


	<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>
	

<?php endif?>


<div class="row">

	<div class="col-md-7">



		<table class="table table-hover table-stripped"> 



			<thead>

				<tr style="color: #fff; font-family: cendana; font-size: 20px; text-align: center; background-color: #001a33; border: 2px solid #fff;">

				<td>No.</td><td>Nama Barang</td><td>Kategori</td><td>Harga</td><td>Cover</td><td>Stok</td><td></td>

				</tr>

			</thead>

			<tbody style="text-align: center; background-color: #3399ff; color: #000; border: 2px solid #fff;">


				<?php $no = 0; foreach($barang as $bk): $no++;?>

				<tr style="border: 2px solid #fff;">

					<td><?=$no?></td></td><td><?=$bk->nama_barang?></td><td><?=$bk->nama_kategori?></td><td><?=$bk->harga?></td><td><img src="<?=base_url('assets/gambar/'.$bk->cover)?>" style="width:40px;"></td><td><?=$bk->stok?></td>

					<td> <a href="<?=base_url('index.php/Cart/tambah_cart/'.$bk->kode_barang)?>" class="btn btn-success">Beli</a></td>

					

				</tr>



			<?php endforeach?>


		</tbody>	

	</table>



	
</div>


<div class="col-md-5">


<form action="<?= base_url('index.php/Transaksi/transaksi')?>" method="post">

<table class="table table-stripped table-hover" style="color: #000; background-color: #00cccc; border: 3px solid #fff;"> 


	<tr><td colspan="2">Nama Pembeli</td><td colspan="4"><input type="text" name="pembeli" value="<?=$this->session->flashdata('pembeli');?>"></td></tr>
			

				<tr>

				<th>No</th><th>Nama Barang</th><th>Jumlah</th><th>Harga</th><th>Subtotal</th><th></th>

				</tr>

			


			<?php $no = 0; foreach($this->cart->contents() as $ct): $no++;?>

				<input type="hidden" name="kode_barang[]" value="<?=$ct['id']?>">
				<input type="hidden" name="rowid[] " value="<?=$ct['rowid']?>">

				<tr>
					<td><?=$no?></td></td><td><?=$ct['name']?></td><td><input type="number" name="banyak[]" value="<?=$ct['qty']?>" style="width:60px;"></td><td><?=number_format($ct['price'])?></td><td><?=number_format($ct['subtotal'])?>
					<td> <a href="<?=base_url('index.php/Cart/hapus_cart/'.$ct['rowid'])?>" onclick="return confirm('apakah anda yakin untuk menghapus pesanan ini')" class="btn btn-danger">x</a></td>

				</tr>
			<?php endforeach?>


		<tr><td colspan="2">Total</td><td colspan="4"><?= number_format($this->cart->total())?></td></tr>

		<tr><td colspan="2">Bayar</td><td colspan="4"><input type="number" name="bayaru"></td></tr>

		<tr><td colspan="2">Kembali</td><td colspan="4"><input type="number" value="<?= $this->session->flashdata('kembali') ?>" name="kembaliu"></td></tr>

		<tr><td colspan="2"><input type="submit" value="Bayar" name="bayar" class="btn btn-success"></td><td colspan="2"><a href="<?=base_url('index.php/Cart/hapus_semua_cart')?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin untuk menghapus semua pesanan')">Hapus Cart</a></td><td colspan="2"><input type="submit" value="Update_qty" name="update qty" class="btn btn-primary"></td></tr>

	</table>


</form>








</div>


</div>
