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


class ReportScreeningsController  extends AppController
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
                
                if($query['output'] == 'webview'){
                    $this->autoRender = false;
                    $this->viewBuilder()->layout('report');

                    $this->set(compact('results'));
                    $this->render('pdf/index');
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

                    
                    $sheet->setCellValue('A1',   'Laporan Pendataan Tekanan Darah');
                    
                    $sheet->mergeCells('A1:I1');

                    $sheet->getStyle('A1:I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle('A1:I1')->getFont()->setBold(true);
                    $styleArray = [
                       'borders' => [
                          'allBorders' => [
                             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                          ],
                       ],
                    ];

                    $sheet->getStyle('A3:I3')->applyFromArray($styleArray);

                    $start = 3;
                    $sheet->setCellValue('A' . $start, 'No.');
                    $sheet->setCellValue('B' . $start, 'Nama');
                    $sheet->setCellValue('C' . $start, 'Nomor Handphone');
                    $sheet->setCellValue('D' . $start, 'tanggal Lahir');
                    $sheet->setCellValue('E' . $start, 'Jenis Kelamin');
                    $sheet->setCellValue('F' . $start, 'Tempat Pengukuran Tekanan Darah');
                    $sheet->setCellValue('G' . $start, 'Sistolik');
                    $sheet->setCellValue('H' . $start, 'Diastolik');
                    $sheet->setCellValue('I' . $start, 'Status');

                    $col = 4;
                    $no = 1;
                    $total = 0;
                    foreach ($results as $result) {
                        // dd($coba);
                        // die();

                        $sheet->getStyle('A' . $col . ':I' . $col)->applyFromArray($styleArray);
                        $sheet->getStyle('A3:I3')->applyFromArray($styleArray);
                        $sheet->setCellValue('A' . $col, $no);
                        $sheet->setCellValue('B' . $col,  $result->nama);
                        $sheet->setCellValue('C' . $col,  $result->telp);
                        $sheet->setCellValue('D' . $col, (!empty($result->birthdate)?$this->Utilities->indonesiaDateFormat($result->birthdate->format('Y-m-d')) : '-' ));
                        $sheet->setCellValue('E' . $col, (!empty($result->gender)?$this->Utilities->gender($result->gender) : '-' ));
                        $sheet->setCellValue('F' . $col, ($result->tempat_pengukuran_td == 2) ?  '('.$this->Utilities->luar($result->luar_klinik) .')':'');
                        $sheet->setCellValue('G' . $col,  $result->sistol);
                        $sheet->setCellValue('H' . $col,  $result->diastol);
                        $sheet->setCellValue('I' . $col,  $this->Utilities->hasil($result->status));
                        $no++;
                        $col++;
                    }
                    
                    $end = $col - 1;
                    $writer = new Xlsx($spreadsheet);
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename="Laporan Pendataan Tekanan Darah.xlsx"');
                    header('Cache-Control: max-age=0');
                    $writer->save('php://output');
                    exit();
                }
            }else{
               
            }            
        }
    }

}