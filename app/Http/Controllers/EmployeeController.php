<?php
namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Familydetail;
use App\Models\Employeevisadetail;
use App\Models\Employeecompanie;
use App\Models\Employeedegree;
use App\Models\Employeetravele;
use App\Models\Calendar;
use App\Models\Employeeholiday;
use App\Models\Kayearlyholiday;
use App\Models\Employeedocument;
use Session;
use DB;
use Carbon\Carbon;
use Mail;



class EmployeeController extends Controller
{
    
    public function index()
    {
       
        $data = Employee::find(1);
        exit($data);
       // return view('tutor.index');
    }


    public function addemployee(Request $request){  
        $employeedata=Employee::where('email',$request->form_email)->get(); 
 
        if(count($employeedata)>=1){
            if($employeedata[0]->email_verification_status==0){
                return back()->with('error', 'Already registered please check your email for verification.');
            } else if($employeedata[0]->admin_verification_status==0){
                return back()->with('error', 'Already registered wait for Admin verification.');
            }
        } else {
            $data =  new Employee;
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name; 
            $data->katakana = $request->form_Katakana; 
            $data->email = $request->form_email; 
            $data->japanese_mobile = $request->form_mobile; 
            $data->dob = $request->form_date_birth;  
            $data->password = md5($request->form_password); 
            $data->email_verification_status = 1; // md5($request->form_password); 
            $data->admin_verification_status = 1 ;  //md5($request->form_password); 
            $data->save();
            return back()->with('success', 'Please check your email for confirmation.');
        } 
       
    } 


    public function emailvarifiedcreatepassword($stringVar){ 
            $record = DB::select("select * from employees where md5(id) ='".$stringVar."' ");
           // dd($record[0]->id);
            if(isset($record))
               return view('resetforgotpassword',compact('stringVar'));
            else {
                 return redirect('KAEmployee')->with('error', 'Something wrong.');
            //return back()->with('error', 'Already registered wait for Admin verification.');
            }
            
    }


    public function EmployeeVerificationCode($stringVar){ 
        $record = DB::select("select * from employees where md5(id) ='".$stringVar."' ");
       // dd($record[0]->id);
        if(isset($record))
           return view('createpassword',compact('stringVar'));
        else {
             return redirect('KAEmployee')->with('error', 'Something wrong.');
        //return back()->with('error', 'Already registered wait for Admin verification.');
        }
        
}




    public function restforgotpassword(Request $request){
       // dd($request->all());
        //$request->stringVar 
        $record = DB::select("select * from employees where md5(id) ='".$request->stringVar."' ");
        
         if(isset($record)){
         $employeedata = Employee::find($record[0]->id);
        // dd($employeedata);
         $employeedata->password = md5($request->password); 
         $employeedata->employee_status = 1;
         $employeedata->save();
         return back()->with('success', 'Changed successful.');
      }  else {
        return back()->with('error', 'Current password not matched.');
      }
    }

    public function postforgotpassword(Request $request){
        //dd($request->all());
      //  print_r($request->all());
        $data = array(); 
        $companiesEmail = 'goud.deepak@gmail.com' ;
        $employeedata=Employee::where('email',$request->email)->get(); 
      //  dd($employeedata);
        if(count($employeedata)==1){
            if($employeedata[0]->email_verification_status==0){
                return back()->with('error', 'Already registered please check your email for verification.');
            } else if($employeedata[0]->admin_verification_status==0){
                return back()->with('error', 'Already registered wait for Admin verification.');
            }else { 

                 $token = md5($employeedata[0]->id);           
                 $url = 'http://athostechnologies.in/athostechnologies.in/dev/public/emailvarifiedcreatepassword/'.$token; 
               // dd($url);

               mail($request->email,$companiesEmail,$url);
            //     Mail::send([], $data, function($message) use ($request, $companiesEmail,$employeedata,$url){
            //        $message->to($request->email, $employeedata[0]->first_name)->subject('KA Portal: Forgot Passoword');
            //        $message->from($companiesEmail,$companiesEmail);
            //        $message->setBody('<h4>Dear '.$employeedata[0]->first_name.',</h4> Please click here for verified email id '.$url.'<br> by Admin.', 'text/html'); 
            //    }); 
              return back()->with('success', 'Please check your email.');
             }
        } 
    }

