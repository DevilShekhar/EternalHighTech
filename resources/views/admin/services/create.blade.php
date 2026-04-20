@extends('admin.layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->role === 'admin')

<section class="section">
    <div class="section-header">
        <h1>Add Services</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Services Wizard Form</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-md-4 mb-2">
                            <button type="button" class="btn btn-primary btn-block" id="stepBtn1" onclick="showStep(1)">1. Basic Info</button>
                        </div>
                        <div class="col-md-4 mb-2">
                            <button type="button" class="btn btn-light btn-block" id="stepBtn2" onclick="showStep(2)">2. Sections</button>
                        </div>
                        <div class="col-md-4 mb-2">
                            <button type="button" class="btn btn-light btn-block" id="stepBtn3" onclick="showStep(3)">3. Meta</button>
                        </div>
                    </div>

                    {{-- STEP 1 --}}
                    <div id="step1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Heading</label>
                                    <input type="text" name="heading" class="form-control" value="{{ old('heading') }}" required>
                                    @error('heading')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sub Heading</label>
                                    <input type="text" name="sub_heading" class="form-control" value="{{ old('sub_heading') }}">
                                    @error('sub_heading')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-primary" onclick="showStep(2)">Next</button>
                        </div>
                    </div>

                    {{-- STEP 2 --}}
                    <div id="step2" style="display:none;">
                        {{-- Section 1 --}}
                        <div class="card mb-3 fixed-section-one">
                            <div class="card-header">
                                <h6 class="mb-0">Section 1</h6>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="extra_sections[1][section_no]" value="1">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sec One Heading</label>
                                            <input type="text" class="form-control" name="extra_sections[1][heading]" value="{{ old('extra_sections.1.heading') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sec One Sub Heading</label>
                                            <input type="text" class="form-control" name="extra_sections[1][sub_heading]" value="{{ old('extra_sections.1.sub_heading') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sec One Image</label>
                                            <input type="file" class="form-control" name="extra_sections[1][image]">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Sec One Description</label>
                                            <textarea class="form-control summernote" name="extra_sections[1][description]">{{ old('extra_sections.1.description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Dynamic sections container --}}
                        <div id="extraSectionsWrapper"></div>

                        {{-- Add button Section 1 chya khali --}}
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary btn-sm" onclick="addExtraSection()">
                                <i class="fa fa-plus"></i> Add Section
                            </button>
                        </div>

                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-light mr-2" onclick="showStep(1)">Previous</button>
                            <button type="button" class="btn btn-primary" onclick="showStep(3)">Next</button>
                        </div>
                    </div>

                    {{-- STEP 3 --}}
                    <div id="step3" style="display:none;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{ old('meta_keyword') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="4">{{ old('meta_description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-light mr-2" onclick="showStep(2)">Previous</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<style>
    .note-editable {
        color: #000 !important;
        background: #fff !important;
    }
    .note-editable * {
        color: #000 !important;
        background: transparent !important;
    }
</style>

<script>
    function initSummernote(selector) {
        $(selector).summernote({
            height: 250,
            callbacks: {
                onPaste: function (e) {
                    e.preventDefault();
                    var text = (e.originalEvent || e).clipboardData.getData('text/plain');
                    document.execCommand('insertText', false, text);
                }
            }
        });
    }

    $(document).ready(function () {
        initSummernote('.summernote');
        showStep(1);
    });

    function showStep(step) {
        document.getElementById('step1').style.display = (step === 1) ? 'block' : 'none';
        document.getElementById('step2').style.display = (step === 2) ? 'block' : 'none';
        document.getElementById('step3').style.display = (step === 3) ? 'block' : 'none';

        for (let i = 1; i <= 3; i++) {
            document.getElementById('stepBtn' + i).classList.remove('btn-primary');
            document.getElementById('stepBtn' + i).classList.add('btn-light');
        }

        document.getElementById('stepBtn' + step).classList.remove('btn-light');
        document.getElementById('stepBtn' + step).classList.add('btn-primary');
    }

    function numberToWord(num) {
        const words = {
            1: 'One',
            2: 'Two',
            3: 'Three',
            4: 'Four',
            5: 'Five',
            6: 'Six',
            7: 'Seven',
            8: 'Eight',
            9: 'Nine',
            10: 'Ten',
            11: 'Eleven',
            12: 'Twelve',
            13: 'Thirteen',
            14: 'Fourteen',
            15: 'Fifteen',
            16: 'Sixteen',
            17: 'Seventeen',
            18: 'Eighteen',
            19: 'Nineteen',
            20: 'Twenty'
        };
        return words[num] || num;
    }

    function getNextSectionNumber() {
        return document.querySelectorAll('#extraSectionsWrapper .extra-section-item').length + 2;
    }

    function addExtraSection() {
        const wrapper = document.getElementById('extraSectionsWrapper');
        const sectionNumber = getNextSectionNumber();
        const word = numberToWord(sectionNumber);
        const uniqueId = 'extra_description_' + Date.now() + '_' + Math.floor(Math.random() * 1000);

        const html = `
            <div class="card mb-3 extra-section-item">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 section-title">Section ${sectionNumber}</h6>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeExtraSection(this)">Remove</button>
                </div>
                <div class="card-body">
                    <input type="hidden" class="section-no-input" name="extra_sections[${sectionNumber}][section_no]" value="${sectionNumber}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="heading-label">Sec ${word} Heading</label>
                                <input type="text" class="form-control section-heading-input" name="extra_sections[${sectionNumber}][heading]">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="subheading-label">Sec ${word} Sub Heading</label>
                                <input type="text" class="form-control section-subheading-input" name="extra_sections[${sectionNumber}][sub_heading]">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="image-label">Sec ${word} Image</label>
                                <input type="file" class="form-control section-image-input" name="extra_sections[${sectionNumber}][image]">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="description-label">Sec ${word} Description</label>
                                <textarea id="${uniqueId}" class="form-control section-description-input summernote-extra" name="extra_sections[${sectionNumber}][description]"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        wrapper.insertAdjacentHTML('beforeend', html);
        initSummernote('#' + uniqueId);
        refreshExtraSectionNumbers();
    }

    function removeExtraSection(button) {
        const item = button.closest('.extra-section-item');

        $(item).find('.summernote-extra').each(function () {
            if ($(this).next('.note-editor').length) {
                $(this).summernote('destroy');
            }
        });

        item.remove();
        refreshExtraSectionNumbers();
    }

    function refreshExtraSectionNumbers() {
        const items = document.querySelectorAll('#extraSectionsWrapper .extra-section-item');

        items.forEach((item, index) => {
            const sectionNumber = index + 2;
            const word = numberToWord(sectionNumber);

            const title = item.querySelector('.section-title');
            if (title) title.textContent = `Section ${sectionNumber}`;

            const headingLabel = item.querySelector('.heading-label');
            if (headingLabel) headingLabel.textContent = `Sec ${word} Heading`;

            const subheadingLabel = item.querySelector('.subheading-label');
            if (subheadingLabel) subheadingLabel.textContent = `Sec ${word} Sub Heading`;

            const imageLabel = item.querySelector('.image-label');
            if (imageLabel) imageLabel.textContent = `Sec ${word} Image`;

            const descriptionLabel = item.querySelector('.description-label');
            if (descriptionLabel) descriptionLabel.textContent = `Sec ${word} Description`;

            const hiddenInput = item.querySelector('.section-no-input');
            if (hiddenInput) {
                hiddenInput.name = `extra_sections[${sectionNumber}][section_no]`;
                hiddenInput.value = sectionNumber;
            }

            const headingInput = item.querySelector('.section-heading-input');
            if (headingInput) headingInput.name = `extra_sections[${sectionNumber}][heading]`;

            const subheadingInput = item.querySelector('.section-subheading-input');
            if (subheadingInput) subheadingInput.name = `extra_sections[${sectionNumber}][sub_heading]`;

            const imageInput = item.querySelector('.section-image-input');
            if (imageInput) imageInput.name = `extra_sections[${sectionNumber}][image]`;

            const descriptionInput = item.querySelector('.section-description-input');
            if (descriptionInput) descriptionInput.name = `extra_sections[${sectionNumber}][description]`;
        });
    }
</script>
@else
    @php abort(403); @endphp
@endif
@endsection