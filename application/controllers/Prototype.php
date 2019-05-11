<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class prototype extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('prototype_model');
	}

	public function p1()
	{
		error_reporting(0);
		$url = 'https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=AAPL&interval=5min&apikey=QT2PLXB57HD123EU';
//		$url = 'https://titoanugerah.carto.com/api/v2/sql?q=select COUNT(*) from samplesite&api_key=58b40511bc1d59c3e7361d52fbca324647c7673f';
//		$url = 'https://sheets.googleapis.com/v4/spreadsheets/1XDBwh9c9XBF-pzxMZXjByRlgpxUgMesrLygMYIk3S64ranges=A1:C10&fields=properties.title,sheets(sheetProperties,data.rowData.values(effectiveValue,effectiveFormat))';
		$get_data = $this->prototype_model->callAPI('GET', $url, false);
		$response = json_decode($get_data, true);
		$errors = $response['response']['errors'];
		$data = $response['response']['data'][0];
		//var_dump($response['Time Series (5min)']["2019-05-09 13:45:00"]['1. open']);die;
		//$i=0;
		foreach ($response['Time Series (5min)'] as $item ) {
			var_dump($item);
			echo '<br>';
		}
//		echo $i;
	}

}
