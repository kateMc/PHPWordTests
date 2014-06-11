<?php
require '../vendor/autoload.php';


echo "Testing Page Breaks";
$phpWord = new \PhpOffice\PhpWord\PhpWord();

$section = $phpWord->addSection();

/*
 * Testing for page breaks before a title, within a body of text and within/after a table
 */

//Test 1 - Page break within a section of text
//
//$section->addText('Ut lacinia vehicula odio ac faucibus.');
//$section->addPageBreak();
//$section->addTitle('First Title');
//$section->addPageBreak();
//$section->addTitle('Second Title');
//$section->addPageBreak();
//$section->addText('Ut lacinia vehicula odio ac faucibus.');

//
//$section->addPageBreak();
//
////Test 2 - Page break before a title
//// A page break BETWEEN two titles works, but not before or after
//
//$paragraphStyle = array('pageBreakBefore' => true);
//$phpWord->addTitleStyle(1, null, $paragraphStyle);
//$section->addTitle('Test 2 - Page break before a title with pageBreakBefore set to true');
//$section->addPageBreak();
//$section->addTitle('Test 2 - Page break before title without pageBreakBefore style');
//
//$section->addPageBreak();

//Test 3 - Page break before and after a table
// Page break in middle of table occurs AFTER table has been rendered

//echo "PAGE BREAK BEGINS HERE              ";
$section->addPageBreak();
$section->addTitle('Fail Title');
//echo "PAGE BREAK ENDS HERE               ";
//
//$section->addPageBreak();
//$section->addText('Test working');

//$tableStyle = array('borderSize' => 1);
//$width      = 2000;
//$cellStyle  = array('borderSize' => 1);
//
//$section->addText('A line before the table');
//$section->addPageBreak();
//
//$firstTable = $section->addTable($tableStyle);
//$firstTable->addRow()->addCell($width, $cellStyle)->addText('First Table');
//for ($i = 0; $i < 5; $i++)
//{
//    $firstTable->addRow()->addCell($width, $cellStyle)->addText('Cell');
//}
//$section->addPageBreak();
//$secondTable = $section->addTable($tableStyle);
//$secondTable->addRow()->addCell($width, $cellStyle)->addText('Second Table');
//
//$section->addPageBreak();
//$section->addText('A line after the table');

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('testPageBreaks.docx');

