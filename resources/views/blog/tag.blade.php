@extends('layouts.blog')

@section('title')
 {{$tag->name}}
@endsection

@section('header')

<header class="header text-center text-black" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
  <div class="container">

    <div class="row">
      <div class="col-md-8 mx-auto">

        <h1>
        {{$tag->name}}
        </h1>

      </div>
    </div>

  </div>
</header><!-- /.header -->


@endsection

@section('content')

<main class="main-content">
  <div class="section bg-gray">
    <div class="container">
      <div class="row">


        <div class="col-md-8 col-xl-9">
          <div class="row gap-y">
            @foreach( $posts as $post )

            <div class="col-md-6">
              <div class="card border hover-shadow-6 mb-6 d-block">
                <a href="{{ route('blog.show',$post->id) }}"><img class="card-img-top" src="{{asset('storage/'.$post->image )}}"  alt="Card image cap"></a>
                <div class="p-6 text-center">
                  <p><a class="small-5 text-dark text-uppercase ls-2 fw-400" href="#">
                      {{ $post->category->name }}
                  </a>
                </p>
                  <h5 class="mb-0"><a class="text-dark" href="{{route('blog.show', $post->id) }}">
                    {{ $post->title }}
                  </a>
                </h5>
                </div>
              </div>
            </div>
            @endforeach



          </div>


          <!-- <nav class="flexbox mt-30">
            <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
            <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
          </nav> -->
          {{ $posts->appends(['search' => request()->query('search')])->links() }}
        </div>



        <div class="col-md-4 col-xl-3">
          <div class="sidebar px-4 py-md-0">

            <h6 class="sidebar-title">Search</h6>
            <form class="input-group" action="{{route('welcome')}}" method="GET">
              <input type="text" class="form-control" name="search" placeholder="Search" value="{{request()->query('search')}}">
              <div class="input-group-addon">
                <span class="input-group-text"><i class="ti-search"></i></span>
              </div>
            </form>

            <hr>

            <hr>

            <hr>

            <h6 class="sidebar-title">Tags</h6>
            <div class="gap-multiline-items-1">
              @foreach( $tags as $tag )
              <a class="badge badge-secondary" href="{{route('blog.tag',$tag->id)}}">
                  {{ $tag->name }}
                </a>
                @endforeach

            </div>

            <hr>

            <!-- <h6 class="sidebar-title">About</h6>
            <p class="small-3">TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.</p>
-->

          </div>
        </div>

      </div>
    </div>
  </div>
</main>
@endsection
