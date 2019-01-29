<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("status");
            $table->string("dataDeinicio");
            $table->string("dataDetermino");
            $table->integer("idDocliente")->unsigned()->nullable();
            $table->integer("idDolivro")->unsigned()->nullable();
            $table->timestamps();
        });
         /**Definição da chave estrangeira*/

        Schema::table("emprestimos",function(Blueprint $table){
        $table->foreign("idDocliente")->references("id")->on("clientes")->onDelete("set null");

        $table->foreign("idDolivro")->references("id")->on("livros")->onDelete("set null");
        
        });
    }
    

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
}
