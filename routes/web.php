<?php

use App\Http\Controllers\ConfigurationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AbstractSubmissionController;
use App\Http\Controllers\ImportantDatesController;
use App\Http\Controllers\InstructionsAuthorsController;
use App\Http\Controllers\PublishingOptionsController;
use App\Http\Controllers\ScientificProgramController;
use App\Http\Controllers\SpeakersController;
use App\Http\Controllers\SocialEventsController;
use App\Http\Controllers\OrganizingCommitteeController;
use App\Http\Controllers\ScientificCommitteeIController;
use App\Http\Controllers\ScientificCommitteeNController;
use App\Http\Controllers\ScientificProgramSController;
use App\Http\Controllers\WorkShopParticipantsController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CarouselController;
use \App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrganizingController;
use App\Http\Controllers\SlideController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/storage/{path}', function ($path) {
    $file = storage_path('app/public/' . $path);
    if (file_exists($file)) {
        return response()->file($file);
    } else {
        abort(404);
    }
})->where('path', '.*');

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', [IndexController::class, 'showIndex'])->name('home');

Route::get('/registration', [RegistrationController::class, 'showRegistration'])->name('registration');
Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact_store');
Route::get('/hotels', [HotelsController::class, 'showHotels'])->name('hotels');

Route::get('/abstractSubmission', [AbstractSubmissionController::class, 'showAbstractSubmission'])->name('abstractSubmission');
Route::get('/importantDates', [ImportantDatesController::class, 'showImportantDates'])->name('importantDates');
Route::get('/instructionsAuthors', [InstructionsAuthorsController::class, 'showInstructionsAuthors'])->name('instructionsAuthors');
Route::get('/publishingOptions', [PublishingOptionsController::class, 'showPublishingOptions'])->name('publishingOptions');
Route::get('/thematicAreas', [TopicsController::class, 'showThematicAreas'])->name('thematicAreas');

Route::get('/scientificProgram', [ScientificProgramController::class, 'showScientificProgram'])->name('scientificProgram');
Route::get('/scientificProgramS', [ScientificProgramSController::class, 'showScientificProgramS'])->name('scientificProgramS');
Route::get('/speakers', [SpeakersController::class, 'showSpeakers'])->name('speakers');
Route::get('/socialEvents', [SocialEventsController::class, 'showSocialEvents'])->name('socialEvents');


Route::get('/organizingCommittee', [OrganizingCommitteeController::class, 'showOrganizingCommittee'])->name('organizingCommittee');
Route::get('/scientificCommitteeI', [ScientificCommitteeIController::class, 'showScientificCommitteeI'])->name('scientificCommitteeI');
Route::get('/scientificCommitteeN', [ScientificCommitteeNController::class, 'showScientificCommitteeN'])->name('scientificCommitteeN');
Route::get('/workShopParticipants', [WorkShopParticipantsController::class, 'showWorkShopParticipants'])->name('workshopParticipants');

Auth::routes();

