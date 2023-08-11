<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Request Account Deletion - {{ config('app.name') }}</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <img src="{{ asset('images/logo.png') }}" alt="logo" width="200" class="mb-3">
                            <h3 class="heading mb-4">Request Account Deletion</h3>
                            <p>Please fill in the form to request for the deletion of your data on our app. <br> Make
                                sure all your information are accurate before submitting.</p>
                        </div>
                        <div class="col-md-6">
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form class="mb-5" method="post" id="contactForm" name="contactForm"
                                action="{{ route('request-account-deletion.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="">Your Full Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="">Email address used for registration</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" id="phone"
                                            value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control @error('reason') is-invalid @enderror" name="reason" id="reason" cols="30"
                                            rows="7" placeholder="Reason why you want your account or data to be deleted" required>{{ old('reason') }}</textarea>
                                        @error('reason')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="checkbox" name="agree" id="agree" value="1" required>
                                        <label for="">By ticking this box, I agree that the information provided above is correct and by submitting this form all my data should be deleted from {{ config('app.name') }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" value="Submit"
                                            class="btn btn-primary rounded-0 py-2 px-4">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
