document.addEventListener('DOMContentLoaded', () => {
    const orderForm = document.querySelector('.order-form');

    if (orderForm) {
        orderForm.addEventListener('submit', (event) => {
            event.preventDefault();

            const submitButton = event.target.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.textContent = 'Processing...';

            setTimeout(() => {
                submitButton.disabled = false;
                submitButton.textContent = 'Order Now';
                alert('Order placed successfully!');
            }, 1000);
        });
    }
});