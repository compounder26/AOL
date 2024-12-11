@extends('app')

@section('header')
    @include('components.navbar', ['page' => 'about'])
@endsection

@section('content')
    <div class="container-fluid py-5 text-white text-align-justify" style="max-width: 1500px">
        <div class="row">
            <div class="col-lg-10 mx-auto"s>
                <p class="display-4 text-success text-center mt-4 mb-2 fw-bold">ABOUT US</p>
                <section class="mb-5">
                    <h2 class="display-6 text-success pb-3 mb-4 fw-bold" style="border-bottom: 1px solid black;">What Is NOVERTY?</h2>
                    <p class="h4 text-black fw-light" style="text-align: justify">
                        Established in 2024, NOVERTY is a dynamic platform designed to empower individuals through volunteering opportunities. With over 100 active members and 1,000+ initiatives, NOVERTY connects passionate volunteers to meaningful causes, fostering collaboration and creating lasting impact. Our mission is aligned with the United Nations' efforts to eradicate poverty and build a thriving, sustainable future for all.
                    </p>
                </section>
                <section class="mb-5">
                    <h2 class="display-6 text-success pb-3 mb-4 fw-bold" style="border-bottom: 1px solid black;">Our Purposes</h2>
                    <div class="row g-4">
                        <div class="col-md-6 mb-3">
                            <h3 class="text-success mb-3">Fostering Global Collaboration</h3>
                            <p class="h4 text-black fw-light" style="text-align: justify">
                                At NOVERTY, we believe that the power of collective action can drive significant change. Our platform provides users with the tools to create and join customized volunteering initiatives, addressing the unique needs of local communities or personal passions.
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h3 class="text-success mb-3">Supporting the United Nations' Sustainable Development Goals (SDGs)</h3>
                            <p class="h4 text-black fw-light" style="text-align: justify">
                                We are committed to supporting the United Nations in its mission to eradicate poverty and contribute to the broader global goals of sustainability and equity. Through volunteering, we aim to make a tangible difference in the world.
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h3 class="text-success mb-3">Building a Community of Change-Makers</h3>
                            <p class="h4 text-black fw-light" style="text-align: justify">
                                NOVERTY is more than just a volunteering platform; it is a global network of like-minded individuals working together toward a common goal: a better, more equitable world. Our members collaborate, learn, and inspire each other to take action.
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h3 class="text-success mb-3">Creating Meaningful Impact</h3>
                            <p class="h4 text-black fw-light" style="text-align: justify">
                                Every volunteer initiative on NOVERTY is designed to leave a lasting mark on the community. We empower individuals to tackle real-world challenges, from local outreach programs to global sustainability efforts.
                            </p>
                        </div>
                    </div>
                </section>
                <section>
                    <h2 class="display-6 text-success pb-3 mb-4 fw-bold" style="border-bottom: 1px solid black;">Our Commitment</h2>
                    <p class="h4 text-black fw-light" style="text-align: justify">
                        We are dedicated to providing a space where every volunteer can make a difference, no matter how big or small the action. With NOVERTY, every individual has the opportunity to contribute to the global movement for social justice, equity, and environmental sustainability.
                    </p>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('components.footer')
@endsection
