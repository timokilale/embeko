/**
 * Custom confirmation dialog handler
 * 
 * This script replaces the browser's native confirm dialog with a Bootstrap modal
 */

document.addEventListener('DOMContentLoaded', function() {
    // Get the modal element
    const confirmationModal = document.getElementById('confirmationModal');
    
    // If the modal doesn't exist on the page, don't proceed
    if (!confirmationModal) return;
    
    // Create a Bootstrap modal instance
    const modal = new bootstrap.Modal(confirmationModal);
    
    // Get the confirmation message element
    const confirmationMessage = document.getElementById('confirmationMessage');
    
    // Get the confirm button
    const confirmBtn = document.getElementById('confirmActionBtn');
    
    // Store the form that will be submitted
    let formToSubmit = null;
    
    // Add event listeners to all elements with data-confirm attribute
    document.querySelectorAll('[data-confirm]').forEach(element => {
        element.addEventListener('click', function(e) {
            // Prevent the default action (form submission or link navigation)
            e.preventDefault();
            
            // Get the confirmation message from the data-confirm attribute
            const message = this.getAttribute('data-confirm');
            
            // Set the confirmation message in the modal
            confirmationMessage.textContent = message;
            
            // If the element is a submit button within a form
            if (this.type === 'submit' && this.form) {
                formToSubmit = this.form;
            } 
            // If the element is a form
            else if (this.tagName === 'FORM') {
                formToSubmit = this;
            }
            // If the element is an anchor with href
            else if (this.tagName === 'A' && this.href) {
                formToSubmit = this;
            }
            
            // Show the modal
            modal.show();
        });
    });
    
    // Add click event listener to the confirm button
    confirmBtn.addEventListener('click', function() {
        if (formToSubmit) {
            // If it's a form, submit it
            if (formToSubmit.tagName === 'FORM') {
                formToSubmit.submit();
            } 
            // If it's an anchor, navigate to its href
            else if (formToSubmit.tagName === 'A') {
                window.location.href = formToSubmit.href;
            }
            
            // Reset formToSubmit
            formToSubmit = null;
        }
        
        // Hide the modal
        modal.hide();
    });
});
