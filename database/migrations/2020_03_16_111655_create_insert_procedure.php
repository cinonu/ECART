<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsertProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
        
        // DB::unprepared("CREATE PROCEDURE InsertCoupon(IN var_coupon_code varchar(255), IN var_amount int, IN var_amount_type varchar(255), IN var_expiry_date date(), IN var_status int)
        //                 BEGIN
        //                 INSERT INTO 
        //                 couponinsert_procedure(coupon_code,amount,amount_type,expiry_date,status) 
        //                 VALUES(var_coupon_code,var_amount,var_amount_type,var_expiry_date,var_status);
        //                 END;");

        DB::unprepared("CREATE PROCEDURE InsertCoupon(IN var_coupon_code varchar(255), IN var_amount int, IN var_amount_type varchar(255), IN var_status int)
                        BEGIN
                        INSERT INTO couponinsert_procedure(coupon_code,amount,amount_type,status) VALUES(var_coupon_code,var_amount,var_amount_type,var_status);
                        END;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::unprepared('DROP PROCEDURE IF EXISTS InsertCoupon');
    }
}