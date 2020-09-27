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


class ReportMatriksController  extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        if(!empty($this->Auth->user())){
            if(!in_array($this->Auth->user('role_id'), [1,2])){
                // dd($this->Auth->user('role_id'));
                return $this->redirect(['controller'=>'Dashboard', 'action'=>'index']);
            }
        }
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
                        'n_15_l'   => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN  15 AND 30) 
                            AND gender = 1 AND status = 1 THEN 1 END))',
                        'n_15_p'   => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN  15 AND 30) 
                            AND gender = 2 AND status = 1 THEN 1 END))',
                        'n_30_l'   => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) > 30) 
                            AND gender = 1 AND status = 1 THEN 1 END))',
                        'n_30_p'   => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) > 30) 
                            AND gender = 2 AND status = 1 THEN 1 END))',

                        'nt_15_l'  => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN  15 AND 30) 
                            AND gender = 1 AND status = 2 THEN 1 END))',
                        'nt_15_p'  => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN  15 AND 30) 
                            AND gender = 2 AND status = 2 THEN 1 END))',
                        'nt_30_l'  => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) > 30) 
                            AND gender = 1 AND status = 2 THEN 1 END))',
                        'nt_30_p'  => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) > 30) 
                            AND gender = 2 AND status = 2 THEN 1 END))',
                        
                        'g1_15_l'  => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN  15 AND 30) 
                            AND gender = 1 AND status = 3 THEN 1 END))',
                        'g1_15_p'  => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN  15 AND 30) 
                            AND gender = 2 AND status = 3 THEN 1 END))',
                        'g1_30_l'  => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) > 30) 
                            AND gender = 1 AND status = 3 THEN 1 END))',
                        'g1_30_p'  => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) > 30) 
                            AND gender = 2 AND status = 3 THEN 1 END))',
                        
                        'g2_15_l'  => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN  15 AND 30) 
                            AND gender = 1 AND status = 4 THEN 1 END))',
                        'g2_15_p'  => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) BETWEEN  15 AND 30) 
                            AND gender = 2 AND status = 4 THEN 1 END))',
                        'g2_30_l'  => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) > 30) 
                            AND gender = 1 AND status = 4 THEN 1 END))',
                        'g2_30_p'  => '(COUNT(CASE WHEN (TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) > 30) 
                            AND gender = 2 AND status = 4 THEN 1 END))',
                    ])->toArray();
                // dd($data);
                $results= [];
                $nama = [
                    'Normal',
                    'Normal Tinggi',
                    'Hipertensi Grade 1',
                    'Hipertensi Grade 2',
                ]; 

                $hasil_1 = [
                    'n_15_l',
                    'nt_15_l',
                    'g1_15_l',
                    'g2_15_l'
                ]; 
                $hasil_2 = [
                    'n_15_p',
                    'nt_15_p',
                    'g1_15_p',
                    'g2_15_p'
                ]; 
                $hasil_3 = [
                    'n_30_l',
                    'nt_30_l',
                    'g1_30_l',
                    'g2_30_l'
                ];
                $hasil_4 = [
                    'n_30_p',
                    'nt_30_p',
                    'g1_30_p',
                    'g2_30_p'
                ]; 
                 

                foreach ($data as $key => $value) {
                    for($i = 0; $i <= 3; $i++){
                        $results[$i] = [
                                        'nama'      => $nama[$i],
                                        'hasil_1'   => $value[$hasil_1[$i]],
                                        'hasil_2'   => $value[$hasil_2[$i]],
                                        'hasil_3'   => $value[$hasil_3[$i]],
                                        'hasil_4'   => $value[$hasil_4[$i]]
                                    ]; 
                    }
                }
                // dd($results);
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
                        'title' => 'Matriks Data Cegah Hipertensi'
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
                    $sheet->getColumnDimension('G')->setAutoSize(true);
                    
                    $sheet->setCellValue('A1',   'Matriks Data Cegah Hipertensi');
                    

                    $sheet->mergeCells('A1:G1');
                    $cell = ['A','B','G'];
                    for($i=0; $i < 3; $i++){
                        $sheet->mergeCells($cell[$i].'3' .':'. $cell[$i].'4');
                        // echo "asd";
                        // dump($cell[$i].'3' .':'. $cell[$i].'4');
                    }
                    // die();

                    $sheet->mergeCells('C3:D3');
                    $sheet->mergeCells('E3:F3');

                    $sheet->getStyle('A1:G3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle('A1:G1')->getFont()->setBold(true);
                    $styleArray = [
                       'borders' => [
                          'allBorders' => [
                             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                          ],
                       ],
                    ];

                    $sheet->getStyle('A3:G4')->applyFromArray($styleArray);

                    $start = 3;
                    $sheet->setCellValue('A' . $start, 'No.');
                    $sheet->setCellValue('B' . $start, 'Kondisi');
                    $sheet->setCellValue('C' . $start, 'Usia 15-30 tahun');
                    $sheet->setCellValue('E' . $start, 'Usia > 30 Tahun');
                    $sheet->setCellValue('G' . $start, 'Total');


                    $sheet->setCellValue('C4', 'Laki-Laki');
                    $sheet->setCellValue('D4', 'Perempuan');
                    $sheet->setCellValue('E4', 'Laki-Laki');
                    $sheet->setCellValue('F4', 'Perempuan');
                    $col = 5;
                    $no = 1;
                    $total = 0;
                    $hasil_1=0;
                    $hasil_2=0;
                    $hasil_3=0;
                    $hasil_4=0;
                    foreach ($results as $result) {
                        // dd($coba);
                        // die();
                        $hasil_1 +=$result['hasil_1'];
                        $hasil_2 +=$result['hasil_2'];
                        $hasil_3 +=$result['hasil_3'];
                        $hasil_4 +=$result['hasil_4'];
                        $total = $hasil_1+$hasil_2+$hasil_3+$hasil_4;

                        $sheet->getStyle('A' . $col . ':G' . $col)->applyFromArray($styleArray);
                        $sheet->getStyle('A3:G3')->applyFromArray($styleArray);
                        $sheet->setCellValue('A' . $col, $no);
                        $sheet->setCellValue('B' . $col, $result['nama']);
                        $sheet->setCellValue('C' . $col, number_format($result['hasil_1']));
                        $sheet->setCellValue('D' . $col, number_format($result['hasil_2']));
                        $sheet->setCellValue('E' . $col, number_format($result['hasil_3']));
                        $sheet->setCellValue('F' . $col, number_format($result['hasil_4']));
                        $sheet->setCellValue('G' . $col, number_format($result['hasil_1']+$result['hasil_2']+$result['hasil_3']+$result['hasil_4']));
                        $no++;
                        $col++;
                    }
                    
                    $sheet->getStyle('A' . $col . ':G' . $col)->applyFromArray($styleArray);
                    $sheet->setCellValue('C' . $col, 'Total');
                    $sheet->setCellValue('C' . $col, number_format($hasil_1));
                    $sheet->setCellValue('D' . $col, number_format($hasil_2));
                    $sheet->setCellValue('E' . $col, number_format($hasil_3));
                    $sheet->setCellValue('F' . $col, number_format($hasil_4));
                    $sheet->setCellValue('G' . $col, number_format($total));

                    $end = $col - 1;
                    $writer = new Xlsx($spreadsheet);
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename="Matriks Data Cegah Hipertensi.xlsx"');
                    header('Cache-Control: max-age=0');
                    $writer->save('php://output');
                    exit();
                }
            }else{
               
            }            
        }
    }

}