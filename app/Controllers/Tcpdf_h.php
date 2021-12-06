<?php

namespace App\Controllers;

use TCPDF;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;


class Tcpdf_h extends BaseController
{
    public function index()
    {

        echo view('print/pdf_tte_v');
        // $writer = new PngWriter();
        // $base_url = base_url();
        // // Create QR code
        // $qrCode = QrCode::create($base_url.'/public/documents/contoh.pdf')
        //     ->setEncoding(new Encoding('UTF-8'))
        //     ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
        //     ->setSize(300)
        //     ->setMargin(10)
        //     ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
        //     ->setForegroundColor(new Color(0, 0, 0))
        //     ->setBackgroundColor(new Color(255, 255, 255));

        // // Create generic logo
        // $logo = Logo::create(base_url() . '/assets/img/logo.png')
        //     ->setResizeToWidth(50);

        // // Create generic label
        // $label = Label::create('Label')
        //     ->setTextColor(new Color(255, 0, 0));

        // $result = $writer->write($qrCode, $logo, $label);
        // // Directly output the QR code
        // header('Content-Type: '.$result->getMimeType());
        // echo $result->getString();


        // // Save it to a file
        // $result->saveToFile(__DIR__.'/qrcode.png');

        // // Generate a data URI to include image data inline (i.e. inside an <img> tag)
        // $dataUri = $result->getDataUri();
    }

    public function create()
    {
     
        ob_start();
        
       
        $filename= "tte".date('hms').".pdf"; 
        $filelocation = ROOTPATH."\\public\\documents\\pdf";//windows
        $fileNL = $filelocation."\\".$filename;//Windows
        $qc = $this->generate_qrcode($fileNL);
        $data =["qc"=> $qc];
        $html = view('print/pdf_tte_v',$data);
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('DLH KABUPATEN BEKASI');
        $pdf->SetTitle('TANDA TERIMA ELETRONIK');
        $pdf->SetSubject('PELAPORAN AIR LIMBAH');
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, '');
        $this->response->setContentType('application/pdf');
        ob_clean();
        $pdf->Output($fileNL, 'F');
        return $pdf->Output($fileNL, 'I');
    }

    public function generate_qrcode($filename){
        $writer = new PngWriter();
        $base_url = base_url();
        // Create QR code
        $qrCode = QrCode::create($filename)
        // $qrCode = QrCode::create($base_url.'/public/documents/contoh.pdf')
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = Logo::create(base_url() . '/assets/img/logo.png')
            ->setResizeToWidth(50);

        // Create generic label
        $label = Label::create('Label')
            ->setTextColor(new Color(255, 0, 0));

        $result = $writer->write($qrCode, $logo);
        // Directly output the QR code
        // header('Content-Type: '.$result->getMimeType());
        // echo $result->getString();
        
        // Save it to a file
        // $result->saveToFile(__DIR__.'/qrcodes.png');

        // Generate a data URI to include image data inline (i.e. inside an <img> tag)
        $dataUri = $result->getDataUri();
        return $dataUri;
    }
}
