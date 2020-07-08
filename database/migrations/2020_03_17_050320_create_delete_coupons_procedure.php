<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeleteCouponsProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE PROCEDURE DeleteCoupons(IN var_id int)
                        BEGIN
                        DELETE FROM couponinsert_procedure where id=var_id;
                        END");
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

         DB::unprepared('DROP PROCEDURE IF EXISTS DeleteCoupons');

       
    }
}
