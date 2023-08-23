<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\students_info;
use App\Models\register_info;
use App\Events\AlertEvent;
use DB;


class MainController extends Controller
{
    public function register(Request $req )
    {

        if($req->hasFile('receipt')){
            $distination_path = 'public\uploadedImages';
            $receipt = $req->file('receipt');
            // $image_name = $receipt->getClientOriginalName();
            $image_name = time() . '.' . $req->receipt->extension();
            $path = $req->file('receipt')->storeAs($distination_path , $image_name);
        }
        
        // $newName = $req->file('receipt')->store('uploadedImages');

        // $imageName = time() . '.' . $req->receipt->extension();

        //$newName = $req->file('receipt')->store('public\images');
        //$newName = $req->file('receipt')->store('public\uploadedImages');

        // if($req->hasFile('receipt')){
        //     $path = public_path('public\uploadedImages');
               
        //     $imageName = time() . '.' . $req->receipt->extension();
        //     $req->receipt->move($path, $imageName);
    
        //     $image = new Image();
        //     $image->name = $imageName;
        //     $image->save();

        // }
        
        // $newName = $req->file('receipt')->store('public\uploadedImages');
        // $newname2 = $req->image->hashName();
        
        $student = new Student;

        $student->st_name = $req->input('name');
        $student->st_id = $req->input('id');
        $student->st_mobile = $req->input('mobile1');
        $student->p_mobile = $req->input('mobile2');
        $student->lat = $req->input('lat');
        $student->lng = $req->input('lng');
        $student->depositor = $req->input('depositor');
        $student->accountNo = $req->input('accountNo');
        $student->receipt = $image_name;
    
        $student->save();

        return redirect('/done');
    }
    
    public function showMessage()
    {
        return view('pages.done');
    }


    // public function transportationMap(Request $req )
    // {
    //     $locations = [
    //         ['Mumbai', 19.0760,72.8777],
    //         ['Pune', 18.5204,73.8567],
    //         ['Bhopal ', 23.2599,77.4126],
    //         ['Agra', 27.1767,78.0081],
    //         ['Delhi', 28.7041,77.1025],
    //         ['Rajkot', 22.2734719,70.7512559],
    //     ];
    //     //return view('googleAutocomplete');

    //      return view('pages.activeMap');
    // }



    public function transportationMap(Request $request)
        {
            // $locations = [
            //     ["lat" => 40.9716, "lng" => 20.5946],
            //     ["lat" => 26.9124, "lng" => 75.7873],
            //     ["lat" => 22.2587, "lng" => 71.1924],
            //     ["lat" => 26.386098121475843, "lng" => 43.98043751914063],
            //   ];
            
            //$students = DB::table('students')->select('st_name','st_id','lat','lng')->where('status','approved')->get();
        //$students = DB::table('students')->select('st_name','lat','lng','st_mobile')->get();
        $students = DB::table('students')->select('st_name','lat','lng','st_mobile','areaCode')->where('status','approve')->get();
            //$students = DB::table('students')->get();

            $students->each(function($student) // foreach($posts as $post) { }
            {
               // $locations->put(["lat" => 10.9716, "lng" => 40.5946]);
            });
           
          //return view("pages.activeMap",['locations'=>$locations]);
          return view("pages.activeMap",['locations'=>$students]);
        }

