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

            $table->tinyInteger('accessibility')->nullable();
            $table->tinyInteger('responsiveness_grievances')->nullable();
            $table->tinyInteger('proactive_step_issues')->nullable();
            $table->tinyInteger('transparent_action_and_decision')->nullable();
            $table->text('suggestions')->nullable();

            $table->tinyInteger('roads_pavements')->nullable();
            $table->tinyInteger('drainage_system')->nullable();
            $table->tinyInteger('waste_management')->nullable();
            $table->tinyInteger('street_lighting')->nullable();
            $table->tinyInteger('parks_public_spaces')->nullable();
            $table->tinyInteger('sanitation_water_supply_adequate')->nullable();
            $table->tinyInteger('feel_safe')->nullable();
            $table->tinyInteger('environmentally_sustainable')->nullable();

            $table->tinyInteger('attended_meeting_drive_event')->nullable();
            $table->tinyInteger('opinions_considered_dev_plans')->nullable();
            $table->tinyInteger('communication_citizens_municipality')->nullable();
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
