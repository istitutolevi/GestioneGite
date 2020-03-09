<?php
	include_once '../vendor/autoload.php';
	include ('session_class.php');
	include ('../conn_serv.php');

	$class= $_SESSION['n_classe'];
	$classe= $_POST['classe'];
	$sez= $_POST['sezione'];
	$destinazione= $_POST['destinazione'];
	$data= $_POST['data'];
	$doc_ref= $_POST['doc_ref'];
	$doc_acc= $_POST['doc_acc'];
	$radio1= $_POST['iniziativa'];
	$textarea1= $_POST['iniz_txtarea'];
	$radio2= $_POST['obb'];
	$textarea2= $_POST['osservazioni'];
	$radio3= $_POST['comp'];
	$textarea3= $_POST['comp_textarea'];
	$textarea4= $_POST['segnala_alunni'];
	$textarea5= $_POST['segnalazioni_pos_textarea'];
	$textarea6= $_POST['valutazioni_textarea'];
	$textarea7= $_POST['disservizi_textarea'];
	$textarea8= $_POST['segnalazioni_pos_textarea'];
	$radio4= $_POST['grad'];
	$textarea8= $_POST['osservazioni_textarea'];
	
	$phpWord = new \PhpOffice\PhpWord\PhpWord();
	$section = $phpWord->addSection();
	$sectionStyle = $section->getStyle();
	$sectionStyle->setMarginRight(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
	$sectionStyle->setMarginLeft(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
	$sectionStyle->setMarginTop(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
	$sectionStyle->setMarginBottom(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
	$src=('../img/Intestazione_scuola.png');
	$section->addImage($src);
	$fontStyle2 = new \PhpOffice\PhpWord\Style\Font();
	$fontStyle2->setBold(true);
	$fontStyle2->setName('Tahoma');
	$fontStyle2->setSize(9);
	$fontStyle = new \PhpOffice\PhpWord\Style\Font();
	$fontStyle->setBold(true);
	$fontStyle->setName('Tahoma');
	$fontStyle->setSize(11);
	$myTextElement = $section->addText("RELAZIONE FINALE VISITA O VIAGGIO D' ISTRUZIONE");
	$myTextElement->setFontStyle($fontStyle);
	$section->addText('Classe/i ',$fontStyle2);
	$section->addText($classe);
	$section->addText();
	$section->addText("Visita guidata/Viaggio d' istruzione a:", $fontStyle2);
	$section->addText($destinazione);
	$section->addText();
	$section->addText("Del:",$fontStyle2);
	$section->addText($data);
	$section->addText();
	$section->addText('Docente referente: ', $fontStyle2);
	$section->addText($doc_ref);
	$section->addText();
	$section->addText('Docenti accompagnatori: ', $fontStyle2);
	$section->addText($doc_acc);
	$section->addText();
	$a1="";
	$a2="";
	$a3="";
	if($radio1 == "a")
		$a1="x";
	else
		if($radio1 == "b")
			$a2="x";
	else
		if($radio1 == "c")
			$a3="x";
	$section->addText("Realizzazione dell' iniziativa: ", $fontStyle2);
	$section->addListItem("[ ".$a1." ] secondo le previsioni");
	$section->addListItem("[ ".$a2." ] parzialmente realizzata (motivare)");
	$section->addListItem("[ ".$a3." ] non realizzata (motivare)");
	$section->addText($textarea1);
	$a1="";
	$a2="";
	$a3="";
	if($radio2 == "a")
		$a1="x";
	else
		if($radio2 == "b")
			$a2="x";
	else
		if($radio2 == "c")
			$a3="x";
	$section->addText('Risultati conseguiti in relazione agli obiettivi prefissati: ', $fontStyle2);
	$section->addListItem("[ ".$a1." ] risultati ottenuti secondo gli obiettivi prefissati");
	$section->addListItem("[ ".$a2." ] risultati parzialmente ottenuti (motivare nelle osservazioni)");
	$section->addListItem("[ ".$a3." ] risultati non ottenuti (motivare nelle osservazioni)");
	$section->addText();
	$section->addText('Osservazioni: ', $fontStyle2);
	$section->addText($textarea2);
	$section->addText();
	$a1="";
	$a2="";
	$a3="";
	if($radio3 == "a")
		$a1="x";
	else
		if($radio3 == "b")
			$a2="x";
	else
		if($radio3 == "c")
			$a3="x";
	$section->addText('Comportamento generale degli alunni: ', $fontStyle2);
	$section->addListItem("[ ".$a1." ] buono");
	$section->addListItem("[ ".$a2." ] discreto, qualche intemperanza");
	$section->addListItem("[ ".$a3." ] non sufficiente (motivare):");
	$section->addText($textarea3);
	$section->addText();
	$section->addText('Alunni da segnalare per un comportamento scorretto (motivare): ', $fontStyle2);
	$section->addText($textarea4);
	$section->addText();
	$section->addText('Segnalazioni positive in relazione ai luoghi, alla sistemazione, al servizio fornito da agenzie, ditte di trasporto... ', $fontStyle2);
	$section->addText($textarea5);
	$section->addText();
	$section->addText('Segnalazioni negative in relazione ai luoghi, alla sistemazione, al servizio fornito da agenzie, ditte di trasporto... ', $fontStyle2);
	$section->addText($textarea8);
	$section->addText();
	$section->addText('Valutazioni generali:', $fontStyle2);
	$section->addText($textarea6);
	$section->addText();
	$section->addText('Eventuali disservizi:', $fontStyle2);
	$section->addText($textarea7);
	$section->addText();
	$section->addText('Gradimento da parte dei destinatari: ', $fontStyle2);
	$a1="";
	$a2="";
	$a3="";
	if($radio4 == "a")
		$a1="x";
	else
		if($radio4 == "b")
			$a2="x";
	else
		if($radio4 == "c")
			$a3="x";
	else
		if($radio4 == "d")
			$a4="x";
	$section->addListItem("[ ".$a1." ] buono");
	$section->addListItem("[ ".$a2." ] discreto");
	$section->addListItem("[ ".$a3." ] sufficiente (motivare nelle osservazioni):");
	$section->addListItem("[ ".$a4." ] non gradito (motivare nelle osservazioni):");
	$section->addText();
	$section->addText('osservazioni: ', $fontStyle2);
	$section->addText($textarea8);
	$section->addText();
	$section->addText("Firma");
	$section->addText("____________");
	$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
	$name = "relazione_".$class."_".date("Y-m-d").".docx";
	$objWriter->save($name);

	header("Location: $name");
?>
