<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif
    @if ($catchError)
    <div class="alert alert-danger" id="success-danger">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ $catchError }}
    </div>
     @endif


    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{ trans('Parent_trans.Step1') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{ trans('Parent_trans.Step2') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}" disabled="disabled">3</a>
                <p>{{ trans('Parent_trans.Step3') }}</p>
            </div>
        </div>
    </div>

    <div class="container">
            <div @if($currentStep != 1) style="display: none" @endif class="row setup-content" id="step-1"> 
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{trans('Parent_trans.Email')}}</label>
                                <input type="email" wire:model.live="email" class="form-control">
                                @error('Email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="title">{{trans('Parent_trans.Password')}}</label>
                                <input type="password" wire:model.live="password" class="form-control" >
                                @error('Password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
        
                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{trans('Parent_trans.Name_Father')}}</label>
                                <input type="text" wire:model.live="Name_Father" class="form-control" >
                                @error('Name_Father')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="title">{{trans('Parent_trans.Name_Father_en')}}</label>
                                <input type="text" wire:model.live="Name_Father_en" class="form-control" >
                                @error('Name_Father_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
        
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="title">{{trans('Parent_trans.Job_Father')}}</label>
                                <input type="text" wire:model.live="Job_Father" class="form-control">
                                @error('Job_Father')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="title">{{trans('Parent_trans.Job_Father_en')}}</label>
                                <input type="text" wire:model.live="Job_Father_en" class="form-control">
                                @error('Job_Father_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <div class="col">
                                <label for="title">{{trans('Parent_trans.National_ID_Father')}}</label>
                                <input type="text" wire:model.live="National_ID_Father" class="form-control">
                                @error('National_ID_Father')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="title">{{trans('Parent_trans.Passport_ID_Father')}}</label>
                                <input type="text" wire:model.live="Passport_ID_Father" class="form-control">
                                @error('Passport_ID_Father')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
        
                            <div class="col">
                                <label for="title">{{trans('Parent_trans.Phone_Father')}}</label>
                                <input type="text" wire:model.live="Phone_Father" class="form-control">
                                @error('Phone_Father')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
        
                        </div>
        
        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">{{trans('Parent_trans.Nationality_Father_id')}}</label>
                                <select class="custom-select my-1 mr-sm-2" wire:model.live="Nationality_Father_id">
                                    <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Nationalities as $National)
                                        <option value="{{$National->id}}">{{$National->Name}}</option>
                                    @endforeach
                                </select>
                                @error('Nationality_Father_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputState">{{trans('Parent_trans.Blood_Type_Father_id')}}</label>
                                <select class="custom-select my-1 mr-sm-2" wire:model.live="Blood_Type_Father_id">
                                    <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Type_Bloods as $Type_Blood)
                                        <option value="{{$Type_Blood->id}}">{{$Type_Blood->Name}}</option>
                                    @endforeach
                                </select>
                                @error('Blood_Type_Father_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputZip">{{trans('Parent_trans.Religion_Father_id')}}</label>
                                <select class="custom-select my-1 mr-sm-2" wire:model.live="Religion_Father_id">
                                    <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($Religions as $Religion)
                                        <option value="{{$Religion->id}}">{{$Religion->Name}}</option>
                                    @endforeach
                                </select>
                                @error('Religion_Father_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
        
        
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Father')}}</label>
                            <textarea class="form-control" wire:model.live="Address_Father" id="exampleFormControlTextarea1" rows="4"></textarea>
                            @error('Address_Father')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click.prevent="firstStepSubmit"
                                type="button">{{trans('Parent_trans.Next')}}
                        </button> 
        
                    </div>
                </div>
           
            </div>
           
    </div>
    <div class="container">
                <div @if($currentStep != 2) style="display: none" @endif class="row setup-content" id="step-2"> 
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
            
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('Parent_trans.Name_Mother')}}</label>
                                    <input type="text" wire:model.live="Name_Mother" class="form-control">
                                    @error('Name_Mother')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('Parent_trans.Name_Mother_en')}}</label>
                                    <input type="text" wire:model.live="Name_Mother_en" class="form-control">
                                    @error('Name_Mother_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="title">{{trans('Parent_trans.Job_Mother')}}</label>
                                    <input type="text" wire:model.live="Job_Mother" class="form-control">
                                    @error('Job_Mother')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="title">{{trans('Parent_trans.Job_Mother_en')}}</label>
                                    <input type="text" wire:model.live="Job_Mother_en" class="form-control">
                                    @error('Job_Mother_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
            
                                <div class="col">
                                    <label for="title">{{trans('Parent_trans.National_ID_Mother')}}</label>
                                    <input type="text" wire:model.live="National_ID_Mother" class="form-control">
                                    @error('National_ID_Mother')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('Parent_trans.Passport_ID_Mother')}}</label>
                                    <input type="text" wire:model.live="Passport_ID_Mother" class="form-control">
                                    @error('Passport_ID_Mother')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
            
                                <div class="col">
                                    <label for="title">{{trans('Parent_trans.Phone_Mother')}}</label>
                                    <input type="text" wire:model.live="Phone_Mother" class="form-control">
                                    @error('Phone_Mother')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
            
                            </div>
            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">{{trans('Parent_trans.Nationality_Father_id')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" wire:model.live="Nationality_Mother_id">
                                        <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($Nationalities as $National)
                                            <option value="{{$National->id}}">{{$National->Name}}</option>
                                        @endforeach
                                    </select>
                                    @error('Nationality_Mother_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">{{trans('Parent_trans.Blood_Type_Father_id')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" wire:model.live="Blood_Type_Mother_id">
                                        <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($Type_Bloods as $Type_Blood)
                                            <option value="{{$Type_Blood->id}}">{{$Type_Blood->Name}}</option>
                                        @endforeach
                                    </select>
                                    @error('Blood_Type_Mother_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputZip">{{trans('Parent_trans.Religion_Father_id')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" wire:model.live="Religion_Mother_id">
                                        <option selected>{{trans('Parent_trans.Choose')}}...</option>
                                        @foreach($Religions as $Religion)
                                            <option value="{{$Religion->id}}">{{$Religion->Name}}</option>
                                        @endforeach
                                    </select>
                                    @error('Religion_Mother_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Mother')}}</label>
                                <textarea class="form-control" wire:model.live="Address_Mother" id="exampleFormControlTextarea1"
                                          rows="4"></textarea>
                                @error('Address_Mother')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
                                {{trans('Parent_trans.Back')}}
                            </button>
            
                           <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                                    wire:click="secondStepSubmit">{{trans('Parent_trans.Next')}}</button> 
            
                        </div>
                    </div>
                </div>
    </div>
            
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        @if ($currentStep != 3)
            <div style="display: none" class="row setup-content" id="step-3">
        @endif
        <form wire:submit.prevent="submitForm">

            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من حفظ البيانات ؟</h3><br>
                    <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                            wire:click="back(2)">{{ trans('Parent_trans.Back') }}</button>
                    <button class="btn btn-success btn-sm btn-lg pull-right" 
                            type="submit">{{ trans('Parent_trans.Finish') }}</button>
                </div>
            </div>
        </form>
    </div>
    
</div>
