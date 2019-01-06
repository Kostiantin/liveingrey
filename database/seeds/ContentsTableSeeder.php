<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentsTableSeeder extends Seeder
{

    public static $aContentTexts = [
        0 => [
            'section_id' => '1',
            'text_ref' => 'sign_up_for_our_newsletter',
            'content' => 'SIGN UP FOR OUR NEWSLETTER',
            'label' => 'Header and footer sign up button\'s text',
        ],
        1 => [
            'section_id' => '1',
            'text_ref' => 'we_create_authentic',
            'content' => 'We create authentic workplaces where your people can bring their whole selves to work every day',
            'label' => 'Header slogan',
        ],
        2 => [
            'section_id' => '1',
            'text_ref' => 'live_grey_tag',
            'content' => '#LiveGrey',
            'label' => 'Slogan Tag Text',
        ],
        3 => [
            'section_id' => '1',
            'text_ref' => 'article_header',
            'content' => 'Experience the Life@Work Culture Conference 2018',
            'label' => 'Main article header',
        ],
        4 => [
            'section_id' => '1',
            'text_ref' => 'article_text',
            'content' => 'We had an inspiring group join us for our Life@Work Culture Conference in July 2016. Business and culture thought leaders connected deeply through thought-provoking discussions and community activities in the beautiful Hudson Valley.

Didn\'t make it this year? Email us directly at info@lifeatwork.co to request an invite for 2017. You can also get a taste of the two-day
hands-on learning experience by checking out the photos, and sign up for our newsletter to stay in the loop.',
            'label' => 'Main article text',
    ],
        5 => [
            'section_id' => '1',
            'text_ref' => 'article_button_text',
            'content' => 'RELIVE THE CONFERENCE',
            'label' => 'Main article link text',
        ],
        6 => [
            'section_id' => '2',
            'text_ref' => 'learn_through_experience',
            'content' => 'Learn Through Experience',
            'label' => 'Middle section header',
        ],
        7 => [
            'section_id' => '2',
            'text_ref' => 'our_work_place_text',
            'content' => 'OUR WORKPLACE EXPERIENCES UNLOCK THE PASSION, PURPOSE AND POWER
    THAT KEEP YOUR TEAM INSPIRED AND UNSTOPPABLE.',
            'label' => 'Middle section sub header',
        ],
        8 => [
            'section_id' => '2',
            'text_ref' => 'values_work',
            'content' => 'Values@Work',
            'label' => 'Middle section column 1 header',
        ],
        9 => [
            'section_id' => '2',
            'text_ref' => 'keep_it_real',
            'content' => 'Keep It Real',
            'label' => 'Middle section column 2 header',
        ],
        10 => [
            'section_id' => '2',
            'text_ref' => 'on_purpose',
            'content' => 'On Purpose',
            'label' => 'Middle section column 3 header',
        ],
        11 => [
            'section_id' => '2',
            'text_ref' => 'values_work_description',
            'content' => 'A transformative, hands-on experience that strengthens self-knowledge and teamwork. Discover what matters most to you and your team, and learn how to live those values at work every day.',
            'label' => 'Middle section column 1 text',
        ],
        12 => [
            'section_id' => '2',
            'text_ref' => 'keep_it_real_description',
            'content' => 'A challenging growth experience that strengthens team communication. Vulnerability and empathy become tools for authentic connections, mindful feedback and productive conflict.',
            'label' => 'Middle section column 2 text',
        ],
        13 => [
            'section_id' => '2',
            'text_ref' => 'keep_it_real_sub_text',
            'content' => '* Must be preceded by Values@Work experience.',
            'label' => 'Middle section column 2 sub text',
        ],
        14 => [
            'section_id' => '2',
            'text_ref' => 'on_purpose_description',
            'content' => 'An intimate experience where people dig deep to discover their core purpose, and use it to connect with their work and teammates in meaningful ways.',
            'label' => 'Middle section column 3 text',
        ],
        15 => [
            'section_id' => '2',
            'text_ref' => 'note_from_ceo',
            'content' => 'A note from our CEO',
            'label' => 'CEO header',
        ],
        16 => [
            'section_id' => '2',
            'text_ref' => 'note_from_ceo_text',
            'content' => '"Over the next few months we\'re excited to share the new direction of Live in the Grey. We\'ll be rolling out new workplace experiences, transformational events and a brand new website. Stay tuned!"',
            'label' => 'CEO text',
        ],
        17 => [
            'section_id' => '2',
            'text_ref' => 'name_of_ceo',
            'content' => 'BRAD LANDE',
            'label' => 'CEO name',
        ],
        18 => [
            'section_id' => '3',
            'text_ref' => 'who_we_worked_with',
            'content' => 'Who we worked with',
            'label' => 'Brands header',
        ],
        19 => [
            'section_id' => '3',
            'text_ref' => 'work_with_us',
            'content' => 'Work with us!',
            'label' => 'Footer form header',
        ],
        20 => [
            'section_id' => '3',
            'text_ref' => 'curious_text',
            'content' => 'Curious? We\'d love to connect with you to explore ways we can work together.',
            'label' => 'Footer form sub header',
        ],
        21 => [
            'section_id' => '3',
            'text_ref' => 'footer_slogan',
            'content' => 'LIVE IN THE GREY &copy; 2018',
            'label' => 'Footer copyrights phrase 1',
        ],
        22 => [
            'section_id' => '3',
            'text_ref' => 'design_by',
            'content' => 'DESIGN BY 214',
            'label' => 'Footer copyrights phrase 2',
        ],
];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$aContentTexts as $record) {
            DB::table('contents')->insert([
                'user_id' => 1,
                'section_id' => $record['section_id'],
                'text_ref' => $record['text_ref'],
                'label' => $record['label'],
                'content' => addslashes($record['content']),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
