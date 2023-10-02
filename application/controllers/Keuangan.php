<?php
// Mendefinisikan bahwa akses langsung ke file ini tidak diperbolehkan
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Memuat model 'm_model' dan helper 'my_helper'
        $this->load->model('m_model');
        $this->load->helper('my_helper');

        // Mengecek apakah pengguna telah login, jika tidak, maka akan diarahkan ke halaman login
        if ($this->session->userData('logged_in') != true && $this->session->userData('role') != 'keuangan') {
            redirect(base_url() . 'auth');
        }
    }


    // dashboard keuangan 
    public function index()
    {
        $this->load->view('keuangan/index');
    }

    // function export 
    public function export()
    {
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
  
      $style_col = [
        'font' => ['bold' => true],
        'alignment' => [
          'horizontal' => \PhpOffice\PhpSpreadsheet\style\Alignment::HORIZONTAL_CENTER,
          'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
        ],
        'borders' => [
          'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
          'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
          'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
          'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
        ]
      ];
  
      $style_row = [
        'alignment' => [
          'vertical' => \PhpOffice\PhpSpreadsheet\style\Alignment::VERTICAL_CENTER
        ],
        'borders' => [
          'top' => ['borderstyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
          'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
          'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN],
          'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\style\Border::BORDER_THIN]
        ]
      ];
  
      $sheet->setCellValue('A1', "DATA PEMBAYARAN");
      $sheet->mergeCells('A1:E1');
      $sheet->getStyle('A1')->getFont()->setBold(true);
  
      $sheet->setCellValue('A3', "ID");
      $sheet->setCellValue('B3', "JENIS PEMBAYARAN");
      $sheet->setCellValue('C3', "TOTAL PEMBAYARAN");
  
      $sheet->getStyle('A3')->applyFromArray($style_col);
      $sheet->getStyle('B3')->applyFromArray($style_col);
      $sheet->getStyle('C3')->applyFromArray($style_col);
  
      $data_pembayaran = $this->m_model->get_data('pembayaran')->result();
  
      $no = 1;
      $numrow = 4;
      foreach($data_pembayaran as $data){
        $sheet->setCellValue('A'.$numrow, $no);
      $sheet->setCellValue('B'.$numrow, $data->jenis_pembayaran);
      $sheet->setCellValue('C'.$numrow, $data->total_pembayaran);
  
      $sheet->getStyle('A'.$numrow) ->applyFromArray($style_row);
      $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
  
      $no++;
      $numrow++;
      }
  
      $sheet->getColumnDimension('A')->setWidth(5);
      $sheet->getColumnDimension('B')->setWidth(25);
      $sheet->getColumnDimension('C')->setWidth(25);
      $sheet->getColumnDimension('D')->setWidth(20);
      $sheet->getColumnDimension('E')->setWidth(30);
  
      $sheet->getDefaultRowDimension()->setRowHeight(-1);
  
      $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
  
      $sheet->setTitle("LAPORAN DATA PEMBAYARAN");
      header('Content-Type: aplication/vnd.openxmlformants-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="PEMBAYARAN.xlsx"');
      header('Cache-Control: max-age=0');
  
      $writer = new Xlsx($spreadsheet);
      $writer->save('php://output');    
  
    }

    // get data pembayaran
    public function pembayaran()
    {
        $data['pembayaran'] = $this->m_model->get_pembayaran();
        $this->load->view('keuangan/pembayaran', $data);
    }

    //tambah pembayaran
    public function tambah_pembayaran()
    {
        $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $this->load->view('keuangan/tambah_pembayaran', $data);
    }

    //aksi pembayaran
    public function aksi_tambah_pembayaran()
    {
        $data = [
            'id_siswa' => $this->input->post('nama_siswa'),
            'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
            'total_pembayaran' => $this->input->post('total_pembayaran')
        ];
        $this->m_model->tambah_data('pembayaran', $data);
        redirect(base_url('keuangan/pembayaran'));
    }

    public function edit_pembayaran($id)
    {
        $data['pembayaran_id'] = $this->m_model->get_by_id('pembayaran', 'id_pembayaran', $id)->result();
        $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $this->load->view('keuangan/edit_pembayaran', $data);
    }

    public function aksi_edit_pembayaran()
    {
        $data = array(
            'id_siswa' => $this->input->post('id_siswa'),
            'jeniss_pembayaran' => $this->input->post('jeniss_pembayaran'),
            'totall_pembayaran' => $this->input->post('totall_pembayaran'),
        );
        $eksekusi = $this->m_model->ubah_data('pembayaran', $data, array('id_pembayaran' => $this->input->post('id_pembayaran')));
        if ($eksekusi) {
            $this->session->set_flashdata('success_message', 'berhasil');
            redirect(base_url('keuangan/pembayaran'));
        } else {
            $this->session->set_flashdata('error', "Data guru belum di edit");
            redirect(base_url('keuangan/pembayaran/' . $this->input->post('id_pembayaran')));
        }
    }

    public function hapus_pembayaran($id)
    {
        $this->m_model->delete('pembayaran', 'id_pembayaran', $id);
        redirect(base_url('keuangan/pembayaran'));
    }
}
?>