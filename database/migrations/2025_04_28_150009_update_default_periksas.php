<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDefaultPeriksas extends Migration
{
    public function up()
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->date('tanggal_periksa')->nullable()->change();
            $table->decimal('biaya_periksa', 10, 2)->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('periksas', function (Blueprint $table) {
            // Balikin ke sebelumnya kalau dibutuhkan
        });
    }
}
