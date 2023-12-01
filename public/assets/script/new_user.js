const modal_user = document.getElementById('modal_user');
const user_form = modal_user.querySelector('#modal_user_form');
const modal_user_new = new bootstrap.Modal(modal_user);

var user_validator = FormValidation.formValidation(
    user_form,
    {
        fields: {
            'user_id': {
                validators: {
                    notEmpty: {
                        message: 'User ID is required',
                    },
                },
            },
            'user_name': {
                validators: {
                    notEmpty: {
                        message: 'User Name is required',
                    },
                },
            },
            'user_email': {
                validators: {
                    notEmpty: {
                        message: 'Email Addreaa is required',
                    },
                },
            },
            'user_group': {
                validators: {
                    different: {
                        compare: function () {
                            return 'Choose Group';
                        },
                        message: 'Please select the group',
                    },
                },
            }
        },

        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: '.fv-row',
                eleInvalidClass: '',
                eleValidClass: ''
            })
        }
    },
);

// Add Submit button handler
const submitButton = modal_user.querySelector('[data-users-modal-action="submit"]');
submitButton.addEventListener('click', e => {
    e.preventDefault();

    // Validate form before submit
    if (user_validator) {
        user_validator.validate().then(function (status) {

            if (status == 'Valid') {
                // Show loading indication
                submitButton.setAttribute('data-kt-indicator', 'on');

                // Disable button to avoid multiple click 
                submitButton.disabled = true;

                // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                setTimeout(function () {
                    // Remove loading indication
                    submitButton.removeAttribute('data-kt-indicator');

                    // Enable button
                    submitButton.disabled = false;

                    // Show popup confirmation 
                    Swal.fire({
                        html: "New user has <b>successfully added!</b>",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            user_form.reset();
                            modal_user_new.hide();
                        }
                    });

                    //form.submit(); // Submit form
                }, 2000);
            } else {
                // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Sorry, looks like there are some errors detected, please try again.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        });
    }
});

const CancelButton = modal_user.querySelector('[data-users-modal-action="cancel"]');
CancelButton.addEventListener('click', e => {
    e.preventDefault();

    Swal.fire({
        html: "Are you sure you would like to discard <b>New User</b>?",
        icon: "warning",
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: "Yes, Discard it!",
        cancelButtonText: "No, return",
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: "btn btn-active-light"
        }
    }).then(function (result) {
        if (result.value) {
            user_form.reset(); // Reset form	
            modal_user_new.hide();
            $('.modal-backdrop').remove();

        } else if (result.dismiss === 'cancel') {
            Swal.fire({
                text: "The user has not been discard.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok",
                customClass: {
                    confirmButton: "btn btn-primary",
                }
            });
        }
    });
});