<!DOCTYPE html>
<html>

<head>
    <title>Censo dos Pacientes - Etapa RN02</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdThisnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
    <div class="container">

        < class="card mt-5">
            <h3 class="card-header p-3"><i class="fa fa-star"></i> Censo dos Pacientes - Etapa RN02
            </h3>
            <div class="card-body">

                @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>
                @endsession

                @error('file')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
                <form action="{{ url('products') }}" method="POST">
                    @csrf
                    @foreach($patients as $patient)
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-sm-6">{{ $patient->nome }}</div>
                                                <div class="col-sm-6">{{ $patient->nascimento }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">{{ $patient->codigo }}</div>
                                                <div class="col-sm-6">{{ $patient->guia }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">{{ $patient->entrada }}</div>
                                                <div class="col-sm-6">{{ $patient->saida }}</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">Teste</div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Gravar</button>
                                </div>
                        </div>
                    @endforeach
            </form>
    </div>
    </div>
    </div>
</body>

</html>