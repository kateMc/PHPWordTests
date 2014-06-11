<?php
require '../vendor/autoload.php';


echo "Testing Underline";
$phpWord = new \PhpOffice\PhpWord\PhpWord();

$section = $phpWord->addSection();


$fontStyle      = array('size' => 12);
$paragraphStyle = array('shading' => array('fill' => '000000'), 'border' => array('borderBottomSize' => 500, 'borderBottomColor' => 'FF0000'));

$phpWord->addTitleStyle(1, $fontStyle, $paragraphStyle);
$section->addTitle('Testing Underline', 1);
//
$section->addText('Works?', null, array('border' => array('borderLeftSize' => 100, 'borderLeftColor' => '0000FF', 'borderRightSize' => 100, 'borderRightColor' => 'FF0000')));

$table = $section->addTable(array('borderBottomSize' => 10));
for ($i = 0; $i < 5; $i++)
{
    $table->addRow()->addCell(2000)->addText('cell');
}

// Finally, write the document:
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('helloWorld.docx');
