<?php

namespace App\Http\Controllers;

use App\Repositories\HomeRepositories;
use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    private $prov;
    public function __construct(HomeRepositories $homeRepositories)
    {
        $this->prov=$homeRepositories;
    }


    public function getProv () 
    {
        $dataProv=$this->prov->indoProv();

        // dd($dataProv);

        return view('home',compact('dataProv'));
    }

    public function getKab (Request $request) 
    {
        $idKab=$request->post('kabId');
        $html = '';

        if(isset($idKab)){
            $dataKab=$this->prov->indoKab($idKab);
            foreach ($dataKab as $key) {
                # code...
                $html .= '<option value="'. $key->id . '">'. $key->name .'</option>';
            }
            echo $html;
        }else{
            $html = '<option selected value="">Choose...</option>';
            echo $html;
        }
    }
    public function getKec (Request $request) 
    {
        $idKab=$request->post('kecId');
        // echo $idKab;
        $html = '';

        if (isset($idKab)) {
            $dataKab = $this->prov->indoKec($idKab);
            foreach ($dataKab as $key) {
                # code...
                $html .= '<option value="' . $key->id .'">'.$key->name .'</option>';
            }
            echo $html;
        } else {
            $html = '<option selected value="">Choose...</option>';
            echo $html;
        }
        // print($dataKab);
        

    }
}
