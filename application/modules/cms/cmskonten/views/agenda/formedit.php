          <div class='row'>
            <div class='col-md-12'>
              <div class='panel panel-<?=($aksi=="hapus")?"danger":"info";?>'>
                <div class='panel-heading'>
                  <b>FORM <?=strtoupper($aksi);?> ITEM AGENDA</b>
				  <div class="btn btn-warning btn-xs pull-right" onclick="kembali(); return false;"><i class="fa fa-close fa-fw"></i></div>
                </div><!-- /.box-header -->
                <div class='panel-body'>
    <form id="content-form" method="post" action="<?=base_url();?>cmskonten/agenda/<?=$aksi;?>_aksi" enctype="multipart/form-data">
			<div class="table-responsive">
<table class="table table-striped">
        <tr>
          <td width="150">Judul Agenda</td>
          <td colspan="3">
		  <input type="text" id="judul" name="judul" class="form-control" value="<?=@$isi->judul;?>"  placeholder="Wajib diisi" <?=($aksi=="hapus")?"disabled":"";?>>
		  </td>
        </tr>
        <tr>
          <td>Isi Agenda</td>
          <td colspan="3">
		  <input type="text" id="isi_agenda" name="isi_agenda" class="form-control" value="<?=@$detil->isi;?>"  placeholder="Wajib diisi" <?=($aksi=="hapus")?"disabled":"";?>>
		  </td>
        </tr>
        <tr>
          <td>Tempat</td>
          <td colspan="3">
		  <input type="text" id="sub_judul" name="sub_judul" class="form-control" value="<?=@$isi->sub_judul;?>" placeholder="Wajib diisi" <?=($aksi=="hapus")?"disabled":"";?>>
		  </td>
        </tr>
        <tr>
          <td>Rubrik Agenda</td>
          <td colspan="3"><?=$pilrb;?></td>
        </tr>
        <tr>
          <td>Tanggal Mulai</td>
          <td colspan="3">
		  <input type="text" id="tgl_mulai" name="tgl_mulai" class="form-control" value="<?=@$detil->tgl_mulai;?>" placeholder="dd-mm-YYYY" <?=($aksi=="hapus")?"disabled":"";?>>
		  </td>
        </tr>
        <tr>
          <td>Tanggal Selesai</td>
          <td colspan="3">
		  <input type="text" id="tgl_selesai" name="tgl_selesai" class="form-control" value="<?=@$detil->tgl_selesai;?>"  placeholder="dd-mm-YYYY" <?=($aksi=="hapus")?"disabled":"";?>>
		  </td>
        </tr>
        <tr>
          <td>Penulis</td>
          <td colspan="3">
												  <select name="id_penulis" id="id_penulis"  class="form-control" <?=($aksi=="hapus")?"disabled":"";?>>
													<option  value="">--Pilih Penulis--</option>
													<?=$penulis_options;?>
												  </select>
		  </td>
        </tr>
       <tr >
			<td>&nbsp;</td>
			<td colspan="3">
				<input type=hidden name=idd value='<?=@$isi->id_konten;?>'>
					<div class="btn btn-<?=($aksi=="hapus")?"danger":"success";?> btn-xl" onclick="simpan(); return false;" id="btAct"><i class="fa fa-<?=($aksi=="hapus")?"trash":"save";?> fa-fw"></i>  <?=($aksi=="hapus")?"Hapus":"Simpan";?></div>
					<div class="btn btn-warning btn-xl" onclick="kembali();"><i class="fa fa-close fa-fw"></i> Batal...</div>
			</td>
        </tr>
</table>
		</div>
                  </form>



                </div>
              </div><!-- /.box -->
			</div>
		  </div>
<form id="sb_act" method="post"></form>
<script type="text/javascript">
function simpan(){
	var hasil=validasi_pengikut();
	if (hasil!=false) {
			$.ajax({
			type:"POST",
			url:	$("#content-form").attr('action'),
			data:$("#content-form").serialize(),
			beforeSend:function(){	
				$('#btAct').replaceWith('<span id="btAct"><i class="fa fa-spinner fa-spin fa-2x"></i></span>');
			},
			success:function(data){
					var arr_result = data.split("#");
					if(arr_result[0]=='sukses'){
						kembali();
					} else {
						alert('Data gagal disimpan! \n Lihat pesan diatas form');
					}
			},
			dataType:"html"});
			return false;
	} //endif Hasil
}
////////////////////////////////////////////////////////////////////////////
function validasi_pengikut(opsi){
	var data="";
	var dati="";
			var nama = $.trim($("#judul").val());
			var kket = $.trim($("#isi_agenda").val());
			var tmpt = $.trim($("#sub_judul").val());
			var tglb = $.trim($("#tgl_mulai").val());
			var tglc = $.trim($("#tgl_selesai").val());
			var rbrk = $.trim($("#id_kategori").val());
			var pnls = $.trim($("#id_penulis").val());
			data=data+""+nama+"*"+kket+"**";
			if( nama ==""){	dati=dati+"JUDUL AGENDA tidak boleh kosong\n";	}
			if( kket ==""){	dati=dati+"ISI AGENDA tidak boleh kosong\n";	}
			if( tmpt ==""){	dati=dati+"TEMPAT tidak boleh kosong\n";	}
			if( rbrk ==""){	dati=dati+"RUBRIK AGENDA tidak boleh kosong\n";	}
			if( tglb ==""){	dati=dati+"TANGGAL MULAI tidak boleh kosong\n";	}
			if( tglc ==""){	dati=dati+"TANGGAL SELESAI tidak boleh kosong\n";	}
			if( pnls ==""){	dati=dati+"PENULIS tidak boleh kosong\n";	}
	if( dati !=""){
		alert(dati);
		return false;
	} else {return data;}
}
function kembali(){
	$('#appe_post').hide();
	$('.content_post').show();
	var ss = $("#pagingA #inputpaging").val();
	gridpagingA(ss);
}
</script>