        public function busNoOne(Request $request)
        {
        //$students = DB::table('students')->select('st_name','lat','lng','st_mobile')->where('note','onBus')->where('status','approve')->where('areaCode','1')->get();
        //$students = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('note','onBus')->where('status','approve')->where('areaCode','1')->get();
        $students = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('status','approve')->where('areaCode','1')->get();
          return view("pages.busActiveMap",['locations'=>$students]);
        }
        public function busNoTow(Request $request)
        {
        //$students = DB::table('students')->select('st_name','lat','lng','st_mobile')->where('note','onBus')->where('status','approve')->where('areaCode','1')->get();
        //$students = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('note','onBus')->where('status','approve')->where('areaCode','2')->get();
        $students = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('status','approve')->where('areaCode','2')->get();
          return view("pages.busActiveMap",['locations'=>$students]);
        }
        public function busNoThree(Request $request)
        {
        //$students = DB::table('students')->select('st_name','lat','lng','st_mobile')->where('note','onBus')->where('status','approve')->where('areaCode','1')->get();
        //$students = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('note','onBus')->where('status','approve')->where('areaCode','3')->get();
        $students = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('status','approve')->where('areaCode','3')->get();
          return view("pages.busActiveMap",['locations'=>$students]);
        }
        public function busNoFour(Request $request)
        {
        //$students = DB::table('students')->select('st_name','lat','lng','st_mobile')->where('note','onBus')->where('status','approve')->where('areaCode','1')->get();
        //$students = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('note','onBus')->where('status','approve')->where('areaCode','4')->get();
        $students = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('status','approve')->where('areaCode','4')->get();
          return view("pages.busActiveMap",['locations'=>$students]);
        }
        public function busNoEight(Request $request)
        {
        //$students = DB::table('students')->select('st_name','lat','lng','st_mobile')->where('note','onBus')->where('status','approve')->where('areaCode','1')->get();
        //$students = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('note','onBus')->where('status','approve')->where('areaCode','8')->get();
        $students = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('status','approve')->where('areaCode','8')->get();
          return view("pages.busActiveMap",['locations'=>$students]);
        }

        public function displayOrders(Request $request)
        {
     
            //$students = DB::table('students')->where('status','waiting')->get();
            //$students = DB::table('students')->where('status','waiting')->orWhere('status','approve')->get();
            // $students = DB::table('students')->where('status','!=','disable')->orderBy('status', 'ASC')->get();
            $students = DB::table('students')->where('status','!=','disable')->orderBy('st_name', 'ASC')->get();
            //$posts = Post::orderBy('id', 'DESC')->get();


          //return view("pages.activeMap",['locations'=>$locations]);
          return view("pages.displayOrders",['students'=>$students]);
        }
        public function displayAllOrders(Request $request)
        {
     
            //$students = DB::table('students')->where('status','waiting')->get();
            //$students = DB::table('students')->where('status','waiting')->orWhere('status','approve')->get();
            $students = DB::table('students')->orderBy('status', 'ASC')->get();
            //$posts = Post::orderBy('id', 'DESC')->get();


          //return view("pages.activeMap",['locations'=>$locations]);
          return view("pages.displayOrders",['students'=>$students]);
        }

        public function displayDetails()
        {
            return view('pages.displayDetails');
        }


        public function updateStudentData()
        {
   
            return redirect('/done');                  

        }
        
        
    public function update(Request $req, $id)
    {
        $student = Student::find($id);

        $student->status = "approve";

        if( $req->input('note') == ""){
            $student->note = "onBus";
        }else{
            $student->note =  $req->input('note');
        }
        

        if($student->areaCode == "waiting"){
            $student->areaCode = "";
        }else{
            $student->areaCode = $req->input('areaCode');
        }
        $student->update();
        
        //return view("pages.displayDetails",['students'=>$student]);
        //return view("pages.displayOrders",['students'=>$students]);
        return redirect('displayOrders');
    }

    public function updateStudentInfo(Request $req, $id)
    {
        $student = students_info::find($id);

        $student->fKey = $req->fKey;
        //$student->st_name = $req->st_name;
        //$student->st_class = $req->st_class;
        //$student->st_SN = $req->st_SN;
        $student->note1 = $req->note1;
        $student->note2 = $req->note2;
        $student->note3 = $req->note3;
        $student->note4 = $req->note4;
        $student->note5 = $req->note5;

       
        $student->update();
        
        //return view("pages.displayDetails",['students'=>$student]);
        //return view("pages.displayOrders",['students'=>$students]);
        return redirect('displayStudentsInfoEditing');
    }

    
    public function updateSetAreaCode(Request $req, $id)
    {
        $student = Student::find($id);

        $student->areaCode =  $req->input('areaCode');

        $student->update();

        return redirect('busDetails');
    }

    public function updateDelete(Request $req, $id)
    {
        $student = Student::find($id);

        $student->status = "disable";
        $student->areaCode = "disable";
        
        $student->update();
  
        return redirect('displayOrders');
    }

