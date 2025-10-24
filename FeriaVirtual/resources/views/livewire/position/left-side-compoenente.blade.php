<div>
    @if ($back)
    @livewire('position.back-side-compoenente')
    @elseif($right)
    @livewire('position.right-side-compoenente')
    @elseif($front)
    @livewire('principal.facade-feria-component')
    @elseif($goToFeria)
    @livewire('principal.feria-component')
    @else
    <div>
        @include('livewire.position.left')
    </div>
    @endif
</div>
