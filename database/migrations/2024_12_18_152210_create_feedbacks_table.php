<?php


use App\Models\Ward;
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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string("preferred_language", 12);
            $table->foreignIdFor(Ward::class);
            $table->string("name");
            $table->string("address");
            $table->string("phone_no", 12);

            $table->enum('accessibility', ['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Very Dissatisfied'])->nullable();
            $table->enum('responsiveness_grievances', ['Excellent', 'Good', 'Average', 'Poor', 'Very Poor'])->nullable();
            $table->enum('proactive_step_issues', ['Always', 'Sometimes', 'Rarely', 'Never'])->nullable();
            $table->enum('transparent_action_and_decision', ['Yes', 'No'])->nullable();
            $table->text('suggestions')->nullable();

            $table->enum('roads_pavements', ['Excellent', 'Good', 'Average', 'Poor'])->nullable();
            $table->enum('drainage_system', ['Excellent', 'Good', 'Average', 'Poor'])->nullable();
            $table->enum('waste_management', ['Excellent', 'Good', 'Average', 'Poor'])->nullable();
            $table->enum('street_lighting', ['Excellent', 'Good', 'Average', 'Poor'])->nullable();
            $table->enum('parks_public_spaces', ['Excellent', 'Good', 'Average', 'Poor'])->nullable();
            $table->enum('sanitation_water_supply_adequate', ['Yes', 'No'])->nullable();
            $table->enum('feel_safe', ['Yes', 'No'])->nullable();
            $table->enum('environmentally_sustainable', ['Yes', 'No'])->nullable();

            $table->enum('attended_meeting_drive_event', ['Yes', 'No'])->nullable();
            $table->enum('opinions_considered_dev_plans', ['Always', 'Sometimes', 'Rarely', 'Never'])->nullable();
            $table->enum('communication_citizens_municipality', ['Excellent', 'Good', 'Average', 'Poor'])->nullable();
            $table->json('most_critical_issues')->nullable();
            $table->text('additional_suggestions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
