@extends('admin.layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add New Portfolio Case Study</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Portfolio Wizard Form</h4>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data" id="portfolioWizardForm" novalidate>
                    @csrf

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="wizard-step-box active" data-step="1">1. Basic Info</div>
                        </div>
                        <div class="col-md-3">
                            <div class="wizard-step-box" data-step="2">2. Results & Performance</div>
                        </div>
                        <div class="col-md-3">
                            <div class="wizard-step-box" data-step="3">3. Client Feedback</div>
                        </div>
                        <div class="col-md-3">
                            <div class="wizard-step-box" data-step="4">4. Meta Details</div>
                        </div>
                    </div>

                    {{-- STEP 1 --}}
                    <div class="wizard-step-content" id="step-1">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Heading</label>
                                <input type="text" name="heading" class="form-control required-step">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Sub Heading</label>
                                <input type="text" name="sub_heading" class="form-control required-step">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control required-step">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Link One</label>
                                <input type="url" name="link_one" class="form-control required-step">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Link Two</label>
                                <input type="url" name="link_two" class="form-control required-step">
                            </div>

                            <div class="col-sm-12 mb-3">
                                <label>Description </label>
                                <textarea name="description" class="summernote form-control required-step"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 2 --}}
                    <div class="wizard-step-content d-none" id="step-2">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Results Delivered</label>
                                <textarea name="results_delivered" class="form-control required-step" rows="5"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Sample Meta Ads Campaign Performance</label>
                                <input type="text" name="meta_ads_title" class="form-control required-step">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Performance Image</label>
                                <input type="file" name="performance_image" class="form-control required-step">
                            </div>
                        </div>
                    </div>

                    {{-- STEP 3 --}}
                    <div class="wizard-step-content d-none" id="step-3">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>From the Client</label>
                                <input type="text" name="feedback_heading" class="form-control required-step">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Client Name</label>
                                <input type="text" name="client_name" class="form-control required-step">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Feedback Image</label>
                                <input type="file" name="feedback_image" class="form-control required-step">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Client Feedback</label>
                                <textarea name="feedback_description" class="form-control required-step" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 4 --}}
                    <div class="wizard-step-content d-none" id="step-4">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control required-step">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control required-step" rows="4"></textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control required-step" rows="4"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-secondary" id="prevBtn" style="display:none;">Previous</button>
                        <button type="button" class="btn btn-primary ml-auto" id="nextBtn">Next</button>
                        <button type="submit" class="btn btn-success ml-2 d-none" id="submitBtn">Save Case Study</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    .wizard-step-box {
        background: #f1f1f1;
        padding: 15px;
        text-align: center;
        border-radius: 6px;
        font-weight: 600;
        color: #777;
        cursor: pointer;
        transition: 0.3s;
    }

    .wizard-step-box.active {
        background: #6777ef;
        color: #fff;
    }

    .is-invalid {
        border: 2px solid red !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let currentStep = 1;
        const totalSteps = 4;

        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        const submitBtn = document.getElementById('submitBtn');

        function validateStep(step) {
            const stepContainer = document.getElementById('step-' + step);
            const requiredFields = stepContainer.querySelectorAll('.required-step');
            let isValid = true;

            requiredFields.forEach(field => {
                field.classList.remove('is-invalid');

                if (field.type === 'file') {
                    if (!field.files || field.files.length === 0) {
                        field.classList.add('is-invalid');
                        isValid = false;
                    }
                } else {
                    if (field.value.trim() === '') {
                        field.classList.add('is-invalid');
                        isValid = false;
                    }
                }
            });

            if (!isValid) {
                alert('Please fill all required fields before going to the next step.');
            }

            return isValid;
        }

        function showStep(step) {
            for (let i = 1; i <= totalSteps; i++) {
                document.getElementById('step-' + i).classList.add('d-none');
                document.querySelector('.wizard-step-box[data-step="' + i + '"]').classList.remove('active');
            }

            document.getElementById('step-' + step).classList.remove('d-none');
            document.querySelector('.wizard-step-box[data-step="' + step + '"]').classList.add('active');

            prevBtn.style.display = step === 1 ? 'none' : 'inline-block';

            if (step === totalSteps) {
                nextBtn.classList.add('d-none');
                submitBtn.classList.remove('d-none');
            } else {
                nextBtn.classList.remove('d-none');
                submitBtn.classList.add('d-none');
            }
        }

        nextBtn.addEventListener('click', function () {
            if (validateStep(currentStep)) {
                if (currentStep < totalSteps) {
                    currentStep++;
                    showStep(currentStep);
                }
            }
        });

        prevBtn.addEventListener('click', function () {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });

        showStep(currentStep);
    });
</script>
@endsection