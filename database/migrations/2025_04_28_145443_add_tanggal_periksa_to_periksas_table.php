<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTanggalPeriksaToPeriksasTable extends Migration
{
    public function up()
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->date('tanggal_periksa')->nullable();
        });
    }

    public function down()
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->dropColumn('tanggal_periksa');
        });
    }
}
