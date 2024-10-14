<!DOCTYPE html>
<html>

<head>
    <title>Censo dos Pacientes - Etapa RN02</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdThisnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        .row-table {
            border-bottom: thin solid;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
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
                <form action="{{ url('patients/insert') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="row row-table">
                                    @foreach ($headers as $header)
                                        <div class="col-sm">{{ $header }}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="row row-table">
                                    <div class="col-sm">Status</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        @foreach($patients as $patient)
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="row row-table">
                                        <div class="col-sm">{{ $patient['nome'] }}</div>
                                        <div class="col-sm">{{ $patient['nascimento'] }}</div>
                                        <div class="col-sm">{{ $patient['codigo'] }}</div>
                                        <div class="col-sm">{{ $patient['guia'] }}</div>
                                        <div class="col-sm">{{ $patient['entrada'] }}</div>
                                        <div class="col-sm">{{ $patient['saida'] }}</div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="row row-table">
                                        <div class="col-sm">Válido</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Gravar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-5"></div>
    </div>
</body>

</html>