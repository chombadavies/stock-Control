<?php
Route::prefix('Backend')->group(function() {
    Route::any('/User/CreateAdmin', 'UsermanagementController@Create');
    Route::any('/System/Permissions','PermissionController@Index');
    Route::any('/Permissions/fetchList','PermissionController@fetchList');
    Route::any('/System/Roles','RoleController@Index');
    Route::any('/Roles/fetchList','RoleController@fetchList');
    Route::any('/Roles/Create','RoleController@Create');
    Route::any('/Role/EditDetails/{id}','RoleController@EditDetails');
    Route::any('/Role/ViewPermission/{id}','RoleController@ViewPermission');
    Route::any('/Role/ViewRoleUser/{id}','RoleController@ViewRoleUser');
    Route::any('/Role/Delete/{id}','RoleController@Delete');
    Route::any('/User/Index','UsermanagementController@Index');
    Route::any('/Users/fetchList','UsermanagementController@fetchUsers');
    Route::any('/Users/ResetPassword/{id}','UsermanagementController@PasswordReset');
    Route::any('/Users/ViewPermission/{id}','UsermanagementController@ViewPermission');
    Route::any('/Users/ViewRoleUser/{id}','UsermanagementController@ViewRoleUser');
    Route::any('/User/Edit/{id}','UsermanagementController@EditDetails');



     Route::any('/RecruitmentStation/Create','RecruitmentCenterController@Create');
     Route::any('/Paramilitary/GenderDistribution','DashboardController@GenderDistribution');
     Route::any('/Paramilitary/CumulativesDistributions','DashboardController@CumulativesDistributions');
     Route::any('/Paramilitary/Countystatistics','DashboardController@Countystatistics');
     Route::any('/Paramilitary/MainData','DashboardController@MainData');
     Route::any('/Stations/fetchList','RecruitmentCenterController@fetchList');
     Route::any('/RecruitmentCenters/Edit/{id}','RecruitmentCenterController@EditDetails');
     Route::any('/Paramilitary/Create','ParamilitaryController@Create');
     Route::any('/Paramilitary/Import','ParamilitaryController@Import');
     Route::any('/Paramilitary/Index','ParamilitaryController@Index');
     Route::any('/Paramilitary/fetchList','ParamilitaryController@fetchList');
     Route::any('/Category/fetchList','CategoryController@fetchList');
     Route::any('/Category/Index','CategoryController@Index');
     
     Route::any('/Paramilitary/Deployment/{sn}','ParamilitaryController@Deploy');
     Route::any('/Paramilitary/Exit/{sn}','ParamilitaryController@Exit');
     Route::any('/Nationalservice/Import','NationalserviceController@Import');
     Route::any('/Nationalservice/Index','NationalserviceController@Index');
     Route::any('/Nationalservice/fetchList','NationalserviceController@fetchList');
     Route::any('Tvettraining/Create','TvettrainingController@Create');
     Route::any('/Nationalservice/View/{sn}','NationalserviceController@View');
     Route::any('/nationalservice/{sn}/edit','NationalserviceController@Edit');
     Route::any('/Nationalservice/Deployment/{sn}','NationalserviceController@Deploy');
     Route::any('/Nationalservice/Exit/{sn}','NationalserviceController@Exit');
     Route::any('/Tvettraining/Import','TvettrainingController@Import');
     Route::any('/Tvettraining/Index','TvettrainingController@Index');
     Route::any('/Tvettraining/fetchList','TvettrainingController@fetchList');
     Route::any('/Tvettraining/View/{sn}','TvettrainingController@View');
     Route::any('/Tvettraining/{sn}/edit','TvettrainingController@Edit');
     Route::any('/Tvettraining/Exit/{sn}','TvettrainingController@Exit');  
     Route::any('/Separation/Index','SeparationController@Index');
     Route::any('/Separation/fetchList','SeparationController@fetchList');
     Route::any('/Separation/View/{sn}','SeparationController@View');
     Route::any('/Dashboard/Courses/Data','DashboardController@getCoursesData');
     Route::any('/Dashboard/CourseLevelData','DashboardController@CourseLevelData');
     Route::any('/Dashboard/Count/{cat}','DashboardController@DashboardCatCount');
     Route::any('/Track/Index','TrackController@Index');
     Route::any('/Track/TrackMe','TrackController@TrackMe');
     Route::any('/Placements/Index','PlacementsController@Index');
     Route::any('/Placements/Import','PlacementsController@Import');
     Route::any('/AuditTrail/Index','AuditTrailController@Index');
     Route::any('/AuditTrail/fetchList','AuditTrailController@fetchList');
     Route::any('/National/MainData','DashboardController@NationaMain');
     Route::any('/National/YearData','DashboardController@NationalYear');
     Route::any('/National/InstData','DashboardController@InstData');
     Route::any('/Dashboard/NationalData','DashboardController@NationalDuty');
     Route::any('/Recruitments/Create','RecruitmentController@Create');
     Route::any('/Recruitments/Index','RecruitmentController@Index');
     Route::any('/Recruitment/fetchList','RecruitmentController@fetchList');
     Route::any('/Applicant/GetMyDetails','RecruitmentController@GetMyDetails');
     Route::any('/Nationalservice/Create','NationalserviceController@Create');
     Route::any('/Placements/Create','PlacementsController@Create');
     Route::any('/Placement/fetchList','PlacementsController@fetchList');
     Route::any('/Placements/Import','PlacementsController@Import');
     
});



Route::prefix('Applicant')->group(function() {
    Route::any('/Profile/Update','ProfileController@UpdateProfile');

    });
