<?php

namespace Database\Seeders;
use App\Models\Alumnos;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Alumnos::factory(1)->create();
       /* $alumno = new Alumnos();

        $alumno->apePaterno = "Romero";
            $alumno->apeMaterno = "Medina"; 
            $alumno->nombre = "Gerardo Enrique";
            $alumno->edad = "26";
            $alumno->fechaNacimiento = "1994-07-31";
            $alumno->curp = "ROMG940731HCCMDR07";
            $alumno->sexo = "Masculino";
            $alumno->calle = "Prolongación galeana";
            $alumno->numCalle = "49A";
            $alumno->colonia = "San Rafael";
            $alumno->telFijo = ""; 
            $alumno->telCelular = "9811306385";
            $alumno->correoAlumno = "gedoromero@gmail.com";
            $alumno->escEgreso = "Instituto Tecnológico de Campeche";
            $alumno->generacion = "2012-2017";
            $alumno->promedioEgreso = "8.0";
            $alumno->nombreTutor = "Carlos";
            $alumno->parentescoTutor = "papá";   
            $alumno->domicilioTutor = "mismo";
            $alumno->telTutor = "9811306385";
           /* $alumno->idMunicipio = "1";
            $alumno->idPeriodo = "1";
            $alumno->idPrograma = "1";
            $alumno->idModalidad = "1";
            
            $alumno->save();
            
            'apePaterno' => $this->faker->lastName,
            'apeMaterno' => $this->faker->lastName, 
            'nombre' => $this->faker->name, 
            'edad' => $this->faker->randomDigit, 
            'fechaNacimiento' => $this->faker->date($format = 'Y-m-d', $max = 'now'), 
            'curp' => $this->faker->str_random(10), 
            'sexo' => $this->faker->randomElement(['masculino', 'femenino']), 
            'calle' => $this->faker->streetName, 
            'numCalle' => $this->faker->randomDigit,
            'colonia' => $this->faker->state, 
            'telFijo' => $this->faker->tollFreePhoneNumber, 
            'telCelular' => $this->faker->tollFreePhoneNumber, 
            'correoAlumno' => $this->faker->safeEmail, 
            'escEgreso' => $this->faker->word, 
            'generacion' => $this->faker->randomElement(['2001-2004','2007-2010']), 
            'promedioEgreso' => $this->faker->randomDigit, 
            'nombreTutor' => $this->faker->name,
            'parentescoTutor' => $this->faker->randomElement(['Papá', 'Mamá', 'Otro']), 
            'domicilioTutor' => $this->faker->address, 
            'telTutor' => $this->faker->tollFreePhoneNumber, 
            'idMunicipio' => $this->faker->numberBetween($min = 1, $max = 13), 
            'idPeriodo' => $this->faker->randomElement(['1','2','3']), 
            'idPrograma' => $this->faker->randomElement(['1','2']), 
            'idModalidad' => $this->faker->randomElement(['1','2']),
            
            */
    }
}
