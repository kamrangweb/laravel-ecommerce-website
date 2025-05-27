// Contact Form Validation and Handling
$(document).ready(function() {
    const contactForm = $('#contactForm');
    
    // Form validation
    contactForm.validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                minlength: 10
            },
            message: {
                required: true,
                minlength: 10
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must be at least 2 characters long"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            phone: {
                required: "Please enter your phone number",
                minlength: "Please enter a valid phone number"
            },
            message: {
                required: "Please enter your message",
                minlength: "Your message must be at least 10 characters long"
            }
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
            // Show loading state
            const submitBtn = $(form).find('button[type="submit"]');
            const originalText = submitBtn.html();
            submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Sending...');
            submitBtn.prop('disabled', true);

            // Submit form via AJAX
            $.ajax({
                url: form.action,
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Message Sent!',
                        text: 'Thank you for contacting us. We will get back to you soon.',
                        confirmButtonColor: '#007bff'
                    });
                    
                    // Reset form
                    form.reset();
                    $(form).find('.is-invalid').removeClass('is-invalid');
                },
                error: function(xhr) {
                    // Show error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! Please try again later.',
                        confirmButtonColor: '#007bff'
                    });
                },
                complete: function() {
                    // Reset button state
                    submitBtn.html(originalText);
                    submitBtn.prop('disabled', false);
                }
            });
        }
    });

    // Phone number formatting
    $('input[name="phone"]').on('input', function() {
        let value = $(this).val().replace(/\D/g, '');
        if (value.length > 0) {
            value = value.match(new RegExp('.{1,3}', 'g')).join('-');
        }
        $(this).val(value);
    });
}); 