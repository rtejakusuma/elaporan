<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class laporan_kinerja_triwulan extends CI_Controller
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
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);

        // ini stylenya
        $sheet->getStyle('A:H')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A:H')->getAlignment()->setVertical('center');
        $sheet->getStyle('A:H')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A1:H6')->getFont()->setBold(true);

        // ini atur header
        $sheet->setCellValue('A1', 'LAPORAN KINERJA TRIWULAN')
            ->mergeCells('A1:H1');
        $sheet->setCellValue('A2', $this->data['nama_opd'])
            ->mergeCells('A2:H2');

        // ini tablenya
        // th numrow 4
        $sheet->setCellValue('A4', 'No.')->mergeCells('A4:A5');
        $sheet->setCellValue('B4', 'Sasaran Kegiatan')->mergeCells('B4:E4');
        $sheet->setCellValue('F4', 'Program')->mergeCells('F4:F5');
        $sheet->setCellValue('G4', 'Anggaran')->mergeCells('G4:G5');
        $sheet->setCellValue('H4', 'Realisasi')->mergeCells('H4:H5');

        $sheet->setCellValue('B5', 'Uraian');
        $sheet->setCellValue('C5', 'Indikator Kinerja');
        $sheet->setCellValue('D5', 'Target');
        $sheet->setCellValue('E5', 'Realisasi');

        $sheet->setCellValue('A6', '1');
        $sheet->setCellValue('B6', '2');
        $sheet->setCellValue('C6', '3');
        $sheet->setCellValue('D6', '4');
        $sheet->setCellValue('E6', '5');
        $sheet->setCellValue('F6', '6');
        $sheet->setCellValue('G6', '7');
        $sheet->setCellValue('H6', '8');

        // td numrow 6
        $numrow = 7;

        // data
        $counter = 0;
        foreach ($this->data['fetch']['lktdetail'] as $lktdetail) {
            $counter += 1;

            $sheet->setCellValue('A' . $numrow, $counter);
            $sheet->setCellValue('B' . $numrow, $lktdetail['uraian']);
            $sheet->setCellValue('C' . $numrow, $lktdetail['indikator_kinerja']);
            $sheet->setCellValue('D' . $numrow, $lktdetail['target']);
            $sheet->setCellValue('E' . $numrow, $lktdetail['realisasi_target']);
            $sheet->setCellValue('F' . $numrow, $lktdetail['program']);
            $sheet->setCellValue('G' . $numrow, $lktdetail['anggaran']);
            $sheet->setCellValue('H' . $numrow, $lktdetail['capaian_realisasi_keuangan']);

            $numrow++;
        }

        // ini style tablenya
        $sheet->getPageSetup()->setOrientation('landscape');
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);
        $sheet->setShowGridlines(true);
        $sheet->getStyle('A4:H' . ($numrow - 1))->applyFromArray($this->style('allborder'));
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

/* End of file laporan_kinerja_triwulan.php */
