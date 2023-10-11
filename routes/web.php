<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelsController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
});

