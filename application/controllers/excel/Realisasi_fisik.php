<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class realisasi_fisik extends CI_Controller
{
    public $data;
    public $spreadsheet;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model', 'laporan');
        $this->spreadsheet = new Spreadsheet();
    }

    public function index($formname, $id_laporan)
    {
        $this->data['nama_laporan'] = ucwords(str_replace('_', ' ', $formname));
        $this->data['fetch'] = $this->laporan->get_laporan_data_by_name_id($formname, $id_laporan);
        $this->data['nama_opd'] = $this->session->tempdata('nama_opd');

        $this->export($formname, $id_laporan);
        $this->download();
    }

    public function style($stylereq)
    {
        switch ($stylereq) {
            case 'foo_css':
                $style = [];
                break;
            case 'allborder':
                $style = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                        ]
                    ]
                ];
                break;
            case 'font-red':
                $style = [
                    'font' => [
                        'color' => [
                            'argb' => \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED
                        ]
                    ]
                ];
                break;
            default:
                # code...
                break;
        }

        return $style;
    }

    public function export($formname, $id_laporan)
    {
        // ini bikin sheetnya
        $this->spreadsheet->setActiveSheetIndex(0)->setTitle($this->data['nama_laporan']);

        // ---- INI SHEET PERTAMA ----
        // ini atur sheet
        $sheet = $this->spreadsheet->getActiveSheet();

        // ini atur width
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(50);
        $sheet->getColumnDimension('D')->setWidth(50);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(20);
        $sheet->getColumnDimension('L')->setWidth(20);

        // ini stylenya
        $sheet->getStyle('1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('1')->getAlignment()->setVertical('center');
        $sheet->getStyle('A7:A9')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A7:A9')->getAlignment()->setVertical('center');
        $sheet->getStyle('C7:C9')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('C7:C9')->getAlignment()->setVertical('center');
        $sheet->getStyle('D:L')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('B7:B9')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('B7:B9')->getAlignment()->setVertical('center');
        $sheet->getStyle('D:L')->getAlignment()->setVertical('center');
        $sheet->getStyle('A:L')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('A7:L9')->getFont()->setBold(true);
  
        // ini atur header
        $sheet->setCellValue('A1', 'LAPORAN REALISASI FISIK DAN KEUANGAN SERTA CAPAIAN KINERJA TAHUN ' . date('Y', strtotime($this->data['fetch']['rf']['tgl'])))
            ->mergeCells('A1:L1');
        $sheet->setCellValue('A3', 'UNIT ORGANISASI');
        $sheet->setCellValue('C3', ':' . $this->data['nama_opd']);
        $sheet->setCellValue('A4', 'BULAN');
        $sheet->setCellValue('C4', ':' . date('M', strtotime($this->data['fetch']['rf']['tgl'])));
        $sheet->setCellValue('A5', 'TAHUN ANGGARAN');
        $sheet->setCellValue('C5', ':'  . date('Y', strtotime($this->data['fetch']['rf']['tgl'])));


        // ini tablenya
        // th numrow 5
        $sheet->setCellValue('A7', 'NO.')
            ->mergeCells('A7:A8');
        $sheet->setCellValue('B7', 'PROGRAM')
            ->mergeCells('B7:B8');
        $sheet->setCellValue('C7', 'URAIAN KEGIATAN')
            ->mergeCells('C7:C8');
        $sheet->setCellValue('D7', 'INDIKATOR')
            ->mergeCells('D7:D8');
        $sheet->setCellValue('E7', 'SATUAN')
            ->mergeCells('E7:E8');
        $sheet->setCellValue('F7', 'KINERJA')
            ->mergeCells('F7:H7');
        $sheet->setCellValue('I7', 'KEUANGAN')
            ->mergeCells('I7:K7');
        $sheet->setCellValue('L7', 'KET')
            ->mergeCells('L7:L8');


        // th numrow 6
        $sheet->setCellValue('F8', 'TARGET');
        $sheet->setCellValue('G8', 'REALISASI');
        $sheet->setCellValue('H8', '%');
        $sheet->setCellValue('I8', 'ANGGARAN');
        $sheet->setCellValue('J8', 'REALISASI');
        $sheet->setCellValue('K8', '%');
        
        $sheet->setCellValue('A9', '1');
        $sheet->setCellValue('B9', '2');
        $sheet->setCellValue('C9', '3');
        $sheet->setCellValue('D9', '4');
        $sheet->setCellValue('E9', '6');
        $sheet->setCellValue('F9', '7');
        $sheet->setCellValue('G9', '8');
        $sheet->setCellValue('H9', '9');
        $sheet->setCellValue('I9', '10');
        $sheet->setCellValue('J9', '11');
        $sheet->setCellValue('K9', '12');
        $sheet->setCellValue('L9', '13');

        // // td numrow 7
        $numrow = 10;

        //for buat data
        // $counter = 0;
        // foreach ($this->data['fetch']['p'] as $prog) {
        //     $prog_rowspan = (sizeof($this->data['fetch']['drp'][$prog['id_pegawai']]) - 1);
        //     $counter += 1;

        //     $sheet->setCellValue('A' . $numrow, $counter)
        //         ->mergeCells('A' . $numrow . ':A' . ($numrow + $prog_rowspan));
        //     $sheet->setCellValue('B' . $numrow, ucwords($prog['nama']))
        //         ->mergeCells('B' . $numrow . ':B' . ($numrow + $prog_rowspan));

        //     foreach ($this->data['fetch']['drp'][$prog['id_pegawai']] as $kg) {
        //         $sheet->setCellValue('C' . $numrow, ucwords($kg['nama_paket_kerja']));
        //         $sheet->setCellValue('D' . $numrow, $kg['pagu']);
        //         $sheet->setCellValue('E' . $numrow, ucwords($kg['jabatan']));
        //         $sheet->setCellValue('F' . $numrow, ucwords($kg['ket']));
        //         $numrow++;
        //     }
        //     // $numrow ++;
        // }
        // end ambil data

        // ini style tablenya
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);
        $sheet->setShowGridlines(true);
        $sheet->getStyle('A7:L' . ($numrow - 1))->applyFromArray($this->style('allborder'));
    }

    public function download()
    {
        $file = new Xlsx($this->spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $this->data['nama_laporan'] . '.xlsx"');
        header('Cache-Control: max-age=0');

        $file->save('php://output'); // download file 
    }
}

/* End of file pelayanan_publik.php */
