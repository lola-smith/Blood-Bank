<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationOrdersTable extends Migration {

	public function up()
	{
		Schema::create('donation_orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('patient_name');
			$table->integer('patient_age');
			$table->integer('bags_number');
			$table->integer('blood_type_id')->unsigned();
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->string('patient_phone');
			$table->integer('city_id')->unsigned();
			$table->integer('client_id')->unsigned();
			$table->text('notes');
			$table->decimal('longitude', 10,8);
			$table->decimal('latitude', 10,8);
		});
	}

	public function down()
	{
		Schema::drop('donation_orders');
	}
}