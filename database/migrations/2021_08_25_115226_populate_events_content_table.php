<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PopulateEventsContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::table('content')->updateOrInsert([ 'id' => 16 ], [
        //     'title_pt' => 'Encontro de Mestres',
        //     'text_pt' => 'O ENCONTRO DE MESTRES das TCCs é uma proposta científica objetivando oferecer aos Psicólogos brasileiros, principalmente àqueles que compõem a crescente massa de terapeutas cognitivo-comportamentais, seguidores das mais avançadas e recentes abordagens na área, o contato com os maiores e mais elevados mestres das Terapias Cognitivo-comportamentais em nível internacional, incluindo-se os brasileiros com igual projeção.',
        //     'image' => 'logo_site.png',
        //     'link' => 'https://www.encontrodemestres.com.br/',
        //     'content_page_id' => 1,
        //     'content_section_id' => 28,
        //     'image_bg' => 'banner_bg_leve_.jpg',
        //     'link_label' => 'Visitar Site',
        //     'visible_event' => 0,
        // ]);

        // DB::table('content')->updateOrInsert([ 'id' => 17 ], [
        //     'title_pt' => 'ACONTECETCC',
        //     'text_pt' => 'Novamente o CETCC - o mais prestigiado curso de Terapia Cognitivo-comportamental - reúne seus especialistas durante a semana em que se comemora o Dia do Psicólogo, para discutir questões importantes para o cotidiano da saúde mental do país, tão abalado pela pandemia. É hora de mostrar novos horizontes para a atividade do psicólogo, entender o que está mudando e projetar o que pode acontecer.  Visões, revisões e previsões.',
        //     'link' => 'https://acontecetcc.cetcc.com.br',
        //     'image' => 'acontecetcc_logo.png',
        //     'content_page_id' => 1,
        //     'content_section_id' => 28,
        //     'image_bg' => 'acontecetcc_bg.jpg',
        //     'link_label' => 'Visitar Site',
        //     'visible_event' => 1,
        // ]);
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
