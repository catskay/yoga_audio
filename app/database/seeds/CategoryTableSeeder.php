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
            'audio_index'    => 'none',
        ));


        $cat = Category::where('cname','=','Health and Restoration')->first();
        $currid = $cat->cid;

        Subcategory::create(array(
            'sname'     => 'Healing after surgery, injury',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));

        Subcategory::create(array(
            'sname'     => 'Preparation for, during, and after chemotherapy, surgery, and other medical procedures',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));

        Subcategory::create(array(
            'sname'     => 'Accepting Illness',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));

        Subcategory::create(array(
            'sname'     => 'Energy and Vitality',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));

        Subcategory::create(array(
            'sname'     => 'Exercising Brain and Attention (for Alzheimer’s, Dementia, and ADHD)',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));



        Category::create(array(
            'cname'     => 'Yoga Nidra for Kids',
            'audio_index'    => 'none',
        ));

        Category::create(array(
            'cname'     => 'Stress',
            'audio_index'    => 'none',
        ));



        $cat = Category::where('cname','=','Stress')->first();
        $currid = $cat->cid;

        Subcategory::create(array(
            'sname'     => 'Overwork Burnout/Adrenal Fatigue',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));

        Subcategory::create(array(
            'sname'     => 'Worry',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));

        Subcategory::create(array(
            'sname'     => 'Relationships',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));




        Category::create(array(
            'cname'     => 'Anti-Aging',
            'audio_index'    => 'none',
        ));

        Category::create(array(
            'cname'     => 'Insomnia/Restful Sleep',
            'audio_index'    => 'none',
        ));

        Category::create(array(
            'cname'     => 'Chronic Pain',
            'audio_index'    => 'none',
        ));

        Category::create(array(
            'cname'     => 'Habits and Addictions',
            'audio_index'    => 'none',
        ));



        $cat = Category::where('cname','=','Habits and Addictions')->first();
        $currid = $cat->cid;

        Subcategory::create(array(
            'sname'     => 'Smoking',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));

        Subcategory::create(array(
            'sname'     => 'Overeating',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));




        Category::create(array(
            'cname'     => 'Emotions',
            'audio_index'    => 'none',
        ));



        $cat = Category::where('cname','=','Emotions')->first();
        $currid = $cat->cid;

        Subcategory::create(array(
            'sname'     => 'Resolving Inner Conflict',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));

        Subcategory::create(array(
            'sname'     => 'Depression',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));

        Subcategory::create(array(
            'sname'     => 'Anxiety',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));

        Subcategory::create(array(
            'sname'     => 'Self-Acceptance/Self-Esteem',
            'audio_index'    => 'none',
            'cid'	=>	$currid,
        ));




        Category::create(array(
            'cname'     => 'Short and Seated Experiences',
            'audio_index'    => 'none',
        ));

        Category::create(array(
            'cname'     => 'Spiritual Development',
            'audio_index'    => 'none',
        ));
	}

}
