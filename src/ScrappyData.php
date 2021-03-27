<?php

namespace KursBca;
use Illuminate\Http\Request;


class ScrappyData{

    public static function kurs_bca($req){
    	$res['ok'] = 0;
    	$negara = array(
    		0 => array(
    			"mata_uang" => "usd",
    			"deskripsi" => "Dollar Amerika Serikat",
    			"kode" => 2,
    		),
    		1 => array(
    			"mata_uang" => "sgd",
    			"deskripsi" => "Dollar Singapore",
    			"kode" => 3,
    		),
    		2 => array(
    			"mata_uang" => "eur",
    			"deskripsi" => "Euro",
    			"kode" => 4,
    		),
    		3 => array(
    			"mata_uang" => "aud",
    			"deskripsi" => "Dollar Australia",
    			"kode" => 5,
    		),
    		4 => array(
    			"mata_uang" => "dkk",
    			"deskripsi" => "Kroner Denmark",
    			"kode" => 6,
    		),
    		5 => array(
    			"mata_uang" => "sek",
    			"deskripsi" => "Kronor Swedia",
    			"kode" => 7,
    		),
    		6 => array(
    			"mata_uang" => "cad",
    			"deskripsi" => "Dollar Canada",
    			"kode" => 8,
    		),
    		7 => array(
    			"mata_uang" => "chf",
    			"deskripsi" => "Franc Swiss",
    			"kode" => 9,
    		),
    		8 => array(
    			"mata_uang" => "nzd",
    			"deskripsi" => "Dollar Islandia Baru",
    			"kode" => 10,
    		),
    		9 => array(
    			"mata_uang" => "gbp",
    			"deskripsi" => "Ponsterling Inggris",
    			"kode" => 11,
    		),
    		10 => array(
    			"mata_uang" => "hkd",
    			"deskripsi" => "Dollar Hong-Kong",
    			"kode" => 12,
    		),
    		11 => array(
    			"mata_uang" => "jpy",
    			"deskripsi" => "Yen Jepang",
    			"kode" => 13,
    		),
    		12 => array(
    			"mata_uang" => "sar",
    			"deskripsi" => "Riyal Arab Saudi",
    			"kode" => 14,
    		),
    		13 => array(
    			"mata_uang" => "cnh",
    			"deskripsi" => "Yuan China / Tiongkok",
    			"kode" => 15,
    		),
    		14 => array(
    			"mata_uang" => "myr",
    			"deskripsi" => "Ringgit Malaysia",
    			"kode" => 16,
    		),
    		
    	);

    	foreach ($negara as $v) {
    		if($v['mata_uang'] == $req['kode']){
    			$req['kode'] = $v['kode'];
    			$class = new ScrappyData();
    			$datas = $class->Scrappy($req);
    			$res['ok'] = 1;
    			$res['deskripsi'] = $v['deskripsi'];
    			$res['mata_uang'] = $datas['negara'];
    			$res['kurs'] = $datas['harga'];
    			$res['idr'] = $datas['kurs_asli'];
    			break;

    		}else{
    			$res['ok'] = 0;
    			$res['deskripsi'] = false;
    			$res['mata_uang'] = false;
    			$res['kurs'] = 0;
    			$res['idr'] = 0;
    		}

    	}        

       return response()->json($res);
    }

    public static function Scrappy($req){
    	$curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://kurs.lacakiriman.com/api/data',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array('data' => $req['kode']),
          CURLOPT_HTTPHEADER => array(
            'Authorization: Basic eG5kX2RldmVsb3BtZW50X09vbUFmT1V0aCtHb3dzWTZMZUpPSHpMQ1p0U2o4NEo5a1hEbitSeGovbUhXK2J5aERRVnhoZz09Og=='
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return json_decode($response,true);
    }


}

?>