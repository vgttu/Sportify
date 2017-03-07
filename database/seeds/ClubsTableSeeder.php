<?php

use App\Club;
use Illuminate\Database\Seeder;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$clubs = [
            [1, "JK Kuusalu Kalev", "Rihumägi, Kuusalu village", 59.451052, 25.41614],
            [2, "Spordiklubi Fortis", "Haabersti 5", 59.4267415, 24.6427959],
            [3, "Meriton spordiklubi", "Toompuiestee 27", 59.435313, 24.7301685],
            [4, "Arigato spordiklubi", " Rannamaõisa tee 3", 59.4236658, 24.6376969],
            [5, "Spordiklubi fittest", "Männiliiva tn 7", 59.39359, 24.6768473],
            [6, "DanceAct", "Narva maantee 9", 59.4375054, 24.7598411],
            [7, "Reval Sport", "Aia 20", 59.4406279, 24.7490593],
            [8, "MyFitness Virbi", "Virbi 12", 59.4409515, 24.8418357],
            [9, "MyFitness Rocca al Mare", "Haabersti 5", 59.4267415, 24.6427959],
            [10, "MyFitness Viru", "Viru väljak 4", 59.4360469, 24.752794],
            [11, "Myfitness Postimaja", "Narva mnt 1", 59.4376919, 24.7540466],
            [12, "Myfitness Solaris", "Estonia pst. 9", 59.4331183, 24.7497371],
            [14, "Myfitness Kristiine", "Tulika põik 3", 59.431695, 24.7175539],
            [15, "Myfitness Viimsi", "Sõpruse tee 15", 59.5046741, 24.8248566],
            [16, "Myfitness Mustamäe", "Tammsaare tee 104a", 59.4060732, 24.6906222],
            [17, "Myfitness Pirita", "Merivälja tee 24", 59.4686605, 24.8328953],
            [18, "Myfitness Kärberi", "Kärberi 20", 59.4453939, 24.8807862],
            [19, "Zelluloosi spordiklubi", "Tartu maantee 80d", 59.4258228, 24.7774456],
            [20, "Best Select Spordiklubi", "Mardi 1", 59.4307194, 24.7597247],
            [21, "Arctic Sport Club", "Ehitajate tee 114b", 59.4139023, 24.6577714],
            [22, "Spordiklubi Idakeskus Sport", "Punane 16", 59.4324084, 24.8221578],
            [23, "Gymleco Spordiklubi", "Teaduspargi 6", 59.3984577, 24.6537822],
            [24, "Sparta", "Pärnu maantee 139c", 59.4063792,  24.7319792],
            [25, "3D treening", "Akadeemia tee 70-56", 59.4039808, 24.6544977],
            [26, "Citydance", "Uus-Tatari 25", 59.4260584, 24.7476224],
            [27, "Tantsukeskus", "Pärnu mnt 19", 59.4317915, 24.7437519],
            [28, "Aerial", "Tatari 64", 59.4253577, 24.7430788],
            [29, "Spordiklubi YongSheng", "E. Vilde tee 117-21", 59.4031558,  24.6649064],
            [30, "Tantsuklubi Get Rhytm", "Mustamäe Sotsiaalkeskus", 59.4153615, 24.6479294],
            [31, "Spordiklubi Kalev Boxing", "Liivalaia 7", 59.4280404, 24.7447411],
            [32, "Spordiklubi Fortuna", "Kivila 21", 59.4471621, 24.8716267],
            [33, "Mustakivi Spordiklubi", "Mahtra 1", 59.4424079, 24.8713511],
            [34, "Tantsugeen", "Rotermanni 2", 59.4383867, 24.755675],
            [35, "Tallinna Ülikooli Spordiklubi", "Narva mnt 25", 59.4387419, 24.7694565],
            [36, "Dünamo Poksiklubi", "Uus-Maleva 8", 59.4566634, 24.6815201],
            [37, "Viimsi Spa Spordiklubi", "Randvere tee 11", 59.5079313, 24.8275235],
            [38, "Saku Sporting", "Kannikese 4-21", 59.4291519, 24.7128581],
            [39, "MTÜ Korvpalliklubi Tallinn", "Õismäe tee 148", 59.4166813, 24.649806],
            [40, "AS Audentes", "Tondi 84", 59.4054803, 24.7114077],
            [41, "Alo Ojassalu Tennisekool", "Tondiraba tn. 11", 59.4500348, 24.854502],
            [42, "Kristjan Palusalu Spordiklubi", "Koidu tn 97", 59.4222576, 24.7360724],
            [43, "Nõmme Spordiklubi", "Männiliiva 7", 59.4692685, 24.9243885],
            [44, "Keila JK", " Ehitajate tee 13", 59.3994593, 24.6684036],
            [45, "JALGPALLIKLUBI TABASALU MTÜ", "Kooli 1", 59.4272325, 24.5313799],
            [46, "MTÜ Spordiklubi Martin Reimi Jalgpallikool", "Tulbiaia tee 12", 59.4995245, 24.847233],
            [47, "MTÜ Haaberst Sport SK", "Soolahe tee 27", 59.4541404, 24.5727473],
            [48, "MTÜ Korvpalliklubi Viimsi", "Begoonia tee 3", 59.4967069, 24.8489628],
            [49, "Kadrioru Tennisekool", "L. Koidula 38", 59.4360369, 24.7856586],
            [50, "Alta Tennis OÜ Alta Tennisekool", "Tondi 84", 59.4054803, 24.7114077],
        ];

        foreach ($clubs as $club) {
            Club::firstOrCreate([
                'id' => $club[0],
                'name' => $club[1],
                'address' => $club[2],
                'lat' => $club[3],
                'long' => $club[4]
            ]);
        }
    }
}
