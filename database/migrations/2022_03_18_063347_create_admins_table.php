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
        
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('adminName');
            $table->string('profileImg');
            $table->string('adminRole');
            $table->timestamps();
        });

           
        DB::table('admins')->insert([
             'adminName' => 'Super Admin',
             'profileImg' => 'noimage.jpg',
             'adminRole' =>'super' ,
         ]);

         DB::table('admins')->insert([
             'adminName' => 'Educ Mgr',
             'profileImg' => 'noimage.jpg',
             'adminRole' =>'educmgr' ,
         ]);
         DB::table('admins')->insert([
             'adminName' => 'PRadmin Admin',
             'profileImg' => 'noimage.jpg',
             'adminRole' =>'pradmin' ,
         ]);
         DB::table('admins')->insert([
             'adminName' => 'Member Admin',
             'profileImg' => 'noimage.jpg',
             'adminRole' =>'memberadmin' ,
         ]);
         DB::table('admins')->insert([
             'adminName' => 'Finance Admin',
             'profileImg' => 'noimage.jpg',
             'adminRole' =>'financemgr' ,
         ]);
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};