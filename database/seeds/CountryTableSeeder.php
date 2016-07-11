<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * reun the seeder for the user
     *
     * @return void
     **/
    public function run()
    {
        // for individual use "php artisan db:seed --class=CountryTableSeeder"
        Schema::disableForeignKeyConstraints();
        
        DB::table('country')->truncate();

        /**
         * Could have used
         * factory('App\Country', 109)->create();
         *
         * OR
         *
         * DB::table('some:table')->insert([
         *     'id' => '',
         *     'text' => '',
         * ]);
         *
         * but deecided for seeding these values
         * instead of random ones
         * from the factory
         *
         **/

        App\Country::create(['country_id' => '1', 'country' => 'Afghanistan']);
        App\Country::create(['country_id' => '2', 'country' => 'Algeria']);
        App\Country::create(['country_id' => '3', 'country' => 'American Samoa']);
        App\Country::create(['country_id' => '4', 'country' => 'Angola']);
        App\Country::create(['country_id' => '5', 'country' => 'Anguilla']);
        App\Country::create(['country_id' => '6', 'country' => 'Argentina']);
        App\Country::create(['country_id' => '7', 'country' => 'Armenia']);
        App\Country::create(['country_id' => '8', 'country' => 'Australia']);
        App\Country::create(['country_id' => '9', 'country' => 'Austria']);
        App\Country::create(['country_id' => '10', 'country' => 'Azerbaijan']);
        App\Country::create(['country_id' => '11', 'country' => 'Bahrain']);
        App\Country::create(['country_id' => '12', 'country' => 'Bangladesh']);
        App\Country::create(['country_id' => '13', 'country' => 'Belarus']);
        App\Country::create(['country_id' => '14', 'country' => 'Bolivia']);
        App\Country::create(['country_id' => '15', 'country' => 'Brazil']);
        App\Country::create(['country_id' => '16', 'country' => 'Brunei']);
        App\Country::create(['country_id' => '17', 'country' => 'Bulgaria']);
        App\Country::create(['country_id' => '18', 'country' => 'Cambodia']);
        App\Country::create(['country_id' => '19', 'country' => 'Cameroon']);
        App\Country::create(['country_id' => '20', 'country' => 'Canada']);
        App\Country::create(['country_id' => '21', 'country' => 'Chad']);
        App\Country::create(['country_id' => '22', 'country' => 'Chile']);
        App\Country::create(['country_id' => '23', 'country' => 'China']);
        App\Country::create(['country_id' => '24', 'country' => 'Colombia']);
        App\Country::create(['country_id' => '25', 'country' => 'Congo, The Democratic Republic of the']);
        App\Country::create(['country_id' => '26', 'country' => 'Czech Republic']);
        App\Country::create(['country_id' => '27', 'country' => 'Dominican Republic']);
        App\Country::create(['country_id' => '28', 'country' => 'Ecuador']);
        App\Country::create(['country_id' => '29', 'country' => 'Egypt']);
        App\Country::create(['country_id' => '30', 'country' => 'Estonia']);
        App\Country::create(['country_id' => '31', 'country' => 'Ethiopia']);
        App\Country::create(['country_id' => '32', 'country' => 'Faroe Islands']);
        App\Country::create(['country_id' => '33', 'country' => 'Finland']);
        App\Country::create(['country_id' => '34', 'country' => 'France']);
        App\Country::create(['country_id' => '35', 'country' => 'French Guiana']);
        App\Country::create(['country_id' => '36', 'country' => 'French Polynesia']);
        App\Country::create(['country_id' => '37', 'country' => 'Gambia']);
        App\Country::create(['country_id' => '38', 'country' => 'Germany']);
        App\Country::create(['country_id' => '39', 'country' => 'Greece']);
        App\Country::create(['country_id' => '40', 'country' => 'Greenland']);
        App\Country::create(['country_id' => '41', 'country' => 'Holy See (Vatican City State)']);
        App\Country::create(['country_id' => '42', 'country' => 'Hong Kong']);
        App\Country::create(['country_id' => '43', 'country' => 'Hungary']);
        App\Country::create(['country_id' => '44', 'country' => 'India']);
        App\Country::create(['country_id' => '45', 'country' => 'Indonesia']);
        App\Country::create(['country_id' => '46', 'country' => 'Iran']);
        App\Country::create(['country_id' => '47', 'country' => 'Iraq']);
        App\Country::create(['country_id' => '48', 'country' => 'Israel']);
        App\Country::create(['country_id' => '49', 'country' => 'Italy']);
        App\Country::create(['country_id' => '50', 'country' => 'Japan']);
        App\Country::create(['country_id' => '51', 'country' => 'Kazakstan']);
        App\Country::create(['country_id' => '52', 'country' => 'Kenya']);
        App\Country::create(['country_id' => '53', 'country' => 'Kuwait']);
        App\Country::create(['country_id' => '54', 'country' => 'Latvia']);
        App\Country::create(['country_id' => '55', 'country' => 'Liechtenstein']);
        App\Country::create(['country_id' => '56', 'country' => 'Lithuania']);
        App\Country::create(['country_id' => '57', 'country' => 'Madagascar']);
        App\Country::create(['country_id' => '58', 'country' => 'Malawi']);
        App\Country::create(['country_id' => '59', 'country' => 'Malaysia']);
        App\Country::create(['country_id' => '60', 'country' => 'Mexico']);
        App\Country::create(['country_id' => '61', 'country' => 'Moldova']);
        App\Country::create(['country_id' => '62', 'country' => 'Morocco']);
        App\Country::create(['country_id' => '63', 'country' => 'Mozambique']);
        App\Country::create(['country_id' => '64', 'country' => 'Myanmar']);
        App\Country::create(['country_id' => '65', 'country' => 'Nauru']);
        App\Country::create(['country_id' => '66', 'country' => 'Nepal']);
        App\Country::create(['country_id' => '67', 'country' => 'Netherlands']);
        App\Country::create(['country_id' => '68', 'country' => 'New Zealand']);
        App\Country::create(['country_id' => '69', 'country' => 'Nigeria']);
        App\Country::create(['country_id' => '70', 'country' => 'North Korea']);
        App\Country::create(['country_id' => '71', 'country' => 'Oman']);
        App\Country::create(['country_id' => '72', 'country' => 'Pakistan']);
        App\Country::create(['country_id' => '73', 'country' => 'Paraguay']);
        App\Country::create(['country_id' => '74', 'country' => 'Peru']);
        App\Country::create(['country_id' => '75', 'country' => 'Philippines']);
        App\Country::create(['country_id' => '76', 'country' => 'Poland']);
        App\Country::create(['country_id' => '77', 'country' => 'Puerto Rico']);
        App\Country::create(['country_id' => '78', 'country' => 'Romania']);
        App\Country::create(['country_id' => '79', 'country' => 'Runion']);
        App\Country::create(['country_id' => '80', 'country' => 'Russian Federation']);
        App\Country::create(['country_id' => '81', 'country' => 'Saint Vincent and the Grenadines']);
        App\Country::create(['country_id' => '82', 'country' => 'Saudi Arabia']);
        App\Country::create(['country_id' => '83', 'country' => 'Senegal']);
        App\Country::create(['country_id' => '84', 'country' => 'Slovakia']);
        App\Country::create(['country_id' => '85', 'country' => 'South Africa']);
        App\Country::create(['country_id' => '86', 'country' => 'South Korea']);
        App\Country::create(['country_id' => '87', 'country' => 'Spain']);
        App\Country::create(['country_id' => '88', 'country' => 'Sri Lanka']);
        App\Country::create(['country_id' => '89', 'country' => 'Sudan']);
        App\Country::create(['country_id' => '90', 'country' => 'Sweden']);
        App\Country::create(['country_id' => '91', 'country' => 'Switzerland']);
        App\Country::create(['country_id' => '92', 'country' => 'Taiwan']);
        App\Country::create(['country_id' => '93', 'country' => 'Tanzania']);
        App\Country::create(['country_id' => '94', 'country' => 'Thailand']);
        App\Country::create(['country_id' => '95', 'country' => 'Tonga']);
        App\Country::create(['country_id' => '96', 'country' => 'Tunisia']);
        App\Country::create(['country_id' => '97', 'country' => 'Turkey']);
        App\Country::create(['country_id' => '98', 'country' => 'Turkmenistan']);
        App\Country::create(['country_id' => '99', 'country' => 'Tuvalu']);
        App\Country::create(['country_id' => '100', 'country' => 'Ukraine']);
        App\Country::create(['country_id' => '101', 'country' => 'United Arab Emirates']);
        App\Country::create(['country_id' => '102', 'country' => 'United Kingdom']);
        App\Country::create(['country_id' => '103', 'country' => 'United States']);
        App\Country::create(['country_id' => '104', 'country' => 'Venezuela']);
        App\Country::create(['country_id' => '105', 'country' => 'Vietnam']);
        App\Country::create(['country_id' => '106', 'country' => 'Virgin Islands, U.S.']);
        App\Country::create(['country_id' => '107', 'country' => 'Yemen']);
        App\Country::create(['country_id' => '108', 'country' => 'Yugoslavia']);
        App\Country::create(['country_id' => '109', 'country' => 'Zambia']);

        Schema::enableForeignKeyConstraints();

        /*
        (1,'Afghanistan','2006-02-15 04:44:00'),
        (2,'Algeria','2006-02-15 04:44:00'),
        (3,'American Samoa','2006-02-15 04:44:00'),
        (4,'Angola','2006-02-15 04:44:00'),
        (5,'Anguilla','2006-02-15 04:44:00'),
        (6,'Argentina','2006-02-15 04:44:00'),
        (7,'Armenia','2006-02-15 04:44:00'),
        (8,'Australia','2006-02-15 04:44:00'),
        (9,'Austria','2006-02-15 04:44:00'),
        (10,'Azerbaijan','2006-02-15 04:44:00'),
        (11,'Bahrain','2006-02-15 04:44:00'),
        (12,'Bangladesh','2006-02-15 04:44:00'),
        (13,'Belarus','2006-02-15 04:44:00'),
        (14,'Bolivia','2006-02-15 04:44:00'),
        (15,'Brazil','2006-02-15 04:44:00'),
        (16,'Brunei','2006-02-15 04:44:00'),
        (17,'Bulgaria','2006-02-15 04:44:00'),
        (18,'Cambodia','2006-02-15 04:44:00'),
        (19,'Cameroon','2006-02-15 04:44:00'),
        (20,'Canada','2006-02-15 04:44:00'),
        (21,'Chad','2006-02-15 04:44:00'),
        (22,'Chile','2006-02-15 04:44:00'),
        (23,'China','2006-02-15 04:44:00'),
        (24,'Colombia','2006-02-15 04:44:00'),
        (25,'Congo, The Democratic Republic of the','2006-02-15 04:44:00'),
        (26,'Czech Republic','2006-02-15 04:44:00'),
        (27,'Dominican Republic','2006-02-15 04:44:00'),
        (28,'Ecuador','2006-02-15 04:44:00'),
        (29,'Egypt','2006-02-15 04:44:00'),
        (30,'Estonia','2006-02-15 04:44:00'),
        (31,'Ethiopia','2006-02-15 04:44:00'),
        (32,'Faroe Islands','2006-02-15 04:44:00'),
        (33,'Finland','2006-02-15 04:44:00'),
        (34,'France','2006-02-15 04:44:00'),
        (35,'French Guiana','2006-02-15 04:44:00'),
        (36,'French Polynesia','2006-02-15 04:44:00'),
        (37,'Gambia','2006-02-15 04:44:00'),
        (38,'Germany','2006-02-15 04:44:00'),
        (39,'Greece','2006-02-15 04:44:00'),
        (40,'Greenland','2006-02-15 04:44:00'),
        (41,'Holy See (Vatican City State)','2006-02-15 04:44:00'),
        (42,'Hong Kong','2006-02-15 04:44:00'),
        (43,'Hungary','2006-02-15 04:44:00'),
        (44,'India','2006-02-15 04:44:00'),
        (45,'Indonesia','2006-02-15 04:44:00'),
        (46,'Iran','2006-02-15 04:44:00'),
        (47,'Iraq','2006-02-15 04:44:00'),
        (48,'Israel','2006-02-15 04:44:00'),
        (49,'Italy','2006-02-15 04:44:00'),
        (50,'Japan','2006-02-15 04:44:00'),
        (51,'Kazakstan','2006-02-15 04:44:00'),
        (52,'Kenya','2006-02-15 04:44:00'),
        (53,'Kuwait','2006-02-15 04:44:00'),
        (54,'Latvia','2006-02-15 04:44:00'),
        (55,'Liechtenstein','2006-02-15 04:44:00'),
        (56,'Lithuania','2006-02-15 04:44:00'),
        (57,'Madagascar','2006-02-15 04:44:00'),
        (58,'Malawi','2006-02-15 04:44:00'),
        (59,'Malaysia','2006-02-15 04:44:00'),
        (60,'Mexico','2006-02-15 04:44:00'),
        (61,'Moldova','2006-02-15 04:44:00'),
        (62,'Morocco','2006-02-15 04:44:00'),
        (63,'Mozambique','2006-02-15 04:44:00'),
        (64,'Myanmar','2006-02-15 04:44:00'),
        (65,'Nauru','2006-02-15 04:44:00'),
        (66,'Nepal','2006-02-15 04:44:00'),
        (67,'Netherlands','2006-02-15 04:44:00'),
        (68,'New Zealand','2006-02-15 04:44:00'),
        (69,'Nigeria','2006-02-15 04:44:00'),
        (70,'North Korea','2006-02-15 04:44:00'),
        (71,'Oman','2006-02-15 04:44:00'),
        (72,'Pakistan','2006-02-15 04:44:00'),
        (73,'Paraguay','2006-02-15 04:44:00'),
        (74,'Peru','2006-02-15 04:44:00'),
        (75,'Philippines','2006-02-15 04:44:00'),
        (76,'Poland','2006-02-15 04:44:00'),
        (77,'Puerto Rico','2006-02-15 04:44:00'),
        (78,'Romania','2006-02-15 04:44:00'),
        (79,'Runion','2006-02-15 04:44:00'),
        (80,'Russian Federation','2006-02-15 04:44:00'),
        (81,'Saint Vincent and the Grenadines','2006-02-15 04:44:00'),
        (82,'Saudi Arabia','2006-02-15 04:44:00'),
        (83,'Senegal','2006-02-15 04:44:00'),
        (84,'Slovakia','2006-02-15 04:44:00'),
        (85,'South Africa','2006-02-15 04:44:00'),
        (86,'South Korea','2006-02-15 04:44:00'),
        (87,'Spain','2006-02-15 04:44:00'),
        (88,'Sri Lanka','2006-02-15 04:44:00'),
        (89,'Sudan','2006-02-15 04:44:00'),
        (90,'Sweden','2006-02-15 04:44:00'),
        (91,'Switzerland','2006-02-15 04:44:00'),
        (92,'Taiwan','2006-02-15 04:44:00'),
        (93,'Tanzania','2006-02-15 04:44:00'),
        (94,'Thailand','2006-02-15 04:44:00'),
        (95,'Tonga','2006-02-15 04:44:00'),
        (96,'Tunisia','2006-02-15 04:44:00'),
        (97,'Turkey','2006-02-15 04:44:00'),
        (98,'Turkmenistan','2006-02-15 04:44:00'),
        (99,'Tuvalu','2006-02-15 04:44:00'),
        (100,'Ukraine','2006-02-15 04:44:00'),
        (101,'United Arab Emirates','2006-02-15 04:44:00'),
        (102,'United Kingdom','2006-02-15 04:44:00'),
        (103,'United States','2006-02-15 04:44:00'),
        (104,'Venezuela','2006-02-15 04:44:00'),
        (105,'Vietnam','2006-02-15 04:44:00'),
        (106,'Virgin Islands, U.S.','2006-02-15 04:44:00'),
        (107,'Yemen','2006-02-15 04:44:00'),
        (108,'Yugoslavia','2006-02-15 04:44:00'),
        (109,'Zambia','2006-02-15 04:44:00')
         */
    }
}
