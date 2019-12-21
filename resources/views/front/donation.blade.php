@extends('front.master')
@section('content')
 <!-- donator Start -->
<section id="donator">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>Name:</th>
                            <td>{{$donation->patient_name}}</td>
                        </tr>
                        <tr>
                            <th>Age:</th>
                            <td>{{$donation->patient_age}}</td>
                        </tr>
                        <tr>
                            <th>Hospital:</th>
                            <td>{{$donation->hospital_name}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th>Blood Type:</th>
                        <td>{{$donation->bloodType->name}}</td>
                    </tr>
                    <tr>
                        <th>Number of Required Blood Bags:</th>
                        <td>{{$donation->bags_number}}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{$donation->patient_phone}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        
                        <th>Hospital Address:</th>
                        <td>{{$donation->hospital_address}}</td>
                    </tr>
                </table>
            </div>
            </div>
            <div class="details-container">
                <p>{{$donation->notes}}</p>
                <!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim, ipsum reiciendis deleniti dolor quia
                    voluptate itaque vero doloremque labore consequuntur. Excepturi a neque doloremque. Vitae debitis
                    sit explicabo tenetur est.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur cumque, hic enim nostrum assumenda
                    esse quisquam error doloribus dolorem dolor commodi. Ratione eaque voluptate voluptatibus mollitia
                    doloremque suscipit perferendis earum.
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. In impedit mollitia similique tenetur,
                    excepturi soluta culpa perferendis magni perspiciatis ullam porro rerum amet inventore voluptates
                    ad, minima facere quam asperiores.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet delectus laudantium aut recusandae
                    quo aliquid cum magni. Praesentium, suscipit dolor reprehenderit unde natus laboriosam? Provident
                    rem officiis et impedit fugit?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quasi ullam nemo neque aut
                    reprehenderit! Animi adipisci omnis eius iure ullam, dolorum odit ut nostrum atque repellat in earum
                    velit.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum rem natus sapiente, dolores, ratione
                    ducimus sequi iusto mollitia porro nobis eligendi ipsum, quibusdam minus beatae provident totam enim
                    est et.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae magnam, debitis veritatis libero
                    ipsum odio, architecto neque quibusdam cupiditate iste distinctio dignissimos temporibus! Harum eius
                    possimus tenetur tempora placeat tempore?
                </p> -->
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13648.620397637154!2d29.9420796!3d31.2164321!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8476f62bb5008c82!2sAndalusia%20Smouha%20Hospital!5e0!3m2!1sen!2seg!4v1567936654125!5m2!1sen!2seg"
                width="1000" height="550" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </section>
    <!-- Who End -->

@endsection
@section('login')
<button class="btn signup" onclick= "window.location.href = 'signup.html';">my profile</button>
<button class="btn login" onclick= "window.location.href = '{{ route('clienthome.logout') }}'">Logout</button>
 <!-- <button class="btn login" onclick= "window.location.href = '{{ route('clienthome.login') }}'">Login</button> -->
 @endsection