    public function setDelivered(Request $req, $id)
    {
        $student = Student::find($id);

        $student->note = "delivered";

        $student->update();

        //return redirect('busDetails');
        if($req->areaCode=="1"){
            return redirect('busNoOne');
        }elseif($req->areaCode=="2"){
            return redirect('busNoTow');
        }elseif($req->areaCode=="3"){
            return redirect('busNoThree');
        }elseif($req->areaCode=="4"){
            return redirect('busNoFour');
        }elseif($req->areaCode=="8"){
            return redirect('busNoEight');
        }else{
        return redirect('/');
        }
    }

    public function setTakedFromHomeBusNoOne(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "takedFromHome";
        //$student->note = $req->note;
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم الاستلام من المنزل";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoOne');
    }
    public function setDeliverToClubBusNoOne(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "deliverToClub";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم التوصيل لمقر النادي";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoOne');
    }
    public function setTakedFromClubBusNoOne(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "takedFromClub";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم الاستلام من مقر النادي";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoOne');
    }
    public function setDeliverBackHomeBusNoOne(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "deliverBackHome";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم التوصيل للمنزل";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoOne');
    }
    public function setAbsenteeBusNoOne(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "Absentee";
        $student->update();

        $register_info = new register_info;
        $register_info->action = "غياب عن الباص";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();

        return redirect('busNoOne');
    }
    
    public function setTakedFromHomeBusNoTow(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "takedFromHome";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم الاستلام من المنزل";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoTow');
    }
    public function setDeliverToClubBusNoTow(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "deliverToClub";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم التوصيل لمقر النادي";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoTow');
    }
    public function setTakedFromClubBusNoTow(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "takedFromClub";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم الاستلام من مقر النادي";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoTow');
    }
    public function setDeliverBackHomeBusNoTow(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "deliverBackHome";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم التوصيل للمنزل";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoTow');
    }
    public function setAbsenteeBusNoTow(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "Absentee";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "غياب عن الباص";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();

        return redirect('busNoTow');
    }


    public function setTakedFromHomeBusNoThree(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "takedFromHome";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم الاستلام من المنزل";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoThree');
    }
    public function setDeliverToClubBusNoThree(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "deliverToClub";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم التوصيل لمقر النادي";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoThree');
    }
    public function setTakedFromClubBusNoThree(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "takedFromClub";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم الاستلام من مقر النادي";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoThree');
    }
    public function setDeliverBackHomeBusNoThree(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "deliverBackHome";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم التوصيل للمنزل";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoThree');
    }
    public function setAbsenteeBusNoThree(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "Absentee";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "غياب عن الباص";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();

        return redirect('busNoThree');
    }


    public function setTakedFromHomeBusNoFour(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "takedFromHome";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم الاستلام من المنزل";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoFour');
    }
    public function setDeliverToClubBusNoFour(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "deliverToClub";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم التوصيل لمقر النادي";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoFour');
    }
    public function setTakedFromClubBusNoFour(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "takedFromClub";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم الاستلام من مقر النادي";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoFour');
    }
    public function setDeliverBackHomeBusNoFour(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "deliverBackHome";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم التوصيل للمنزل";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoFour');
    }
    public function setAbsenteeBusNoFour(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "Absentee";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "غياب عن الباص";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();

        return redirect('busNoFour');
    }


    public function setTakedFromHomeBusNoEight(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "takedFromHome";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم الاستلام من المنزل";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoEight');
    }
    public function setDeliverToClubBusNoEight(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "deliverToClub";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم التوصيل لمقر النادي";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoEight');
    }
    public function setTakedFromClubBusNoEight(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "takedFromClub";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "تم الاستلام من مقر النادي";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoEight');
    }
    public function setDeliverBackHomeBusNoEight(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "deliverBackHome";
        $student->update();
         
        $register_info = new register_info;
        $register_info->action = "تم التوصيل للمنزل";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();
      
        return redirect('busNoEight');
    }
    public function setAbsenteeBusNoEight(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "Absentee";
        $student->update();
        
        $register_info = new register_info;
        $register_info->action = "غياب عن الباص";
        $register_info->st_id = $id;
        $register_info->note =  $student->st_name;
        $register_info->save();

        return redirect('busNoEight');
    }



