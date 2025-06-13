@extends('admin.baseAdmin')
@section('adminContent')
    <form action="">
        <h1>User edit</h1><br>
        <div class="editUserContainer">
            <div class="editUserLeftContainer">
                <div class="formInputContainer bg-dark">
                    @csrf
                    @method('PUT')

                    <div class="formInput">
                        <label for="">Name :</label>
                        <input type="text" placeholder="Full name" value="{{ old('name', $userEdit->name) }}" name="name">
                        <span></span>
                    </div>
                    <div class="formInput">
                        <label for="">Email :</label>
                        <input type="text" placeholder="Email address" value="{{ old('email', $userEdit->email) }}"
                            name="email">
                        <span></span>
                    </div>
                    <div class="formInput">
                        <label for="">Password :</label>
                        <input type="text" placeholder="Pass****" name="password">
                        <span></span>
                    </div>
                    <div class="formInput">
                        <label for="">Description :</label>
                        <textarea name="" id="" cols="30" rows="7" placeholder="Description" name="desc">{{ old('desc', $userEdit->desc) }}</textarea>
                        <span></span>
                    </div>
                </div>

                <div class="formCVContainer bg-dark">
                    <div class="imgCVContainer">
                        @if (optional($userEdit)->cv)
                            <iframe id="cvPreview" src="" frameborder="0"></iframe>
                        @else
                            <iframe id="cvPreview" src="" frameborder="0" style="display: none"></iframe>
                            <div class="text-dark" id="noCvText"> {{ 'No CV yet' }}</div>
                        @endif
                    </div>
                    <span></span>
                    <div class="formCv">
                        <label for="cv">Select CV</label>
                        <input type="file" hidden id="cv" accept="application/pdf" name="cv">
                    </div>
                </div>
            </div>


            <div class="editUserRightContainer">
                <div class="containerCRUDImg">
                    <div class="imgUserEditContainer bg-dark">
                        @if (optional(Auth::user())->image === null)
                            <img src="{{ asset('staticImages/noprofile.jpeg') }}" alt="" width="100%"
                                height="100%" style="object-fit: cover; object-position: center; opacity:40%">
                        @else
                            <img src="" alt="">
                        @endif
                    </div>

                    <div class="btnEdtOrRmvContainer bg-dark">
                        <div>
                            <label for="profileUser"><i class="mdi mdi-pencil-box-outline"></i></label>
                            <input type="file" hidden id="profileUser" name="img">
                        </div>
                        <div><i class="mdi mdi-delete"></i></div>
                    </div>
                </div>

                <div class="btnUserEditContainer bg-dark">
                    <button> <i class="mdi mdi-content-save"></i> Update</button>
                    <a href="{{ url()->previous() }}"> <i class="mdi mdi-undo"></i>
                        Back</a>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('cv').addEventListener('change', (event) => {
            const fileInput = event.target;
            const file = fileInput.files && fileInput.files[0];
            const iframe = document.getElementById('cvPreview');
            const noCvText = document.getElementById('noCvText');

            if (file && file.type === "application/pdf") {
                const fileURL = URL.createObjectURL(file);
                iframe.src = fileURL;
                iframe.style.display = 'block';

                noCvText.style.display = 'none';
            } else {
                iframe.src = '';
                iframe.style.display = 'none';

                noCvText.style.display = 'block'
            }
        })
    </script>
@endsection
