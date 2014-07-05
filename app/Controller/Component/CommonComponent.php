<?php
 
class CommonComponent extends Component {

    //現在地情報があるかを確認し、ある場合は情報を変数に格納する
    public function check_get_location() {
		//緯度
		$location['lati'] = $_GET["lati"];
		//経度
		$location['long'] = $_GET["long"];
		return $location;
    }

    //アクセスするURLを作成するメソッド
    public function make_gnaviapi_url($lati,$long) {
    	//urlの指定
        $api = 'http://api.gnavi.co.jp/ver1/RestSearchAPI/?';
        //キーの指定
        $key = '6f13d54e08f1c5397b1aaa3091cab074';
        //レンジの指定
        $range = 2;
        //アクセスするurlの指定
        $query = $api.'keyid='.$key.'&latitude='.$lati.'&longitude='.$long.'&range='.$range;
        //値を返す
        return $query;
    }

    //xml形式のデータを連想配列に変更する
    public function parse_xml_to_array($query) {
			//ぐるなびURLにアクセスしてxmlを読み込む
			$xml = simplexml_load_file($query);
			//xml形式のデータを連想配列に変換する
			$xml = get_object_vars($xml);
			//残ったSimpleXMLElementオブジェクトをarrayにキャストする
			$data = json_decode(json_encode($xml), true);
			//値を返す
			return $data;
    }

    //連想配列から特定の値を取り出す
    public function get_rest_info($restaurant_data) {

		for ($i = 0 ; $i < $restaurant_data['rest'][$i]; $i++) {
			//お店の名前
		  	$info[$i]['name'] = $restaurant_data['rest'][$i]['name'];
		  	//URL（携帯用）
		  	$info[$i]['url'] = $restaurant_data['rest'][$i]['url'];
		  	//住所
		  	$info[$i]['address'] = $restaurant_data['rest'][$i]['address'];
		  	//電話番号
		  	$info[$i]['tel_number'] = $restaurant_data['rest'][$i]['tel'];
		  	//カテゴリー
		  	$info[$i]['category'] = $restaurant_data['rest'][$i]['category'];
		  	//緯度
		  	$info[$i]['latitude'] = $restaurant_data['rest'][$i]['latitude'];
		  	//経度
		  	$info[$i]['longitude'] = $restaurant_data['rest'][$i]['longitude'];
		}
		//値を返す
		return $info;
    }

}