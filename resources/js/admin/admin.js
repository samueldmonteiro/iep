import "../bootstrap"

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});





if(document.querySelector('#deletePolo')){
    document.querySelector('#deletePolo').addEventListener('click', e=>{
        let btn = e.currentTarget;
        axios.delete(btn.getAttribute('url')).then(response => {
                window.location.href = btn.getAttribute('urlback')
        });

    });
}