    public function loginemployee(Request $request){
        // dd($request->all());

        $employeedata=Employee::where('email',$request->email)->where('password',md5($request->password))->get(); 
        
        if(count($employeedata)==1){
            if($employeedata[0]->email_verification_status==0){
                return back()->with('error', 'Already registered please check your email for verification.');
            } else if($employeedata[0]->admin_verification_status==0){
                return back()->with('error', 'Already registered wait for Admin verification.');
            } else {
                 $sessionData = array('emp_name' => $employeedata[0]->first_name.' '.$employeedata[0]->last_name,'emp_email' => $employeedata[0]->email,'emp_id' => $employeedata[0]->id);
                 Session::put('employeeSession',$sessionData);
                return redirect('KAEmployee')->with('success', 'Login successful.');
            }
        } else { 
            return back()->with('error', 'please entere correct password.');
        }  
 }

    public function dashboard(){
       // dd(Session::get('employeeSession')); 
        $employee_id = Session::get('employeeSession')['emp_id'];  
        $employeedata=Employee::find($employee_id);  


        return view('employee.dashboard',compact('employeedata'));
    }


    public function saveemployeeaboutus(Request $request){
       // dd($request->all());
        $employee_id = Session::get('employeeSession')['emp_id'];  
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
        return redirect('KAEmployee')->with('success', 'Update successful.');

    }

    public function emergancycontact(){
        // dd(Session::get('employeeSession')); 
         $employee_id = Session::get('employeeSession')['emp_id'];  
         $employeedata=Employee::find($employee_id);  
         return view('employee.emergancycontact',compact('employeedata'));
     }

     public function bankinformation(){
        // dd(Session::get('employeeSession')); 
         $employee_id = Session::get('employeeSession')['emp_id'];  
         $employeedata=Employee::find($employee_id);  
         return view('employee.bankinformation',compact('employeedata'));
     }

     public function familyinformation(){
        // dd(Session::get('employeeSession')); 
         $employee_id = Session::get('employeeSession')['emp_id'];  
         $employeedata=Employee::find($employee_id); 
         $employeefamilydata=Familydetail::where('employee_id' , $employee_id)->get(); 
         return view('employee.familyinformation',compact('employeedata','employeefamilydata'));
     }

     public function employeestatus(){
        // dd(Session::get('employeeSession')); 
         $employee_id = Session::get('employeeSession')['emp_id'];  
         $employeedata=Employee::find($employee_id);  
         return view('employee.employeestatus',compact('employeedata'));
     }

     public function insurance(){
        // dd(Session::get('employeeSession')); 
         $employee_id = Session::get('employeeSession')['emp_id'];  
         $employeedata=Employee::find($employee_id);  
         return view('employee.insurance',compact('employeedata'));
     }

     public function visa(){
        // dd(Session::get('employeeSession')); 
         $employee_id = Session::get('employeeSession')['emp_id'];  
         $employeedata=Employee::find($employee_id); 
         $employeevisadetaildata=Employeevisadetail::where('employee_id',$employee_id)->get(); 
         $employeecompaniedata=Employeecompanie::where('employee_id',$employee_id)->get(); 
         $employeedegreedata=Employeedegree::where('employee_id',$employee_id)->get(); 
         $employeetraveleedata=Employeetravele::where('employee_id',$employee_id)->get(); 
         //echo "<pre/>"; print_r($employeevisadetaildata);


         $employeedocument1=Employeedocument::select('id','documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc1%')->limit(1)->get();  
         $employeedocument12=Employeedocument::select('id','documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc12%')->limit(1)->get();  
         $employeedocument13=Employeedocument::select('id','documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc13%')->limit(1)->get();  
         $employeedocument2=Employeedocument::select('id','documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc2%')->limit(1)->get();  
         $employeedocument22=Employeedocument::select('id','documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc22%')->limit(1)->get();  
         $employeedocument3=Employeedocument::select('id','documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc3%')->limit(1)->get();  
         $employeedocument4=Employeedocument::select('id','documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc4%')->limit(1)->get();  
         $employeedocument5=Employeedocument::select('id','documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc5%')->limit(1)->get();  
         $employeedocument6=Employeedocument::select('id','documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc6%')->limit(1)->get();  
         $employeedocument7=Employeedocument::select('id','documents','documents_status')->where('employee_id' , $employee_id)->where('documents', 'like', '%doc7%')->limit(1)->get();  
       

        

         return view('employee.visa',compact(['employeedata','employeevisadetaildata','employeecompaniedata','employeedegreedata','employeetraveleedata','employeedocument1','employeedocument12','employeedocument13','employeedocument2','employeedocument22','employeedocument3','employeedocument4','employeedocument5','employeedocument6','employeedocument7','employee_id']));
     }

