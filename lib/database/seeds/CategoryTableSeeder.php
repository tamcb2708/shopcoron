<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data=[
    		[
    			'cate_name'=>'quan ao nam',
    			'cate_slug'=>str_slug('quan ao nam')
    		],
    		[
    			'cate_name'=>'quan ao nu',
    			'cate_slug'=>str_slug('quan ao nu')
    		],


    	];
        DB::table('vp-categorys')->insert($data);
    }
}
