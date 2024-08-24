<?php
#---------------------------------------------
#FUNGSI TAMBAH
#---------------------------------------------
class a_hitung_data extends a_database
{
	###TAMBAH DATA

	###MENGGABUKAN DENGAN LEFT JOIN LALU BACA DATA DENGAN FILTER WHERE
	function hitung_data_left_join_dengan_filter($nama_table_utama, $nama_table_lainnya = array(), $field_penghubung = array(), $field_where = array(), $criteria_where = array(), $value_where = array(), $connector_where = array())
	{

		#INPUTAN
		$isi_field_where = "";
		$isi_criteria_where = "";
		$isi_value_where = "";
		$isi_connector_where = "";

		$table_left_join = "";
		$nomor = 0;

		$wherenya = "";
		$nomor = 0;
		foreach ($field_where as $field_whereloop) {
			$isi_field_where = mysqli_real_escape_string($this->koneksi, (trim($field_where[$nomor])));
			$isi_criteria_where = mysqli_real_escape_string($this->koneksi, (trim($criteria_where[$nomor])));
			$isi_value_where = mysqli_real_escape_string($this->koneksi, (trim($value_where[$nomor])));
			$isi_connector_where = mysqli_real_escape_string($this->koneksi, (trim($connector_where[$nomor])));


			$wherenya = $wherenya . " " . $isi_field_where . " " . $isi_criteria_where . " '" . $isi_value_where . "' " . $isi_connector_where . "";
			$nomor++;
		}

		$nomor = 0;
		foreach ($nama_table_lainnya as $table_lainnya) {
			$nomor_plus = $nomor++;
			$table_left_join = $table_left_join . " LEFT JOIN " . $table_lainnya . " ON " . $nama_table_utama . "." . $field_penghubung[$nomor_plus] . " = " . $table_lainnya . "." . $field_penghubung[$nomor];
		}

		#SQL
		$sql = "SELECT * FROM $nama_table_utama $table_left_join WHERE ";
		$sql = $sql . $wherenya;

		// echo $sql;;

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();


		#HASIL
		if ($query) {
			$hitung = mysqli_num_rows($query);
			if ($hitung > 0) {
				$result['Status'] = "Sukses";
				$jumlah = mysqli_num_rows($query);
			} else {
				$result['Status'] = "Tidak Ada Data";
				$jumlah = "0";
			}
		} else {
			$result['Status'] = "Gagal";
			$jumlah = "0";
		}

		$result['Hasil'] = $jumlah;
		#RETURN
		return $result;
	}

	function lihat_data_terbanyak($nama_table, $nama_field, $field_hasil, $limit)
	{
		#SQL
		$sql = "SELECT $nama_field, COUNT($nama_field) AS $field_hasil FROM $nama_table GROUP BY $nama_field ORDER BY $field_hasil DESC LIMIT $limit";
		// echo $sql;;

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();

		#HASIL
		if ($query) {
			$hitung = mysqli_num_rows($query);
			if ($hitung > 0) {
				$result['Status'] = "Sukses";

				while ($data = mysqli_fetch_assoc($query)) {
					$hasil[] = $data;
				}
			} else {
				$result['Status'] = "Tidak Ada Data";
				$hasil[] = "";
			}
		} else {
			$result['Status'] = "Gagal";
			$hasil[] = "";
		}

		$result['Hasil'] = $hasil;
		#RETURN
		return $result;
	}
	function lihat_data_terbanyak_dengan_filter(
		$nama_table,
		$nama_field,
		$field_hasil,
		$limit,
		$field_where = array(),
		$criteria_where = array(),
		$value_where = array(),
		$connector_where = array()
	) {
		#INPUTAN
		$isi_field_where = "";
		$isi_criteria_where = "";
		$isi_value_where = "";
		$isi_connector_where = "";
		$wherenya = "";
		$nomor = 0;
		foreach ($field_where as $field_whereloop) {
			$isi_field_where = mysqli_real_escape_string($this->koneksi, trim($field_where[$nomor]));
			$isi_criteria_where = mysqli_real_escape_string($this->koneksi, trim($criteria_where[$nomor]));
			$isi_value_where = mysqli_real_escape_string($this->koneksi, trim($value_where[$nomor]));
			$isi_connector_where = mysqli_real_escape_string($this->koneksi, trim($connector_where[$nomor]));

			$wherenya = $wherenya . " " . $isi_field_where . " " . $isi_criteria_where . " '" . $isi_value_where . "' " . $isi_connector_where . "";
			$nomor++;
		}

		#SQL
		$sql = "SELECT $nama_field, COUNT($nama_field) AS $field_hasil FROM $nama_table WHERE";
		$sql = $sql . $wherenya;
		$sql = $sql . " GROUP BY $nama_field ORDER BY $field_hasil DESC LIMIT $limit"; // Ensure LIMIT is included in the SQL query

		echo $sql;

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();

		#HASIL
		if ($query) {
			$hitung = mysqli_num_rows($query);
			if ($hitung > 0) {
				$result['Status'] = "Sukses";

				while ($data = mysqli_fetch_assoc($query)) {
					$hasil[] = $data;
				}
			} else {
				$result['Status'] = "Tidak Ada Data";
				$hasil[] = "";
			}
		} else {
			$result['Status'] = "Gagal";
			$hasil[] = "";
		}

		$result['Hasil'] = $hasil;
		#RETURN
		return $result;
	}
}
