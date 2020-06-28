<style type="text/css">
	.tetap {
		resize: none;
	}

	.btn-margin {
		margin-right: 5px;
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>QR Code</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">QR Code</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-6">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Buat QR Code</h3>
						<div class="btn-group box-tools pull-right">
							<a href="<?= site_url("setting/qrcode/clear"); ?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block btn-margin"><i class="fa fa-plus"></i> Baru</a>
							<a href="#" class="btn btn-social btn-flat bg-blue btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-file"></i> Pilih Logo</a>
						</div>
					</div>
					<form id="mainform" name="mainform" action="" method="post">
						<div class="box-body">
							<div class="form-group">
								<label for="namaqr">Nama File :</label>
								<input class="form-control input-sm nama_terbatas required" type="text" id="namaqr" name="namaqr" maxlength="15" value="<?= $qrcode['namaqr']; ?>"></input>
							</div>
							<div class="form-group">
								<label for="isiqr">Isi Kode :</label>
								<textarea class="form-control input-sm tetap required" rows="5" id="isiqr" name="isiqr" maxlength="300"><?= $qrcode['isiqr']; ?></textarea>
							</div>
							<div class="row">
								<div class="form-group col-md-4">
									<div class="form-group">
										<label for="changeqr" >Sisipkan Logo :</label>
										<select class="form-control input-sm" id="changeqr" name="changeqr" onchange="load(this.value);">
											<?php foreach ($list_changeqr as $key => $list): ?>
												<option value="<?= $key + 1; ?>" <?= selected($qrcode['changeqr'], $key + 1); ?>><?= $list; ?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group col-md-8" id="change_key">
									<div class="form-group">
										<label for="logoqr"><code> Kosongkan jika tidak ingin menyisipkan gambar </code></label>
										<div class="input-group">
											<input type="text" class="form-control input-sm" id="logoqr" name="logoqr" value="<?= $qrcode['logoqr']; ?>">
											<span class="input-group-btn">
												<button type="button" class="btn btn-info btn-flat btn-info btn-sm" id="file_browser1" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Browse</button>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="sizeqr" >Ukuran :</label>
									<select class="form-control input-sm" id="sizeqr" name="sizeqr">
										<?php foreach ($list_sizeqr as $key => $list): ?>
											<option value="<?= $key + 1; ?>" <?= selected($qrcode['sizeqr'], $key + 1); ?>><?= $list.' x '.$list.'px'; ?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="foreqr">Warna :</label>
									<div class="input-group my-colorpicker2">
										<div class="input-group-addon input-sm">
											<i></i>
										</div>
										<input type="text" id="foreqr" name="foreqr" class="form-control input-sm" value="<?= $qrcode['foreqr'] ?: $qrcode['backqr']; ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
							<button id="generate" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Scan QR Code</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="pathqr"></label>
									<center>
										<img class="img-thumbnail" src="<?= $qrcode['pathqr']; ?>">
										<br>
										<?php if ($qrcode['pathqr']) : ?>
											<a href="<?= site_url("setting/qrcode/download/$qrcode[namaqr]"); ?>" class="btn btn-social btn-flat btn-success btn-sm" title="Downloas QR Code"><i class="fa fa-download"></i> Download</a>
										<?php endif; ?>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- File Manager -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
				<h4 class='modal-title' id='myModalLabel'>Pilih Logo</h4>
			</div>
			<div class="modal-body" style="padding:0px; margin:0px; width: 600px;">
				<iframe width="600" height="400" src="../../assets/filemanager/dialog.php?type=2&field_id=logoqr'&fldr='&akey=<?= config_item('file_manager')?>" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url()?>assets/bootstrap/js/jquery.min.js"></script>
<script>
	$('document').ready(function()
	{
		$('#changeqr').change(); // Pertama kali buka form
	});

	function load(key)
	{
		if(key == 1) {
			$('#change_key').hide();
			$('#logoqr').attr('value', '');
		}
		else
		{
			$('#change_key').show();
			$('#logoqr').attr('value', '<?= $qrcode['pathqr'] ?: ''; ?>');
		}

	}

	$('#generate').on('click', function() {
		if (!$('#mainform').valid()) return false;

		var namaqr = $('#namaqr').val();
		var isiqr = $('#isiqr').val();
		var changeqr = $('#changeqr').val();
		var logoqr = $('#logoqr').val();
		var sizeqr = $('#sizeqr').val();
		var foreqr = $('#foreqr').val();

		$.ajax({
			url  : 'qrcode_generate',
			type : 'POST',
			data : {namaqr:namaqr, isiqr:isiqr, changeqr:changeqr, logoqr:logoqr, sizeqr:sizeqr, foreqr:foreqr},
			success: function(data){
			}
		}).then(function() {
			location.reload();
		});
		return false;
	});
</script>