@extends('admin.baseAdmin')
@section('adminContent')
    <h1>Skills Index</h1>

    <div>
        <div align="right">
            <a href="{{ route('skills.create') }}" class="btn btn-primary p-3 font-extrabold mb-3 ">+ Add Skill</a>
        </div>

        <div class="table-responsive" style="scrollbar-width: thin">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr class=" table-active">
                        <td>Image</td>
                        <td>Skill Name</td>
                        <td>Skill Desc</td>
                        <td>Sub Skill</td>
                        <td>Skill Progress</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skills as $skill)
                        <tr>
                            <td>
                                @if (optional($skill)->skillImg === null)
                                    {{ 'IMG' }}
                                @else
                                    <span class="text-danger"> {{ 'No Image' }}</span>
                                @endif
                            </td>
                            <td>{{ $skill->skillName }}</td>
                            <td>{{ $skill->skillDesc }}</td>
                            <td>
                                @if ($skill->subSkill == 1)
                                    <p class="badge badge-outline-danger"> Hard Skill</p>
                                @else
                                    <p class="badge badge-outline-warning"> Soft Skill</p>
                                @endif
                            </td>
                            <td>{{ $skill->skillProgress }}%</td>
                            <td>
                                makan | minum
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
