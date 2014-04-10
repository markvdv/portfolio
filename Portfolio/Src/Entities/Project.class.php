<?php
namespace Src\Entities;
class Project {
private $id;
private $naam;
private $url;
private $imgPath;
private $srcPath;
private $omschrijving;

    
    function __construct($id,$naam,$url,$imgPath,$srcPath,$omschrijving) {
        $this->id=$id;
        $this->naam=$naam;
        $this->url=$url;
        $this->imgPath=$imgPath;
        $this->srcPath=$srcPath;
        $this->omschrijving=$omschrijving;
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id= $id;
    }
    public function getNaam() {
        return $this->naam;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url= $url;
    }
    public function getImgPath() {
        return $this->imgPath;
    }

    public function setImgPath($imgPath) {
        $this->imgPath = $imgPath;
    }
    public function getSrcPath() {
        return $this->srcPath;
    }

    public function setSrcPath($srcPath) {
        $this->srcPath= $srcPath;
    }
    public function getOmschrijving() {
        return $this->omschrijving;
    }

    public function setOmschrijving($omschrijving) {
        $this->omschrijving= $omschrijving;
    }


}

