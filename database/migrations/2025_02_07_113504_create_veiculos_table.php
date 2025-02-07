use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa', 15)->unique();
            $table->string('modelo', 50);
            $table->string('ano', 4);
            $table->string('cor', 30);
            $table->string('crlv');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('foto5')->nullable();
            $table->string('foto6')->nullable();
            $table->string('tacografo')->nullable();
            $table->string('vistoria')->nullable();
            $table->string('autorizacao_te')->nullable();
            $table->string('certificado_te')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
};
