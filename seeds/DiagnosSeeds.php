<?php


use Phinx\Seed\AbstractSeed;

class DiagnosSeeds extends AbstractSeed
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
		'title' => 'Остеохондроз',
	      ],
	      [
	      	'title' => 'Палеоменит',
	      ],
	      [
	      	'title' => 'Цирроз печени',
	      ],
	      [
	      	'title' => 'Остеоартроз',
	      ],
	      [
	      	'title' => 'Cпондилез',
	      ],
	      [
	      	'title' => 'Хронический холецистит',
	      ],
	      [
	      	'title' => 'Ревматизм',
	      ],
	      [
	      	'title' => 'Полиневропатия',
	      ],
	      [
	      	'title' => 'Сахарный диабет',
	      ]
	];
	
	$user = $this->table('diagnos');
        $user->insert($data)
              ->save();
	}
}
