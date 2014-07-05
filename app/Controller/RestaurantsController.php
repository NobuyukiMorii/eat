<?php

App::uses('AppController', 'Controller');

class RestaurantsController extends AppController {

    public $name = 'Restaurants';
    public $uses  = array('Restaurant');
    public $components = array('Common');
    public $helpers = array('Restaurants');

    public function index() {


    }

    public function test() {


    }

    //周辺のお店の表示画面
    public function suggestion() {
    	//現在地情報が取得出来ている場合の処理
    	if(isset($_GET["lati"]) && $_GET["long"]) {
	    	//緯度と経度を変数に格納する
	    	$location = $this->Common->check_get_location();
			//アクセスするURLを定義する
			$query = $this->Common->make_gnaviapi_url($location['lati'],$location['long']);
			//xml形式のデータを連想配列のデータに変更する
			$restaurant_data = $this->Common->parse_xml_to_array($query);
			//連想配列から特定の値を取り出す
			$info = $this->Common->get_rest_info($restaurant_data);
			//店舗情報をビューに渡す
			$this->set(compact('info'));

		} else {
			//現在地情報が取得出来ていなければ、タイトル画面に遷移する
			$this->redirect('index');
		}
    }

}

