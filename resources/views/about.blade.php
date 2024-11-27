@extends(Auth::check() ? 'layout' : 'layoutGuest')

@section('title', 'About Us')

@section('content')
<div class="container mt-5">
    <h1>About VolunteerHub</h1>
    <p>VolunteerHub is a platform dedicated to connecting volunteers with meaningful opportunities to make a positive impact in their communities.</p>
    <p>We believe in the power of volunteering to bring about change, and our mission is to make it easier for individuals to find and participate in events that matter to them.</p>
</div>
@endsection
