<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('customer_id'); // Thêm cột user_id
            $table->string('payment_status')->default('chưa thanh toán')->after('total_price'); // Thêm payment_status
            $table->string('payment_method')->default('cod')->after('payment_status'); // Thêm payment_method
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['user_id', 'payment_status', 'payment_method']); // Xóa các cột
        });
    }
};
