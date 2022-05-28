<div class="row">

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Institution Logo</h3>
            </div>
            <div class="card-body">
                <div class="box-profile">
                    <div class="text-center">
                        <livewire:institution::org-logo />
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="col-lg-9 col-md-6 col-sm-12">

        <div class="card card-outline">
            <x-adminlte-validation />
            <form wire:submit.prevent="save">
    
                <div class="card-header">
                    <h3 class="card-title text-bold">Institution Information</h3>
                    <button type="submit" class="float-right btn btn-sm btn-primary">
                        <i class="fas fa-check-circle"></i> Save
                    </button>
                </div>
    
                <div class="card-body">
    
                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Company Name
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model.lazy="settings.company_name"  class="form-control"  />
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Company Acronym
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model.lazy="settings.company_acronym"  class="form-control"  />
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Email Address
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model.lazy="settings.company_email"  class="form-control"  />
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Telephone
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model.lazy="settings.company_telephone"  class="form-control"  />
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Contact Address
                        </label>
                        <div class="col-sm-4">
                            <input type="text" wire:model.lazy="settings.company_address"  class="form-control"  />
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Company Website
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model.lazy="settings.company_website"  class="form-control"  />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Country
                        </label>

                        <div class="col-sm-6">
                            <select wire:model.lazy="settings.company_country" class="form-control select2"  >
                                @foreach ($viewBag->get('country') as $country)
                                    <option value="{{$country}}">{{$country}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    
</div>
