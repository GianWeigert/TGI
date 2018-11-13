<?php 

namespace App\Http\Controllers;

use Doctrine\ORM\EntityManager;
use App\Entity\DespesasParlamentares;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function __construct(EntityManager $em)
    {
        $this->despesasParlamentaresRepository = $em->getRepository(
            DespesasParlamentares::class
        );
    }

    public function homepage()
    {
        $totalDespesa2009 = $this->despesasParlamentaresRepository->procurarDespessasPorAno(
            '2009'
        );

        $totalDespesa2010 = $this->despesasParlamentaresRepository->procurarDespessasPorAno(
            '2010'
        );

        $totalDespesa2011 = $this->despesasParlamentaresRepository->procurarDespessasPorAno(
            '2011'
        );

        $totalDespesa2012 = $this->despesasParlamentaresRepository->procurarDespessasPorAno(
            '2012'
        );

        $totalDespesa2013 = $this->despesasParlamentaresRepository->procurarDespessasPorAno(
            '2013'
        );

        $totalDespesa2014 = $this->despesasParlamentaresRepository->procurarDespessasPorAno(
            '2014'
        );

        $totalDespesa2015 = $this->despesasParlamentaresRepository->procurarDespessasPorAno(
            '2015'
        );

        $totalDespesa2016 = $this->despesasParlamentaresRepository->procurarDespessasPorAno(
            '2016'
        );

        $totalDespesa2017 = $this->despesasParlamentaresRepository->procurarDespessasPorAno(
            '2017'
        );

        $totais = [
            '2009' => $totalDespesa2009,
            '2010' => $totalDespesa2010,
            '2011' => $totalDespesa2011,
            '2012' => $totalDespesa2012,
            '2013' => $totalDespesa2013,
            '2014' => $totalDespesa2014,
            '2015' => $totalDespesa2015,
            '2016' => $totalDespesa2016,
            '2017' => $totalDespesa2017
        ];

        $data = [
            'totais' => $totais
        ];

		return view('homepage', [
			'data' => $data
		]);
	}
}