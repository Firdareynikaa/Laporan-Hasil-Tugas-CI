
<h1>Barang</h1>

<?php if($this->session->flashdata('pesan')): ?>


	<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>
	

<?php endif?>



<?php if($this->session->userdata('level')=="admin"){?>
<a href="#tambah" class="btn btn-primary" data-toggle="modal" style="float: right;">Tambah</a>

<?php }?>
<table class="table table-hover table-stripped"> 

	<thead>

		<tr style="color: #fff; background-color: #001a33; border: 3px solid #fff; text-align: center;">

			<td>No.</td><td>Kode Barang</td><td>Nama Barang</td><td>Kategori</td><td>Harga</td><td>Cover</td><td>Stok</td><td></td><td></td>

		</tr>

	</thead>

	<tbody>


		<?php $no = 0; foreach($barang as $bk): $no++;?>

		<tr style="color: #000; background-color: #00cccc; border: 3px solid #fff; text-align:center;">

			<td><?=$no?></td><td><?=$bk->kode_barang?></td><td><?=$bk->nama_barang?></td><td><?=$bk->nama_kategori?></td><td><?=$bk->harga?></td><td><img src="<?=base_url('assets/gambar/'.$bk->cover)?>" style="width:40px;"></td><td><?=$bk->stok?></td>

			<td><?php if($this->session->userdata('level')=="admin"){?> <a href="#ubah" data-toggle="modal" onclick="edit(<?=$bk->kode_barang?>)"  class="btn btn-warning">Ubah</a><?php }else{ 		echo "anda kasir"; }?></td>

			<td><?php if($this->session->userdata('level')=="admin"){?><a href="<?=base_url('index.php/Barang/hapus/'.$bk->kode_barang)?>" onclick="return confirm('apakah anda yakin untuk menghapus')" class="btn btn-danger">Hapus</a><?php }else{ echo "anda kasir"; }?></td>

		</tr>



	<?php endforeach?>


</tbody>	

</table>




<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		
		<div class="modal-content">
			<div class="modal-header" style="background-color: #A52A2A;">


			<div class="row" >

			<div class="col-md-6" >
				<div class="modal-title" style="color: #000; font-size: 22px;">Tambah Barang</div>
			</div>
			<div class="col-md-6" >
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>

			</div>	

			<div class="modal-body" style="background-color: #A52A2A;">


				<form action="<?=base_url('index.php/Barang/tambah')?>" method="post" enctype="multipart/form-data">

					<table>

						<tr>
							<td style="color: #fff; font-size: 15px;">Nama Barang</td>
							<td style=""><input type="text" name="nama_barang" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td style="color: #fff; font-size: 15px;">kategori</td>
							<td>


								<select name="kategori" style="margin-left: 20px; ">
									<?php foreach ($kategori as $kt): ?>

										<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
									<?php endforeach?>	
								</select>
							</td>
						</tr>

						<tr>
							<td style="color: #fff; font-size: 15px;">harga</td>
							<td><input type="text" name="harga" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td style="color: #fff; font-size: 15px;">foto cover</td>
							<td><input type="file" name="cover" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td style="color: #fff; font-size: 15px;">stok</td>
							<td><input type="number" name="stok" style="margin-left: 20px;"></td>
						</tr>

					</table>


					<center><input type="submit" name="tambah" value="tambah" class="btn btn-warning" style="margin-top: 30px;"></center>

				</form>

			</div>	
		</div>
	</div>

</div>



<div class="modal fade" id="ubah" >
	<div class="modal-dialog">
		
		<div class="modal-content">
			<div class="modal-header" style="background-color: #A52A2A;">

				<div class="row">

			<div class="col-md-6">
				<div class="modal-title" style="color: #000; font-size: 22px;">Ubah Barang</div>
			</div>
			<div class="col-md-6">
				<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
				</div>

				</div>
			</div>	

			<div class="modal-body" style="background-color: #A52A2A;">


				<form action="<?=base_url('index.php/Barang/update')?>" method="post" enctype="multipart/form-data">

					<table>

						<input type="hidden" name="kode_barang" required id="kode_barang" style="margin-left: 20px;">

						<tr>
							<td style="color: #fff; font-size: 15px;">Nama barang</td>
							<td><input type="text" name="nama_barang"  required  id="nama_barang" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td style="color: #fff; font-size: 15px;">kategori</td>
							<td>


								<select name="kategori" style="margin-left: 20px; " id="kategori" required >
									<?php foreach ($kategori as $kt): ?>

										<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
									<?php endforeach?>	
								</select>
							</td>
						</tr>

						<tr>
							<td style="color: #fff; font-size: 15px;">harga</td>
							<td><input type="text" name="harga" required  id="harga" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td style="color: #fff; font-size: 15px;">foto cover</td>
							<td><input type="file" name="cover"   id="cover" style="margin-left: 20px;"></td>
						</tr>

						<tr>
							<td style="color: #fff; font-size: 15px;">stok</td>
							<td><input type="number" name="stok" required  id="stok" style="margin-left: 20px;"></td>
						</tr>

					</table>


					<center><input type="submit" value="Ubah" name="update" required  class="btn btn-warning" style="margin-top: 30px;"></center>

				</form>

			</div>	
		</div>
	</div>

</div>




<script >
	

	function edit(kode_barang){
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/Barang/tampil_ubah_barang/"+kode_barang,
			dataType:"json",


			success:function(data){
				$("#kode_barang").val(data.kode_barang);
				$("#nama_barang").val(data.nama_barang);
				$("#kategori").val(data.kode_kategori);
				$("#harga").val(data.harga);
				$("#stok").val(data.stok);	
			}
		});
	}

</script>