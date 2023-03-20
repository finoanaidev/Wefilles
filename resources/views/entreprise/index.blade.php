@extends('layouts.blank')

@section('content')
<section>

    <div class="row">
        @foreach ($entreprises as  $entreprise)
    <div class="col-lg-4 mt-4 mt-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
        <div class="d-flex align-items-start">
            <div class="card">
                <div class="card-body d-flex justify-content-space-between">
                <div class="col-md-4 m-5"><img style="border-radius:5%"src="{{asset('storage/'.$entreprise->image)}}" class="img-fluid" alt=""></div>
                <div>
                    <h4>{{$entreprise->user->name}}</h4>
                    <span>Domaine: {{$entreprise->domaine}}</span>
                    <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{route('entreprise.show',$entreprise->id)}}" class="btn btn-secondary"><i class="bi bi-eye-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
</section>
@endsection