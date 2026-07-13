import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';



window.bootstrap = bootstrap;

/* ==========================
        TOOLTIP
========================== */

document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
    new bootstrap.Tooltip(el);
});

/* ==========================
        POPOVER
========================== */

document.querySelectorAll('[data-bs-toggle="popover"]').forEach(el => {
    new bootstrap.Popover(el);
});

/* ==========================
        CARD HOVER
========================== */

document.querySelectorAll('.stat-card').forEach(card => {

    card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-6px)';
    });

    card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0)';
    });

});

/* ==========================
        AUTO CLOSE ALERT
========================== */

setTimeout(() => {

    document.querySelectorAll('.alert').forEach(alert => {

        alert.classList.add('fade');

        setTimeout(() => {

            alert.remove();

        },300);

    });

},3000);

/* ==========================
        ACTIVE SIDEBAR
========================== */

const currentUrl = window.location.href;

document.querySelectorAll('.sidebar-link').forEach(link => {

    if(link.href === currentUrl){

        link.classList.add('active');

    }

});

/* ==========================
        TABLE HOVER
========================== */

document.querySelectorAll('.app-table tbody tr').forEach(row => {

    row.addEventListener('mouseenter',()=>{

        row.style.cursor='pointer';

    });

});

/* ==========================
        BUTTON LOADING
========================== */

document.querySelectorAll('.btn-loading').forEach(btn=>{

    btn.addEventListener('click',function(){

        this.disabled=true;

        this.innerHTML=
        `<span class="spinner-border spinner-border-sm me-2"></span>Loading...`;

    });

});