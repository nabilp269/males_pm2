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
    Schema::table('orders', function ($table) {
        $table->text('seller_message')->nullable()->after('alamat_pengiriman');
    });
}

public function down()
{
    Schema::table('orders', function ($table) {
        $table->dropColumn('seller_message');
    });
}

};
