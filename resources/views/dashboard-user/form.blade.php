<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <title>Form</title>
    
    <!-- Custom styles for this template-->
    <link href="assets/css/form.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <div class="mx-auto container">

            <!-- Progress Form -->
            <form id="progress-form" class="p-4 progress-form" action="{{ route('mandatory.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf

                <!-- Step Navigation -->
                <div class="d-flex align-items-start mb-3 sm:mb-5 progress-form__tabs" role="tablist">
                    <button id="progress-form__tab-1" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-1" aria-selected="true">
                        <span class="d-block step" aria-hidden="true">Step 1 <span class="sm:d-none">of 5</span></span>
                        Applicant's data
                    </button>
                    <button id="progress-form__tab-2" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-2" aria-selected="false" tabindex="-1" aria-disabled="true">
                        <span class="d-block step" aria-hidden="true">Step 2 <span class="sm:d-none">of 5</span></span>
                        Order data
                    </button>
                    <button id="progress-form__tab-3" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-3" aria-selected="false" tabindex="-1" aria-disabled="true">
                        <span class="d-block step" aria-hidden="true">Step 3 <span class="sm:d-none">of 5</span></span>
                        Contact information
                    </button>
                    <button id="progress-form__tab-4" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-4" aria-selected="false" tabindex="-1" aria-disabled="true">
                        <span class="d-block step" aria-hidden="true">Step 4 <span class="sm:d-none">of 5</span></span>
                        Authority data
                    </button>
                    <button id="progress-form__tab-5" class="flex-1 px-0 pt-2 progress-form__tabs-item" type="button" role="tab" aria-controls="progress-form__panel-5" aria-selected="false" tabindex="-1" aria-disabled="true">
                        <span class="d-block step" aria-hidden="true">Step 5 <span class="sm:d-none">of 5</span></span>
                        Supporting files
                    </button>
                </div>
                <!-- / End Step Navigation -->

                <!-- Step 1 -->
                <section id="progress-form__panel-1" role="tabpanel" aria-labelledby="progress-form__tab-1" tabindex="0">
                    <div class="sm:d-grid sm:grid-col-2 sm:mt-3">
                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="name">
                            Name
                            <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="name" type="text" value="{{ auth()->user()->name }}" readonly>
                        </div>

                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="role">
                            job Title
                            <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="role" type="text" value="{{ auth()->user()->role ?? '---' }}" readonly>
                        </div>
                    </div>

                    <div class="mt-3 form__field">
                        <label for="email">
                            Email address
                            <span data-required="true" aria-hidden="true"></span>
                        </label>
                        <input id="email" type="email" value="{{ auth()->user()->email }}" readonly>
                    </div>
                    
                    {{-- <div class="mt-1 form__field">
                        <label class="form__choice-wrapper">
                            <input id="email-newsletter" type="checkbox" name="email-newsletter" value="Yes" checked>
                            <span>Yes, I would like to sign up to receive the newsletter</span>
                        </label>
                    </div> --}}
                    
                    <div class="mt-3 form__field">
                        <label for="mobile">
                            Phone number
                            <span data-required="true" aria-hidden="true"></span>
                        </label>
                        <input id="mobile" type="text" value="{{ auth()->user()->phone }}" readonly>
                    </div>

                    <div class="d-flex align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                        <button type="button" data-action="next">
                            Continue
                        </button>
                    </div>
                </section>
                <!-- / End Step 1 -->

                <!-- Step 2 -->
                <section id="progress-form__panel-2" role="tabpanel" aria-labelledby="progress-form__tab-2" tabindex="0" hidden>
                    <div class="mt-3 form__field">
                        <label for="factory_country">
                            Country of manufacture
                            <span data-required="true" aria-hidden="true"></span>
                        </label>
                        <input id="factory_country" type="text" name="factory_country" autocomplete="shipping address-line1" required>
                    </div>
                    
                    <div class="mt-3 form__field">
                        <label for="factory_name">
                            Name of manufacturer or service provider
                            <span data-required="true" aria-hidden="true"></span>
                        </label>
                        <input id="factory_name" type="text" name="factory_name" autocomplete="shipping address-line2">
                    </div>

                    <div class="sm:d-grid sm:grid-col-3 sm:mt-3">
                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="nupco_code">
                                Medical code (NUPCO)
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="nupco_code" type="text" name="nupco_code" autocomplete="shipping address-level2" required>
                        </div>

                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="address-state">
                                Item type
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <select id="address-state" name="item_type" required>
                                <option value="">-- Select the type --</option>
                                <option value="medical">medical commodity</option>
                                <option value="non_medical">non-medical item</option>
                                <option value="service">service</option>
                            </select>
                        </div>

                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="nupco_description">
                                Medical Description (NUPCO)
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="nupco_description" type="text" name="nupco_description" autocomplete="shipping postal-code" inputmode="numeric" required>
                        </div>
                    </div>

                    <div class="mt-3 form__field">
                        <label for="sector">
                            sector
                            <span data-required="true" aria-hidden="true"></span>
                        </label>
                        <select id="sector" name="sector_id" required>
                            <option value="">-- Select sector --</option>
                            @foreach($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->name_ar }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="sm:d-grid sm:grid-col-3 sm:mt-3">
                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="group_id">
                                Group
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <select id="group_id" name="group_id" autocomplete="shipping address-level2" required></select>
                        </div>

                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="category_id">
                                Category
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <select id="category_id" name="category_id" autocomplete="shipping address-level2" required></select>
                        </div>

                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="product_id">
                                Product
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <select id="product_id" name="product_id" autocomplete="shipping address-level2" required></select>
                        </div>
                    </div>

                    <div class="d-flex flex-column-reverse sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                        <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                            Back
                        </button>
                        <button type="button" data-action="next">
                            Continue
                        </button>
                    </div>
                </section>
                <!-- / End Step 2 -->

                <!-- Step 3 -->
                <section id="progress-form__panel-3" role="tabpanel" aria-labelledby="progress-form__tab-3" tabindex="0" hidden>
                    <div class="sm:d-grid sm:grid-col-3 sm:mt-3">
                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="email">
                                Email
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="email" type="text" name="email" autocomplete="shipping address-level2" required>
                        </div>

                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="website">
                                Website
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="website" type="text" name="website" autocomplete="shipping address-level2" required>
                        </div>
                    </div>

                    <div class="sm:d-grid sm:grid-col-3 sm:mt-3">
                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="phone">
                                Phone
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="phone" type="text" name="phone" autocomplete="shipping address-level2" required>
                        </div>

                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="region">
                                Region
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="region" type="text" name="region" autocomplete="shipping address-level2" required>
                        </div>

                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="address">
                                Address
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="address" type="text" name="address" autocomplete="shipping address-level2" required>
                        </div>
                    </div>

                    <div class="d-flex flex-column-reverse sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                        <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                            Back
                        </button>
                        <button type="button" data-action="next">
                            Continue
                        </button>
                    </div>
                </section>
                <!-- / End Step 3 -->

                <!-- Step 4 -->
                <section id="progress-form__panel-4" role="tabpanel" aria-labelledby="progress-form__tab-4" tabindex="0" hidden>

                    <div class="sm:d-grid sm:grid-col-3 sm:mt-3">
                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="commercial_registration_number">
                                Commercial registration number
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="commercial_registration_number" type="text" name="commercial_registration_number" autocomplete="shipping address-level2" required>
                        </div>

                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="registered_name">
                                Trade name according to the register
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="registered_name" type="text" name="registered_name" autocomplete="shipping address-level2" required>
                        </div>
                    </div>

                    <div class="sm:d-grid sm:grid-col-3 sm:mt-3">
                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="industrial_license_number">
                                Industrial license number
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="industrial_license_number" type="text" name="industrial_license_number" autocomplete="shipping address-level2" required>
                        </div>

                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="has_local_content_certificate">
                                Do you have a local content certificate?
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <select class="has_local_content_certificate" name="has_local_content_certificate">
                                <option value="">-- Select --</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3 form__field">
                        <label for="local_content_percentage">
                            Local Content Certification %
                            <span data-required="true" aria-hidden="true"></span>
                        </label>
                        <input id="local_content_percentage" type="text" name="local_content_percentage" autocomplete="shipping address-level2" required>
                    </div>

                    <div class="d-flex flex-column-reverse sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                        <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                            Back
                        </button>
                        <button type="button" data-action="next">
                            Continue
                        </button>
                    </div>
                </section>
                <!-- / End Step 4 -->

                <!-- Step 5 -->
                <section id="progress-form__panel-5" role="tabpanel" aria-labelledby="progress-form__tab-5" tabindex="0" hidden>
                    <div class="sm:d-grid sm:grid-col-3 sm:mt-3">
                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="industrial_license">
                                Industrial licensing
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="industrial_license" type="text" name="industrial_license" autocomplete="shipping address-level2" required>
                        </div>

                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="local_content_certificate">
                                Local Content Certificate
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="local_content_certificate" type="text" name="local_content_certificate" autocomplete="shipping address-level2" required>
                        </div>
                    </div>

                    <div class="sm:d-grid sm:grid-col-3 sm:mt-3">
                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="sfda_certificate">
                                Food and Drug Administration statement
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="sfda_certificate" type="text" name="sfda_certificate" autocomplete="shipping address-level2" required>
                        </div>

                        <div class="mt-3 sm:mt-0 form__field">
                            <label for="other_certificate">
                                Another statement
                                <span data-required="true" aria-hidden="true"></span>
                            </label>
                            <input id="other_certificate" type="text" name="other_certificate" autocomplete="shipping address-level2" required>
                        </div>
                    </div>

                    <div class="mt-3 form__field">
                        <label for="notes">
                            Additional notes 
                        </label>
                        <textarea name="notes" id="notes"></textarea>
                    </div>

                    <div class="d-flex flex-column-reverse sm:flex-row align-items-center justify-center sm:justify-end mt-4 sm:mt-5">
                        <button type="button" class="mt-1 sm:mt-0 button--simple" data-action="prev">
                            Back
                        </button>
                        <button type="submit">
                            Submit
                        </button>
                    </div>
                </section>
                <!-- / End Step 5 -->

                <!-- Thank You -->
                <section id="progress-form__thank-you" hidden>
                    <p>Thank you for your submission!</p>
                    <p>We appreciate you contacting us. One of our team members will get back to you very&nbsp;soon.</p>
                </section>
                <!-- / End Thank You -->

            </form>
            <!-- / End Progress Form -->

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#sector').change(function() {
            let sectorID = $(this).val();
            $('#group').html('<option>جاري التحميل...</option>');
            $.get('/api/groups/' + sectorID, function(data) {
                let options = '<option value="">-- اختر المجموعة --</option>';
                data.forEach(item => options += `<option value="${item.id}">${item.name_ar}</option>`);
                $('#group').html(options);
                $('#category').html('<option value="">-- select category --</option>');
                $('#product').html('<option value="">-- select product --</option>');
            });
        });

        $('#group').change(function() {
            let groupID = $(this).val();
            $('#category').html('<option>جاري التحميل...</option>');
            $.get('/api/categories/' + groupID, function(data) {
                let options = '<option value="">-- اختر الفئة --</option>';
                data.forEach(item => options += `<option value="${item.id}">${item.name_ar}</option>`);
                $('#category').html(options);
                $('#product').html('<option value="">-- select product --</option>');
            });
        });

        $('#category').change(function() {
            let categoryID = $(this).val();
            $('#product').html('<option>جاري التحميل...</option>');
            $.get('/api/products/' + categoryID, function(data) {
                let options = '<option value="">-- select product --</option>';
                data.forEach(item => options += `<option value="${item.id}">${item.name_ar}</option>`);
                $('#product').html(options);
            });
        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/form.js"></script>

</body>

</html>