    public function setDeliveredBusNoTow(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "delivered";
        $student->update();
        return redirect('busNoTow');
    }
    public function setDeliveredBusNoThree(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "delivered";
        $student->update();
        return redirect('busNoThree');
    }
    public function setDeliveredBusNoFour(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "delivered";
        $student->update();
        return redirect('busNoFour');
    }
    public function setDeliveredBusNoEight(Request $req, $id)
    {
        $student = Student::find($id);
        $student->note = "delivered";
        $student->update();
        return redirect('busNoOneEight');
    }
    
    public function busDetails(Request $request)
        {

            //$students = DB::table('students')->select('st_name','st_id','lat','lng')->where('status','approved')->get();
            $busNo1 = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('areaCode','1')->get();//->where('note','onBus')->get();
            $busNo2 = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('areaCode','2')->get();//->where('note','onBus')->get();
            $busNo3 = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('areaCode','3')->get();//->where('note','onBus')->get();
            $busNo4 = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('areaCode','4')->get();//->where('note','onBus')->get();
            $busNo8 = DB::table('students')->select('id','st_name','lat','lng','st_mobile','areaCode','note')->where('areaCode','8')->get();//->where('note','onBus')->get();
            $noBus  = DB::table('students')->select('id','st_name','lat','lng','st_mobile')->where('areaCode','')->orWhere('areaCode',NULL)->where('status','approve')->get();
            //$students = DB::table('students')->select('st_name','lat','lng','st_mobile')->where('status','approve')->get();
            //$students = DB::table('students')->get();

            $allBuses = ['busNo1'=>$busNo1,'busNo2'=>$busNo2,'busNo3'=>$busNo3,'busNo4'=>$busNo4,'busNo8'=>$busNo8,'noBus'=>$noBus];
           
          return view("pages.busDetails", compact('busNo1','busNo2','busNo3','busNo4','busNo8','noBus'));
        }
        
          public function busNoOneDetails(Request $request)
        {

            $busNo1 = DB::table('students')->select('id','st_name','lat','lng','st_mobile')->where('areaCode','1')->where('note','onBus')->get();

            $allBuses = ['busNo1'=>$busNo1];
           
          return view("pages.busNoOneDetails", compact('busNo1'));
        }
        
        public function mainHomePage(){
            return view('pages.homePage');
        }

        public function attendClassOne(Request $request)
        {
            $lastRecord="---";

            //$lastRecord = register_info::find($id)->orderBy('created_at', 'desc')->first();

            $classNoOne = DB::table('all_students_info')->select('id','st_name','st_class','st_SN')->where('st_class','1')->orderBy('st_name', 'ASC')->get();

            //$classNoOne = ['classNoOne'=>$classNoOne];
           
          return view("pages.attendClass", ['classNoOne'=>$classNoOne,'lastRecord'=>$lastRecord]);
        }
        public function attendClassTow(Request $request)
        {

            $classNoOne = DB::table('all_students_info')->select('id','st_name','st_class','st_SN')->where('st_class','2')->orderBy('st_name', 'ASC')->get();

           
          return view("pages.attendClass", ['classNoOne'=>$classNoOne]);
        }
        public function attendClassThree(Request $request)
        {

            $classNoOne = DB::table('all_students_info')->select('id','st_name','st_class','st_SN')->where('st_class','3')->orderBy('st_name', 'ASC')->get();

           
          return view("pages.attendClass", ['classNoOne'=>$classNoOne]);
        }
        public function attendClassFour(Request $request)
        {

            $classNoOne = DB::table('all_students_info')->select('id','st_name','st_class','st_SN')->where('st_class','4')->orderBy('st_name', 'ASC')->get();

            //$classNoOne = ['classNoOne'=>$classNoOne];
           
          return view("pages.attendClass", ['classNoOne'=>$classNoOne]);
        }



