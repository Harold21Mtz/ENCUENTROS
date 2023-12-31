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
            'name' => 'Andres Pacheco',
            'email' => 'aapachechos@ufpso.edu.co',
            'password' => Hash::make('andres12345'),
            'email_verified_at' => Date::now(),
            'password_created_or_updated_at' => Date::now(),
            'user_session_attempts' => 1,
        ]);

        DB::table('users')->insert([
            'user_profile' => 'sub_administrator',
            'user_image' => 'anderson.jpg',
            'user_status' => 1,
            'name' => 'Harold Martinez',
            'email' => 'hfmartinezc@ufpso.edu.co',
            'password' => Hash::make('harold12345'),
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
            'status' => '0',
            'registerBy' => 'Andres Pacheco',
        ]);

        DB::table('publishings')->insert([
            'name_journal' => 'IOP Conference Series website.',
            'image_journal' => 'Hola',
            'link_journal' => 'https://publishingsupport.iopscience.iop.org/author-guidelines-for-conference-proceedings/',
            'status' => '0',
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

        DB::table('events')->insert([
            'event_title' => 'Cultural Events',
            'event_description_one' => 'The municipality of Ocaña, Norte de Santander is full of popular, religious, and cultural celebrations.',
            'event_description_two' => 'The municaplity was founded on December 14, 1570. Since then, every year it has been commemorated and a parade called Desfile de los Genitores is held, reminding the population of its history. Within its popular festivities are carnivals and beauty pageants, as well as religious festivities such as Semana Santa (Holy Week), the commemoration of the Virgin of Torcoroma, Jesús Cautivo, and La Santa Cruz, among others.',
            'event_image' => '',
            'event_image_one' => '',
            'event_image_two' => '',
            'event_image_three' => '',
            'event_image_four' => '',
            'event_image_five' => '',
            'event_image_six' => '',
            'event_image_seven' => '',
            'event_image_eight' => '',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('events')->insert([
            'event_title' => 'Tourist attractions',
            'event_description_one' => '
            The municipality of Ocaña was built with colonial architecture and is located 230 km from the countrys capital. Also, it is known as the "city of the Caros" because of the birth of José Eusebio Caro; poet, writer, and founder of the Colombian conservative party. Tourism makes Ocaña one of the most popular destinations in the region. Ocaña presents a great number of attractive and historical places that you should not miss; from squares and museums, to churches and natural reserves.',
            'event_description_two' => '
            Ocaña keeps the charm of historical traditions, and the friendliness of its inhabitants makes this municipality a prosperous land where locals and visitors come together.',
            'event_image' => 'Tourist.jpg',
            'event_image_one' => 'Tourist_2.jpg',
            'event_image_two' => 'Tourist_3.jpg',
            'event_image_three' => 'Tourist_4.jpg',
            'event_image_four' => 'Tourist_5.jpg',
            'event_image_five' => 'Tourist_6.jpg',
            'event_image_six' => 'Tourist_7.jpg',
            'event_image_seven' => 'Tourist_8.jpg',
            'event_image_eight' => '',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('events')->insert([
            'event_title' => 'Typical Dishes',
            'event_description_one' => '
            Gastronomy is a differentiating factor of Ocaña to the rest of the department of Norte de Santander-Colombia, since it presents an important number of eye-catching and delicious meals that are hard to forget. The gastronomy of Ocaña is a cultural mixture product of the different influences coming from the different migrations (Arabs, Spanish, Germans, gypsies, and indigenous).',
            'event_description_two' => '
            Among its most relevant dishes are arepa ocañera, Pan ocañero, Cebollitas Ocañeras, Cocotas, Tamal Ocañero,Bolegancho, among others.',
            'event_image' => 'Dishes.jpg',
            'event_image_one' => 'Dishes_2.jpg',
            'event_image_two' => 'Dishes_3.jpg',
            'event_image_three' => 'Dishes_4.jpg',
            'event_image_four' => 'Dishes_5.jpg',
            'event_image_five' => 'Dishes_6.jpg',
            'event_image_six' => 'Dishes_7.jpg',
            'event_image_seven' => 'Dishes_8.jpg',
            'event_image_eight' => 'Dishes_9.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Oscar Andrés Cuanalo Campos',
            'speaker_title' => 'PhD.',
            'speaker_presentation' => 'Presentation: "Geotechnical construction methods (excavation and grouting) for the correction of differential settlement in the subsoil of the Cathedral of Mexico City"',
            'speaker_description' => 'Civil Engineer graduated from the Benemérita Universidad Autónoma de Puebla (BUAP), Master in Engineering in Soil Mechanics from the Universidad Nacional Autónoma de México and Doctor in Sciences from the Construction Department of the Universidad Central de las Villas de Cuba.',
            'speaker_university' => 'Universidad Popular Autónoma del Estado de Puebla - México',
            'speaker_profile' => 'OscarAndresCuanaloCampos.jpeg',
            'speaker_image_country' => 'mexico.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Julio Flórez López',
            'speaker_title' => 'PhD.',
            'speaker_presentation' => 'Presentation: "The theory of concentrated damage. Internationalization of a Latin American scientific development"',
            'speaker_description' => 'D. in Applied Mechanics, University of Paris VI (France), Civil Engineer, Universidad de Los Andes, Venezuela. Since 2021 Full Professor, Chongqing University, China. Visiting Professor, University of Paris-Saclay France, Kyoto University Japan, Universidad Politécnica de Madrid Spain',
            'speaker_university' => 'Universidad de Chongqing - China',
            'speaker_profile' => 'JulioFlorezLopez.jpeg',
            'speaker_image_country' => 'china.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Francisco Vásquez Guzmán',
            'speaker_title' => 'PhD.',
            'speaker_presentation' => 'Presentation: "Network management trends',
            'speaker_description' => 'Masters Degree in Computer Science from Benemérita Universidad Autónoma de Puebla, Bachelors Degree in Computer Science from Instituto Tecnológico de Orizaba',
            'speaker_university' => 'Instituto Tecnológico de Tehuacán - México',
            'speaker_profile' => 'FranciscoVasquezGuzman.jpeg',
            'speaker_image_country' => 'mexico.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Liliana Elena Olguín Gil',
            'speaker_title' => 'MSc.',
            'speaker_presentation' => 'Presentation: "Gamification as a teaching strategy to improve the learning experience of object-oriented programming at the TecNM Tehuacán campus"',
            'speaker_description' => 'Masters degree in Computer Science from Benemérita Universidad Autónoma de Puebla, Bachelors degree in Computer Science from Instituto Tecnológico de Tehuacán, Mexico.',
            'speaker_university' => 'Instituto Tecnológico de Tehuacán - México',
            'speaker_profile' => 'LilianaElenaOlguinGil.jpeg',
            'speaker_image_country' => 'mexico.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Eduardo Vásquez Zayas',
            'speaker_title' => 'MSc.',
            'speaker_presentation' => 'Presentation: "Data Mining in the Moodle Platform of the Instituto Tecnológico de Tehuacán"',
            'speaker_description' => 'Masters Degree in Information Technology from Universidad Interamericana para el Desarrollo Campus Tehuacán, Bachelors Degree in Computer Science from Instituto Tecnológico de Orizaba.',
            'speaker_university' => 'Instituto Tecnológico de Tehuacán - México',
            'speaker_profile' => 'EduardoVasquezZayas.jpeg',
            'speaker_image_country' => 'mexico.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Lina Marcela Hoyos Palacio',
            'speaker_title' => 'PhD.',
            'speaker_presentation' => 'Presentation: "Use of emerging technologies in mechanical engineering"',
            'speaker_description' => 'Chemical Engineer, PhD. Energy and thermodynamics, Expert in nanomaterials.',
            'speaker_university' => 'Universidad Pontificia Bolivariana - Colombia',
            'speaker_profile' => 'LinaMarcelaHoyosPalacio.jpeg',
            'speaker_image_country' => 'colombia.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Anggie Cala Barceló',
            'speaker_title' => 'MSc.',
            'speaker_presentation' => 'Presentation: "Integral analysis of the coupling between Reverse Osmosis Seawater Desalination and Salt Gradient Energy produced by Pressure Delayed Osmosis in the context of the Colombian Caribbean"',
            'speaker_description' => 'Chemical Engineer, Master in Civil Engineering with emphasis in Environmental Engineering with focus on research related to Bioprocesses, Emerging Renewable Energies, water treatment and desalination.',
            'speaker_university' => 'Universidad del Norte - Colombia',
            'speaker_profile' => 'AnggieCalaBarcelo.jpeg',
            'speaker_image_country' => 'colombia.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Javier Lacasta Miguel',
            'speaker_title' => 'PhD.',
            'speaker_presentation' => 'Presentation: "Automatic print shop recognition from incunabula typography using artificial intelligence techniques"',
            'speaker_description' => 'D. in Computer Science, Research Professor and collaborator in the Department of Computer Science and Systems Engineering at the University of Zaragoza. His research work focuses on the field of Knowledge Management applied to Spatial Data. IAAA Research Group (I3A).',
            'speaker_university' => 'Universidad de Zaragoza - España',
            'speaker_profile' => 'JavierLacastaMiguel.jpeg',
            'speaker_image_country' => 'espana.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Frank Carlos Vargas Tangua',
            'speaker_title' => 'MSc.',
            'speaker_presentation' => 'Presentation: "Hydrodynamic cavitation as an alternative for the disinfection of wastewater discharges"',
            'speaker_description' => 'Biologist, Specialist in Environmental Chemistry, Master in Environmental Management, with 21 years of experience in university teaching and 15 years in research processes, 21 years in consulting and advising on environmental and territorial development issues.',
            'speaker_university' => 'Universidad de San Gil - Colombia',
            'speaker_profile' => 'FrankCarlosVargasTangua.jpeg',
            'speaker_image_country' => 'colombia.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Elmer Alexis Gamboa Peñaloza',
            'speaker_title' => 'PhD.',
            'speaker_presentation' => 'Presentation: "Artificial Intelligence and Intelligent Systems Applied to Agricultural Processes"',
            'speaker_description' => 'Electronic Engineer from Universidad Pontificia Bolivariana (Bucaramanga, Colombia) (2005) with a masters degree in Automation and Systems Engineering from Universidade Federal de Santa Catarina (2012) and a PhD in Electrical Engineering, in the area of dynamic systems, from Escola de Engenharias da Universidade de São Paulo (EESC/USP) (2018).',
            'speaker_university' => 'Universidad Federal de Pelotas - Brasil',
            'speaker_profile' => 'ElmerAlexisGamboaPenaloza.jpeg',
            'speaker_image_country' => 'brasil.png',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Ricardo Luis Mejía Marchena',
            'speaker_title' => 'PhD.',
            'speaker_presentation' => 'Presentation: "Development of Process Alternatives for the Recovery and Utilization of Metals and Other Components from Wastewater from an Agrochemical Industry"',
            'speaker_description' => 'Chemical Engineer, Master in Environmental Engineering and PhD in Civil Engineering with emphasis in Environmental Engineering.',
            'speaker_university' => 'Universidad del Norte - Colombia',
            'speaker_profile' => 'RicardoLuisMejiaMarchena.jpeg',
            'speaker_image_country' => 'colombia.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Luis Guillermo Loria Salazar',
            'speaker_title' => 'PhD.',
            'speaker_presentation' => 'Presentation: "Calibration of Fatigue Models through accelerated pavement testing"',
            'speaker_description' => 'MSc in Civil Engineering, emphasis Materials/Pavements, UNR-USA, PhD in Civil Engineering, emphasis Materials/Pavements, UNR-USA, Materials and pavement consultant/designer in projects from Guatemala to Bolivia.',
            'speaker_university' => 'Universidad Isaac Newton - Costa Rica',
            'speaker_profile' => 'luisguillermoloriasalazar.jpeg',
            'speaker_image_country' => 'costaRica.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Guadalupe Juliana Gutiérrez Paredes',
            'speaker_title' => 'PhD.',
            'speaker_presentation' => 'Presentation: "Challenges of Technological Innovation in the Face of Sustainable Development: Remaking the Technosphere"',
            'speaker_description' => 'D. in Metallurgical and Materials Engineering from the National Polytechnic Institute. Master in Metallurgical Engineering from the Instituto Politécnico Nacional, Metallurgical Engineer with specialty in steelmaking and foundry from the Instituto Politécnico Nacional.',
            'speaker_university' => 'Instituto Politécnico Nacional – México',
            'speaker_profile' => 'guadalupe.jpeg',
            'speaker_image_country' => 'mexico.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('speakers')->insert([
            'speaker_name' => 'Juan Enrique Garrido Navarro',
            'speaker_title' => 'PhD.',
            'speaker_presentation' => 'Presentation: "User Experience and Awareness"',
            'speaker_description' => 'Lecturer / Assistant Professor at the Department of Computer Engineering and Digital Design of the University of Lleida, of which he is also academic secretary, member of the Human-Computer Interaction and Data Integration Group (GRIHO) and member of the board of the Association for Human-Computer Interaction (AIPO) which is the most important Spanish and Latin American HCI entity. He is also a member of the ACM HCI Special Interest Group (SIGCHI), president of the Spanish Chapter of ACM SIGCHI (CHISPA) and member of the Latin American and Spanish HCI network (HCI Collab).',
            'speaker_university' => 'Universitat de Lleida - España',
            'speaker_profile' => 'JuanEnriqueGarridoNavarro.jpeg',
            'speaker_image_country' => 'espana.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('workshopparticipants')->insert([
            'participant_name' => 'Santiago Echeverri Escobar',
            'participant_title' => '',
            'participant_presentation' => 'Presentation: "Introduction to Video Game Development"',
            'participant_description' => '3D Animator / Modeler, Creator of educational content, Technologist in 3D Animation SENA / 3D Animation Pipeline Studios CA, Enthusiast of programming and video game development.',
            'participant_university' => 'Medellin',
            'participant_profile' => 'santiagoEcheverri.jpeg',
            'participant_image_country' => 'colombia.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('workshopparticipants')->insert([
            'participant_name' => 'Edinsson Javier Landazábal Hernández',
            'participant_title' => 'MSc.',
            'participant_presentation' => 'Presentation: "Internet of Things: opportunity to boost regional development"',
            'participant_description' => 'Master in Telematics',
            'participant_university' => 'Bucaramanga',
            'participant_profile' => 'sin.jpg',
            'participant_image_country' => 'colombia.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('workshopparticipants')->insert([
            'participant_name' => 'Harold Alberto Rodriguez Arias',
            'participant_title' => ' PhD (c)',
            'participant_presentation' => 'Presentation: "Design, build and program your own robot (CoPRo)"',
            'participant_description' => 'Mechanical Engineer from the Francisco de Paula Santander de Paula Santander of Cúcuta, JICA fellow in applied robotics at the JICA of Japan in applied robotics at the Centro Nacional de National Center for Educational Updating of Mexico, Masters Degree in Mechanical Engineering from the National Experimental University of Táchira in San Cristóbal, Venezuela. D. student in engineering with emphasis in electronics and and computer engineering at the University of Cartagena and the and the Technological University of Bolivar. and researcher for 10 years at the University of Pamplona, Norte de Santander, in the areas of Robotics, mechatronic design and manufacturing.',
            'participant_university' => 'Cartagena',
            'participant_profile' => 'HaroldAlberto.jpeg',
            'participant_image_country' => 'colombia.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('workshopparticipants')->insert([
            'participant_name' => 'José Yon Frans Garcia Herrera',
            'participant_title' => 'MSc.',
            'participant_presentation' => 'Presentation: "Internet of Things: opportunity to boost regional development"',
            'participant_description' => 'Master in Telematics',
            'participant_university' => 'Bucaramanga',
            'participant_profile' => 'sin.jpg',
            'participant_image_country' => 'colombia.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);


        DB::table('workshopparticipants')->insert([
            'participant_name' => 'Luis Armando Gaona Páez',
            'participant_title' => 'Esp. (c)',
            'participant_presentation' => 'Presentation: "Practical introduction to ethical hacking"',
            'participant_description' => 'Systems Engineer with experience in penetration testing; web application security testing, social engineering testing (Phishing, Vishing, Smshing); wireless network security testing; vulnerability analysis in computer systems and AWS cloud infrastructure. Also, cybersecurity awareness. I am certified as Certified Ethical Hacker (Practical) EC-Council and eLearnSecurity Junior Penetration Tester. I have worked as a researcher in the field of RPAS, known as drones, applied to precision agriculture. Willing to provide the knowledge acquired, in order to contribute to the solution of problems of todays society. I am currently studying a specialization in cybersecurity at the Catholic University of Manizales.',
            'participant_university' => 'Medellin',
            'participant_profile' => 'LuisArmando.jpeg',
            'participant_image_country' => 'colombia.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        // DB::table('organizing')->insert([
        //     'organizing_name' => 'Universidad',
        //     'organizing_image' => 'universidad.png',
        //     'registerBy' => 'Andres Pacheco',
        //     'status' => '1',

        // ]);
        // DB::table('organizing')->insert([
        //     'organizing_name' => 'Facultad',
        //     'organizing_image' => 'facultad.jpeg',
        //     'registerBy' => 'Andres Pacheco',
        //     'status' => '1',

        // ]);

        DB::table('organizing')->insert([
            'organizing_name' => 'GRITEM',
            'organizing_image' => 'client1.png',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizing')->insert([
            'organizing_name' => 'GICMA',
            'organizing_image' => 'client2.png',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizing')->insert([
            'organizing_name' => 'CERG',
            'organizing_image' => 'client3.png',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizing')->insert([
            'organizing_name' => 'GINSTI',
            'organizing_image' => 'client4.png',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizing')->insert([
            'organizing_name' => 'GITYD',
            'organizing_image' => 'client5.png',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizing')->insert([
            'organizing_name' => 'GRUCITE',
            'organizing_image' => 'client6.png',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizing')->insert([
            'organizing_name' => 'INGAP',
            'organizing_image' => 'client7.png',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizing')->insert([
            'organizing_name' => 'ICETEX',
            'organizing_image' => 'client8.png',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizing')->insert([
            'organizing_name' => 'ORI',
            'organizing_image' => 'client9.png',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizing')->insert([
            'organizing_name' => 'DIE',
            'organizing_image' => 'client10.png',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizing')->insert([
            'organizing_name' => 'DIE',
            'organizing_image' => 'client10.png',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizingcommitee')->insert([
            'organizer_charge' => 'General Coordinator',
            'organizer_name' => 'Nelson Afanador García',
            'organizer_title' => ' PhD.',
            'organizer_university' => 'Universidad Francisco de Paula Santander Ocaña - Colombia',
            'organizer_description' => 'Doctor in Structures, Master in Civil Engineering with emphasis in Structures, Civil Engineer, Degree in Mathematics and Physics',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizingcommitee')->insert([
            'organizer_charge' => 'Coordinator Civil Engineering Department',
            'organizer_name' => 'Agustín Armando Macgregor Torrado',
            'organizer_title' => ' Esp.',
            'organizer_university' => 'Universidad Francisco de Paula Santander Ocaña - Colombia',
            'organizer_description' => 'Master in Geotechnics, Specialist in University Teaching Practice, Specialist in Environmental Engineering, Civil Engineer',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizingcommitee')->insert([
            'organizer_charge' => 'Coordinator Mechanical Engineering Department',
            'organizer_name' => 'Eder Norberto Florez Solano',
            'organizer_title' => ' MSc.',
            'organizer_university' => 'Universidad Francisco de Paula Santander Ocaña - Colombia',
            'organizer_description' => 'Electronic Engineer, MSc. in Engineering - Industrial Automation',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizingcommitee')->insert([
            'organizer_charge' => 'Coordinator Systems Engineering Department',
            'organizer_name' => 'Byron Cuesta Quintero',
            'organizer_title' => 'MSc.',
            'organizer_university' => 'Universidad Francisco de Paula Santander Ocaña - Colombia',
            'organizer_description' => 'Master in Free Software, Specialist in University Teaching Practice, Specialist in Educational Informaticisc, Systems Engineer',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('organizingcommitee')->insert([
            'organizer_charge' => 'Organizer',
            'organizer_name' => 'María José Plata Jácome',
            'organizer_title' => 'Esp(c).',
            'organizer_university' => 'Universidad Francisco de Paula Santander Ocaña - Colombia',
            'organizer_description' => 'Specialist (c) Integrated Management System Management Systems Engineer',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteen')->insert([
            'scientific_name' => 'Ely Dannier Valbuena Niño',
            'scientific_title' => 'PhD.',
            'scientific_university' => ' Foundation of Researchers in Science and Technology of Materials',
            'scientific_description' => 'PhD in Mechanical Engineering Universidad Politécnica de Madrid, Master in Physics Universidad Industrial de Santander, Undergraduate/University Universidad Industrial de Santander, Physics.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteen')->insert([
            'scientific_name' => 'Carlos Mario Piscal Arevalo',
            'scientific_title' => 'PhD.',
            'scientific_university' => ' Universidad de la Salle – Colombia',
            'scientific_description' => 'PhD in Seismic Engineering and Structural Dynamics from the Polytechnic University of Catalonia, Master in Engineering from the Universidad de los Andes, Civil Engineer from the Universidad del Cauca.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteen')->insert([
            'scientific_name' => 'Cristhian Camilo Mendoza Bolanos',
            'scientific_title' => 'PhD.',
            'scientific_university' => 'Universidad Nacional de Colombia, sede Manizales - Colombia',
            'scientific_description' => 'Ph.D. in Geotechnical Engineering, Masters Degree in Civil Engineering, Civil Engineer',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteen')->insert([
            'scientific_name' => 'Dewar Rico Bautista, PhD.',
            'scientific_title' => 'PhD.',
            'scientific_university' => 'Universidad Francisco de Paula Santander Ocaña - Colombia',
            'scientific_description' => 'Doctor in Engineering, Master in Computer Science, Telecommunications Specialist, Telecommunications Engineer',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteen')->insert([
            'scientific_name' => 'Ricardo Andrés García León',
            'scientific_title' => 'PhD.',
            'scientific_university' => 'Universidad Francisco de Paula Santander Ocaña - Colombia',
            'scientific_description' => 'Specialist (c) Integrated Management System Management Systems EngineerI receive the grade as Mechanical Engineer in 2014 from the Universidad Francisco de Paula Santander Ocaña, Colombia. (Topic: Brake disc). In 2017, I received the MSc in Industrial Engineering from the Universidad de Pamplona, Colombia. (Topic: Clays and Ceramic producs). In this year 2022, I receive the PhD grade in Mechanical Engineering at Instituto Politecnico Nacional, Mexico. (Topic: Hardcoatings, Wear and Tribology). Im linked as researcher professor in the UFPSO since 2015.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteen')->insert([
            'scientific_name' => 'Eduar Bayona Ibáñez',
            'scientific_title' => 'MSc.',
            'scientific_university' => 'Universidad Francisco de Paula Santander Ocaña - Colombia',
            'scientific_description' => 'Systems Engineer, Specialist in Systems Auditing, Master in Pedagogical Practices, Master(c) in IT Governance.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteen')->insert([
            'scientific_name' => 'Andrés Alfonso Pacheco Solano',
            'scientific_title' => 'MSc.',
            'scientific_university' => 'Universidad Francisco de Paula Santander Ocaña - Colombia',
            'scientific_description' => 'Master in Degree Information Technology Governance, Specialist in Systems Auditing, Systems Engineer',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteei')->insert([
            'scientific_name' => 'Alberto Vásquez Martínez',
            'scientific_title' => 'PhD.',
            'scientific_university' => 'Universidad Juárez Autónoma de Tabasco – México',
            'scientific_description' => 'Civil Engineer (Awarding Institution: Instituto Tecnológico de Villahermosa) Masters Degree in Civil Engineering in the area of Structures (Institution that awards: Universidad National Autonomous University of Mexico) Doctor in Civil Engineering in the area of Structures (Institution that awards: Universidad Nacional Autónoma de México)',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteei')->insert([
            'scientific_name' => 'Aldo Onel Oliva González',
            'scientific_title' => 'PhD.',
            'scientific_university' => 'Universidad de las Californias Internacional - México',
            'scientific_description' => 'Doctor in Technical Sciences, Doctor in Mining Engineering, Specialist in Terrain Engineering, Civil Engineer.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteei')->insert([
            'scientific_name' => 'Felipe Andrés Olate Moya',
            'scientific_title' => 'PhD.',
            'scientific_university' => 'Universidad de Chile - Chile',
            'scientific_description' => 'Chemist, Department of Chemical Engineering, Biotechnology and Materials, Faculty of Physical and Mathematical Sciences, Universidad de Chile, Santiago, Chile. IMPACT, Center of Interventional Medicine for Precision and Advanced Cellular Therapy, Santiago, Chile.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteei')->insert([
            'scientific_name' => 'Francisco Evangelista Júnior',
            'scientific_title' => 'PhD.',
            'scientific_university' => 'Universidad de Brasilia - Brasil',
            'scientific_description' => 'Doctor in Civil Engineering, M.S. in Transportation Engineering, Civil Engineer, His areas of interest are: Mechanics of structures, Computational modeling, Crack propagation, Composite materials, Concrete structures.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteei')->insert([
            'scientific_name' => 'Guadalupe Juliana Gutiérrez Paredes',
            'scientific_title' => 'PhD.',
            'scientific_university' => 'Instituto Politécnico Nacional – México',
            'scientific_description' => 'PhD in Metallurgy and Materials Engineering from Instituto Politécnico Nacional. Master in Metallurgical Engineering at Instituto Politécnico Nacional, Metallurgical Engineer specializing in steelmaking and foundry at Instituto Politécnico Nacional.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteei')->insert([
            'scientific_name' => 'José Andrés Alvarado Contreras',
            'scientific_title' => 'PhD.',
            'scientific_university' => 'Universidad de los Andes - Venezuela',
            'scientific_description' => 'PhD in civil engineering, University of waterloo, Canada., MSc in mathematics applied to engineering, Universidad de los Andes, Venezuela, mechanical engineering, Universidad de los Andes, Venezuela.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteei')->insert([
            'scientific_name' => 'José Martínez Trinidad',
            'scientific_title' => 'PhD.',
            'scientific_university' => 'Instituto Politécnico Nacional - México',
            'scientific_description' => 'PhD in Mechanical Engineering, National Polytechnic Institute, School of Mechanical and Electrical Engineering Zacatenco. Mexico',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteei')->insert([
            'scientific_name' => 'Jose Swaminathan',
            'scientific_title' => 'PhD.',
            'scientific_university' => 'Vellore Institute of Technology - India',
            'scientific_description' => 'Having 30 years of teaching experience in Higher education.
            Subjects handled. Lean startup management, Project Management, Total Quality Management, Industrial Engineering and Management, Product development.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('scientificcommiteei')->insert([
            'scientific_name' => 'Rosanna Nieves Costaguta',
            'scientific_title' => 'PhD.',
            'scientific_university' => 'Universidad Nacional de Santiago del Estero - Argentina',
            'scientific_description' => 'Ph.D. in Computer Science; Master in Software Engineering; Specialist in Higher Education Teaching; Computer Engineer',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('slides')->insert([
            'conference_name' => '10th International Conference of Technological Innovation',
            'conference_date' => '11-13 october, 2023',
            'university_name' => 'Universidad Francisco de Paula Santander Ocaña - Colombia',
            'faculty_name' => 'Faculty of Engineering',
            'conference_logo' => 'logo.jpg',
            'conference_image' => 'slide-1.jpg',
            'conference_image_secondary_one' => 'slide-2.jpg',
            'conference_image_secondary_two' => 'slide-3.jpg',
            'conference_image_secondary_three' => 'slide-4.jpg',
            'conference_image_secondary_five' => 'slide-5.jpg',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);

        DB::table('index')->insert([
            'description_one' => 'The Organizing Committee of the X International Meeting on Technological Innovation has decided to conduct the event virtually and in person for the proposed activities, such as keynote lectures and oral presentations to be held on October 11, 12 and 13, 2023. Our event has been creatively designed to allow the best possible experience for all speakers and participants.',
            'description_two' => 'The 10th International Meeting on Technological Innovation will feature national and international speakers who are experts in their field. Keynote lectures will be live streamed (some lectures will be conducted virtually and others in person) and followed by sessions of national oral speakers presenting their work. Speakers will give a 15-minute oral presentation of their work, followed by a round of questions.',
            'ufpso_student' => '$20.000 (COP)',
            'ufpso_graduate' => '$50.000 (COP)',
            'external_professional' => '$100.000 (COP)',
            'oral_presenter' => '$80.000 (COP)',
            'description_three' => 'We look forward to your valuable participation in the X International Meeting on Technological Innovation!',
            'message' => 'Organizing Committee of the X International Meeting on Technological.',
            'registerBy' => 'Andres Pacheco',
            'status' => '1',

        ]);
    }

}
