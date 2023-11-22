<?php
$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);

        // mencetak string
        $pdf->Cell(190,7,'Laporan Pembukuan Laundry ',0,1,'');

         $pdf->SetFont('Arial','',12,'C');
        $pdf->Cell(190,7,'Laporan Hasil By Tanggal',0,1,'');

        $pdf->Cell(190,0,'',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        // $pdf->garis();

        // 
        $pdf->SetLineWidth(1);
        $pdf->Line(10,30,200,30);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,31,200,31);
        $pdf->Cell(190,7,'',0,1,'C');
        
        $pdf->SetFont('Arial','B',14);
        // 

        $pdf->Ln();
        
        $pdf->SetFont('Arial','',12);

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(20,6,'#',1,0);
        $pdf->Cell(30,6,'Tanngal',1,0);
        $pdf->Cell(25,6,'Total',1,1);

        $no = 1;
        foreach ($data as $d) {
            $pdf->Cell(20,6,$no++,1,0);
            $pdf->Cell(30,6,$d['fin_inv_dt'],1,0);
            $pdf->Cell(25,6,$d['total'],1,1);
            $no = $no +1;
        }
        $pdf->Cell(190,7,'',0,1,'C');

        $pdf->Output();