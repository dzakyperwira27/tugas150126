<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('anggotas', function (Blueprint $table) {
            $table->string('bidang')->nullable()->after('nomor_hp'); // nullable jika boleh kosong
        });
    }

    public function down()
    {
        Schema::table('anggotas', function (Blueprint $table) {
            $table->dropColumn('bidang');
        });
    }
};
