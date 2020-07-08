<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetCouponsProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::unprepared('CREATE PROCEDURE GetCoupons() 
            BEGIN 
            SELECT * FROM couponinsert_procedure; 
            END');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
     DB::unprepared('DROP PROCEDURE IF EXISTS GetCoupons');


    }
}
