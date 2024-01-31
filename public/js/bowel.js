document.addEventListener('DOMContentLoaded', function() {
    const typeSolidCheckbox = document.getElementById('type_solid');
    const stoolForm = document.getElementById('stool-form');

    typeSolidCheckbox.addEventListener('change', function() {
        if(typeSolidCheckbox.checked) {
            stoolForm.style.display = 'block';
        }else {
            stoolForm.style.display = 'none';
        }
    });
});
    