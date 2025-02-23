$(() => {
    $('#form-application-pjax').on('change', '#application-check', () => {
        $.pjax.reload('#form-application-pjax', {
            method: "POST",
            data: $('#form-application').serialize(),
            push: false,
            timeout: 5000,
        })
    })


    $('#form-application-pjax').on('pjax:end', 
        () => $('#form-application').submit()
    )
})