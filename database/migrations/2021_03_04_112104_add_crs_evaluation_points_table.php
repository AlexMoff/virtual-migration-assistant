<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCrsEvaluationPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluation_points', function (Blueprint $table) {
            $table->json('crs')->nullable()->after('fsw');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluation_points', function (Blueprint $table) {
            $table->dropColumn('crs');
        });
    }
}
