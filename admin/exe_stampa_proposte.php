<?php
include_once 'vendor/autoload.php';
include('../session_admin.php');
$class = $_SESSION['n_classe'];
include('../conn_serv.php');

$phpWord = new \PhpOffice\PhpWord\PhpWord();

$sql = "SET @count = 0";
mysqli_query($con, $sql);
$sql = "UPDATE `proposte` SET `proposte`.`id` = @count:= @count + 1";
mysqli_query($con, $sql);


$section = $phpWord->addSection();
$sectionStyle = $section->getStyle();

$sectionStyle->setMarginRight(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
$sectionStyle->setMarginLeft(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
$sectionStyle->setMarginTop(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));
$sectionStyle->setMarginBottom(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(1));

$fontStyleName = 'oneUserDefinedStyle';
$phpWord->addFontStyle($fontStyleName, array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true));

$tecnico = "ITT";
$commerciale = "IPSC";
$professionale = "IPIA";
$liceo = "LSSA";

$sql1 = "SELECT COUNT(id) AS conteggio FROM proposte";
$results = mysqli_query($con, $sql1);
$values = mysqli_fetch_assoc($results);
$I = $values['conteggio'];
$I = $I + 1;

$fontStyle = new \PhpOffice\PhpWord\Style\Font();
$fontStyle->setBold(true);
$fontStyle->setName('Tahoma');
$fontStyle->setSize(25);
$myTextElement = $section->addText('ITT');
$myTextElement->setFontStyle($fontStyle);

