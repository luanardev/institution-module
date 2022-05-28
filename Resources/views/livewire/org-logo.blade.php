<div>

    @if($browseMode)
    <div class="text-center">
        <p>
            @php $logo = Institution::get('company_logo') @endphp
            @if(!empty($logo))
                <img src="{{ asset("storage/{$logo}") }}" class="img-fluid"  />
            @else
                <img src="{{ asset('assets/images/default.png') }}" class="img-fluid" style="max-height: 100px;" />
            @endif
        </p>
        <p>
            <button class="btn btn-sm btn-primary" wire:click="create()">
                <i class="fas fa-upload"></i> Upload
            </button>
        </p>
    </div>

    @endif

    @if($createMode)
        <x-adminlte-validation />
        <form wire:submit.prevent="save">
            
            <div class="form-control">
                <input type="file" wire:model="logo" class="form-control-file" >
            </div>
            <br/>
            <div class="text-center">
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fas fa-check-circle"></i> Save
                </button>
                <button class="btn btn-sm btn-secondary" wire:click="show()">
                    <i class="fas fa-times-circle"></i> Cancel
                </button>
            </div>
        </form>
    @endif
</div>
