<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkingDay;
use App\Models\Holiday;
use App\Models\User;
use App\Models\LeaveCategory;
use App\Models\Attendance;
use App\Models\SetTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index() {
		return view('admin.hrm.attendance.manage_attendance');
	}

	public function set_attendance(Request $request) {
		$attendance_day = date("D", strtotime($request->date));
		$weekly_holidays = WorkingDay::where('working_status', 0)
			->get(['day'])
			->toArray();
		$monthly_holidays = Holiday::where('date', '=', $request->date)
			->first(['date']);
		
		if($monthly_holidays){
			if ($monthly_holidays['date'] == $request->date) {
				return redirect('/hrm/attendance/manage')->with('exception', 'You select a holiday !');
			}
		}
		
		foreach ($weekly_holidays as $weekly_holiday) {
			if ($attendance_day == $weekly_holiday['day']) {
				return redirect('/hrm/attendance/manage')->with('exception', 'You select a holiday !');
			}
		}
		$employees = User::query()
			->leftjoin('designations as designations', 'users.designation_id', '=', 'designations.id')
			->orderBy('users.name', 'ASC')
			->where('users.access_label', '>=', 2)
			->where('users.access_label', '<=', 3)
			->get(['designations.designation', 'users.name', 'users.id'])
			->toArray();
		$leave_categories = LeaveCategory::get()
			->where('deletion_status', 0)
			->toArray();
		$date = $request->date;
		$attendances = Attendance::where('attendance_date', $date)
			->get()
			->toArray();
		if (empty($attendances)) {
			return view('admin.hrm.attendance.set_attendance', compact('employees', 'leave_categories', 'date'));
		}
		return view('admin.hrm.attendance.edit_attendance', compact('employees', 'leave_categories', 'date', 'attendances'));
	}

	public function store(Request $request) {

		for ($i = 0; $i < count($request->user_id); $i++) {
			Attendance::create([
				'created_by' => auth()->user()->id,
				'user_id' => $request->user_id[$i],
				'attendance_date' => $request->attendance_date[$i],
				'attendance_status' => $request->attendance_status[$i],
				'leave_category_id' => $request->leave_category_id[$i],
				'check_in' => $request->check_in[$i],
				'check_out' => $request->check_out[$i],
			]);
		}
		return redirect('/hrm/attendance/manage')->with('message', 'Add successfully.');
	}

	public function update(Request $request) {

		for ($i = 0; $i < count($request->user_id); $i++) {
			$attendance = Attendance::find($request->attendance_id[$i]);
			$attendance->user_id = $request->user_id[$i];
			$attendance->attendance_date = $request->attendance_date[$i];
			$attendance->attendance_status = $request->attendance_status[$i];
			$attendance->leave_category_id = $request->leave_category_id[$i];
			$attendance->check_in = '09:12:00';
			$attendance->check_out = '17:12:00';
			$affected_row = $attendance->save();
		}
		return redirect('/hrm/attendance/manage')->with('message', 'Update successfully.');
	}

	public function report() {
		return view('admin.hrm.attendance.report');
	}

	public function get_report(Request $request) {
		$date = $request->date;
		$month = date("m", strtotime($date));
		$year = date("Y", strtotime($date));
		$number_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$attendances = Attendance::query()
			->leftjoin('leave_categories as leave', 'attendances.leave_category_id', '=', 'leave.id')
			->whereYear('attendances.attendance_date', '=', $year)
			->whereMonth('attendances.attendance_date', '=', $month)
			->get(['attendances.*', 'leave.leave_category'])
			->toArray();
		$employees = User::query()
			->leftjoin('designations as designations', 'users.designation_id', '=', 'designations.id')
			->orderBy('users.name', 'ASC')
			->where('users.access_label', '>=', 2)
			->where('users.access_label', '<=', 3)
			->get(['designations.designation', 'users.name', 'users.id'])
			->toArray();
		$weekly_holidays = WorkingDay::where('working_status', 0)
			->get()
			->toArray();
		$monthly_holidays = Holiday::whereYear('date', '=', $year)
			->whereMonth('date', '=', $month)
			->get(['date', 'holiday_name'])
			->toArray();
		return view('admin.hrm.attendance.get_report', compact('date', 'attendances', 'employees', 'number_of_days', 'weekly_holidays', 'monthly_holidays'));
	}

	public function timeSet(Request $request) {
		$id=$request->id;
		$setimes= \App\Models\SetTime::all();
		if($setimes->count()>0){
			$setimes= SetTime::find($id);
			$setimes->in_time = $request->in_time;
			$setimes->out_time = $request->out_time;
			$setimes->save();
			return redirect('hrm/attendance/manage')->with('message', 'Set Update Successful!');
		}else{
			$setimes= new SetTime;
			$setimes->created_by = Auth::user()->id;
			$setimes->in_time = $request->in_time;
			$setimes->out_time = $request->out_time;
			$setimes->save();
			return redirect('hrm/attendance/manage')->with('message', 'Set Successful!');
		}
	}

	public function attDetails($id){
		$attendance = Attendance::all()->where('user_id', $id);
		return view('admin.hrm.attendance.detailsAttendence', compact('attendance'));
	}
	public function attDetailsReportGenerate(){
		$employees = User::whereBetween('access_label', [2, 3])
				->where('deletion_status', 0)
				->select('id', 'name')
				->orderBy('id', 'DESC')
				->get()
				->toArray();
	
		return view('admin.hrm.attendance.attDetailsReportGenerate', compact('employees'));
	}

	public function attDetailsReport(Request $request){
		$empid= $request->emp_id;
		$daterange= $request->daterange;
		if($request->daterange=='' or $request->emp_id==0){
			return redirect('/hrm/attendance/details/report/go')->with('exception', 'Please select the Date Range');
		}else{
			$empid= $request->emp_id;
			$dates = explode(' - ', $request->daterange);
			$date1 = $dates[0];
			$date2 = $dates[1];
		
			$startdate = date("Y-m-d", strtotime($date1));
			$enddate = date("Y-m-d", strtotime($date2));
			$attendance = DB::table('attendances')->whereBetween('attendance_date', [$startdate, $enddate])->where('user_id', $empid)->get();
			$attds=  DB::table('attendances')->where('attendance_status', 1)->where('user_id', $empid)->whereBetween('attendance_date', [$startdate, $enddate])->get();
			$abs=  DB::table('attendances')->where('attendance_status', 0)->where('user_id', $empid)->whereBetween('attendance_date', [$startdate, $enddate])->get();
			return view('admin.hrm.attendance.detailsAttendanceReport', compact('attendance', 'startdate', 'enddate', 'empid', 'attds', 'abs'));
		}
	}




}
