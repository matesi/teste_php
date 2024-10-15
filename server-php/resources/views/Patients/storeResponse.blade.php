<!DOCTYPE html>
<html>

<head>
    <title>Censo dos Pacientes - Etapa RN01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdThisnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        .disabled-button {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="card mt-5">
            <h3 class="card-header p-3"><i class="fa fa-star"></i> Censo dos Pacientes - Etapa RN01
            </h3>
            <div class="card-body">

                <div class="alert {{ $classDivMessageView }}" role="alert">
                    {{ $messageView }}
                </div>

                <form action="/patients/verify" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" name="fileName" id="fileName" value="{{ $filenameInput }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary{{ $classButtonDisabledAdvanced }}" {{ $disabledAdvanced }}>Avançar</button>
                    </div>
                </form>

                <div class="mb-3">
                    <button type="button" class="btn btn-danger{{ $classButtonDisabledBack }}" {{ $disabledBack }}
                        onclick="window.location='{{ route('patients') }}'">Voltar</button>
                </div>

            </div>
        </div>
    </div>
</body>

</html>