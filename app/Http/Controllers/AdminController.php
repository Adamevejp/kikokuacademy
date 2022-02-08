<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Familydetail;
use App\Models\Employeevisadetail;
use App\Models\Employeecompanie;
use App\Models\Employeedegree;
use App\Models\Employeetravele;
use App\Models\Employeedocument;
use App\Models\Employeeholiday;
use App\Models\Kayearlyholiday;
use Session;
use DB;
use Mail;
use App\Models\Admin;
use App\Models\Calendar;
use Carbon\Carbon;


class AdminController extends Controller
{

    
    public function changepassword(){
        // dd(Session::get('employeeSession')); 
          $admin_id = Session::get('adminSession')['admin_id'];  
        //  $employeedata=Employee::find($employee_id);  
         return view('admin.changepassword',compact('admin_id'));
     }


     public function postchangepassword(Request $request){
        // dd($request->all());
         $admin_id =  $request->admin_id;
         $adminData=Admin::where('id',$admin_id)->where('password',md5($request->current_password))->get();  
      
       
         if(count($adminData)){
            $adminDataNew =  Admin::find($admin_id);
            $adminDataNew->password = md5($request->new_password); 
            $adminDataNew->save();
            return back()->with('success', 'Changed successful.');
         }  else {
            return back()->with('error', 'Current password not matched.');
         }
         
     }


    public function postEmployee(Request $request){
 
      $employeedata=Employee::where('email',$request->email)->get(); 
    //  dd($employeedata);

      if(count($employeedata)>=1){ 
              return back()->with('error', 'Already registered.');
      } else { 
            $employeData = new Employee;
            $employeData->first_name = $request->name;
            $employeData->last_name = $request->lastname;
            $employeData->email  = $request->email;
            $employeData->admin_verification_status  = 1 ; 
            $employeData->email_verification_status  = 1 ; 
            $employeData->save(); 
            $data = array();
            $companiesEmail = 'goud.deepak@gmail.com' ;
            // Mail::send([], $data, function($message) use ($companiesEmail){
            //     $message->to("goud.deepak@gmail.com", 's')->subject('KA Portal: Setup Email');
            //     $message->from($companiesEmail,$companiesEmail);
            //     $message->setBody('<h4>Dear Deepak2222,</h4><br> by Admin.', 'text/html');  
        //  });
        $url = 'http://athostechnologies.in/athostechnologies.in/dev/public/EmployeeVerificationCode/'.md5($employeData->id); 
        // dd($url);
        mail($request->email,$companiesEmail,$url); 
        return redirect('addemployee')->with('success', 'Created successful.');
            }
    }

    public function login(Request $request){
        //dd($request->all());
        $admindata=Admin::where('user_name',$request->email)->where('password',md5($request->password))->where('status',1)->get(); 
        if(count($admindata)==1){
            if($admindata[0]->status==0){
                return back()->with('error', 'Disabled by admin.');
            }  else {
                 $adminData = array('emp_name' => $admindata[0]->first_name.' '.$admindata[0]->last_name,'email' => $admindata[0]->email,'admin_id' => $admindata[0]->id);
                 Session::put('adminSession',$adminData);
                return redirect('KAAdmin')->with('success', 'Login successful.');
            }
        } else { 
            return back()->with('error', 'please entere correct password.');
        } 

    }


    public function admindashboard(){
        $employee_id = Session::get('adminSession')['admin_id'];  
        $employeedata=Employee::orderBy('id','desc')->get();
       // print_r($employeedata);
        return view('admin.employeelist',compact('employeedata'));
    }

    public function eventslisting(){
        $employee_id = Session::get('adminSession')['admin_id'];  
        $Calendardata=Calendar::where('employee_id',0)->get();  
       // print_r($employeedata);
        return view('admin.eventslisting',compact('Calendardata'));
    }

    public function deleteEvent($evnt_id){
        $calendarData = Calendar::find($evnt_id);
        $calendarData->delete();
        return back()->with('success', 'Delete successful.');
    }

    public function changeEvent($evnt_id){
        $calendarData = Calendar::find($evnt_id);

        if($calendarData->status==1)
        $calendarData->status = 0 ; 
        else 
        $calendarData->status = 1; 

        $calendarData->save();
        return back()->with('success', 'update successful.');
    }
    


