import './bootstrap';
import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;

document.addEventListener("DOMContentLoaded", () => {

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
            ACTIVE SIDEBAR
    ========================== */
    const currentUrl = window.location.href;

    document.querySelectorAll('.sidebar-item').forEach(link => {
        if (link.href === currentUrl) {
            link.classList.add('active');
        }
    });

    /* ==========================
            TABLE HOVER
    ========================== */
    document.querySelectorAll('.app-table tbody tr').forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.style.cursor = 'pointer';
        });
    });

    /* ==========================
            BUTTON LOADING
    ========================== */
    document.querySelectorAll('.btn-loading').forEach(btn => {
        btn.addEventListener('click', function () {
            this.disabled = true;
            this.innerHTML =
                `<span class="spinner-border spinner-border-sm me-2"></span>Loading...`;
        });
    });

    /* ==========================
            TOGGLE PASSWORD
    ========================== */
    const password = document.getElementById("password");
    const togglePassword = document.getElementById("togglePassword");

    if (password && togglePassword) {
        togglePassword.addEventListener("click", () => {

            const isPassword = password.type === "password";

            password.type = isPassword ? "text" : "password";

            const icon = togglePassword.querySelector("i");

            icon.classList.replace(
                isPassword ? "bi-eye" : "bi-eye-slash",
                isPassword ? "bi-eye-slash" : "bi-eye"
            );
        });
    }

    /* ==========================
        TOGGLE PASSWORD CONFIRMATION
    ========================== */
    const togglePasswordConfirmation = document.querySelector('#togglePasswordConfirmation');
    const passwordConfirmation = document.querySelector('#password_confirmation');

    if (togglePasswordConfirmation && passwordConfirmation) {

        togglePasswordConfirmation.addEventListener('click', function () {

            const type = passwordConfirmation.type === 'password'
                ? 'text'
                : 'password';

            passwordConfirmation.type = type;

            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');

        });

    }

    /* ==========================
            SIDEBAR DROPDOWN
    ========================== */
    document.querySelectorAll(".menu-item > .sidebar-item").forEach(item => {

        item.addEventListener("click", function (e) {

            e.preventDefault();

            this.parentElement.classList.toggle("active");

        });

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
        }, 300);

    });

}, 3000);
