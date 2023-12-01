const login_form = document.querySelector('#login_form');

var login_validator = FormValidation.formValidation(
    login_form,
    {
        fields: {
            'campus_id': {
                validators: {
                    notEmpty: {
                        message: 'Campus ID is required',
                    },
                },
            },
            'campus_password': {
                validators: {
                    notEmpty: {
                        message: 'Password is required',
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