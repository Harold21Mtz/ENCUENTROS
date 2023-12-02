<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_profile' => 'administrator',
            'user_status' => 1,
            'name' => 'Harold Martinez',
            'email' => 'hfmc21@gmail.com',
            'password' => Hash::make('hfmc12345'),
            'email_verified_at' => Date::now(),
            'password_created_or_updated_at' => Date::now(),
            'user_session_attempts' => 1,
        ]);

        DB::table('users')->insert([
            'user_profile' => 'sub_administrator',
            'user_status' => 1,
            'name' => 'Andres Pacheco',
            'email' => 'andrespacheco@gmail.com',
            'password' => Hash::make('andres12345'),
            'email_verified_at' => Date::now(),
            'password_created_or_updated_at' => Date::now(),
            'user_session_attempts' => 1,
        ]);

        DB::table('configurations')->insert([
            'configuration_maintenance' => '0',
            'registerBy' => 'Harold',
        ]);

        DB::table('hotels')->insert([
            'hotel_name' => 'Tarigua',
            'hotel_description' => 'Cerca al parque',
            'hotel_contact_number' => '3112884010',
            'hotel_contact_email' => 'hfmc22@gmail.com',
            'hotel_image' => 'uploads/tarigua1.jpg',
            'status' => '1',
            'registerBy' => 'Harold',
        ]);

        DB::table('topics')->insert([
            'program_name' => 'Civil Engineering',
            'program_description' => 'The mission of the Civil Engineering program at the Universidad Francisco de Paula Santander Ocaña is to train professionals integrally, emphasizing ethical and humanistic values. With a focus on sustainable development, it seeks graduates to lead engineering projects addressing social and ethical challenges. The vision of the program is to be a regional leader, with outstanding graduates for their academic excellence, commitment to sustainability and ability to play diverse roles in projects, contributing to regional development in a responsible manner.',
            'program_topics' => '
            Geophysical Applications in Geotechnics
            Disaster Risk Management
            Reliability and optimization methods
            Numerical modeling in civil engineering problems
            Finite element analysis applied to civil engineering
            Sustainable materials and eco-materials
            Sustainable construction in wood and alternative systems
            Transportation engineering
            Road safety
            Externalities
            Pavements
            Uncertainty quantification
            Experimental analysis
            Numerical simulation
            Fracture mechanics',
            'program_image' => 'uploads/civil.jpeg',
            'status' => '1',
            'registerBy' => 'Harold Martinez',
        ]);

        DB::table('topics')->insert([
            'program_name' => 'Mechanical Engineering',
            'program_description' => 'The Mechanical Engineering program at the Universidad Francisco de Paula Santander Ocaña seeks to train ethical and creative professionals with solid knowledge in the design of mechanical systems, manufacturing processes and automation. The mission is to develop technical and humanistic competencies in students so that they can perform as socially committed professionals. The vision of the program is to position itself as a driver of development in the province of Ocaña, training graduates to lead projects that generate welfare in the community and industry, offering innovative solutions to current challenges.',
            'program_topics' => '
            Energy Efficiency and Renewable Energy
            Manufacturing Processes and Industrial Maintenance
            Transport Phenomena and Thermal Systems
            Materials Engineering and Mechanical Systems Design
            Industrial Automation and Control
            Electronics and Robotics
            Computational Fluid Dynamics (CFD)',
            'program_image' => 'uploads/mecanica.jpeg',
            'status' => '1',
            'registerBy' => 'Harold Martinez',
        ]);

        DB::table('topics')->insert([
            'program_name' => 'Computer Systems Engineering',
            'program_description' => 'The Systems Engineering program seeks to train integral professionals in Engineering, Computer Science, Software Engineering and IT Infrastructure. With a solid technical and humanistic base, students are prepared to address current problems and future needs of the region in the information society. The vision is to lead regionally in Computer Science, Software Engineering and IT Infrastructure through knowledge management and research, promoting human, scientific and technological development. The program aspires that its graduates stand out not only for their technical expertise, but also for their deep understanding of ethical and humanistic aspects, contributing to the global advancement of these disciplines.',
            'program_topics' => '
            Artificial intelligence, Machine learning, Deep learning
            Big data, Data Mining and Internet of Things
            Mobile Computing
            Educational Computing
            Software Engineering
            Computer networks, cloud computing, security and telecommunications
            IT Governance
            Advances in Computer Science and Information Technology
            ',
            'program_image' => 'uploads/sistemas.jpeg',
            'status' => '1',
            'registerBy' => 'Harold Martinez',
        ]);

        DB::table('dates')->insert([
            'date_name' => 'Primera fecha',
            'date_important' => 'September 15th:',
            'date_description' => 'Deadline for abstract submission.',
            'status' => '1',
            'registerBy' => 'Harold Martinez',
        ]);

        DB::table('dates')->insert([
            'date_name' => 'Segunda fecha',
            'date_important' => 'September 25th:',
            'date_description' => 'Deadline for notification of acceptance / rejection of abstracts',
            'status' => '1',
            'registerBy' => 'Harold Martinez',
        ]);

        DB::table('dates')->insert([
            'date_name' => 'Tercera fecha',
            'date_important' => 'October 9th:',
            'date_description' => 'Deadline for registration',
            'status' => '1',
            'registerBy' => 'Harold Martinez',
        ]);

        DB::table('dates')->insert([
            'date_name' => 'Cuarta fecha',
            'date_important' => 'October 20th: ',
            'date_description' => 'Deadline for submission to a journal',
            'status' => '1',
            'registerBy' => 'Harold Martinez',
        ]);

        DB::table('submissions')->insert([
            'submission_conference' => 'Participation in the X International Meeting on Technological Innovation will be through oral presentations, for which a summary of the research must be presented. The results to be disseminated in the oral presentations correspond to ongoing or completed research.',
            'submission_structure' => 'title, introduction, objectives, methodology, results, conclusions and references.',
            'submission_description' => 'Abstract submission is available from August 01, 2023 to September 15th, 2023, 23:59pm. Abstracts should be submitted via email encuentrointit@ufpso.edu.co, in Word text format (.doc or .docx), with a limit of 250 words, should not contain abbreviations, bibliographic references, or unknown characters. If acronyms or abbreviations appear in the abstract, they must be defined. It should state what was done, how it was done, the main results and their significance. All abstracts should be sent in Spanish or English, and authors will be notified by e-mail immediately upon receipt. All abstracts will be evaluated by the Scientific Committee of the event and the acceptance/rejection status will be issued via email to the authors (deadline for notification of status is September 25, 2023).',
            'status' => '1',
            'registerBy' => 'Harold Martinez',
        ]);

    }
}
