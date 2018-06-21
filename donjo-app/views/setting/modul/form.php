<div class="content-wrapper">
	<section class="content-header">
		<?php if($modul['parent']!='0'):?>
		<h1>Form Manajemen Sub Modul</h1>
		<?php else:?>
			<h1>Form Manajemen Modul</h1>
		<?php endif?>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('hom_desa')?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Form Manajemen Modul</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row" >
			<form id="validasi" action="<?=$form_action?>" method="POST" enctype="multipart/form-data"  class="form-horizontal">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<a href="<?=site_url()?>modul" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Daftar Modul</a>
							<?php if($modul['parent']!='0'):?>
								<a href="<?=site_url()?>modul/sub_modul/<?=($modul['parent'])?>" class="btn btn-social btn-flat btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Daftar Sub Modul</a>
							<?php endif?>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_nama"><?php if($modul['parent']!='0'):?>Nama Sub Modul<?php else:?>Nama Modul<?php endif?></label>
								<div class="col-sm-6">
									<input type="hidden" name="modul" value="1">
									<input type="hidden" name="parent" value="<?=($modul['parent'])?>">
									<input id="modul" name="modul" class="form-control input-sm required" type="text" placeholder="Nama Modul/Sub Modul" value="<?=($modul['modul'])?>"></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="url">URL</label>
								<div class="col-sm-6">
									<input id="url" name="url" class="form-control input-sm" type="text" placeholder="URL Modul" value="<?=$modul['url']?>" ></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="ikon">Ikon</label>
								<div class="col-sm-6">
									<input id="ikon" name="ikon" class="form-control input-sm" type="text" placeholder="Ikon" value="<?=($modul['ikon'])?>" ></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-4 col-lg-4 control-label" for="status">Status</label>
								<div class="btn-group col-xs-12 col-sm-7" data-toggle="buttons">
									<label class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label <?php if($modul['aktif'] =='1' OR $modul['aktif'] == NULL): ?>active<?php endif ?>">
										<input id="g1" type="radio" name="aktif" class="form-check-input" type="radio" value="1" <?php if($modul['aktif'] =='1' OR $modul['aktif'] == NULL): ?>checked <?php endif ?> autocomplete="off"> Aktif
									</label>
									<label class="btn btn-info btn-flat btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label <?php if($modul['aktif'] == '2' ):?>active<?php endif?>">
										<input id="g2" type="radio" name="aktif" class="form-check-input" type="radio" value="2" <?php if($modul['aktif'] == '2' ):?>checked<?php endif?> autocomplete="off"> Tidak Aktif
									</label>
								</div>
							</div>

						</div>
						<div class='box-footer'>
							<div class='col-xs-12'>
								<button type='reset' class='btn btn-social btn-flat btn-danger btn-sm' ><i class='fa fa-times'></i> Batal</button>
								<button type='submit' class='btn btn-social btn-flat btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
</div>