     public function documents(){
        // dd(Session::get('employeeSession')); 
         $employee_id = Session::get('employeeSession')['emp_id'];  
         $employeedata=Employee::find($employee_id);  
         return view('employee.documents',compact('employeedata'));
     }

     public function empchangepassword(){
        // dd(Session::get('employeeSession')); 
         $employee_id = Session::get('employeeSession')['emp_id'];  
         $employeedata=Employee::find($employee_id);  
         return view('employee.changepassword',compact('employeedata'));
     }


     public function forgotpassword(){
        
        // dd(Session::get('employeeSession')); 
        // $employee_id = Session::get('employeeSession')['emp_id'];  
        // $employeedata['id']=1 ; //Employee::find($employee_id);  
         return view('forgot');
     }


     public function employeeholiday(){
       
         $employee_id = Session::get('employeeSession')['emp_id'];  
         $employeedata=Employee::find($employee_id);  
         $employeefamilyCount=Familydetail::where('employee_id', $employee_id)->where('member_relations','child')->count('id'); 
         // get entry in employee holiday 
       
         $result = 0;

         if($employeedata->holiday_issue_date){ 
            $date1 = Carbon::createFromFormat('Y-m-d' , $employeedata->holiday_issue_date);
            $date2 = Carbon::now(); 
            $result = $date2->gt($date1);  // current date  should be grether then     
         }
    
       //  dd($result);
        if($result){ 
                $holiday  =  Employeeholiday::where('employee_id',$employee_id)->where('year_of_holiday', Carbon::now()->year)->get();
             //   dd($holiday);
               if(count($holiday)==0){ 
                 // year = 0 means current year 1 year 
                 // year = 1 means 2 years 
                 // year = 2 means 3 years 
                $datework = Carbon::createFromDate($employeedata->holiday_issue_date);
                $now = Carbon::now();
                $Years = $datework->diffInYears($now); 


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
                $currentholiday = 0;   
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

                $currentYear = $now->year;
                $currentexitornot = Employeeholiday::where('employee_id',$employee_id)->where('year_of_holiday',$currentYear)->orderBy('created_at','desc')->first();
                $previousHoliday= Employeeholiday::where('employee_id',$employee_id)->where('year_of_holiday',$currentYear-1)->orderBy('created_at','desc')->first();
 

                  if($currentexitornot==null){
                    $data = new Employeeholiday;
                    $data->employee_id	 = $employee_id;
                    $data->number_of_holiday = $currentholiday;
                    $data->used_holiday =0;
                    $data->remaining_holiday =$currentholiday+$previousHoliday->remaining_holiday;
                    $data->year_of_holiday =$currentYear;
                    $data->save();   
                  }


                //    $holidayData = new Employeeholiday;
                //    $holidayData->employee_id = $employee_id;
                //    $holidayData->number_of_holiday = $number_of_holiday;
                //    $holidayData->remaining_holiday=$employeedata->total_number_holiday;
                //    $holidayData->year_of_holiday= Carbon::now()->year;
                //    $holidayData->save(); 

                  // $employeedata->total_number_holiday = $number_of_holiday+$employeedata->total_number_holiday;
                 // $employeedata->total_number_remaining_holiday = $number_of_holiday+$employeedata->total_number_holiday;
                   $leaveDays =  0;
                   if($employeefamilyCount==1)
                    $leaveDays = 5;
                   
                   if($employeefamilyCount>1){
                     $leaveDays = 10; 
                   }
                   $employeedata->total_number_child_holiday =$leaveDays;
                   $employeedata->save();


               }

            }



         // employee 
         $monthlyCount  = DB::table('calendars')->where('employee_id',$employee_id)->whereMonth('start', Carbon::now()->month)->where([['status','=',2],['leave_type','=', 1]])->sum('leave_days');
         $yearCount  = DB::table('calendars')->where('employee_id',$employee_id)->whereYear('start', Carbon::now()->year)->where([['status','=',2],['leave_type','=', 1]])->sum('leave_days');
         $totalPaidLeave =  DB::table('calendars')->where('employee_id',$employee_id)->where([['status','=',2],['leave_type','=', 1]])->sum('leave_days');
          
         // child 
         $childmonthlyCount  = DB::table('calendars')->where('employee_id',$employee_id)->whereMonth('start', Carbon::now()->month)->where([['status','=',2],['leave_type','=', 2]])->sum('leave_days');
         $childyearCount  = DB::table('calendars')->where('employee_id',$employee_id)->whereYear('start', Carbon::now()->year)->where([['status','=',2],['leave_type','=', 2]])->sum('leave_days');
         $childtotalPaidLeave =  DB::table('calendars')->where('employee_id',$employee_id)->where([['status','=',2],['leave_type','=', 2]])->sum('leave_days');
  
         return view('employee.employeeholiday',compact('childtotalPaidLeave','childyearCount','childmonthlyCount','employeedata','monthlyCount','yearCount','totalPaidLeave','employeefamilyCount'));
     }

