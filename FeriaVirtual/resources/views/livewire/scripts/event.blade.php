<div>
    <script>
        window.addEventListener('DOMContentLoaded', function() {

            window.livewire.on('item-added', Msg => {
                noty(Msg)
                $('#themodal').modal('hide')

            });

        });
    </script>
</div>
