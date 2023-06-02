class FormRodo {
    
    static checkbox = document.querySelector('#form-rodo-checkbox input[type="checkbox"]');
    static formBtn = document.querySelector('#contact-form-submit');
        
    static toggleActiveSubmitButton() {
        FormRodo.checkbox.addEventListener('click', () => {
            FormRodo.formBtn.toggleAttribute('disabled');
        })
    }

    static initForm() {
        FormRodo.formBtn.setAttribute('disabled', 'true');
        FormRodo.toggleActiveSubmitButton();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    FormRodo.checkbox.checked = false;
    FormRodo.initForm();
})