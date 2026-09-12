@extends('admin.baseAdmin')
@section('adminContent')
    <h1>Skill Create</h1><br>

    <div>
        <form action="{{ route('skills.store') }}" method="post">

            @csrf

            <div class="editSkillContainer">
                <div class="editSkillLeftContainer">
                    <div class="formInputContainer bg-dark">

                        <div class="formInput">
                            <label for="">Name Skill :</label>
                            <input type="text" required placeholder="Name Skill" value="{{ old('skillName') }}"
                                name="skillName">
                            @error('skillName')
                                <span>{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="formInput">
                            <label for="">Sub Skill :</label>
                            <select name="subSkill" required id="subSkill">
                                <option value="" disabled selected>Select sub skill</option>
                                <option value="0">Hard Skill</option>
                                <option value="1">Soft Skill</option>
                            </select>
                            @error('subSkill')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="formInput">
                            <label for="">Description :</label>
                            <textarea name="skillDesc" id="" placeholder="Description Skill" cols="30" rows="5">{{ old('skillDesc') }}</textarea>
                            @error('skillDesc')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="formInputContainer bg-dark">
                        <div class="formInput">
                            <label for="">Progress Skill :</label>
                            <div style="display: flex; justify-content:center: align-items:center; gap:10px">
                                <b style="margin: auto" id="skillProgressValue">0%</b>
                                <input type="range" style="width:100%" min="1" max="100" step="1"
                                    name="skillProgress" value="{{ old('skillProgress', 0) }}" id="skillProgress">
                                <b style="margin: auto">100%</b>
                            </div>
                            @error('skillProgress')
                                <span>{{ $message }}</span>
                            @enderror

                            <input type="hidden" value="{{ $user->id }}">
                        </div>
                    </div>


                </div>


                <div class="editSkillRightContainer">
                    <div class="containerCRUDImg">
                        <div class="imgUserEditContainer bg-dark">
                            @if (optional(Auth::user())->image === null)
                                <img id="perviewSkillImg" src="{{ asset('staticImages/noprofile.jpeg') }}" alt=""
                                    width="100%" height="100%"
                                    style="object-fit: cover; object-position: center; opacity:40%">
                            @else
                                <img id="perviewSkillImg" src="{{ asset('staticImages/noprofile.jpeg') }}" alt=""
                                    height="100%" width="100%" style="object-fit: cover; object-position: center; ">
                            @endif
                        </div>

                        <div class="btnEdtOrRmvContainer bg-dark">
                            <div>
                                <label for="skillImage"><i class="mdi mdi-pencil-box-outline"></i></label>
                                <input type="file" hidden id="skillImage" accept="image/*" name="skillImg">
                            </div>
                        </div>
                    </div>

                    <div class="btnSkillEditContainer bg-dark">
                        <button type="submit"> <i class="mdi mdi-content-save"></i> Create</button>
                        <a href="{{ route('skills.index') }}"> <i class="mdi mdi-undo"></i>
                            Back</a>
                    </div>
                </div>
            </div>

        </form>


    </div>

    <script>
        document.getElementById('skillImage').addEventListener('change', function(e) {

            const file = e.target.files[0];

            if (file) {

                const reader = new FileReader();

                reader.onload = function(event) {
                    const img = document.getElementById('perviewSkillImg');
                    img.src = event.target.result;
                    img.style.opacity = '100%'
                }
                reader.readAsDataURL(file);
            }

        });

        window.addEventListener('DOMContentLoaded', function() {
            let skillSlider = document.getElementById('skillProgress');
            const skillValue = document.getElementById('skillProgressValue');

            skillValue.textContent = skillSlider.value + '%';

            skillSlider.addEventListener('input', () => {
                skillValue.textContent = skillSlider.value + '%'
            })

        })

        const subSkill = document.getElementById('subSkill');
        let skillImage = document.getElementById('skillImage');
        subSkill.addEventListener('change', () => {
            skillImage.required = (subSkill.value === "0")
        })
    </script>
@endsection
