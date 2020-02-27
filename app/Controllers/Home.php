<?php

namespace App\Controllers;

use App\Models\SalariosModel;

class Home extends BaseController
{
	public function index()
	{
		return view('grafico');
	}


	public function getDados()
	{

		$salarioModel = new SalariosModel();

		$salarios = $salarioModel->findAll();

		$cols = [];
		$rows = [];
		$dados = [];
		$cols = [			
					[
						'id' => '',
						'label' => 'Mês',
						'pattern' => '',
						'type' => 'string'
					],
					[
						'id' => '',
						'label' => 'Salário',
						'pattern' => '',
						'type' => 'number'
					]
		];

		foreach($salarios as $salario) {
			$rows[] = [
				'c' => [
					[
						'v' => $salario['mes'], 
						'f' => null
					],
					[
						'v' => (int)$salario['salario'],
						'f' => null
					]
				]
			];
		}

		$dados = [
			'cols' => $cols,
			'rows' => $rows
		];

		// echo '<pre>';
		echo json_encode($dados);

	}

	//--------------------------------------------------------------------

}