     public function postchangepassword(Request $request){
        // dd($request->all());
         $employee_id =  $request->employee_id;
         $employeedata=Employee::where('id',$employee_id)->where('password',md5($request->current_password))->get();  
      
       
         if(count($employeedata)){
             $employeedata =  Employee::find($employee_id);
            $employeedata->password = md5($request->new_password); 
            $employeedata->save();
            return back()->with('success', 'Changed successful.');
         }  else {
            return back()->with('error', 'Current password not matched.');
         }
         
     }


    public function saveemergancycontact(Request $request){
        // dd($request->all());
         $employee_id = Session::get('employeeSession')['emp_id'];  
         $employeedata=Employee::find($employee_id);  
         $employeedata->emergancy_name = $request->emergancy_name;
         $employeedata->emergancy_relation = $request->emergancy_relation;
         $employeedata->emergancy_phone = $request->emergancy_phone; 
         $employeedata->save();
          return back()->with('success', 'Update successful.');
     }

     public function savebankinformation(Request $request){
        // dd($request->all());
         $employee_id = Session::get('employeeSession')['emp_id'];  
         $employeedata=Employee::find($employee_id);  
         $employeedata->bank_registered_name = $request->bank_registered_name;
         $employeedata->bank_name = $request->bank_name;
         $employeedata->bank_branch_name = $request->bank_branch_name; 
         $employeedata->bank_branch_number = $request->bank_branch_number;
         $employeedata->bank_account_number = $request->bank_account_number; 
         $employeedata->save();
         return redirect('BankInformation')->with('success', 'Update successful.');
 
     }


     public function savefamily(Request $request){
        // dd($request->all());   
         $employee_id = Session::get('employeeSession')['emp_id'];  
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
            
         return redirect('FamilyInformation')->with('success', 'Update successful.');
 
     }

     public function saveemployeestatus(Request $request){
        //dd($request->all());
        $employee_id = Session::get('employeeSession')['emp_id'];  
        $employeedata=Employee::find($employee_id);  
        $employeedata->employee_status = $request->employee_status;
        $employeedata->main_school = $request->main_school;
        $employeedata->what_kind_insurance = $request->what_kind_insurance;
        $employeedata->unemployment_insurance_number = $request->unemployment_insurance_number;
        $employeedata->save();
        return redirect('EmployeeStatus')->with('success', 'Update successful.');

    }

    public function saveinsurance(Request $request){
        //dd($request->all());
        $employee_id = Session::get('employeeSession')['emp_id'];  
        $employeedata=Employee::find($employee_id);  
        $employeedata->what_kind_insurance = $request->what_kind_insurance;
        $employeedata->unemployment_insurance_number = $request->unemployment_insurance_number;
        $employeedata->save();
        return redirect('Insurance')->with('success', 'Update successful.');

    }

