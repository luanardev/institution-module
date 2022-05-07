<div>
 
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
            @empty($campusName)
                Switch Campus
            @else
                {{$campusName}}
            @endif
        </a>
        @if(auth()->user()->hasNoCampus())
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
            <a wire:click.prevent="switch()" href="#" class="dropdown-item">
                All Campuses
            </a>
            <div class="dropdown-divider"></div>
            @foreach ($viewBag->get('campusList') as $campus)
                <a wire:click.prevent="switch({{$campus->id}})" href="#" class="dropdown-item">
                    {{$campus->name}}
                </a>
                <div class="dropdown-divider"></div>
            @endforeach
            
        </div>
        @endrole
        
    </li>
</div>
