<div class="comp-sec-wrapper">
    @if (Session::has('info'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Info!</strong> {{ Session::get('info') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif (Session::has('rotine'))
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <strong>Rotine Info!</strong> {{ Session::get('rotine') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif (Session::has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> {{ Session::get('warning') }} <a href="https://wa.me/+258825248888" class="alert-link">Contacte o Admin</a>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong><a href="#" class="alert-link"></a> {{ Session::get('success') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif (Session::has('note'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Note!</strong> {{ Session::get('note') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Um <a href="#" class="alert-link">Problem</a> occuring! Verifique os dados preenchidos.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>