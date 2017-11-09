<?php

namespace App\Shamshiri\Document;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;

class Document extends PhpWord
{
    protected $doc;

    public function setDocument($document){

    }

    public function setValues(){
        $tProcessor=new TemplateProcessor('temp.docx');

        var_dump($tProcessor->getVariables());
        //$tProcessor->saveAs('newT.docx');

    }
    public function getDocument(){
        return $this->doc;
    }
}