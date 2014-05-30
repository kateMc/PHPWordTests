<?php
require '../vendor/autoload.php';


echo "test";
$phpWord = new \PhpOffice\PhpWord\PhpWord();

$section = $phpWord->addSection();

// After creating a section, you can append elements:
$section->addText('Hello again!');

// You can directly style your text by giving the addText function an array:
$section->addText('Hello world! I am formatted.',
    array('name'=>'Tahoma', 'size'=>16, 'bold'=>true));

// If you often need the same style again you can create a user defined style
// to the word document and give the addText function the name of the style:
$phpWord->addFontStyle('myOwnStyle',
    array('name'=>'Verdana', 'size'=>14, 'color'=>'1B2232'));
$section->addText('Hello world! I am formatted by a user defined style',
    'myOwnStyle');

// You can also put the appended element to local object like this:
$fontStyle = new \PhpOffice\PhpWord\Style\Font();
$fontStyle->setBold(true);
$fontStyle->setName('Verdana');
$fontStyle->setSize(22);
$myTextElement = $section->addText('Hello World!');
$myTextElement->setFontStyle($fontStyle);


$header = array('size' => 16, 'bold' => true);
$cellColSpan = array('gridSpan' => 2, 'valign' => 'center');

$rows = 10;
$cols = 5;
$section->addText("Basic table", $header);

$table = $section->addTable();
$table->addRow();
$cell = $table->addCell();
$cell->getStyle()->setGridSpan(4);
$cell->addText('11111');
$cell2=$table->addCell();
$cell2->getStyle()->setGridSpan(1);
$cell2->addText('222222');

for($r = 1; $r <= 8; $r++) {
    $table->addRow();
    for($c = 1; $c <= 5; $c++) {
        $table->addCell(1750)->addText("Row $r, Cell $c");
    }

}


// Finally, write the document:
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('helloWorld.docx');
