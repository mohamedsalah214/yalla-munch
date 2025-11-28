@extends('layouts.app')

@section('title', 'سلة المشتريات')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">🛒 سلة المشتريات</h2>

        @if (count($cart) > 0)
            <table class="table align-middle border">
                <thead>
                    <tr>
                        <th>المنتج</th>
                        <th>الوزن</th>
                        <th>الكمية</th>
                        <th>السعر الفردي</th>
                        <th>الإجمالي</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $key => $item)
                        <tr data-key="{{ $key }}">
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('storage/' . $item['image']) }}" width="60" class="rounded">
                                    <div>{{ $item['name'] }}</div>
                                </div>
                            </td>
                            <td>{{ $item['weight'] }}g</td>
                            <td style="width: 150px;">
                                <input type="number" min="1" class="form-control quantity-input"
                                    value="{{ $item['quantity'] }}">
                            </td>
                            <td>{{ number_format($item['price'], 2) }} {{ __('messages.currency') }}</td>
                            <td class="item-total">{{ number_format($item['total'], 2) }} {{ __('messages.currency') }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm remove-btn">حذف</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <h4>الإجمالي الكلي: <span id="cart-total">{{ number_format($total, 2) }}</span>
                    {{ __('messages.currency') }}</h4>
                <a href="{{ route('checkout.index') }}" class="btn btn-primary btn-lg">إتمام الشراء</a>
            </div>
        @else
            <div class="alert alert-info mt-4">
                🛍️ لا يوجد منتجات في السلة حاليًا.
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const token = '{{ csrf_token() }}';

            // تحديث الكمية
            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('change', function() {
                    const row = this.closest('tr');
                    const key = row.dataset.key;
                    const quantity = this.value;

                    fetch('{{ route('cart.update') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': token
                            },
                            body: JSON.stringify({
                                product_key: key,
                                quantity
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            row.querySelector('.item-total').textContent = data.item_total
                                .toFixed(2) + ' {{ __('messages.currency') }}';
                            document.getElementById('cart-total').textContent = data.total
                                .toFixed(2);
                        });
                });
            });

            // حذف منتج
            document.querySelectorAll('.remove-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const key = row.dataset.key;

                    fetch('{{ route('cart.remove') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': token
                            },
                            body: JSON.stringify({
                                product_key: key
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            row.remove();
                            document.getElementById('cart-total').textContent = data.total
                                .toFixed(2);
                        });
                });
            });
        });
    </script>
@endsection
