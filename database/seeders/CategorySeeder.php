<?php

namespace Database\Seeders;

use App\Repositories\CategoryRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(CategoryRepository $categoryRepo)
    {
        $categories = [
            ['title' => 'Agriculture', 'status_id' => status_active_id()],
            ['title' => 'Arts', 'status_id' => status_active_id()],
            ['title' => 'Basic Medical Science', 'status_id' => status_active_id()],
            ['title' => 'Business', 'status_id' => status_active_id()],
            ['title' => 'Education', 'status_id' => status_active_id()],
            ['title' => 'Engineering', 'status_id' => status_active_id()],
            ['title' => 'Environmental Science', 'status_id' => status_active_id()],
            ['title' => 'Health Science', 'status_id' => status_active_id()],
            ['title' => 'Technology', 'status_id' => status_active_id()],
            ['title' => 'Law', 'status_id' => status_active_id()],
            ['title' => 'Management Science', 'status_id' => status_active_id()],
            ['title' => 'Medicine', 'status_id' => status_active_id()],
            ['title' => 'Pharmaceutical Science', 'status_id' => status_active_id()],
            ['title' => 'Physical Science', 'status_id' => status_active_id()],
            ['title' => 'Social Science', 'status_id' => status_active_id()],
        ];

        foreach ($categories as $category) {
            $categoryRepo->create($category);
        }
    }
}
