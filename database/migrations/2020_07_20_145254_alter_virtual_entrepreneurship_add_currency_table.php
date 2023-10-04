<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVirtualEntrepreneurshipAddCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('virtual_entrepreneurship', function (Blueprint $table) {
            $table->string('currency')->nullable()->after('net_worth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('virtual_entrepreneurship', function (Blueprint $table) {
            $table->dropColumn(['currency']);
        });
    }
}
