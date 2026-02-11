document.addEventListener('DOMContentLoaded', function () {
    const actionButtons = document.getElementById('action-buttons');

    const requiredFields = [
        'name',
        'address',
        'city',
        'cif',
        'isContact',
        'email',
        'phone',
        'del_term_id',
        'transport_id',
        'payment_term_id',
        'bank_entity_id',
        'discount_id'
    ];

    function checkForm() {
        let allFilled = true;

        requiredFields.forEach(id => {
            const field = document.getElementById(id);
            if (!field || field.value.trim() === '') {
                allFilled = false;
            }
        });

        actionButtons.style.display = allFilled ? 'block' : 'none';
    }

    checkForm();

    requiredFields.forEach(id => {
        const field = document.getElementById(id);
        if (field) {
            field.addEventListener('input', checkForm);
            field.addEventListener('change', checkForm);
        }
    });
});

