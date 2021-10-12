<?php


use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //make vehicle
        DB::table('vehicle_makes')->delete();
        $makes = array(
            array('id' => 1, 'name' => 'Toyota'),
            array('id' => 2, 'name' => 'Honda'),
            array('id' => 3, 'name' => 'Pak Suzuki'),
            array('id' => 4, 'name' => 'Changan'),
            array('id' => 5, 'name' => 'KIA'),
            array('id' => 6, 'name' => 'Hyundai'),
            array('id' => 7, 'name' => 'MG Motor'),
            array('id' => 8, 'name' => 'Proton'),
            array('id' => 9, 'name' => 'DFSK'),

        );
        DB::table('vehicle_makes')->insert($makes);

        //name  vehicle
        DB::table('vehicle_names')->delete();
        $names = array(
            array('id' => 1, 'make_id' => 1, 'name' => 'Corolla'),
            array('id' => 2, 'make_id' => 1, 'name' => 'Yaris'),
            array('id' => 3, 'make_id' => 1, 'name' => 'Fortuner'),
            array('id' => 4, 'make_id' => 1, 'name' => 'Prius'),
            array('id' => 5, 'make_id' => 1, 'name' => 'Camry'),
            array('id' => 6, 'make_id' => 1, 'name' => 'Land Cruiser'),
            array('id' => 7, 'make_id' => 1, 'name' => 'Hiace'),
            array('id' => 8, 'make_id' => 1, 'name' => 'Hilux'),
            array('id' => 9, 'make_id' => 1, 'name' => 'Rush'),
            array('id' => 10, 'make_id' => 1, 'name' => 'Prado'),
            array('id' => 11, 'make_id' => 1, 'name' => 'Corolla Cross'),
        //Toyota Name Ends...

        //Honda Name Strats ...
            array('id' => 12, 'make_id' => 2, 'name' => 'Civic'),
            array('id' => 13, 'make_id' => 2, 'name' => 'City'),
            array('id' => 14, 'make_id' => 2, 'name' => 'Accord'),
            array('id' => 15, 'make_id' => 2, 'name' => 'CR-V'),
            array('id' => 16, 'make_id' => 2, 'name' => 'BR-V'),
        //Honda Name Ends...

        //Pak Suzuki Name Starts ...

            array('id' => 17, 'make_id' => 3, 'name' => 'Alto'),
            array('id' => 18, 'make_id' => 3, 'name' => 'Cultus'),
            array('id' => 19, 'make_id' => 3, 'name' => 'Swift'),
            array('id' => 20, 'make_id' => 3, 'name' => 'Wagon R'),
            array('id' => 21, 'make_id' => 3, 'name' => 'Bolan'),
            array('id' => 22, 'make_id' => 3, 'name' => 'Vitara'),
            array('id' => 23, 'make_id' => 3, 'name' => 'APV'),
            array('id' => 24, 'make_id' => 3, 'name' => 'Ravi'),
            array('id' => 25, 'make_id' => 3, 'name' => 'Jimny'),

        //Pak Suzuki Names Ends ...

        //Changan Names Starts...


            array('id' => 26, 'make_id' => 4, 'name' => 'Alsvin'),
            array('id' => 27, 'make_id' => 4, 'name' => 'Karvaan'),
            array('id' => 28, 'make_id' => 4, 'name' => 'M9'),
            array('id' => 29, 'make_id' => 4, 'name' => 'M8'),

        //Changan Names Ends...

            array('id' => 0, 'make_id' => 0, 'name' => 'BR-V'),

        );
        DB::table('vehicle_names')->insert($names);

        //models
        DB::table('vehicle_models')->delete();
        $models1 = array(
            array('id' => 1, 'name_id' => 1, 'name' => 'Altis Grande X CVT-i 1.8 Beige Interior'),
            array('id' => 2, 'name_id' => 1, 'name' => 'Altis Grande X CVT-i 1.8 Black Interior'),
            array('id' => 3, 'name_id' => 1, 'name' => 'Altis X CVT-i 1.8'),
            array('id' => 4, 'name_id' => 1, 'name' => 'Altis X Automatic 1.6 Special Edition'),
            array('id' => 5, 'name_id' => 1, 'name' => 'Altis X Automatic 1.6'),
            array('id' => 6, 'name_id' => 1, 'name' => 'Altis X Manual 1.6'),
            array('id' => 7, 'name_id' => 2, 'name' => 'ATIV X CVT 1.5'),
            array('id' => 8, 'name_id' => 2, 'name' => 'ATIV X MT 1.5'),
            array('id' => 9, 'name_id' => 2, 'name' => 'ATIV CVT 1.3'),
            array('id' => 10, 'name_id' => 2, 'name' => 'ATIV MT 1.3'),
            array('id' => 11, 'name_id' => 2, 'name' => 'GLI CVT 1.3'),
            array('id' => 12, 'name_id' => 2, 'name' => 'GLI MT 1.3'),
            array('id' => 13, 'name_id' => 3, 'name' => '2.7 VVTi'),
            array('id' => 14, 'name_id' => 3, 'name' => '2.8 Sigma 4'),
            array('id' => 15, 'name_id' => 3, 'name' => '2.7 G'),
            array('id' => 16, 'name_id' => 3, 'name' => '2.7 V'),
            array('id' => 17, 'name_id' => 3, 'name' => '2.7 VVTi'),
            array('id' => 18, 'name_id' => 4, 'name' => 'S'),
            array('id' => 19, 'name_id' => 5, 'name' => 'High Grade'),
            array('id' => 20, 'name_id' => 6, 'name' => 'VX 4.6'),
            array('id' => 21, 'name_id' => 6, 'name' => 'GX-R'),
            array('id' => 22, 'name_id' => 6, 'name' => 'VX 4.5 D'),
            array('id' => 23, 'name_id' => 7, 'name' => 'Luxury Wagon High Grade'),
            array('id' => 24, 'name_id' => 7, 'name' => 'Luxury Wagon Low Grade'),
            array('id' => 25, 'name_id' => 7, 'name' => 'High Roof Tourer'),
            array('id' => 26, 'name_id' => 7, 'name' => 'High Roof Commuter'),
            array('id' => 27, 'name_id' => 8, 'name' => '4x4 Single Cab Standard 2.8'),
            array('id' => 28, 'name_id' => 8, 'name' => 'Revo V Automatic 2.8'),
            array('id' => 29, 'name_id' => 8, 'name' => 'Revo G Automatic 2.8'),
            array('id' => 30, 'name_id' => 8, 'name' => 'E'),
            array('id' => 31, 'name_id' => 8, 'name' => 'Revo G 2.8'),
            array('id' => 32, 'name_id' => 8, 'name' => '4X2 Single Cab Deckless'),
            array('id' => 33, 'name_id' => 8, 'name' => '4x2 Single Cab Up Spec'),
            array('id' => 34, 'name_id' => 8, 'name' => '4x2 Single Cab Standard'),
            array('id' => 35, 'name_id' => 9, 'name' => 'G A/T'),
            array('id' => 36, 'name_id' => 9, 'name' => 'G M/T'),
            array('id' => 37, 'name_id' => 10, 'name' => 'VX 4.6 Automatic'),
            array('id' => 38, 'name_id' => 10, 'name' => 'VX 4.5D Automatic'),
            array('id' => 39, 'name_id' => 10, 'name' => 'TX 3.0D'),
            array('id' => 40, 'name_id' => 10, 'name' => 'VX 3.0'),
            array('id' => 41, 'name_id' => 10, 'name' => 'VX 4.0'),
            array('id' => 42, 'name_id' => 11, 'name' => 'Premium High Grade'),
            array('id' => 43, 'name_id' => 11, 'name' => 'Smart Mid Grade'),
            array('id' => 44, 'name_id' => 11, 'name' => 'Low Grade'),

        //Toyota Models ends...

        //Honda Models Starts ...
            array('id' => 45, 'name_id' => 12, 'name' => 'Oriel 1.8 i-VTEC CVT'),
            array('id' => 46, 'name_id' => 12, 'name' => '1.8 i-VTEC CVT'),
            array('id' => 47, 'name_id' => 12, 'name' => '1.5 RS Turbo'),
            array('id' => 48, 'name_id' => 13, 'name' => '1.5L ASPIRE CVT'),
            array('id' => 49, 'name_id' => 13, 'name' => '1.5L ASPIRE M/T'),
            array('id' => 50, 'name_id' => 13, 'name' => '1.5L CVT'),
            array('id' => 51, 'name_id' => 13, 'name' => '1.3L CVT'),
            array('id' => 52, 'name_id' => 13, 'name' => '1.3L M/T'),
            array('id' => 53, 'name_id' => 13, 'name' => '1.2L CVT'),
            array('id' => 54, 'name_id' => 13, 'name' => '1.2L M/T'),
            array('id' => 55, 'name_id' => 14, 'name' => '1.5L VTEC Turbo'),
            array('id' => 56, 'name_id' => 15, 'name' => '2.0 CVT'),
            array('id' => 57, 'name_id' => 16, 'name' => 'i VTEC S'),
        //Honda Models Ends...

        //Pak Suzuki Models Starts ...

            array('id' => 58, 'name_id' => 17, 'name' => 'VXL/AGS'),
            array('id' => 59, 'name_id' => 17, 'name' => 'VXR'),
            array('id' => 60, 'name_id' => 17, 'name' => 'VX'),
            array('id' => 61, 'name_id' => 18, 'name' => 'Auto Gear Shift'),
            array('id' => 62, 'name_id' => 18, 'name' => 'VXL'),
            array('id' => 63, 'name_id' => 18, 'name' => 'VXR'),
            array('id' => 64, 'name_id' => 19, 'name' => 'DLX Automatic 1.3 Navigation'),
            array('id' => 65, 'name_id' => 19, 'name' => 'DLX 1.3 Navigation'),
            array('id' => 66, 'name_id' => 20, 'name' => 'AGS'),
            array('id' => 67, 'name_id' => 20, 'name' => 'VXL'),
            array('id' => 68, 'name_id' => 20, 'name' => 'VXR'),
            array('id' => 69, 'name_id' => 21, 'name' => 'VX Euro II'),
            array('id' => 70, 'name_id' => 21, 'name' => 'Cargo Van Euro ll'),
            array('id' => 71, 'name_id' => 22, 'name' => 'GLX 1.6'),
            array('id' => 72, 'name_id' => 23, 'name' => 'CLX'),
            array('id' => 73, 'name_id' => 24, 'name' => 'Euro || '),
            array('id' => 74, 'name_id' => 25, 'name' => 'GA MT'),

            //Pak Suzuki Models Ends ...

            //Changan Models Starts ...

            array('id' => 75, 'name_id' => 25, 'name' => '1.5L DCT Lumiere'),
            array('id' => 76, 'name_id' => 25, 'name' => '1.5L DCT Comfort'),
            array('id' => 77, 'name_id' => 25, 'name' => '1.3L MT Comfort'),
            array('id' => 78, 'name_id' => 26, 'name' => 'Plus'),
            array('id' => 79, 'name_id' => 26, 'name' => 'Base Model'),
            array('id' => 80, 'name_id' => 27, 'name' => 'Base Model 1.0'),
            array('id' => 81, 'name_id' => 28, 'name' => 'Base Model 1.0'),
            //Changan Models Ends ...
            array('id' => 82, 'name_id' => 29, 'name' => 'i VTEC S'),


        );
        DB::table('vehicle_models')->insert($models1);

        // engines
        DB::table('vehicle_engines')->delete();
        $engines = array(
            // Toyota Enfines Starts...

            array('id' => 1, 'model_id' => 1, 'name' => '1800CC'),
            array('id' => 2, 'model_id' => 2, 'name' => '1800CC'),
            array('id' => 3, 'model_id' => 3, 'name' => '1800CC'),
            array('id' => 4, 'model_id' => 4, 'name' => '1600CC'),
            array('id' => 5, 'model_id' => 5, 'name' => '1600CC'),
            array('id' => 6, 'model_id' => 6, 'name' => '1600CC'),
            array('id' => 7, 'model_id' => 7, 'name' => '1500CC'),
            array('id' => 8, 'model_id' => 8, 'name' => '1500CC'),
            array('id' => 9, 'model_id' => 9, 'name' => '1300CC'),
            array('id' => 10, 'model_id' => 10, 'name' => '1300CC'),
            array('id' => 11, 'model_id' => 11, 'name' => '1300CC'),
            array('id' => 12, 'model_id' => 12, 'name' => '1300CC'),
            array('id' => 13, 'model_id' => 13, 'name' => '2700CC'),
            array('id' => 14, 'model_id' => 14, 'name' => '2800CC'),
            array('id' => 15, 'model_id' => 15, 'name' => '2700CC'),
            array('id' => 16, 'model_id' => 16, 'name' => '2700CC'),
            array('id' => 17, 'model_id' => 17, 'name' => '2700CC'),
            array('id' => 18, 'model_id' => 18, 'name' => '1800CC'),
            array('id' => 19, 'model_id' => 19, 'name' => '2500CC'),
            array('id' => 20, 'model_id' => 20, 'name' => '4608CC'),
            array('id' => 21, 'model_id' => 21, 'name' => '4461CC'),
            array('id' => 22, 'model_id' => 22, 'name' => '4461CC'),
            array('id' => 23, 'model_id' => 23, 'name' => '2755CC'),
            array('id' => 24, 'model_id' => 24, 'name' => '2755CC'),
            array('id' => 25, 'model_id' => 25, 'name' => '2755CC'),
            array('id' => 26, 'model_id' => 26, 'name' => '2755CC'),
            array('id' => 27, 'model_id' => 27, 'name' => '2755CC'),
            array('id' => 28, 'model_id' => 28, 'name' => '2800CC'),
            array('id' => 29, 'model_id' => 29, 'name' => '2800CC'),
            array('id' => 30, 'model_id' => 30, 'name' => '2800CC'),
            array('id' => 31, 'model_id' => 31, 'name' => '2800CC'),
            array('id' => 32, 'model_id' => 32, 'name' => '2395CC'),
            array('id' => 33, 'model_id' => 33, 'name' => '2395CC'),
            array('id' => 34, 'model_id' => 34, 'name' => '2395CC'),
            array('id' => 35, 'model_id' => 35, 'name' => '1496CC'),
            array('id' => 36, 'model_id' => 36, 'name' => '1496CC'),
            array('id' => 37, 'model_id' => 37, 'name' => '4600CC'),
            array('id' => 38, 'model_id' => 38, 'name' => '4500CC'),
            array('id' => 39, 'model_id' => 39, 'name' => '2982CC'),
            array('id' => 40, 'model_id' => 40, 'name' => '2982CC'),
            array('id' => 41, 'model_id' => 41, 'name' => '3956CC'),
            array('id' => 42, 'model_id' => 42, 'name' => '1798CC'),
            array('id' => 43, 'model_id' => 44, 'name' => '1798CC'),
            array('id' => 44, 'model_id' => 44, 'name' => '1798CC'),

            // Toyota Engines Ends..

            // Honda Engines Starts ..

            array('id' => 45, 'model_id' => 45, 'name' => '1800CC'),
            array('id' => 46, 'model_id' => 46, 'name' => '1800CC'),
            array('id' => 47, 'model_id' => 47, 'name' => '1500CC'),
            array('id' => 48, 'model_id' => 48, 'name' => '1500CC'),
            array('id' => 49, 'model_id' => 49, 'name' => '1500CC'),
            array('id' => 50, 'model_id' => 50, 'name' => '1500CC'),
            array('id' => 51, 'model_id' => 51, 'name' => '1300CC'),
            array('id' => 52, 'model_id' => 52, 'name' => '1300CC'),
            array('id' => 53, 'model_id' => 53, 'name' => '1200CC'),
            array('id' => 54, 'model_id' => 54, 'name' => '1200CC'),
            array('id' => 55, 'model_id' => 55, 'name' => '1500CC'),
            array('id' => 56, 'model_id' => 56, 'name' => '2000CC'),
            array('id' => 57, 'model_id' => 57, 'name' => '1500CC'),

            // Honda Engines Ends ..
        );
        DB::table('vehicle_engines')->insert($engines);


        //types
        DB::table('vehicle_types')->delete();
        $types = array(
            //Toyota Vehicle type Strats..

            array('id' => 1,'model_id' => 1, 'name' => 'Car/Sedan'),
            array('id' => 2,'model_id' => 2, 'name' => 'Car/Sedan'),
            array('id' => 3,'model_id' => 3, 'name' => 'Car/Sedan'),
            array('id' => 4,'model_id' => 4, 'name' => 'Car/Sedan'),
            array('id' => 5,'model_id' => 5, 'name' => 'Car/Sedan'),
            array('id' => 6,'model_id' => 6, 'name' => 'Car/Sedan'),
            array('id' => 7,'model_id' => 7, 'name' => 'Car/Sedan'),
            array('id' => 8,'model_id' => 8, 'name' => 'Car/Sedan'),
            array('id' => 9,'model_id' => 9, 'name' => 'Car/Sedan'),
            array('id' => 10,'model_id' => 10, 'name' => 'Car/Sedan'),
            array('id' => 11,'model_id' => 11, 'name' => 'Car/Sedan'),
            array('id' => 12,'model_id' => 12, 'name' => 'Car/Sedan'),
            array('id' => 13,'model_id' => 13, 'name' => 'Car/SUV'),
            array('id' => 14,'model_id' => 14, 'name' => 'Car/SUV'),
            array('id' => 15,'model_id' => 15, 'name' => 'Car/SUV'),
            array('id' => 16,'model_id' => 16, 'name' => 'Car/SUV'),
            array('id' => 17,'model_id' => 17, 'name' => 'Car/SUV'),
            array('id' => 18,'model_id' => 18, 'name' => 'Car/Sedan'),
            array('id' => 19,'model_id' => 19, 'name' => 'Car/Sedan/Exective'),
            array('id' => 20,'model_id' => 20, 'name' => 'Car/Jeep/Luxury'),
            array('id' => 21,'model_id' => 21, 'name' => 'Car/Jeep/Luxury'),
            array('id' => 22,'model_id' => 22, 'name' => 'Car/Jeep/Luxury'),
            array('id' => 23,'model_id' => 23, 'name' => 'LCV'),
            array('id' => 24,'model_id' => 24, 'name' => 'LCV'),
            array('id' => 25,'model_id' => 25, 'name' => 'LCV'),
            array('id' => 26,'model_id' => 26, 'name' => 'LCV'),
            array('id' => 27,'model_id' => 27, 'name' => '4x4/4x2'),
            array('id' => 28,'model_id' => 28, 'name' => '4x4/4x3'),
            array('id' => 29,'model_id' => 29, 'name' => '4x4/4x4'),
            array('id' => 30,'model_id' => 30, 'name' => '4x4/4x5'),
            array('id' => 31,'model_id' => 31, 'name' => '4x4/4x7'),
            array('id' => 32,'model_id' => 33, 'name' => '4x4/4x8'),
            array('id' => 34,'model_id' => 34, 'name' => '4x4/4x9'),
            array('id' => 35,'model_id' => 35, 'name' => 'Car/SUV'),
            array('id' => 36,'model_id' => 36, 'name' => 'Car/SUV'),
            array('id' => 37,'model_id' => 37, 'name' => 'Car/Jeep/Luxury'),
            array('id' => 38,'model_id' => 38, 'name' => 'Car/Jeep/Luxury'),
            array('id' => 39,'model_id' => 39, 'name' => 'Car/Jeep/Luxury'),
            array('id' => 40,'model_id' => 40, 'name' => 'Car/Jeep/Luxury'),
            array('id' => 41,'model_id' => 41, 'name' => 'Car/Jeep/Luxury'),
            array('id' => 42,'model_id' => 42, 'name' => 'Car/SUV'),
            array('id' => 43,'model_id' => 43, 'name' => 'Car/SUV'),
            array('id' => 44,'model_id' => 44, 'name' => 'Car/SUV'),

            //Toyota Vehicle type ends...

            // Honda Vehicle type start...
            array('id' => 45,'model_id' => 45, 'name' => 'Car/Sedan'),
            array('id' => 46,'model_id' => 46, 'name' => 'Car/Sedan'),
            array('id' => 47,'model_id' => 47, 'name' => 'Car/Sedan'),
            array('id' => 48,'model_id' => 48, 'name' => 'Car/Sedan'),
            array('id' => 49,'model_id' => 49, 'name' => 'Car/Sedan'),
            array('id' => 50,'model_id' => 50, 'name' => 'Car/Sedan'),
            array('id' => 51,'model_id' => 51, 'name' => 'Car/Sedan'),
            array('id' => 52,'model_id' => 52, 'name' => 'Car/Sedan'),
            array('id' => 53,'model_id' => 53, 'name' => 'Car/Sedan'),
            array('id' => 54,'model_id' => 54, 'name' => 'Car/Sedan'),
            array('id' => 55,'model_id' => 55, 'name' => 'Car/Sedan/Exective'),
            array('id' => 56,'model_id' => 56, 'name' => 'Car/SUV'),
            array('id' => 57,'model_id' => 57, 'name' => 'Car/SUV'),

            // Honda Vehicle type ends...

        );
        DB::table('vehicle_types')->insert($types);

        //colors
        DB::table('vehicle_colors')->delete();
        $colors = array(
            array('id' => 1, 'name' => 'Red'),
            array('id' => 2, 'name' => 'Black'),
            array('id' => 3, 'name' => 'Gray'),
            array('id' => 4, 'name' => 'Green'),
            array('id' => 5, 'name' => 'White'),
            array('id' => 6, 'name' => 'Silver'),
        );
        DB::table('vehicle_colors')->insert($colors);

        //transmission
        DB::table('vehicle_transmissions')->delete();
        $transmission = array(
            array('id' => 1, 'type' => 'Automatic'),
            array('id' => 2, 'type' => 'Manual'),
        );
        DB::table('vehicle_transmissions')->insert($transmission);

        //fule types
        DB::table('vehicle_fuletypes')->delete();
        $fuletypes = array(
            array('id' => 1, 'name' => 'Hi-Octane'),
            array('id' => 2, 'name' => 'Petrol'),
        );
        DB::table('vehicle_fuletypes')->insert($fuletypes);

        //register for
        DB::table('vehicle_registerfors')->delete();
        $registerfors = array(
            array('id' => 1, 'name' => 'Tour&Travel'),
            array('id' => 2, 'name' => 'Hourly Ride'),
        );
        DB::table('vehicle_registerfors')->insert($registerfors);








        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => "MASST@098RIDES",
            'permissions' => json_encode(['All']),
            'password' => Hash::make('secret123'),
        ]);



        DB::table('makes')->insert([
            'name' => 'Toyota',
        ]);

        DB::table('franchises')->insert([
            'name' => 'Chock Kumhara Franchise',
            'phone' => '03015333444',
            'cnic' => '366022134567',
            "address" => 'Chock Kumharan Wala',
            'city' => 'Multan',
            'subscription_days' => '20',
            'paid_amount' => '500 Rs.',
            'paid_by' => ' Mobicash',
            'transaction_id' => '2432MASSTRIDES',
            'transaction_slip' => '1630436282jpg'
        ]);
        DB::table('franchises')->insert([
            'name' => 'Mall Road Franchise',
            'phone' => '03089847839',
            'cnic' => '3660221344598',
            "address" => 'Mall Road Lahore',
            'city' => 'Faisal Bad',
            'subscription_days' => '90',
            'paid_amount' => '500 Rs.',
            'paid_by' => 'Bank Account',
            'transaction_id' => 'Z124@MASSTRIDES',
            'transaction_slip' => '1630436282jpg'
        ]);

        DB::table('engines')->insert([
            'power' => 18,
        ]);

        DB::table('packagerates')->insert([
            'package_name' => 'Multan To Lahore',
            'package_price' => 25,
            'package_for' => 'rentacar',
        ]);

        DB::table('packagerates')->insert([
            'package_name' => 'Multan To Lahore',
            'package_price' => 30,
            'package_for' => 'tourtravel',
        ]);

    }
}
