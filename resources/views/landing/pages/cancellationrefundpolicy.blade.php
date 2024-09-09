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
                    <h1 class="text-3xl font-bold text-gray-800 mb-6">Cancellation & Refund Policy</h1>
                    <p class="text-sm text-gray-500 mb-4">Last updated on Aug 23, 2024</p>

                    <p class="text-gray-700 mb-4">
                        SHIFT180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED believes in helping its customers as far as
                        possible, and has therefore a liberal cancellation policy. Under this policy:
                    </p>

                    <ul class="list-disc list-inside text-gray-700 mb-4">
                        <li class="mb-2">
                            Cancellations will be considered only if the request is made within <span class="font-bold">Not
                                Applicable</span> of placing the order. However, the cancellation request may not be
                            entertained if the orders have been communicated to the vendors/merchants and they have
                            initiated the process of shipping them.
                        </li>
                        <li class="mb-2">
                            SHIFT180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED does not accept cancellation requests
                            for perishable items like flowers, eatables, etc. However, refund/replacement can be made if the
                            customer establishes that the quality of the product delivered is not good.
                        </li>
                        <li class="mb-2">
                            In case of receipt of damaged or defective items, please report the same to our Customer Service
                            team. The request will, however, be entertained once the merchant has checked and determined the
                            same at their own end. This should be reported within <span class="font-bold">Not
                                Applicable</span> of receipt of the products.
                        </li>
                        <li class="mb-2">
                            In case you feel that the product received is not as shown on the site or as per your
                            expectations, you must bring it to the notice of our customer service within <span
                                class="font-bold">Not Applicable</span> of receiving the product. The Customer Service Team,
                            after looking into your complaint, will take an appropriate decision.
                        </li>
                        <li class="mb-2">
                            In case of complaints regarding products that come with a warranty from manufacturers, please
                            refer the issue to them.
                        </li>
                        <li class="mb-2">
                            In case of any Refunds approved by SHIFT180 BUSINESS ADVISORY AND SERVICES PRIVATE LIMITED,
                            it’ll take <span class="font-bold">Not Applicable</span> for the refund to be processed to the
                            end customer.
                        </li>
                    </ul>

                    <p class="text-gray-700 mb-4">
                        For further inquiries, please contact our Customer Service Team at <a href="tel:+919810440780"
                            class="text-blue-600 hover:underline">9810440780</a> or via email at <a
                            href="mailto:advisory@shift180.in"
                            class="text-blue-600 hover:underline">advisory@shift180.in</a>.
                    </p>
                </div>
            </div>
        </div>
        @include('landing.components.sidebar')
    </div>
    @include('landing.components.footer')
@endsection
