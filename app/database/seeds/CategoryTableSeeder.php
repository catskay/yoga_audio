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
            
            'cid'	=>	1,
        ));

        Subcategory::create(array(
            'sname'     => 'Preparation for, during, and after chemotherapy, surgery, and other medical procedures',
            
            'cid'	=>	1,
        ));

        Subcategory::create(array(
            'sname'     => 'Accepting Illness',
            
            'cid'	=>	1,
        ));

        Subcategory::create(array(
            'sname'     => 'Energy and Vitality',
            
            'cid'	=>	1,
        ));

        Subcategory::create(array(
            'sname'     => 'Exercising Brain and Attention (for Alzheimer’s, Dementia, and ADHD)',
            
            'cid'	=>	1,
        ));



        Category::create(array(
            'cname'     => 'Yoga Nidra for Kids',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Yoga Nidra for Kids',
            'cid'   => 2
        ));



        Category::create(array(
            'cname'     => 'Stress',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Overwork Burnout/Adrenal Fatigue',
            
            'cid'	=>	3,
        ));

        Subcategory::create(array(
            'sname'     => 'Worry',
            
            'cid'	=>	3,
        ));

        Subcategory::create(array(
            'sname'     => 'Relationships',
            
            'cid'	=>	3,
        ));




        Category::create(array(
            'cname'     => 'Anti-Aging',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Anti-Aging',
            'cid'    => 4,
        ));



        Category::create(array(
            'cname'     => 'Insomnia/Restful Sleep',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Insomnia/Restful Sleep',
            'cid'    => 5,
        ));



        Category::create(array(
            'cname'     => 'Chronic Pain',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Chronic Pain',
            'cid'    => 6,
        ));



        Category::create(array(
            'cname'     => 'Habits and Addictions',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Smoking',
            
            'cid'	=>	7,
        ));

        Subcategory::create(array(
            'sname'     => 'Overeating',
            
            'cid'	=>	7,
        ));




        Category::create(array(
            'cname'     => 'Emotions',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Resolving Inner Conflict',
            
            'cid'	=>	8,
        ));

        Subcategory::create(array(
            'sname'     => 'Depression',
            
            'cid'	=>	8,
        ));

        Subcategory::create(array(
            'sname'     => 'Anxiety',
            
            'cid'	=>	8,
        ));

        Subcategory::create(array(
            'sname'     => 'Self-Acceptance/Self-Esteem',
            
            'cid'	=>	8,
        ));




        Category::create(array(
            'cname'     => 'Short and Seated Experiences',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Short and Seated Experiences',
            'cid'    => 9,
        ));



        Category::create(array(
            'cname'     => 'Spiritual Development',
            
        ));

        Subcategory::create(array(
            'sname'     => 'Spiritual Development',
            'cid'    => 10,
        ));
	}

}
