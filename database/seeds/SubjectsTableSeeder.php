<?php

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
        	[
        		'name' => 'introduction to calculus',
        		'code' => 'math101',
        	],
        	[
        		'name' => 'general chemistry 1',
        		'code' => 'chem101',
        	],
        	[
        		'name' => 'introduction to workplace english',
        		'code' => 'eng101',
        	],
        	[
        		'name' => 'national service training program 1',
        		'code' => 'nstp101',
        	],
        	[
        		'name' => 'physical education 1',
        		'code' => 'pe101',
        	],
        	[
        		'name' => 'national service training program 2',
        		'code' => 'nstp102',
        	],
        	[
        		'name' => 'college trigonometry',
        		'code' => 'math102',
        	],
        	[
        		'name' => 'geometry and solid mensuration',
        		'code' => 'math103',
        	],
        	[
        		'name' => 'physical education 2',
        		'code' => 'pe102',
        	],
        	[
        		'name' => 'general chemistry 2',
        		'code' => 'chem102',
        	],
        	[
        		'name' => 'introduction to general physics',
        		'code' => 'phys101',
        	],
        	[
        		'name' => 'introduction to thermodynamics',
        		'code' => 'phys102',
        	],
        	[
        		'name' => 'introduction to c++ programming',
        		'code' => 'prog101',
        	],
        	[
        		'name' => 'introduction to c++ programming laboratory',
        		'code' => 'prog101l',
        	],
        	[
        		'name' => 'introduction to general physics laboratory',
        		'code' => 'phys101l',
        	],
        	[
        		'name' => 'introduction to thermodynamics laboratory',
        		'code' => 'phys102l',
        	],
        ];

        foreach($subjects as $subject) {
        	$subject['slug'] = str_slug($subject['name']);
        	Subject::firstOrCreate($subject);
        }
    }
}
