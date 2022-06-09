@extends('layouts.app')

@section('content')



    {{-- @if($restaurant)
    
        <div class="container restaurant-index">

            <p>Ciao {{$user->name}}</p>
            <p>
                Questa è la tua dashboard. Da qui puoi visualizzare la preview del tuo ristorante e
                accedere al menu dello stesso cliccando sull apposito tasto.
            </p>

            <h3><a href="{{route('admin.plates.index')}}">{{ $user->company_name}}</a></h3>

            @if($restaurant->categories)

                @foreach ($restaurant->categories as $category)
                    <span class="badge rounded-pill bg-success mb-2">{{$category->name}}</span>
                @endforeach

            @endif

            <p class="description">
                {{$restaurant->info ? $restaurant->info : 'Nessuna descrizione'}}
            </p>
            
            <a href="{{route('admin.plates.index')}}" type="button" class="btn btn-primary">Visualizza Piatti</a>
        </div>        

    @else 

        <div class="container">
            <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary">Crea Ristorante</a>
        </div>
        
    @endif --}}








<section class="img-restaurant-index d-flex align-items-center">

    @if($restaurant)
        
    <div class="splash-container d-flex flex-column justify-content-center align item-center">
        <div class="user-welcome text-center align-self-center">
            <h3>Ciao {{$user->name}}</h3>
            <p>
                Questa è la tua dashboard. Da qui puoi visualizzare la preview del tuo ristorante e
                accedere al menu dello stesso cliccando sull apposito tasto.
            </p>
        </div>
        
        <div class="splash">
            <h1 class="splash-head">{{ $user->company_name}}</h1>
            <p class="splash-subhead">
                {{$restaurant->info ? $restaurant->info : 'Nessuna descrizione'}}
            </p>
            <p>
                <a href="{{route('admin.plates.index')}}" class="pure-button">Visualizza Piatti</a>
            </p>
        </div>
    </div>
    
    {{-- <div class="content-wrapper">
        <div class="content">
            <h2 class="content-head is-center">Excepteur sint occaecat cupidatat.</h2>
    
            <div class="pure-g">
                <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
    
                    <h3 class="content-subhead">
                        <i class="fa fa-rocket"></i>
                        Get Started Quickly
                    </h3>
                    <p>
                        Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.
                    </p>
                </div>
                <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                    <h3 class="content-subhead">
                        <i class="fa fa-mobile"></i>
                        Responsive Layouts
                    </h3>
                    <p>
                        Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.
                    </p>
                </div>
                <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                    <h3 class="content-subhead">
                        <i class="fa fa-th-large"></i>
                        Modular
                    </h3>
                    <p>
                        Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.
                    </p>
                </div>
                <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                    <h3 class="content-subhead">
                        <i class="fa fa-check-square-o"></i>
                        Plays Nice
                    </h3>
                    <p>
                        Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.
                    </p>
                </div>
            </div>
        </div>
    
        <div class="ribbon l-box-lrg pure-g">
            <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
                <img width="300" alt="File Icons" class="pure-img-responsive" src="/img/common/file-icons.png">
            </div>
            <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">
    
                <h2 class="content-head content-head-ribbon">Laboris nisi ut aliquip.</h2>
    
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor.
                </p>
            </div>
        </div>
    
        <div class="content">
            <h2 class="content-head is-center">Dolore magna aliqua. Uis aute irure.</h2>
    
            <div class="pure-g">
                <div class="l-box-lrg pure-u-1 pure-u-md-2-5">
                    <form class="pure-form pure-form-stacked">
                        <fieldset>
    
                            <label for="name">Your Name</label>
                            <input id="name" type="text" placeholder="Your Name">
    
    
                            <label for="email">Your Email</label>
                            <input id="email" type="email" placeholder="Your Email">
    
                            <label for="password">Your Password</label>
                            <input id="password" type="password" placeholder="Your Password">
    
                            <button type="submit" class="pure-button">Sign Up</button>
                        </fieldset>
                    </form>
                </div>
    
                <div class="l-box-lrg pure-u-1 pure-u-md-3-5">
                    <h4>Contact Us</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                    </p>
    
                    <h4>More Information</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div>
    
        </div>
    
        <div class="footer l-box is-center">
            View the source of this layout to learn more. Made with love by the Pure Team.
        </div>
    
    </div> --}}

@else 

    <div class="container">
        <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary">Crea Ristorante</a>
    </div>
    
@endif

</section>




@endsection 