<div>
  @if ($standsLocation)
  @livewire('principal.feria-component')
  @elseif($back)
  @livewire('position.back-side-compoenente')
  @elseif($left)
  @livewire('position.left-side-compoenente')
  @elseif($right)
  @livewire('position.right-side-compoenente')
  @elseif($front)
  @livewire('position.front-side-compoenente')
  @else

  <div class="position-relative"
    style="height: 100vh; display: flex; justify-content: center; align-items: center;">
    @include('livewire.principal.partials.principal')
  </div>
  @endif

@push('scripts')
<script>
  window.addEventListener('DOMContentLoaded', function () {
            var miModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
            miModal.show();
        })

</script>

@endpush
</div>
