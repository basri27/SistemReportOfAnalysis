<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodeHim">
    <title> Advanced Animated Bootstrap 5 Modal Success and Error Example </title>
    <link rel="icon" type="image/png" href="{{ asset('argon/img/scci.png') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('argon/css/style.css') }}">
    <!-- Demo CSS (No need to include it into your project) -->
    <link rel="stylesheet" href="{{ asset('argon/css/demo.css') }}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css'>
    <link id="pagestyle" href="{{ asset('argon/assets/css/argon-dashboard.css') }}" rel="stylesheet" />
</head>

<body>
    <header class="cd__intro">
        <img src="{{ asset('argon/img/success.png') }}" alt="">
        <h4 class="text-success mt-3">Success!</h4>
        <p class="mt-0">Do you want to print or save the file PDF?</p>
    </header>
    <main class="cd__main">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <a class="btn btn-success"
                        @if ($report->analisa->standard == 'ASTM') href="{{ route('print-preview-astm', ['id' => $report->id, 'page' => $page]) }}" 
                    @elseif($report->analisa->standard == 'RAPID') href="{{ route('print-preview-rapid', ['id' => $report->id, 'page' => $page]) }}" @endif
                        target="_blank">Print</a>
                    <a class="btn btn-danger" href="{{ route('data-report') }}">Done</a>
                </div>
            </div>
        </div>
    </main>
    <footer class="cd__credit">Author: Ritesh Rohan - Distributed By: <a title="Free web design code & scripts"
            href="https://www.codehim.com?source=demo-page" target="_blank">CodeHim</a></footer>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js'></script>
    <!-- Script JS -->
    <script src="{{ asset('argon/js/script.js') }}"></script>
    <!--$%analytics%$-->
</body>

</html>
