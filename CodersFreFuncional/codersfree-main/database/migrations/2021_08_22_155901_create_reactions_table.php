<?php

use App\Models\Reaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('reactions', function (Blueprint $table) {
      $table->id();

      $table->enum('value', [Reaction::LIKE, Reaction::DISLIKE]);

      $table->unsignedBigInteger('reactionable_id');
      $table->string('reactionable_type');

      $table->unsignedBigInteger('user_id')->nullable();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

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
    Schema::dropIfExists('reactions');
  }
}
