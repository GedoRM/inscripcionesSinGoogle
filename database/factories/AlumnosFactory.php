<?php

namespace Database\Factories;

use App\Models\Alumnos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlumnosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumnos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'apePaterno' => $this->faker->lastName,
            'apeMaterno' => $this->faker->lastName, 
            'nombre' => $this->faker->name, 
            'edad' => $this->faker->randomDigit, 
            'fechaNacimiento' => $this->faker->date($format = 'Y-m-d', $max = 'now'), 
            'curp' => Str::random(10), 
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
            'idTipoBeca' => "1",
            'idPromedio' => "1",
            'idDependencia' => "1",
            'idPorcentaje' => "1",
            'termyCond' => "Pendiente",
            'correoInstitucional' => "prueba@itecmagistratus.edu.mx",
            'fechaRegistro' => $this->faker->date('Y-m-d', 'now'),
        ];
    }
}
