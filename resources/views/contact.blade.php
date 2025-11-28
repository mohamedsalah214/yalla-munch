@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1>Contact Us</h1>
        <div class="row">
            <div class="col-lg-6">
                <form action="" method="POST">
                    @csrf
                    <div>
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required class="form-control">
                    </div>

                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required class="form-control">
                    </div>

                    <div>
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="5" required class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Send Message</button>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="contact-info mt-4">
                    <h3>Our Contact Details</h3>
                    <p><strong>Phone:</strong> +20 103 518 7798</p>
                    <p><strong>Email:</strong> support@yallamunch.com</p>
                    <p><strong>Address:</strong> 123 Yalla Street, Cairo, Egypt</p>
                </div>
            </div>
        </div>
    </div>
@endsection
