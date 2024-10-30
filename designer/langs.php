<?php
namespace Jometo_ir;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

if (!function_exists('jometo_ir_jafar_langs')) {
    function jometo_ir_jafar_langs( $lang = 'en' ){
		
		$jometo_ir_lang = [
			'fa' => [
				'لباس',
				'تیشرت',
				'شلوار',
				'لباس کودک',
				'طرح',
				'طرح دلخواه',
				'اندازه طرح',
				'💾 ذخیره این طرح',
				'⬆️ بستن',
				'⚙️ تنظیمات',
				'copyright' => 'طراحی شده توسط: پلاگین طراحی لباس Jometo.ir',
				'dir' => 'rtl'
			],
			'en' => [
				'Clothes',
				'Shirt',
				'Pants',
				'Child dress',
				'Pattern',
				'Custom pattern',
				'Pattern Size',
				'💾 Save this design',
				'⬆️ Close',
				'⚙️ Settings',
				'copyright' => 'Desgined by: Jometo.ir fashion designer',
				'dir' => 'ltr'
			],
			'nl' => [
				'Kleren',
				'Shirt',
				'Broek',
				'Kinderjurk',
				'Patroon',
				'Aangepast patroon',
				'Patroongrootte',
				'💾 Bewaar dit ontwerp',
				'⬆️ Sluiten',
				'⚙️ Instellingen',
				'copyright' => 'Ontworpen door: Jometo.ir modeontwerper',
				'dir' => 'ltr'
			],
			'tr' => [
				'Kıyafetler',
				'Gömlek',
				'Pantolon',
				'Çocuk elbisesi',
				'Model',
				'Özel desen',
				'Desen Boyutu',
				'💾 Bu tasarımı kaydet',
				'⬆️ Kapat',
				'⚙️ Ayarlar',
				'copyright' => 'Tasarlayan: Jometo.ir moda tasarımcısı',
				'dir' => 'ltr'
			]
		];

		if( !$lang OR @!$jometo_ir_lang[ $lang ] )
			$lang = 'en';
		
		return $jometo_ir_lang[ $lang ];

	}
}