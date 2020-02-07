<?php
include_once 'vendor/autoload.php';
include ('session_admin.php');
$class = $_SESSION['n_classe'];
include ('../conn_serv.php');

$contentType = 'Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document;';

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$myFontStyle = array('bold' => true, 'underline' => 'single', 'size'=>8);
$myFontStyle1 = array('bold' => true, 'size'=>8);
$myFontStyle2 = array('italic' => true, 'size'=>8);

$section = $phpWord->addSection();
$sectionStyle = $section->getStyle();

$sectionStyle->setMarginRight(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
$sectionStyle->setMarginLeft(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
$sectionStyle->setMarginTop(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
$sectionStyle->setMarginBottom(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));

$fontStyleName = 'oneUserDefinedStyle';
$phpWord->addFontStyle(
    $fontStyleName,
    array('name' => 'Tahoma', 'size' => 8, 'bold' => false)
);

$mievariabili = $_POST['selected'];
$array=explode(' ',$mievariabili);

$sql1="SELECT COUNT(id) AS conteggio FROM gita_definitiva";
$results=mysqli_query($con,$sql1);
$values=mysqli_fetch_assoc($results);
$I=$values['conteggio'];

$src = ('../img/Intestazione_scuola.png');
$section->addImage($src);
$section->addText('Comunicazione n. _____________                                                             Vignola, _______________', $fontStyleName);
for ($a = 1; $a <= $I; $a++) 
	{
		$sql1 = "SELECT classe FROM gita_definitiva WHERE  meta='$array[0]' AND data_gita='$array[1]' AND doc_resp='$array[2]' AND id='$a'";
		$result = mysqli_query($con, $sql1);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		${'b' . 'a'} = $row['classe'];
		$n = $n . " " . $ba;	
	}
$section->addText('Agli Studenti della classe'.$n, $fontStyleName);
$section->addText();
$section->addText('Oggetto: Uscita didattica a '. $array[0] . ' ' . substr($array[1],8,2). "/" . substr($array[1],5,2) . "/" . substr($array[1],0,4), $myFontStyle);
$section->addText();

$section->addText("Programma", $myFontStyle1);

$sql1="SELECT programma FROM gita_definitiva WHERE meta='$array[0]' AND data_gita='$array[1]' AND doc_resp='$array[2]'";
$result = mysqli_query($con, $sql1);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$programma = $row['programma'];
$array2=explode('-',$programma);
$num = count($array2);
for($I=1;$I<$num;$I++)
{
$section->addText($array2[$I], $fontStyleName);
}
$section->addText();

$sql1="SELECT doc_accom, doc_resp FROM gita_definitiva WHERE meta='$array[0]' AND data_gita='$array[1]' AND doc_resp='$array[2]'";
$result = mysqli_query($con, $sql1);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$doc_accom = $row['doc_accom'];
$doc_resp = $row['doc_resp'];
$section->addText('i docenti accompagnatori saranno i proff. '. $doc_resp . ',' . $doc_accom . '.', $fontStyleName );

$section->addText();

$section->addText('Si ricorda che il Regolamento di Istituto prevede come elemento vincolante per l’effettuazione del viaggio la partecipazione dei
2/3 degli alunni, quindi luscita sarà effettuata solo al raggiungimento della suddetta soglia. ', $fontStyleName);

$section->addText();

$section->addText("La quota per la partecipazione all' uscita didattica, a copertura del costo del pullman e della visita guidata, è pari a € ____e deve
essere versata entro ________________", $fontStyleName);

$section->addText();

$section->addText('Il referente: '.$doc_resp.'										Il Dirigente Scolastico', $fontStyleName);

$section->addText('							                                                       Dott. Stefania Giovanetti', $fontStyleName);

$section->addText('(Da consegnare compilato e firmato) - Ritagliare qui ——————————————————————————————' , $myFontStyle2);

$section->addText();

$section->addText("Il/la sottoscritto/a ______________________________________________________________, genitore dell’alunno/a
____________________________________________ della classe ______ dichiara di autorizzare il/la figlio/a a partecipare alla
seguente iniziativa :", $fontStyleName);

$section->addText('Uscita didattica a '. $array[0] . ' ' . $array[1].'',
$myFontStyle);

$section->addText("Il/la sottoscritto/a acconsente, pertanto, che egli/ella usufruisca dei mezzi di trasporto necessari e accetta consapevolmente tutte le
condizioni previste dall’organizzazione della visita.
Dichiara di sentirsi corresponsabile della condotta dello studente e di essere a conoscenza del fatto che gli studenti sono coperti da
polizza assicurativa infortuni.
Dichiara, inoltre, di sollevare l’Istituto Primo Levi e i docenti accompagnatori da ogni responsabilità civile e penale derivante da
quanto possa accadere durante la visita medesima, come previsto dalla legge 11 luglio 1980 n. 312 titolo II art. 61." , $fontStyleName);

$section->addText('Data ______________________' , $fontStyleName);

$section->addText();

$section->addText('Firma di un genitore (se minorenne) _________________________________', $fontStyleName);
$section->addText('Firma dello studente maggiorenne    _________________________________', $fontStyleName);
$section->addText('Firma di un genitore (per adesione) _________________________________', $fontStyleName);

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('modulo_famiglie.docx');

header("Location: stampa_proposte_alle_famiglie.php");
?>