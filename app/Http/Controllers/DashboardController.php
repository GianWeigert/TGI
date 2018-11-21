<?php 

namespace App\Http\Controllers;

use Doctrine\ORM\EntityManager;
use App\Entity\DespesasParlamentares;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    private $despesasParlamentaresRepository;

    public function __construct(EntityManager $em)
    {
        $this->despesasParlamentaresRepository = $em->getRepository(
            DespesasParlamentares::class
        );
    }

    public function dashboard()
    {
        /*
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

        $totalTodosAnos = $totalDespesa2009 + $totalDespesa2010 + $totalDespesa2011 + $totalDespesa2012 + $totalDespesa2013 + $totalDespesa2014 + $totalDespesa2015 +$totalDespesa2016 + $totalDespesa2017;

        $totais = [
            '2009' => $totalDespesa2009,
            '2010' => $totalDespesa2010,
            '2011' => $totalDespesa2011,
            '2012' => $totalDespesa2012,
            '2013' => $totalDespesa2013,
            '2014' => $totalDespesa2014,
            '2015' => $totalDespesa2015,
            '2016' => $totalDespesa2016,
            '2017' => $totalDespesa2017,
            'todosAnos' => $totalTodosAnos
        ];

        // $totais = [
        //     '2009' => 1,
        //     '2010' => 2,
        //     '2011' => 3,
        //     '2012' => 4,
        //     '2013' => 5,
        //     '2014' => 6,
        //     '2015' => 7,
        //     '2016' => 8,
        //     '2017' => 9,
        //     'todosAnos' => 45
        // ];
 
        $data = [
            'totais' => $totais
        ];
        */
		return view('inicial');
	}
}