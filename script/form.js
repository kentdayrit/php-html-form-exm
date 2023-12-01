
$('#dob').on('change', function() {
    var dob = new Date($(this).val());
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();
    if (!isNaN(age)) {
        $('#age').val(age);
    } else {
        $('#age').val('');
    }
})

$('#userForm').submit(function(event) {
    event.preventDefault();

    if (!validateForm()) {
        return;
    }

    $.ajax({
        type: 'POST',
        url: '/api/submit_form.php',
        data: $('#userForm').serialize(),
        success: function(response) {
            $('#resultMessage').html('<div class="alert alert-success">' + response + '</div>');
            $('#userForm')[0].reset();
        },
        error: function(error) {
            $('#resultMessage').html('<div class="alert alert-danger">Error submitting form</div>');
        }
    });
});

function validateForm() {
    var fullName = $('#fullName').val();
    var email = $('#email').val();
    var mobileNumber = $('#mobileNumber').val();
    var dob = $('#dob').val();
    var flagValidated = true;

    if (fullName === '') {
        displayValidationError('fullName', 'Please enter your full name.');
        flagValidated = false
    } else {
        removeValidationError('fullName');
    }

    if (email === '') {
        displayValidationError('email', 'Please enter your email address.');
        flagValidated = false
    } else if (!isValidEmail(email)) {
        displayValidationError('email', 'Please enter a valid email address.');
        flagValidated = false
    } else {
        removeValidationError('email');
    }

    if (mobileNumber === '') {
        displayValidationError('mobileNumber', 'Please enter your mobile number.');
        flagValidated = false
    } else if (!isValidMobileNumber(mobileNumber)) {
        displayValidationError('mobileNumber', 'Please enter a valid mobile number. 639');
        flagValidated = false
    } else {
        removeValidationError('mobileNumber');
    }

    if (dob === '') {
        displayValidationError('dob', 'Please enter your date of birth.');
        flagValidated = false
    } else {
        removeValidationError('dob');
    }

    return  flagValidated;
}

function displayValidationError(fieldId, message) {
    $('#' + fieldId).addClass('is-invalid');
    $('#' + fieldId + 'Error').html('<div class="text-danger">' + message + '</div>');
}

function removeValidationError(fieldId) {
    $('#' + fieldId).removeClass('is-invalid');
    $('#' + fieldId + 'Error').html('');
}

function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidMobileNumber(number) {
    number = number.replace(/[\s-]/g, '');
    var internationalFormatRegex = /^(\+639|\b639|09)\d{9}$/;
    return internationalFormatRegex.test(number);

}
