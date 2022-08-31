<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Dropdown extends BaseController
{
    private $db;

    public function __construct() {
        $this->db = db_connect();
    }

    public function index() {
        $paises = $this->db->query("Select id, nombre from paises")->getResultArray();
        return view("dropdown/dropdown", compact('paises'));
    }

    public function getEstados() {
        $pais_id = $this->request->getVar("pais_id");

        $estados = $this->db->query("Select id, nombre from estados where pais_id = ".$pais_id)->getResultArray();

        return json_encode($estados);
    }

    public function getCiudades() {
        $estado_id = $this->request->getVar("estado_id");

        $ciudades = $this->db->query("Select id, nombre from ciudades where estado_id = ".$estado_id)->getResultArray();

        return json_encode($ciudades);
    }
}