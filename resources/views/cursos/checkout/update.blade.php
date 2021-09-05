@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="page">Pagamento do Curso</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Pagamento do Curso {{$curso->nome}}</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content success-page-cont">
				<div class="container-fluid">
				
					<div class="row justify-content-center">
						<div class="col-lg-6">
						
							<!-- Success Card -->
							<div class="card success-card">
								<div class="card-body">
									<div class="success-cont">
										<i class="fas fa-check"></i>
										<h3>Pagamento efectuado com Sucesso!</h3>
										<p>Com a atençao de <strong>Armando Cuinica</strong><br> em <strong>{{ $curso->created_at }}</strong></p>
										<a href="{{ route('pedidos.show',$curso->id)  }}" class="btn btn-primary view-inv-btn">Ver Factura</a>
									</div>
								</div>
							</div>
							<!-- /Success Card -->
							
						</div>
					</div>
					
				</div>
			</div>		
			<!-- /Page Content -->

@endsection