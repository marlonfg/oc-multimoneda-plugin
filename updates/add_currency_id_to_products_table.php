<?php namespace MarlonFreire\Multimoneda\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddCurrencyIdToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('lovata_shopaholic_products', function($table)
        {
            $table->integer('currency_id')->unsigned()->nullable();
        });
    }

    public function down()
    {
        Schema::table('lovata_shopaholic_products', function($table)
        {
            $table->dropColumn('currency_id');
        });
    }
}