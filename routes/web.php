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
use App\Http\Controllers\ThematicAreasController;
use App\Http\Controllers\ScientificProgramController;
use App\Http\Controllers\SpeakersController;
use App\Http\Controllers\SocialEventsController;
use App\Http\Controllers\OrganizingCommitteeController;
use App\Http\Controllers\ScientificCommitteeIController;
use App\Http\Controllers\ScientificCommitteeNController;
use App\Http\Controllers\ScientificProgramSController;
use App\Http\Controllers\WorkShopParticipantsController;

use App\Http\Controllers\Auth\LoginController;

use \App\Http\Controllers\DashboardController;
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

Route::get('/storage/{path}', function ($path) {$file = storage_path('app/public/' . $path);
    if (file_exists($file)) {
        return response()->file($file);
    } else {
        abort(404);
    }})->where('path', '.*');

Route::get('/', function () { return view('index');});


Route::get('/registration', [RegistrationController::class, 'showRegistration'])->name('registration');
Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');
Route::get('/hotels', [HotelsController::class, 'showHotels'])->name('hotels');

Route::get('/abstractSubmission', [AbstractSubmissionController::class, 'showAbstractSubmission'])->name('abstractSubmission');
Route::get('/importantDates', [ImportantDatesController::class, 'showImportantDates'])->name('importantDates');
Route::get('/instructionsAuthors', [InstructionsAuthorsController::class, 'showInstructionsAuthors'])->name('instructionsAuthors');
Route::get('/publishingOptions', [PublishingOptionsController::class, 'showPublishingOptions'])->name('publishingOptions');
Route::get('/thematicAreas', [ThematicAreasController::class, 'showThematicAreas'])->name('thematicAreas');


Route::get('/scientificProgram', [ScientificProgramController::class, 'showScientificProgram'])->name('scientificProgram');
Route::get('/speakers', [SpeakersController::class, 'showSpeakers'])->name('speakers');
Route::get('/socialEvents', [SocialEventsController::class, 'showSocialEvents'])->name('socialEvents');


Route::get('/organizingCommittee', [OrganizingCommitteeController::class, 'showOrganizingCommittee'])->name('organizingCommittee');
Route::get('/scientificCommitteeI', [ScientificCommitteeIController::class, 'showScientificCommitteeI'])->name('scientificCommitteeI');
Route::get('/scientificCommitteeN', [ScientificCommitteeNController::class, 'showScientificCommitteeN'])->name('scientificCommitteeN');
Route::get('/scientificProgramS', [ScientificProgramSController::class, 'showScientificProgramS'])->name('scientificProgramS');
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
});

// Configurations
Route::get('/configuration', [ConfigurationController::class, 'index'])->name('configuration');
Route::put('/configurations{id}', [ConfigurationController::class, 'update_maintenance'])->name('configurations');
Route::put('/configuration/{id}', [ConfigurationController::class, 'update'])->name('configuration_update');

//});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
