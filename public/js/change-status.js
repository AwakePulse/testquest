$(document).ready(function () {

    const select1 = document.querySelector('.multiple-select');
    // let selectVal = select1.value;
    // if(selectVal == 1) {
    //     select1.classList.remove('status_at_work')
    //     select1.classList.remove('status_completed')
    //     select1.classList.add('status_new');
    // } else if (selectVal == 2) {
    //     select1.classList.remove('status_new')
    //     select1.classList.remove('status_completed')
    //     select1.classList.add('status_at_work')
    // } else {
    //     select1.classList.remove('status_new')
    //     select1.classList.remove('status_at_work')
    //     select1.classList.add('status_completed')
    // }

    let csrfToken = $('#csrf-token').val();
    $('.multiple-select').change(function () {
        let selectVal = select1.value;

        // if(selectVal == 1) {
        //     select1.classList.remove('status_at_work')
        //     select1.classList.remove('status_completed')
        //     select1.classList.add('status_new');
        // } else if (selectVal == 2) {
        //     select1.classList.remove('status_new')
        //     select1.classList.remove('status_completed')
        //     select1.classList.add('status_at_work')
        // } else {
        //     select1.classList.remove('status_new')
        //     select1.classList.remove('status_at_work')
        //     select1.classList.add('status_completed')
        // }

        let leadId = $(this).data('lead-id');
        let statusId = $(this).val();

        $.ajax({
            url: "/leadboard/" + leadId + "/update-status",
            type: "POST",
            data: {
                _token: csrfToken,
                status_id: statusId
            }
        });
    });
});
