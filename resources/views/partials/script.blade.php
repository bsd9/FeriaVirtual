<script defer>
    document.addEventListener("turbo:load", function () {
        initPubFields();
    });

    function initPubFields() {
        const select = document.querySelector('select[name="facade_screen_fronts[position]"]');
        if (!select) return;

        const pub1 = document.querySelector('input[name="principal[publicidad1]"]').closest('.form-group');
        const pub2 = document.querySelector('input[name="facade_screen_fronts[publicidad2]"]').closest('.form-group');
        const pub3 = document.querySelector('input[name="facade_screen_fronts[publicidad3]"]').closest('.form-group');
        const pub4 = document.querySelector('input[name="facade_screen_fronts[publicidad4]"]').closest('.form-group');

        function toggleFields() {
            const value = select.value;

            [pub2, pub3, pub4].forEach(group => {
                if (group) group.style.display = 'none';
            });

            if (value === 'left') {
                if (pub2) pub2.style.display = 'block';
            } else if (value === 'right') {
                if (pub2) pub2.style.display = 'block';
                if (pub3) pub3.style.display = 'block';
                if (pub4) pub4.style.display = 'block';
            }
        }

        toggleFields();
        select.removeEventListener('change', toggleFields);
        select.addEventListener('change', toggleFields);
    }
</script>