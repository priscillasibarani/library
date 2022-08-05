<?php

class BukuModel extends CI_model
{

  public function nomor_buku()
  {
    $this->db->select('RIGHT(buku.nomor_buku, 3) as code', FALSE);
    $this->db->order_by('nomor_buku', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('buku');

    if ($query->num_rows() > 0) {
      $data = $query->row();
      $code = intval($data->code) + 1;
    } else {
      $code = 1;
    }

    $codemax = str_pad($code, 3, "0", STR_PAD_LEFT);
    $coderesult = "BK" . $codemax;
    return $coderesult;
  }

  public function get_tableid_edit($buku, $nomor_buku)
  {
    $this->db->where($nomor_buku);
    $edit = $this->db->get($buku);
    return $edit->row();
  }


  function CountTableId($buku, $nomor_buku, $id)
  {
    $id = $this->uri->segment('3');
    $this->db->where($nomor_buku, $id);
    $Count = $this->db->get($buku);
    return $Count->num_rows();
  }

  public function getbuku()
  {

    // $this->db->select('buku.*,buku.nama_pengarang as buku, buku.nama_penerbit as buku');
    $this->db->select('buku.*');
    $this->db->from('buku');
    $this->db->order_by('nomor_buku', 'DESC');
    return $this->db->get();
  }


  public function edit($id)
  {
    $this->db->select('*');
    $this->db->from('buku');

    $this->db->where('buku.nomor_buku', $id);
    $this->db->order_by('nomor_buku', 'DESC');
    $result = $this->db->get()->row_array();

    return $result;
  }

  public function update($nomor_buku, $data)
  {
    $this->db->where('nomor_buku', $nomor_buku);
    $this->db->update('buku', $data);
  }

  public function delete($id)
  {
    $this->db->where('nomor_buku', $id);
    $this->db->delete('buku');
  }

  function detail_buku($id = NULL)
  {
    $query = $this->db->get_where('buku', array('nomor_buku' => $id))->row();
    return $query;
  }
}
