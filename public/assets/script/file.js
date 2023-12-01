const modal_upload = document.getElementById('modal_upload');
const upload_form = modal_upload.querySelector('#modal_upload_form');
const modal_upload_new = new bootstrap.Modal(modal_upload);
const fileInput = modal_upload.querySelector('#input_upload_file');

var upload_validator = FormValidation.formValidation(
    upload_form,
    {
        fields: {
            'upload_name': {
                validators: {
                    notEmpty: {
                        message: 'File Name is required',
                    },
                },
            },
            'upload_department': {
                validators: {
                    different: {
                        compare: function () {
                            return 'Choose Department';
                        },
                        message: 'Please select your department',
                    },
                },
            },
            'upload_description': {
                validators: {
                    notEmpty: {
                        message: 'Descriptiom is required',
                    },
                },
            },
            'input_upload_file': {
                validators: {
                    notEmpty: {
                        message: 'Please select a file ',
                    },
                    file: {
                        extension: 'pdf,docx,xlsx,zip',
                        maxFiles: 1,
                        maxSize: 10485760,
                        message: "The uploaded file format must be pdf,doc,xls,zip and size must less than 10MB",
                    }
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
const submitButton = modal_upload.querySelector('[data-users-modal-action="submit"]');
submitButton.addEventListener('click', e => {
    e.preventDefault();

    // Validate form before submit
    if (upload_validator) {
        upload_validator.validate().then(function (status) {

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
                        html: "Your file has <b>successfully uploaded!</b>",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            upload_form.reset();
                            modal_upload_new.hide();
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

const CancelButton = modal_upload.querySelector('[data-users-modal-action="cancel"]');
CancelButton.addEventListener('click', e => {
    e.preventDefault();

    Swal.fire({
        html: "Are you sure you would like to discard <b>Uploaded File</b>?",
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
            upload_form.reset(); // Reset form
            modal_upload_new.hide();
            $('.modal-backdrop').remove();

        } else if (result.dismiss === 'cancel') {
            Swal.fire({
                text: "Your file has not been discard.",
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
