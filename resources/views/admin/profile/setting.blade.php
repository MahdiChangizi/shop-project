@extends('admin.layouts.master')

@section('content')

<div class="card mb-4">
    <h5 class="card-header">Profile Details</h5>
    <!-- Account -->
    <div class="card-body">
      <div class="d-flex align-items-start align-items-sm-center gap-4">
        <img src="file:///C:/Users/Mahdi/Desktop/app/vuexy-admin-v9.3.0/html-version/Bootstrap5/vuexy-bootstrap-html-admin-template/assets/img/avatars/14.png" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar">
        <div class="button-wrapper">
          <label for="upload" class="btn btn-primary me-2 mb-3 waves-effect waves-light" tabindex="0">
            <span class="d-none d-sm-block">Upload new photo</span>
            <i class="ti ti-upload d-block d-sm-none"></i>
            <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
          </label>
          <button type="button" class="btn btn-label-secondary account-image-reset mb-3 waves-effect">
            <i class="ti ti-refresh-dot d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Reset</span>
          </button>

          <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
        </div>
      </div>
    </div>
    <hr class="my-0">
    <div class="card-body">
      <form id="formAccountSettings" method="POST" onsubmit="return false" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
        <div class="row">
          <div class="mb-3 col-md-6 fv-plugins-icon-container">
            <label for="firstName" class="form-label">First Name</label>
            <input class="form-control" type="text" id="firstName" name="firstName" value="John" autofocus="">
          <div class="fv-plugins-message-container invalid-feedback"></div></div>
          <div class="mb-3 col-md-6 fv-plugins-icon-container">
            <label for="lastName" class="form-label">Last Name</label>
            <input class="form-control" type="text" name="lastName" id="lastName" value="Doe">
          <div class="fv-plugins-message-container invalid-feedback"></div></div>
          <div class="mb-3 col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input class="form-control" type="text" id="email" name="email" value="john.doe@example.com" placeholder="john.doe@example.com">
          </div>
          <div class="mb-3 col-md-6">
            <label for="organization" class="form-label">Organization</label>
            <input type="text" class="form-control" id="organization" name="organization" value="Pixinvent">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label" for="phoneNumber">Phone Number</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text">US (+1)</span>
              <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="202 555 0111">
            </div>
          </div>
          <div class="mb-3 col-md-6">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
          </div>
          <div class="mb-3 col-md-6">
            <label for="state" class="form-label">State</label>
            <input class="form-control" type="text" id="state" name="state" placeholder="California">
          </div>
          <div class="mb-3 col-md-6">
            <label for="zipCode" class="form-label">Zip Code</label>
            <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="231465" maxlength="6">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label" for="country">Country</label>
            <div class="position-relative"><select id="country" class="select2 form-select select2-hidden-accessible" data-select2-id="country" tabindex="-1" aria-hidden="true">
              <option value="" data-select2-id="2">Select</option>
              <option value="Australia">Australia</option>
              <option value="Bangladesh">Bangladesh</option>
              <option value="Belarus">Belarus</option>
              <option value="Brazil">Brazil</option>
              <option value="Canada">Canada</option>
              <option value="China">China</option>
              <option value="France">France</option>
              <option value="Germany">Germany</option>
              <option value="India">India</option>
              <option value="Indonesia">Indonesia</option>
              <option value="Israel">Israel</option>
              <option value="Italy">Italy</option>
              <option value="Japan">Japan</option>
              <option value="Korea">Korea, Republic of</option>
              <option value="Mexico">Mexico</option>
              <option value="Philippines">Philippines</option>
              <option value="Russia">Russian Federation</option>
              <option value="South Africa">South Africa</option>
              <option value="Thailand">Thailand</option>
              <option value="Turkey">Turkey</option>
              <option value="Ukraine">Ukraine</option>
              <option value="United Arab Emirates">United Arab Emirates</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option>
            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 660px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-country-container"><span class="select2-selection__rendered" id="select2-country-container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
          </div>
          <div class="mb-3 col-md-6">
            <label for="language" class="form-label">Language</label>
            <div class="position-relative"><select id="language" class="select2 form-select select2-hidden-accessible" data-select2-id="language" tabindex="-1" aria-hidden="true">
              <option value="" data-select2-id="4">Select Language</option>
              <option value="en">English</option>
              <option value="fr">French</option>
              <option value="de">German</option>
              <option value="pt">Portuguese</option>
            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 660px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-language-container"><span class="select2-selection__rendered" id="select2-language-container" role="textbox" aria-readonly="true" title="Select Language">Select Language</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
          </div>
          <div class="mb-3 col-md-6">
            <label for="timeZones" class="form-label">Timezone</label>
            <div class="position-relative"><select id="timeZones" class="select2 form-select select2-hidden-accessible" data-select2-id="timeZones" tabindex="-1" aria-hidden="true">
              <option value="" data-select2-id="6">Select Timezone</option>
              <option value="-12">(GMT-12:00) International Date Line West</option>

            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 660px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-timeZones-container"><span class="select2-selection__rendered" id="select2-timeZones-container" role="textbox" aria-readonly="true" title="Select Timezone">Select Timezone</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
          </div>
          <div class="mb-3 col-md-6">
            <label for="currency" class="form-label">Currency</label>
            <div class="position-relative"><select id="currency" class="select2 form-select select2-hidden-accessible" data-select2-id="currency" tabindex="-1" aria-hidden="true">
              <option value="" data-select2-id="8">Select Currency</option>
              <option value="usd">USD</option>
              <option value="euro">Euro</option>
              <option value="pound">Pound</option>
              <option value="bitcoin">Bitcoin</option>
            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="7" style="width: 660px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-currency-container"><span class="select2-selection__rendered" id="select2-currency-container" role="textbox" aria-readonly="true" title="Select Currency">Select Currency</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
          </div>
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Save changes</button>
          <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button>
        </div>
      <input type="hidden"></form>
    </div>
    <!-- /Account -->
  </div>


@endsection
