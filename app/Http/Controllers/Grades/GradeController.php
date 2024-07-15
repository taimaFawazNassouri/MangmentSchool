<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGradeRequest;
use App\Models\Grade;
use App\Models\Classroom;
use Toastr;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $Grades = Grade::all();
        return view('grades.empty',compact('Grades'));
    }

  
    public function store(StoreGradeRequest $request)
    {  
        try{
            $validated = $request->validated();
            $Grades = new Grade();
            // $translation = 
            // [
            //  'en' => $request->Name_en ,
            //  'ar' => $request->Name
            // ];
            // $Grades->setTranslation ('Name',$translation);
            $Grades->Name = ['en' => $request->Name_en ,'ar' => $request->Name];
            $Grades->Notes = $request->Notes;
            $Grades->save();
            Toastr::success(trans('messages.added_successfully!'));
            return redirect()->back();
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

  
    public function update(StoreGradeRequest $request)
    {
       try{ 
           $validated = $request->validated(); 
           $Grades = Grade::findOrFail($request->id);
           $Grades->update([
            'Name' => ['en' => $request->Name_en ,'ar' => $request->Name],
            'Notes' => $request->Notes,
           ]);
           $Grades->save();
           Toastr::success(trans('messages.updated_successfully!'));
           return redirect()->back();

       }
        catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {   
        $gradeId = $request->id;
        $countClassroom = Classroom::where('Grade_id',$gradeId)->count();
        if($countClassroom > 0)
        {
            Toastr::error(trans('messages.cannot_delete_grade_with_classrooms'));
        }
        else
        {
            Grade::destroy($request->id);
            Toastr::success(trans('messages.deleted_successfully!'));
            return redirect()->route('Grades.index');
            
        
        }
       
    return redirect()->route('Grades.index');   
    }
}