    public function savevisa(Request $request){
       // dd($request->all());
        $employee_id = Session::get('employeeSession')['emp_id'];  
        $employeedata=Employee::find($employee_id);  
        $employeedata->visa_status = $request->visa_status; 
        // I am a Japanese citizen   I have a family-related visa 
        // No need for save anything  

        $visa_status = 1 ;

        if($request->visa_status=="I am a permanent resident"){
            $visa_status= 2 ;
            $employeedata->residence_validity_date = $request->residence_validity_date_japan;
        }  

        if($request->visa_status=="I have a family-related visa"){
            $visa_status= 3 ; 
        }  

        if($request->visa_status=="I am coming from overseas"){
            $visa_status= 6 ;
            $employeedata->cleared_customs = $request->cleared_customs_and_entered_Japan;
        }

        $employeedata->save();

        // delete all information of employee then update again 
        // Employeevisadetail , Employeedegree , Employeecompanie , Employeetravele


        DB::table('employeecompanies')->where('employee_id', Session::get('employeeSession')['emp_id'])->delete();
        DB::table('employeedegrees')->where('employee_id', Session::get('employeeSession')['emp_id'])->delete();
        DB::table('employeetraveles')->where('employee_id', Session::get('employeeSession')['emp_id'])->delete();
        DB::table('employeevisadetails')->where('employee_id', Session::get('employeeSession')['emp_id'])->delete();
       

        if($request->visa_status=="I have a work visa" || $request->visa_status=="I have a work visa, am currently in Japan"){

            if($request->visa_status=="I have a work visa")
               $visa_status= 4 ; 
            if($request->visa_status=="I have a work visa, am currently in Japan")
               $visa_status= 5 ; 
        
             $visaDetails =  new Employeevisadetail; 
             $visaDetails->employee_id = Session::get('employeeSession')['emp_id'];  
             $visaDetails->type_of_visa = $request->work_visa;
             $visaDetails->visa_expire_year = $request->currentvisaYear;
            // $visaDetails->visa_expire_month = $request->currentvisamonth;
             $visaDetails->valididty_residence_date = $request->validaity_residence_visa;
             $visaDetails->save(); 
             $degreeDetails =  new Employeedegree; 
             $degreeDetails->employee_id = Session::get('employeeSession')['emp_id'];  
             $degreeDetails->university_name = $request->university_name;
             $degreeDetails->degree = $request->degree;
             $degreeDetails->date_graduation = $request->date_graduation;
             $degreeDetails->overseas_location = $request->overseas_location;
             $degreeDetails->save();

         if(isset($request->company_name)){
             foreach ($request->company_name as $key => $companyname) {
                 if($companyname!=""){
                    $companyDetails =  new Employeecompanie; 
                    $companyDetails->employee_id = Session::get('employeeSession')['emp_id'];  
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
            $degreeDetails->employee_id = Session::get('employeeSession')['emp_id'];  
            $degreeDetails->university_name = $request->university_name;
            $degreeDetails->degree = $request->degree;
            $degreeDetails->date_graduation = $request->date_graduation;
            $degreeDetails->overseas_location = $request->overseas_location;
            $degreeDetails->save();

        if(isset($request->company_name)){
            foreach ($request->company_name as $key => $companyname) {
                if($companyname!=""){
                   $companyDetails =  new Employeecompanie; 
                   $companyDetails->employee_id = Session::get('employeeSession')['emp_id'];  
                   $companyDetails->company_name = $companyname;
                   $companyDetails->start_date = $request->start_date[$key];
                   $companyDetails->end_date = $request->end_date[$key];
                   $companyDetails->save(); 
                } 
              } 
          }  // end if 

          if(isset($request->cleared_customs_and_entered_Japan) && $request->cleared_customs_and_entered_Japan=="1"){
             $traveleData = new Employeetravele;
             $traveleData->employee_id = Session::get('employeeSession')['emp_id'];  
             $traveleData->how_many_time = $request->many_time;
             $traveleData->most_recent_entry_date = $request->most_recent_entry_date;
             $traveleData->most_recent_departure_date = $request->most_recent_departure_date;
             $traveleData->save(); 
          }
          
        }

        if($request->visa_status=="I have a student visa and am currently in Japan"){
            $visa_status= 7 ; 
            $degreeDetails =  new Employeedegree; 
            $degreeDetails->employee_id = Session::get('employeeSession')['emp_id'];  
            $degreeDetails->university_name = $request->university_name;
            $degreeDetails->degree = $request->degree;
            $degreeDetails->date_graduation = $request->date_graduation;
            $degreeDetails->overseas_location = $request->overseas_location;
            $degreeDetails->save(); 
        } 

        if($request->file()) {  
           // DB::table('employeedocuments')->where('employee_id', Session::get('employeeSession')['emp_id'])->delete();
        
            if($request->document1 && $request->image1==0){
                $fileName = 'doc1_'.time().'.'.$request->document1->extension();  
                $request->document1->move(public_path('uploads'), $fileName);  
                $EmployeedocumentData = new Employeedocument;
                $EmployeedocumentData->employee_id = Session::get('employeeSession')['emp_id'];  
                $EmployeedocumentData->visa_status = $visa_status;
                $EmployeedocumentData->documents_status = 0;
                $EmployeedocumentData->documents =$fileName;
                $EmployeedocumentData->save();
            } else{
                if($request->document1){
                $fileName = 'doc1_'.time().'.'.$request->document1->extension();  
                $request->document1->move(public_path('uploads'), $fileName);  
                $EmployeedocumentData =   Employeedocument::find($request->image1); 
                $EmployeedocumentData->documents =$fileName;
                $EmployeedocumentData->save();
                }
            }

            if($request->document12 && $request->image12==0){
                $fileName12 = 'doc12_'.time().'.'.$request->document12->extension();  
                $request->document12->move(public_path('uploads'), $fileName12);  
                $EmployeedocumentData = new Employeedocument;
                $EmployeedocumentData->employee_id = Session::get('employeeSession')['emp_id'];  
                $EmployeedocumentData->visa_status = $visa_status;
                $EmployeedocumentData->documents_status = 0;
                $EmployeedocumentData->documents =$fileName12;
                $EmployeedocumentData->save();
            }else{ 
                if($request->document12){
                $fileName = 'doc12_'.time().'.'.$request->document12->extension();  
                $request->document12->move(public_path('uploads'), $fileName);  
                $EmployeedocumentData =   Employeedocument::find($request->image12); 
                $EmployeedocumentData->documents =$fileName;
                $EmployeedocumentData->save();
                }
            }

            if($request->document13 && $request->image13==0){
                $fileName13 = 'doc13_'.time().'.'.$request->document13->extension();  
                $request->document13->move(public_path('uploads'), $fileName13);  
                $EmployeedocumentData = new Employeedocument;
                $EmployeedocumentData->employee_id = Session::get('employeeSession')['emp_id'];  
                $EmployeedocumentData->visa_status = $visa_status;
                $EmployeedocumentData->documents_status = 0;
                $EmployeedocumentData->documents =$fileName13;
                $EmployeedocumentData->save();
            }else{ 
                if($request->document13){
                $fileName = 'doc13_'.time().'.'.$request->document13->extension();  
                $request->document13->move(public_path('uploads'), $fileName);  
                $EmployeedocumentData =   Employeedocument::find($request->image13); 
                $EmployeedocumentData->documents =$fileName;
                $EmployeedocumentData->save();
                }
            }
 
            if($request->document2 && $request->image2==0){
                $fileName2 = 'doc2_'.time().'.'.$request->document2->extension();  
                $request->document2->move(public_path('uploads'), $fileName2);  
                $EmployeedocumentData = new Employeedocument;
                $EmployeedocumentData->employee_id = Session::get('employeeSession')['emp_id'];  
                $EmployeedocumentData->visa_status = $visa_status;
                $EmployeedocumentData->documents_status = 0;
                $EmployeedocumentData->documents =$fileName2;
                $EmployeedocumentData->save();
            }else{ 
                if($request->document2){
                   // dd($request->document2);
                $fileName2 = 'doc2_'.time().'.'.$request->document2->extension();  
                $request->document2->move(public_path('uploads'), $fileName2);  
                $EmployeedocumentData =   Employeedocument::find($request->image2); 
                $EmployeedocumentData->documents =$fileName2;
                $EmployeedocumentData->save();
                }
            }

            if($request->document22 && $request->image22==0){
                $fileName22 = 'doc22_'.time().'.'.$request->document22->extension();  
                $request->document22->move(public_path('uploads'), $fileName22);  
                $EmployeedocumentData = new Employeedocument;
                $EmployeedocumentData->employee_id = Session::get('employeeSession')['emp_id'];  
                $EmployeedocumentData->visa_status = $visa_status;
                $EmployeedocumentData->documents_status = 0;
                $EmployeedocumentData->documents =$fileName22;
                $EmployeedocumentData->save();
            }else{ 
                if($request->document22){
                $fileName = 'doc22_'.time().'.'.$request->document22->extension();  
                $request->document22->move(public_path('uploads'), $fileName);  
                $EmployeedocumentData =   Employeedocument::find($request->image22); 
                $EmployeedocumentData->documents =$fileName;
                $EmployeedocumentData->save();
                }
            }


            if($request->document3 && $request->image3==0){
                $fileName3 = 'doc3_'.time().'.'.$request->document3->extension();  
                $request->document3->move(public_path('uploads'), $fileName3);  
                $EmployeedocumentData = new Employeedocument;
                $EmployeedocumentData->employee_id = Session::get('employeeSession')['emp_id'];  
                $EmployeedocumentData->visa_status = $visa_status;
                $EmployeedocumentData->documents_status = 0;
                $EmployeedocumentData->documents =$fileName3;
                $EmployeedocumentData->save();
            }else{ 
                if($request->document3){
                $fileName = 'doc3_'.time().'.'.$request->document3->extension();  
                $request->document3->move(public_path('uploads'), $fileName);  
                $EmployeedocumentData =   Employeedocument::find($request->image3); 
                $EmployeedocumentData->documents =$fileName;
                $EmployeedocumentData->save();
                }
            }

            if($request->document4 && $request->image4==0){
                $fileName4 = 'doc4_'.time().'.'.$request->document4->extension();  
                $request->document4->move(public_path('uploads'), $fileName4);  
                $EmployeedocumentData = new Employeedocument;
                $EmployeedocumentData->employee_id = Session::get('employeeSession')['emp_id'];  
                $EmployeedocumentData->visa_status = $visa_status;
                $EmployeedocumentData->documents_status = 0;
                $EmployeedocumentData->documents =$fileName4;
                $EmployeedocumentData->save();
            }else{ 
                if($request->document4){
                $fileName = 'doc4_'.time().'.'.$request->document4->extension();  
                $request->document4->move(public_path('uploads'), $fileName);  
                $EmployeedocumentData =   Employeedocument::find($request->image4); 
                $EmployeedocumentData->documents =$fileName;
                $EmployeedocumentData->save();
                }
            }

            if($request->document5 && $request->image5==0){
                $fileName5 = 'doc5_'.time().'.'.$request->document5->extension();  
                $request->document5->move(public_path('uploads'), $fileName5);  
                $EmployeedocumentData = new Employeedocument;
                $EmployeedocumentData->employee_id = Session::get('employeeSession')['emp_id'];  
                $EmployeedocumentData->visa_status = $visa_status;
                $EmployeedocumentData->documents_status = 0;
                $EmployeedocumentData->documents =$fileName5;
                $EmployeedocumentData->save();
            }else{ 
                if($request->document5){
                $fileName = 'doc5_'.time().'.'.$request->document5->extension();  
                $request->document5->move(public_path('uploads'), $fileName);  
                $EmployeedocumentData =   Employeedocument::find($request->image5); 
                $EmployeedocumentData->documents =$fileName;
                $EmployeedocumentData->save();
                }
            }

            if($request->document6  && $request->image6==0){
                $fileName6 = 'doc6_'.time().'.'.$request->document6->extension();  
                $request->document6->move(public_path('uploads'), $fileName6);  
                $EmployeedocumentData = new Employeedocument;
                $EmployeedocumentData->employee_id = Session::get('employeeSession')['emp_id'];  
                $EmployeedocumentData->visa_status = $visa_status;
                $EmployeedocumentData->documents_status = 0;
                $EmployeedocumentData->documents =$fileName6;
                $EmployeedocumentData->save();
            }else{ 
                if($request->document6){
                $fileName = 'doc6_'.time().'.'.$request->document6->extension();  
                $request->document6->move(public_path('uploads'), $fileName);  
                $EmployeedocumentData =   Employeedocument::find($request->image6); 
                $EmployeedocumentData->documents =$fileName;
                $EmployeedocumentData->save();
                }
            }
         

            if($request->document7 && $request->image7==0){
                $fileName7 = 'doc7_'.time().'.'.$request->document7->extension();  
                $request->document7->move(public_path('uploads'), $fileName7);  
                $EmployeedocumentData = new Employeedocument;
                $EmployeedocumentData->employee_id = Session::get('employeeSession')['emp_id'];  
                $EmployeedocumentData->visa_status = $visa_status;
                $EmployeedocumentData->documents_status = 0;
                $EmployeedocumentData->documents =$fileName7;
                $EmployeedocumentData->save();
            }else{ 
                if($request->document7){
                $fileName = 'doc7_'.time().'.'.$request->document7->extension();  
                $request->document7->move(public_path('uploads'), $fileName);  
                $EmployeedocumentData =   Employeedocument::find($request->image7); 
                $EmployeedocumentData->documents =$fileName;
                $EmployeedocumentData->save();
                }
            }
          
        } 

        return redirect('Visa')->with('success', 'Update successful.');

    }



    public function postDocument(Request $request){

       

            if($request->file()) { 


                $request->validate([
                    'document1' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
                 ]);

                $fileName = time().'.'.$request->document1->extension();  
                $request->document1->move(public_path('uploads'), $fileName); 

                // $fileModel->name = time().'_'.$request->document1->getClientOriginalName();
                // $fileModel->file_path = '/storage/' . $filePath;
                // $fileModel->save();
    
                return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
            }



    }

// Ajax function 

public function deletefamilymember(Request $request){
    $family  =  Familydetail::find($request->member_id);
    $family->delete();
    return response()->json(1);
}


public function schedulecalendar(Request $request){
    $CalendayData  =  Calendar::where('employee_id',$request->employee_id)->orWhere('employee_id', 0)->get(); 
    return response()->json($CalendayData);
}


public function eventRemove(Request $request){
    $calendarData = Calendar::find($request->event_id);
    if($calendarData->employee_id!=0 && $calendarData->status!=2)
      $calendarData->delete();
    return response()->json(1);
}

public function eventsupdate(Request $request){ 

    $employeedata=Employee::find($request->employee_id);
    $calendarData = Calendar::find($request->event_id); 
    $result =  false;   
    $date = Carbon::parse($request->start);
    $date2 = Carbon::parse($request->end); 
    $diff = $date->diffInDays($date2); 
     // Selected days should not grether then number of holidays
     // if yes then not able to create events
    if($employeedata->total_number_holiday<=$diff){ 
        return response()->json(0);
    }  

    if($calendarData->boxclass=='157af6' || $calendarData->boxclass=='4ca746' ){
        if($employeedata->total_number_child_holiday<=$diff){ 
            return response()->json(0);
        }  
    } 

    if($employeedata->holiday_issue_date){ 
        $date1 = Carbon::createFromFormat('Y-m-d' , $employeedata->holiday_issue_date);
        $date2 = Carbon::now(); 
        $result = $date2->gt($date1);  // current should be grether then  
    }

    if($request->event_description!='' && $calendarData->employee_id!=0)
     {
        $calendarData->description = $request->event_description;
        $calendarData->save();
        return response()->json(1);
     }
     
else if($result && $employeedata->total_number_holiday>$employeedata->total_number_expire_holiday){
   
    if($request->start!=''){
        $calendarData->start = $request->start;  
    } 

    if($request->end!=''){ 
        // $date = Carbon::parse($request->start);
        // $date2 = Carbon::parse($request->end); 
        // $diff = $date->diffInDays($date2); 
 
        $calendarData->leave_days = $diff+1;  
        //157af6 // half day
        if($calendarData->boxclass=='157af6' || $calendarData->boxclass=='4ca746' ){
            $calendarData->leave_days = ($diff*0.5)+0.5; 
        }  
           
        $calendarData->end = $request->end;
    }  
    $calendarData->save();
    return response()->json(1);
  } else{
    return response()->json(0);
  }
}



public function savestartday(Request $request){  
    $employeedata=Employee::find($request->employee_id);  
    if(!isset($employeedata->holiday_issue_date))
        {
            return response()->json(2)->header('Content-Type', 'application/json');
        }   

        if($request->colorclass=='157af6' || $request->colorclass=='4ca746')
        {
            // Half day calculation 
            //$CalendayData->leave_days = 0.5;
            if($employeedata->total_number_holiday<0.5){
                return response()->json(0)->header('Content-Type', 'application/json');
            } 

        } else {
            // Full day calculation 
            if($employeedata->total_number_holiday<1){
                return response()->json(0)->header('Content-Type', 'application/json');
            } 

            
        } 
    $date1 = Carbon::createFromFormat('Y-m-d' , $employeedata->holiday_issue_date);
    $date2 = Carbon::now(); 
    $result = $date2->gt($date1);  // current should be grether then 
    if($result && $employeedata->total_number_holiday>$employeedata->total_number_expire_holiday){
        $CalendayData  =   new Calendar;
        $CalendayData->employee_id = $request->employee_id;
        $CalendayData->start = $request->start_date;
        $CalendayData->title =$request->title;
        $CalendayData->leave_days = 1;
        // child leave type 
        if($request->colorclass=='f8c146' || $request->colorclass=='157af6')
        {
            $CalendayData->leave_type = 2;
        }  else {
            $CalendayData->leave_type = 1;
        }
        // child half days
        if($request->colorclass=='157af6' || $request->colorclass=='4ca746')
        {
            $CalendayData->leave_days = 0.5;
        }
 
        $CalendayData->boxclass = $request->colorclass;
        $CalendayData->save(); 
        return response()->json($CalendayData->id)->header('Content-Type', 'application/json');
    } else {
        return response()->json(0)->header('Content-Type', 'application/json');
    }
  
}
     
     
     
}
