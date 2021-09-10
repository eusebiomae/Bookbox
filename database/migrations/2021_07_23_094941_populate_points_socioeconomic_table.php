<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PopulatePointsSocioeconomicTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Estado Civil
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'marital_status',
			'selected_value' => 1,
		], [
			'points' => 1,
		]);

		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'marital_status',
			'selected_value' => 2,
		], [
			'points' => 3,
		]);

		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'marital_status',
			'selected_value' => 3,
		], [
			'points' => 3,
		]);

		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'marital_status',
			'selected_value' => 4,
		], [
			'points' => 2,
		]);

		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'marital_status',
			'selected_value' => 5,
		], [
			'points' => 2,
		]);

		// Salário
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'salary',
		], [
			'expression' => '<=1=10;<=2=9;<=3=8;<=4=7;<=5=6;<=6=5;<=7=4;<=8=3;<=9=2;<=10=1;>10=0',
		]);

		// Aluguel
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'rent_income',
		], [
			'points' => -1,
		]);

		// Pensão Alimentícia
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'alimony',
		], [
			'points' => 1,
		]);

		// Investimentos
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'financial_investments',
		], [
			'points' => -1,
		]);

		// Renda Total dos Familiares
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'total_family_income',
		], [
			'points' => 0,
		]);

		// Outros
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'others_income',
		], [
			'points' => -1,
		]);

		// Alimentação
		// Água
		// Energia
		// Telefone/Celular
		// Internet
		// Gás
		// Transporte/Combustível
		// Financiamento/Consórcio
		// Plano de Saúde/Odontológico
		// Funcionários Domésticos
		// Lazer
		// Vestuário
		// Medicação
		// Outras
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'feeding;water;energy;phone_or_cell_phone;internet;gas;transport_or_fuel;financing_or_consortium;health_or_dental_plan;domestic_workers;leisure;clothing;medication;others_expenses',
		], [
			'expression' => '<=2000=5;<=3000=4;<=5000=3;<=7000=2;<=10000=1;>10000=0',
		]);

		// Moradia
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'home',
			'selected_value' => 1,
		], [
			'points' => 0,
		]);

		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'home',
			'selected_value' => 2,
		], [
			'points' => 1,
		]);

		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'home',
			'selected_value' => 3,
		], [
			'points' => 2,
		]);

		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'home',
			'selected_value' => 4,
		], [
			'points' => 3,
		]);

		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'home',
			'selected_value' => 5,
		], [
			'points' => 2,
		]);

		// Valor do Financiamento
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'house_financing',
		], [
			'points' => 3,
		]);

		// Valor do Aluguel
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'house_rent',
		], [
			'points' => 3,
		]);

		// IPTU
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'iptu',
		], [
			'expression' => '<=1000=5;<=2000=4;<=3000=3;<=5000=2;<=10000=1;>10000=0',
		]);

		// Condomínio
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'condominium',
		], [
			'points' => 3,
		]);

		// Quantidade de Carros
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'amount_car',
		], [
			'points' => 3,
		]);

		// Preço Total dos Carros
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'price_total_cars',
		], [
			'points' => 3,
		]);

		// Quantidade de Motos
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'amount_motorcycles',
		], [
			'points' => 3,
		]);

		// Preço Total das Motos
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'price_total_motorcycles',
		], [
			'points' => 3,
		]);

		// Quantidade de Outros Automóveis
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'amount_others',
		], [
			'points' => 3,
		]);

		// Preço Total dos Outros Automóveis
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'price_total_others',
		], [
			'points' => 3,
		]);

		// Quantidade de Adultos
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'amount_adults',
		], [
			'points' => 3,
		]);

		// Quantidade de Crianças
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'amount_children',
		], [
			'points' => 5,
		]);

		// Quantidade de Gestantes
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'amount_pregnant',
		], [
			'points' => 5,
		]);

		// Quantidade de Idosos
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'amount_seniors',
		], [
			'points' => 7,
		]);

		// Quantidade de Pessoas com Necessidade Especiais
		DB::table('points_socioeconomic')->updateOrInsert([
			'column_name' => 'people_with_special_needs',
		], [
			'points' => 10,
		]);

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}
}
