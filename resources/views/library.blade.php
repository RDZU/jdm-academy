@include('layouts.header')

<div class="row">
    <div class="col-md-12">
        <div class="card pt-5" style="background-image: url('images/jumbotron.png');margin-top: 70px;">
            <h1 class="card-title pt-3 mb-5 text-center text-white">
                <i class="fa fa-th"></i>
                <strong>{{trans('global.books.banner')}}</strong>
            </h1>
        </div>
    </div>
</div>

        

   <main class="py-4">
                    
<div class="pl-5 pr-5">
    <div class="row justify-content-center">

@foreach($books as $book)
         <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card card-01">
    <img
        class="card-img-top"
        src="{{asset('uploads/'.$book->picture)}}"
        alt="Dignissimos facere temporibus qui ipsa minus laborum ut et."
    />
    <div class="card-body">
        <span class="badge-box"><i class="fa fa-check"></i></span>
        <h4 class="card-title">{{ $book->title }}</h4>
        <hr />
        {{--
        <div class="row justify-content-center">
            
            <div>
    <ul class="list-inline">
        <li class="list-inline-item"><i class="fa fa-star"></i></li>
        <li class="list-inline-item"><i class="fa fa-star"></i></li>
        <li class="list-inline-item"><i class="fa fa-star"></i></li>
        <li class="list-inline-item"><i class="fa fa-star"></i></li>
        <li class="list-inline-item"><i class="fa fa-star"></i></li>
    </ul>
</div>        </div>
        <hr />
        --}}
        <span class="badge badge-danger badge-cat"> {{ $book->subject}}</span>
        <p class="card-text">
           
           {{ str_limit($book->description,155,' ...')}}
        </p>

 

        @if (\Auth::check())
        <a
            href="{{asset('uploads/'.$book->file) }}"
            class="btn btn-info btn-block" style="border-radius:5px;" >
            {{trans('global.books.boton')}}
        </a>
        @else
        <a href="{{asset('uploads/'.$book->picture)}}" class="btn btn-info btn-block" style="border-radius:5px;" data-toggle="modal" data-target="#Login_Modal" type="button">{{trans('global.books.boton')}}</a>
        @endif
    </div>
</div>          
  </div>
   @endforeach

  </div>
  <div class="row justify-content-center">
  	{{$books->links("pagination::bootstrap-4")}}
  </div>
</div>

        </main>


{{-- 
    @foreach($books as $book)
        {{ $book->title }}
        {{ $book->description }}
        {{$book->authors }}
        {{asset('uploads/'.$book->picture)}}
     @endforeach  
--}}

@include('layouts.footer')