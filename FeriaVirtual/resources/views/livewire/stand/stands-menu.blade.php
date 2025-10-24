<div>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="standsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Stands
        </button>
        <ul class="dropdown-menu" aria-labelledby="standsDropdown">
            @foreach ($stands as $stand)
                <li><a class="dropdown-item" href="#">{{ $stand->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
