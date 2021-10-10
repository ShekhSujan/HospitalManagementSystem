@extends('backend.app.index') @section('content')
<div class="page-header">
    <ol class="breadcrumb">
    </ol>
</div>
<div class="main-container">
    @include('backend.pages.home.components.top-report')
    <div class="row gutters">
        @include('backend.pages.home.components.yearly-report')
        @include('backend.pages.home.components.patient-ratio')
        @include('backend.pages.home.components.age-wise-report')

        @include('backend.pages.home.components.payment-ratio')
    </div>

</div>
@endsection
