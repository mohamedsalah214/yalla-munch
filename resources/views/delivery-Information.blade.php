@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1>Delivery Information</h1>
        {{-- <p><strong>Effective Date:</strong> [Insert Date]</p> --}}

        <h2>Shipping Areas</h2>
        <p>We deliver across [Egypt].</p>

        <h2>Delivery Time</h2>
        <ul>
            <li>Orders are processed within 1-2 business days.</li>
            <li>Standard delivery typically takes 3-5 business days.</li>
        </ul>

        <h2>Shipping Costs</h2>
        <p>Shipping costs are calculated at checkout based on your location and order size.</p>

        <h2>Order Tracking</h2>
        <p>Once your order is shipped, you will receive a tracking number to follow your package.</p>
    </div>
@endsection
