@extends('admin.baseAdmin')
@section('adminContent')
    <h1>User index</h1><br>
    <div class="indexUserContainer">
        <div class="userContentLeft">
            <div class="textUserContainer bg-dark">
                <div>
                    <h1>{{ Auth::user()->name }}</h1>
                </div>
                <div>
                    <h5>{{ Auth::user()->email }}</h5>
                </div>
                <div>
                    @if (optional(Auth::user())->desc === null)
                        <h3 style="color: rgba(255, 255, 255, 0.087); text-align:center; margin:50px 0">Description not
                            created yet.</h3>
                    @else
                        <p>{!! nl2br(e(Auth::user()->desc)) !!}</p>
                    @endif
                </div>
            </div>

            <div class="cvContainer bg-dark">
                @if (optional(Auth::user())->cv === null)
                    <div class="mainCVContainerNull">
                        <i class="mdi mdi-folder-plus text-dark"></i>
                        <h4 class="text-dark">Curiculum Vitae has not
                            posted.</h4>
                    </div>
                @else
                    <div class="mainCVContainer">
                        <iframe src="{{ asset('storage/' . Auth::user()->cv) }}" alt="" width="100%" height="100%"
                            style=" border-radius:7px"></iframe>
                    </div>
                @endif
            </div>
        </div>
        <div class="userContentRight">
            <div class="imgUserContainer bg-dark">
                @if (optional(Auth::user())->image === null)
                    <img src="{{ asset('staticImages/noprofile.jpeg') }}" alt="" width="100%" height="100%"
                        style="object-fit: cover; object-position: center; opacity:40%">
                @else
                    <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" width="100%" height="100%"
                        style="object-fit: cover; object-position: center;">
                @endif
            </div>

            <div class="btnUserContainer bg-dark">
                <a href="{{ route('users.edit', encrypt(Auth::user()->id)) }}"> <i class="mdi mdi-pencil-box-outline"></i>
                    Edit Content</a>
                <button> <i class="mdi mdi-delete"></i> Delete</button>
            </div>
        </div>
    </div>
@endsection
