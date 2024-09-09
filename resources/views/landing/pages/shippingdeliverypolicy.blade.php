@extends('landing.layouts.app')

@section('landingcontent')
    <div class="relative overflow-x-hidden w-full">
        <!-- Header -->
        @include('landing.components.header')

        <!-- main -->
        <div
            class="flex flex-col font-sans text-gray-800 w-11/12 md:w-10/12 lg:w-9/12 mx-auto mt-6 pt-2 lg:pt-8 rounded-lg shadow-lg bg-white p-6">
            <div class="container mx-auto px-4 py-8">
                <div class="max-w-3xl mx-auto bg-white p-6 shadow-lg rounded-lg">
                    <h1 class="text-3xl font-bold text-gray-800 mb-6">Shipping & Delivery Policy</h1>
                    <p class="text-sm text-gray-500 mb-4">Last updated on Aug 23, 2024</p>

                    <p class="text-gray-700 mb-4">
                        For International buyers, orders are shipped and delivered through registered international courier
                        companies and/or International speed post only.
                        For domestic buyers, orders are shipped through registered domestic courier companies and/or speed
                        post only.
                    </p>

                    <p class="text-gray-700 mb-4">
                        Orders are shipped within <span class="font-bold">Not Applicable</span> or as per the delivery date
                        agreed at the time of order confirmation and delivering of the shipment subject to Courier Company /
                        post office norms.
                    </p>

                    <p class="text-gray-700 mb-4">
                        SHIFT180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED is not liable for any delay in delivery by
                        the courier company / postal authorities and only guarantees to hand over the consignment to the
                        courier company or postal authorities within <span class="font-bold">Not Applicable</span> from the
                        date of the order and payment or as per the delivery date agreed at the time of order confirmation.
                    </p>

                    <p class="text-gray-700 mb-4">
                        Delivery of all orders will be to the address provided by the buyer. Delivery of our services will
                        be confirmed on your mail ID as specified during registration.
                    </p>

                    <p class="text-gray-700 mb-4">
                        For any issues in utilizing our services you may contact our helpdesk at <a href="tel:+919810440780"
                            class="text-blue-600 hover:underline">9810440780</a> or via email at <a
                            href="mailto:advisory@shift180.in"
                            class="text-blue-600 hover:underline">advisory@shift180.in</a>.
                    </p>
                </div>
            </div>
            @include('landing.components.sidebar')
        </div>
        @include('landing.components.footer')
    </div>
@endsection
