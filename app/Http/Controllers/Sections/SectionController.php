<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Section;
use App\Http\Requests\StoreSectionRequest;
use Illuminate\Http\Request;
use Toastr;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $Grades = Grade::with('Sections')->get();
        $list_Grades = Grade::all();
        return view('Sections.sections',compact('Grades','list_Grades'));
    }


    public function getClasses($id){
        $data = Classroom::where('Grade_id',$id)->pluck('Name','id');
        return $data;
    }

  
    public function store(StoreSectionRequest $request)
    {
        try{
           DB::beginTransaction();
           $validated = $request->validated();
           $sections = new Section();
           $sections->Name = ['en' => $request['Name_Section_En'],'ar' => $request['Name_Section_Ar']];
           $sections->Grade_id = $request->Grade_id;
           $sections->Class_id = $request->Class_id;
           $sections->save();


          
           DB::commit();
           Toastr::success(trans('messages.added_successfully!'));
           return redirect()->back();
          
         }
         catch (\Exception $e) {
           DB::rollback();
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }

   
  
    
    public function update(StoreSectionRequest $request)
    {
        try{
            DB::beginTransaction();
            $validated = $request->validated();
            $sections = Section::findOrFail($request->id);
            $sections->Name = ['en'=>$request['Name_Section_En'],'ar' =>$request['Name_Section_Ar']];
            $sections->Grade_id = $request->Grade_id;
            $sections->Class_id= $request->Class_id;
            if(isset($request->Status)){
                $sections->Status = 1;
            }
       
            else{
                $sections->Status = 2;
            }

            $sections->save();
            DB::commit();
            Toastr::success(trans('messages.updated_successfully!'));
            return redirect()->back();
           
          }
          catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
        
    }

   
    public function destroy(Request $request)
    {
       Section::destroy($request->id);
       Toastr::success(trans('messages.deleted_successfully!'));
       return redirect()->back();
     
    }
}
