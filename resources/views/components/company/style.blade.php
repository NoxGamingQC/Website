<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<style>
    :root {
        --bg: #f5f5f5;
        --text: #151515;
        --accent: {{ $company->color ?? '#0d6efd' }};

        /* Bootstrap overrides */
        --bs-body-bg: var(--bg);
        --bs-body-color: var(--text);
        --bs-primary: var(--accent);
        --bs-link-color: var(--accent);
        --bs-link-hover-color: var(--accent);
    }
    .print-only {
        display: none;
    }
    
    @media print {
    .print-only {
        display: block;
    }
    .no-print, .no-print * {
        display: none !important;
    }
    .content {
        padding: 0 !important;
        margin: 0 !important;
    }

    @page {
        //margin-bottom: 0;
        margin: 0 !important;
        padding: 0;
        size: letter landscape !important;
        
    }

    .print-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;

        display: flex;
        justify-content: space-between;
        align-items: center;

        padding: 10px 20px;
        font-size: 12px;
    }

    .page-break {
        counter-increment: page;
        break-after: page;
    }

     body {
        color: black !important;
    }
    p, h1, h2, h3, h4, h5, h6,span,div {
        color: black !important;
    }
    .text-primary, .text-success, .text-warning, .text-danger, .text-info {
        color: black !important;
    } 
}

    body {
        background: var(--bg);
        color: var(--text);
    }

    /* Links */
    a {
        color: var(--accent);
        text-decoration: none;
    }

    a:hover {
        color: var(--accent);
        opacity: 0.8;
    }

    /* Buttons */
    .btn-primary {
        background-color: var(--accent);
        border-color: var(--accent);
    }

    .btn-primary:hover {
        filter: brightness(90%);
    }

    .btn-outline-primary {
        color: var(--accent);
        border-color: var(--accent);
    }

    .btn-outline-primary:hover {
        background-color: var(--accent);
        border-color: var(--accent);
        color: #fff;
    }

    /* Navbar */
    .navbar {
        background-color: var(--bg) !important;
        
    }

    .nav-link {
        color: var(--text);
    }

    .nav-link.active {
        color: var(--accent) !important;
        background-color: rgba(0,0,0,0.05);
        font-weight: 600;
    }

    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: var(--accent) !important;
        background-color: rgba(0,0,0,0.05);
    }

    /* Cards */
    .card {
        background: #fff;
        border: 1px solid rgba(0,0,0,0.05);
    }

    /* Text helpers */
    .text-accent {
        color: var(--accent) !important;
    }

    .bg-accent {
        background-color: var(--accent) !important;
        color: #fff;
    }

    /* Inputs */
    .form-control:focus {
        border-color: var(--accent);
        box-shadow: 0 0 0 0.2rem rgba(0,0,0,0.05);
    }

    /* Optional: selection */
    ::selection {
        background: var(--accent);
        color: #fff;
    }
</style>