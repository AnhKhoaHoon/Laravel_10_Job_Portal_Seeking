@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Job Post</h1>
        </div>

        <div class="section-body">
            @foreach ($errors->all() as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach
            <div class="col-12">
                <div class="card-body">
                    <form action="{{ route('admin.jobs.store') }}" method="POST">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                Job Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control {{ hasError($errors, 'title') }}"
                                                name="title" value="{{ old('title') }}">
                                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Select Company <span class="text-danger ">*</span></label>
                                            <select name="company" id="" class="form-control select2 {{ hasError($errors, 'company') }}" >
                                                <option value="">Choose</option>
                                                @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('company')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Category <span class="text-danger">*</span></label>
                                            <select name="category" id="" class="form-control select2 {{ hasError($errors, 'category') }}" >
                                                <option value="">Choose</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Total Vacancies <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control {{ hasError($errors, 'vacancies') }}"
                                                name="vacancies" value="{{ old('vacancies') }}">
                                            <x-input-error :messages="$errors->get('vacancies')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Deadline <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datepicker {{ hasError($errors, 'deadline') }}"
                                            name="deadline" value="{{ old('deadline') }}">
                                            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Location
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Country </label>
                                            <select name="country" id="" class="form-control select2 country {{ hasError($errors, 'country') }}" >
                                                <option value="">Choose</option>
                                                @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">State </label>
                                            <select name="state" id="" class="form-control select2 state {{ hasError($errors, 'state') }}" >
                                                <option value="">Choose</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">City </label>
                                            <select name="city" id="" class="form-control select2 city {{ hasError($errors, 'city') }}" >
                                                <option value="">Choose</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control {{ hasError($errors, 'address') }}" name="address" value="{{ old('address') }}">
                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Salary Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input onclick="salaryModeChnage('salary_range')" type="radio" id="salary_range" class="from-control {{ hasError($errors, 'salary_mode') }}" name="salary_mode" checked value="range">
                                                    <label for="salary_range">Salary Range </label>
                                                    <x-input-error :messages="$errors->get('salary_mode')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input onclick="salaryModeChnage('custom_salary')" type="radio" id="custom_salary" class="from-control {{ hasError($errors, 'salary_mode') }}" name="salary_mode" value="custom">
                                                    <label for="custom_salary">Custom Salary </label>
                                                    <x-input-error :messages="$errors->get('salary_mode')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-12 salary_range_part">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Minimum Salary <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control {{ hasError($errors, 'min_salary') }}"
                                                        name="min_salary" value="{{ old('min_salary') }}">
                                                    <x-input-error :messages="$errors->get('min_salary')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Maximum Salary <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control {{ hasError($errors, 'max_salary') }}"
                                                        name="max_salary" value="{{ old('max_salary') }}">
                                                    <x-input-error :messages="$errors->get('max_salary')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 custom_salary_part d-none">
                                        <div class="form-group">
                                            <label for="">Custom Salary <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control {{ hasError($errors, 'custom_salary') }}"
                                                name="custom_salary" value="{{ old('custom_salary') }}">
                                            <x-input-error :messages="$errors->get('custom_salary')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Salary Type <span class="text-danger">*</span> </label>
                                            <select name="salary_type" id="" class="form-control select2 {{ hasError($errors, 'salary_type') }}" >
                                                <option value="">Choose</option>
                                                @foreach ($salaryTypes as $salaryType)
                                                <option value="{{ $salaryType->id }}">{{ $salaryType->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('salary_type')" class="mt-2" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Attributes
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Experience <span class="text-danger ">*</span></label>
                                            <select name="experience" id="" class="form-control select2 {{ hasError($errors, 'experience') }}" >
                                                <option value="">Choose</option>
                                                @foreach ($experiences as $experience)
                                                <option value="{{ $experience->id }}">{{ $experience->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Job Role <span class="text-danger ">*</span></label>
                                            <select name="job_role" id="" class="form-control select2 {{ hasError($errors, 'job_role') }}" >
                                                <option value="">Choose</option>
                                                @foreach ($jobRoles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('job_role')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Education <span class="text-danger ">*</span></label>
                                            <select name="education" id="" class="form-control select2 {{ hasError($errors, 'education') }}" >
                                                <option value="">Choose</option>
                                                @foreach ($educations as $education)
                                                <option value="{{ $education->id }}">{{ $education->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('education')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Job Type <span class="text-danger ">*</span></label>
                                            <select name="job_type" id="" class="form-control select2 {{ hasError($errors, 'job_type') }}" >
                                                <option value="">Choose</option>
                                                @foreach ($jobTypes as $jobType)
                                                <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('job_type')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Tags <span class="text-danger ">*</span></label>
                                            <select name="tags[]" id="" multiple class="form-control select2 {{ hasError($errors, 'tags') }}" >
                                                <option value="">Choose</option>
                                                @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach

                                            </select>
                                            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Benefits <span class="text-danger ">*</span></label>
                                            <input type="text" class="form-control inputtags {{ hasError($errors, 'benefits') }}"
                                                name="benefits" value="{{ old('benefits') }}">
                                            <x-input-error :messages="$errors->get('benefits')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Skills <span class="text-danger ">*</span></label>
                                            <select name="skills[]" id="" multiple class="form-control select2 {{ hasError($errors, 'skills') }}" >
                                                <option value="">Choose</option>
                                                @foreach ($skills as $skill)
                                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Application Options
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Receive Applications <span class="text-danger">*</span> </label>
                                            <select name="receive_applications" id="" class="form-control select2 {{ hasError($errors, 'receive_applications') }}" >
                                                <option value="app">On Our Platform</option>
                                                <option value="email">On your email address</option>
                                                <option value="custom_url">On a custom link</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('receive_applications')" class="mt-2" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Promote
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input  type="checkbox" id="featured" class="from-control {{ hasError($errors, 'featured') }}" name="featured" checked value="1">
                                                    <label for="featured">Featured </label>
                                                    <x-input-error :messages="$errors->get('featured')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <input type="checkbox" id="highlight" class="from-control {{ hasError($errors, 'highlight') }}" name="highlight" value="1">
                                                    <label for="highlight">Highlight </label>
                                                    <x-input-error :messages="$errors->get('highlight')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Description
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Description <span class="text-danger">*</span> </label>
                                            <textarea id="editor" name="description" ></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    $(".inputtags").tagsinput('items');

    function salaryModeChnage(mode) {
        if(mode == 'salary_range') {
            $('.salary_range_part').removeClass('d-none')
            $('.custom_salary_part').addClass('d-none')
        }else if (mode == 'custom_salary') {
            $('.salary_range_part').addClass('d-none')
            $('.custom_salary_part').removeClass('d-none')
        }
    }

    $('.country').on('change', function() {
            let country_id = $(this).val();
            // remove all previous cities
            $('.city').html("");

            $.ajax({
                mehtod: 'GET',
                url: '{{ route("get-states", ":id") }}'.replace(":id", country_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}" >${value.name}</option>`
                    });

                    $('.state').html(html);
                },
                error: function(xhr, status, error) {}
            })
        })

        // get cities
        $('.state').on('change', function() {
            let state_id = $(this).val();

            $.ajax({
                mehtod: 'GET',
                url: '{{ route("get-cities", ":id") }}'.replace(":id", state_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value="${value.id}" >${value.name}</option>`
                    });

                    $('.city').html(html);
                },
                error: function(xhr, status, error) {}
            })
        })
</script>
@endpush
