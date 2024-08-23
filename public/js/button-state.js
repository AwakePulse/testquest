document.addEventListener('DOMContentLoaded', () => {
    let form = document.getElementById('lead_form_id');
    let buttonUpdate = document.getElementById('btn_update');

    function nullForm() {
        let allFill = true;
        let isChange = false;

        form.querySelectorAll('input, textarea, select').forEach(function (input) {
            if(input.value === '') {
                allFill = false;
            }

            if(input.value !== input.defaultValue) {
                isChange = true;
            }
        });

        buttonUpdate.disabled = !(allFill && isChange);
    }

    form.querySelectorAll('input, textarea, select').forEach(function (input) {
        input.addEventListener('input', nullForm);
        input.addEventListener('change', nullForm);
    })
});
