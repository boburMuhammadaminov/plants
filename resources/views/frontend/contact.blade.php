@extends('frontend.layouts.app')

@section('content')
<!-- main -->
<div class="contact-wrapper">
  <div class="my-container">
    <div class="map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1650.9055065219227!2d69.34956705549729!3d41.36857583874566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef389904ded01%3A0x85b7d5878032d7f3!2sO&#39;simliklarni%20himoya%20qilish%20ilmiy%20tadqiqot%20instituti!5e0!3m2!1sen!2s!4v1637987732273!5m2!1sen!2s"
        width="100%"
        height="100%"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
      >
      </iframe>
    </div>
    <div class="form">
      <h4>{{__('word.contact')}}</h4>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{route('contactAdmin')}}" method="POST">
        @csrf
        <div class="wrapper">
          <input type="text" name="name" required placeholder="{{__('word.name')}}" value="{{old('name')}}" />
          <input type="email" name="email" placeholder="{{__('word.email')}}" value="{{old('email')}}" />
        </div>
        <input class="telefon" type="text" required name="phone" placeholder="{{__('word.phone')}}" value="{{old('phone')}}" />
        <textarea placeholder="{{__('word.message')}}" required rows="10" name="sms">{{old('sms')}}</textarea>
        <button type="submit">{{__('word.send')}}</button>
      </form>
    </div>
  </div>
</div>
<!-- main end -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (Session::has('send'))
  <script>
    Swal.fire(
      'Good job!',
      'Successfully sent!',
      'success'
    )
  </script>
@endif
@endsection