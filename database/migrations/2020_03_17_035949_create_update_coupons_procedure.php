<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdateCouponsProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE PROCEDURE UpdateCoupons(IN var_id int,IN var_coupon_code varchar(255),IN var_amount int,IN var_amount_type varchar(255),IN var_status int)
                        BEGIN
                        UPDATE couponinsert_procedure SET coupon_code='var_coupon_code',amount='var_amount',amount_type='var_amount_type',status='var_status' where id=var_id;
                        END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS UpdateCoupons');
    }
}
