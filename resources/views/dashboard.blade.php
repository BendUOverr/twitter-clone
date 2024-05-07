   @extends('layout.layout')
   @section('content')
       <div class="row">
           <div class="col-3">
               @include('shared.left-sidebar')
           </div>
           <div class="col-6">
               @include('shared.success-message')
               @include('ideas.shared.submit-idea')
               <hr>
               @forelse ($ideas as $idea)
                   <div class="mt-3">
                       @include('ideas.shared.idea-card')
                   </div>
               @empty
                   <p class="text-center my-3">No results</p>
               @endforelse

           </div>
           <div class="col-3">
               @include('shared.search-bar')

           </div>
       </div>

       </div>
   @endsection
