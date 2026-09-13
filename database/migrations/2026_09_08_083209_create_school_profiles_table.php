<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('npsn', 20)->unique();
            $table->string('education_level');
            $table->string('status');
            $table->string('accreditation');
            $table->string('sk_pendirian');
            $table->string('sk_pendirian_date');
            $table->string('sk_izin_operasional');
            $table->string('principal_name');
            $table->string('principal_nip')->nullable();
            $table->string('dapodik_operator');
            $table->string('address');
            $table->string('rt_rw')->nullable();
            $table->string('village');
            $table->string('district');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code', 10);
            $table->string('phone');
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('land_area');
            $table->string('building_area');
            $table->string('internet_access')->nullable();
            $table->string('electricity_power')->nullable();
            $table->integer('student_count')->default(0);
            $table->integer('teacher_count')->default(0);
            $table->integer('staff_count')->default(0);
            $table->integer('classroom_count')->default(0);
            $table->integer('extracurricular_count')->default(0);
            $table->text('vision');
            $table->json('mission');
            $table->text('history');
            $table->text('principal_welcome');
            $table->string('principal_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_profiles');
    }
};
