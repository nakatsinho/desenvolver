@extends('cursos.modulos.show')

@section('lessons')
<div class="tab-conten pt-0">
    <div class="tab-pane fade show ">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <!-- About Details -->
                <div class="widget about-widget">
                    <h4 class="widget-title"></h4>
                    @foreach($modTipo as $value)
                    @if($value->id == $modId->modulo_type_id)
                    <p>{!! optional($modId)->desc !!}</p>
                    @endif
                    @if($modId->aula_type_id == 3)
                        @include('cursos.test.optional')
                    @endif
                    @endforeach
                </div>
                <!-- /About Details -->
            </div>
        </div>
    </div>
    <!-- /Overview Content -->
</div>
@endsection