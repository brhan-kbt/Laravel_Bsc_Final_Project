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
       Schema::create('user_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('userType');
           
             $table->foreignId('member_id')
                             ->constrained()
                            ->onUpdate('cascade')
                            ->onDelete('cascade');

            $table->foreignId('admin_id')
                            ->constrained()
                            ->onUpdate('cascade')
                            ->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

           
        DB::table('user_accounts')->insert([
             'username' => 'superAdmin',
             'password' => Hash::make('superAdmin'),
             'userType' =>'super' ,
             'member_id' =>'0' ,
             'admin_id' =>'1' ,
         ]);

         DB::table('user_accounts')->insert([
             'username' => 'educmgr',
             'password' => Hash::make('educmgr'),
             'userType' =>'educmgr' ,
             'member_id' =>'0' ,
             'admin_id' =>'2' ,
         ]);

         DB::table('user_accounts')->insert([
             'username' => 'pradmin',
             'password' => Hash::make('pradmin'),
             'userType' =>'pradmin' ,
             'member_id' =>'0' ,
             'admin_id' =>'3' ,
         ]);

         DB::table('user_accounts')->insert([
             'username' => 'memberadmin',
             'password' => Hash::make('memberadmin'),
             'userType' =>'memberadmin' ,
             'member_id' =>'0' ,
             'admin_id' =>'4' ,
         ]);

         DB::table('user_accounts')->insert([
             'username' => 'financemgr',
             'password' => Hash::make('financemgr'),
             'userType' =>'financemgr' ,
             'member_id' =>'0' ,
             'admin_id' =>'5' ,
         ]);

         DB::table('user_accounts')->insert([
             'username' => 'memberOne',
             'password' => Hash::make('memberOne'),
             'userType' =>'member' ,
             'member_id' =>'1' ,
             'admin_id' =>'0' ,
         ]);

   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_accounts');
    }
};