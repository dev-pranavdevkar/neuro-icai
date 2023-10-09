@extends('frontend.layouts.main')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-option contact-breadcrumb set-bg"
        data-setbg="{{ url('frontend/img/breadcrumb/contact-breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Submit A Vacancy</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Contact Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="contact__form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact__form__text">
                            <div class="contact__form__title">
                                <h2>Post Job</h2>
                                <p>Please fill this form to post Vacancies
                                <form action="#">
                                    <div class="input-list">
                                        <input type="text" placeholder="Firm Name">
                                        <input type="text" placeholder="Position">
                                    </div>
                                    <div class="input-list">
                                        <input type="number" placeholder="Number Opening">
                                        <input type="text" placeholder="Area">
                                        <input type="tel" placeholder="Pin Code">
                                    </div>
                                    <textarea placeholder="Address"></textarea>
                                    <textarea placeholder="Job Description"></textarea>
                                    <button type="submit" class="site-btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
    </section>
 
    <!-- Contact End -->
@endsection
