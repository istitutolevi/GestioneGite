<?php
	include_once 'vendor/autoload.php';
	include ('session_class.php');
	$class = $_SESSION['n_classe'];
	include ('../conn_serv.php');

	$phpWord = new \PhpOffice\PhpWord\PhpWord();

	$section = $phpWord->addSection();

	$fontStyleName = 'oneUserDefinedStyle';
	$phpWord->addFontStyle(
    $fontStyleName,
    array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true));
	
	$sectionStyle = $section->getStyle();

	$sectionStyle->setMarginRight(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
	$sectionStyle->setMarginLeft(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
	$sectionStyle->setMarginTop(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
	$sectionStyle->setMarginBottom(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
	
	
	$src=('../img/Intestazione_scuola.png');
	$section->addImage($src);
	$sql1="SELECT COUNT(id) AS conteggio FROM gita_definitiva";
	$results=mysqli_query($con,$sql1);
	$values=mysqli_fetch_assoc($results);
	$I=$values['conteggio'];

	$mievariabili = $_POST['selected'];
	$array=explode('||',$mievariabili);	

	$sql="SELECT * FROM gita_definitiva WHERE   meta='$array[0]' AND data_gita='$array[1]' AND doc_resp='$array[2]'  ";
	$result1 = mysqli_query($con, $sql);
	$row= mysqli_fetch_array($result1, MYSQLI_ASSOC);
	$prot			= $row['prot'];
	$data_odierna	= $row['data_odierna'];
	$meta			= $row['meta'];
	$data_gita		= $row['data_gita'];
	$ora_partenza	= $row['ora_partenza'];
	$ora_arrivo		= $row['ora_arrivo'];
	$mezzo			= $row['mezzi'];
	$docente_resp	= $row['doc_resp'];
	$studenti_totali= $row['totale_studenti_part'];
	$docenti_accomp = $row['doc_accom'];
	$itinerario     = $row['programma'];

	$section->addText(	' Prot. __________                                                                               Vignola,____________ ' );
	$section->addText('');
	$fontStyle = new \PhpOffice\PhpWord\Style\Font();
	$fontStyle->setBold(true);
	$fontStyle->setName('Tahoma');
	$fontStyle->setSize(10);
	$myTextElement = $section->addText('         AUTORIZZAZIONE USCITA DIDATTICA, VISITA O VIAGGIO DI ISTRUZIONE');
	$section->addText('');
	$myTextElement->setFontStyle($fontStyle);

	$section->addText(	' Il consiglio della classe  ' . $class .' in data  ' . substr($data_odierna,8,2).'/'.substr($data_odierna,5,2).'/'.substr($data_odierna,0,4)	   . ' ha deliberato la seguente visita d\'istruzione');
	
	$section->addText(	' META  ' . $meta .' DATA  '. substr($data_gita,8,2).'/'.substr($data_gita,5,2).'/'.substr($data_gita,0,4));
	$section->addText(	' ORARIO PARTENZA  ' . $ora_partenza .' ORA ARRIVO   '. $ora_arrivo);
	$section->addText(	' MEZZI CHE SI INTENDONO UTILIZZARE ' . $mezzo );
	$section->addText(	' DOCENTE RESPONSABILE DELLA VISITA Prof. ' . $docente_resp  );
	$section->addText(' DOCENTI ACCOMPAGNATORI ' . $docenti_accomp.''	 );
    $section->addText('');
	$fancyTableStyleName = 'Fancy Table';
	$fancyTableStyle = array('borderSize' => 1, 'borderColor' => 'd2d2d2', 'cellMargin' => 40, 'width' => 200 , 'alignment'  => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
	$fancyTableFirstRowStyle = array('bgColor' => 'DDDDDD');
	$fancyTableCellStyle = array('valign' => 'center');
	$fancyTableFontStyle = array('bold' => true);
	$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
	$table = $section->addTable($fancyTableStyleName);

	$table->addRow(900);
	$table->addCell(2000, $fancyTableCellStyle)->addText('CLASSE', $fancyTableFontStyle);
	$table->addCell(2000, $fancyTableCellStyle)->addText('N.ALUNNI FREQUENTANTI', $fancyTableFontStyle);
	$table->addCell(2000, $fancyTableCellStyle)->addText('2/3 PARTECIPANTI', $fancyTableFontStyle);
	$table->addCell(2000, $fancyTableCellStyle)->addText('N.ALUNNI PARTECIPANTI', $fancyTableFontStyle);

	//for ($a = 1; $a <= $I; $a++) {
		$sql1="SELECT * FROM gita_definitiva WHERE doc_resp='$docente_resp'  AND meta='$meta' AND data_gita='$data_gita' ";
		$result = mysqli_query($con, $sql1);
		$row= mysqli_fetch_array($result, MYSQLI_ASSOC);

		$n= $row['classe'];
		$n1= $row['n_alunni_freq'];
		$n2= $row['dueterzi'];
		$n3= $row['n_alunni_part'];

		if(!empty($n) && !empty($n1) &&!empty($n2) &&!empty($n3)  ) {
			$table->addRow();
			$table->addCell(2000)->addText($n);
			$table->addCell(2000)->addText($n1);
			$table->addCell(2000)->addText($n2);
			$table->addCell(2000)->addText($n3);
		}
	//}
//	$section->addText('TOTALE STUDENTI PARTECIPANTI ' . $studenti_totali .''	 );
//	$section->addText('DOCENTI ACCOMPAGNATORI ' . $docenti_accomp.''	 );
    $section->addText('');
	$table = $section->addTable($fancyTableStyleName);
	$table->addRow(900);
	$table->addCell(2000, $fancyTableCellStyle)->addText('INSEGNANTE', $fancyTableFontStyle);
	$table->addCell(2000, $fancyTableCellStyle)->addText('FIRMA INSEGNANTE', $fancyTableFontStyle);
	$table->addCell(2000, $fancyTableCellStyle)->addText('DOCENTE SOSTITUTO', $fancyTableFontStyle);
	$table->addCell(2000, $fancyTableCellStyle)->addText('FIRMA SOSTITUTO', $fancyTableFontStyle);

	for ($a = 1; $a <= $I; $a++) {
		$sql1="SELECT * FROM gita_definitiva WHERE doc_resp='$docente_resp'  AND meta='$meta' AND data_gita='$data_gita' AND id='$a' ";
		$result = mysqli_query($con, $sql1);
		$row= mysqli_fetch_array($result, MYSQLI_ASSOC);

		$n4= $row['insegnante'];
		$n5= $row['doc_sost'];

		if(!empty($n4) && !empty($n5) ) {
			$table->addRow();
			$table->addCell(2000)->addText($n4);
			$table->addCell(2000)->addText('');
			$table->addCell(2000)->addText($n5);
			$table->addCell(2000)->addText('');
		}
	}

	$section->addText('');
	$section->addText('');
	$section->addText('');
	$section->addText('               Firma del docente responsabile                                                 Il Dirigente Scolastico');
	$section->addText('                                                                                                                  Dott. Stefania Giovanetti');
	
	$section->addPageBreak();
	$section->addText("",['name'=>'Times New Roman','size' => 20],['spaceAfter' => 250,'spaceBefore' => 250]);
	$section->addText("ITINERARIO DEL VIAGGIO DI ISTRUZIONE",['name'=>'Times New Roman','size' => 20],['spaceAfter' => 250,'spaceBefore' => 500]);
	
	$tappe = explode('||',$itinerario);
    $table = $section->addTable($fancyTableStyleName);
	$table->addRow(900);
	$table->addCell(1200, $fancyTableCellStyle)->addText('DATA', $fancyTableFontStyle);
	$table->addCell(1200, $fancyTableCellStyle)->addText('ORA', $fancyTableFontStyle);
	$table->addCell(5600, $fancyTableCellStyle)->addText('DESCRIZIONE', $fancyTableFontStyle);
		
	foreach($tappe as $tappa) {
	    $table->addRow();
	    $colonne = explode('##',$tappa);
	    for ($i=0;$i<count($colonne);$i++) {
	        
	        if($i < count($colonne) - 1)
	            if($i==0) {
	                $table->addCell(1200)->addText(substr($colonne[$i],8,2).'/'.substr($colonne[$i],5,2).'/'.substr($colonne[$i],0,4));
	            }
	            else {
	                $table->addCell(1200)->addText($colonne[$i]);
	            } 
	                
	        else
	            $table->addCell(5600)->addText($colonne[$i]);
	    }
		
	}
	
	$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
	$objWriter->save($class.'.docx');
	
	$name=$class."_".$meta;
	$tmp=$name;
	$n=null;
	while(file_exists("../docx/ModuliStampati/".$tmp.".docx")){
		if($n==null){
			$n=0;
		}
		$n++;
		$tmp=$name.$n;
	}

	$objWriter->save("../docx/ModuliStampati/$tmp.docx");

	header("Location: stampa_modulo.php");

?>