        public function attendClassTowKickStarter(Request $request)
        {

            $classNoOne = DB::table('all_students_info')->select('id','st_name','st_class','st_SN')->where('st_class','2')->get();

           
          return view("pages.attendKickStarter", ['classNoOne'=>$classNoOne]);
        }
        public function attendClassThreeKickStarter(Request $request)
        {

            $classNoOne = DB::table('all_students_info')->select('id','st_name','st_class','st_SN')->where('st_class','3')->get();

           
          return view("pages.attendKickStarter", ['classNoOne'=>$classNoOne]);
        }
        public function attendClassFourKickStarter(Request $request)
        {

            $classNoOne = DB::table('all_students_info')->select('id','st_name','st_class','st_SN')->where('st_class','4')->get();

            //$classNoOne = ['classNoOne'=>$classNoOne];
           
          return view("pages.attendKickStarter", ['classNoOne'=>$classNoOne]);
        }
        
        public function studentCard($id)
        {
            
            $cardInfo = DB::table('all_students_info')->select('st_name','st_class','st_SN','fKey')->where('id', $id)->get(); // id will change to be F_id 'foren key'

           
          return view("pages.studentCard", ['cardInfo'=>$cardInfo]);
        }
        
         
        public function qrInfo($id)
        {
            if($id=='a_empty'){
                $cardInfo = DB::table('students')->where('id', 9999)->get(); // id will change to be F_id 'foren key'
            }else{
            // $cardInfo = DB::table('students')->select('st_name','st_id','st_mobile','p_mobile','lat')->where('id', $id)->get(); // id will change to be F_id 'foren key'
                $cardInfo = DB::table('students')->where('id', $id)->get(); // id will change to be F_id 'foren key'
            // $qrInformation = DB::table('students')->select('st_name')->where('id', $id)->get(); // id will change to be F_id 'foren key'
            
           
            }
            
            
            return view("pages.qrInfo", ['cardInfo'=>$cardInfo]);
        }



        public function registerClassIndex(){
            return view('pages.registrNewStudent');
        }

        public function registerClass(Request $req )
        {
            $student = new students_info;

            $student->st_name = $req->input('st_name');
            $student->st_class = $req->input('st_class');
            $student->st_SN = $req->input('st_SN');
            $student->save();

        return redirect('/done');
        }

        public function displayStudentsInfo(){

            $students = DB::table('all_students_info')->orderBy('st_class', 'ASC')->get();

            return view("pages.displayStudentsInfo",['students'=>$students]);
        }
        
        public function displayStudentsInfoEditing(){

            $students = DB::table('all_students_info')->orderBy('fKey', 'DESC')->get();

            return view("pages.displayStudentsInfoEditing",['students'=>$students]);
        }
        

        public function attendeeClass(Request $req, $id, $st_name , $attend , $class)
    {
   
        $attendNo='غير محدد';
        if($attend == 'One'){
            $attendNo = "AT1";
        }elseif($attend == 'Tow'){
            $attendNo = "AT2";
        }elseif($attend == 'Three'){
            $attendNo = "AT3";
        }

        
        $redirectTo = "/";
        if($class == '1'){
            $redirectTo = "One";
        }elseif($class == '2'){
            $redirectTo = "Tow";
        }elseif($class == '3'){
            $redirectTo = "Three";
        }elseif($class == '4'){
            $redirectTo = "Four";
        }
        
        $register_info = new register_info;
        $register_info->action =  $attendNo ;
        $register_info->st_id = $id;
        $register_info->note =  $st_name;
        $register_info->save();

        return redirect('attendClass'.$redirectTo);//->with( ['merchant' => $merchant] );
    }
    
    public function bussMoving(){

        
        return view("pages.bussMoving");
    }

    public function alert(Request $request){
        $message = $request->message;
        Broadcast(new AlertEvent($message));

        //return view("pages.alert");
    }

    
    public function contactUs(){

        
        return view("pages.contactUs");
    }
    
    // public function attendeeClassOne2(Request $req, $id)
    // {
        
    //     $register_info = new register_info;
    //     $register_info->action = "حاضر الفترة الثانية";
    //     $register_info->st_id = $id;
    //     $register_info->note =  $req->st_name;
    //     $register_info->save();

    //     return redirect('attendClassOne');
    // }

    // public function attendeeClassOne3(Request $req, $id)
    // {
        
    //     $register_info = new register_info;
    //     $register_info->action = "حاضر الفترة الثالثة";
    //     $register_info->st_id = $id;
    //     $register_info->note =  $student->st_name;
    //     $register_info->save();

    //     return redirect('attendClassOne');
    // }

}
