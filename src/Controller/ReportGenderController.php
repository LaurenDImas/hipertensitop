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


class ReportGenderController  extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        if(!in_array($this->Auth->user('role_id'), [1,2])){
            // dd($this->Auth->user('role_id'));
            return $this->redirect(['controller'=>'Dashboard', 'action'=>'index']);
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
                    
                $data = $this->Screenings->find('all')
                    ->select([
                        'n_l'   => '(COUNT(CASE WHEN status = 1 AND gender = 1 THEN 1 END))',
                        'n_p'   => '(COUNT(CASE WHEN status = 1 AND gender = 2 THEN 1 END))',
                        'nt_l'  => '(COUNT(CASE WHEN status = 2 AND gender = 1 THEN 1 END))',
                        'nt_p'  => '(COUNT(CASE WHEN status = 2 AND gender = 2 THEN 1 END))',
                        'g1_l'  => '(COUNT(CASE WHEN status = 3 AND gender = 1 THEN 1 END))',
                        'g1_p'  => '(COUNT(CASE WHEN status = 3 AND gender = 2 THEN 1 END))',
                        'g2_l'  => '(COUNT(CASE WHEN status = 4 AND gender = 1 THEN 1 END))',
                        'g2_p'  => '(COUNT(CASE WHEN status = 4 AND gender = 2 THEN 1 END))',
                    ])->toArray();
                $results= [];
                foreach ($data as $key => $value) {
                    $results[0] = ['nama'=> 'Normal','hasil_l'=> $value['n_l'],'hasil_p'=>$value['n_p']];
                    $results[1] = ['nama'=> 'Normal Tinggi','hasil_l'=> $value['nt_l'],'hasil_p'=>$value['nt_p']];
                    $results[2] = ['nama'=> 'Hipertensi Grade 1','hasil_l'=> $value['g1_l'],'hasil_p'=>$value['g1_p']];
                    $results[3] = ['nama'=> 'Hipertensi Grade 2','hasil_l'=> $value['g2_l'],'hasil_p'=>$value['g2_p']];
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
                        'title' => 'POK DEFINITIF TAHUN '. date('Y').''
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
                    $sheet->getColumnDimension('H')->setAutoSize(true);
                    $sheet->getColumnDimension('I')->setAutoSize(true);

                    
                    $sheet->setCellValue('A1',   'Hasil Pemeriksaan Tekanan Darah Berdasarkan Jenis Kelamin');
                    
                    $sheet->mergeCells('A1:D1');

                    $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle('A1:D1')->getFont()->setBold(true);
                    $styleArray = [
                       'borders' => [
                          'allBorders' => [
                             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                          ],
                       ],
                    ];

                    $sheet->getStyle('A3:D3')->applyFromArray($styleArray);

                    $start = 3;
                    $sheet->setCellValue('A' . $start, 'No.');
                    $sheet->setCellValue('B' . $start, 'Kondisi');
                    $sheet->setCellValue('C' . $start, 'Laki-laki');
                    $sheet->setCellValue('D' . $start, 'Perempuan');
                    $col = 4;
                    $no = 1;
                    $total = 0;
                     $hasil_l =0;
                    $hasil_p =0;
                    foreach ($results as $result) {
                        // dd($coba);
                        // die();
                        $hasil_l +=$result['hasil_l'];
                        $hasil_p +=$result['hasil_p'];
                        $total = $hasil_l + $hasil_p;

                        $sheet->getStyle('A' . $col . ':D' . $col)->applyFromArray($styleArray);
                        $sheet->getStyle('A3:D3')->applyFromArray($styleArray);
                        $sheet->setCellValue('A' . $col, $no);
                        $sheet->setCellValue('B' . $col, $result['nama']);
                        $sheet->setCellValue('C' . $col, number_format($result['hasil_l']));
                        $sheet->setCellValue('D' . $col, number_format($result['hasil_p']));
                        $no++;
                        $col++;
                    }


                    $sheet->getStyle('A' . $col . ':D' . $col)->applyFromArray($styleArray);
                    $sheet->setCellValue('C' . $col, 'Total');
                    $sheet->setCellValue('C' . $col, number_format($hasil_l));
                    $sheet->setCellValue('D' . $col, number_format($hasil_p));
                   
                    
                    $end = $col - 1;
                    $writer = new Xlsx($spreadsheet);
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename="Hasil Pemeriksaan Tekanan Darah Berdasarkan Jenis Kelamin.xlsx"');
                    header('Cache-Control: max-age=0');
                    $writer->save('php://output');
                    exit();
                }
            }else{
               
            }            
        }
    }

}