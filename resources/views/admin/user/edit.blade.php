@extends('admin.baseAdmin')
@section('adminContent')
    <form action="{{ route('users.update', encrypt($userEdit->id)) }}" method="POST" enctype="multipart/form-data">
        <h1>User edit</h1><br>
        <div class="editUserContainer">
            <div class="editUserLeftContainer">
                <div class="formInputContainer bg-dark">
                    @csrf
                    @method('PUT')

                    <div class="formInput">
                        <label for="">Name :</label>
                        <input type="text" placeholder="Full name" value="{{ old('name', $userEdit->name) }}"
                            name="name">
                        @error('name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="formInput">
                        <label for="">Email :</label>
                        <input type="text" placeholder="Email address" value="{{ old('email', $userEdit->email) }}"
                            name="email">
                        @error('email')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="formInput">
                        <label for="">Password :</label>
                        <input type="text" placeholder="Pass****" name="password">
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="formInput">
                        <label for="">Confirm password :</label>
                        <input type="text" placeholder="Confirm password" name="password_confirmation">
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="formInput">
                        <label for="">Description :</label>
                        <textarea name="desc" id="" cols="30" rows="7" placeholder="Description" name="desc">{{ old('desc', $userEdit->desc) }}</textarea>
                        @error('desc')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="formCVContainer bg-dark">
                    <div class="imgCVContainer">
                        @if (optional($userEdit)->cv)
                            <iframe id="cvPreview" src="{{ asset('storage/' . $userEdit->cv) }}" frameborder="0"></iframe>
                        @else
                            <iframe id="cvPreview" src="" frameborder="0" style="display: none"></iframe>
                            <div class="text-dark" id="noCvText"> {{ 'No CV yet' }}</div>
                        @endif
                    </div>

                    <div class="formCv">
                        <label for="cv">Select CV</label>
                        <input type="file" hidden id="cv" accept="application/pdf" name="cv">
                    </div>
                </div>
                @error('cv')
                    <span>{{ $message }}</span>
                @enderror
            </div>


            <div class="editUserRightContainer">
                <div class="containerCRUDImg">
                    <div class="imgUserEditContainer bg-dark">
                        @if (optional(Auth::user())->image === null)
                            <img id="previewProfileImg" src="{{ asset('staticImages/noprofile.jpeg') }}" alt=""
                                width="100%" height="100%"
                                style="object-fit: cover; object-position: center; opacity:40%">
                        @else
                            <img id="previewProfileImg" src="{{ asset('/storage/' . $userEdit->image) }}" alt=""
                                height="100%" width="100%" style="object-fit: cover; object-position: center; ">
                        @endif
                    </div>


                    <div class="btnEdtOrRmvContainer bg-dark">
                        <div>
                            <label for="profileUser"><i class="mdi mdi-pencil-box-outline"></i></label>
                            <input type="file" hidden id="profileUser" accept="image/*">
                        </div>
                        <div onclick="confirm('Are you serious to delete your profile image permanently?')" id="deleteBtn">
                            <i class="mdi mdi-delete"></i>
                        </div>
                    </div>
                </div>

                <div class="btnUserEditContainer bg-dark">
                    <button> <i class="mdi mdi-content-save"></i> Update</button>
                    <a href="{{ route('users.index') }}"> <i class="mdi mdi-undo"></i>
                        Back</a>
                </div>
            </div>
        </div>
    </form>




    <script>
        // CV 
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

        // Img profile
        document.addEventListener('DOMContentLoaded', function() {
            const profileUser = document.getElementById('profileUser');
            const previewProfileImg = document.getElementById('previewProfileImg')
            const deleteBtn = document.getElementById('deleteBtn')

            // Change profile image
            profileUser.addEventListener('change', async (e) => {
                const file = e.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        previewProfileImg.src = event.target.result;
                        previewProfileImg.style.opacity = 1;
                    }

                    reader.readAsDataURL(file)
                }

                // Update user realtime
                if (!file) return;
                const formData = new FormData();
                formData.append('image', file);
                const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                try {
                    const response = await fetch(
                        'http://127.0.0.1:8000/cdjshfuv7sf4rtghf/dafurt47gfrw4325rrfds', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrf
                            },
                            body: formData,
                            credentials: 'same-origin'
                        })

                    const result = await response.json();

                    if (response.ok) {
                        alert('Profile updated successfully!')
                    } else {
                        alert('Failed to update profile' + (result.message || result.error))
                    }
                } catch (err) {
                    // console.log(err);
                    alert('Failed to change profile image!')
                }
            })

            // Delete profile image
            deleteBtn.addEventListener('click', async () => {
                const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                try {
                    const resp = await fetch(
                        'http://127.0.0.1:8000/cdjshfuv7sf4rtghf/dsbfggsgfiurfitg934r', {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrf,
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            }
                        }
                    )

                    if (resp) {
                        alert('success')
                    }
                } catch (err) {
                    console.log(err);

                    alert('Failed to delete profile image!')
                }
            })
        })
    </script>
@endsection

@section('toastr')
    @if (session('userUpdateFailed'))
        <script>
            toastr.error(@json(session('userUpdateFailed')))
        </script>
    @endif
@endsection
