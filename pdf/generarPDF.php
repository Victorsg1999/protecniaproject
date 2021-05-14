<?php
include "../librerias/fpdf-1.83/fpdf.php";
include "usuario.php";
$id=$_GET['id'];
$usuario = new Usuario();

    //Creación de PDF
    $pdf = new FPDF($orientation='P',$unit='mm');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',20);    
    $textypos = 5;
    $pdf->setY(10);
    $pdf->setX(65);
    //Datos de la empresa
    $pdf->Cell(5,$textypos,"DATOS DEL USUARIO:");
    $usuario->recuperartodoslosdatosusuario($id);
    $nombre=$usuario->get_nombre();
    $apellidos=$usuario->get_apellidos();
    $email=$usuario->get_email();
    $telefono=$usuario->get_telefono();
    $ciudad=$usuario->get_ciudad();
    $cp=$usuario->get_cp();
    /*$tipo=$usuario->get_tipo();
    $tipo=strtolower($tipo);*/
    $pdf->setY(30);/* ABAJO */
    $pdf->setX(5);/* LADOS */
    //Array de Cabecera
    $header = array("Nombre", "Apellidos","Email","Telefono","Ciudad","CP");
    // Column widths
    $w = array(45, 45, 45, 25, 25, 15);
    //Cabecera
    $pdf->SetFont('Arial','',10); 
    for($i=0;$i<count($header);$i++){
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    }
    $pdf->Ln();
    
    $pdf->setX(5);/* LADOS */

    $pdf->Cell($w[0],7,$nombre,1,0,'C');
    $pdf->Cell($w[1],7,$apellidos,1,0,'C');
    $pdf->Cell($w[2],7,$email,1,0,'C');
    $pdf->Cell($w[3],7,$telefono,1,0,'C');
    $pdf->Cell($w[4],7,$ciudad,1,0,'C');
    $pdf->Cell($w[5],7,$cp,1,0,'C');
    $pdf->Ln();
    
    $pdf->setY(50);/* ABAJO */
    $pdf->setX(5);/* LADOS */
    $pdf->Cell(5,$textypos,iconv("utf-8", "windows-1252","Estos datos han sido obtenidos de nuestro sistema, la contraseña no podemos mostrarsela por razones de privacidad."));

    
    $pdf->setY(60);/* ABAJO */
    $pdf->setX(5);/* LADOS */
    $pdf->Cell(5,$textypos,"Gracias por confiar en nuestros servicios.");



    $pdf->Ln();
    $pdf->Image('../img/logoprotecnia.png',10,70,35);
    $pdf->Ln();
    $pdf->output();