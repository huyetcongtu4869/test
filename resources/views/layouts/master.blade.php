<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ URL::asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/961acc5ecd.js" crossorigin="anonymous"></script>
    <style>
        .btn-soft-secondary {

            background-color: rgba(91, 113, 185, 0.1);
            border: none;
            padding: 10px 20px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .btn-soft-secondary:hover {
            background-color: rgb(93, 116, 193);

        }

        .round-button {
            display: inline-block;
            width: 30px;
            /* Kích thước nút */
            height: 30px;
            /* Kích thước nút */
            line-height: 30px;
            /* Để văn bản được căn giữa */
            text-align: center;
            border-radius: 50%;
            background-color: #007bff;
            /* Màu nền của nút */
            color: #ffffff;
            /* Màu chữ của nút */
            font-size: 14px;
            /* Kích thước chữ */
            text-decoration: none;
            /* Loại bỏ gạch chân cho thẻ a */
            border: none;
            /* Loại bỏ đường viền */
            cursor: pointer;
        }

        .service-text {
            display: none;
        }

        .round-button:hover .service-text {
            display: block;
        }
        a{
            /* color: black; */
            text-decoration: none;
        }
    </style>
</head>
<div class="container mt-4"> @include('layouts.error') @yield('content') </div> <!-- Footer -->
@yield('script')


<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>