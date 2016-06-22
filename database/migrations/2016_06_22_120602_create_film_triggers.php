<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `ins_film` AFTER INSERT ON `film` FOR EACH ROW BEGIN
          INSERT INTO film_text (film_id, title, description)
            VALUES (new.film_id, new.title, new.description);
        END;;
        ');
        DB::unprepared('
        CREATE TRIGGER `upd_film` AFTER UPDATE ON `film` FOR EACH ROW BEGIN
          IF (old.title != new.title) OR (old.description != new.description) OR (old.film_id != new.film_id)
          THEN
            UPDATE film_text
              SET title=new.title,
                description=new.description,
                  film_id=new.film_id
              WHERE film_id=old.film_id;
            END IF;
        END;;
        ');
        DB::unprepared('
        CREATE TRIGGER `del_film` AFTER DELETE ON `film` FOR EACH ROW BEGIN
          DELETE FROM film_text WHERE film_id = old.film_id;
        END;;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `ins_film`');
        DB::unprepared('DROP TRIGGER `upd_film`');
        DB::unprepared('DROP TRIGGER `del_film`');
    }
}
