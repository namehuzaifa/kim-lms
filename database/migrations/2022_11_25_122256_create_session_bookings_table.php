<?php

use App\Models\Coaching;
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
        Schema::create('session_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('coach_id')->constrained('users');
            $table->foreignId('session_id')->constrained('coachings');
            $table->string('coach_name')->nullable();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('start_end_time');
            $table->string('duration');
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('objective')->nullable();
            $table->string('card_holder_name')->nullable();
            $table->string('price_per_session');
            $table->string('payment_method')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('payment_status');
            $table->string('session_status');
            $table->integer('email_reminder')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_bookings');
    }
};
