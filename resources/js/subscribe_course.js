

let data = null;
document.querySelector('#actionSubs').addEventListener('click', e => {
    e.preventDefault();


    if (document.querySelector('.pixContainer').style.display == 'block') {
        console.log('ja tem o qrcode');

        axios.post('/checkpayment', {
            email: document.querySelector('#email').value
        }).then(response => {
            console.log(response.data)
            if (response.data.payment == false)
                console.log('ainda nao pagou');
            else
                console.log('ja pagou')
        });

    } else {

        let data = {
            name: document.querySelector('#name').value,
            email: document.querySelector('#email').value,
            telphone: document.querySelector('#telphone').value,
            cpf: document.querySelector('#cpf').value,
            polo_id: document.querySelector('#polo').value,
            course_id: document.querySelector('.course_container').id
        }
        axios.post('/subscribe', data
        ).then((response) => {
            console.log(response.data);
            if (response.data.subscribe == 'exists') {
                console.log('ja existe email');
            } else {
                document.querySelectorAll('form input, form select').forEach(e => {
                    e.disabled = true;
                });
                console.log(response)
                const container = document.querySelector('.pixContainer');
                container.querySelector('#qrcode').src = response.data.qrcode;
                container.querySelector('.price').innerText = response.data.amount;
                container.querySelector('#copyPaste').innerText = response.data.copy_paste;
                container.style.display = 'block';
            }
        }, (error) => {
            console.log(error);
        });
    }
});



