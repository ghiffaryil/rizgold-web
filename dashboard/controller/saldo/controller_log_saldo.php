<?php
class Search_Controller_Log_Saldo{
    public function select_search_filter($u_Id_Pengguna = ""){
        global $a_tambah_baca_update_hapus, $a_hash;

        $search_field_where = array("Id_Pengguna");
        $search_criteria_where = array("=");
        $search_value_where = array("$u_Id_Pengguna");
        $search_connector_where = array("ORDER BY Id_Log_Saldo DESC");

        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_log_saldo", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

        if ($result['Status'] == "Sukses") {
            return $result['Hasil'];
        } else {
            return [];
        }
    }
}
