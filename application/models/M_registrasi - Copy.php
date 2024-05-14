<?php
class M_registrasi extends CI_Model{
	
	//private $user_table = 'registrasi';
	
	function __construct(){
		parent::__construct();
	}
	
///// REGISTRASI

	public function get_cari(){
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT a.nama, a.id_peserta, a.nip, a.pangkat, a.jabatan, a.unker, b.nama_kegiatan FROM data_peserta AS a INNER JOIN kegiatan AS b ON a.id_kegiatan = b.id_kegiatan WHERE a.nip like '%$cari%' ");
		return $data->result();
	}

	function input_reg($data,$table){
		$this->db->insert($table,$data);
	} 

	Public function data_reg(){
		$hasil	=	$this->db->query("SELECT * FROM registrasi ORDER BY id_reg DESC");
		return $hasil->result();	
	}
	
	Public function simpan_reg($id_reg, $id_peserta, $id_materi_ci1, $id_materi_ci2, $id_materi_qkom, $nama, $nip, $gol, $jabatan, $unker, $jenped_awal, $jur_awal, $univ_awal, $thn_awal, $jenpend_akhir, $jur_akhir, $univ_akhir, $thn_akhir, $jab_1, $unker_1, $thn_unker_1, $jab_2, $unker_2, $thn_unker_2, $unker_puas, $alasan_puas, $unker_no_puas, $alasan_no_puas, $kebijakan, $kekuatan_1, $mengapa_kekuatan_1, $kekuatan_2, $mengapa_kekuatan_2, $s1_topik, $s1_tmt, $s1_tst, $s1_3, $s1_4, $s1_5, $s1_6, $s1_7, $s1_8, $s2_topik, $s2_tmt, $s2_tst, $s2_3, $s2_4, $s2_5, $s2_6, $s2_7, $s2_8, $jwb1, $jwb2, $jwb3, $jwb4, $jwb5, $jwb6, $jwb7, $jwb8, $jwb9, $jwb10, $jwb11, $jwb12, $jwb13, $jwb14, $jwb15, $jwb16, $jwb17, $image, $ket, $group_id, $username, $nama_user, $status){
		$hasil=$this->db->query("INSERT INTO registrasi (id_reg, id_peserta, id_materi_ci1, id_materi_ci2, id_materi_qkom, nama, nip, gol, jabatan, unker, jenped_awal, jur_awal, univ_awal, thn_awal, jenpend_akhir, jur_akhir, univ_akhir, thn_akhir, jab_1, unker_1, thn_unker_1, jab_2, unker_2, thn_unker_2, unker_puas, alasan_puas, unker_no_puas, alasan_no_puas, kebijakan, kekuatan_1, mengapa_kekuatan_1, kekuatan_2, mengapa_kekuatan_2, s1_topik, s1_tmt, s1_tst, s1_3, s1_4, s1_5, s1_6, s1_7, s1_8, s2_topik, s2_tmt, s2_tst, s2_3, s2_4, s2_5, s2_6, s2_7, s2_8, jwb1, jwb2, jwb3,  jwb4, jwb5, jwb6, jwb7, jwb8, jwb9, jwb10, jwb11, jwb12, jwb13, jwb14, jwb15, jwb16, jwb17, image, ket, group_id, username, nama_user, status)VALUES('$id_reg','$id_peserta','$id_materi_ci1','$id_materi_ci2','$id_materi_qkom','$nama','$nip','$gol','$jabatan','$unker','$jenped_awal','$jur_awal','$univ_awal','$thn_awal','$jenpend_akhir','$jur_akhir','$univ_akhir','$thn_akhir','$jab_1','$unker_1','$thn_unker_1','$jab_2','$unker_2','$thn_unker_2','$unker_puas','$alasan_puas','$unker_no_puas','$alasan_no_puas','$kebijakan','$kekuatan_1','$mengapa_kekuatan_1','$kekuatan_2','$mengapa_kekuatan_2','$s1_topik','$s1_tmt','$s1_tst','$s1_3','$s1_4','$s1_5','$s1_6','$s1_7','$s1_8','$s2_topik','$s2_tmt','$s2_tst','$s2_3','$s2_4','$s2_5','$s2_6','$s2_7','$s2_8','$jwb1','$jwb2','$jwb3','$jwb4','$jwb5','$jwb6','$jwb7','$jwb8','$jwb9','$jwb10','$jwb11','$jwb12','$jwb13','$jwb14','$jwb15','$jwb16','$jwb17','$image','$ket','$group_id','$username','$nama_user','$status')");
		return $hasil;
	}
	
	Public function get_reg_by_id($id_reg){
		$hsl=$this->db->query("SELECT * FROM registrasi WHERE id_reg ='$id_reg'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
							'id_personil' 	=> $data->id_personil, 
							'kd_personil' 	=> $data->kd_personil, 
							'nama_personil' => $data->nama_personil, 
							'nip_personil' 	=> $data->nip_personil, 
							'pangkat' 		=> $data->pangkat, 
							'jabatan' 		=> $data->jabatan,
					);
			}
		}
		return $hasil;
	}
	
	Public function hapus_reg($id_reg){
		$hasil	=$this->db->query("DELETE FROM registrasi WHERE id_reg ='$id_reg'");
		return $hasil;
	}
	
	Public function truncate_reg($id_reg){
		$hasil	=$this->db->query("TRUNCATE TABLE registrasi");
		return $hasil;
	}
	
	
		
///// END OF REGISTRASI
		
}