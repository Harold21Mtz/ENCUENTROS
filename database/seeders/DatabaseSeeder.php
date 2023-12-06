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
            'user_image' => 'byron.jpg',
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
            'user_image' => 'anderson.jpg',
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
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('hotels')->insert([
            'hotel_name' => 'Hotel Tarigua',
            'hotel_description' => '
            This hotel is located in Ocaña, 20 minutes by car from the Agua Claras airport. It offers cozy rooms with a modern decoration, daily breakfast buffet, and free Wi-Fi connection.
            The Hotel Tarigua Ocaña has practical rooms with TV, minibar, and private bathroom with shower.
            The hotels restaurant prepares regional dishes.
            The Ocaña bus terminal is 15 minutes away by car and the Sanctuary of virgin of Torcoroma is 30 minutes away by car. Free private parking is available.',
            'hotel_contact_number' => '(+57) (037) 5625424',
            'hotel_contact_email' => '',
            'hotel_image' => 'tarigua.jpg',
            'hotel_image_secondary_one' => 'tarigua1.jpg',
            'hotel_image_secondary_two' => 'tarigua2.jpg',
            'hotel_image_secondary_three' => 'tarigua3.jpg',
            'hotel_location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1396.0668751393334!2d-73.35612796477288!3d8.235557784208323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e677beead52fa9d%3A0x3291d878aae0d5!2sHotel%20Tarigua%20Oca%C3%B1a!5e0!3m2!1ses!2sco!4v1701802987769!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('hotels')->insert([
            'hotel_name' => 'Hotel San Agustín Plaza Hotel',
            'hotel_description' => '
            San Agustín Plaza Hotel is located in the central part of the municipality of Ocaña. The hotel has 28 rooms and a main suite with jacuzzi, all equipped with air conditioning, safety box, mini bar, telephone, private bathroom, cable TV and Wi-Fi connection, as well as a parking lot to make your stay in our hotel as comfortable and welcoming as possible.
            In its facilities, we find a comfortable and sophisticated restaurant of regional and international food, as well as a conference room with capacity for 60 people and a bar that offers national drinks and special cocktails.',
            'hotel_contact_number' => '(+57) (037) 5697399',
            'hotel_contact_email' => 'recepecionsaph@gmail.com',
            'hotel_image' => 'sanagustin.jpg',
            'hotel_image_secondary_one' => 'sanagustin1.jpg',
            'hotel_image_secondary_two' => 'sanagustin2.jpg',
            'hotel_image_secondary_three' => 'sanagustin3.jpg',
            'hotel_location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15794.517938300336!2d-73.37270804421215!3d8.2399610152491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e677b9c77a61ea1%3A0x117a117bdb2735ca!2sSan%20Agustin%20Plaza%20Hotel!5e0!3m2!1ses!2sco!4v1701802926488!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('hotels')->insert([
            'hotel_name' => 'Hotel Hacaritama',
            'hotel_description' => '
            The Hotel Hacaritama is located in the central part of the municipality of Ocaña and offers a shared living room. The establishment has a restaurant, 24-hour reception, room service and free Wi-Fi connection in all the facilities. Private parking is available for an extra charge.
            All rooms are equipped with a closet. The rooms of the Hotel Hacaritama have a desk, flat-screen TV, and private bathroom.
            Every morning a continental breakfast and a buffet breakfast are served.
            The Hacaritama Hotel offers ironing service and business facilities such as fax and photocopier.',
            'hotel_contact_number' => '57) (037) 5690580',
            'hotel_contact_email' => 'hotelhacaritama@hotmail.com',
            'hotel_image' => 'hacaritama.jpg',
            'hotel_image_secondary_one' => 'hacaritama1.jpg',
            'hotel_image_secondary_two' => 'hacaritama2.jpg',
            'hotel_image_secondary_three' => 'hacaritama3.jpg',
            'hotel_location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15794.685461788313!2d-73.37277774421749!3d8.235763515683137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e677bec67db8841%3A0x4f85516c649b5527!2sHotel%20Hacaritama!5e0!3m2!1ses!2sco!4v1701803119657!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('topics')->insert([
            'program_name' => 'Civil Engineering',
            'program_description' => 'The mission of the Civil Engineering program at the Universidad Francisco de Paula Santander Ocaña is to train professionals integrally, emphasizing ethical and humanistic values. With a focus on sustainable development, it seeks graduates to lead engineering projects addressing social and ethical challenges. The vision of the program is to be a regional leader, with outstanding graduates for their academic excellence, commitment to sustainability and ability to play diverse roles in projects, contributing to regional development in a responsible manner.',
            'program_topics' => 'Geophysical Applications in Geotechnics.
            Disaster Risk Management.
            Reliability and optimization methods.
            Numerical modeling in civil engineering problems.
            Finite element analysis applied to civil engineering.
            Sustainable materials and eco-materials.
            Sustainable construction in wood and alternative systems.
            Transportation engineering.
            Road safety.
            Externalities.
            Pavements.
            Uncertainty quantification.
            Experimental analysis.
            Numerical simulation.
            Fracture mechanics.',
            'program_image' => 'civil.jpeg',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('topics')->insert([
            'program_name' => 'Mechanical Engineering',
            'program_description' => 'The Mechanical Engineering program at the Universidad Francisco de Paula Santander Ocaña seeks to train ethical and creative professionals with solid knowledge in the design of mechanical systems, manufacturing processes and automation. The mission is to develop technical and humanistic competencies in students so that they can perform as socially committed professionals. The vision of the program is to position itself as a driver of development in the province of Ocaña, training graduates to lead projects that generate welfare in the community and industry, offering innovative solutions to current challenges.',
            'program_topics' => 'Energy efficiency and renewable energy.
            Manufacturing processes and industrial maintenance.
            Transport phenomena and thermal systems.
            Materials engineering and mechanical systems design.
            Industrial automation and control.
            Electronics and robotics.
            Computational fluid dynamics (CFD).',
            'program_image' => 'mecanica.jpeg',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('topics')->insert([
            'program_name' => 'Computer Systems Engineering',
            'program_description' => 'The Systems Engineering program seeks to train integral professionals in Engineering, Computer Science, Software Engineering and IT Infrastructure. With a solid technical and humanistic base, students are prepared to address current problems and future needs of the region in the information society. The vision is to lead regionally in Computer Science, Software Engineering and IT Infrastructure through knowledge management and research, promoting human, scientific and technological development. The program aspires that its graduates stand out not only for their technical expertise, but also for their deep understanding of ethical and humanistic aspects, contributing to the global advancement of these disciplines.',
            'program_topics' => 'Artificial intelligence, machine learning, deep learning.
            Big data, data mining and internet of things.
            Mobile computing.
            Educational computing.
            Software engineering.
            Computer networks, cloud computing, security and telecommunications.
            IT governance.
            Advances in computer science and information technology.',
            'program_image' => 'sistemas.jpeg',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('dates')->insert([
            'date_name' => 'Primera fecha',
            'date_important' => 'September 15th:',
            'date_description' => 'Deadline for abstract submission.',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('dates')->insert([
            'date_name' => 'Segunda fecha',
            'date_important' => 'September 25th:',
            'date_description' => 'Deadline for notification of acceptance / rejection of abstracts',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('dates')->insert([
            'date_name' => 'Tercera fecha',
            'date_important' => 'October 9th:',
            'date_description' => 'Deadline for registration',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('dates')->insert([
            'date_name' => 'Cuarta fecha',
            'date_important' => 'October 20th: ',
            'date_description' => 'Deadline for submission to a journal',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('submissions')->insert([
            'submission_conference' => 'Participation in the X International Meeting on Technological Innovation will be through oral presentations, for which a summary of the research must be presented. The results to be disseminated in the oral presentations correspond to ongoing or completed research.',
            'submission_structure' => 'title, introduction, objectives, methodology, results, conclusions and references.',
            'submission_description' => 'Abstract submission is available from August 01, 2023 to September 15th, 2023, 23:59pm. Abstracts should be submitted via email encuentrointit@ufpso.edu.co, in Word text format (.doc or .docx), with a limit of 250 words, should not contain abbreviations, bibliographic references, or unknown characters. If acronyms or abbreviations appear in the abstract, they must be defined. It should state what was done, how it was done, the main results and their significance. All abstracts should be sent in Spanish or English, and authors will be notified by e-mail immediately upon receipt. All abstracts will be evaluated by the Scientific Committee of the event and the acceptance/rejection status will be issued via email to the authors (deadline for notification of status is September 25, 2023).',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('publishings')->insert([
            'name_journal' => 'Revista Ingenio',
            'image_journal' => 'ingenio.jpeg',
            'link_journal' => 'https://revistas.ufps.edu.co/index.php/ingenio/about/submissions',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('publishings')->insert([
            'name_journal' => 'Revista Ingeniare',
            'image_journal' => 'ingeniare.jpeg',
            'link_journal' => 'https://revistas.unilibre.edu.co/index.php/ingeniare/direcAutor',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('publishings')->insert([
            'name_journal' => 'Revista Mundo FESC',
            'image_journal' => 'mundofesc.jpeg',
            'link_journal' => 'https://www.fesc.edu.co/Revistas/OJS/index.php/mundofesc/about/submissions',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('publishings')->insert([
            'name_journal' => 'Revista Colombiana de Tecnologías de Avanzada',
            'image_journal' => 'RevistaColombiana',
            'link_journal' => 'https://www.unipamplona.edu.co/unipamplona/portalIG/home_40/recursos/01_general/07102011/la_revista.jsp',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('publishings')->insert([
            'name_journal' => 'IOP Conference Series website.',
            'image_journal' => 'Hola',
            'link_journal' => 'https://publishingsupport.iopscience.iop.org/author-guidelines-for-conference-proceedings/',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('instructions')->insert([
            'instruction_conference' => 'The X International Meeting on Technological Innovation will be held on october 11, 12 and 13 de 2023, in person and some central conferences will be virtual. All presentations will be transmitted live through the social networks of the organizing institution.',
            'instruction_description' => 'It is important to inform that the corresponding author of each research work approved by the congress must make the oral presentation in real time, for this it is important that all authors make the corresponding presentation using the template in Power Point format on the established date according to the following indications: oral presentation 15 minutes, followed by a round of questions of 5 minutes. You can check in the Schedule for oral presentations the date and time that correspond to you, specifically in the Scientific Program section.',
            'instruction_aspects' =>
            'Papers should address theoretical, numerical aspects and/or practical applications related to the topic of interest.
            There is no limit for author submissions, but there is a limit for paper submissions established in each of the journals.
            When submitting your abstract, you should indicate whether you wish to submit your article and select the journal that best suits the scope of your paper.
            Articles must comply with the editorial policies of each journal.
            All slides must be in English or Spanish.
            The organizing committee will inform the date and time of the presentation.
            The participation of at least one author during the question session is mandatory to ensure the publication of the paper in the conference proceedings and the issuance of the digital presentation certificate.
            Check if there is a logo in the presentation that may conflict with the sponsors of the event.
            To avoid non-presentation during the X International Meeting on Innovation, only papers that have been presented orally will be published in the conference proceedings.
            ',
            'status' => '1',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('scientificprogram')->insert([
            'name_program' => 'Computer Systems Engineering',
            'date_presentation' => 'Wednesday, october 11th',
            'hour_presentation' => '*07:30 am.
            *08:00 am - 09:00 am.
            *09:00 am - 10:00 am.
            *10:00 am - 10:15 am.
            *10:15 am - 11:15 am.
            *11:15 am - 12:15 pm.
            *02:00 pm - 03:00 pm.',
            'activity' => 'Opening
            Remarks by MSc. Edgar Antonio Sanchez
            Director of the University Francisco de Paula Santander Ocaña
            Intonation of the Colombian anthem
            Intonation of the hymn of the University.
            *Presentation: "Automatic print shop recognition from incunabula typography using artificial intelligence techniques"
            Javier Lacasta Miguel, PhD, Universidad de Zaragoza - España
            *Presentation: "Network management trends"
            Francisco Vásquez Guzmán, MSc, Instituto Tecnológico de Tehuacán - México.
            *REST TIME.
            *Presentation: "Gamification as a teaching strategy to improve the learning experience of object-oriented programming at the TecNM Tehuacán campus"
            Liliana Elena Olguín Gil, MSc, Instituo Tecnologico de Tehuacán - México.
            *Presentation: "Data Mining in the Moodle Platform of the Instituto Tecnológico de Tehuacán"
            Eduardo Vásquez Zayas, MSc, Instituto Tecnológico de Tehuacán - México.
            *Presentation: "User Experience and Awareness"
            Juan Enrique Garrido Navarro, PhD. Universitat de Lleida - España.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);


        DB::table('scientificprogram')->insert([
            'name_program' => 'Mechanical Engineering',
            'date_presentation' => 'Thursday, october 12th',
            'hour_presentation' => '*07:50 am.
            *08:00 am - 09:00 am.
            *09:00 am - 10:00 am.
            *10:00 am - 10:15 am.
            *10:15 am - 11:15 am.
            *11:15 am - 12:15 pm.',
            'activity' => 'Opening
            Remarks by MSc. Edgar Antonio Sanchez
            Director of the University Francisco de Paula Santander Ocaña
            Intonation of the Colombian anthem
            Intonation of the hymn of the University.
            *Presentation: "Use of emerging technologies in mechanical engineering"
            Lina Marcela Hoyos Palacio, PhD, Universidad Pontificia Bolivariana - Colombia.
            *Presentation: "Hydrodynamic cavitation as an alternative for the disinfection of wastewater discharges"
            Frank Carlos Vargas Tangua, MSc. Universidad de San Gil - Colombia.
            *REST TIME.
            *Presentation: "Artificial Intelligence and Intelligent Systems Applied to Agricultural Processes"
            Elmer Alexis Gamboa Peñaloza, PhD. Universidad Federal de Pelotas - Brasil.
            *Presentation: "Challenges of Technological Innovation in the Face of Sustainable Development: Remaking the Technosphere"
            Guadalupe Juliana Gutiérrez Paredes, PhD. Instituto Politécnico Nacional – México.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificprogram')->insert([
            'name_program' => 'Civil Engineering',
            'date_presentation' => 'Friday, october 13th',
            'hour_presentation' => '*07:30 am.
            *08:00 am - 08:50 am.
            *08:50 am - 09:40 am.
            *09:40 am - 10:30 am.
            *10:30 am - 10:40 am.
            *10:40 am - 11:30 pm.
            *11:30 am - 12:20 pm.',
            'activity' => 'Opening
            Remarks by MSc. Edgar Antonio Sanchez
            Director of the University Francisco de Paula Santander Ocaña
            Intonation of the Colombian anthem
            Intonation of the hymn of the University.
            *Presentation: "Integral analysis of the coupling between Reverse Osmosis Seawater Desalination and Salt Gradient Energy produced by Pressure Delayed Osmosis in the context of the Colombian Caribbean"
            Anggie Cala Barceló, MSc. Universidad del Norte - Colombia.
            *Presentation: "The theory of concentrated damage. Internationalization of a Latin American scientific development"
            Julio Flórez López, PhD. Universidad de Chongqing - China.
            *Presentation: "Calibration of Fatigue Models through accelerated pavement testing"
            Luis Guillermo Loria Salazar, PhD. Universidad Isaac Newton - Costa Rica.
            *REST TIME.
            *Presentation: "Geotechnical construction methods (excavation and grouting) for the correction of differential settlement in the subsoil of the Cathedral of Mexico City"
            Oscar Andrés Cuanalo Campos, PhD. , Universidad Popular Autónoma del Estado de Puebla - México.
            *Presentation: "Development of Process Alternatives for the Recovery and Utilization of Metals and Other Components from Wastewater from an Agrochemical Industry"
            Ricardo Luis Mejía Marcherna, PhD. Universidad del Norte - Colombia.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificprograms')->insert([
            'name_program' => 'Computer Systems Engineering',
            'date_presentation' => 'Wednesday, september 7th',
            'hour_presentation' => '*02:00 pm - 05:00 pm Grupo A.
            *05:00 pm - 08:00 pm Grupo B.',
            'activity' => '*Presentation: "Internet de las Cosas: oportunidad para impulsar el desarrollo regional"
            Edinsson Javier Landazábal Hernández, MSc
            José Yon Frans García Herrera, MSc – Bucaramanga.
            *Presentation: "Internet de las Cosas: oportunidad para impulsar el desarrollo regional"
            Edinsson Javier Landazábal Hernández, MSc
            José Yon Frans García Herrera, MSc – Bucaramanga.
            ',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificprograms')->insert([
            'name_program' => 'Computer Systems Engineering',
            'date_presentation' => 'Thursday, september 8th',
            'hour_presentation' => '*08:00 am - 11:00 am Grupo A.
            *02:00 pm - 05:00 pm Grupo B.
            *08:00 am - 11:00 am Grupo A.
            *02:00 pm - 05:00 pm Grupo B.
            *08:00 am - 11:00 am Grupo A.
            *02:00 pm - 05:00 pm Grupo B.',
            'activity' => '*Presentation: "Diseña, construye y programa tu propio robot (CoPRo)"
            Harold Alberto Rodríguez Arias, PhD (c) – Cartagena.
            *Presentation: "Diseña, construye y programa tu propio robot (CoPRo)"
            Harold Alberto Rodríguez Arias, PhD (c) – Cartagena.
            *Presentation: "Introducción práctica al hacking ético"
            Luis Armando Gaona Páez, Esp (C) – Medellín.
            *Presentation: "Introducción práctica al hacking ético"
            Luis Armando Gaona Páez, Esp (C) – Medellín.
            *Presentation: "Introducción al Desarrollo de Videojuegos"
            Santiago Echeverri Escobar – Medellín.
            *Presentation: "Introducción al Desarrollo de Videojuegos"
            Santiago Echeverri Escobar – Medellín.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);
    }

    
}
