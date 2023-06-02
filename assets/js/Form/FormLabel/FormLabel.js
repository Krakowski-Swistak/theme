class FormLabel {
    
    static inputs = document.querySelectorAll('.ks-input');
    static activeClassName = 'active';
    static acfFieldClassName = '.acf-field';

    static toggleLabelClassNameIfEmpty(input, value) {
        const parentField = input.closest(FormLabel.acfFieldClassName);
        if(!value) {
            parentField.classList.remove(FormLabel.activeClassName);
        }
        else {
            parentField.classList.add(FormLabel.activeClassName);
        }
    }

    static eachInputInit() {
        FormLabel.inputs.forEach(input => {
            FormLabel.toggleLabelClassNameIfEmpty(input, input.value)
            input.addEventListener('change', (e) => {
                FormLabel.toggleLabelClassNameIfEmpty(input, e.target.value)
            })
        })
    }
}

document.addEventListener('DOMContentLoaded', function() {
    FormLabel.eachInputInit();
})