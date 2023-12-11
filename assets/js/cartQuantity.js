let timeout = null;
let initialQuantities = {};

initCartCounters()
if (jQuery) {
    jQuery( document.body ).on( 'updated_cart_totals', function(){
        initCartCounters()
    });
}

function initCartCounters() {
    const quantityInputs = document.querySelectorAll('.woocommerce-cart-form__cart-item .qty');
    const quantityIncButtons = document.querySelectorAll('.woocommerce-cart-form__cart-item .wc-block-components-quantity-selector__button--plus');
    const quantityDecButtons = document.querySelectorAll('.woocommerce-cart-form__cart-item .wc-block-components-quantity-selector__button--minus');
    const updateCartButton = document.querySelector('[name="update_cart"]');
    
    if (updateCartButton) document.querySelector('[name="update_cart"]').disabled = false
    
    quantityIncButtons.forEach((button)=>{
        button.addEventListener('click',()=>{
            let quantityInput = button.parentElement?.querySelector('input')
            if (quantityInput) {
                quantityInput.value ++
                quantityInput.dispatchEvent(new Event('input'))
            }
        })
    })
    
    quantityDecButtons.forEach((button)=>{
        button.addEventListener('click',()=>{
            let quantityInput = button.parentElement?.querySelector('input')
            if (quantityInput && quantityInput.value > 0) {
                quantityInput.value --
                quantityInput.dispatchEvent(new Event('input'))
            }
        })
    })
    
    quantityInputs.forEach(function(quantityInput, index) {
        initialQuantities[index] = parseInt(quantityInput.value);
        quantityInput.addEventListener('input', function() {
    
            clearTimeout(timeout);
    
            if (quantityInput.value == '') {
                quantityInput.value = 0
            }
    
            timeout = setTimeout(function() {
                const currentQuantity = parseInt(quantityInput.value, 10);
                if (currentQuantity !== initialQuantities[index]) {
                    if (currentQuantity == 0) {
                        quantityInput.parentElement?.parentElement?.querySelector('.remove').click()
                    }else{
                        updateCartButton.click();
                    }
                }
    
            }, 800);
        });
    
    });
}