<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Météo</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- CSS externe -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mb-7">
        <div class="text-sart">
            <img src="/css/10127236.png" alt="Logo Météo" style="height: 60px; margin-right: 20px;">
            <h1 class="mb-4 text-black-50 d-inline-block align-middle">Application Météo</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger mt-4 text-center">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form id="weatherForm" action="{{ route('weather.show') }}" method="POST">
            @csrf
            <div class="form-group input-group">
                <input type="text" name="city" class="form-control " placeholder="Entrez le nom de la ville" >
            </div>
            <button type="submit" class="btn btn-secondary" id="submitButton">
                <i class="fas fa-search"></i>
                <span id="buttonText">Obtenir la météo</span>
                <span id="spinner" class="spinner-border text-light ml-2" role="status" aria-hidden="true" style="display: none;"></span>
                <span id="loadingText" style="display: none; margin-left: 10px;">Chargement...</span>
            </button>

        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('weatherForm').addEventListener('submit', function() {
            document.getElementById('spinner').style.display = 'inline-block';
            document.getElementById('loadingText').style.display = 'inline';
            document.getElementById('buttonText').style.display = 'none';
        });
    </script>
</body>
</html>
