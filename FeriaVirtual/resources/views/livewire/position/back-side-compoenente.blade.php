<div>
    @if ($left)
    @livewire('position.left-side-compoenente')
    @elseif($right)
    @livewire('position.right-side-compoenente')
    @elseif($front)
    @livewire('principal.facade-feria-component')
    @elseif($goToFeria)
    @livewire('principal.feria-component')
    @else
    <div> @include('livewire.position.imgBlack') </div>
    @endif
</div>