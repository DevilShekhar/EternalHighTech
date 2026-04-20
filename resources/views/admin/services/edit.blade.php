@extends('admin.layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Services</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Services Wizard Form</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
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
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="Active" {{ old('status', $service->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ old('status', $service->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Heading</label>
                                    <input type="text" name="heading" class="form-control" value="{{ old('heading', $service->heading) }}" required>
                                    @error('heading')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sub Heading</label>
                                    <input type="text" name="sub_heading" class="form-control" value="{{ old('sub_heading', $service->sub_heading) }}">
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
                        <div id="allSectionsWrapper">
                            @if($service->extraSections && $service->extraSections->count() > 0)
                                @foreach($service->extraSections as $index => $section)
                                    <div class="card mb-3 section-item existing-section-item">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h6 class="mb-0 section-title">Section {{ $index + 1 }}</h6>

                                            @if($index != 0)
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeExistingSection(this)">
                                                    Remove
                                                </button>
                                            @endif
                                        </div>

                                        <div class="card-body">
                                            <input type="hidden"
                                                   class="section-no-input"
                                                   name="existing_extra_sections[{{ $section->id }}][section_no]"
                                                   value="{{ $index + 1 }}">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="heading-label">
                                                            {{ $index == 0 ? 'Sec One Heading' : 'Section ' . ($index + 1) . ' Heading' }}
                                                        </label>
                                                        <input type="text"
                                                               class="form-control section-heading-input"
                                                               name="existing_extra_sections[{{ $section->id }}][heading]"
                                                               value="{{ old('existing_extra_sections.'.$section->id.'.heading', $section->heading) }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="subheading-label">
                                                            {{ $index == 0 ? 'Sec One Sub Heading' : 'Section ' . ($index + 1) . ' Sub Heading' }}
                                                        </label>
                                                        <input type="text"
                                                               class="form-control section-subheading-input"
                                                               name="existing_extra_sections[{{ $section->id }}][sub_heading]"
                                                               value="{{ old('existing_extra_sections.'.$section->id.'.sub_heading', $section->sub_heading) }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="image-label">
                                                            {{ $index == 0 ? 'Sec One Image' : 'Section ' . ($index + 1) . ' Image' }}
                                                        </label>
                                                        <input type="file"
                                                               class="form-control section-image-input"
                                                               name="existing_extra_sections[{{ $section->id }}][image]">

                                                        @if($section->image)
                                                            <div class="mt-2">
                                                                <img src="{{ asset($section->image) }}"
                                                                     alt="Section Image"
                                                                     width="100"
                                                                     style="border-radius:6px; border:1px solid #ddd; padding:2px;">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="description-label">
                                                            {{ $index == 0 ? 'Sec One Description' : 'Section ' . ($index + 1) . ' Description' }}
                                                        </label>
                                                        <textarea class="form-control summernote-existing section-description-input"
                                                                  name="existing_extra_sections[{{ $section->id }}][description]">{{ old('existing_extra_sections.'.$section->id.'.description', $section->description) }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="card mb-3 section-item new-section-item">
                                    <div class="card-header">
                                        <h6 class="mb-0 section-title">Section 1</h6>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden"
                                               class="section-no-input"
                                               name="new_extra_sections[0][section_no]"
                                               value="1">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="heading-label">Sec One Heading</label>
                                                    <input type="text"
                                                           class="form-control section-heading-input"
                                                           name="new_extra_sections[0][heading]">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="subheading-label">Sec One Sub Heading</label>
                                                    <input type="text"
                                                           class="form-control section-subheading-input"
                                                           name="new_extra_sections[0][sub_heading]">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="image-label">Sec One Image</label>
                                                    <input type="file"
                                                           class="form-control section-image-input"
                                                           name="new_extra_sections[0][image]">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="description-label">Sec One Description</label>
                                                    <textarea class="form-control summernote-existing section-description-input"
                                                              name="new_extra_sections[0][description]"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <button type="button" class="btn btn-primary btn-sm" onclick="addNewSection()">
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
                                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $service->meta_title) }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{ old('meta_keyword', $service->meta_keyword) }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="4">{{ old('meta_description', $service->meta_description) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-light mr-2" onclick="showStep(2)">Previous</button>
                            <button type="submit" class="btn btn-primary">Update</button>
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
        initSummernote('.summernote-existing');
        showStep(1);
        refreshSectionNumbers();
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
        return document.querySelectorAll('#allSectionsWrapper .section-item').length + 1;
    }

    function getNextNewIndex() {
        return document.querySelectorAll('#allSectionsWrapper .new-section-item').length;
    }

    function addNewSection() {
        const wrapper = document.getElementById('allSectionsWrapper');
        const sectionNumber = getNextSectionNumber();
        const newIndex = getNextNewIndex();
        const word = numberToWord(sectionNumber);
        const uniqueId = 'new_description_' + Date.now() + '_' + Math.floor(Math.random() * 1000);

        const html = `
            <div class="card mb-3 section-item new-section-item">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 section-title">Section ${sectionNumber}</h6>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeNewSection(this)">Remove</button>
                </div>

                <div class="card-body">
                    <input type="hidden"
                           class="section-no-input"
                           name="new_extra_sections[${newIndex}][section_no]"
                           value="${sectionNumber}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="heading-label">Sec ${word} Heading</label>
                                <input type="text"
                                       class="form-control section-heading-input"
                                       name="new_extra_sections[${newIndex}][heading]">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="subheading-label">Sec ${word} Sub Heading</label>
                                <input type="text"
                                       class="form-control section-subheading-input"
                                       name="new_extra_sections[${newIndex}][sub_heading]">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="image-label">Sec ${word} Image</label>
                                <input type="file"
                                       class="form-control section-image-input"
                                       name="new_extra_sections[${newIndex}][image]">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="description-label">Sec ${word} Description</label>
                                <textarea id="${uniqueId}"
                                          class="form-control summernote-new section-description-input"
                                          name="new_extra_sections[${newIndex}][description]"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        wrapper.insertAdjacentHTML('beforeend', html);
        initSummernote('#' + uniqueId);
        refreshSectionNumbers();
    }

    function removeExistingSection(button) {
        const item = button.closest('.existing-section-item');

        $(item).find('.summernote-existing').each(function () {
            if ($(this).next('.note-editor').length) {
                $(this).summernote('destroy');
            }
        });

        item.remove();
        refreshSectionNumbers();
    }

    function removeNewSection(button) {
        const item = button.closest('.new-section-item');

        $(item).find('.summernote-new').each(function () {
            if ($(this).next('.note-editor').length) {
                $(this).summernote('destroy');
            }
        });

        item.remove();
        refreshSectionNumbers();
    }

    function refreshSectionNumbers() {
        const items = document.querySelectorAll('#allSectionsWrapper .section-item');

        items.forEach((item, index) => {
            const sectionNumber = index + 1;
            const word = numberToWord(sectionNumber);

            const title = item.querySelector('.section-title');
            if (title) {
                title.textContent = `Section ${sectionNumber}`;
            }

            const headingLabel = item.querySelector('.heading-label');
            if (headingLabel) {
                headingLabel.textContent = `Sec ${word} Heading`;
            }

            const subheadingLabel = item.querySelector('.subheading-label');
            if (subheadingLabel) {
                subheadingLabel.textContent = `Sec ${word} Sub Heading`;
            }

            const imageLabel = item.querySelector('.image-label');
            if (imageLabel) {
                imageLabel.textContent = `Sec ${word} Image`;
            }

            const descriptionLabel = item.querySelector('.description-label');
            if (descriptionLabel) {
                descriptionLabel.textContent = `Sec ${word} Description`;
            }

            const hiddenInput = item.querySelector('.section-no-input');
            if (hiddenInput) {
                hiddenInput.value = sectionNumber;
            }
        });
    }
</script>
@endsection