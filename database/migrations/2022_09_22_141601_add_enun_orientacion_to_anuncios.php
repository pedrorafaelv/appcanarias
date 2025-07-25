<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anuncios', function (Blueprint $table) {
            \DB::statement("ALTER TABLE  anuncios  MODIFY orientacion ENUM('Heterosexual', 'Bisexual', 'Homosexual', 'Otra') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Heterosexual';");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anuncios', function (Blueprint $table) {
            //
        });
    }
};
