<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/bootstrap.css"/>
    <link rel="stylesheet" href="{{ asset('public/') }}/css/error.css">

    <title>
        System is Expired
    </title>

    <style>
        body {
            background: url({{ asset('public/backEnd/img/login-bg.jpg') }});
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class="antialiased font-sans">

<div class="md:flex min-h-screen">
    <div class="w-full md:w-1/2   flex items-center justify-center">
        <div class="max-w-sm m-8">
        <div class="text-black text-5xl md:text-15xl font-black">
            <img src="{{asset('public/backEnd/img/419.png')}}" alt="" class="img img-fluid"></div>

        <div class="w-16 h-1 bg-purple-light my-3 md:my-6"></div>

        <p class="text-grey-darker text-2xl md:text-3xl font-light mb-8 leading-normal text-white">
            System is Expired, Please contact the System Administrator.
        </p>

        <a href="{{url('/')}}">
            <button
                class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg text-white">
                Go Home
            </button>
        </a>
        <a href="javascript:void(0)">
            <button onclick="history.back()"
                class="bg-transparent text-grey-darkest font-bold uppercase tracking-wide py-3 px-6 border-2 border-grey-light hover:border-grey rounded-lg text-white">
                Go Back
            </button>
        </a>
    </div>
    </div>
</div>
</body>

