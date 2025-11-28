@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1>Returns & Refunds Policy</h1>
        {{-- <p><strong>Effective Date:</strong> [Insert Date]</p> --}}

        <p>At Yalla Munch, we aim for your complete satisfaction. If you are not fully satisfied with your purchase, please
            review our policy below.</p>

        <h2>Returns</h2>
        <ul>
            <li>Returns are accepted within 7 days of delivery.</li>
            <li>Products must be unopened, unused, and in original packaging.</li>
        </ul>

        <h2>Refunds</h2>
        <ul>
            <li>Refunds will be issued within 7 business days after receiving the returned product.</li>
            <li>Refunds will be processed via the original payment method.</li>
        </ul>

        <h2>Non-returnable Items</h2>
        <ul>
            <li>Perishable products such as fresh nuts, chocolate, and snacks.</li>
            <li>Personalized items or gifts.</li>
        </ul>

        <h2>Contact</h2>
        <p>For returns or inquiries, contact us at [email@example.com].</p>
    </div>
@endsection
