<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />
    <!-- Fonts -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

</head>

<body class="antialiased">
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <div class="container ">
        <div class="d-flex justify-content-center align-items-center mt-5">
            <img src="http://www.softlock.net/css/images/Softlock-Logo.png" style="width: 50%" alt="">
        </div>
        <br>
        <div class=" d-flex justify-content-center align-items-center mb-3" style="color: #06476F">

            <h1 class="display-1"><strong>Encrypt Decrypt Tool</strong> </h1>

            &nbsp

            <x-button-add button class=" btn btn-success d-flex justify-content-start  align-items-center"
                type="button" data-bs-toggle="modal" data-bs-target="#create-modal">
                Add New File </x-button-add>

            <x-modal id="create-modal" method="post" action="{{ route('files.store') }}">
                <x-slot name="header"> Add New File
                </x-slot>
                <x-slot name="body">
                    <x-uploader />
                </x-slot>
            </x-modal>

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">File Name</th>
                    <th scope="col">File Size</th>
                    <th scope="col">Status</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <th scope="row">{{ $file->id }}</th>
                        <td>{{ $file->name }}</td>
                        <td>{{ $file->size }} bytes</td>
                        <td>{{ $file->status == 1 ? 'Decrypted' : 'Encrypted' }} </td>
                        <td>
                            <div class="flex d-flex">
                                <x-button-operations id="{{ $file->id }}"
                                    operation="{{ $file->status == 1 ? 'encrypt' : 'decrypt' }}" />
                                &nbsp
                                <x-button-delete id="{{ $file->id }}" />

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
</body>

</html>
