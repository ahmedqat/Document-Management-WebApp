const modal_access = document.getElementById('modal_access');
const access_form = modal_access.querySelector('#modal_access_form');
const modal_access_new = new bootstrap.Modal(modal_access);

var access_validator = FormValidation.formValidation(
    access_form,
    {
        fields: {
            'access_group': {
                validators: {
                    different: {
                        compare: function () {
                            return 'Choose Group';
                        },
                        message: 'Please select a group',
                    },
                },
            },
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
const submitButton = modal_access.querySelector('[data-users-modal-action="submit"]');
submitButton.addEventListener('click', e => {
    e.preventDefault();

    // Validate form before submit
    if (access_validator) {
        access_validator.validate().then(function (status) {

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
                        html: "The group has <b>successfully added!</b>",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            access_form.reset();
                            modal_access_new.hide();
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
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        });
    }
});

const CancelButton = modal_access.querySelector('[data-users-modal-action="cancel"]');
CancelButton.addEventListener('click', e => {
    e.preventDefault();

    Swal.fire({
        html: "Are you sure you would like to discard the <b>Access Group</b>?",
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
            access_form.reset(); // Reset form	
            modal_access_new.hide();
            $('.modal-backdrop').remove();

        } else if (result.dismiss === 'cancel') {
            Swal.fire({
                text: "The access group has not been discard.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary",
                }
            });
        }
    });
});