    public function addEvents(){
        $employee_id = Session::get('adminSession')['admin_id'];  
        $employeedata=Employee::all();  
       // print_r($employeedata);
        return view('admin.addevent',compact('employeedata'));
    }

    public function addemployee(){
        $employee_id = Session::get('adminSession')['admin_id'];  
        $employeedata=Employee::all();  
       // print_r($employeedata);
        return view('admin.addemployee',compact('employeedata'));
    }

    
    

    public function ajaxemployeeholiday(){ 

         $Calendardata= DB::table('calendars')
         ->select('employees.email','employees.first_name','employees.last_name','calendars.id','calendars.start','calendars.end','calendars.status',
         \DB::raw('(CASE 
         WHEN calendars.leave_type = "1" THEN calendars.title 
         WHEN calendars.leave_type = "2" THEN calendars.title
         ELSE "SuperAdmin" 
         END) AS leave_type') , 'calendars.leave_days') 
         ->join('employees', function ($join) {
             $join->on('employees.id', '=', 'calendars.employee_id');
         })
         ->where('employee_id',"!=",'0') 
         ->get();

         //dd($Calendardata);

         $data['data'] = $Calendardata;

         return response()->json($data);
       //  return view('admin.calendarlist',compact('Calendardata'));

    }

    public function employeeholiday(){ 

        $Calendardata= DB::table('calendars')
        ->select('employees.email','employees.first_name','employees.last_name','calendars.id','calendars.start','calendars.end','calendars.status','calendars.description')
        ->join('employees', function ($join) {
            $join->on('employees.id', '=', 'calendars.employee_id');
        })
        ->where('employee_id',"!=",'0') 
        ->orderBy('calendars.start','desc')
        ->get();

        //dd($Calendardata);

       // return response()->json($Calendardata);
      return view('admin.calendarlist',compact('Calendardata'));

   }

    public function employeedetails($employee_id){ 
        // $employee_id = Session::get('adminSession')['admin_id'];  
         $employeedata=Employee::find($employee_id); 
         $employeevisadetaildata=Employeevisadetail::where('employee_id',$employee_id)->get(); 
         $employeecompaniedata=Employeecompanie::where('employee_id',$employee_id)->get(); 
         $employeedegreedata=Employeedegree::where('employee_id',$employee_id)->get(); 
         $employeetraveleedata=Employeetravele::where('employee_id',$employee_id)->get();
         $employeefamilydata=Familydetail::where('employee_id' , $employee_id)->get();  
         $employeedocument=Employeedocument::where('employee_id' , $employee_id)->get();  
         $employeefamilyCount=Familydetail::where('employee_id', $employee_id)->where('member_relations','child')->count('id'); 


         $employeedocument1=Employeedocument::select('documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc1%')->limit(1)->get();  
         $employeedocument12=Employeedocument::select('documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc12%')->limit(1)->get();  
         $employeedocument13=Employeedocument::select('documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc13%')->limit(1)->get();  
         $employeedocument2=Employeedocument::select('documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc2%')->limit(1)->get();  
         $employeedocument22=Employeedocument::select('documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc22%')->limit(1)->get();  
         $employeedocument3=Employeedocument::select('documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc3%')->limit(1)->get();  
         $employeedocument4=Employeedocument::select('documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc4%')->limit(1)->get();  
         $employeedocument5=Employeedocument::select('documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc5%')->limit(1)->get();  
         $employeedocument6=Employeedocument::select('documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc6%')->limit(1)->get();  
         $employeedocument7=Employeedocument::select('documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc7%')->limit(1)->get();  
        


        $datework = Carbon::createFromDate($employeedata->job_start_date);
        $now =  Carbon::now();
        $Days = $datework->diffInDays($now);

        $numbofyearemployee = $Days;
        $numbofyearemployee =$numbofyearemployee. ' days'; 

        if($Days>=365)
        {
            $Days = $datework->diffInYears($now);
            $numbofyearemployee = $Days;
            $numbofyearemployee =$numbofyearemployee. ' years'; 
        }

        $currentYear = $now->year;


    $numbofyearemployee  =  Carbon::createFromDate(Carbon::createFromDate($employeedata->job_start_date)->year, Carbon::createFromDate($employeedata->job_start_date)->month, Carbon::createFromDate($employeedata->job_start_date)->day)->diff(Carbon::now())->format('%y years, %m months');
    $monthEmployement =  Carbon::createFromDate(Carbon::createFromDate($employeedata->job_start_date)->year, Carbon::createFromDate($employeedata->job_start_date)->month, Carbon::createFromDate($employeedata->job_start_date)->day)->diff(Carbon::now())->format('%m');
    $yearEmployement =  Carbon::createFromDate(Carbon::createFromDate($employeedata->job_start_date)->year, Carbon::createFromDate($employeedata->job_start_date)->month, Carbon::createFromDate($employeedata->job_start_date)->day)->diff(Carbon::now())->format('%y');
 
    if($monthEmployement>0){
    $currentHolidayPeriod = $yearEmployement+1;
    } else {
    $currentHolidayPeriod = $yearEmployement;
    } 
    $previousHolidayPeriod = $currentHolidayPeriod-1;

        $KaYearHolidays = Kayearlyholiday::find(1); 
        $currentholiday = 0; $previusholiday = 0; 

        if($currentHolidayPeriod==1){
        $currentholiday = $KaYearHolidays->first_year_total_holiday;
        //$previusholiday = $KaYearHolidays->first_year_total_holiday;
        } else if ($currentHolidayPeriod==2){
        $currentholiday = $KaYearHolidays->second_year_total_holiday;
        //$previusholiday = $KaYearHolidays->second_year_total_holiday;
        }else if ($currentHolidayPeriod==3){
        $currentholiday = $KaYearHolidays->third_year_total_holiday;
        //$previusholiday = $KaYearHolidays->third_year_total_holiday;
        }else if ($currentHolidayPeriod==4){
        $currentholiday = $KaYearHolidays->fourth_year_total_holiday;
        //$previusholiday = $KaYearHolidays->fourth_year_total_holiday;
        }else if ($currentHolidayPeriod==5){
        $currentholiday = $KaYearHolidays->five_year_total_holiday;
       // $previusholiday = $KaYearHolidays->five_year_total_holiday;
        }else if ($currentHolidayPeriod==6){
        $currentholiday = $KaYearHolidays->six_year_total_holiday;
       // $previusholiday = $KaYearHolidays->six_year_total_holiday;
        } else if ($currentHolidayPeriod==7){
        $currentholiday = $KaYearHolidays->seven_year_total_holiday;
       // $previusholiday = $KaYearHolidays->seven_year_total_holiday;
        } else if ($currentHolidayPeriod==8){
        $currentholiday = $KaYearHolidays->eight_year_total_holiday;
       // $previusholiday = $KaYearHolidays->eight_year_total_holiday;
        }



            if($previousHolidayPeriod==1){
           // $currentholiday = $KaYearHolidays->first_year_total_holiday;
            $previusholiday = $KaYearHolidays->first_year_total_holiday;
            } else if ($previousHolidayPeriod==2){
           // $currentholiday = $KaYearHolidays->second_year_total_holiday;
            $previusholiday = $KaYearHolidays->second_year_total_holiday;
            }else if ( $previousHolidayPeriod==3){
            //$currentholiday = $KaYearHolidays->third_year_total_holiday;
            $previusholiday = $KaYearHolidays->third_year_total_holiday;
            }else if ($previousHolidayPeriod==4){
           // $currentholiday = $KaYearHolidays->fourth_year_total_holiday;
            $previusholiday = $KaYearHolidays->fourth_year_total_holiday;
            }else if ( $previousHolidayPeriod==5){
            //$currentholiday = $KaYearHolidays->five_year_total_holiday;
            $previusholiday = $KaYearHolidays->five_year_total_holiday;
            }else if ( $previousHolidayPeriod==6){
           // $currentholiday = $KaYearHolidays->six_year_total_holiday;
            $previusholiday = $KaYearHolidays->six_year_total_holiday;
            } else if ($previousHolidayPeriod==7){
            //$currentholiday = $KaYearHolidays->seven_year_total_holiday;
            $previusholiday = $KaYearHolidays->seven_year_total_holiday;
            } else if ( $previousHolidayPeriod==8){
            //$currentholiday = $KaYearHolidays->eight_year_total_holiday;
            $previusholiday = $KaYearHolidays->eight_year_total_holiday;
            }

            $previousexitornot = Employeeholiday::where('employee_id',$employee_id)->where('year_of_holiday',$currentYear-1)->orderBy('created_at','desc')->first();
            $currentexitornot = Employeeholiday::where('employee_id',$employee_id)->where('year_of_holiday',$currentYear)->orderBy('created_at','desc')->first();
         
            $previousYaer = $currentYear-1;
            $employeePreviousYearCount=Calendar::where('employee_id',$employee_id)->where('status',2)->whereYear('created_at' ,$previousYaer)->sum('leave_days'); 
            $employeeCurrentYearCount=Calendar::where('employee_id',$employee_id)->where('status',2)->whereYear('created_at' ,$currentYear)->sum('leave_days'); 
             
            return view('admin.employeedetails',compact(['employeedata','employeevisadetaildata','employeecompaniedata','employeedegreedata','employeetraveleedata','employeefamilydata','employee_id','employeefamilyCount','employeedocument1','employeedocument12','employeedocument13','employeedocument2','employeedocument22','employeedocument3','employeedocument4','employeedocument5','employeedocument6','employeedocument7','employee_id','numbofyearemployee','currentYear','currentHolidayPeriod','previousHolidayPeriod','currentholiday','previusholiday','currentexitornot','previousexitornot','employeePreviousYearCount','employeeCurrentYearCount']));
       }


      
      public function adminoldleave(Request $request){
          print_r($request->all());  
         $exitornot = Employeeholiday::where('employee_id',$request->employee_id)->orderBy('year_of_holiday','desc')->first();
         $exitornotCount = Employeeholiday::where('employee_id',$request->employee_id)->orderBy('year_of_holiday','desc')->count();
         print_r($exitornot);
         $employeedata=Employee::find($request->employee_id);
         if($exitornotCount==0){ 
            $data = new Employeeholiday;
            $data->employee_id	 = $request->employee_id;
            $data->number_of_holiday = $request->old_leave_total;
            $data->remaining_holiday = $request->old_leave_remaining;
            $data->year_of_holiday =$request->old_leave_year;
            $data->save();   
            $employeedata->total_number_holiday = $request->old_leave_total;
            $employeedata->total_number_remaining_holiday = $request->old_leave_remaining;
            $employeedata->save(); 
         } else { 
            $data = new Employeeholiday;
            $data->employee_id	 = $request->employee_id;
            $data->number_of_holiday = $request->old_leave_total;
            $data->remaining_holiday = $request->old_leave_remaining;
            $data->year_of_holiday = $request->old_leave_year;
            $data->save();   
            $employeedata->total_number_holiday = $request->old_leave_total+$exitornot->remaining_holiday;
             $employeedata->total_number_remaining_holiday = $request->old_leave_remaining;

            // dd($employeedata);
           $employeedata->save(); 
         } 
         return back()->with('success', 'Update successful.');
      }


    public function documentsstatus(Request $request){ 

        if($request->docs=='doc1'){
            $employeDoc = Employeedocument::where('employee_id' , $request->employee_id)->where('documents', 'like', '%doc1%')->limit(1)->get();
            $updateData = Employeedocument::find($employeDoc[0]->id);
            $updateData->documents_status = $request->status;
            $updateData->save();
        }

        if($request->docs=='doc12'){
            $employeDoc = Employeedocument::where('employee_id' , $request->employee_id)->where('documents', 'like', '%doc12%')->limit(1)->get();
            $updateData = Employeedocument::find($employeDoc[0]->id);
            $updateData->documents_status = $request->status;
            $updateData->save();
        }

        if($request->docs=='doc13'){
            $employeDoc = Employeedocument::where('employee_id' , $request->employee_id)->where('documents', 'like', '%doc13%')->limit(1)->get();
            $updateData = Employeedocument::find($employeDoc[0]->id);
            $updateData->documents_status = $request->status;
            $updateData->save();
        }

        if($request->docs=='doc2'){
            $employeDoc = Employeedocument::where('employee_id' , $request->employee_id)->where('documents', 'like', '%doc2%')->limit(1)->get();
            $updateData = Employeedocument::find($employeDoc[0]->id);
            $updateData->documents_status = $request->status;
            $updateData->save();
        }

        if($request->docs=='doc22'){
            $employeDoc = Employeedocument::where('employee_id' , $request->employee_id)->where('documents', 'like', '%doc22%')->limit(1)->get();
            $updateData = Employeedocument::find($employeDoc[0]->id);
            $updateData->documents_status = $request->status;
            $updateData->save();
        }

        if($request->docs=='doc3'){
            $employeDoc = Employeedocument::where('employee_id' , $request->employee_id)->where('documents', 'like', '%doc3%')->limit(1)->get();
            $updateData = Employeedocument::find($employeDoc[0]->id);
            $updateData->documents_status = $request->status;
            $updateData->save();
        }

        if($request->docs=='doc4'){
            $employeDoc = Employeedocument::where('employee_id' , $request->employee_id)->where('documents', 'like', '%doc4%')->limit(1)->get();
            $updateData = Employeedocument::find($employeDoc[0]->id);
            $updateData->documents_status = $request->status;
            $updateData->save();
        }

        if($request->docs=='doc5'){
            $employeDoc = Employeedocument::where('employee_id' , $request->employee_id)->where('documents', 'like', '%doc5%')->limit(1)->get();
            $updateData = Employeedocument::find($employeDoc[0]->id);
            $updateData->documents_status = $request->status;
            $updateData->save();
        }

        if($request->docs=='doc6'){
            $employeDoc = Employeedocument::where('employee_id' , $request->employee_id)->where('documents', 'like', '%doc6%')->limit(1)->get();
            $updateData = Employeedocument::find($employeDoc[0]->id);
            $updateData->documents_status = $request->status;
            $updateData->save();
        }

        if($request->docs=='doc7'){
            $employeDoc = Employeedocument::where('employee_id' , $request->employee_id)->where('documents', 'like', '%doc7%')->limit(1)->get();
            $updateData = Employeedocument::find($employeDoc[0]->id);
            $updateData->documents_status = $request->status;
            $updateData->save();
        }

        return response()->json(1);

    }

    public function saveemployeeaboutus(Request $request){
        // dd($request->all());
         $employee_id =  $request->employee_id;  
         $employeedata=Employee::find($employee_id); 
         $employeedata->first_name = $request->first_name;
         $employeedata->middle_name = $request->middle_name;
         $employeedata->last_name = $request->last_name;

         $employeedata->Katakana_family_name = $request->Katakana_family_name;
         $employeedata->Kanji_first_name = $request->Kanji_first_name;
         $employeedata->Kanji_family_name = $request->Kanji_family_name; 
        
         
         $employeedata->email = $request->email;
         $employeedata->katakana = $request->katakana;
         $employeedata->dob = $request->dob;
         $employeedata->japanese_mobile = $request->japanese_mobile;
         $employeedata->nationality = $request->nationality;
         $employeedata->payslip = $request->payslip;
         $employeedata->address_japan = $request->address_japan;
         $employeedata->closed_train = $request->closed_train;
         $employeedata->staff_only = $request->staff_only;

         $employeedata->emergancy_name = $request->emergancy_name;
         $employeedata->emergency_middle_name = $request->emergency_middle_name;
         $employeedata->emergency_family_name = $request->emergency_family_name;
         $employeedata->emergency_katakana_name = $request->emergency_katakana_name;
         $employeedata->emergency_katakana_family = $request->emergency_katakana_family;
         $employeedata->emergency_kanji_name = $request->emergency_kanji_name;
         $employeedata->emergency_kanji_family_name = $request->emergency_kanji_family_name;
 
         $employeedata->emergancy_relation = $request->emergancy_relation;
         $employeedata->emergancy_phone = $request->emergancy_phone; 
    // zip 
    $employeedata->postal1 = $request->demo1_zip1;
    $employeedata->postal2 = $request->demo1_zip2; 

    // english
    $employeedata->address_english = $request->demo1_address1_en;
    $employeedata->address_english2 = $request->demo1_address2_en; 

        // japan 
    $employeedata->address_japan = $request->demo1_address1;
    $employeedata->address_japan2 = $request->demo1_address2; 



 
         $employeedata->save();
         return back()->with('success', 'Update successful.');
 
     }


     public function saveemergancycontact(Request $request){
        // dd($request->all());
        $employee_id =  $request->employee_id;  
         $employeedata=Employee::find($employee_id);  
         $employeedata->emergancy_name = $request->emergancy_name;
         $employeedata->emergancy_relation = $request->emergancy_relation;
         $employeedata->emergancy_phone = $request->emergancy_phone; 
         $employeedata->save();
          return back()->with('success', 'Update successful.');
     }



     public function savebankinformation(Request $request){
        // dd($request->all());
         $employee_id =  $request->employee_id;  
         $employeedata=Employee::find($employee_id);  
         $employeedata->bank_registered_name = $request->bank_registered_name;
         $employeedata->bank_name = $request->bank_name;
         $employeedata->bank_branch_name = $request->bank_branch_name; 
         $employeedata->bank_branch_number = $request->bank_branch_number;
         $employeedata->bank_account_number = $request->bank_account_number; 
         $employeedata->save();
         return   back()->with('success', 'Update successful.')->with('open_url2','leave');
 
     }


     public function savefamily(Request $request){
        // dd($request->all());   
         $employee_id =  $request->employee_id;  
         $employeedata=Employee::find($employee_id);  
         $employeedata->marital_status = $request->marital_status;
         $employeedata->is_family_japan = $request->is_family_japan;
         $employeedata->save(); 
         $newemployee_id = $employeedata->id; 
         
            if(isset($request->full_name)) {
                foreach($request->full_name as $k => $name){ 

                    $familyData=[]; 

                    if($request->family_member_id[$k]==0){
                        $familyData = new Familydetail;
                    } else {
                        $familyData =  Familydetail::find($request->family_member_id[$k]);
                    }

                    $temp_id = $k+1; 
                    $familyData->employee_id = $employee_id;
                    $familyData->member_full_name = $name;  

                    if(isset($request->katakana_family[$k]))
                    $familyData->member_katakana = $request->katakana_family[$k];
                    else 
                    $familyData->member_katakana =  "";
        
                    if(isset($request->kanji_family[$k]))
                    $familyData->member_kanji = $request->kanji_family[$k];
                    else 
                    $familyData->member_kanji =  "";
        
                    if(isset($request->date_birth[$k]))
                    $familyData->date_birth = $request->date_birth[$k];
                    else 
                    $familyData->date_birth =  "";   
                   
                    $temp = "ralation_".$temp_id;  
                    $relation_fields = $request->$temp;

                    //dd($relation_fields);

                    if(isset($relation_fields)){ 
                        $familyData->member_relations = $relation_fields;
                    } else {
                        $familyData->member_relations = "";
                    }


                    $temp2 = "gender_".$temp_id;  
                    $gender_fields = $request->$temp2;

                   // dd($gender_fields);

                    if(isset($gender_fields)){ 
                        $familyData->member_gender = $gender_fields;
                    } else {
                        $familyData->member_gender = "";
                    } 

                    $temp3 = "dependents_".$temp_id;  
                    $dependents_fields = $request->$temp3;

                  

                    if(isset($dependents_fields)){ 
                        $familyData->member_dependency = $dependents_fields;
                       // dd("if");
                    } else {
                        $familyData->member_dependency = "";
                       // dd("else");
                    }

                    $familyData->status = 1; 

                    // dd($familyData);
                   $familyData->save(); 

                 }
        
            } 
            return back()->with('success', 'Update successful.')->with('open_url3','leave');
 
     }

     public function saveemployeestatus(Request $request){
        //dd($request->all());
        $employee_id =  $request->employee_id;  
        $employeedata=Employee::find($employee_id);  
        $employeedata->employee_status = $request->employee_status;
        $employeedata->main_school = $request->main_school;

        $employeedata->what_kind_insurance = $request->what_kind_insurance;
        $employeedata->unemployment_insurance_number = $request->unemployment_insurance_number;
        
        $employeedata->save();
        return back()->with('success', 'Update successful.')->with('open_url4','leave');

    }

    public function saveinsurance(Request $request){
        //dd($request->all());
        $employee_id =  $request->employee_id;  
        $employeedata=Employee::find($employee_id);  
        $employeedata->what_kind_insurance = $request->what_kind_insurance;
        $employeedata->unemployment_insurance_number = $request->unemployment_insurance_number;
        $employeedata->save();
        return back()->with('success', 'Update successful.');

    }

    public function savepostpaidholiday(Request $request){
        //dd($request->all());
        $employee_id =  $request->employee_id;  
        $employeedata=Employee::find($employee_id); 
        $employeedata->job_start_date = $request->job_start_date;  
        $holiday_issue_date = Carbon::createFromDate($request->job_start_date)->addMonths(6)->startOfMonth();
        $employeedata->holiday_issue_date = $holiday_issue_date;  
    
       $totalHoliday =0;
       $remainingHoliday=0;
        if($request->previous_used_holiday!=null){ 
            $request->previousYear; // previous year 
            $request->previousholiday; // previous total holiday  
            $request->previous_used_holiday;  //  previous used holiday
            $totalHoliday = $request->previousholiday+$request->currentholiday;
            $remainingHoliday = $totalHoliday - $request->previous_used_holiday;

            $data = new Employeeholiday;
            $data->employee_id	 = $request->employee_id;
            $data->number_of_holiday = $request->previousholiday;
            $data->used_holiday =$request->previous_used_holiday;
            $data->remaining_holiday = $request->previousholiday-$request->previous_used_holiday;
            $data->year_of_holiday =$request->previousYear;
            $data->save();   
        } 

        if($request->current_used_holiday!=null){ 
            $request->currentYear;
            $request->currentholiday;
            $request->current_used_holiday; 
          // $totalHoliday = $request->currentholiday+$remainingHoliday; 
            $remainingHoliday = $remainingHoliday-$request->current_used_holiday;

            $data = new Employeeholiday;
            $data->employee_id	 = $request->employee_id;
            $data->number_of_holiday = $request->currentholiday;
            $data->used_holiday = $request->current_used_holiday;
            $data->remaining_holiday = $remainingHoliday;
            $data->year_of_holiday =$request->currentYear;
            $data->save();   
        }
 
         $employeedata->total_number_holiday = $remainingHoliday; // $request->total_number_holiday;
         $employeedata->total_number_remaining_holiday = $remainingHoliday;
       
        $employeedata->total_number_child_holiday = $request->total_number_child_holiday;

        $employeedata->save();
      return back()->with('success', 'Update successful.')->with('open_url6','leave');

    }


    
public function employeeDelete($emp_id){
    $Employee  =  Employee::find($emp_id);
    $Employee->delete();
    return back()->with('success', 'delete successful.');
}



    public function savevisa(Request $request){
       // dd($request->all());
       $employee_id =  $request->employee_id;  
        $employeedata=Employee::find($employee_id);  
        $employeedata->visa_status = $request->visa_status; 
        // I am a Japanese citizen   I have a family-related visa 
        // No need for save anything  
        if($request->visa_status=="I am a permanent resident"){
            $employeedata->residence_validity_date = $request->residence_validity_date_japan;
        }  

        if($request->visa_status=="I am coming from overseas"){
            $employeedata->cleared_customs = $request->cleared_customs_and_entered_Japan;
        }

        $employeedata->save();

        // delete all information of employee then update again 
        // Employeevisadetail , Employeedegree , Employeecompanie , Employeetravele


        DB::table('employeecompanies')->where('employee_id', $request->employee_id )->delete();
        DB::table('employeedegrees')->where('employee_id', $request->employee_id )->delete();
        DB::table('employeetraveles')->where('employee_id', $request->employee_id )->delete();
        DB::table('employeevisadetails')->where('employee_id', $request->employee_id )->delete();
       

        if($request->visa_status=="I have a work visa" || $request->visa_status=="I have a work visa, am currently in Japan"){
        
             $visaDetails =  new Employeevisadetail; 
             $visaDetails->employee_id = $request->employee_id; 
             $visaDetails->type_of_visa = $request->work_visa;
             $visaDetails->visa_expire_year = $request->currentvisaYear;
             $visaDetails->visa_expire_month = $request->currentvisamonth;
             $visaDetails->valididty_residence_date = $request->validaity_residence_visa;
             $visaDetails->save(); 
             $degreeDetails =  new Employeedegree; 
             $degreeDetails->employee_id = $request->employee_id;  
             $degreeDetails->university_name = $request->university_name;
             $degreeDetails->degree = $request->degree;
             $degreeDetails->date_graduation = $request->date_graduation;
             $degreeDetails->overseas_location = $request->overseas_location;
             $degreeDetails->save();

         if(isset($request->company_name)){
             foreach ($request->company_name as $key => $companyname) {
                 if($companyname!=""){
                    $companyDetails =  new Employeecompanie; 
                    $companyDetails->employee_id = $request->employee_id;  
                    $companyDetails->company_name = $companyname;
                    $companyDetails->start_date = $request->start_date[$key];
                    $companyDetails->end_date = $request->end_date[$key];
                    $companyDetails->save();
       
                 } 
               } 
           }  // end if 
          
        }


 if($request->visa_status=="I am coming from overseas"){
            $degreeDetails =  new Employeedegree; 
            $degreeDetails->employee_id = $request->employee_id; 
            $degreeDetails->university_name = $request->university_name;
            $degreeDetails->degree = $request->degree;
            $degreeDetails->date_graduation = $request->date_graduation;
            $degreeDetails->overseas_location = $request->overseas_location;
            $degreeDetails->save();

        if(isset($request->company_name)){
            foreach ($request->company_name as $key => $companyname) {
                if($companyname!=""){
                   $companyDetails =  new Employeecompanie; 
                   $companyDetails->employee_id = $request->employee_id; 
                   $companyDetails->company_name = $companyname;
                   $companyDetails->start_date = $request->start_date[$key];
                   $companyDetails->end_date = $request->end_date[$key];
                   $companyDetails->save(); 
                } 
              } 
          }  // end if 

          if(isset($request->cleared_customs_and_entered_Japan) && $request->cleared_customs_and_entered_Japan=="1"){
             $traveleData = new Employeetravele;
             $traveleData->employee_id = $request->employee_id; 
             $traveleData->how_many_time = $request->many_time;
             $traveleData->most_recent_entry_date = $request->most_recent_entry_date;
             $traveleData->most_recent_departure_date = $request->most_recent_departure_date;
             $traveleData->save(); 
          }
          
        }

        if($request->visa_status=="I have a student visa and am currently in Japan"){
            $degreeDetails =  new Employeedegree; 
            $degreeDetails->employee_id = $request->employee_id;  
            $degreeDetails->university_name = $request->university_name;
            $degreeDetails->degree = $request->degree;
            $degreeDetails->date_graduation = $request->date_graduation;
            $degreeDetails->overseas_location = $request->overseas_location;
            $degreeDetails->save(); 
        }
        


        return back()->with('success', 'Update successful.')->with('open_url5','visa');;

    }



    public function saveevents(Request $request){
        $calendarData =  new Calendar; 
        $calendarData->employee_id =0;
        $calendarData->start =$request->start;
        $calendarData->end =$request->end;
        $calendarData->title =$request->event_name;
        $calendarData->description = $request->details;  
        $calendarData->save();
        return back()->with('success', 'Update successful.');
    }

    

public function eventschangestatus(Request $request){
    $calendarData = Calendar::find($request->event_id); 
    $calendarData->status = $request->event_status;  
    $calendarData->save();

    $employeedata=Employee::find($calendarData->employee_id); 
    if($calendarData->leave_type==1)
     {
        // $employeedata->total_number_holiday = $employeedata->total_number_holiday - $calendarData->leave_days;
         $employeedata->total_number_remaining_holiday = $employeedata->total_number_remaining_holiday - $calendarData->leave_days;
     }
    else {
      $employeedata->total_number_child_holiday = $employeedata->total_number_child_holiday - $calendarData->leave_days;
     // $employeedata->total_number_remaining_holiday = $employeedata->total_number_remaining_holiday - $calendarData->leave_days;
    } 
    $employeedata->save();  
    return response()->json(1);
}


}
