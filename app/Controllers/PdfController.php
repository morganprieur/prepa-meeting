<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SujetModel;

class PdfController extends Controller {

  /**
   * Affichage html 
   */
  public function displayPdf() {

    $sujet_model = new SujetModel();

    $data = [
      'sujets' => $sujet_model->getSujets(),
      'title' => 'Export PDF',
      'docwork' => ''
    ];



    return view('gup/pdf_view');
  }

  /**
   * Export html to pdf 
   */
  public function htmlToPdf() {
    $sujet_model = new SujetModel();

    $data = [
      'sujets' => $sujet_model->getSujets(),
      'title' => 'Export PDF'
    ];

    $dompdf = new \Dompdf\Dompdf();
    // $dompdf->loadHtml(view('gup/pdf_view'));
    $dompdf->loadHtml(view('gup/all_sujets', $data));
    $dompdf->setPaper('A4', 'landscape');  //  portrait
    $dompdf->render();
    $dompdf->stream();
  }


}


