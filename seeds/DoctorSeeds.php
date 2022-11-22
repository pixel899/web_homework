<?php


use Phinx\Seed\AbstractSeed;

class DoctorSeeds extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
	   $data = [
		[
		'name' => 'Федор',
		'surname' => 'Симонов',
		'position' => 'Терапевт',
		],
		[
		'name' => 'Василий',
		'surname' => 'Пономарев',
		'position' => 'Терапевт',
		],
		[
		'name' => 'Дмитрий',
		'surname' => 'Овчинников',
		'position' => 'Отоларинголог',
		],
	];
	
	$user = $this->table('doctor');
        $user->insert($data)
        
              ->save();
    }
}
