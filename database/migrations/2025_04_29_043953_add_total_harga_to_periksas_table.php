<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->decimal('total_harga', 10, 2)->default(0); // Menambahkan kolom total_harga
        });
    }
    
    public function down()
    {
        Schema::table('periksas', function (Blueprint $table) {
            $table->dropColumn('total_harga');
        });
    }
    
};
