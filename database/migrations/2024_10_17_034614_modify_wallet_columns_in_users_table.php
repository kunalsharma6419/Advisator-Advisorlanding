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
        Schema::table('users', function (Blueprint $table) {
            // Drop the existing wallet_balance column
            $table->dropColumn('wallet_balance');

            // Add new user_wallet_balance and advisor_wallet_balance columns
            $table->decimal('user_wallet_balance', 10, 2)->default(0.00)->after('phone_number');
            $table->decimal('advisor_wallet_balance', 10, 2)->default(0.00)->after('user_wallet_balance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // In the down method, drop the new columns
            $table->dropColumn('user_wallet_balance');
            $table->dropColumn('advisor_wallet_balance');

            // Re-add the original wallet_balance column
            $table->decimal('wallet_balance', 10, 2)->default(0.00)->after('phone_number');
        });
    }
};
