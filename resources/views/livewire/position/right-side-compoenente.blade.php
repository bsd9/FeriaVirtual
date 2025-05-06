<div>
    @if ($left)
    @livewire('position.left-side-compoenente')
    @elseif($front)
    @livewire('principal.facade-feria-component')
    @elseif($back)
    @livewire('position.back-side-compoenente')
    @elseif($goToFeria)
    @livewire('principal.feria-component')
    @else
    <div>
        @include('livewire.position.right')

    </div>
    @endif
</div>
