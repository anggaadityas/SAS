<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();


// Get Link Pages

Route::get('/','PagesCompanyController@Welcome');
Route::get('/login',function(){
	return 'Login';
});
Route::get('/register',function(){
	return 'Register';
});
Route::get('pagenotfound', ['as' => 'notfound', 'uses' => 'PagesAdminController@pagenotfound']);	


Route::group(['middleware' => 'bloklog'], function() {

Route::get('/admin','PagesAdminController@Admin');
Route::post('login-proses', [
	'as'=>'login-proses',
	'uses'=>'LoginAdminController@cekLogin'
	]);

});

Route::group(['middleware' => 'checklogin'], function () {

Route::get('/dashboard', [
	'uses'=>'DashboardController@Dashboard',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);

// Customer

Route::get('/newcustomer', [
	'uses'=>'NewCustomerController@NewCustomer',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::post('/detailrequest', [
	'uses'=>'NewCustomerController@DetailRequest',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::post('/updatestatusrequest', [
	'uses'=>'NewCustomerController@UpdateStatusRequest',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('/requestnew',[
	'uses' => 'NewCustomerController@RequestNew',
	'middleware' => 'roles',
	'roles' =>['Admin']
	]);
Route::get('destroyrequest/{id}',[
	'uses' => 'NewCustomerController@destroyrequest',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
    ]);
Route::get('/entrydata', [
	'uses'=>'EntryDataController@EntryData',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('/addentrydata/{id}', [
	'uses'=>'EntryDataController@AddEntryData',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::post('/addentrydataproses/', [
	'uses'=>'EntryDataController@AddEntryDataProses',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('/addlistkaryawan/{id}', [
	'uses'=>'EntryDataController@AddListKaryawan',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('/listaddkaryawan', [
	'uses'=>'EntryDataController@ListChooseKaryawan',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/addlistjobkaryawan/{id}', [
	'uses'=>'EntryDataController@AddListJob',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/destroylistjob/{id}', [
	'uses'=>'EntryDataController@DeleteListJob',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/addlistjobproses', [
	'uses'=>'EntryDataController@AddListJobProses',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/GenerateKodeListJob', [
	'uses'=>'EntryDataController@GenerateKodeListJob',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/listcompanyold', [
	'uses'=>'EntryDataController@ListCompanyOld',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('/listcompanynew', [
	'uses'=>'EntryDataController@ListCompanyNew',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('/listcustomer', [
	'uses'=>'ListCustomerController@ListCustomer',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('/listdatacustomer', [
	'uses'=>'ListCustomerController@ListDataCustomer',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('/detaillistdatacustomer/{id}', [
	'uses'=>'ListCustomerController@DetailListDataCustomer',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('/insertcordinat', [
	'uses'=>'InsertCordinatController@InsertCordinat',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('/listjob', [
	'uses'=>'ListJobController@ListJob',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('/addjob', [
	'uses'=>'AddJobController@AddJob',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('/historycustomer', [
	'uses'=>'HistoryCustomerController@HistoryCustomer',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);

// Karyawan 

Route::get('/calonkaryawan', [
	'uses'=>'CalonKaryawanController@CalonKaryawan',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/listcalonkaryawan', [
	'uses'=>'CalonKaryawanController@ListCalonKaryawan',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/detailkaryawan/{id}', [
	'uses'=>'CalonKaryawanController@DetailCalonKaryawan',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/scheduletest', [
	'uses'=>'ScheduleTestController@ScheduleTest',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/addscheduletest/{id}', [
	'uses'=>'ScheduleTestController@AddScheduleTest',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/addscheduletestproses', [
	'uses'=>'ScheduleTestController@AddScheduleTestProses',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/addscheduletestupdate', [
	'uses'=>'ScheduleTestController@AddScheduleTestUpdate',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/listschedulepsikotes', [
	'uses'=>'ScheduleTestController@ListSchedulePsikotes',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/scheduleinterview', [
	'uses'=>'ScheduleInterviewController@ScheduleInterview',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/listscheduleinterview', [
	'uses'=>'ScheduleInterviewController@ListScheduleInterview',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/addscheduleinterview/{id}', [
	'uses'=>'ScheduleInterviewController@AddListScheduleInterview',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/addscheduleinterviewproses', [
	'uses'=>'ScheduleInterviewController@AddListScheduleInterviewProses',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/addscheduleinterviewupdate', [
	'uses'=>'ScheduleInterviewController@AddListScheduleInterviewUpdate',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/listkaryawanpsikotes', [
	'uses'=>'HasilTestInterviewController@ListKaryawanPsikotes',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/listdatakaryawanpsikotes', [
	'uses'=>'HasilTestInterviewController@ListDataKaryawanPsikotes',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/inputdatahasilpsikotes/{id}', [
	'uses'=>'HasilTestInterviewController@InputDataHasilPsikotes',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/destroylisthasilpsikotes/{id}', [
	'uses'=>'HasilTestInterviewController@DestroyListHasilPsikotes',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/destroylisthasilinterview/{id}', [
	'uses'=>'HasilTestInterviewController@DestroyListHasilInterview',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/updatestatuskaryawanlulus', [
	'uses'=>'HasilTestInterviewController@UpdateStatusKaryawanLulus',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/updatestatuskaryawantidaklulus', [
	'uses'=>'HasilTestInterviewController@UpdateStatusKaryawanTidakLulus',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/inputdatahasilpsikotesproses', [
	'uses'=>'HasilTestInterviewController@InputDataHasilPsikotesProses',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/listkaryawan', [
	'uses'=>'ListKaryawanController@ListKaryawan',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/daftarlistkaryawan', [
	'uses'=>'ListKaryawanController@DaftarListKaryawan',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/historykaryawan', [
	'uses'=>'HistoryKaryawanController@HistoryKaryawan',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);

// Company Profile

Route::get('/updateslider', [
	'uses'=>'UpdateSliderController@UpdateSlider',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/DataSlider', [
	'uses'=>'UpdateSliderController@DataSlider',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/InsertSliderProses', [
	'as'=>'InsertSliderProses',
	'uses'=>'UpdateSliderController@InsertSliderProses',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/EditSlider', [
	'as'=>'EditSlider',
	'uses'=>'UpdateSliderController@EditSlider',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('DestroySlider/{id}',[
	'uses' => 'UpdateSliderController@DestroySlider',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
    ]);
Route::get('/updategalery', [
	'uses'=>'UpdateGaleryController@UpdateGalery',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/DataGalery', [
	'uses'=>'UpdateGaleryController@DataGalery',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/InsertGaleryProses', [
	'as'=>'InsertGaleryProses',
	'uses'=>'UpdateGaleryController@InsertGaleryProses',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/EditGalery', [
	'as'=>'EditGalery',
	'uses'=>'UpdateGaleryController@EditGalery',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('DestroyGalery/{id}',[
	'uses' => 'UpdateGaleryController@DestroyGalery',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
    ]);
Route::get('/updateartikel', [
	'uses'=>'UpdateArtikelController@UpdateArtikel',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/DataArtikel', [
	'uses'=>'UpdateArtikelController@DataArtikel',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/InsertArtikelProses', [
	'as'=>'InsertArtikelProses',
	'uses'=>'UpdateArtikelController@InsertArtikelProses',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/EditArtikel', [
	'as'=>'EditArtikel',
	'uses'=>'UpdateArtikelController@EditArtikel',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/DestroyArtikel/{id}', [
	'uses'=>'UpdateArtikelController@DestroyArtikel',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/complain', [
	'uses'=>'ComplainController@Complain',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/listloker', [
	'uses'=>'ListLokerController@ListLoker',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/DataLoker', [
	'uses'=>'ListLokerController@DataLoker',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/InsertLokerProses', [
	'as'=>'InsertLokerProses',
	'uses'=>'ListLokerController@InsertLokerProses',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::post('/UpdateLokerProses', [
	'as'=>'UpdateLokerProses',
	'uses'=>'ListLokerController@UpdateLokerProses',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/DestroyLoker/{id}', [
	'uses'=>'ListLokerController@DestroyLoker',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
	]);
Route::get('/addadmin', [
	'uses'=>'AddAdminController@AddAdmin',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('/listadmin', [
	'uses'=>'AddAdminController@ListAdmin',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::post('/adduser', [
	'uses'=>'AddAdminController@AddUser',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::post('/prosesedituser', [
	'uses'=>'AddAdminController@ProsesEditUser',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::get('destroyuser/{id}',[
	'uses' => 'AddAdminController@DestroyUser',
	'middleware' => 'roles',
    'roles' => ['Admin','HRD']
    ]);
Route::get('/importdatakaryawan', [
	'uses'=>'ImportDataExecelController@importexcel',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);
Route::post('/importdatakaryawan-proses', [
	'uses'=>'ImportDataExecelController@importdataexcel',
	'middleware' => 'roles',
    'roles' => ['Admin']
	]);

Route::get('/logout','LoginAdminController@logout');

});


Route::get('/exec', function () {


	$kode_pekerjaan='DE001';

     $listchoosekaryawan = DB::table('tb_karyawan')
                ->leftjoin('tb_apply_pekerjaan','tb_apply_pekerjaan.no_ktp','=','tb_karyawan.no_ktp')
                ->leftjoin('tb_jenis_pekerjaan','tb_jenis_pekerjaan.kd_pekerjaan','=','tb_apply_pekerjaan.kd_pekerjaan')
                ->leftjoin('tb_info_test','tb_info_test.no_ktp','=','tb_karyawan.no_ktp')
                ->leftjoin('tb_info_interview','tb_info_interview.no_ktp','=','tb_karyawan.no_ktp')
                ->where('tb_karyawan.status','=',' ')
                ->where('tb_apply_pekerjaan.kd_pekerjaan','=',$kode_pekerjaan)
                ->select('tb_karyawan.no_ktp','tb_karyawan.no_NIK', 'tb_karyawan.nama_depan','tb_karyawan.nama_belakang','tb_karyawan.status','tb_apply_pekerjaan.kd_pekerjaan', 'tb_jenis_pekerjaan.nama_pekerjaan','tb_info_test.kode_test','tb_info_interview.kd_interview','tb_karyawan.nilai')
                ->get();

            return $listchoosekaryawan;


});

