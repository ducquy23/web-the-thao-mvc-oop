<?php
namespace App\Models;
class ColorModel extends BaseModel {
    protected $table = 'tb_colors';
    public function getColor () {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}