$fancyTableStyleName = 'Fancy Table';
$fancyTableStyle = array('borderSize' => 1, 'borderColor' => 'd2d2d2', 'cellMargin' => 40, 'width' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
$fancyTableFirstRowStyle = array('bgColor' => 'DDDDDD');
$fancyTableCellStyle = array('valign' => 'center');
$fancyTableFontStyle = array('bold' => true);
$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable($fancyTableStyleName);

$table = $section->addTable($fancyTableStyleName);
$table->addRow(900);
$table->addCell(2000, $fancyTableCellStyle)->addText('CLASSE', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('ISTITUTO', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DESTINAZIONE', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DOC_ACC', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DOC_SOST', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('OBIETTIVI', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('PERIODO', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DATA CONSIGLIO', $fancyTableFontStyle);

//WHERE istituto='$tecnico'
$sql = "SELECT * FROM `proposte`";
$result2 = mysqli_query($con, $sql);

$S = $I;
for ($A = 1; $A < $I; $A++) {
    $S = $S + 1;
    $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    $sql = "UPDATE `proposte` set `proposte`.`id`='$S' where `proposte`.`id`='$row[id]'";
    mysqli_query($con, $sql);
}

$sql = "SELECT * FROM `proposte` ORDER BY `classe_name`";
$result2 = mysqli_query($con, $sql);

for ($A = 1; $A < $I; $A++) {
    $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    $sql = "UPDATE `proposte` set `proposte`.`id`='$A' where `proposte`.`id`='$row[id]'";
    mysqli_query($con, $sql);
}
$sql = "SELECT * FROM `proposte` WHERE `istituto` = '$tecnico'  ORDER BY `classe_name`";
$result1 = mysqli_query($con, $sql);
for ($A = 0; $A < $I; $A++) {
    $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $n = mb_strtoupper($row['classe_name'], "UTF-8");
    $n1 = mb_strtoupper($row['istituto'], "UTF-8");
    $n2 = mb_strtoupper($row['meta'], "UTF-8");
    $n3 = mb_strtoupper($row['docenti_acc'], "UTF-8");
    $n4 = mb_strtoupper($row['docenti_sost'], "UTF-8");
    $n5 = mb_strtoupper($row['obbiettivi'], "UTF-8");
    $n6 = mb_strtoupper($row['periodo_data'], "UTF-8");
    $n7 = mb_strtoupper($row['data_cdc'], "UTF-8");
    if (!empty($n)) {
        $table->addRow();
        $n = htmlspecialchars($n);
        $n1 = htmlspecialchars($n1);
        $n2 = htmlspecialchars($n2);
        $n3 = htmlspecialchars($n3);
        $n4 = htmlspecialchars($n4);
        $n5 = htmlspecialchars($n5);
        $n6 = htmlspecialchars($n6);
        $n7 = htmlspecialchars($n7);
        $table->addCell(2000)->addText($n);
        $table->addCell(2000)->addText($n1);
        $table->addCell(2000)->addText($n2);
        $table->addCell(2000)->addText($n3);
        $table->addCell(2000)->addText($n4);
        $table->addCell(2000)->addText($n5);
        $table->addCell(2000)->addText($n6);
        $table->addCell(2000)->addText($n7);
    }
}

$fontStyle = new \PhpOffice\PhpWord\Style\Font();
$fontStyle->setBold(true);
$fontStyle->setName('Tahoma');
$fontStyle->setSize(25);
$myTextElement = $section->addText('IPSC');
$myTextElement->setFontStyle($fontStyle);

$table = $section->addTable($fancyTableStyleName);
$table->addRow(900);
$table->addCell(2000, $fancyTableCellStyle)->addText('CLASSE', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('ISTITUTO', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DESTINAZIONE', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DOC_ACC', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DOC_SOST', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('OBIETTIVI', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('PERIODO', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DATA CONSIGLIO', $fancyTableFontStyle);

for ($A = 0; $A < $I; $A++) {
    $sql = "SELECT * FROM proposte WHERE `istituto` = '$commerciale' AND id='$A'  ";
    $result1 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $n = mb_strtoupper($row['classe_name'], "UTF-8");
    $n1 = mb_strtoupper($row['istituto'], "UTF-8");
    $n2 = mb_strtoupper($row['meta'], "UTF-8");
    $n3 = mb_strtoupper($row['docenti_acc'], "UTF-8");
    $n4 = mb_strtoupper($row['docenti_sost'], "UTF-8");
    $n5 = mb_strtoupper($row['obbiettivi'], "UTF-8");
    $n6 = mb_strtoupper($row['periodo_data'], "UTF-8");
    $n7 = mb_strtoupper($row['data_cdc'], "UTF-8");
    if (!empty($n)) {
        $table->addRow();
        $n = htmlspecialchars($n);
        $n1 = htmlspecialchars($n1);
        $n2 = htmlspecialchars($n2);
        $n3 = htmlspecialchars($n3);
        $n4 = htmlspecialchars($n4);
        $n5 = htmlspecialchars($n5);
        $n6 = htmlspecialchars($n6);
        $n7 = htmlspecialchars($n7);
        $table->addCell(2000)->addText($n);
        $table->addCell(2000)->addText($n1);
        $table->addCell(2000)->addText($n2);
        $table->addCell(2000)->addText($n3);
        $table->addCell(2000)->addText($n4);
        $table->addCell(2000)->addText($n5);
        $table->addCell(2000)->addText($n6);
        $table->addCell(2000)->addText($n7);
    }

}
$fontStyle = new \PhpOffice\PhpWord\Style\Font();
$fontStyle->setBold(true);
$fontStyle->setName('Tahoma');
$fontStyle->setSize(25);
$myTextElement = $section->addText('IPIA');
$myTextElement->setFontStyle($fontStyle);

$table = $section->addTable($fancyTableStyleName);

$table->addRow(900);
$table->addCell(2000, $fancyTableCellStyle)->addText('CLASSE', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('ISTITUTO', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DESTINAZIONE', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DOC_ACC', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DOC_SOST', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('OBIETTIVI', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('PERIODO', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DATA CONSIGLIO', $fancyTableFontStyle);

for ($A = 0; $A < $I; $A++) {
    $sql = "SELECT * FROM proposte WHERE `istituto` ='$professionale' AND id='$A'";
    $result1 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $n = mb_strtoupper($row['classe_name'], "UTF-8");
    $n1 = mb_strtoupper($row['istituto'], "UTF-8");
    $n2 = mb_strtoupper($row['meta'], "UTF-8");
    $n3 = mb_strtoupper($row['docenti_acc'], "UTF-8");
    $n4 = mb_strtoupper($row['docenti_sost'], "UTF-8");
    $n5 = mb_strtoupper($row['obbiettivi'], "UTF-8");
    $n6 = mb_strtoupper($row['periodo_data'], "UTF-8");
    $n7 = mb_strtoupper($row['data_cdc'], "UTF-8");

    if (!empty($n)) {
        $table->addRow();
        $n = htmlspecialchars($n);
        $n1 = htmlspecialchars($n1);
        $n2 = htmlspecialchars($n2);
        $n3 = htmlspecialchars($n3);
        $n4 = htmlspecialchars($n4);
        $n5 = htmlspecialchars($n5);
        $n6 = htmlspecialchars($n6);
        $n7 = htmlspecialchars($n7);
        $table->addCell(2000)->addText($n);
        $table->addCell(2000)->addText($n1);
        $table->addCell(2000)->addText($n2);
        $table->addCell(2000)->addText($n3);
        $table->addCell(2000)->addText($n4);
        $table->addCell(2000)->addText($n5);
        $table->addCell(2000)->addText($n6);
        $table->addCell(2000)->addText($n7);
    }
}
$fontStyle = new \PhpOffice\PhpWord\Style\Font();
$fontStyle->setBold(true);
$fontStyle->setName('Tahoma');
$fontStyle->setSize(25);
$myTextElement = $section->addText('LSSA');
$myTextElement->setFontStyle($fontStyle);

$table = $section->addTable($fancyTableStyleName);

$table->addRow(900);
$table->addCell(2000, $fancyTableCellStyle)->addText('CLASSE', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('ISTITUTO', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DESTINAZIONE', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DOC_ACC', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DOC_SOST', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('OBIETTIVI', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('PERIODO', $fancyTableFontStyle);
$table->addCell(2000, $fancyTableCellStyle)->addText('DATA CONSIGLIO', $fancyTableFontStyle);

for ($A = 0; $A < $I; $A++) {
    $sql = "SELECT * FROM proposte WHERE istituto='$liceo' AND id='$A' ORDER BY classe_name ";
    $result1 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $n = mb_strtoupper($row['classe_name'], "UTF-8");
    $n1 = mb_strtoupper($row['istituto'], "UTF-8");
    $n2 = mb_strtoupper($row['meta'], "UTF-8");
    $n3 = mb_strtoupper($row['docenti_acc'], "UTF-8");
    $n4 = mb_strtoupper($row['docenti_sost'], "UTF-8");
    $n5 = mb_strtoupper($row['obbiettivi'], "UTF-8");
    $n6 = mb_strtoupper($row['periodo_data'], "UTF-8");
    $n7 = mb_strtoupper($row['data_cdc'], "UTF-8");

    if (!empty($n)) {
        $table->addRow();
        $n = htmlspecialchars($n);
        $n1 = htmlspecialchars($n1);
        $n2 = htmlspecialchars($n2);
        $n3 = htmlspecialchars($n3);
        $n4 = htmlspecialchars($n4);
        $n5 = htmlspecialchars($n5);
        $n6 = htmlspecialchars($n6);
        $n7 = htmlspecialchars($n7);
        $table->addCell(2000)->addText($n);
        $table->addCell(2000)->addText($n1);
        $table->addCell(2000)->addText($n2);
        $table->addCell(2000)->addText($n3);
        $table->addCell(2000)->addText($n4);
        $table->addCell(2000)->addText($n5);
        $table->addCell(2000)->addText($n6);
        $table->addCell(2000)->addText($n7);
    }
}


$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('Proposte_Istituto_Primo_Levi.docx');

//////////////////Creazione file all'interno della cartella docx
$name = 'Proposte_Istituto_Primo_Levi';
$tmp = $name;
$n = null;
while (file_exists("../docx/" . $tmp . ".docx")) {
    if ($n == null) {
        $n = 0;
    }
    $n++;
    $tmp = $name . $n;
}

$objWriter->save("../docx/$tmp.docx");
/////////////////

include("../connessione.php");

$date = date("Y-m-d");
$path = "../docx/$tmp.docx";
$insert = $db->exec("INSERT INTO cronologia (data,url) VALUES ('$date','$path');");
?>