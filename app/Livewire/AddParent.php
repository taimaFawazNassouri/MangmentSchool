<?php

namespace App\Livewire;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\User;
use App\Models\Nationalitie;
use App\Models\Type_Blood;
use App\Models\Religion;
use App\Models\My_Parent;
use Illuminate\Support\Facades\Hash;
use App\Rules\UniqueNationalID;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;



class AddParent extends Component
{ 
    public $successMessage = '';

    public $catchError;
    public $currentStep = 1;
   
    // Father_INPUTS
    public  
           $id, $email, $password, $Name_Father, $Name_Father_en,
            $National_ID_Father, $Passport_ID_Father,
            $Phone_Father, $Job_Father, $Job_Father_en,
            $Nationality_Father_id, $Blood_Type_Father_id,
            $Address_Father, $Religion_Father_id;
    
    // Mother_INPUTS
    public $Name_Mother, $Name_Mother_en,
            $National_ID_Mother, $Passport_ID_Mother,
            $Phone_Mother, $Job_Mother, $Job_Mother_en,
            $Nationality_Mother_id, $Blood_Type_Mother_id,
            $Address_Mother, $Religion_Mother_id;
    
    public function updated($propertyName)
    {
        // $this->validateOnly($propertyName,[
        //     'email' => 'required|email',
        //     'National_ID_Father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
        //     'Passport_ID_Father' => 'min:10|max:10',
        //     'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        //     'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
        //     'Passport_ID_Mother' => 'min:10|max:10',
        //     'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        // ]); 
     
       
    }
  

    public function render()
    {
        return view('livewire.add-parent',[
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => Type_Blood::all(),
            'Religions' => Religion::all(),
        ]);
    }
    //firstStepSubmit
    public function firstStepSubmit()
    { 
    //    $this->validate([
    //         'email' => 'required|unique:my__parents,email,'. $this->id,
    //         'password' => 'required',
    //         'Name_Father' => 'required',
    //         'Name_Father_en' => 'required',
    //         'Job_Father' => 'required',
    //         'Job_Father_en' => 'required',
    //         'National_ID_Father' => 'required|unique:my__parents,National_ID_Father,' . $this->id,
    //         'Passport_ID_Father' => 'required|unique:my__parents,Passport_ID_Father,' . $this->id,
    //         'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    //         'Nationality_Father_id' => 'required',
    //         'Blood_Type_Father_id' => 'required',
    //         'Religion_Father_id' => 'required',
    //         'Address_Father' => 'required',
    //     ]);

        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {

        // $this->validate([
        //     'Name_Mother' => 'required',
        //     'Name_Mother_en' => 'required',
        //     'National_ID_Mother' => 'required|unique:my__parents,National_ID_Mother,' . $this->id,
        //     'Passport_ID_Mother' => 'required|unique:my__parents,Passport_ID_Mother,' . $this->id,
        //     'Phone_Mother' => 'required',
        //     'Job_Mother' => 'required',
        //     'Job_Mother_en' => 'required',
        //     'Nationality_Mother_id' => 'required',
        //     'Blood_Type_Mother_id' => 'required',
        //     'Religion_Mother_id' => 'required',
        //     'Address_Mother' => 'required',
        // ]);

        $this->currentStep = 3;
    }

   
    public function submitForm()
    {
        // dd($this);
     
        $My_Parent = new My_Parent();

        
        // Father_INPUTS
        $My_Parent->email = $this->email;
        $My_Parent->password = Hash::make($this->password);
        $My_Parent->Name_Father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
        $My_Parent->National_ID_Father = $this->National_ID_Father;
        $My_Parent->Passport_ID_Father = $this->Passport_ID_Father;
        $My_Parent->Phone_Father = $this->Phone_Father;
        $My_Parent->Job_Father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
        $My_Parent->Nationality_Father_id = $this->Nationality_Father_id;
        $My_Parent->Blood_Type_Father_id = $this->Blood_Type_Father_id;
        $My_Parent->Religion_Father_id = $this->Religion_Father_id;
        $My_Parent->Address_Father = $this->Address_Father;
        
        // Mother_INPUTS
        $My_Parent->Name_Mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
        $My_Parent->National_ID_Mother = $this->National_ID_Mother;
        $My_Parent->Passport_ID_Mother = $this->Passport_ID_Mother;
        $My_Parent->Phone_Mother = $this->Phone_Mother;
        $My_Parent->Job_Mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
        $My_Parent->Nationality_Mother_id = $this->Nationality_Mother_id;
        $My_Parent->Blood_Type_Mother_id = $this->Blood_Type_Mother_id;
        $My_Parent->Religion_Mother_id = $this->Religion_Mother_id;
        $My_Parent->Address_Mother = $this->Address_Mother;
        
        // $My_Parent->save();

        My_Parent::create([
            // Father_INPUTS
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'Name_Father' => ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father],
            'National_ID_Father' => $this->National_ID_Father,
            'Passport_ID_Father' => $this->Passport_ID_Father,
            'Phone_Father' => $this->Phone_Father,
            'Job_Father' => ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father],
            'Nationality_Father_id' => $this->Nationality_Father_id,
            'Blood_Type_Father_id' => $this->Blood_Type_Father_id,
            'Religion_Father_id' => $this->Religion_Father_id,
            'Address_Father' => $this->Address_Father,

            // Mother_INPUTS
            'Name_Mother' => ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother],
            'National_ID_Mother' => $this->National_ID_Mother,
            'Passport_ID_Mother' => $this->Passport_ID_Mother,
            'Phone_Mother' => $this->Phone_Mother,
            'Job_Mother' => ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother],
            'Nationality_Mother_id' => $this->Nationality_Mother_id,
            'Blood_Type_Mother_id' => $this->Blood_Type_Mother_id,
            'Religion_Mother_id' => $this->Religion_Mother_id,
            'Address_Mother' => $this->Address_Mother,
        ]);
        
        
        $this->successMessage = trans('messages.success');

        $this->currentStep = 1;
        // try {
            
        // } 
        // catch (\Exception $e) {
        //     $this->catchError = $e->getMessage();
        // }
        
    }
    
    public function back($step){
        $this->currentStep = $step;
    }
}
