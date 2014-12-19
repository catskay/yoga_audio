<?php

class CategoryTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Category::create(array(
            'cname'     => 'Health and Restoration',
            
        ));


        Subcategory::create(array(
            'sname'     => 'Healing after surgery, injury',
            'description' =>  'Description goes here',
            'cid'	=>	1,
        ));

        Subcategory::create(array(
            'sname'     => 'Preparation for, during, and after chemotherapy, surgery, and other medical procedures',
            'description' =>  'Description goes here',
            'cid'	=>	1,
        ));

        Subcategory::create(array(
            'sname'     => 'Accepting Illness',
            'description' =>  'Description goes here',
            'cid'	=>	1,
        ));

        Subcategory::create(array(
            'sname'     => 'Energy and Vitality',
            'description' =>  'Description goes here',
            'cid'	=>	1,
        ));

        Subcategory::create(array(
            'sname'     => 'Exercising Brain and Attention (for Alzheimer’s, Dementia, and ADHD)',
            'description' =>  'Description goes here',
            'cid'	=>	1,
        ));



        Category::create(array(
            'cname'     => 'Yoga Nidra for Kids',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Yoga Nidra for Kids',
            'description' =>  'Description goes here',
            'cid'   => 2
        ));



        Category::create(array(
            'cname'     => 'Stress',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Overwork Burnout/Adrenal Fatigue',
            'description' =>  'Description goes here',
            'cid'	=>	3,
        ));

        Subcategory::create(array(
            'sname'     => 'Worry',
            'description' =>  'Description goes here',
            'cid'	=>	3,
        ));

        Subcategory::create(array(
            'sname'     => 'Relationships',
            'description' =>  'Description goes here',
            'cid'	=>	3,
        ));




        Category::create(array(
            'cname'     => 'Anti-Aging',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Anti-Aging',
            'description' =>  'Description goes here',
            'cid'    => 4,
        ));



        Category::create(array(
            'cname'     => 'Insomnia/Restful Sleep',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Insomnia/Restful Sleep',
            'description' =>  'Description goes here',
            'cid'    => 5,
        ));



        Category::create(array(
            'cname'     => 'Chronic Pain',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Chronic Pain',
            'description' =>  'Description goes here',
            'cid'    => 6,
        ));



        Category::create(array(
            'cname'     => 'Habits and Addictions',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Smoking',
            'description' =>  'Description goes here',
            'cid'	=>	7,
        ));

        Subcategory::create(array(
            'sname'     => 'Overeating',
            'description' =>  'Description goes here',
            'cid'	=>	7,
        ));




        Category::create(array(
            'cname'     => 'Emotions',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Resolving Inner Conflict',
            'description' =>  'Description goes here',
            'cid'	=>	8,
        ));

        Subcategory::create(array(
            'sname'     => 'Depression',
            'description' =>  'Description goes here',
            'cid'	=>	8,
        ));

        Subcategory::create(array(
            'sname'     => 'Anxiety',
            'description' =>  'Description goes here',
            'cid'	=>	8,
        ));

        Subcategory::create(array(
            'sname'     => 'Self-Acceptance/Self-Esteem',
            'description' =>  'Description goes here',
            'cid'	=>	8,
        ));




        Category::create(array(
            'cname'     => 'Short and Seated Experiences',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Short and Seated Experiences',
            'description' =>  'Description goes here',
            'cid'    => 9,
        ));



        Category::create(array(
            'cname'     => 'Spiritual Development',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Spiritual Development',
            'description' =>  'Description goes here',
            'cid'    => 10,
        ));
	}

}
