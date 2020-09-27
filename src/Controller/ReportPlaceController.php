<?php
// src/Controller/UsersController.php

namespace App\Controller;


use Cake\Core\Configure;
use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Event\Event;
use Cake\Network\Request;


class ReportPlaceController  extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // $this->Auth->allow(['index']);
    }

    public function index()
    {
    	if($this->request->is('post')){
            return $this->redirect(['action'=>'index','?' => $this->request->getData()]);
        }else{
        	
            $start1 = $this->request->query('start');
            // dd($start);
            $end = $this->request->query('end');
            if(!empty($this->request->query('output'))){
                $query = $this->request->query();
                $session = new Request();
                       
                $this->loadModel('Screenings');
                $results = $this->Screenings->find('all');

                $data = $this->Screenings->find('all')
                    ->select([
                        'n_k'   => '(COUNT(CASE WHEN tempat_pengukuran_td = 1 AND status = 1 THEN 1 END))',
                        'n_m'   => '(COUNT(CASE WHEN luar_klinik          = 1 AND status = 1 THEN 1 END))',
                        'n_p'   => '(COUNT(CASE WHEN luar_klinik          = 2 AND status = 1 THEN 1 END))',

                        'nt_k'  => '(COUNT(CASE WHEN tempat_pengukuran_td = 1 AND status = 2 THEN 1 END))',
                        'nt_m'  => '(COUNT(CASE WHEN luar_klinik          = 1 AND status = 2 THEN 1 END))',
                        'nt_p'  => '(COUNT(CASE WHEN luar_klinik          = 2 AND status = 2 THEN 1 END))',
                        
                        'g1_k'  => '(COUNT(CASE WHEN tempat_pengukuran_td = 1 AND status = 3 THEN 1 END))',
                        'g1_m'  => '(COUNT(CASE WHEN luar_klinik          = 1 AND status = 3 THEN 1 END))',
                        'g1_p'  => '(COUNT(CASE WHEN luar_klinik          = 2 AND status = 3 THEN 1 END))',
                        
                        'g2_k'  => '(COUNT(CASE WHEN tempat_pengukuran_td = 1 AND status = 4 THEN 1 END))',
                        'g2_m'  => '(COUNT(CASE WHEN luar_klinik          = 1 AND status = 4 THEN 1 END))',
                        'g2_p'  => '(COUNT(CASE WHEN luar_klinik          = 2 AND status = 4 THEN 1 END))',
                    ])->toArray();
                $results= [];
                $nama = [
                    'Normal',
                    'Normal Tinggi',
                    'Hipertensi Grade 1',
                    'Hipertensi Grade 2',
                ]; 

                $hasil_k = [
                    'n_k',
                    'nt_k',
                    'g1_k',
                    'g2_k'
                ]; 
                $hasil_m = [
                    'n_m',
                    'nt_m',
                    'g1_m',
                    'g2_m'
                ]; 
                $hasil_p = [
                    'n_p',
                    'nt_p',
                    'g1_p',
                    'g2_p'
                ]; 
                foreach ($data as $key => $value) {
                    for($i = 0; $i <= 3; $i++){
                        $results[$i] = [
                                        'nama'      => $nama[$i],
                                        'hasil_k'   => $value[$hasil_k[$i]],
                                        'hasil_m'   => $value[$hasil_m[$i]],
                                        'hasil_p'   => $value[$hasil_p[$i]]
                                    ]; 
                    }
                }
                
                if($query['output'] == 'webview'){
                    $this->autoRender = false;
                    $this->viewBuilder()->layout('report');

                    $this->set(compact('results'));
                    $this->render('pdf/index');
                }elseif($query['output'] == 'grafik'){
                    $this->autoRender = false;
                    $this->viewBuilder()->layout('report');

                    $this->set(compact('results'));
                    $this->render('pdf/grafik');
                }elseif($query['output'] == 'pdf'){

                    Configure::write('CakePdf', [
                        'engine'    => 'CakePdf.DomPdf',
                        'margin'    => [
                            'bottom'    => 15,
                            'left'      => 50,
                            'right'     => 30,
                            'top'       => 45
                        ],
                        'orientation'   => 'landscape',
                        'pageSize'  => 'A4',
                        'download'  => false
                    ]);
                    $this->viewBuilder()->options([
                    'pdfConfig' => [
                        'title' => 'Hasil Pemeriksaan Tekanan Darah berdasarkan tempat Pemeriksaan'
                    ]])->layout('index');
                     // $this->render('pdf/index','report');
                    $this->RequestHandler->renderAs($this, 'pdf');
                    $this->set(compact('results'));
                }else{
                     $spreadsheet = new Spreadsheet();
                    $sheet = $spreadsheet->getActiveSheet();
                    $sheet->getColumnDimension('A');
                    $sheet->getColumnDimension('B')->setAutoSize(true);
                    $sheet->getColumnDimension('C')->setAutoSize(true);
                    $sheet->getColumnDimension('D')->setAutoSize(true);
                    $sheet->getColumnDimension('E')->setAutoSize(true);
                    $sheet->getColumnDimension('F')->setAutoSize(true);
                    
                    $sheet->setCellValue('A1',   'Hasil Pemeriksaan Tekanan Darah berdasarkan tempat Pemeriksaan');
                    

                    $sheet->mergeCells('A1:F1');
                    $cell = ['A','B','C','F'];
                    for($i=0; $i < 3; $i++){
                        $sheet->mergeCells($cell[$i].'3' .':'. $cell[$i].'4');
                        // echo "asd";
                        // dump($cell[$i].'3' .':'. $cell[$i].'4');
                    }
                    // die();

                    $sheet->mergeCells('D3:E3');

                    $sheet->getStyle('A1:F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle('A1:F1')->getFont()->setBold(true);
                    $styleArray = [
                       'borders' => [
                          'allBorders' => [
                             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                          ],
                       ],
                    ];

                    $sheet->getStyle('A3:F4')->applyFromArray($styleArray);

                    $start = 3;
                    $sheet->setCellValue('A' . $start, 'No.');
                    $sheet->setCellValue('B' . $start, 'Nama');
                    $sheet->setCellValue('C' . $start, 'Klinik');
                    $sheet->setCellValue('D' . $start, 'Luar Klinik');
                    $sheet->setCellValue('F' . $start, 'Jumlah');


                    $sheet->setCellValue('D4', 'Mandiri');
                    $sheet->setCellValue('E4', 'Posbindu');
                    $col = 5;
                    $no = 1;
                    $total = 0;
                     $hasil_k=0;
                    $hasil_m=0;
                    $hasil_p=0;
                    foreach ($results as $result) {
                        // dd($coba);
                        // die();

                        $hasil_k+=$result['hasil_k'];
                        $hasil_m+=$result['hasil_m'];
                        $hasil_p+=$result['hasil_p'];
                        $total = $hasil_k+$hasil_m+$hasil_p;

                        $sheet->getStyle('A' . $col . ':F' . $col)->applyFromArray($styleArray);
                        $sheet->getStyle('A3:F3')->applyFromArray($styleArray);
                        $sheet->setCellValue('A' . $col, $no);
                        $sheet->setCellValue('B' . $col, $result['nama']);
                        $sheet->setCellValue('C' . $col, number_format($result['hasil_k']));
                        $sheet->setCellValue('D' . $col, number_format($result['hasil_m']));
                        $sheet->setCellValue('E' . $col, number_format($result['hasil_p']));
                        $sheet->setCellValue('F' . $col, number_format($result['hasil_k']+$result['hasil_m']+$result['hasil_p']));
                        $no++;
                        $col++;
                    }

                    $sheet->getStyle('A' . $col . ':F' . $col)->applyFromArray($styleArray);
                    $sheet->setCellValue('C' . $col, 'Total');
                    $sheet->setCellValue('C' . $col, number_format($hasil_k));
                    $sheet->setCellValue('D' . $col, number_format($hasil_m));
                    $sheet->setCellValue('E' . $col, number_format($hasil_p));
                    $sheet->setCellValue('F' . $col, number_format($total));

                    
                    $end = $col - 1;
                    $writer = new Xlsx($spreadsheet);
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename="Hasil Pemeriksaan Tekanan Darah berdasarkan tempat Pemeriksaan.xlsx"');
                    header('Cache-Control: max-age=0');
                    $writer->save('php://output');
                    exit();
                }
            }else{
               
            }            
        }
    }

}