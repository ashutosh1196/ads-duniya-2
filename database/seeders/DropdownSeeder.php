<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DropdownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('md_dropdowns')->delete();

		$counties = [

			['name_en' => 'Car','name_es' => 'Car','name_fr' => 'Car','name_ht' => 'Car','slug'=>'car','belongs_to'=>'vehicle_type','type'=>2,'value'=>0],

			['name_en' => 'Motorcycles','name_es' => 'Motorcycles','name_fr' => 'Motorcycles','name_ht' => 'Motorcycles','slug'=>'motorcycles','belongs_to'=>'vehicle_type','type'=>2,'value'=>1],

				
			['name_en' => 'Car','name_es' => 'Car','name_fr' => 'Car','name_ht' => 'Car','slug'=>'car','belongs_to'=>'make_type','type'=>3,'value'=>0],
			
			['name_en' => 'Moto','name_es' => 'Moto','name_fr' => 'Moto','name_ht' => 'Moto','slug'=>'moto','belongs_to'=>'make_type','type'=>3,'value'=>1],

			['name_en' => 'Power Equipment','name_es' => 'Power Equipment','name_fr' => 'Power Equipment','name_ht' => 'Power Equipment','slug'=>'power_equipment','belongs_to'=>'make_type','type'=>3,'value'=>2],

			['name_en' => 'Auto & Moto Parts','name_es' => 'Auto & Moto Parts','name_fr' => 'Auto & Moto Parts','name_ht' => 'Auto & Moto Parts','slug'=>'auto_and_moto_parts','belongs_to'=>'make_type','type'=>3,'value'=>3],	


			['name_en' => 'Electrical','name_es' => 'Eléctrico','name_fr' => 'Électrique','name_ht' => 'Elektrik','slug'=>'electrical','belongs_to'=>'fuel_type','type'=>0,'value'=>2],

			['name_en' => 'Petrol','name_es' => 'Gasolina','name_fr' => 'Essence','name_ht' => 'Petwòl','slug'=>'petrol','belongs_to'=>'fuel_type','type'=>0,'value'=>0],

			['name_en' => 'Diesel','name_es' => 'Diesel','name_fr' => 'Diesel','name_ht' => 'Dyezèl','slug'=>'diesel','belongs_to'=>'fuel_type','type'=>0,'value'=>1],

			['name_en' => 'Automatic','name_es' => 'Automático','name_fr' => 'Automatique','name_ht' => 'Otomatik','slug'=>'automatic','belongs_to'=>'transmission','type'=>0,'value'=>0],

			['name_en' => 'Manual','name_es' => 'Manual','name_fr' => 'Manuel','name_ht' => 'Manyèl','slug'=>'manual','belongs_to'=>'transmission','type'=>0,'value'=>1],

			['name_en' => 'Bluetooth Technology','name_es' => 'Tecnología bluetooth','name_fr' => 'Technologie Bluetooth','name_ht' => 'Teknoloji Bluetooth','slug'=>'bluetooth_technology','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Navigation System','name_es' => 'Sistema de navegación','name_fr' => 'Système de navigation','name_ht' => 'Sistèm Navigasyon','slug'=>'navigation_system','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Full Roof Rack','name_es' => 'Portaequipajes completo','name_fr' => 'Galerie de toit complète','name_ht' => 'Etajè Do-Kay konplè','slug'=>'full_roof_rack','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Running Boards','name_es' => 'Tablas de correr','name_fr' => 'Marchepieds','name_ht' => 'Kouri Boards','slug'=>'running_boards','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Tow Hitch','name_es' => 'Enganche de remolque','name_fr' => 'Attelage de remorquage','name_ht' => 'Attelage remorquage','slug'=>'tow_hitch','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'ABS Brakes','name_es' => 'Frenos ABS','name_fr' => 'Freins ABS','name_ht' => 'Fren ABS','slug'=>'abs_brakes','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Air Conditioning','name_es' => 'Aire acondicionado','name_fr' => 'Climatisation','name_ht' => 'Èkondisyone','slug'=>'ac','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Cruise Control','name_es' => 'Control de crucero','name_fr' => 'Régulateur de vitesse','name_ht' => 'Kontwòl kwazyè','slug'=>'cruise_control','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Front Seat Heaters','name_es' => 'Calentadores de asientos delanteros','name_fr' => 'Chauffage des sièges avant','name_ht' => 'Chofaj Syèj devan yo','slug'=>'front_seat_heaters','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Leather Seats','name_es' => 'Asientos de piel','name_fr' => 'Sièges en cuir','name_ht' => 'Syèj kwi','slug'=>'leather_seats','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Overhead Airbags','name_es' => 'Airbags de techo','name_fr' => 'Airbags aériens','name_ht' => 'Èrbag anlè','slug'=>'overhead_airbags','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Power Locks','name_es' => 'Cerraduras de energía','name_fr' => 'Serrures électriques','name_ht' => 'Pouvwa Locks','slug'=>'power_locks','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Power Mirrors','name_es' => 'Espejos eléctricos','name_fr' => 'Rétroviseurs électriques','name_ht' => 'Miwa pouvwa','slug'=>'power_mirrors','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Power Seat(s)','name_es' => 'Asiento (s) eléctrico','name_fr' => 'Siège (s) électrique (s)','name_ht' => 'Pouvwa Syèj (yo)','slug'=>'power_seats','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Power Windows','name_es' => 'Ventanas eléctricas','name_fr' => 'Vitres électriques','name_ht' => 'Pouvwa Windows','slug'=>'power_windows','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Rear Defroster','name_es' => 'Desempañador trasero','name_fr' => 'Dégivreur arrière','name_ht' => 'Dèyè dekonjle','slug'=>'rear_defroster','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Rear View Camera','name_es' => 'Cámara trasera','name_fr' => 'Caméra de vision arrière','name_ht' => 'Kamera View Dèyè','slug'=>'rear_view_camera','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Side Airbags','name_es' => 'Airbags laterales','name_fr' => 'Airbags latéraux','name_ht' => 'Èrbag Side','slug'=>'side_airbags','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Smart Key','name_es' => 'Llave inteligente','name_fr' => 'Clé intelligente','name_ht' => 'Smart Key','slug'=>'smart_keys','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Sunroof(s)','name_es' => 'Techo (s) corredizo','name_fr' => 'Toit (s) ouvrant (s)','name_ht' => 'Twati ouvè','slug'=>'sun_roof','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Traction Control','name_es' => 'Control de tracción','name_fr' => 'Contrôle de traction','name_ht' => 'Kontwòl Traction','slug'=>'traction_control','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Alloy Wheels','name_es' => 'Llantas de aleación','name_fr' => 'Roues en alliage','name_ht' => 'Wou alyaj','slug'=>'alloy_wheels','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Tubeless Tyres','name_es' => 'Neumáticos sin cámara','name_fr' => 'Pneus Tubeless','name_ht' => 'Kawotchou Tubeless','slug'=>'tubeless_tyres','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'AM/FM Stereo','name_es' => 'Estéreo AM / FM','name_fr' => 'AM / FM stéréo','name_ht' => 'AM / FM Stereo','slug'=>'am_fm_stereo','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Auxiliary Audio Input','name_es' => 'Entrada de audio auxiliar','name_fr' => 'Entrée audio auxiliaire','name_ht' => 'Oksilyè Antre Audio','slug'=>'auxiliary_audio_input','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'CD Audio','name_es' => 'CD de audio','name_fr' => 'CD audio','name_ht' => 'CD Audio','slug'=>'cd_audio','belongs_to'=>'extra_features','type'=>0,'value'=>null],

			['name_en' => 'Satellite Radio Ready','name_es' => 'Listo para radio satelital','name_fr' => 'Prêt pour la radio par satellite','name_ht' => 'Radyo Satelit Pare','slug'=>'satellite_radio_ready','belongs_to'=>'extra_features','type'=>0,'value'=>null],





			['name_en' => 'Keyless Ignition','name_es' => 'Keyless Ignition','name_fr' => 'Keyless Ignition','name_ht' => 'Keyless Ignition','slug'=>'keyless_ignition','belongs_to'=>'extra_features','type'=>1,'value'=>null],

			['name_en' => 'Navigation System','name_es' => 'Navigation System','name_fr' => 'Navigation System','name_ht' => 'Navigation System','slug'=>'navigation_system','belongs_to'=>'extra_features','type'=>1,'value'=>null],

			['name_en' => 'Sports Bike Gas Tanks','name_es' => 'Sports Bike Gas Tanks','name_fr' => 'Sports Bike Gas Tanks','name_ht' => 'Sports Bike Gas Tanks','slug'=>'sports_bike_gas_tanks','belongs_to'=>'extra_features','type'=>1,'value'=>null],

			['name_en' => 'Leg Guards','name_es' => 'Leg Guards','name_fr' => 'Leg Guards','name_ht' => 'Leg Guards','slug'=>'leg_guards','belongs_to'=>'extra_features','type'=>1,'value'=>null],

			['name_en' => 'Motorbike Alarms','name_es' => 'Motorbike Alarms','name_fr' => 'Motorbike Alarms','name_ht' => 'Motorbike Alarms','slug'=>'motorbike_alarms','belongs_to'=>'extra_features','type'=>1,'value'=>null],

			['name_en' => 'Sound System','name_es' => 'Sound System','name_fr' => 'Sound System','name_ht' => 'Sound System','slug'=>'sound_system','belongs_to'=>'extra_features','type'=>1,'value'=>null],

			['name_en' => 'Front Disc Brakes','name_es' => 'Front Disc Brakes','name_fr' => 'Front Disc Brakes','name_ht' => 'Front Disc Brakes','slug'=>'front_disc_brakes','belongs_to'=>'extra_features','type'=>1,'value'=>null],

			['name_en' => 'Rear Disc Brakes','name_es' => 'Rear Disc Brakes','name_fr' => 'Rear Disc Brakes','name_ht' => 'Rear Disc Brakes','slug'=>'rear_disc_brakes','belongs_to'=>'extra_features','type'=>1,'value'=>null],

			['name_en' => 'Digital console','name_es' => 'Digital console','name_fr' => 'Digital console','name_ht' => 'Digital console','slug'=>'digital_console','belongs_to'=>'extra_features','type'=>1,'value'=>null],

			['name_en' => 'Power Locks','name_es' => 'Power Locks','name_fr' => 'Power Locks','name_ht' => 'Power Locks','slug'=>'power_locks','belongs_to'=>'extra_features','type'=>1,'value'=>null],

			['name_en' => 'Smart Key','name_es' => 'Smart Key','name_fr' => 'Smart Key','name_ht' => 'Smart Key','slug'=>'smart_keys','belongs_to'=>'extra_features','type'=>1,'value'=>null],

			['name_en' => 'Alloy Wheels','name_es' => 'Alloy Wheels','name_fr' => 'Alloy Wheels','name_ht' => 'Alloy Wheels','slug'=>'alloy_wheels','belongs_to'=>'extra_features','type'=>1,'value'=>null],

			['name_en' => 'Tubeless Tyres','name_es' => 'Tubeless Tyres','name_fr' => 'Tubeless Tyres','name_ht' => 'Tubeless Tyres','slug'=>'tubeless_tyres','belongs_to'=>'extra_features','type'=>1,'value'=>null],



			['name_en' => 'Outstanding','name_es' => 'Sobresaliente','name_fr' => 'Exceptionnel','name_ht' => 'Eksepsyonel','slug'=>'outstanding','belongs_to'=>'condition','type'=>2,'value'=>0],

			['name_en' => 'Clean','name_es' => 'Limpio','name_fr' => 'Faire le ménage','name_ht' => 'Netwaye','slug'=>'clean','belongs_to'=>'condition','type'=>2,'value'=>1],

			['name_en' => 'Average','name_es' => 'Promedio','name_fr' => 'Moyenne','name_ht' => 'Mwayèn','slug'=>'average','belongs_to'=>'condition','type'=>2,'value'=>2],

			['name_en' => 'Rough','name_es' => 'Áspero','name_fr' => 'Rugueux','name_ht' => 'Ki graj','slug'=>'rough','belongs_to'=>'condition','type'=>2,'value'=>3],

			['name_en' => 'Damaged','name_es' => 'Dañado','name_fr' => 'Endommagé','name_ht' => 'Domaje','slug'=>'damaged','belongs_to'=>'condition','type'=>2,'value'=>4],

			['name_en' => 'Yes','name_es' => 'sí','name_fr' => 'Oui','name_ht' => 'Wi','slug'=>'yes','belongs_to'=>'accident','type'=>2,'value'=>1],

			['name_en' => 'No','name_es' => 'No','name_fr' => 'Non','name_ht' => 'Non','slug'=>'yes','belongs_to'=>'accident','type'=>2,'value'=>0],

			['name_en' => 'Yes','name_es' => 'sí','name_fr' => 'Oui','name_ht' => 'Wi','slug'=>'yes','belongs_to'=>'flood_damage','type'=>2,'value'=>1],

			['name_en' => 'No','name_es' => 'No','name_fr' => 'Non','name_ht' => 'Non','slug'=>'yes','belongs_to'=>'flood_damage','type'=>2,'value'=>0],

			['name_en' => 'Yes','name_es' => 'sí','name_fr' => 'Oui','name_ht' => 'Wi','slug'=>'yes','belongs_to'=>'frame_damage','type'=>2,'value'=>1],

			['name_en' => 'No','name_es' => 'No','name_fr' => 'Non','name_ht' => 'Non','slug'=>'yes','belongs_to'=>'frame_damage','type'=>2,'value'=>0],

			['name_en' => 'Yes','name_es' => 'sí','name_fr' => 'Oui','name_ht' => 'Wi','slug'=>'yes','belongs_to'=>'mechanical_issue','type'=>2,'value'=>1],

			['name_en' => 'No','name_es' => 'No','name_fr' => 'Non','name_ht' => 'Non','slug'=>'yes','belongs_to'=>'mechanical_issue','type'=>2,'value'=>0],

			['name_en' => 'Yes','name_es' => 'sí','name_fr' => 'Oui','name_ht' => 'Wi','slug'=>'yes','belongs_to'=>'lights_warning','type'=>2,'value'=>1],

			['name_en' => 'No','name_es' => 'No','name_fr' => 'Non','name_ht' => 'Non','slug'=>'yes','belongs_to'=>'lights_warning','type'=>2,'value'=>0],

			['name_en' => 'Yes','name_es' => 'sí','name_fr' => 'Oui','name_ht' => 'Wi','slug'=>'yes','belongs_to'=>'aftermarket_modification','type'=>2,'value'=>1],

			['name_en' => 'No','name_es' => 'No','name_fr' => 'Non','name_ht' => 'Non','slug'=>'yes','belongs_to'=>'aftermarket_modification','type'=>2,'value'=>0],

			['name_en' => 'Yes','name_es' => 'sí','name_fr' => 'Oui','name_ht' => 'Wi','slug'=>'yes','belongs_to'=>'odometer_broken','type'=>2,'value'=>1],

			['name_en' => 'No','name_es' => 'No','name_fr' => 'Non','name_ht' => 'Non','slug'=>'yes','belongs_to'=>'odometer_broken','type'=>2,'value'=>0],

			['name_en' => '1','name_es' => '1','name_fr' => '1','name_ht' => '1','slug'=>'one','belongs_to'=>'keys','type'=>2,'value'=>-0],

			['name_en' => '2 or More','name_es' => '2 or More','name_fr' => '2 or More','name_ht' => '2 or More','slug'=>'2_or_more','belongs_to'=>'keys','type'=>2,'value'=>1],


			['name_en' => '1','name_es' => 'uno','name_fr' => 'un','name_ht' => '1','slug'=>'one','belongs_to'=>'paint_or_body_work','type'=>2,'value'=>1],

			['name_en' => '2','name_es' => 'dos','name_fr' => 'deux','name_ht' => '2','slug'=>'two','belongs_to'=>'paint_or_body_work','type'=>2,'value'=>2],

			['name_en' => '3','name_es' => 'tres','name_fr' => 'trois','name_ht' => '3','slug'=>'three','belongs_to'=>'paint_or_body_work','type'=>2,'value'=>3],

			['name_en' => 'More','name_es' => 'more','name_fr' => 'more','name_ht' => 'more','slug'=>'more','belongs_to'=>'paint_or_body_work','type'=>2,'value'=>4],




			['name_en' => '1','name_es' => 'uno','name_fr' => 'un','name_ht' => '1','slug'=>'one','belongs_to'=>'interior_part_broken','type'=>2,'value'=>1],

			['name_en' => '2','name_es' => 'dos','name_fr' => 'deux','name_ht' => '2','slug'=>'two','belongs_to'=>'interior_part_broken','type'=>2,'value'=>2],

			['name_en' => '3','name_es' => 'tres','name_fr' => 'trois','name_ht' => '3','slug'=>'three','belongs_to'=>'interior_part_broken','type'=>2,'value'=>3],

			['name_en' => 'More','name_es' => 'More','name_fr' => 'More','name_ht' => 'More','slug'=>'more','belongs_to'=>'interior_part_broken','type'=>2,'value'=>4],




			['name_en' => '1','name_es' => 'uno','name_fr' => 'un','name_ht' => '1','slug'=>'one','belongs_to'=>'interior_tear_or_strain','type'=>2,'value'=>1],

			['name_en' => '2','name_es' => 'dos','name_fr' => 'deux','name_ht' => '2','slug'=>'two','belongs_to'=>'interior_tear_or_strain','type'=>2,'value'=>2],

			['name_en' => '3','name_es' => 'tres','name_fr' => 'trois','name_ht' => '3','slug'=>'three','belongs_to'=>'interior_tear_or_strain','type'=>2,'value'=>3],

			['name_en' => 'More','name_es' => 'More','name_fr' => 'More','name_ht' => 'More','slug'=>'more','belongs_to'=>'interior_tear_or_strain','type'=>2,'value'=>4],




			['name_en' => '1','name_es' => 'uno','name_fr' => 'un','name_ht' => '1','slug'=>'one','belongs_to'=>'tyre_replacable','type'=>0,'value'=>1],

			['name_en' => '2','name_es' => 'dos','name_fr' => 'deux','name_ht' => '2','slug'=>'two','belongs_to'=>'tyre_replacable','type'=>0,'value'=>2],

			['name_en' => '3','name_es' => 'tres','name_fr' => 'trois','name_ht' => '3','slug'=>'three','belongs_to'=>'tyre_replacable','type'=>0,'value'=>3],

			['name_en' => 'More','name_es' => 'More','name_fr' => 'More','name_ht' => 'More','slug'=>'more','belongs_to'=>'tyre_replacable','type'=>0,'value'=>4],



			['name_en' => '1','name_es' => 'uno','name_fr' => 'un','name_ht' => '1','slug'=>'one','belongs_to'=>'tyre_replacable2','type'=>1,'value'=>1],

			['name_en' => '2','name_es' => 'dos','name_fr' => 'deux','name_ht' => '2','slug'=>'two','belongs_to'=>'tyre_replacable2','type'=>1,'value'=>2],





			['name_en' => '10','name_es' => '10','name_fr' => '10','name_ht' => '10','slug'=>'ten','belongs_to'=>'mpg_highway','type'=>2,'value'=>10],

			['name_en' => '20','name_es' => '20','name_fr' => '20','name_ht' => '20','slug'=>'twenty','belongs_to'=>'mpg_highway','type'=>2,'value'=>20],

			['name_en' => '30','name_es' => '30','name_fr' => '30','name_ht' => '30','slug'=>'thirty','belongs_to'=>'mpg_highway','type'=>2,'value'=>30],

			['name_en' => '40','name_es' => '40','name_fr' => '40','name_ht' => '40','slug'=>'fourty','belongs_to'=>'mpg_highway','type'=>2,'value'=>40],

			['name_en' => '50','name_es' => '50','name_fr' => '50','name_ht' => '50','slug'=>'fifty','belongs_to'=>'mpg_highway','type'=>2,'value'=>50],

		];
		
		
		\DB::table('md_dropdowns')->insert($counties);
    }
}
