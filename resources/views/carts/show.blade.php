@extends('backpack::blank')

@section('header')
<section class="container-fluid">
    <h2>
        @lang('Cart Details')
    </h2>
</section>
@endsection


@section('content')


<div id="app">

        <cart-component
            :enrollment="{{ json_encode($enrollment) }}"
            :bookslist="{{ json_encode($books) }}"
            :feeslist="{{ json_encode($fees) }}"
            :availablebooks="{{ json_encode($availableBooks) }}"
            :availablefees="{{ json_encode($availableFees) }}"
            :availablediscounts="{{ json_encode($availableDiscounts) }}"
            :contactdata="{{ json_encode($contactData) }}"
            :availablepaymentmethods="{{ json_encode($availablePaymentMethods) }}"
            :accountingenabled="{{ json_encode(config('invoicing.accounting_enabled')) }}"
        >
        </cart-component>

</div>

@endsection

@section('after_scripts')
        <script src="{{ mix('/js/app.js') }}"></script>
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
@endsection
