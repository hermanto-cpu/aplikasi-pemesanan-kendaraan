<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id'); // ID pengguna yang membuat pemesanan
            $table->integer('driver_id')->nullable()->default(null); // ID driver yang ditetapkan
            $table->integer('supervisor_id')->nullable()->default(null); // ID approver
            $table->integer('supervisor_id_2')->nullable()->default(null); // ID approver
            $table->string('destination'); // Tujuan pemesanan
            $table->text('description')->nullable(); // Deskripsi tambahan
            $table->enum('status', ['pending', 'approved_level_1', 'approved_level_2', 'rejected']); // Status pemesanan
            $table->enum('kendaraan', [
                'Dump Truck',
                'Articulated Hauler',
                'Rock Truck',
            ]); // Kenderaan
            $table->timestamps();


            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('driver_id')->references('id')->on('users');
            // $table->foreign('supervisor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
}
