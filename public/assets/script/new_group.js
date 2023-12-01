const modal_group = document.getElementById('modal_group');
const group_form = modal_group.querySelector('#modal_group_form');
const modal_group_new = new bootstrap.Modal(modal_group);

var group_validator = FormValidation.formValidation(
    group_form,
    {
        fields: {
            'group_name': {
                validators: {
                    notEmpty: {
                        message: 'Group Name is required',
                    },
                },
            },
            'group_description': {
                validators: {
                    notEmpty: {
                        message: 'Group Descriptiom is required',
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
const submitButton = modal_group.querySelector('[data-users-modal-action="submit"]');
submitButton.addEventListener('click', e => {
    e.preventDefault();

    // Validate form before submit
    if (group_validator) {
        group_validator.validate().then(function (status) {

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
                        html: "New group has <b>successfully added!</b>",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            group_form.reset();
                            modal_group_new.hide();
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

const CancelButton = modal_group.querySelector('[data-users-modal-action="cancel"]');
CancelButton.addEventListener('click', e => {
    e.preventDefault();

    Swal.fire({
        html: "Are you sure you would like to discard <b>New Group</b>?",
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
            group_form.reset(); // Reset form
            modal_group_new.hide();
            $('.modal-backdrop').remove();

        } else if (result.dismiss === 'cancel') {
            Swal.fire({
                text: "The group has not been discard.",
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