Route::group(['middleware' => ['web']], function () {
    Auth::routes();

    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

//HotelsAdmin
    Route::get('/hotelsIndex', [HotelsController::class, 'index'])->name('hotels_index');
    Route::put('/hotels/status/{id}', [HotelsController::class, 'status'])->name('hotels.status');
    Route::post('/hotels', [HotelsController::class, 'store'])->name('hotels.store');
    Route::put('/hotels/{id}', [HotelsController::class, 'update'])->name('hotels.update');
    Route::delete('/hotels/{id}', [HotelsController::class, 'destroy'])->name('hotels.delete');

    //TopicsProgramAdmin
    Route::get('/topicsIndex', [TopicsController::class, 'index'])->name('topics_index');
    Route::put('/topics/status/{id}', [TopicsController::class, 'status'])->name('topics.status');
    Route::post('/topics', [TopicsController::class, 'store'])->name('topics.store');
    Route::put('/topics/{id}', [TopicsController::class, 'update'])->name('topics.update');
    Route::delete('/topics/{id}', [TopicsController::class, 'destroy'])->name('topics.delete');

    //importantDates
    Route::get('/datesIndex', [ImportantDatesController::class, 'index'])->name('dates_index');
    Route::put('/dates/status/{id}', [ImportantDatesController::class, 'status'])->name('dates.status');
    Route::post('/dates', [ImportantDatesController::class, 'store'])->name('dates.store');
    Route::put('/dates/{id}', [ImportantDatesController::class, 'update'])->name('dates.update');
    Route::delete('/dates/{id}', [ImportantDatesController::class, 'destroy'])->name('dates.delete');

    //abstractSubmissions
    Route::get('/submissionsIndex', [AbstractSubmissionController::class, 'index'])->name('submissions_index');
    Route::put('/submissions/status/{id}', [AbstractSubmissionController::class, 'status'])->name('submissions.status');
    Route::post('/submissions', [AbstractSubmissionController::class, 'store'])->name('submissions.store');
    Route::put('/submissions/{id}', [AbstractSubmissionController::class, 'update'])->name('submissions.update');
    Route::delete('/submissions/{id}', [AbstractSubmissionController::class, 'destroy'])->name('submissions.delete');

    //instructionAuthors
    Route::get('/instructionsIndex', [InstructionsAuthorsController::class, 'index'])->name('instructions_index');
    Route::put('/instructions/status/{id}', [InstructionsAuthorsController::class, 'status'])->name('instructions.status');
    Route::post('/instructions', [InstructionsAuthorsController::class, 'store'])->name('instructions.store');
    Route::put('/instructions/{id}', [InstructionsAuthorsController::class, 'update'])->name('instructions.update');
    Route::delete('/instructions/{id}', [InstructionsAuthorsController::class, 'destroy'])->name('instructions.delete');

    //publishingOptions
    Route::get('/publishingsIndex', [PublishingOptionsController::class, 'index'])->name('publishings_index');
    Route::put('/publishings/status/{id}', [PublishingOptionsController::class, 'status'])->name('publishings.status');
    Route::post('/publishings', [PublishingOptionsController::class, 'store'])->name('publishings.store');
    Route::put('/publishings/{id}', [PublishingOptionsController::class, 'update'])->name('publishings.update');
    Route::delete('/publishings/{id}', [PublishingOptionsController::class, 'destroy'])->name('publishings.delete');

    //scientificProgram
    Route::get('/scientificProgramIndex', [ScientificProgramController::class, 'index'])->name('scientificProgram_index');
    Route::put('/scientificProgram/status/{id}', [ScientificProgramController::class, 'status'])->name('scientificprograms.status');
    Route::post('/scientificProgram', [ScientificProgramController::class, 'store'])->name('scientificprograms.store');
    Route::put('/scientificProgram/{id}', [ScientificProgramController::class, 'update'])->name('scientificprograms.update');
    Route::delete('/scientificProgram/{id}', [ScientificProgramController::class, 'destroy'])->name('scientificprograms.delete');

    //speakers
    Route::get('/speakersIndex', [SpeakersController::class, 'index'])->name('speakers_index');
    Route::put('/speakers/status/{id}', [SpeakersController::class, 'status'])->name('speakers.status');
    Route::post('/speakers', [SpeakersController::class, 'store'])->name('speakers.store');
    Route::put('/speakers/{id}', [SpeakersController::class, 'update'])->name('speakers.update');
    Route::delete('/speakers/{id}', [SpeakersController::class, 'destroy'])->name('speakers.delete');

    //socialEvents
    Route::get('/socialEventIndex', [SocialEventsController::class, 'index'])->name('socialEvents_index');
    Route::put('/socialEvent/status/{id}', [SocialEventsController::class, 'status'])->name('events.status');
    Route::post('/socialEvent', [SocialEventsController::class, 'store'])->name('events.store');
    Route::put('/socialEvent/{id}', [SocialEventsController::class, 'update'])->name('events.update');
    Route::delete('/socialEvent/{id}', [SocialEventsController::class, 'destroy'])->name('events.delete');

    //scientificProgramS
    Route::get('/scientificProgramSIndex', [ScientificProgramSController::class, 'index'])->name('scientificProgramS_index');
    Route::put('/scientificProgramS/status/{id}', [ScientificProgramSController::class, 'status'])->name('scientificprogramsS.status');
    Route::post('/scientificProgramS', [ScientificProgramSController::class, 'store'])->name('scientificprogramsS.store');
    Route::put('/scientificProgramS/{id}', [ScientificProgramSController::class, 'update'])->name('scientificprogramsS.update');
    Route::delete('/scientificProgramS/{id}', [ScientificProgramSController::class, 'destroy'])->name('scientificprogramsS.delete');

    //workShop
    Route::get('/workShopIndex', [WorkShopParticipantsController::class, 'index'])->name('workShop_index');
    Route::put('/workShop/status/{id}', [WorkShopParticipantsController::class, 'status'])->name('participants.status');
    Route::post('/workShop', [WorkShopParticipantsController::class, 'store'])->name('participants.store');
    Route::put('/workShop/{id}', [WorkShopParticipantsController::class, 'update'])->name('participants.update');
    Route::delete('/workShop/{id}', [WorkShopParticipantsController::class, 'destroy'])->name('participants.delete');

    //organizingCommittee
    Route::get('/organizingCommitteeIndex', [OrganizingCommitteeController::class, 'index'])->name('organizingcommittee_index');
    Route::put('/organizingCommittee/status/{id}', [OrganizingCommitteeController::class, 'status'])->name('organizingcommittee.status');
    Route::post('/organizingCommittee', [OrganizingCommitteeController::class, 'store'])->name('organizingcommittee.store');
    Route::put('/organizingCommittee/{id}', [OrganizingCommitteeController::class, 'update'])->name('organizingcommittee.update');
    Route::delete('/organizingCommittee/{id}', [OrganizingCommitteeController::class, 'destroy'])->name('organizingcommittee.delete');

    //scientificCommitteeN
    Route::get('/scientificCommitteeNIndex', [ScientificCommitteeNController::class, 'index'])->name('scientificcommitteeN_index');
    Route::put('/scientificCommitteeN/status/{id}', [ScientificCommitteeNController::class, 'status'])->name('scientificcommitteeN.status');
    Route::post('/scientificCommitteeN', [ScientificCommitteeNController::class, 'store'])->name('scientificcommitteeN.store');
    Route::put('/scientificCommitteeN/{id}', [ScientificCommitteeNController::class, 'update'])->name('scientificcommitteeN.update');
    Route::delete('/scientificCommitteeN/{id}', [ScientificCommitteeNController::class, 'destroy'])->name('scientificcommitteeN.delete');

    //scientificCommitteeI
    Route::get('/scientificCommitteeIIndex', [ScientificCommitteeIController::class, 'index'])->name('scientificcommitteeI_index');
    Route::put('/scientificCommitteeI/status/{id}', [ScientificCommitteeIController::class, 'status'])->name('scientificcommitteeI.status');
    Route::post('/scientificCommitteeI', [ScientificCommitteeIController::class, 'store'])->name('scientificcommitteeI.store');
    Route::put('/scientificCommitteeI/{id}', [ScientificCommitteeIController::class, 'update'])->name('scientificcommitteeI.update');
    Route::delete('/scientificCommitteeI/{id}', [ScientificCommitteeIController::class, 'destroy'])->name('scientificcommitteeI.delete');

    //organizing
    Route::get('/organizingIndex', [OrganizingController::class, 'index'])->name('organizing_index');
    Route::put('/organizing/status/{id}', [OrganizingController::class, 'status'])->name('organizing.status');
    Route::post('/organizing', [OrganizingController::class, 'store'])->name('organizings.store');
    Route::put('/organizing/{id}', [OrganizingController::class, 'update'])->name('organizings.update');
    Route::delete('/organizing/{id}', [OrganizingController::class, 'destroy'])->name('organizings.delete');

    //Slide
    Route::get('/slideIndex', [SlideController::class, 'index'])->name('slide_index');
    Route::put('/slide/status/{id}', [SlideController::class, 'status'])->name('slides.status');
    Route::post('/slide', [SlideController::class, 'store'])->name('slides.store');
    Route::put('/slide/{id}', [SlideController::class, 'update'])->name('slides.update');
    Route::delete('/slide/{id}', [SlideController::class, 'destroy'])->name('slides.delete');

    //Index
    Route::get('/index', [IndexController::class, 'index'])->name('index');
    Route::put('/index/status/{id}', [IndexController::class, 'status'])->name('index.status');
    Route::post('/index', [IndexController::class, 'store'])->name('index.store');
    Route::put('/index/{id}', [IndexController::class, 'update'])->name('index.update');
    Route::delete('/index/{id}', [IndexController::class, 'destroy'])->name('index.delete');
});

// Configurations
Route::get('/configuration', [ConfigurationController::class, 'index'])->name('configuration');
Route::put('/configurations{id}', [ConfigurationController::class, 'update_maintenance'])->name('configurations');
Route::put('/configuration/{id}', [ConfigurationController::class, 'update'])->name('configuration_update');
