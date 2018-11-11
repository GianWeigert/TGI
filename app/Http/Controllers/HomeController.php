<?php 

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
	public function homepage()
	{
		$totais = [
			'2009' => 100000,
			'2010' => 300000,
			'2011' => 500000,
			'2012' => 1000000,
			'2013' => 14
		];

		$title = 'teste';

		$data = [ 
			'title' => $title,
			'totais' => $totais
		]; 

		return view('homepage', [
			'gian' => $data,
			'totais' => $totais
		]);
	}
}