<div>   
    <div class="form-inline">
        <div class="input-group">
            <select wire:model="campusCode" class="form-control form-control-sidebar">
                <option value="">All Campuses</option>
                @foreach ($viewBag->get('campusList') as $campus)
                    <option value="{{$campus->code}}">{{$campus->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
