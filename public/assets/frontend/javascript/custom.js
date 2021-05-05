function displayMessage(thisForm, message, messageType='error')
{
    thisForm.querySelector('.loading').classList.remove('d-block');
    if (messageType == 'success')
    {
        thisForm.querySelector('.sent-message').innerHTML = message;
        thisForm.querySelector('.sent-message').classList.add('d-block');
    } else {
        thisForm.querySelector('.error-message').innerHTML = message;
        thisForm.querySelector('.error-message').classList.add('d-block');
    }
}

function form_submit(thisForm, action, formData)
{
    fetch(action, {
        method: 'POST',
        body: formData,
        headers: {'X-Requested-With': 'XMLHttpRequest'}
    })
    .then(response => {
        if (response.ok)
        {
            return response.text();
        } else {
            throw new Error(`${response.status} ${response.statusText} ${response.url}`);
        }
    })
    .then(data => {
        data = JSON.parse(data.trim());
        thisForm.querySelector('.loading').classList.remove('d-block');
        if (data.status == 'success') {
            displayMessage(thisForm, data.message, 'success');
            thisForm.reset();
        } else {
            throw new Error(
                data ? data.message : 'Form submission failed and no error message returned from: ' + action
            );
        }
    })
    .catch((error) => {
        displayMessage(thisForm, error);
    });
}

$(document).ready(function($)
{
    $(".blooddonor-form").submit(function(event)
    {
        event.preventDefault();

        let thisForm    = document.querySelector('.blooddonor-form');
        let action      = thisForm.getAttribute('action');
        if (!action) {
            displayMessage(thisForm, 'The form action property is not set!');
            return;
        }

        thisForm.querySelector('.loading').classList.add('d-block');
        thisForm.querySelector('.error-message').classList.remove('d-block');
        thisForm.querySelector('.sent-message').classList.remove('d-block');

        let formData = new FormData(thisForm);
        form_submit(thisForm, action, formData);

        return false;
    });

    $(".contactus-form").submit(function(event)
    {
        event.preventDefault();

        let thisForm    = document.querySelector('.contactus-form');
        let action      = thisForm.getAttribute('action');
        if (!action) {
            displayMessage(thisForm, 'The form action property is not set!');
            return;
        }

        thisForm.querySelector('.loading').classList.add('d-block');
        thisForm.querySelector('.error-message').classList.remove('d-block');
        thisForm.querySelector('.sent-message').classList.remove('d-block');

        let formData = new FormData(thisForm);
        form_submit(thisForm, action, formData);

        return false;
    });

    $("#blooddonatableform").submit(function(event)
    {
        event.preventDefault();

        var question1 = $('#question1').val(),
            question2 = $('#question2').val(),
            question3 = $('#question3').val(),
            question4 = $('#question4').val(),
            question5 = $('#question5').val();

        if (
            question1 == 'yes' &&
            question2 == 'no' &&
            question3 == 'no' &&
            question4 == 'no' &&
            question5 == 'no'
        )
        {
            alert("Please proceed to drop your information.");
            $("#blooddonatableform").addClass('hide');
            $(".blooddonorform").removeClass('hide');
        } else {
            alert("Thank you. Based on the answers you provided, we advise that you do not be a blood donor.");
            $(".blooddonorform").addClass('hide');
            $("#blooddonatableform").removeClass('hide');
        }

        return false;
    });
    // $('#question1, #question2, #question3, #question4, #question5').change(function(event)
    // {
    //     var value   = $(this).val()
    //         element = event.target.id;
    //     console.log(element+" : "+value);
    // });
});
