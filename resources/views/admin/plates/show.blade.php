@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>{{$plate['name']}}</h1>
        <h3>{{$plate['slug']}}</h3>


        <div>
            Immagine
            @if($plate->image)
            <img src="{{ asset('storage/'.$plate->image) }}" height="50" alt="">
            @endif
        </div>
        
        <p>{{$plate['description']}}</p>


        <span>Prezzp: {{$plate['price']}} euro</span>
        {{-- <span>{{$plate->available ? 'Disponibile' : 'Non Disponibile'}}</span> --}}

        @if($plate->available)
            <span class="text-success">Disponibile</span>            
        @else
        <span class="text-danger">Non Disponibile</span>
        @endif
        

        <div class="d-flex align-items-center">
            {{-- Form di eliminazione  --}}
            <form action="{{route('admin.plates.destroy', $plate)}}" method="post">
                @csrf
                @method('delete')

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#confirmPopUp">
                    Elimina
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="confirmPopUp" tabindex="-1" role="dialog" aria-labelledby="confirmPopUp" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="confirmPopUp">Conferma eiliminazione</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            Sei sicuro di volere eliminare questo piatto? 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                            <button type="submit" class="btn btn-primary">Elimina</button>
                        </div>
                    </div>
                    </div>
                </div>
               
            </form>
            
            

            <a type="button" href="{{ route('admin.plates.edit',$plate) }}" class="btn btn-warning my-3">Modifica</a>

        </div>
        
    </div>
@endsection
