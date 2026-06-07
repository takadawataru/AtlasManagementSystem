<?php

namespace App\Http\Controllers\Authenticated\Calendar\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendars\General\CalendarView;
use App\Models\Calendars\ReserveSettings;
use App\Models\Calendars\Calendar;
use App\Models\USers\User;
use Auth;
use DB;

class CalendarsController extends Controller
{
    public function show(){
        $calendar = new CalendarView(time());
        return view('authenticated.calendar.general.calendar', compact('calendar'));
    }

    public function reserve(Request $request){
        DB::beginTransaction();
        try{
            $getPart = $request->getPart;
            $getDate = $request->getData;
            $reserveDays = array_filter(array_combine($getDate, $getPart));
            foreach($reserveDays as $key => $value){
                $reserve_settings = ReserveSettings::where('setting_reserve', $key)->where('setting_part', $value)->first();
                $reserve_settings->decrement('limit_users');
                $reserve_settings->users()->attach(Auth::id());
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }

    public function delete(Request $request){
        $day = $request->day;
        $part = $request->part;
        if($part=="リモ1部"){
            $part=1;
        }
        elseif($part=="リモ2部"){
            $part=2;
        }
        elseif($part=="リモ3部"){
            $part=3;
        };
        $reserve_setting = ReserveSettings::where('setting_reserve',$day)->where('setting_part' ,$part)->first();
        $reserve_setting->increment('limit_users');
        $reserve_setting->users()->detach(Auth::id());
        return redirect()->route('calendar.general.show',['user_id' => Auth::id()]);
    }
}
